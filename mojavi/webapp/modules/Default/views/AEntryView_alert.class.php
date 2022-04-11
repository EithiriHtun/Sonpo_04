<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class AEntryView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('confirm_a.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("months",range(1,12));
    $renderer->setAttribute("days",range(1,31));
    
    $renderer->setAttribute("schools",$schools);
    $renderer->setAttribute("emp_type",$emp_type);
    $renderer->setAttribute("level",$level);
    
    $earn=array();
    for($i=1;$i<40;$i++){
      $earn[$i]=($i-1)*50+100;
    }
    $renderer->setAttribute("earn",$earn);
    
    $renderer->setAttribute("submit_date",date("Y-m-d"));
    
    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
