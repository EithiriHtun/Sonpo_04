<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class DefaultIndexView extends View{
  function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('index.html');
      
      $types = array('all','pr','nr','in','pz');
      foreach($types as $val){
        $renderer->setAttribute("list_".$val,$request->getAttribute("list_".$val));
      }

      $scrolls = $request->getAttribute("scrolls");
      $renderer->setAttribute("scrolls",$scrolls);
      $renderer->setAttribute("count_scrolls",count($scrolls));

      $topimage = $request->getAttribute("topimage");
      $renderer->setAttribute("topimage",$topimage);
      $renderer->setAttribute("sort_suffix",$request->getAttribute("sort_suffix"));
      
      for($i=1;$i<13;$i++){
        if(file_exists(SONPO_IMAGE_DIR."top_".$i.".jpg")){
          $renderer->setAttribute("image_".$i."_name","top_".$i.".jpg");
          $filename=SONPO_IMAGE_DIR."top_".$i.".jpg";
        }
        if(file_exists(SONPO_IMAGE_DIR."top_".$i.".gif")){
          $renderer->setAttribute("image_".$i."_name","top_".$i.".gif");
          $filename=SONPO_IMAGE_DIR."top_".$i.".gif";
        }
        if(file_exists(SONPO_IMAGE_DIR."top_".$i.".png")){
          $renderer->setAttribute("image_".$i."_name","top_".$i.".png");
          $filename=SONPO_IMAGE_DIR."top_".$i.".png";
        }
        $picsize=getimagesize(
          $filename
        );
        $renderer->setAttribute("image_".$i."_width",$picsize[0]);
        $renderer->setAttribute("image_".$i."_height",$picsize[1]);

        $filename='';
      }

      for($i=4;$i<12;$i++){
        $is_visible[$i] = $topimage['is_visible_'.$i];

        $opensec[$i] = $topimage['opensec_'.$i];
        $url[$i]     = $topimage['url_'.$i];
        $target[$i]  = $topimage['target_'.$i];
      
        if(file_exists(SONPO_IMAGE_DIR."top_".$i.".jpg")){
          $image_name[$i] = "top_".$i.".jpg";
          $filename=SONPO_IMAGE_DIR."top_".$i.".jpg";
        }
        if(file_exists(SONPO_IMAGE_DIR."top_".$i.".gif")){
          $image_name[$i] = "top_".$i.".gif";
          $filename=SONPO_IMAGE_DIR."top_".$i.".gif";
        }
        if(file_exists(SONPO_IMAGE_DIR."top_".$i.".png")){
          $image_name[$i] = "top_".$i.".png";
          $filename=SONPO_IMAGE_DIR."top_".$i.".png";
        }
        $picsize=getimagesize(
          $filename
        );
        $image_width[$i]  = $picsize[0];
        $image_height[$i] = $picsize[1];

        $filename='';
      }
      $renderer->setAttribute("image_name",  $image_name);
      $renderer->setAttribute("image_width", $image_width);
      $renderer->setAttribute("image_height",$image_height);

      $renderer->setAttribute("is_visible", $is_visible);
      $renderer->setAttribute("opensec", $opensec);
      $renderer->setAttribute("url",     $url);
      $renderer->setAttribute("target",  $target);

      $renderer->setAttribute("image_url",SONPO_IMAGE_URL);

      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      $renderer->setAttribute("branch_file",$branch_file);
      $renderer->setAttribute("branch_sname",$branch_sname);
      
      $renderer->setAttribute("include_base",'../../../../../html');

      return $renderer;
  }

}
?>
