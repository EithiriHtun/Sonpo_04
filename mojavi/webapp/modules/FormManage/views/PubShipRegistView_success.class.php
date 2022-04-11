<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubShipRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("pubshipdetail.html");

    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("prefs",$prefs);

    $renderer->setAttribute("pub_order_type",$pub_order_type);

    $renderer->setAttribute("trans_status",$pub_trans_status);
    $renderer->setAttribute("settle_status",$pub_settle_status);
    
    $renderer->setAttribute("years", range(2009,date("Y")+1));
    $renderer->setAttribute("months", range(1,12));
    $renderer->setAttribute("days", range(1,31));

    $renderer->setAttribute("errors",$request->getErrors());

    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
    $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
    $renderer->setAttribute("is_sassi",$user->getAttribute("is_sassi"));
    $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));

    return $renderer;
  }
}
?>
