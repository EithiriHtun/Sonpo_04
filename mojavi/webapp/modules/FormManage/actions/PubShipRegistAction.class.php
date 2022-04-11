<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubShipRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if(
      $user->getAttribute("is_master")  ==1 ||
      $user->getAttribute("is_master2") ==1 ||
      $user->getAttribute("is_sassi")   ==1 || 
      $user->getAttribute("is_shipping")==1
    ){
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

        if($id){
          $article_manager= new PubManager($DB);
          $data=$article_manager->get_one_order($id);
          
          if(!$data){
            $controller->redirect(SCRIPT_PATH);
            return VIEW_NONE;
          }
          
          $books=$article_manager->get_one_order_item($id);
          $total_price=0;
          $total_count=0;
          $allbooks=0;
          
          if($books){
            foreach($books as $val){
              if($data['type']<>3 && $data['type']<>4){
                $total_price+=$val['price']*$val['amount'];
              }
              $total_count+=$val['amount'];
              $allbooks++;
            }
          }
          $data['total_price']=$total_price;
          $data['total_count']=$total_count;

          $data['allprice']=$total_price+$data['trans_price'];
          $data['allbooks']=$allbooks;
          
          $data['books']=$books;
          
          // 
          $sassi_users=$article_manager->get_sassi_users();
          $data['sassi_users']=$sassi_users;
          
        }
        $user->setAttribute("data",$data);

      }

      return VIEW_SUCCESS;

    }else{
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    $id=$user->getAttribute("id");
    
    $data=$user->getAttribute("data");
    
    $article_manager=new PubManager($DB);
      
    if(
      $user->getAttribute("is_master") ||
      $user->getAttribute("is_master2")||
      $user->getAttribute("is_sassi")
    ){
      $article_manager->update_pub_bill($data,$id);
      
    }
    $controller->redirect(
      '/manage/forms/index.php/module/FormManage/action/PubShipDetail?id='.$id
    );
    return VIEW_NONE;
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
    
    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
    );
    
    if($data["bill_status"]<0 || $data["bill_status"]>1){
      $validatorManager->setRequired(
        "invalid_billstatus", 
        true, 
        "請求書処理状況が正しくありません。"
      );
    }

/*
    if($data["mode"]=="preview"){
    
      $data_in_session=$user->getAttribute("data");
      //チェックボックスの初期化
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
        "タイトル（一覧用）が入力されていません。"
      );

      if(!checkdate($data["open_month"],$data["open_day"],$data["open_year"])){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "予約日時が正しくありません。"
        );
      }

      if($data["open_hour"]<0 || $data["open_hour"]>23){
        $validatorManager->setRequired(
          "invalid_hour", 
          true, 
          "予約時刻が正しくありません。"
        );
      }
*/

/*
      $validatorManager->setRequired(
        "date_live", 
        true, 
        "日付（表示用）が入力されていません。"
      );
      $validatorManager->setRequired(
        "date_show", 
        true, 
        "日付（カレンダー用）が入力されていません。"
      );
      $live_manager= new LiveManager($DB);
      $dates=$live_manager->getDateArray($data["date_show"]);
      if(!count($dates)){
        $validatorManager->setRequired(
          "invalid_date_show", 
          true, 
          "日付（カレンダー用）が正しく入力されていません。"
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
    return array('admin', 'sonpoform');
  }

}

?>
