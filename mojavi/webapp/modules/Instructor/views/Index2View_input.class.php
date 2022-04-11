<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class Index2View extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('form_nenmatsu.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("prefs",$prefs);
    $renderer->setAttribute("types",$types);
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
