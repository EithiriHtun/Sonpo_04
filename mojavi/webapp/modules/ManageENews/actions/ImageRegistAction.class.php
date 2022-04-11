<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ImageManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class ImageRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');

    if(!$request->getErrors()){
      $user->setAttribute("imagedata",'');
      $user->setAttribute("is_image_1",'');
      $user->setAttribute("image_1_name",'');
      $user->setAttribute("image_1_width",'');
      $user->setAttribute("image_1_height",'');
      $user->setAttribute("is_image_2",'');
      $user->setAttribute("image_2_name",'');
      $user->setAttribute("image_2_width",'');
      $user->setAttribute("image_2_height",'');
    }

    if(!$request->getErrors()){

      $user->setAttribute("imagedata",$data);

    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("imagedata");
    
    $id=$user->getAttribute("id");
    
    switch ($request->getParameter("mode")){
    
      case "rewrite":

      $request->setAttribute("imagedata",$data);
      return VIEW_INPUT;

      case "delete_image_1":
      
      $user->setAttribute("image_1_name","");
      $user->setAttribute("image_1_width","");
      $user->setAttribute("image_1_height","");
      
      return VIEW_INPUT;
      
      case "delete_image_2":
      
      $user->setAttribute("image_2_name","");
      $user->setAttribute("image_2_width","");
      $user->setAttribute("image_2_height","");
      
      return VIEW_INPUT;
      
      case "submit":
      
      $image_manager=new ImageManager($DB);
      
      $image_id=$image_manager->insert();

      // 画像1の保存
      if(preg_match("/jpg$/",$user->getAttribute("image_1_name"))){
        $reg_image_name=sprintf("%05d",$image_id).".jpg";
      }elseif(preg_match("/gif$/",$user->getAttribute("image_1_name"))){
        $reg_image_name=sprintf("%05d",$image_id).".gif";
      }
      if(
        $user->getAttribute("image_1_name") && 
        file_exists(SONPO_TEMP_IMAGE_DIR.$user->getAttribute("image_1_name"))
      ){
        copy(
          SONPO_TEMP_IMAGE_DIR.$user->getAttribute("image_1_name"),
          SONPO_IMAGE_DIR.$reg_image_name
        );
        unlink(SONPO_TEMP_IMAGE_DIR.$user->getAttribute("image_1_name"));
        $user->setAttribute("image_1_name",$reg_image_name);
      }
      
      
      if($user->getAttribute("image_2_name")){

        $image_id=$image_manager->insert();

        // 画像2の保存
        if(preg_match("/jpg$/",$user->getAttribute("image_2_name"))){
          $reg_image_name=sprintf("%05d",$image_id).".jpg";
        }elseif(preg_match("/gif$/",$user->getAttribute("image_2_name"))){
          $reg_image_name=sprintf("%05d",$image_id).".gif";
        }
        if(
          $user->getAttribute("image_2_name") && 
          file_exists(SONPO_TEMP_IMAGE_DIR.$user->getAttribute("image_2_name"))
        ){
          copy(
            SONPO_TEMP_IMAGE_DIR.$user->getAttribute("image_2_name"),
            SONPO_IMAGE_DIR.$reg_image_name
          );
          unlink(SONPO_TEMP_IMAGE_DIR.$user->getAttribute("image_2_name"));
          $user->setAttribute("image_2_name",$reg_image_name);
        }
        
      }
      
      $strhtml=$this->myMakePage($controller, $request, $user);
      $request->setAttribute("strhtml",$strhtml);
      $request->setAttribute("n",$user->getAttribute("n"));
      $request->setAttribute("len",$user->getAttribute("len"));
      

      $user->setAttribute("imagedata","");

      $user->setAttribute("image_1_name","");
      $user->setAttribute("image_1_width","");
      $user->setAttribute("image_1_height","");
      $user->setAttribute("is_image_1","");
      $user->setAttribute("image_2_name","");
      $user->setAttribute("image_2_width","");
      $user->setAttribute("image_2_height","");
      $user->setAttribute("is_image_2","");
      $user->setAttribute("n","");
      $user->setAttribute("len","");

      return VIEW_SUCCESS;
    }
  }

  function getRequestMethods(){
    return REQ_POST;
  }
  
  function validate (&$controller, &$request, &$user){
    return TRUE;
  }
  
  function registerValidators(&$validatorManager, &$controller, &$request, &$user) {
//    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');
    
    $data=$request->getParameters();
    
    if($data["mode"]=="submit"){
      $user->setAttribute(
        "imagedata",
        $data
      );

      for($i=1;$i<3;$i++){

        $img_name=$_FILES['image_'.$i]['name'];
        $img_type=$_FILES['image_'.$i]['type'];
        $img_size=intval(floor($_FILES['image_'.$i]['size'] / 1024));
        $img_tmp_name=$_FILES['image_'.$i]['tmp_name'];

        if(is_uploaded_file($img_tmp_name)){
          if(
            (
             ($img_type=="image/jpeg")     || 
             ($img_type=="image/pjpeg")    ||
             ($img_type=="image/gif")      ||
             ($img_type=="image/x-citrix-pjpeg")||
             ($img_type=="image/x-citrix-gif")
            )
          ){
            if ($img_size <= SONPO_IMAGE_MAX_SIZE){
              if($img_type=="image/jpeg" || $img_type=="image/pjpeg" || $img_type=="image/x-citrix-pjpeg"){
                $file_type="jpg";
              }else{
                $file_type="gif";
              }
              
              $img_name  =md5(uniqid(rand())).".".$file_type;
              $sourcefile=SONPO_TEMP_IMAGE_DIR.$img_name;
              copy ($img_tmp_name, $sourcefile);
          
              $user->setAttribute('image_'.$i.'_name',$img_name);

              $picsize=getimagesize($sourcefile);
              
              if($picsize[0]>SONPO_IMAGE_MAX_WIDTH){
                $validatorManager->setRequired(
                  "invalid_file_width", 
                  true, 
                  "画像ファイル".$i."のサイズ（幅）が大きすぎます。"
                );
              }
              if($picsize[1]>SONPO_IMAGE_MAX_HEIGHT){
                $validatorManager->setRequired(
                  "invalid_file_height", 
                  true, 
                  "画像ファイル".$i."のサイズ（縦）が大きすぎます。"
                );
              }

              // リサイズ（表示用）
              $image_ratio=$picsize[0]/$picsize[1];
              if($image_ratio>1){
                if($picsize[0]>SONPO_IMAGE_WIDTH){
                  $width =SONPO_IMAGE_WIDTH;
                }else{
                  $width=$picsize[0];
                }
                $height=intval(floor($width/$image_ratio));
              }else{
                if($picsize[1]*$image_ratio>SONPO_IMAGE_WIDTH){
                  $height=intval(floor(SONPO_IMAGE_WIDTH/$image_ratio));
                  $width =SONPO_IMAGE_WIDTH;
                }else{
                  $height=$picsize[1];
                  $width =$picsize[0];
                }
              }
  //* for GD
              $newimage   =imagecreatetruecolor($width,$height);
              if($file_type=="jpg"){
                $sourceimage=imagecreatefromjpeg($sourcefile);
              }else{
                $sourceimage=imagecreatefromgif($sourcefile);
              }
            
              imagecopyresampled(
                $newimage,
                $sourceimage,
                0,0,0,0,
                $width,$height,$picsize[0],$picsize[1]
              );
              if($file_type=="jpg"){
                imagejpeg($newimage,$sourcefile,80);
              }else{
                imagegif($newimage,$sourcefile);
              }
            
              $user->setAttribute('image_'.$i.'_width', $width);
              $user->setAttribute('image_'.$i.'_height',$height);

            }else{
              $validatorManager->setRequired(
                "invalid_file_size", 
                true, 
                "画像ファイル".$i."の容量が大きすぎます。"
              );
            }
          }else{
            $validatorManager->setRequired(
              "invalid_file_type", 
              true, 
            "画像が選択されていません。または、画像ファイルがjpeg形式もしくはgif形式ではありません。"
            );
          }
        }
      
      }
      
      if(!$user->getAttribute("image_1_name")){
        $validatorManager->setRequired(
          "no_file_type", 
          true, 
          "画像１が選択されていません。"
        );
      }

    }

  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

  function DeleteImage ($from_dir,$image_name){
    if(
      file_exists($from_dir.$image_name.".jpg")
    ){
      unlink (
        $from_dir.$image_name.".jpg"
      );
      return $image_name.".jpg";
    }elseif(
      file_exists($from_dir.$image_name.".gif")
    ){
      unlink (
        $from_dir.$image_name.".gif"
      );
      return $image_name.".gif";
    }
    return '';
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocms');
  }

  function myMakePage(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('imagepart.html');
    
    $renderer->setAttribute("data",$user->getAttribute("imagedata"));
    
    $renderer->setAttribute("image_1_name",$user->getAttribute("image_1_name"));
    $renderer->setAttribute("image_1_width",$user->getAttribute("image_1_width"));
    $renderer->setAttribute("image_1_height",$user->getAttribute("image_1_height"));

    $renderer->setAttribute("image_2_name",$user->getAttribute("image_2_name"));
    $renderer->setAttribute("image_2_width",$user->getAttribute("image_2_width"));
    $renderer->setAttribute("image_2_height",$user->getAttribute("image_2_height"));

    $renderer->setAttribute("image_url",SONPO_IMAGE_URL);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    $data=$user->getAttribute("imagedata");
    
    $tmp=explode("<!--%%midashi%%-->",$data["content"]);
    $n=mb_strlen($tmp[0]);
    
    $strhtml=preg_replace("/<!--%%midashi%%-->/",$body,$data["content"]);
    
    //<!--%%midashi%%-->までの文字数
    $user->setAttribute("n",$n);
    //$bodyの長さ
    $user->setAttribute("len",mb_strlen($body));
    
    return $strhtml;
  }
  

}

?>
