<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexView extends View {
  function &execute(&$controller, &$request, &$user) {
  
    $renderer= new CustomSmartyRenderer(
      $controller, $request, $user
    );
    
    $renderer->setTemplate("form.html");
    
    $renderer->setAttribute(
      "image_name",
      $user->getAttribute("image_name")
    );
    $renderer->setAttribute(
      "image_width",
      $user->getAttribute("image_width")
    );
    $renderer->setAttribute(
      "image_height",
      $user->getAttribute("image_height")
    );
    
    $renderer->setAttribute(
      "url",
      $user->getAttribute("url")
    );
    $renderer->setAttribute(
      "target",
      $user->getAttribute("target")
    );
    $renderer->setAttribute(
      "anime_pattern",
      $user->getAttribute("anime_pattern")
    );
    $renderer->setAttribute(
      "is_visible",
      $user->getAttribute("is_visible")
    );
    $renderer->setAttribute(
      "opensec",
      $user->getAttribute("opensec")
    );
    $renderer->setAttribute(
      "sort_num",
      $user->getAttribute("sort_num")
    );
    
    $sort_num = $user->getAttribute("sort_num");
    $filedate = $user->getAttribute("filedate");
    
    foreach($sort_num as $key=>$val){
      $sortdata[$key] = array(
        'suffix' => $val,
        'date'   => $filedate[$key],
        'id'     => $key
      );
      $suffix[$key] = $val;
      $fdate[$key] = strtotime($filedate[$key]);
    }
    
    array_multisort($suffix, SORT_ASC, $fdate, SORT_DESC, $sortdata);
    
    foreach($sortdata as $val){
      $sort_suffix[$val['id']] = $val['suffix'];
    }
    
    $renderer->setAttribute(
      "sort_suffix",
      $sort_suffix
    );

    $renderer->setAttribute("image_url",SONPO_TEMP_IMAGE_URL);
    
    $renderer->setAttribute("rndnum",sprintf("%03d",rand(1,999)));

    $renderer->setAttribute("errors",$request->getErrors());
    
    $renderer->setAttribute("script_path",SCRIPT_PATH);

    return $renderer;
  }
}
?>
