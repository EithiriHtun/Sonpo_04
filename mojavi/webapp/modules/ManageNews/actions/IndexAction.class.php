<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

  class IndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      $fyear=(date("m")*1<4)? date("Y")-1 : date("Y");
      $year=$request->getParameter("y") ? 
        $request->getParameter("y") 
      : 
        $fyear;
      $article_manager=new ArticleManager($DB);
      $tmp=$article_manager->get_admin_news_list($year);
      $this_year=(date("Y")+1)*1;
      while(!$tmp && date("Y")*1-$this_year<20){
        $tmp=$article_manager->get_admin_news_list($this_year--);
      }

      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if($val["upload_filename"] && file_exists(SONPO_NEWS_FILE_DIR.$val["upload_filename"].'.html')){
            $val["is_file"]=1;
          }elseif(file_exists(SONPO_NEWS_FILE_DIR.$val["open_year"]."/".$val["filename"].'.html')){
            $val["is_file"]=1;
          }
          if(strtotime($val["file_date"])-strtotime($val["update_date"])>=0){
            $val["is_file_new"]=1;
          }
          if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
            $val["is_time_over"]=1;
          }
          array_push($data,$val);
        }
      }

      $request->setAttribute("data",$data);

      $years=$article_manager->get_news_list_years();
      $request->setAttribute("years",$years);

      $request->setAttribute("year",$year);

      return VIEW_SUCCESS;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpocms');
    }

  }
?>
