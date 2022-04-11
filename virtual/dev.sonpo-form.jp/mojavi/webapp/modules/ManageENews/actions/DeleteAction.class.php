<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');
require_once(LIB_DIR.'Pages.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class DeleteAction extends DBAction {

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
        unlink(SONPO_EN_NEWS_FILE_DIR.$data["upload_filename"].'.html');
      }
      unlink(SONPO_EN_NEWS_FILE_DIR.$data["open_year"]."/".$article_manager->get_filename($id).'.html');
      $article_manager->delete_article($id);
    }

    // 関連のリストを更新する
    $this->_make_lists(&$controller, &$request, &$user);
    $this->_make_en_top_lists(&$controller, &$request, &$user);
    
    $controller->redirect("/manage/index.php/module/ManageENews?y=".$data["open_year"]);
    return VIEW_NONE;
  }

  function _make_lists(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    // 年リストを取ってくる
    $years=$article_manager->get_open_en_news_list_years();
    
    $pages=new Pages;

    $month_en = array(
      1  => 'Jan.',
      2  => 'Feb.',
      3  => 'March',
      4  => 'April',
      5  => 'May',
      6  => 'June',
      7  => 'July',
      8  => 'Aug.',
      9  => 'Sep.',
      10 => 'Oct.',
      11 => 'Nov.',
      12 => 'Dec.'
    );

    foreach($years as $key=>$val){
      $tmp=$article_manager->get_en_news_list($key);
      if($tmp){


        $data=array();
        if($tmp){
          foreach($tmp as $val){
          if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
              $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
              $val["is_time_over"]=1;
              $val["open_date"]=mktime(
                0,0,0,
                $val["open_month"],
                $val["open_day"],
                $val["open_year"]
              );
              $val["open_date_en"] = $month_en[$val['open_month']].' '.$val['open_day']*1.', '.$val['open_year'];
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
      
        $renderer->setMode(RENDER_VAR);
        $body=$renderer->fetchResult($controller, $request, $user);

        $pages->mySaveFile(
          $body,
          SONPO_EN_NEWS_FILE_DIR."list/".sprintf("%04d",$key).'.html'
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
