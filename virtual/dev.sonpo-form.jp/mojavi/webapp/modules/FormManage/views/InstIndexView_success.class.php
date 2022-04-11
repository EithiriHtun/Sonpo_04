<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class InstIndexView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('instindex.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $data2=$request->getAttribute("data2");
      $renderer->setAttribute("data2",$data2);
      $renderer->setAttribute("inst_status",$inst_status);
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      return $renderer;
    }

  }
?>
