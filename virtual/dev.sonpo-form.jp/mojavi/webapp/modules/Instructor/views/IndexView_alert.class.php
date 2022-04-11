<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('confirm.html');
    
    $renderer->setAttribute("prefs",$prefs);
    $renderer->setAttribute("theme",$theme);
    
    $renderer->setAttribute("taisyou",$taisyou);

    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("date_warn_1",$request->getAttribute("date_warn_1"));
    $renderer->setAttribute("date_warn_2",$request->getAttribute("date_warn_2"));

    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    return $renderer;
  }
}
?>
