<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."../FormManage/config/config.php");
    require($controller->getModuleDir()."config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('form2.html');
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("books",$request->getAttribute("books"));
    $renderer->setAttribute("category",$pub_category);
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("prefs",$prefs);
    

    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
