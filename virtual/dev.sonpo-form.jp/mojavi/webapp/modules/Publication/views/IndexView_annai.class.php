<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $pub_open_data = $request->getAttribute("pub_open_data");

    $renderer->setAttribute("do_close",$pub_open_data['do_close']);
    $renderer->setAttribute("message",$pub_open_data['message']);

    $renderer->setTemplate('annai.html');
    
    return $renderer;
  }
}
?>
