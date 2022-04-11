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
      
      // token���äƥ��å�
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
    
    // token�Υ����å�
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
        //�쥳���ɤ�ID�ǤϤʤ����̤μ���ID�����������֤�

// echo $contact_id;
      
        // �᡼������

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
        "��̾�������������ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "name2", 
        true, 
        "��̾����̾�������ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "kana1", 
        true, 
        "��̾�����������ʡˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "kana2", 
        true, 
        "��̾����̾�����ʡˤ����Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "zip1", 
        true,
        "͹���ֹ�ʾ壳��ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "zip2", 
        true,
        "͹���ֹ�ʲ�����ˤ����Ϥ��Ƥ���������"
      );
      if($data["zip1"] && !preg_match("/^\d+$/",$data["zip1"])){
        $validatorManager->setRequired(
          "invalid_zip1", 
          true,
          "͹���ֹ�ʾ壳��ˤ����������Ϥ��Ƥ���������"
        );
      }
      if($data["zip2"] && !preg_match("/^\d+$/",$data["zip2"])){
        $validatorManager->setRequired(
          "invalid_zip2", 
          true,
          "͹���ֹ�ʲ�����ˤ����������Ϥ��Ƥ���������"
        );
      }
      
      $validatorManager->setRequired(
        "pref", 
        true, 
        "��ƻ�ܸ������򤷤Ƥ���������"
      );
      if($data["pref"] && ($data["pref"]<1 || $data["pref"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "��ƻ�ܸ������������򤷤Ƥ���������"
        );
      }
      $validatorManager->setRequired(
        "address", 
        true, 
        "����ϤλԶ�Į¼�ʲ������Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "tel1", 
        true,
        "�����ֹ�ʻԳ����֡ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "tel2", 
        true,
        "�����ֹ�ʻ�����֡ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "tel3", 
        true,
        "�����ֹ�ʲ������ֹ�ˤ����Ϥ��Ƥ���������"
      );
      if($data["tel1"] && !preg_match("/^\d+$/",$data["tel1"])){
        $validatorManager->setRequired(
          "invalid_tel1", 
          true,
          "�����ֹ�ʻԳ����֡ˤ����������Ϥ��Ƥ���������"
        );
      }
      if($data["tel2"] && !preg_match("/^\d+$/",$data["tel2"])){
        $validatorManager->setRequired(
          "invalid_tel2", 
          true,
          "�����ֹ�ʻ�����֡ˤ����������Ϥ��Ƥ���������"
        );
      }
      if($data["tel3"] && !preg_match("/^\d+$/",$data["tel3"])){
        $validatorManager->setRequired(
          "invalid_tel3", 
          true,
          "�����ֹ�ʲ������ֹ�ˤ����������Ϥ��Ƥ���������"
        );
      }

      $validatorManager->setRequired(
        "email", 
        true,
        "�᡼�륢�ɥ쥹�����Ϥ��Ƥ���������"
      );
      $validator = &new EmailValidator();
      $params = array('email_error' => '�᡼�륢�ɥ쥹�����������Ϥ��Ƥ���������');
      $validator->initialize($params);
      $validatorManager->register('email', $validator);

      $validatorManager->setRequired(
        "email2", 
        true,
        "�᡼�륢�ɥ쥹�ʳ�ǧ�ˤ����Ϥ��Ƥ���������"
      );
      
      if($data["email"] && $data["email2"] && $data["email"]<>$data["email2"]){
        $validatorManager->setRequired(
          "invalid_email", 
          true,
          "�᡼�륢�ɥ쥹�ʳ�ǧ�ˤ����������Ϥ��Ƥ���������"
        );
      }

      $validatorManager->setRequired(
        "type", 
        true, 
        "�����̤��ݸ����ܤ����Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "comment", 
        true, 
        "�����̤����Ƥ����Ϥ��Ƥ���������"
      );
      if($data["comment"] && mb_strlen($data["comment"])>1000){
        $validatorManager->setRequired(
          "invalid_length_comment", 
          true, 
          "���������Ƥϡ�1000������Ǥ����Ϥ���������"
        );
      }
      
      if($data["no_answer"]<>1){
        $validatorManager->setRequired(
          "upassw", 
          true, 
          "�ѥ���ɤ����Ϥ��Ƥ���������"
        );
        if($data["upassw"]){
          if($data["upassw"]<>$data["upassw2"]){
            $validatorManager->setRequired(
              "invalid_upassw", 
              true, 
              "��ǧ�ѥѥ���ɤ����פ��ޤ���"
            );
          }else{
            if(!preg_match("/^[0-9a-zA-Z]*$/",$data["upassw"])){
              $validatorManager->setRequired(
                "invalid_upassw", 
                true,
                "�ѥ���ɤ�Ⱦ�ѱѿ��������Ϥ��Ƥ���������"
              );
            }else{
              if(strlen($data["upassw"])<8 || strlen($data["upassw"])>16){
                $validatorManager->setRequired(
                  "invalid_len_upassw", 
                  true,
                  "�ѥ���ɤ�8ʸ���ʾ�16ʸ������Ȥ��Ƥ���������"
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
