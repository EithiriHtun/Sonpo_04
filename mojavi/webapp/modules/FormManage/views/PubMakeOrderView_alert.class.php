<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubMakeOrderView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/config/config.php");
    require($controller->getModuleDir()."../Publication/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('pubmakeorderconfirm.html');
    
    $renderer->setAttribute("prefs",$prefs);
    $renderer->setAttribute("books",$request->getAttribute("books"));
    $renderer->setAttribute("category",$pub_category);

//    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    return $renderer;
  }
}
?>
