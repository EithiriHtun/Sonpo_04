<?php
require_once(LIB_DIR . 'DBAction.class.php');
require_once(LIB_DIR.'UserManager.php');

class AuthAction extends DBAction{
  function execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    //initalize
    $user->removePrivileges('sonpocontact');
    $user->setAttribute('is_master',0);

    $user_account = $request->getParameter('account');
    $password     = $request->getParameter('passwd');
    if (!$user_account){
       $request->setAttribute(
         'login_error_message',
         'IDもしくはパスワードが間違っています'
       );
       return VIEW_INPUT;
    }
    if (!$password){
       $request->setAttribute(
         'login_error_message',
         'IDもしくはパスワードが間違っています'
       );
       return VIEW_INPUT;
    }

    $is_auth=0;
    $is_master=0;
    
    $user_mgr=new UserManager($DB);
    $admin_users=$user_mgr->get_all();
    
    foreach($admin_users as $val){
      if(
        $user_account==$val["account"] && 
        md5($password)==$val["password"]
      ){
        $is_auth=1;
        $is_master=$val["is_master"];
      }
    }

    if($is_auth){
      $user->setAuthenticated(TRUE);
      $user->addPrivilege('admin', 'sonpocontact');
      $user->setAttribute('is_master',$is_master);

      $controller->redirect('/manage/contact/index.php/module/ContactManage');
      return VIEW_NONE;
    }
    
    $request->setAttribute(
      'login_error_message',
      'IDもしくはパスワードが間違っています'
    );

    return VIEW_INPUT;
  }

  function getDefaultView (&$controller, &$request, &$user){
    return VIEW_INPUT;
  }

  function getRequestMethods (){
    return REQ_POST;
  }
}
?>