<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

  class PubInactiveIndexAction extends DBAction{

    function getDefaultView(&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if($user->getAttribute("is_master")  ==1){

        $article_manager=new PubManager($DB);

        $data=$article_manager->get_inactive_list();
        
        $request->setAttribute("data",$data);

        $log_mgr=new FormLogManager();
        $log_mgr->setlog($user->getAttribute('user_account'),'削除データ[受付管理・発送管理]');

        return VIEW_SUCCESS;

      }else{
        $controller->redirect(
          '/manage/forms/index.php/module/FormManage'
        );
        return VIEW_NONE;
      }
    }

    function getRequestMethods(){
      return REQ_POST;
    }
    
    function isSecure(){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpoform');
    }

  }
?>
