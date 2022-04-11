<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class LogdlView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('logmenu.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      
      $renderer->setAttribute("years",range(2021,date("Y")));
      $renderer->setAttribute("months",range(1,12));
      $renderer->setAttribute("days",range(1,31));
      $renderer->setAttribute("hours",range(0,23));
      $renderer->setAttribute("mins",array(0,10,20,30,40,50));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      return $renderer;
    }

  }
?>
