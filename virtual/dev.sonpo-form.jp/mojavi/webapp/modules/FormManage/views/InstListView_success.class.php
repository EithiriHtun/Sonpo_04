<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class InstListView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."../Instructor/config/config.php");
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('instlist.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $renderer->setAttribute("inst_status",$inst_status);

      $renderer->setAttribute("status", $request->getAttribute("status"));
      $renderer->setAttribute("year",   $request->getAttribute("year"));
      $renderer->setAttribute("ntaisyou",$request->getAttribute("ntaisyou"));
      $renderer->setAttribute("nbranch",$request->getAttribute("nbranch"));
      $renderer->setAttribute("taisyou_count",$request->getAttribute("taisyou_count"));
      
      $renderer->setAttribute("taisyou",$taisyou);
      $renderer->setAttribute("branch",$branch);
      $renderer->setAttribute("branch_no",$branch_no);
      foreach($branch_no as $key=>$val){
        $branch_no2[$key]=$branch[$val];
      }
      $renderer->setAttribute("branch_no2",$branch_no2);
      $renderer->setAttribute("mybranch",$user->getAttribute("branch"));
      $renderer->setAttribute("theme",$theme);
      
      $renderer->setAttribute("years",$request->getAttribute("years"));
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      $renderer->setAttribute("action_memory_usage",round($request->getAttribute('action_memory_usage')/1024/1024,2));
      $renderer->setAttribute("action_memory_usage2",round($request->getAttribute('action_memory_usage2')/1024/1024,2));
      $renderer->setAttribute("memory_usage",round(memory_get_usage(TRUE)/1024/1024,2));
      
      return $renderer;
    }

  }
?>
