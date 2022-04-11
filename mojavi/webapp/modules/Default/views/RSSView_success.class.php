<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class RSSView extends View{
  function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('rss.xml');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);
      $renderer->setAttribute("tab",$request->getAttribute("tab"));
      
      $renderer->setAttribute("site_url",SONPO_SITE_URL);
      $renderer->setAttribute("this_time",time());

      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      return $renderer;
  }
}
?>
