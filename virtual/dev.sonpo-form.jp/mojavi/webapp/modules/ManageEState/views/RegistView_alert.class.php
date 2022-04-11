<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class RegistView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("preview.html");
    
    $data=$user->getAttribute("data");
    $data["open_date"]=mktime(
      0,0,0,
      $data["open_month"],$data["open_day"],$data["open_year"]
    );
    
    $month_en = array(
      1  => 'Jan.',
      2  => 'Feb.',
      3  => 'March',
      4  => 'April',
      5  => 'May',
      6  => 'June',
      7  => 'July',
      8  => 'Aug.',
      9  => 'Sep.',
      10 => 'Oct.',
      11 => 'Nov.',
      12 => 'Dec.'
    );
    $data["open_date_en"] = $month_en[$data['open_month']].' '.$data['open_day']*1.', '.$data['open_year'];

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("randnum","#".rand(1,999));
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);
    
    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));

//    $renderer->setAttribute("status",$status);
//    $renderer->setAttribute("types",$types);
    
    return $renderer;
  }
}
?>
