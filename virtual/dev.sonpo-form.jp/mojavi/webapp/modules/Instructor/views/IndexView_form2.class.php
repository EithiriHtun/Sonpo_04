<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('form2.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("prefs",$prefs);
    $theme2 = array();
    foreach($theme as $key=>$val){
      if($key<>5 && $key<>6 && $key<>7 && $key<>8){
        $theme2[$key] = $val;
      }
    }
    $renderer->setAttribute("theme",$theme2);
    
    $renderer->setAttribute("years",range(date("Y"),date("Y")+2));
    $renderer->setAttribute("months",range(1,12));
    $renderer->setAttribute("days",range(1,31));
    
    $renderer->setAttribute("hours",range(8,21));
    $renderer->setAttribute(
      "mins",
      array('00','05','10','15','20','25','30','35','40','45','50','55')
    );
    
    $renderer->setAttribute("taisyou",$taisyou);
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
