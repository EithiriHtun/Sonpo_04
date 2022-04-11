<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class TestListInfoView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."../Default/config/config.php");
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('index.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $renderer->setAttribute("branch_id",$request->getAttribute("branch_id"));
      $renderer->setAttribute("branch_name",$branch[$request->getAttribute("branch_id")]);
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      $renderer->setAttribute("include_base",'../../../../../test33.sonpo.or.jp');
      
      return $renderer;
    }

  }
?>
