<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

  class ListNewsAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      $fyear=(date("m")*1<4)? date("Y")-1 : date("Y");
      $year=$request->getParameter("y") ? 
        $request->getParameter("y") 
      : 
        $fyear;

      $article_manager=new ArticleManager($DB);
      $tmp=$article_manager->get_release_list();
      
      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if(
            time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
            mktime(0,0,0,$val['open_month'],$val['open_day'],$val['open_year']) >= mktime(0,0,0,date("m")-1,1,date("Y"))
          ){
            $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
            $val["is_time_over"]=1;
          }
          array_push($data,$val);
        }
      }

      $request->setAttribute("data",$data);
      $request->setAttribute("year",$year);
      
      return VIEW_SUCCESS;
    }

  }
?>
