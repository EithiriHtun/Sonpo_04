<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class ListNewInfoView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      require($controller->getModuleDir()."../Default/config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('new_info.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $renderer->setAttribute("years",$request->getAttribute("years"));
      $renderer->setAttribute("year",$request->getAttribute("year"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);

      $renderer->setAttribute("branch_file",$branch_file);
      $renderer->setAttribute("branch_sname",$branch_sname);
      
      $renderer->setAttribute("include_base",'../../../../../html');
      
      return $renderer;
    }

  }
?>
