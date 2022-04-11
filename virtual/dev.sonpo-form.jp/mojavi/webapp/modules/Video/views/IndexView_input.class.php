<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View{

  function & execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate('form.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    
    $renderer->setAttribute("prefs",$prefs);
    
    $renderer->setAttribute("token",$request->getAttribute("token"));

    $renderer->setAttribute("jenre",$request->getAttribute("jenre"));
    $renderer->setAttribute("video_id",$request->getAttribute("video_id"));
    $renderer->setAttribute("vname",$request->getAttribute("vname"));
    $renderer->setAttribute("vurl",$request->getAttribute("vurl"));
    $renderer->setAttribute("nvideo",$request->getAttribute("nvideo"));

    $renderer->setAttribute("years",range(date("Y"),date("Y")+2));
    $renderer->setAttribute("months",range(1,12));
    $renderer->setAttribute("days",range(1,31));

    $renderer->setAttribute(
      "syear_ini",
      date(
        "Y",
        mktime(0,0,0,date("m"),date("d")+3,date("Y"))
      )
    );
    $renderer->setAttribute(
      "smonth_ini",
      date(
        "m",
        mktime(0,0,0,date("m"),date("d")+3,date("Y"))
      )
    );
    $renderer->setAttribute(
      "sday_ini",
      date(
        "d",
        mktime(0,0,0,date("m"),date("d")+3,date("Y"))
      )
    );
    $renderer->setAttribute(
      "eyear_ini",
      date(
        "Y",
        mktime(0,0,0,date("m"),date("d")+9,date("Y"))
      )
    );
    $renderer->setAttribute(
      "emonth_ini",
      date(
        "m",
        mktime(0,0,0,date("m"),date("d")+9,date("Y"))
      )
    );
    $renderer->setAttribute(
      "eday_ini",
      date(
        "d",
        mktime(0,0,0,date("m"),date("d")+9,date("Y"))
      )
    );

    
    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("errors",$request->getErrors());
    
    return $renderer;
  }
}
?>
