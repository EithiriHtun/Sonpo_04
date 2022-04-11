<?php
require_once(LIB_DIR.'DBAction.class.php');
//require_once(LIB_DIR.'PubManager.php');
require_once(LIB_DIR.'FormUserManager.php');

  class PubIndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

//      $article_manager=new PubManager($DB);

//      $data=$article_manager->get_all();
      
//      $request->setAttribute("data",$data);

//      $data2=$article_manager->get_trans_year_list($where);

//      $request->setAttribute("data2",$data2);

      $user_mgr=new FormUserManager($DB);
      //ロック時間の更新
      $user_mgr->update_lock_token_time($user->getAttribute('user_id'));

      $user->removeAttribute("recept_page");
      $user->removeAttribute("order_page");
      $user->removeAttribute("ship_page");
      
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
