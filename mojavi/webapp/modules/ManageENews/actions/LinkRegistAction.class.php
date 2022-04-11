<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ImageManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class LinkRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');

    if(!$request->getErrors()){
      $user->setAttribute("linkdata",'');
    }

    if(!$request->getErrors()){

      $user->setAttribute("linkdata",$data);

    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("linkdata");
    
    $id=$user->getAttribute("id");
    
    switch ($request->getParameter("mode")){
    
      case "rewrite":

      $request->setAttribute("linkdata",$data);
      return VIEW_INPUT;

      case "submit":
      
      $strhtml=$this->myMakePage($controller, $request, $user);
      $request->setAttribute("strhtml",$strhtml);
      $request->setAttribute("n",$user->getAttribute("n"));
      $request->setAttribute("len",$user->getAttribute("len"));

      $user->setAttribute("linkdata","");
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
        "linkdata",
        $data
      );
      
      $validatorManager->setRequired(
        "link_text", 
        true, 
        "リンクテキストが入力されていません。"
      );
      $validatorManager->setRequired(
        "link_url", 
        true, 
        "URLが入力されていません。"
      );

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
    $renderer->setTemplate('linkpart.html');
    
    $data=$user->getAttribute("linkdata");
    
    $renderer->setAttribute("link_text",$data["link_text"]);
    $renderer->setAttribute("link_url",$data["link_url"]);

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
