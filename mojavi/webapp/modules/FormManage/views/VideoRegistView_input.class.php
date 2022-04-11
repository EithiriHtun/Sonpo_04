<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class VideoRegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."../Video/config/config.php");
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("videoform.html");

    $data=$user->getAttribute("data");

    if(@$data['rent_date']){
      $data['rent_year'] =date("Y",strtotime($data['rent_date']));
      $data['rent_month']=date("m",strtotime($data['rent_date']));
      $data['rent_day']  =date("d",strtotime($data['rent_date']));
    }
    if(@$data['back_date']){
      $data['back_year'] =date("Y",strtotime($data['back_date']));
      $data['back_month']=date("m",strtotime($data['back_date']));
      $data['back_day']  =date("d",strtotime($data['back_date']));
    }

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("prefs",$prefs);
    $renderer->setAttribute("status",$video_status);

    $renderer->setAttribute("popmsg",$request->getAttribute("popmsg"));

    $renderer->setAttribute("errors",$request->getErrors());

    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
    $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));

    $renderer->setAttribute("years", array_reverse(range(2009,date("Y")+1)));
    $renderer->setAttribute("months", range(1,12));
    $renderer->setAttribute("days", range(1,31));

    return $renderer;
  }
}
?>
