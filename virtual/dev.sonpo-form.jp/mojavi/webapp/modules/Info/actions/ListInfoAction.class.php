<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

  class ListInfoAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."../Default/config/config.php");

      $DB=$request->getAttribute('db');

      foreach($branch_file as $key=>$val){
        $dir_name='/branch/'.$val;
        if(ereg($dir_name,$_SERVER['SCRIPT_NAME'])){
          $branch_id=$key;
        }
      }

      mb_language('Japanese');
      if(file_exists(SONPO_BRANCH_FILE_DIR.$branch_file[$branch_id]."/list.html")){
        $body = file_get_contents(SONPO_BRANCH_FILE_DIR.$branch_file[$branch_id]."/list.html");
      }
      
      header("Content-Type: text/html; charset=shift-jis");
      echo mb_convert_encoding($body,'EUC-JP','SJIS');

/*
      $article_manager=new ArticleManager($DB);
      $tmp=$article_manager->get_info_list($branch_id);
      
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
      $request->setAttribute("branch_id",$branch_id);
      
      return VIEW_SUCCESS;
*/
    }

  }
?>
