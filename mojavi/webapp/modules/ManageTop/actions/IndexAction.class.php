<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'TopImageManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

class IndexAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');

    if(!$request->getErrors()){
      $user->setAttribute("data",'');
      for($i=1;$i<13;$i++){
        $is_image[$i]     = '';
        $image_name[$i]   = '';
        $image_width[$i]  = '';
        $image_height[$i] = '';
      }
      $user->setAttribute("is_image",    $is_image);
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);
    }

    if(!$request->getErrors()){

      $article_manager= new TopImageManager($DB);
      $data=$article_manager->get_one(1);
      
      if(!$data){
        $controller->redirect("/manage/index.php");
        return VIEW_NONE;
      }

      for($i=1;$i<13;$i++){
        $url[$i]    = $data['url_'.$i];
        $target[$i] = $data['target_'.$i];

        $temp_image_name=$this->CopyImage2Temp(
          'top_'.$i,
          SONPO_IMAGE_DIR,
          SONPO_TEMP_IMAGE_DIR
        );
        $image_name[$i] = $temp_image_name;
        if($temp_image_name){
          $picsize=getimagesize(
            SONPO_TEMP_IMAGE_DIR.$temp_image_name
          );
          $image_width[$i]  = $picsize[0];
          $image_height[$i] = $picsize[1];
        }else{
          $image_width[$i]  = '';
          $image_height[$i] = '';
        }
      }
      for($i=4;$i<12;$i++){
        $is_visible[$i] = $data['is_visible_'.$i];
        $opensec[$i]    = $data['opensec_'.$i];
        $sort_num[$i]   = $data['sort_num_'.$i];
        $filedate[$i]   = $this->GetImageDate('top_'.$i,SONPO_IMAGE_DIR);
      }

      $user->setAttribute("url",$url);
      $user->setAttribute("target",$target);
      $user->setAttribute("is_visible",$is_visible);
      $user->setAttribute("opensec",$opensec);
      $user->setAttribute("sort_num",$sort_num);
      $user->setAttribute("filedate",$filedate);
      $user->setAttribute("anime_pattern",$data['anime_pattern']);
      
      $user->setAttribute("image_name",$image_name);
      $user->setAttribute("image_width",$image_width);
      $user->setAttribute("image_height",$image_height);

      $user->setAttribute("data",$data);

    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    for($i=1;$i<13;$i++){
      $url[$i]    = $data['url_'.$i];
      $target[$i] = $data['target_'.$i];
    }

    for($i=4;$i<12;$i++){
      $is_visible[$i] = $data['is_visible_'.$i];
      $opensec[$i]    = $data['opensec_'.$i];
      $sort_num[$i]   = $data['sort_num_'.$i];
    }
    $anime_pattern = $data['anime_pattern'];

    $image_name   = $user->getAttribute("image_name");
    $image_width  = $user->getAttribute("image_width");
    $image_height = $user->getAttribute("image_height");
    
    switch ($request->getParameter("mode")){
    
      case "rewrite":
      
      $user->setAttribute("url",   $url);
      $user->setAttribute("target",$target);

      return VIEW_INPUT;

      case "delete_image_1":
      
      if(!$this->_check_exist_images(array('top_2','top_3'))){
        return deleteerror;
      }
      
      $image_name[1]   = '';
      $image_width[1]  = '';
      $image_height[1] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_1');
      
      return VIEW_INPUT;
      
      case "delete_image_2":
      
      if(!$this->_check_exist_images(array('top_1','top_3'))){
        return deleteerror;
      }
      
      $image_name[2]   = '';
      $image_width[2]  = '';
      $image_height[2] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_2');
      
      return VIEW_INPUT;
      
      case "delete_image_3":
      
      if(!$this->_check_exist_images(array('top_1','top_2'))){
        return deleteerror;
      }
      
      $image_name[3]   = '';
      $image_width[3]  = '';
      $image_height[3] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_3');
      
      return VIEW_INPUT;
      
      case "delete_image_4":
      
      if(!$this->_check_exist_images(array('top_5','top_6','top_7','top_8'))){
        return deleteerror;
      }
      $image_name[4]   = '';
      $image_width[4]  = '';
      $image_height[4] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_4');
      
      return VIEW_INPUT;
      
      case "delete_image_5":
      
      if(!$this->_check_exist_images(array('top_4','top_6','top_7','top_8'))){
        return deleteerror;
      }
      $image_name[5]   = '';
      $image_width[5]  = '';
      $image_height[5] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_5');
      
      return VIEW_INPUT;
      
      case "delete_image_6":
      
      if(!$this->_check_exist_images(array('top_4','top_5','top_7','top_8'))){
        return deleteerror;
      }
      $image_name[6]   = '';
      $image_width[6]  = '';
      $image_height[6] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_6');
      
      return VIEW_INPUT;
      
      case "delete_image_7":
      
      if(!$this->_check_exist_images(array('top_4','top_5','top_6','top_8'))){
        return deleteerror;
      }
      $image_name[7]   = '';
      $image_width[7]  = '';
      $image_height[7] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_7');
      
      return VIEW_INPUT;
      
      case "delete_image_8":
      
      if(!$this->_check_exist_images(array('top_4','top_5','top_6','top_7'))){
        return deleteerror;
      }
      $image_name[8]   = '';
      $image_width[8]  = '';
      $image_height[8] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_8');
      
      return VIEW_INPUT;
      
      case "delete_image_9":
      
      $image_name[9]   = '';
      $image_width[9]  = '';
      $image_height[9] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_9');
      
      return VIEW_INPUT;
      
      case "delete_image_10":
      
      $image_name[10]   = '';
      $image_width[10]  = '';
      $image_height[10] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_10');
      
      return VIEW_INPUT;
      
      case "delete_image_11":
      
      $image_name[11]   = '';
      $image_width[11]  = '';
      $image_height[11] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_11');
      
      return VIEW_INPUT;
      
      case "delete_image_12":
      
      $image_name[12]   = '';
      $image_width[12]  = '';
      $image_height[12] = '';
      
      $user->setAttribute("image_name",  $image_name);
      $user->setAttribute("image_width", $image_width);
      $user->setAttribute("image_height",$image_height);

      $this->DeleteImage(SONPO_IMAGE_DIR,'top_12');
      
      return VIEW_INPUT;
      
      case "submit":
      
      $article_manager=new TopImageManager($DB);
      

      $temp_image_name   = $user->getAttribute("temp_image_name");
      $temp_image_width  = $user->getAttribute("temp_image_width");
      $temp_image_height = $user->getAttribute("temp_image_height");

      for($i=1;$i<13;$i++){
        if($temp_image_name[$i]){

          // 画像*の保存
          if(preg_match("/jpg$/",$temp_image_name[$i])){
            $reg_image_name[$i]="top_$i.jpg";
          }elseif(preg_match("/png$/",$temp_image_name[$i])){
            $reg_image_name[$i]="top_$i.png";
          }elseif(preg_match("/gif$/",$temp_image_name[$i])){
            $reg_image_name[$i]="top_$i.gif";
          }
          if(
            $temp_image_name[$i] && 
            file_exists(SONPO_TEMP_IMAGE_DIR.$temp_image_name[$i])
          ){
            if(file_exists(SONPO_IMAGE_DIR."top_$i.jpg")){
              unlink(SONPO_IMAGE_DIR."top_$i.jpg");
            }
            if(file_exists(SONPO_IMAGE_DIR."top_$i.gif")){
              unlink(SONPO_IMAGE_DIR."top_$i.gif");
            }
            if(file_exists(SONPO_IMAGE_DIR."top_$i.png")){
              unlink(SONPO_IMAGE_DIR."top_$i.png");
            }
            copy(
              SONPO_TEMP_IMAGE_DIR.$temp_image_name[$i],
              SONPO_IMAGE_DIR.$reg_image_name[$i]
            );
            unlink(SONPO_TEMP_IMAGE_DIR.$temp_image_name[$i]);
          }
        }else{
          $reg_image_name[$i]="";
        }
      }
//      $user->setAttribute("image_name",$reg_image_name);
      
      $article_manager->update($url,$target,$anime_pattern,$is_visible,$opensec,$sort_num,1);
      
      $user->setAttribute("data","");

      $user->setAttribute("temp_image_name","");
      $user->setAttribute("temp_image_width","");
      $user->setAttribute("temp_image_height","");
      $user->setAttribute("is_image","");

      $controller->redirect("/manage/index.php/module/ManageTop");
      return VIEW_NONE;
    }
  }

  function getRequestMethods(){
    return REQ_POST;
  }
  
  function validate (&$controller, &$request, &$user){
    return TRUE;
  }
  
  function _is_nobanner(){
    $is_banner = 0;
    for($i=1;$i<4;$i++){
      if(file_exists(SONPO_IMAGE_DIR."top_$i.jpg")){
        $is_banner = 1;
      }
      if(file_exists(SONPO_IMAGE_DIR."top_$i.gif")){
        $is_banner = 1;
      }
      if(file_exists(SONPO_IMAGE_DIR."top_$i.png")){
        $is_banner = 1;
      }
    }
    if($is_banner==1){
      return false;
    }else{
      return true;
    }
  }
  
  function _is_image($image){
    $is_image = 0;
    if(file_exists(SONPO_IMAGE_DIR.$image.".jpg")){
      $is_image = 1;
    }
    if(file_exists(SONPO_IMAGE_DIR.$image.".gif")){
      $is_image = 1;
    }
    if(file_exists(SONPO_IMAGE_DIR.$image.".png")){
      $is_image = 1;
    }
    if($is_image==1){
      return true;
    }else{
      return false;
    }
  }

  function _check_exist_images($images){
    $is_images = 0;
    foreach($images as $val){
      if(file_exists(SONPO_IMAGE_DIR.$val.".jpg")){
        $is_images = 1;
      }
      if(file_exists(SONPO_IMAGE_DIR.$val.".gif")){
        $is_images = 1;
      }
      if(file_exists(SONPO_IMAGE_DIR.$val.".png")){
        $is_images = 1;
      }
    }
    if($is_images==1){
      return true;
    }else{
      return false;
    }
  }
  
  function registerValidators(&$validatorManager, &$controller, &$request, &$user) {
//    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');
    
    $data=$request->getParameters();
    
    if($data["mode"]=="submit"){

      for($i=4;$i<12;$i++){
        if(
          !$_FILES['image_'.$i]['tmp_name'] && 
          !$this->_is_image('top_'.$i) &&
          $data['is_visible_'.$i]==1
        ){
          $data['is_visible_'.$i]=0;
        }
      }

      $user->setAttribute(
        "data",
        $data
      );

      if((!$_FILES['image_1']['tmp_name'] && !$_FILES['image_2']['tmp_name'] && !$_FILES['image_3']['tmp_name']) && $this->_is_nobanner()){
        $validatorManager->setRequired(
          "invalid_banner", 
          true, 
          "バナー画像は少なくともひとつは登録してください。"
        );
      }

      if(
        (
          (
            !$_FILES['image_4']['tmp_name'] && 
            !$this->_is_image('top_4')
          ) || 
          !$data['is_visible_4'] &&
          (
            $_FILES['image_4']['tmp_name'] || 
            $this->_is_image('top_4')
          )
        ) &&
        (
          (
            !$_FILES['image_5']['tmp_name'] && 
            !$this->_is_image('top_5')
          ) || 
          !$data['is_visible_5'] &&
          (
            $_FILES['image_5']['tmp_name'] || 
            $this->_is_image('top_5')
          )
        ) &&
        (
          (
            !$_FILES['image_6']['tmp_name'] && 
            !$this->_is_image('top_6')
          ) || 
          !$data['is_visible_6'] &&
          (
            $_FILES['image_6']['tmp_name'] || 
            $this->_is_image('top_6')
          )
        ) &&
        (
          (
            !$_FILES['image_7']['tmp_name'] && 
            !$this->_is_image('top_7')
          ) || 
          !$data['is_visible_7'] &&
          (
            $_FILES['image_7']['tmp_name'] ||
            $this->_is_image('top_7')
          )
        ) &&
        (
          (
            !$_FILES['image_8']['tmp_name'] && 
            !$this->_is_image('top_8')
          ) || 
          !$data['is_visible_8'] &&
          (
            $_FILES['image_8']['tmp_name'] ||
            $this->_is_image('top_8')
          )
        ) &&
        (
          (
            !$_FILES['image_9']['tmp_name'] && 
            !$this->_is_image('top_9')
          ) || 
          !$data['is_visible_9'] &&
          (
            $_FILES['image_9']['tmp_name'] ||
            $this->_is_image('top_9')
          )
        ) &&
        (
          (
            !$_FILES['image_10']['tmp_name'] && 
            !$this->_is_image('top_10')
          ) || 
          !$data['is_visible_10'] &&
          (
            $_FILES['image_10']['tmp_name'] ||
            $this->_is_image('top_10')
          )
        ) &&
        (
          (
            !$_FILES['image_11']['tmp_name'] && 
            !$this->_is_image('top_11')
          ) || 
          !$data['is_visible_11'] &&
          (
            $_FILES['image_11']['tmp_name'] ||
            $this->_is_image('top_11')
          )
        )
      ){
        $validatorManager->setRequired(
          "invalid_banner", 
          true, 
          "メインビジュアルA画像は少なくともひとつは登録して表示するようにしてください。"
        );
      }

      for($i=1;$i<13;$i++){

        //$img_name=$_FILES['image_'.$i]['name'];
        $img_type=$_FILES['image_'.$i]['type'];
        $img_size=intval(floor($_FILES['image_'.$i]['size'] / 1024));
        $img_tmp_name=$_FILES['image_'.$i]['tmp_name'];

        if(is_uploaded_file($img_tmp_name)){
          if(
            (
             ($img_type=="image/png")      || 
             ($img_type=="image/x-png")    ||
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
              }elseif($img_type=="image/png" || $img_type=="image/x-png"){
                $file_type="png";
              }else{
                $file_type="gif";
              }
              
              $img_name[$i] = md5(uniqid(rand())).".".$file_type;
              $sourcefile=SONPO_TEMP_IMAGE_DIR.$img_name[$i];
              copy ($img_tmp_name, $sourcefile);
          

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

/*
              // リサイズ（表示用）
              $image_ratio=$picsize[0]/$picsize[1];
              if($image_ratio>1){
                if($picsize[0]>SONPO_TOPIMAGE_WIDTH){
                  $width[$i] =SONPO_TOPIMAGE_WIDTH;
                }else{
                  $width[$i] =$picsize[0];
                }
                $height[$i]=intval(floor($width[$i]/$image_ratio));
              }else{
                if($picsize[1]*$image_ratio>SONPO_TOPIMAGE_WIDTH){
                  $height[$i]=intval(floor(SONPO_TOPIMAGE_WIDTH/$image_ratio));
                  $width[$i] =SONPO_IMAGE_WIDTH;
                }else{
                  $height[$i]=$picsize[1];
                  $width[$i] =$picsize[0];
                }
              }
  // for GD
              $newimage=imagecreatetruecolor($width[$i],$height[$i]);
              if($file_type=="jpg"){
                $sourceimage=imagecreatefromjpeg($sourcefile);
              }elseif($file_type=="png"){
                $sourceimage=imagecreatefrompng($sourcefile);
              }else{
                $sourceimage=imagecreatefromgif($sourcefile);
              }
            
              imagecopyresampled(
                $newimage,
                $sourceimage,
                0,0,0,0,
                $width[$i],$height[$i],$picsize[0],$picsize[1]
              );
              if($file_type=="jpg"){
                imagejpeg($newimage,$sourcefile,100);
              }elseif($file_type=="png"){
                imagepng($newimage,$sourcefile);
              }else{
                imagegif($newimage,$sourcefile);
              }
*/            

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

      $user->setAttribute('temp_image_name',$img_name);
      $user->setAttribute('temp_image_width', $width);
      $user->setAttribute('temp_image_height',$height);

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
    }elseif(
      file_exists($from_dir.$image_name.".png")
    ){
      unlink (
        $from_dir.$image_name.".png"
      );
      return $image_name.".png";
    }
    return '';
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocms');
  }

  function CopyImage2Temp ($image_name, $from_dir, $to_dir){
    
    if(
      file_exists($from_dir.$image_name.".jpg")
    ){
      copy (
        $from_dir.$image_name.".jpg", 
        $to_dir.$image_name.".jpg"
      );
      return $image_name.".jpg";
    }elseif(
      file_exists($from_dir.$image_name.".gif")
    ){
      copy (
        $from_dir.$image_name.".gif", 
        $to_dir.$image_name.".gif"
      );
      return $image_name.".gif";
    }elseif(
      file_exists($from_dir.$image_name.".png")
    ){
      copy (
        $from_dir.$image_name.".png", 
        $to_dir.$image_name.".png"
      );
      return $image_name.".png";
    }
    return '';
  }

  function GetImageDate ($image_name, $from_dir){
    $filedate = '';

    if(
      file_exists($from_dir.$image_name.".jpg")
    ){
      $filedate = date("Y-m-d H:i:s", filemtime($from_dir.$image_name.".jpg")); 
      return $filedate;
    }elseif(
      file_exists($from_dir.$image_name.".gif")
    ){
      $filedate = date("Y-m-d H:i:s", filemtime($from_dir.$image_name.".gif")); 
      return $filedate;
    }elseif(
      file_exists($from_dir.$image_name.".png")
    ){
      $filedate = date("Y-m-d H:i:s", filemtime($from_dir.$image_name.".png")); 
      return $filedate;
    }
    return '';
  }

}

?>
