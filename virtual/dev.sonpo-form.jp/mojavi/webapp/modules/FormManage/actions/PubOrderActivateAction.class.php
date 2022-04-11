<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubOrderActivateAction extends DBAction {

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    $pub_mgr=new PubManager($DB);

    if($user->getAttribute("is_master")<>1 && $user->getAttribute("is_master2")<>1){
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

    $mode=$_POST["do_mode"];

    $dl=$_POST["dl"];
    $lines=array();
    foreach($dl as $key=>$val){
      if($user->getAttribute("is_master") || $user->getAttribute("is_master2")){
//        $data=$pub_mgr->del_pub_order($val);
        if($mode == 'delete'){
          $data=$pub_mgr->del_pub_order($val);
        }else{
          $data=$pub_mgr->activate_pub_order($val);
        }
      }
    }
      
    $controller->redirect('/manage/forms/index.php/module/FormManage/action/PubInactiveIndex');
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
