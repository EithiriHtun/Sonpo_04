<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

require_once(LIB_DIR.'Pages.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

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

    // 関連のリストを更新する
    $this->_make_lists(&$controller, &$request, &$user);
    $this->_make_top_lists(&$controller, &$request, &$user);

    $controller->redirect("/manage/index.php/module/ManageNews?y=".$data["open_year"]);
    return VIEW_NONE;
  }

  function _make_lists(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    // 年リストを取ってくる
    $years=$article_manager->get_open_news_list_years();
    
    $pages=new Pages;

    foreach($years as $key=>$val){
      $tmp=$article_manager->get_news_list($key);
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
        $renderer->setTemplate('news_list.html');
    
        $renderer->setAttribute("data",$data);
        $renderer->setAttribute("years",$years);
        $renderer->setAttribute("year",$key);

        $renderer->setAttribute("script_path",SCRIPT_PATH);
        $renderer->setAttribute("include_base",'../../../../../html');
      
        $renderer->setMode(RENDER_VAR);
        $body=$renderer->fetchResult($controller, $request, $user);

        $pages->mySaveFile(
          $body,
          SONPO_NEWS_FILE_DIR."list/".sprintf("%04d",$key).'.html'
        );

      }
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
