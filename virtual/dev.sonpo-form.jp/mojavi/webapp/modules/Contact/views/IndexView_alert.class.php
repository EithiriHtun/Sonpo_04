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
    $renderer->setAttribute("types",$types);
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    return $renderer;
  }
}
?>
