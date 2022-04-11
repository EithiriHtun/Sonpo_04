<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View {
  function &execute(&$controller, &$request, &$user) {
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("form.html");
    
    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);
    
    $renderer->setAttribute("articles",$request->getAttribute('articles'));

    $renderer->setAttribute("iter",range(1,5));

    $renderer->setAttribute("image_url",SONPO_IMAGE_URL);
    
    $renderer->setAttribute("errors",$request->getErrors());
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);

    $renderer->setAttribute("open_years",range(2002,date("Y")+5));
    $renderer->setAttribute("open_months",range(1,12));
    $renderer->setAttribute("open_days",range(1,31));
    $renderer->setAttribute("open_hours",range(0,23));

    return $renderer;
  }
}
?>
