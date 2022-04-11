<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubReceptRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if($user->getAttribute("is_master")==1 || $user->getAttribute("is_master2")==1){
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
              $total_price+=$val['price']*$val['amount'];
              $total_count+=$val['amount'];
              $allbooks++;
            }
          }
          $data['total_price']=$total_price;
          $data['total_count']=$total_count;

          $data['allprice']=$total_price+$data['trans_price'];
          $data['allbooks']=$allbooks;
          
          $data['books']=$books;
          
          if(
            !$data['is_recept_edited'] && 
            ($data['type']==3 || $data['type']==4) && 
            !$data['approve']
          ){
            $data['bill_name']='業務企画部啓発・教育グループ';
          }
        }
        $user->setAttribute("data",$data);

      }

      return VIEW_INPUT;

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
    
    $data=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");
    
    switch ($request->getParameter("mode")){
    
      case "submit":
      
      $article_manager=new PubManager($DB);
      
      if($user->getAttribute("is_master") || $user->getAttribute("is_master2")){
        $approve_pre=$article_manager->get_pub_recept_approve($id);

        if(!$approve_pre && $data['approve']){
          //メール

//          $orderdata=$article_manager->get_one_order($id);
          
          $books=$article_manager->get_one_order_item($id);

          // for admin
          $admin_renderer=new CustomSmartyRenderer($controller, $request, $user);
          $admin_renderer->setAttribute('recept_id', $data['recept_id']);
          $admin_renderer->setAttribute("data",$data);
          $admin_renderer->setAttribute("books",$books);

          $admin_renderer->setTemplate('mail/pub_transmail.txt');
          $admin_renderer->setMode(RENDER_VAR);
          $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
          $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

/*
          $is_mail=mail(
            $trans_mail_to,
            "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($trans_mail_subject.$data['recept_id'],"ISO-2022-JP","EUC-JP"))."?=",
            mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
            "Content-Transfer-Encoding: 7bit\n".
            "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
            "From: ".$mail_from,
            "-f $mail_from"
          );
          if($is_mail){
            echo 'mail success';
          }else{
            echo 'mail error';
          }
*/
        }
        $data['is_recept_edited']=1;
        $article_manager->update_pub_recept_master($data,$id);
      }
      
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage/action/PubReceptIndex'
      );
      return VIEW_NONE;
      //return VIEW_INPUT;
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
    
    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
    );
    
    if($user->getAttribute('is_shipping')){
      if($data["req_month"] || $data["req_day"] || $data["req_year"]){
    
        if(!checkdate($data["req_month"],$data["req_day"],$data["req_year"])){
          $validatorManager->setRequired(
            "invalid_req_date", 
            true, 
            "到着希望日が正しくありません。"
          );
        }
      }
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
