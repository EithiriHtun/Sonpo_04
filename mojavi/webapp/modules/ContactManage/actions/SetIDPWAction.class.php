<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'UserManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class SetIDPWAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if(!$user->getAttribute("is_master")){
      $controller->redirect(SCRIPT_PATH);
      return VIEW_NONE;
    }

    if(!$request->getErrors()){
      $user->setAttribute("data",'');
      $user->setAttribute("id",'');
    }

    if($request->getParameter("id")){
      $id=$request->getParameter("id");
      $user->setAttribute("id",$id);
    }else{
      $id=$user->getAttribute("id");
    }
    
    if(!$id){
      $controller->redirect(SCRIPT_PATH);
      return VIEW_NONE;
    }

    if(!$request->getErrors()){

      $categories=array();
      if($id){
        $article_manager= new UserManager($DB);
        $data=$article_manager->get_one($id);
        
        if(!$data){
          $controller->redirect(SCRIPT_PATH);
          return VIEW_NONE;
        }
      }
      $user->setAttribute("data",$data);

    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){

    if(!$user->getAttribute("is_master")){
      $controller->redirect(SCRIPT_PATH);
      return VIEW_NONE;
    }

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");
    
    $article_manager=new UserManager($DB);
    
    if($id){
      $data["password"]=md5($data["password"]);
      $article_manager->update($data,$id);
    }
    
    return VIEW_SUCCESS;
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
    
    $article_manager=new UserManager($DB);

    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
    );

    $validatorManager->setRequired(
      "account", 
      true, 
      "��������Ȥ����Ϥ���Ƥ��ޤ���"
    );
    $validatorManager->setRequired(
      "password", 
      true, 
      "�ѥ���ɤ����Ϥ���Ƥ��ޤ���"
    );
    
    if($data["password"]<>$data["password2"]){
      $validatorManager->setRequired(
        "invalid_password", 
        true, 
        "��ǧ�ѥѥ���ɤ����פ��Ƥ��ޤ���"
      );
    }
    
    if($article_manager->account_exist($id,$data[account])){
      $validatorManager->setRequired(
        "invalid_account", 
        true,
        "���Ϥ��줿��������Ȥϴ��˻Ȥ��Ƥ��ޤ���"
      );
    }
    
    if(
      !preg_match("/^[0-9a-zA-Z]+$/",$data["account"]) ||
      !preg_match("/^[0-9a-zA-Z]+$/",$data["password"])
    ){
      $validatorManager->setRequired(
        "invalid_char", 
        true,
        "��������Ȥȥѥ���ɤ�Ⱦ�ѱѿ����Τ߻��Ѥ��Ƥ���������"
      );
    }
    
    if(strlen($data["account"])<6){
      $validatorManager->setRequired(
        "invalid_account", 
        true,
        "��������Ȥϣ�ʸ���ʾ�Ȥ��Ƥ���������"
      );
    }
    if(strlen($data["password"])<6){
      $validatorManager->setRequired(
        "invalid_password", 
        true,
        "�ѥ���ɤϣ�ʸ���ʾ�Ȥ��Ƥ���������"
      );
    }

/*
    if($data["mode"]=="preview"){
    
      $data_in_session=$user->getAttribute("data");
      //�����å��ܥå����ν����
      //$data_in_session["is_jp"]        =0;
      //$data_in_session["is_style"]     =0;
      //$data_in_session["is_en"]        =0;
      //$data_in_session["show_contents"]=0;
      //$data_in_session["show_logo"]    =0;
      //$data_in_session["show_contact"] =0;

      $user->setAttribute(
        "data",
        array_merge($data_in_session,$data)
      );

      $validatorManager->setRequired(
        "list_title", 
        true, 
        "�����ȥ�ʰ����ѡˤ����Ϥ���Ƥ��ޤ���"
      );

      if(!checkdate($data["open_month"],$data["open_day"],$data["open_year"])){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "ͽ������������������ޤ���"
        );
      }

      if($data["open_hour"]<0 || $data["open_hour"]>23){
        $validatorManager->setRequired(
          "invalid_hour", 
          true, 
          "ͽ����郎����������ޤ���"
        );
      }
*/

/*
      $validatorManager->setRequired(
        "date_live", 
        true, 
        "���ա�ɽ���ѡˤ����Ϥ���Ƥ��ޤ���"
      );
      $validatorManager->setRequired(
        "date_show", 
        true, 
        "���աʥ��������ѡˤ����Ϥ���Ƥ��ޤ���"
      );
      $live_manager= new LiveManager($DB);
      $dates=$live_manager->getDateArray($data["date_show"]);
      if(!count($dates)){
        $validatorManager->setRequired(
          "invalid_date_show", 
          true, 
          "���աʥ��������ѡˤ����������Ϥ���Ƥ��ޤ���"
        );
      }
*/

//    }

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
