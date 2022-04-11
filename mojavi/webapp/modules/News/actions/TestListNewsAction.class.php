<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

  class TestListNewsAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      $fyear=(date("m")*1<4)? date("Y")-1 : date("Y");
      $year=$request->getParameter("y") ? 
        $request->getParameter("y") 
      : 
        $fyear;

      $article_manager=new ArticleManager($DB);
      $tmp=$article_manager->get_news_list($year);
      $years=$article_manager->get_open_news_list_years();
      
      if(!count($tmp)){
        if($years){
          foreach($years as $key=>$val){
            $tmp=$article_manager->get_news_list($key);
            if($tmp){
              $year=$key;
              break;
            }
          }
        }
      }
      
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

      $request->setAttribute("data",$data);
      $request->setAttribute("years",$years);
      $request->setAttribute("year",$year);
      
      return VIEW_SUCCESS;
    }

  }
?>
