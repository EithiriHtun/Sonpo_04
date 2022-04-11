<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'UserManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class SetIDPWAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if(!$user->getAttribute("is_master")){
      $controller->redirect(SCRIPT_PATH);
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
        $article_manager= new UserManager($DB);
        $data=$article_manager->get_one($id);
        
        if(!$data){
          $controller->redirect(SCRIPT_PATH);
          return VIEW_NONE;
        }
      }
      $user->setAttribute("data",$data);

    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

    if(!$user->getAttribute("is_master")){
      $controller->redirect(SCRIPT_PATH);
      return VIEW_NONE;
    }

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");
    
    $article_manager=new UserManager($DB);
    
    if($id){
      $data["password"]=md5($data["password"]);
      $article_manager->update($data,$id);
    }
    
    return VIEW_SUCCESS;
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
    
    $article_manager=new UserManager($DB);

    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
    );

    $validatorManager->setRequired(
      "account", 
      true, 
      "アカウントが入力されていません。"
    );
    $validatorManager->setRequired(
      "password", 
      true, 
      "パスワードが入力されていません。"
    );
    
    if($data["password"]<>$data["password2"]){
      $validatorManager->setRequired(
        "invalid_password", 
        true, 
        "確認用パスワードが一致していません。"
      );
    }
    
    if($article_manager->account_exist($id,$data[account])){
      $validatorManager->setRequired(
        "invalid_account", 
        true,
        "入力されたアカウントは既に使われています。"
      );
    }
    
    if(
      !preg_match("/^[0-9a-zA-Z]+$/",$data["account"]) ||
      !preg_match("/^[0-9a-zA-Z]+$/",$data["password"])
    ){
      $validatorManager->setRequired(
        "invalid_char", 
        true,
        "アカウントとパスワードは半角英数字のみ使用してください。"
      );
    }
    
    if(strlen($data["account"])<6){
      $validatorManager->setRequired(
        "invalid_account", 
        true,
        "アカウントは６文字以上としてください。"
      );
    }
    if(strlen($data["password"])<6){
      $validatorManager->setRequired(
        "invalid_password", 
        true,
        "パスワードは６文字以上としてください。"
      );
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
    return array('admin', 'sonpocontact');
  }
}

?>
