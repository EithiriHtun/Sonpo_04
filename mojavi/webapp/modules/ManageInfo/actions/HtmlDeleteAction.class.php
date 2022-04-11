<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');
require_once(LIB_DIR.'Pages.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class HtmlDeleteAction extends DBAction {

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

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
      unlink(SONPO_BRANCH_FILE_DIR.$branch_file[$user->getAttribute("branch_id")]."/".$article_manager->get_filename($id).'.html');
      $article_manager->to_invisible($id);
    }

    // 関連のリストを更新する
    $this->_make_lists(&$controller, &$request, &$user);
    $this->_make_top_lists(&$controller, &$request, &$user);
          
    $controller->redirect("/manage/index.php/module/ManageInfo?b=".sprintf("%d",$user->getAttribute("branch_id")));
    return VIEW_NONE;
  }

  function _make_lists(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    $pages=new Pages;

    $tmp=$article_manager->get_info_list($user->getAttribute("branch_id"));
    if($tmp){

      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
            $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
            $val["is_time_over"]=1;
          }
          array_push($data,$val);
        }
      }

      $renderer= new CustomSmartyRenderer($controller, $request, $user);
      $renderer->setTemplate('info_list.html');
  
      $renderer->setAttribute("data",$data);

      $renderer->setAttribute("branch_id",$user->getAttribute("branch_id"));
      $renderer->setAttribute("branch_name",$branch[$user->getAttribute("branch_id")]);
    
      $renderer->setAttribute("script_path",SCRIPT_PATH);
    
      $renderer->setAttribute("include_base",'../../../../../html');
    
      $renderer->setMode(RENDER_VAR);
      $body=$renderer->fetchResult($controller, $request, $user);

      $pages->mySaveFile(
        $body,
        SONPO_BRANCH_FILE_DIR.$branch_file[$user->getAttribute("branch_id")]."/list.html"
      );

    }

    return;
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocms');
  }

}

?>
