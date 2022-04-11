<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class InstRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."../Instructor/config/config.php");
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("instpreview.html");

    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("prefs",$prefs);
    $renderer->setAttribute("status",$inst_status);

    $renderer->setAttribute("theme",$theme);

    $renderer->setAttribute("taisyou"       ,$taisyou);
    $renderer->setAttribute("inst_type"     ,$inst_type);
    $renderer->setAttribute("branch"        ,$branch);
    $renderer->setAttribute("shiryou"       ,$shiryou);
    $renderer->setAttribute("inst_condition",$inst_condition);

    $renderer->setAttribute("years",range(date("Y")-2,date("Y")+2));
    $renderer->setAttribute("months",range(1,12));
    $renderer->setAttribute("days",range(1,31));
    
    $renderer->setAttribute("hours",range(0,24));
    $renderer->setAttribute(
      "mins",
      array('00','05','10','15','20','25','30','35','40','45','50','55')
    );
    

    $renderer->setAttribute("popmsg",$request->getAttribute("popmsg"));

    $renderer->setAttribute("errors",$request->getErrors());

    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
    $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
    $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));

    $renderer->setAttribute("nstatus", $request->getParameter("st"));
    $renderer->setAttribute("year",    $request->getParameter("y"));
    $renderer->setAttribute("ntaisyou",$request->getParameter("ts"));
    $renderer->setAttribute("nbranch", $request->getParameter("br"));
    
    $renderer->setAttribute("books", $request->getAttribute("books"));

    $renderer->setAttribute("doclist", $request->getAttribute("doclist"));
    $renderer->setAttribute("sdocs", $data["sdocs"]);

    $renderer->setAttribute("books", $request->getAttribute("books"));

    return $renderer;
  }
}
?>
