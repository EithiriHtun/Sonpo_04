<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

  class ListIDPWAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      if(!$user->getAttribute("is_master")){
        $controller->redirect(SCRIPT_PATH);
        return VIEW_NONE;
      }

      $article_manager=new FormUserManager($DB);
      $data=$article_manager->get_all();
      
      $request->setAttribute("data",$data);
      
      $log_mgr=new FormLogManager();
      $log_mgr->setlog($user->getAttribute('user_account'),'ÅÐÏ¿¼Ô°ìÍ÷');

      return VIEW_SUCCESS;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpoform');
    }

  }
?>
