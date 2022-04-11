<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class InstAddView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/../Instructor/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('addthanks.html');
    
    $renderer->setAttribute("prefs",@$prefs);
    $renderer->setAttribute("types",@$types);
    
    $renderer->setAttribute("year",$request->getParameter('y'));
    $renderer->setAttribute("nbranch",$request->getParameter('br'));
    $renderer->setAttribute("status",$request->getParameter('st'));
    $renderer->setAttribute("ntaisyou",$request->getParameter('ts'));
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));

    return $renderer;
  }
}
?>
