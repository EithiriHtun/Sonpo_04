<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class VideoIndexView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('videoindex.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $renderer->setAttribute("video_status",$video_status);
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      $renderer->setAttribute("l_status",$user->getAttribute("l_status"));
      $renderer->setAttribute("l_year",  $user->getAttribute("l_year"));
      $renderer->setAttribute("l_month", $user->getAttribute("l_month"));
      
      $renderer->setAttribute("years",array_reverse(range(2008,date("Y"))));
      $renderer->setAttribute("months",range(1,12));
      
      return $renderer;
    }

  }
?>
