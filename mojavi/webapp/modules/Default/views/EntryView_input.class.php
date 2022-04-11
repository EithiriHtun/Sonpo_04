<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class EntryView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('entry.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("months",range(1,12));
    $renderer->setAttribute("days",range(1,31));
    
    $renderer->setAttribute("schools",$schools);
    $renderer->setAttribute("school_ids",range(1,count($schools)));
    $renderer->setAttribute("emp_type",$emp_type);
    $renderer->setAttribute("emp_ids",range(1,count($emp_type)));
    $renderer->setAttribute("level",$level);
    $renderer->setAttribute("elevel_ids",range(1,count($level)));
    $renderer->setAttribute("llevel_ids",range(1,3));
    
    $earn=array();
    for($i=1;$i<40;$i++){
      $earn[$i]=($i-1)*50+100;
    }
    $renderer->setAttribute("earn",$earn);
    $renderer->setAttribute("earn_id",range(1,39));
    
    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
