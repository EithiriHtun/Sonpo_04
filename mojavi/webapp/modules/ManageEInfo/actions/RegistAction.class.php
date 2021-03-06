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
      $user->setAttribute("year",'');
    }

    if($request->getParameter("id")){
      $id=$request->getParameter("id");
      $user->setAttribute("id",$id);
      $user->setAttribute("year",$request->getParameter("y"));
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
        $data["link_top"]=1;
      }
      
      $user->setAttribute("data",$data);

    }

    if(!$id){
      $request->setAttribute("operation","add");
    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

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
      
      if(
        mb_convert_encoding(
          $request->getParameter("submitmode"),"EUC-JP"
        )=="????" &&
        $user->getAttribute("is_master")
      ){
        $data["visible"]=1;
      }
      
      if($id){
        $article_manager->update($data,$id);
      }else{
        $data["category"]=7;
        $id=$article_manager->insert($data);
      }

      if(
        mktime($data["open_hour"],0,0,$data["open_month"],$data["open_day"],$data["open_year"])
        - time() > 0
      ){

        //??????????????????????????????
        $article_manager->update_upload_reserve_datetime(
          $id,
          mktime($data["open_hour"],0,0,$data["open_month"],$data["open_day"],$data["open_year"])
        );

      }else{

        $this->_make_en_top_lists(&$controller, &$request, &$user);

      }

      $year=$user->getAttribute("year");

      $user->setAttribute("data","");
      $user->setAttribute("year",'');

      $controller->redirect(SCRIPT_PATH."/module/ManageEInfo?y=".sprintf("%d",$year));
      return VIEW_NONE;
    }
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

    if($data["mode"]=="submit"){
    
      $data_in_session=$user->getAttribute("data");
      //????????????????????????
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
        "????????????????????????????????????????"
      );

      if(!checkdate($data["open_month"],$data["open_day"],$data["open_year"])){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "????????????????????????????"
        );
      }

      if($data["open_hour"]<0 || $data["open_hour"]>23){
        $validatorManager->setRequired(
          "invalid_hour", 
          true, 
          "????????????????????????????"
        );
      }

/*
      $validatorManager->setRequired(
        "date_live", 
        true, 
        "????????????????????????????????????"
      );
      $validatorManager->setRequired(
        "date_show", 
        true, 
        "??????????????????????????????????????????"
      );
      $live_manager= new LiveManager($DB);
      $dates=$live_manager->getDateArray($data["date_show"]);
      if(!count($dates)){
        $validatorManager->setRequired(
          "invalid_date_show", 
          true, 
          "????????????????????????????????????????????????"
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
