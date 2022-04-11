<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class UploadView extends View {
  function &execute(&$controller, &$request, &$user) {
    require($controller->getModuleDir()."../Contact/config/config.php");
    require($controller->getModuleDir()."config/config.php");
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );

    $renderer->setTemplate("form.html");

    $data=$user->getAttribute("data");

    $renderer->setAttribute("data",$data);

    $renderer->setAttribute("types",$types);
    $renderer->setAttribute("prefs",$prefs);
    $renderer->setAttribute("status",$status);

    $renderer->setAttribute("popmsg",$request->getAttribute("popmsg"));

    $renderer->setAttribute("errors",$request->getErrors());

    $renderer->setAttribute("script_path",SCRIPT_PATH);
    
    if(file_exists(SONPO_PDF_DIR."Kaitou_".$data["comment_id"].".pdf")){
      $renderer->setAttribute("pdf_name","Kaitou_".$data["comment_id"].".pdf");
    }

    $renderer->setAttribute("is_master",$user->getAttribute("is_master"));

    return $renderer;
  }
}
?>
