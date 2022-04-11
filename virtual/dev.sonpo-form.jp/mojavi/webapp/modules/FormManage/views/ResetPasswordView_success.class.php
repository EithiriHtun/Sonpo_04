<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class ResetPasswordView extends View {
  function &execute(&$controller, &$request, &$user) {
    
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    
    $renderer->setTemplate("pw_reset_input_finish.html");
    
    return $renderer;
  }
}
?>
