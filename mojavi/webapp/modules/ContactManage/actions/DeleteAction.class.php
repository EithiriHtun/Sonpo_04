<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ContactManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class DeleteAction extends DBAction {

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

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
      $article_manager= new ContactManager($DB);
      $data=$article_manager->get_one($id);
      if(!$data){
        $controller->redirect(SCRIPT_PATH);
        return VIEW_NONE;
      }
      
      if(
        file_exists(
          SONPO_PDF_DIR."Kaitou_".sprintf("%010d",$data["comment_id"]).".pdf"
        )
      ){
        unlink(SONPO_PDF_DIR."Kaitou_".sprintf("%010d",$data["comment_id"]).".pdf");
      }
      
      $article_manager->delete($id);
      
    }

    $controller->redirect(SCRIPT_PATH);
    return VIEW_NONE;
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocontact');
  }
}

?>
