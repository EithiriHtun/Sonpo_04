<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');
require_once(LIB_DIR.'Pages.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class RegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');

    if(!$request->getErrors()){
      $user->setAttribute("data",'');
      $user->setAttribute("id",'');
    }

    if($request->getParameter("id")){
      $id=$request->getParameter("id");
      $user->setAttribute("id",$id);
    }else{
      $id=$user->getAttribute("id");
    }
    
    if(!$request->getErrors()){

      $categories=array();
      if($id){
        $article_manager= new ArticleManager($DB);
        $data=$article_manager->get_one($id);
        
        if(!$data){
          $controller->redirect(SCRIPT_PATH);
          return VIEW_NONE;
        }

      }else{
        $data=array();
      }
      
      $user->setAttribute("data",$data);

    }

    if(!$id){
      $request->setAttribute("operation","add");
    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");
    
    switch ($request->getParameter("mode")){
    
      case "preview":
      
      $request->setAttribute("operation","preview");
      return VIEW_ALERT;

      case "rewrite":

      if(!$id){
        $request->setAttribute("operation","add");
      }
      $request->setAttribute("data",$data);
    
      return VIEW_INPUT;

      case "submit":
      
      $article_manager=new ArticleManager($DB);
      
      if($request->getParameter("submit_mode")=="open"){
        $data["visible"]=1;
      }
      
      if($id){
        $article_manager->update($data,$id);
      }else{
        $data["category"]=3;
        $data["branch"]=$user->getAttribute("branch_id");
        //$data["link_top"]=1;
        $id=$article_manager->insert($data);
      }

      // �ָ����פξ�硢�ե���������
      if(
        $request->getParameter("submit_mode")=="open"  &&
        $user->getAttribute("is_master")
      ){
        if(
          mktime($data["open_hour"],0,0,$data["open_month"],$data["open_day"],$data["open_year"])
          - time() > 0
        ){

          //̤��ΤȤ�������������񤭹���
          $article_manager->update_upload_reserve_datetime(
            $id,
            mktime($data["open_hour"],0,0,$data["open_month"],$data["open_day"],$data["open_year"])
          );

        }else{

          //�ե��������
          $pages=new Pages;
          $page=$pages->myMakeInfoPage(
            $branch[$user->getAttribute("branch_id")], 
            $branch_file[$user->getAttribute("branch_id")], 
            &$controller, &$request, &$user
          );
          $pages->mySaveFile(
            $page,
            SONPO_BRANCH_FILE_DIR.$branch_file[$user->getAttribute("branch_id")]."/".$article_manager->get_filename($id).'.html'
          );
          $article_manager->update_file_date($id);

          $article_manager->update_upload_reserve_datetime(
            $id,
            NULL
          );

          // ��Ϣ�Υꥹ�Ȥ򹹿�����
          $this->_make_lists(&$controller, &$request, &$user);
          $this->_make_top_lists(&$controller, &$request, &$user);
          
        }

      }
      
      $user->setAttribute("data","");

      $controller->redirect(SCRIPT_PATH."/module/ManageInfo?b=".sprintf("%d",$user->getAttribute("branch_id")));
      return VIEW_NONE;
    }
  }

  function _make_lists(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    $pages=new Pages;

    $tmp=$article_manager->get_info_list($user->getAttribute("branch_id"));
    if($tmp){

      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
            $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
            $val["is_time_over"]=1;
          }
          array_push($data,$val);
        }
      }

      $renderer= new CustomSmartyRenderer($controller, $request, $user);
      $renderer->setTemplate('info_list.html');
  
      $renderer->setAttribute("data",$data);

      $renderer->setAttribute("branch_id",$user->getAttribute("branch_id"));
      $renderer->setAttribute("branch_name",$branch[$user->getAttribute("branch_id")]);
    
      $renderer->setAttribute("script_path",SCRIPT_PATH);
    
      $renderer->setAttribute("include_base",'../../../../../html');
    
      $renderer->setMode(RENDER_VAR);
      $body=$renderer->fetchResult($controller, $request, $user);

      $pages->mySaveFile(
        $body,
        SONPO_BRANCH_FILE_DIR.$branch_file[$user->getAttribute("branch_id")]."/list.html"
      );

    }

    return;
  }

  function getRequestMethods(){
    return REQ_POST;
  }
  
  function validate (&$controller, &$request, &$user){
    return TRUE;
  }
  
  function registerValidators(&$validatorManager, &$controller, &$request, &$user) {
//    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');
    
    $data=$request->getParameters();
    
    $article_manager=new ArticleManager($DB);

    if($data["mode"]=="preview"){
    
      $data_in_session=$user->getAttribute("data");
      //�����å��ܥå����ν����
      //$data_in_session["is_jp"]        =0;
      //$data_in_session["is_style"]     =0;
      //$data_in_session["is_en"]        =0;
      //$data_in_session["show_contents"]=0;
      //$data_in_session["show_logo"]    =0;
      //$data_in_session["show_contact"] =0;

      $user->setAttribute(
        "data",
        array_merge($data_in_session,$data)
      );

      $validatorManager->setRequired(
        "list_title", 
        true, 
        "�����ȥ�ʰ����ѡˤ����Ϥ���Ƥ��ޤ���"
      );

      if(!checkdate($data["open_month"],$data["open_day"],$data["open_year"])){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "ͽ������������������ޤ���"
        );
      }

      if($data["open_hour"]<0 || $data["open_hour"]>23){
        $validatorManager->setRequired(
          "invalid_hour", 
          true, 
          "ͽ����郎����������ޤ���"
        );
      }

/*
      $validatorManager->setRequired(
        "date_live", 
        true, 
        "���ա�ɽ���ѡˤ����Ϥ���Ƥ��ޤ���"
      );
      $validatorManager->setRequired(
        "date_show", 
        true, 
        "���աʥ��������ѡˤ����Ϥ���Ƥ��ޤ���"
      );
      $live_manager= new LiveManager($DB);
      $dates=$live_manager->getDateArray($data["date_show"]);
      if(!count($dates)){
        $validatorManager->setRequired(
          "invalid_date_show", 
          true, 
          "���աʥ��������ѡˤ����������Ϥ���Ƥ��ޤ���"
        );
      }
*/

    }

  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocms');
  }
}

?>
