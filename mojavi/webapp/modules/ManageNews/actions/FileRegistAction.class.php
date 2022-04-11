<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'FileManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class FileRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');

    if(!$request->getErrors()){
      $user->setAttribute("filedata",'');
      $user->setAttribute("file_name",'');
      $user->setAttribute("file_ex",'');
    }

    if(!$request->getErrors()){

      $user->setAttribute("filedata",$data);

    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("filedata");
    
    $id=$user->getAttribute("id");
    
    switch ($request->getParameter("mode")){
    
      case "rewrite":

      $request->setAttribute("filedata",$data);
      return VIEW_INPUT;

      case "submit":
      
      $image_manager=new FileManager($DB);
      
      $image_id=$image_manager->insert();

      // ファイルの保存
      $reg_image_name=sprintf("%05d",$image_id).".".$user->getAttribute("file_ex");
      if(
        $user->getAttribute("file_name") && 
        file_exists(SONPO_TEMP_IMAGE_DIR.$user->getAttribute("file_name"))
      ){
        copy(
          SONPO_TEMP_IMAGE_DIR.$user->getAttribute("file_name"),
          SONPO_FILE_DIR.$reg_image_name
        );
        unlink(SONPO_TEMP_IMAGE_DIR.$user->getAttribute("file_name"));
        $user->setAttribute("file_name",$reg_image_name);
      }
      
      $strhtml=$this->myMakePage($controller, $request, $user);
      $request->setAttribute("strhtml",$strhtml);
      $request->setAttribute("n",$user->getAttribute("n"));
      $request->setAttribute("len",$user->getAttribute("len"));

      $user->setAttribute("filedata","");

      $user->setAttribute("file_name","");
      $user->setAttribute("file_ex","");
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
        "filedata",
        $data
      );

      $validatorManager->setRequired(
        "link_text", 
        true, 
        "リンクテキストが入力されていません。"
      );

      $img_name=$_FILES['file']['name'];
      $img_type=$_FILES['file']['type'];
      $img_size=intval(floor($_FILES['file']['size'] / 1024));
      $img_tmp_name=$_FILES['file']['tmp_name'];
      
      $filename=explode(".",$img_name);
      $fileex=$filename[count($filename)-1];
      
      $user->setAttribute("file_ex",$fileex);

      if(is_uploaded_file($img_tmp_name)){
            
        $img_name  =md5(uniqid(rand())).".".$fileex;
        $sourcefile=SONPO_TEMP_IMAGE_DIR.$img_name;
        copy ($img_tmp_name, $sourcefile);
    
        $user->setAttribute('file_name',$img_name);

      }else{
        $validatorManager->setRequired(
          "nofile", 
          true, 
          "ファイルが指定されていません。"
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
    return array('admin', 'sonpocms');
  }

  function myMakePage(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('filepart.html');
    
    $data=$user->getAttribute("filedata");
    
    $renderer->setAttribute("data",$data);
    
    $renderer->setAttribute("file_name",$user->getAttribute("file_name"));

    $renderer->setAttribute("file_url",SONPO_FILE_URL);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
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
