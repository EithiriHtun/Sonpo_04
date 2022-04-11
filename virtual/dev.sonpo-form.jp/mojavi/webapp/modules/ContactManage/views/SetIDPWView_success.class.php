<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class SetIDPWView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."../Contact/config/config.php");
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("userfinish.html");

    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));

    return $renderer;
  }
}
?>
