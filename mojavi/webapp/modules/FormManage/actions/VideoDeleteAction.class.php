<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'VideoManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class VideoDeleteAction extends DBAction {

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if($user->getAttribute("is_master")==1 || $user->getAttribute("is_master2")==1){

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

      $categories=array();
      if($id){
        $article_manager= new VideoManager($DB);
        $data=$article_manager->get_one($id);
        if(!$data){
          $controller->redirect(SCRIPT_PATH);
          return VIEW_NONE;
        }
        
        $article_manager->delete($id);
        
      }

      $controller->redirect('/manage/forms/index.php/module/FormManage/action/VideoIndex');
      return VIEW_NONE;

    }else{
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpoform');
  }
}

?>
