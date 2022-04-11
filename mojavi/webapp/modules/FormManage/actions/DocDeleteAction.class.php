<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'DocManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

class DocDeleteAction extends DBAction {

  function execute(&$controller, &$request, &$user){

    if($user->getAttribute("is_shipping")==1){
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    $contact_mgr=new DocManager($DB);
    
    $doc=$_POST["doc"];
    $lines=array();
    foreach($doc as $key=>$val){
      if($user->getAttribute("is_master")){
        $data=$contact_mgr->deactive($val);
      }
    }
    $controller->redirect(
      '/manage/forms/index.php/module/FormManage/action/DocList'
    );
    return VIEW_NONE;
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpoform');
  }

}

?>
