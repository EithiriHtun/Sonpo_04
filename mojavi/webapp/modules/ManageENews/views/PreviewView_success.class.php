<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PreviewView extends View {
  function &execute(&$controller, &$request, &$user) {
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("preview.html");
    
    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("operation",$request->getAttribute("operation"));

    $renderer->setAttribute("image_name",$user->getAttribute("image_name"));
    $renderer->setAttribute("random_num","#".rand(1,999));
    $renderer->setAttribute("image_width",$user->getAttribute("image_width"));
    $renderer->setAttribute(
      "image_height",$user->getAttribute("image_height")
    );
    $renderer->setAttribute("image_dir",COTTON_TEMP_IMAGE_URL);
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);
    
    return $renderer;
  }
}
?>
