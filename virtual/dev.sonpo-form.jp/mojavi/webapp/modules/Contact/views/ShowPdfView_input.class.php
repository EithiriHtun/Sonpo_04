<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class ShowPdfView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('pdfform.html');
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
