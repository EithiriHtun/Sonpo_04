<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class AuthView extends View {
  function &execute(&$controller, &$request, &$user) {
    
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    
    $renderer->setTemplate("login.html");
    
    $renderer->setAttribute(
      'login_error_message',
      $request->getAttribute('login_error_message')
    );
    
    return $renderer;
  }
}
?>
