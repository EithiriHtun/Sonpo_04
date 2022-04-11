<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PasswordRequestView extends View {
  function &execute(&$controller, &$request, &$user) {
    
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    
    $renderer->setTemplate("pw_reset_request.html");
    
    $renderer->setAttribute(
      'login_error_message',
      $request->getAttribute('login_error_message')
    );
    
    return $renderer;
  }
}
?>
