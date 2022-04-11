<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class RegistView extends View {
  function &execute(&$controller, &$request, &$user) {
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("form.html");
    
    $data=$user->getAttribute("data");

    $data["open_year"] =$data["open_year"] ? $data["open_year"] : date("Y");
    $data["open_month"]=$data["open_month"] ? $data["open_month"] : date("m");
    $data["open_day"]  =$data["open_day"] ? $data["open_day"] : date("d");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("errors",$request->getErrors());
    
    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("script_path",SCRIPT_PATH);
    $renderer->setAttribute("year",$user->getAttribute("year"));
    
    $renderer->setAttribute("open_years",range(1998,date("Y")+5));
    $renderer->setAttribute("open_months",range(1,12));
    $renderer->setAttribute("open_days",range(1,31));
    $renderer->setAttribute("open_hours",range(0,23));

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      

    return $renderer;
  }
}
?>
