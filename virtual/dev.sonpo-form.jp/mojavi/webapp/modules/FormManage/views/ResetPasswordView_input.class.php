<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class ResetPasswordView extends View {
  function &execute(&$controller, &$request, &$user) {
    
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    
    $renderer->setTemplate("pw_reset_input.html");
    
    $renderer->setAttribute(
      'login_error_message',
      $request->getAttribute('login_error_message')
    );
    
    $renderer->setAttribute('reset_token',$user->getAttribute('reset_token'));
    
    return $renderer;
  }
}
?>
