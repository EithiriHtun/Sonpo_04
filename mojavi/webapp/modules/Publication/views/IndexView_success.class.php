<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."../FormManage/config/config.php");
    require($controller->getModuleDir()."/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('thanks.html');
    
    $renderer->setAttribute("data",$request->getAttribute("data"));
    
    $renderer->setAttribute("prefs",$prefs);
    
    $renderer->setAttribute("books",$request->getAttribute("books"));
    $renderer->setAttribute("category",$pub_category);
    
    
    return $renderer;
  }
}
?>
