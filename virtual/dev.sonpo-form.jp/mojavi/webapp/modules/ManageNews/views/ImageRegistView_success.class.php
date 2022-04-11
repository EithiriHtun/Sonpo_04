<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class ImageRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("imagefinish.html");
    
    $renderer->setAttribute("strhtml",$request->getAttribute("strhtml"));
    $renderer->setAttribute("n",$request->getAttribute("n"));
    $renderer->setAttribute("len",$request->getAttribute("len"));
    
    return $renderer;
  }
}
?>
