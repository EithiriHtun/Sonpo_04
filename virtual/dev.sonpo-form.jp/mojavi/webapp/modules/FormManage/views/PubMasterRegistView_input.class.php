<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubMasterRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."../Contact/config/config.php");
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("pubmasterform.html");

    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("popmsg",$request->getAttribute("popmsg"));

    $renderer->setAttribute("errors",$request->getErrors());

    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
    
    $renderer->setAttribute("sassi_users",$request->getAttribute("sassi_users"));

    $renderer->setAttribute("showrange",$pub_showrange);

    $renderer->setAttribute("categories",$pub_category);
    return $renderer;
  }
}
?>
