<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');

  class InstIndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      $article_manager=new InstructorManager($DB);

      //$article_manager->check_delete();//ŒÃ‚¢ƒf[ƒ^‚ðíœ

      $data=$article_manager->get_year_list($where);
      
      $request->setAttribute("data",$data);
      $request->setAttribute("status",$status);

      $data2=$article_manager->get_trans_year_list($where);

      $request->setAttribute("data2",$data2);
      
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
