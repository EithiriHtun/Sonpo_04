<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ContactManager.php');

  class IndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      $article_manager=new ContactManager($DB);
      $data=$article_manager->get_list_for_index();
      
      $request->setAttribute("data",$data);
      $request->setAttribute("status",$status);
      
      return VIEW_SUCCESS;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpocontact');
    }

  }
?>
