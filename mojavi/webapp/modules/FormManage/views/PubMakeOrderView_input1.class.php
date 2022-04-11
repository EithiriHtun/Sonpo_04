<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubMakeOrderView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    require($controller->getModuleDir()."../Publication/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('pubmakeorderform1.html');
    
    $renderer->setAttribute("books",$request->getAttribute("books"));
    $renderer->setAttribute("category",$pub_category);
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
