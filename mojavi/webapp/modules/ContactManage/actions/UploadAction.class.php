<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ContactManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class UploadAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

//echo 'upload';

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("imagedata");
    $commentdata=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");

    $contact_manager=new ContactManager($DB);
    $data=$contact_manager->get_one($id);
    if(!$data["id"]){
      die("cannot find data.");
    }
    
    switch ($request->getParameter("mode")){
    
      case "submit":
      
      // PDFの保存
      $reg_image_name="Kaitou_".sprintf("%010d",$commentdata["comment_id"]).".pdf";
      if(
        $user->getAttribute("pdf_name") && 
        file_exists(SONPO_TEMP_PDF_DIR.$user->getAttribute("pdf_name"))
      ){
        if(
          copy(
            SONPO_TEMP_PDF_DIR.$user->getAttribute("pdf_name"),
            SONPO_PDF_DIR.$reg_image_name
          )
        ){
          unlink(SONPO_TEMP_PDF_DIR.$user->getAttribute("pdf_name"));
          $user->setAttribute("pdf_name",$reg_image_name);
        }else{
          die("cannot copy file.");
        }
        
        $contact_manager->set_fileupload($id);
        
      }
      

      $user->setAttribute("imagedata","");

      $user->setAttribute("pdf_name","");

      $controller->redirect('/manage/contact/index.php/module/ContactManage/action/Regist?id='.sprintf("%d",$id));
      return VIEW_NONE;
      
//      return VIEW_INPUT;
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

      $img_name=$_FILES['file1']['name'];
      $img_type=$_FILES['file1']['type'];
      $img_size=intval(floor($_FILES['file1']['size'] / 1024));
      $img_tmp_name=$_FILES['file1']['tmp_name'];

      if(is_uploaded_file($img_tmp_name)){
        if(
          ($img_type=="application/pdf")     || 
          ($img_type=="application/x-pdf")
        ){
          if ($img_size <= SONPO_PDF_MAX_SIZE){
            $file_type="pdf";
            
            $img_name  =md5(uniqid(rand())).".".$file_type;
            $sourcefile=SONPO_TEMP_PDF_DIR.$img_name;
            copy ($img_tmp_name, $sourcefile);
        
            $user->setAttribute('pdf_name',$img_name);

          }else{
            $validatorManager->setRequired(
              "invalid_file_size", 
              true, 
              "画像ファイルの容量が大きすぎます。"
            );
          }
        }else{
          $validatorManager->setRequired(
            "invalid_file_type", 
            true, 
            "ファイルが選択されていません。または、ファイルがPDF形式ではありません。"
          );
        }
      }
      
      if(!$user->getAttribute("pdf_name")){
        $validatorManager->setRequired(
          "no_file", 
          true, 
          "PDFが選択されていません。"
        );
      }

    }

  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocontact');
  }

}

?>
