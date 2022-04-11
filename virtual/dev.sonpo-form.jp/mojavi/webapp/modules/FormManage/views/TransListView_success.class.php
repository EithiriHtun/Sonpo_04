<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class TransListView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('translist.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $renderer->setAttribute("inst_status",$inst_status);
      $renderer->setAttribute("trans_status",$trans_status);

      $renderer->setAttribute("year",   $request->getAttribute("year"));
      $renderer->setAttribute("nbranch",$request->getAttribute("nbranch"));
      $renderer->setAttribute("tstatus2",$request->getAttribute("tstatus2"));
      
      $renderer->setAttribute("taisyou",$taisyou);
      $renderer->setAttribute("branch",$branch);
      $renderer->setAttribute("branch_no",$branch_no);
      foreach($branch_no as $key=>$val){
        $branch_no2[$key]=$branch[$val];
      }
      $renderer->setAttribute("branch_no2",$branch_no2);
      $renderer->setAttribute("mybranch",$user->getAttribute("branch"));
      
      $renderer->setAttribute("years",$request->getAttribute("years"));
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      return $renderer;
    }

  }
?>
