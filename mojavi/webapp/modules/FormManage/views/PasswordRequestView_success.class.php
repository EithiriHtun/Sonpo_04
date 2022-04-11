<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PasswordRequestView extends View {
  function &execute(&$controller, &$request, &$user) {
    
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    
    $renderer->setTemplate("pw_reset_request_finish.html");
    
    return $renderer;
  }
}
?>
