<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');
require_once(LIB_DIR.'DocManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class TransRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if(
      !$user->getAttribute("is_shipping") &&
      !$user->getAttribute("is_master")   &&
      !$user->getAttribute("is_master2") 
    ){
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

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
    
    if(!$id){
      $controller->redirect(SCRIPT_PATH);
      return VIEW_NONE;
    }

    if(!$request->getErrors()){

      $categories=array();
      if($id){
        $article_manager= new InstructorManager($DB);
        $data=$article_manager->get_one($id);
        
        if(!$data){
          $controller->redirect(SCRIPT_PATH);
          return VIEW_NONE;
        }
      }
      $user->setAttribute("data",$data);

    }
    
    $doc_mgr= new DocManager($DB);
    $request->setAttribute("doclist",$doc_mgr->get_all());

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Instructor/config/config.php");
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    if(
      !$user->getAttribute("is_shipping") &&
      !$user->getAttribute("is_master")   &&
      !$user->getAttribute("is_master2") 
    ){
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

    $data=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");
    
    $article_manager=new InstructorManager($DB);
      
    switch ($request->getParameter("mode")){
    
      case "submit":

        if($id){
          $article_manager->trans_update($data,$id);
        }
        
        if($user->getAttribute("is_master") || $user->getAttribute("is_master2")){
          if($data['t_status']==1 && $data['t_status2']<>1){
            // メール送信
            // 発送手配
            $admin_renderer=new CustomSmartyRenderer($controller, $request, $user);
            $admin_renderer->setAttribute('inst_id', $inst_id);
            $admin_renderer->setAttribute("prefs",$prefs);
            $admin_renderer->setAttribute("theme",$theme);
            $admin_renderer->setAttribute("data",$data);
            $admin_renderer->setAttribute("branch_name",$branch_name[$branch_id]);

            $admin_renderer->setTemplate('mail/transmail.txt');
            $admin_renderer->setMode(RENDER_VAR);
            $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
            $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

            mail(
              $trans_mail_to,
              "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($trans_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
              mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
              "Content-Transfer-Encoding: 7bit\n".
              "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
              "From: ".$mail_from,
              "-f $mail_from"
            );
          }
        }
        
        $request->setAttribute("popmsg","データを保存しました。");

        $doc_mgr= new DocManager($DB);
        $request->setAttribute("doclist",$doc_mgr->get_all());

        return VIEW_INPUT;
      
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
    
    if($request->getParameter("mode")=="submit"){
      $data=$request->getParameters();
      // $data["sdocs"]=$_POST["sdoc"];

      $data_in_session=$user->getAttribute("data");
      $user->setAttribute(
        "data",
        array_merge($data_in_session,$data)
      );
    }else{
      $data=$user->getAttribute("data");
    }

    if($request->getParameter("mode")=="submit"){
      if(!$user->getAttribute("is_master") && !$user->getAttribute("is_master2")){
        if($data["t_status2"]){
          if(!checkdate($data["t_smonth"],$data["t_sday"],$data["t_syear"])){
            $validatorManager->setRequired(
              "invalid_sdate", 
              true, 
              "発送日が正しくありません。"
            );
          }
          if(!checkdate($data["t_amonth"],$data["t_aday"],$data["t_ayear"])){
            $validatorManager->setRequired(
              "invalid_adate", 
              true, 
              "到着予定日が正しくありません。"
            );
          }
        }else{
          if($data["t_smonth"] || $data["t_sday"] || $data["t_syear"]){
            if(!checkdate($data["t_smonth"],$data["t_sday"],$data["t_syear"])){
              $validatorManager->setRequired(
                "invalid_sdate", 
                true, 
                "発送日が正しくありません。"
              );
            }
          }
          if($data["t_amonth"] || $data["t_aday"] || $data["t_ayear"]){
            if(!checkdate($data["t_smonth"],$data["t_sday"],$data["t_syear"])){
              $validatorManager->setRequired(
                "invalid_sdate", 
                true, 
                "発送日が正しくありません。"
              );
            }
            if(!checkdate($data["t_amonth"],$data["t_aday"],$data["t_ayear"])){
              $validatorManager->setRequired(
                "invalid_adate", 
                true, 
                "到着予定日が正しくありません。"
              );
            }
          }
        }
      }
    }

/*
    if($data["mode"]=="preview"){
    
      $data_in_session=$user->getAttribute("data");
      //チェックボックスの初期化
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
        "タイトル（一覧用）が入力されていません。"
      );

      if(!checkdate($data["open_month"],$data["open_day"],$data["open_year"])){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "予約日時が正しくありません。"
        );
      }

      if($data["open_hour"]<0 || $data["open_hour"]>23){
        $validatorManager->setRequired(
          "invalid_hour", 
          true, 
          "予約時刻が正しくありません。"
        );
      }
*/

/*
      $validatorManager->setRequired(
        "date_live", 
        true, 
        "日付（表示用）が入力されていません。"
      );
      $validatorManager->setRequired(
        "date_show", 
        true, 
        "日付（カレンダー用）が入力されていません。"
      );
      $live_manager= new LiveManager($DB);
      $dates=$live_manager->getDateArray($data["date_show"]);
      if(!count($dates)){
        $validatorManager->setRequired(
          "invalid_date_show", 
          true, 
          "日付（カレンダー用）が正しく入力されていません。"
        );
      }
*/

//    }

  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpoform');
  }

}

?>
