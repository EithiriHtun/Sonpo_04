<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ContactManager.php');
require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');
require_once(VALIDATOR_DIR.'EmailValidator.class.php');
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class Index2Action extends DBAction {

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
    if(
      $request->getParameter("token")=='' ||
      $request->getParameter("token")<>$user->getAttribute("token_ref")
    ){
      $user->setAttribute("data",'');
      $user->setAttribute("ref_token",'');
      $controller->redirect("/");
      return VIEW_NONE;
    }
    
    $DB=$request->getAttribute('db');
    $data=$user->getAttribute("data");
    
    switch ($request->getParameter("mode")){
    
      case "preview":
        $request->setAttribute("token",$user->getAttribute("token_ref"));
        return VIEW_ALERT;

      case "rewrite":
        $request->setAttribute("token",$user->getAttribute("token_ref"));
        return VIEW_INPUT;

      case "submit":
      
        $contact_manager=new ContactManager($DB);
        $contact_id=$contact_manager->insert($data);
        //レコードのIDではなく相談の受付IDを生成して返す

// echo $contact_id;
      
        // メール送信

        // for user
        $user_renderer= new CustomSmartyRenderer($controller, $request, $user);
        $user_renderer->setAttribute('contact_id', $contact_id);
    
        $user_renderer->setTemplate('mail/usermail.txt');
        $user_renderer->setMode(RENDER_VAR);
        $user_body=$user_renderer->fetchResult($controller, $request, $user);
        $user_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$user_body);

        mail(
          $data["email"],
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($user_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($user_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "Reply-To: ".$mail_from."\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );

        // for admin
        $admin_renderer= new CustomSmartyRenderer($controller, $request, $user);
        $admin_renderer->setAttribute('contact_id', $contact_id);

        $admin_renderer->setTemplate('mail/adminmail.txt');
        $admin_renderer->setMode(RENDER_VAR);
        $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
        $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

        mail(
          $admin_mail,
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($admin_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );

        $user->setAttribute("data",'');

//        $controller->redirect("/jp/contact/thankyou.html");
//        return VIEW_NONE;

        return VIEW_SUCCESS;
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

    if($data["mode"]=="preview"){
    
      $user->setAttribute("data",$data);

      $validatorManager->setRequired(
        "name1", 
        true, 
        "お名前（姓・漢字）を入力してください。"
      );
      $validatorManager->setRequired(
        "name2", 
        true, 
        "お名前（名・漢字）を入力してください。"
      );
      $validatorManager->setRequired(
        "kana1", 
        true, 
        "お名前（姓・カナ）を入力してください。"
      );
      $validatorManager->setRequired(
        "kana2", 
        true, 
        "お名前（名・カナ）を入力してください。"
      );

      $validatorManager->setRequired(
        "zip1", 
        true,
        "郵便番号（上３桁）を入力してください。"
      );
      $validatorManager->setRequired(
        "zip2", 
        true,
        "郵便番号（下４桁）を入力してください。"
      );
      if($data["zip1"] && !preg_match("/^\d+$/",$data["zip1"])){
        $validatorManager->setRequired(
          "invalid_zip1", 
          true,
          "郵便番号（上３桁）を正しく入力してください。"
        );
      }
      if($data["zip2"] && !preg_match("/^\d+$/",$data["zip2"])){
        $validatorManager->setRequired(
          "invalid_zip2", 
          true,
          "郵便番号（下４桁）を正しく入力してください。"
        );
      }
      
      $validatorManager->setRequired(
        "pref", 
        true, 
        "都道府県を選択してください。"
      );
      if($data["pref"] && ($data["pref"]<1 || $data["pref"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "都道府県を正しく選択してください。"
        );
      }
      $validatorManager->setRequired(
        "address", 
        true, 
        "所在地の市区町村以下を入力してください。"
      );

      $validatorManager->setRequired(
        "tel1", 
        true,
        "電話番号（市外局番）を入力してください。"
      );
      $validatorManager->setRequired(
        "tel2", 
        true,
        "電話番号（市内局番）を入力してください。"
      );
      $validatorManager->setRequired(
        "tel3", 
        true,
        "電話番号（加入者番号）を入力してください。"
      );
      if($data["tel1"] && !preg_match("/^\d+$/",$data["tel1"])){
        $validatorManager->setRequired(
          "invalid_tel1", 
          true,
          "電話番号（市外局番）を正しく入力してください。"
        );
      }
      if($data["tel2"] && !preg_match("/^\d+$/",$data["tel2"])){
        $validatorManager->setRequired(
          "invalid_tel2", 
          true,
          "電話番号（市内局番）を正しく入力してください。"
        );
      }
      if($data["tel3"] && !preg_match("/^\d+$/",$data["tel3"])){
        $validatorManager->setRequired(
          "invalid_tel3", 
          true,
          "電話番号（加入者番号）を正しく入力してください。"
        );
      }

      $validatorManager->setRequired(
        "email", 
        true,
        "メールアドレスを入力してください。"
      );
      $validator = &new EmailValidator();
      $params = array('email_error' => 'メールアドレスを正しく入力してください。');
      $validator->initialize($params);
      $validatorManager->register('email', $validator);

      $validatorManager->setRequired(
        "email2", 
        true,
        "メールアドレス（確認）を入力してください。"
      );
      
      if($data["email"] && $data["email2"] && $data["email"]<>$data["email2"]){
        $validatorManager->setRequired(
          "invalid_email", 
          true,
          "メールアドレス（確認）を正しく入力してください。"
        );
      }

      $validatorManager->setRequired(
        "type", 
        true, 
        "ご相談の保険種目を入力してください。"
      );

      $validatorManager->setRequired(
        "comment", 
        true, 
        "ご相談の内容を入力してください。"
      );
      if($data["comment"] && mb_strlen($data["comment"])>1000){
        $validatorManager->setRequired(
          "invalid_length_comment", 
          true, 
          "ご相談内容は、1000字以内でご入力ください。"
        );
      }
      
      if($data["no_answer"]<>1){
        $validatorManager->setRequired(
          "upassw", 
          true, 
          "パスワードを入力してください。"
        );
        if($data["upassw"]){
          if($data["upassw"]<>$data["upassw2"]){
            $validatorManager->setRequired(
              "invalid_upassw", 
              true, 
              "確認用パスワードが一致しません。"
            );
          }else{
            if(!preg_match("/^[0-9a-zA-Z]*$/",$data["upassw"])){
              $validatorManager->setRequired(
                "invalid_upassw", 
                true,
                "パスワードは半角英数字で入力してください。"
              );
            }else{
              if(strlen($data["upassw"])<8 || strlen($data["upassw"])>16){
                $validatorManager->setRequired(
                  "invalid_len_upassw", 
                  true,
                  "パスワードは8文字以上16文字以内としてください。"
                );
              }
            }
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
