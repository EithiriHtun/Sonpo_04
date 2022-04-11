<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

  class IndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      $year=$request->getParameter("y") ? 
        $request->getParameter("y") 
      : 
        date("Y");

      $article_manager=new ArticleManager($DB);
      $tmp=$article_manager->get_admin_release_list($year);
      $this_year=(date("Y")+1)*1;
      while(!$tmp && date("Y")*1-$this_year<20){
        $tmp=$article_manager->get_admin_release_list($this_year--);
      }
      $years=$article_manager->get_release_list_years();
      
      $data=array();
      if($tmp){
        foreach($tmp as $val){
          $val["is_file"]=0;
          $val["is_file_new"]=0;

          if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
            $val["is_time_over"]=1;
            if(mktime(0,0,0,$val['open_month'],$val['open_day'],$val['open_year']) >= mktime(0,0,0,date("m")-1,1,date("Y"))){
              $val["in_open"]=1;
            }else{
              $val["in_open"]=0;
            }
          }
          array_push($data,$val);
        }
      }

      $request->setAttribute("data",$data);
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
