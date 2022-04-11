<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class FileRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("fileform.html");
    
    $data=$user->getAttribute("filedata");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("errors",$request->getErrors());
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);

    return $renderer;
  }
}
?>
