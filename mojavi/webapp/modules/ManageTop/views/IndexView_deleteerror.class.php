<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View {
  function &execute(&$controller, &$request, &$user) {
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("deleteerror.html");

    return $renderer;
  }
}
?>
