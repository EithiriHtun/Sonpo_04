<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class RegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("preview.html");
    
    $data=$user->getAttribute("data");
    
    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("randnum","#".rand(1,999));
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);
    
    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));

//    $renderer->setAttribute("status",$status);
//    $renderer->setAttribute("types",$types);
    
    return $renderer;
  }
}
?>
