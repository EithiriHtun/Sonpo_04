<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubOpenRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."../Contact/config/config.php");
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("pubopenform.html");

    $data=$user->getAttribute("data");

    $renderer->setAttribute("script_path",SCRIPT_PATH);
      
    $renderer->setAttribute("data",$data);

    return $renderer;
  }
}
?>
