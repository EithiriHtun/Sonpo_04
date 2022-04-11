<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubMakeOrderView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    require($controller->getModuleDir()."../Publication/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('pubmakeorderform2.html');
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("books",$request->getAttribute("books"));
    $renderer->setAttribute("category",$pub_category);
    
    $renderer->setAttribute("address_type",$pub_address_type);
    
    $renderer->setAttribute("years", range(date("Y"),date("Y")+3));
    $renderer->setAttribute("months", range(1,12));
    $renderer->setAttribute("days", range(1,31));

    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("prefs",$prefs);
    
    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
