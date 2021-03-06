<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');
require_once(LIB_DIR.'FormUserManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubMasterRegistAction extends DBAction {

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
    
    $user_manager= new FormUserManager($DB);
    $request->setAttribute("sassi_users",$user_manager->get_admin_and_sassi_users());
    
/*    if(!$id){
      $controller->redirect(SCRIPT_PATH);
      return VIEW_NONE;
    }*/

    if(!$request->getErrors()){

      $data = array();
      if($id){
        $article_manager= new PubManager($DB);
        $data=$article_manager->get_pubmaster_one($id);
        
        if(!$data){
          $controller->redirect(SCRIPT_PATH);
          return VIEW_NONE;
        }
        
        $total_amount_p=$article_manager->get_pub_count($id);
        $total_amount_m=$article_manager->get_pub_out_count($id)+
                        $article_manager->get_pub_out_count_adj($id);
        $data['total_amount_p']=$total_amount_p;
        $data['total_amount_m']=$total_amount_m;
        $data['total_amount']=$total_amount_p-$total_amount_m;
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
    
    $article_manager=new PubManager($DB);
    
    if($id){
      $article_manager->update_pubmaster($data,$id);
    }else{
      $id=$article_manager->add_pubmaster($data);
    }
    
    if($data['adjcount']){
      //????????
      $adj=array(
        'user_status' => 2,
        'name1' => '????',
        'bikou' => $data['name'].'??'.$data['adjcount'],
        'order_type' => 5
      );
      $rid=$article_manager->add_pub_order_adj($adj);
      $article_manager->add_pub_order_item(
        $rid,
        $data['id'],
        $data['name'],
        $data['price'],
        $data['adjcount'],
        5
      );
    }
    
    if($data['pcount']){
      //????????
      $article_manager->add_pub_quantity(
        $id,
        $data['pcount'],
        $user->getAttribute('user_id')
      );
    }
    
    $controller->redirect(SCRIPT_PATH.'/module/FormManage/action/PubMasterIndex');
    return VIEW_NONE;
//    return VIEW_SUCCESS;
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
    $data['show_online']=($request->getParameter('show_online'))? 1 : 0;
    $data['show_other']=($request->getParameter('show_other'))? 1 : 0;
    $data['show_inst']=($request->getParameter('show_inst'))? 1 : 0;
    $data['users']=@$_POST['user'];
    
    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
    );

    if(
      $data["pub_id_1"] &&
      !preg_match("/^[0-9][0-9][0-9][0-9][0-9]$/",$data["pub_id_1"])
    ){
      $validatorManager->setRequired(
        "invalid_pub_id_1", 
        true,
        "????????????5??????????????5??????????????????????"
      );
    }

    if(
      $data["pub_id_2"] &&
      !preg_match("/^[0-9][0-9]$/",$data["pub_id_2"])
    ){
      $validatorManager->setRequired(
        "invalid_pub_id_2", 
        true,
        "????????????2??????????????2??????????????????????"
      );
    }

    $article_manager=new PubManager($DB);
    if(
      ($data["pub_id_1"] || $data["pub_id_2"]) &&
      $article_manager->_check_pub_id($data['id'], $data["pub_id_1"], $data["pub_id_2"])
    ){
      $validatorManager->setRequired(
        "invalid_pub_id", 
        true,
        "??????????????????????????"
      );
    }

    $validatorManager->setRequired(
      "name", 
      true, 
      "????????????????????????????"
    );
    
    if(
      $data["entry_limit"] &&
      !preg_match("/^[0-9]+$/",$data["entry_limit"])
    ){
      $validatorManager->setRequired(
        "invalid_entry_limit", 
        true,
        "????????????????????????????????????????????"
      );
    }
    if(
      $data["pcount"] &&
      !preg_match("/^[0-9]+$/",$data["pcount"])
    ){
      $validatorManager->setRequired(
        "invalid_pcount", 
        true,
        "????????????????????????????????????????"
      );
    }
    if(
      $data["weight"] &&
      !preg_match("/^[0-9]+$/",$data["weight"])
    ){
      $validatorManager->setRequired(
        "invalid_weight", 
        true,
        "????????????????????????????????????"
      );
    }
    if(
      $data["price"] &&
      !preg_match("/^[0-9]+$/",$data["price"])
    ){
      $validatorManager->setRequired(
        "invalid_price", 
        true,
        "????????????????????????????????????"
      );
    }
    if(
      $data["adjcount"] &&
      !preg_match("/^(-?)[0-9]+$/",$data["adjcount"])
    ){
      $validatorManager->setRequired(
        "invalid_adjcount", 
        true,
        "????????????????????????????????????????"
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
    return array('admin', 'sonpoform');
  }
}

?>
