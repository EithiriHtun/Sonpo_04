<?php
require_once(LIB_DIR . 'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

 class LogoutAction extends DBAction{
   function execute (&$controller, &$request, &$user){

    $DB=$request->getAttribute('db');

    $user->setAuthenticated(FALSE);
    $user->removePrivileges('sonpoform');
    $user->setAttribute('is_master',0);
    $user->setAttribute('is_master2',0);
    $user->setAttribute('branch',0);
    
    $log_mgr=new FormLogManager();
    $log_mgr->setlog($user->getAttribute('user_account'),'ログアウト');

    $user_mgr=new FormUserManager($DB);
    $admin_users=$user_mgr->get_all();
    $user_id = $user->getAttribute('user_id');

    $user->setAttribute('lock_token','');
    
    $user_mgr->clear_lock_token($user_id);

    $user->setAttribute('user_account','');
    $user->setAttribute('user_id','');

    $controller->redirect("/manage/forms/");

   }
 }

?>
