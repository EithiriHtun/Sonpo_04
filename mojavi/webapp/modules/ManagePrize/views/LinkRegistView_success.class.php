<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class LinkRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("linkfinish.html");
    
    $renderer->setAttribute("strhtml",$request->getAttribute("strhtml"));
    
    return $renderer;
  }
}
?>
