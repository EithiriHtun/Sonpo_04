<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

class HtmlDeleteAction extends DBAction {

  function execute(&$controller, &$request, &$user){

    $DB=$request->getAttribute('db');

    if($request->getParameter("id")){
      $id  =$request->getParameter("id");
    }else{
      $controller->redirect("/manage/index.php");
      return VIEW_NONE;
    }
    
    $article_manager= new ArticleManager($DB);
    $data=$article_manager->get_one($id);
    
    if($user->getAttribute("is_master")){
      if($data["upload_filename"]){
        unlink(SONPO_NEWS_FILE_DIR.$data["upload_filename"].'.html');
      }
      unlink(SONPO_NEWS_FILE_DIR.$data["open_year"]."/".$article_manager->get_filename($id).'.html');
      $article_manager->to_invisible($id);
    }

    $controller->redirect("/manage/index.php/module/ManageNews?y=".$data["open_year"]);
    return VIEW_NONE;
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocms');
  }

}

?>
