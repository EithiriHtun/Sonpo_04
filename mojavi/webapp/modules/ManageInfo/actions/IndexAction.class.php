<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

  class IndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."../Default/config/config.php");
      $DB=$request->getAttribute('db');

      $user->setAttribute("branch_id","");

      $branch_id=$request->getParameter("b") ? 
        $request->getParameter("b") 
      : 
        '';

      $article_manager=new ArticleManager($DB);
      $tmp=$article_manager->get_admin_info_list($branch_id);
      
      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if(file_exists(SONPO_BRANCH_FILE_DIR.$branch_file[$val["branch"]]."/".$val["filename"].'.html')){
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
      $user->setAttribute("branch_id",$branch_id);
      
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
