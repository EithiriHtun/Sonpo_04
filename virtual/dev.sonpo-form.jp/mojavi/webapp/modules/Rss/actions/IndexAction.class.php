<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');
require_once(LIB_DIR.'TopImageManager.php');

class IndexAction extends DBAction{
  function execute (&$controller, &$request, &$user){

    if(file_exists(SONPO_RSS_FILE_DIR."rss.xml")){
      $body = file_get_contents(SONPO_RSS_FILE_DIR."rss.xml");
    }
    
    header("Content-Type: text/html; charset=shift-jis");
    echo mb_convert_encoding($body,'EUC-JP','SJIS');

/*
    $DB=$request->getAttribute('db');

    $tab=$request->getParameter("t") ? 
      $request->getParameter("t") 
    : 
      "";

    $article_manager=new ArticleManager($DB);
    $tmp=$article_manager->get_top_list($tab);
    
    $data=array();
    if($tmp){
      foreach($tmp as $val){
        if(
            time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
          count($data)<10
        ){
          $val["is_time_over"]=1;
          array_push($data,$val);
        }
      }
    }

    $request->setAttribute("data",$data);
    $request->setAttribute("tab",$tab);
    
    return VIEW_SUCCESS;
*/
  }
  
}
?>
