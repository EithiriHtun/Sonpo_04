<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class DocListView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('doclist.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      return $renderer;
    }

  }
?>
