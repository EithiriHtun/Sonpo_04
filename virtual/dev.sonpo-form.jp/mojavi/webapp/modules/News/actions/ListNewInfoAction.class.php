<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

  class ListNewInfoAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      mb_language('Japanese');
      if(file_exists(SONPO_NEWS_FILE_DIR."list/new_info.html")){
        $body = file_get_contents(SONPO_NEWS_FILE_DIR."list/new_info.html");
      }
      
      header("Content-Type: text/html; charset=shift-jis");
      echo mb_convert_encoding($body,'EUC-JP','SJIS');

//      $year=(date("m")*1>3) ? date("Y") : date("Y")*1 - 1 ;
/*
      $article_manager=new ArticleManager($DB);
      $tmp=$article_manager->get_all_new_list();
      $years=$article_manager->get_open_all_list_years();
      
      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if(
            time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
            count($data)<51
          ){
            $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
            $val["is_time_over"]=1;
            array_push($data,$val);
          }
        }
      }

      $request->setAttribute("data",$data);
      $request->setAttribute("years",$years);
      $request->setAttribute("year",$year);
      
      return VIEW_SUCCESS;
*/
    }

  }
?>
