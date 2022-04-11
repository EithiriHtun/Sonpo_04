<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class TestListNewsView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('index.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $renderer->setAttribute("year",$request->getAttribute("year"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      $renderer->setAttribute("include_base",'../../../../../test33.sonpo.or.jp');
      
      return $renderer;
    }

  }
?>
