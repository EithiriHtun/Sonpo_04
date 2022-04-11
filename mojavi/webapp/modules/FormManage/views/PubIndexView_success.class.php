<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class PubIndexView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('pubindex.html');
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      $renderer->setAttribute("is_sassi",$user->getAttribute("is_sassi"));

      return $renderer;
    }

  }
?>
