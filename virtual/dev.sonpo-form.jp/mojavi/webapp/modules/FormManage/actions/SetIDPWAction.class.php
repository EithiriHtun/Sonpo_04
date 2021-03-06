<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

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
        $article_manager= new FormUserManager($DB);
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
    
    $article_manager=new FormUserManager($DB);
    
    if($id){
      if($data["password"]){
        $data["password"]=md5($data["password"]);
        
        $userdata = $article_manager->get_one($id);
        $data['pw_set_date']  = date('Y-m-d');
        $data['pw1']          = $userdata['password'];
        $data['pw1_set_date'] = ($userdata['pw_set_date'])? $userdata['pw_set_date'] : '1970-1-1';
        $data['pw2']          = $userdata['pw1'];
        $data['pw2_set_date'] = ($userdata['pw1_set_date'])?  $userdata['pw1_set_date'] : '1970-1-1';
        
        $article_manager->update_password($data,$id);

        $article_manager->update_login_attempt_count($id, 0);
      }
      if($data["email"]){
        $article_manager->update_email($data,$id);
      }
      $article_manager->update_bikou($data,$id);
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
    
    $article_manager=new FormUserManager($DB);

    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
    );

    $validatorManager->setRequired(
      "account", 
      true, 
      "????????????????????????????????"
    );
/*
    $validatorManager->setRequired(
      "password", 
      true, 
      "????????????????????????????????"
    );
*/
    
    if($data["password"]<>$data["password2"]){
      $validatorManager->setRequired(
        "invalid_password", 
        true, 
        "????????????????????????????????????"
      );
    }
    
    if($article_manager->account_exist($data['id'],$data['account'])){
      $validatorManager->setRequired(
        "invalid_account", 
        true,
        "??????????????????????????????????????????"
      );
    }
    
    if(
       !preg_match("/^[0-9a-zA-Z]+$/",$data["account"])
    ){
      $validatorManager->setRequired(
        "invalid_char", 
        true,
        "????????????????????????????????????????????"
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
        "????????????????????????????????????????????????"
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
    if($data["password"] && $is_validstr < 2){
      $validatorManager->setRequired(
        "invalid_char", 
        true,
        "????????????????????????????????????????????????????????????????????????????????????????????????????"
      );
    }
    
    if(strlen($data["account"])<1){
      $validatorManager->setRequired(
        "invalid_account", 
        true,
        "????????????1????????????????????????"
      );
    }
    if($data["password"] && (strlen($data["password"])<8 || strlen($data["password"])>32)){
      $validatorManager->setRequired(
        "invalid_password", 
        true,
        "????????????8????????32????????????????????????"
      );
    }

    if(mb_strlen($data["bikou"],'EUC-JP')>200){
      $validatorManager->setRequired(
        "invalid_bikou", 
        true,
        "????????????????????????20????????????????????????"
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
