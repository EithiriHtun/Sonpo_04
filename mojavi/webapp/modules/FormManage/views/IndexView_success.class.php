<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class IndexView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('index.html');
      
      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      $renderer->setAttribute("branch",$user->getAttribute("branch"));
      
      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      $renderer->setAttribute('pw_alert',$user->getAttribute('pw_alert'));
      $pw_limit_date = $user->getAttribute('pw_limit_date');
      $renderer->setAttribute(
        'pw_limit_date',
        date( "YÇ¯n·îjÆü", strtotime($pw_limit_date) )
      );
      $renderer->setAttribute('previous_login_time',$user->getAttribute('previous_login_time'));
      return $renderer;
    }

  }
?>
