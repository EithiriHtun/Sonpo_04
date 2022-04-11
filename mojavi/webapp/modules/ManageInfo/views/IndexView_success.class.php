<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class IndexView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."../Default/config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('index.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      
      $renderer->setAttribute("branch_name",$branch[$user->getAttribute("branch_id")]);
      $renderer->setAttribute("branch_file",$branch_file);
      $renderer->setAttribute("branch_id",$user->getAttribute("branch_id"));
      
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      return $renderer;
    }

  }
?>
