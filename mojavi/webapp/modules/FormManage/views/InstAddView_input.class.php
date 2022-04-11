<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class InstAddView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."/../Instructor/config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('addform.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("prefs",$prefs);
    
    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    //$renderer->setAttribute("theme",$theme);
    $theme2 = array();
    foreach($theme as $key=>$val){
      if($key<>5 && $key<>6 && $key<>7 && $key<>8){
        $theme2[$key] = $val;
      }
    }
    $renderer->setAttribute("theme",$theme2);
    
    $renderer->setAttribute("years",range(date("Y")-2,date("Y")+2));
    $renderer->setAttribute("months",range(1,12));
    $renderer->setAttribute("days",range(1,31));
    
    $renderer->setAttribute("hours",range(8,21));
    $renderer->setAttribute(
      "mins",
      array('00','05','10','15','20','25','30','35','40','45','50','55')
    );
    
    
    $renderer->setAttribute("errors",$request->getErrors());
    
    $renderer->setAttribute("year",$request->getParameter('y'));
    $renderer->setAttribute("nbranch",$request->getParameter('br'));
    $renderer->setAttribute("status",$request->getParameter('st'));
    $renderer->setAttribute("ntaisyou",$request->getParameter('ts'));
    
    $renderer->setAttribute("taisyou",$taisyou);
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));

    return $renderer;
  }
}
?>
