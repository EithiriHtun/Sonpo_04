<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ContactManager.php');
require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');
require_once(VALIDATOR_DIR.'EmailValidator.class.php');
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class ShowPdfAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){

    // check ssl
    if(!isset($_SERVER['HTTPS'])){
      $controller->redirect('/');
      return VIEW_NONE;
    }
    
    if(!$request->getErrors()){
      $user->setAttribute("data",'');
      $request->setAttribute("operation","initial");
      
      // tokenを作ってセット
      $token=md5(date("YmdHis").rand(1,999));
      $request->setAttribute("token",$token);
      $user->setAttribute("token_ref",$token);
      
    }else{
      $request->setAttribute("token",$user->getAttribute("token_ref"));
    }
    
    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    // check ssl
    if(!isset($_SERVER['HTTPS'])){
      $controller->redirect('/');
      return VIEW_NONE;
    }
    
    // tokenのチェック
    if($request->getParameter("token")<>$user->getAttribute("token_ref")){
      $user->setAttribute("data",'');
      $user->setAttribute("ref_token",'');
      $controller->redirect("/");
      return VIEW_NONE;
    }
    
    $DB=$request->getAttribute('db');
    
    switch ($request->getParameter("mode")){
    
      case "submit":
      
        $contact_manager=new ContactManager($DB);

        $cid=substr($request->getParameter("cid"),1);
        $fname="Kaitou_".sprintf("%010d",$cid).".pdf";

        $contacts=$contact_manager->search($cid);

        if(file_exists(SONPO_PDF_DIR.$fname)){
//        if(file_exists(SONPO_PDF_DIR.$fname) && $contacts[0]["id"]>1379){
          $fp=fopen(SONPO_PDF_DIR.$fname,"r");
          $pdfdata=fread($fp,filesize(SONPO_PDF_DIR.$fname));
          fclose($fp);
        }else{
//          die("cannot find file. ".SONPO_PDF_DIR.$fname);
          $user->setAttribute("data",'');
          $user->setAttribute("ref_token",'');
          $controller->redirect("/missing.html");
          return VIEW_NONE;
        }

        $contact_manager->set_date_seen($cid);

        header("Cache-Control: private;");
        header("Pragma: no-cache;");
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename='.$fname);
        print $pdfdata;

        return VIEW_NONE;
    }
    return VIEW_NONE;
  }

  function getRequestMethods(){
    return REQ_POST;
  }
  
  function validate (&$controller, &$request, &$user){
    return TRUE;
  }
  
  function registerValidators(&$validatorManager, &$controller, &$request, &$user) {
    $DB=$request->getAttribute('db');
    
    $data=$request->getParameters();

    if($data["mode"]=="submit"){
    
      $validatorManager->setRequired(
        "cid", 
        true, 
        "受付番号を入力してください。"
      );
      $validatorManager->setRequired(
        "upw", 
        true, 
        "パスワードを入力してください。"
      );

      if($data["cid"] && $data["upw"]){
        $contact_manager=new ContactManager($DB);
        $contacts=$contact_manager->search(substr($data["cid"],1));
        if(!$contacts[0]["id"]){
          $validatorManager->setRequired(
            "invalid_cid", 
            true, 
            "受付番号が正しくありません。"
          );
        }else{
          if($contacts[0]["upassw"]<>$data["upw"]){
            $validatorManager->setRequired(
              "invalid_cid", 
              true, 
              "受付番号もしくはパスワードが正しくありません。"
            );
          }
        }
      }
    }
  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

}

?>
