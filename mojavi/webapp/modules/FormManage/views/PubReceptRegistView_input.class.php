<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubReceptRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("pubreceptform.html");

    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("prefs",$prefs);

    $renderer->setAttribute("pub_order_type",$pub_order_type);

    $renderer->setAttribute("approve",$pub_approve);
    
    $renderer->setAttribute("years", range(2009,date("Y")+1));
    $renderer->setAttribute("months", range(1,12));
    $renderer->setAttribute("days", range(1,31));

    $renderer->setAttribute("errors",$request->getErrors());

    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
    $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
    $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));

    return $renderer;
  }
}
?>
