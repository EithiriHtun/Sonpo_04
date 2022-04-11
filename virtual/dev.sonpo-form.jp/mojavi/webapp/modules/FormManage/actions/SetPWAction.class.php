<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class SetPWAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if(!$request->getErrors()){
      $user->setAttribute("data",'');
    }
    
    $user_id = $user->getAttribute('user_id');

    if(!$request->getErrors()){

      $categories=array();
      if($user_id){
        $article_manager = new FormUserManager($DB);
        $data = $article_manager->get_one($user_id);
        
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
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    $article_manager=new FormUserManager($DB);
    
    $data["password"]=md5($data["password"]);
    
    $userdata = $article_manager->get_one($data['id']);
    $data['pw_set_date']  = date('Y-m-d');
    $data['pw1']          = $userdata['password'];
    $data['pw1_set_date'] = ($userdata['pw_set_date'])? $userdata['pw_set_date'] : '1970-1-1';
    $data['pw2']          = $userdata['pw1'];
    $data['pw2_set_date'] = ($userdata['pw1_set_date'])?  $userdata['pw1_set_date'] : '1970-1-1';
    
    $article_manager->update_password($data,$data['id']);
    
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
    
    $article_manager=new FormUserManager($DB);

    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
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
    
    if(
      $data["password"] &&
      (
        !preg_match("/^[0-9a-zA-Z!-\/:-@\[-`{-~]+$/",$data["password"])
      )
    ){
      $validatorManager->setRequired(
        "invalid_char", 
        true,
        "パスワードは半角英数字記号のみ使用してください。"
      );
    }
    
    $is_validstr = 0;
    if(preg_match("/[0-9]/",$data["password"])){
      $is_validstr++;
    }
    if(preg_match("/[a-z]/",$data["password"])){
      $is_validstr++;
    }
    if(preg_match("/[A-Z]/",$data["password"])){
      $is_validstr++;
    }
    if(preg_match("/[!-\/:-@\[-`{-~]/",$data["password"])){
      $is_validstr++;
    }
    if($is_validstr < 4){
      $validatorManager->setRequired(
        "invalid_char", 
        true,
        "パスワードは半角英字（大文字、小文字）、半角数字、半角記号を組み合わせて指定してください。"
      );
    }
    
    if($data["password"] && (strlen($data["password"])<10 || strlen($data["password"])>32)){
      $validatorManager->setRequired(
        "invalid_password", 
        true,
        "パスワードは10文字以上32文字以下としてください。"
      );
    }
    
    $user_id = $user->getAttribute('user_id');
    $userdata = $article_manager->get_one($user_id);
    if(!$userdata){
      $validatorManager->setRequired(
        "invalid_userdata", 
        true,
        "ユーザ情報を正しく取得できませんでした。"
      );
    }
    
    if(
      $userdata['pw1'] &&
      md5($data['password']) == $userdata['pw1']
    ){
      $validatorManager->setRequired(
        "invalid_past_password", 
        true,
        "過去に用いたパスワードと異なるパスワードを設定してください。"
      );
    }
    if(
      $userdata['pw2'] &&
      md5($data['password']) == $userdata['pw2']
    ){
      $validatorManager->setRequired(
        "invalid_past_password", 
        true,
        "過去に用いたパスワードと異なるパスワードを設定してください。"
      );
    }
    
    if(preg_match("/".preg_quote($userdata['account'])."/",$data['password'])){
      $validatorManager->setRequired(
        "invalid_userdata", 
        true,
        'パスワードはアカウント名を含まないようにしてください。'
      );
    }

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
