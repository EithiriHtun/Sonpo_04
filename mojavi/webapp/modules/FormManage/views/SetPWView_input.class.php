<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class SetPWView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."../Contact/config/config.php");
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("pwform.html");

    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("popmsg",$request->getAttribute("popmsg"));

    $renderer->setAttribute("errors",$request->getErrors());

    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
    $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
    $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));

    return $renderer;
  }
}
?>
