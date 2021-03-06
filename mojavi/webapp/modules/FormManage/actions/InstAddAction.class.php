<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');
require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');
require_once(VALIDATOR_DIR.'EmailValidator.class.php');
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class InstAddAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    
    if($user->getAttribute("is_shipping")==1){
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

    if(!$request->getErrors()){
      $user->setAttribute("data",'');
    }
    
    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."/../Instructor/config/config.php");

    // check ssl
    //if(!isset($_SERVER['HTTPS'])){
    //  $controller->redirect('/');
    //  return VIEW_NONE;
    //}
    
    $DB=$request->getAttribute('db');
    $data=$user->getAttribute("data");
    
    switch ($request->getParameter("mode")){
    
      case "form":
        return VIEW_INPUT;

      case "rewrite":
        return VIEW_INPUT;

      case "preview":

        $todaytime=mktime(0,0,0,date("m"),date("d"),date("Y"));
        $time1=mktime(0,0,0,$data["month_1"],$data["day_1"],$data["year_1"]);
        $time2=0;
        if(@$data["month_2"] && @$data["day_2"] && @$data["year_2"]){
          $time2=mktime(0,0,0,$data["month_2"],$data["day_2"],$data["year_2"]);
        }
        $datelimit=mktime(0,0,0,date("m")+1,date("d"),date("Y"))-$todaytime;
        if(($time1-$todaytime) < $datelimit){
          $request->setAttribute("date_warn_1",1);
        }
        if(($time2-$todaytime) < $datelimit){
          $request->setAttribute("date_warn_2",1);
        }
        return VIEW_ALERT;

      case "submit":
      
        $data["ip"]=$_SERVER["REMOTE_ADDR"];
      
        $inst_manager=new InstructorManager($DB);
        $inst_id=$inst_manager->insert2($data);

        //?쥳???ɤ?ID?ǤϤʤ?????ID???????????֤?

        $branch_id=(@$branch_no[$data["prefecture"]])? $branch_no[$data["prefecture"]] : '';

/*
        // ?᡼??????

        // for user
        $user_renderer= new CustomSmartyRenderer($controller, $request, $user);
        $user_renderer->setAttribute('inst_id', $inst_id);
        $user_renderer->setAttribute("prefs",$prefs);
        $user_renderer->setAttribute("theme",$theme);
        $user_renderer->setAttribute("data",$data);
        $user_renderer->setAttribute("branch_name",$branch_name[$branch_id]);
        $user_renderer->setAttribute("branch_zip",$branch_zip[$branch_id]);
        $user_renderer->setAttribute("branch_address",$branch_address[$branch_id]);
        $user_renderer->setAttribute("branch_tel",$branch_tel[$branch_id]);
        $user_renderer->setAttribute("branch_fax",$branch_fax[$branch_id]);
    
        $user_renderer->setTemplate('mail/usermail.txt');
        $user_renderer->setMode(RENDER_VAR);
        $user_body=$user_renderer->fetchResult($controller, $request, $user);
        $user_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$user_body);

        mail(
          $data["email1"],
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
        $admin_renderer->setAttribute('inst_id', $inst_id);
        $admin_renderer->setAttribute("prefs",$prefs);
        $admin_renderer->setAttribute("theme",$theme);
        $admin_renderer->setAttribute("data",$data);
        $admin_renderer->setAttribute("branch_name",$branch_name[$branch_id]);

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

        mail(
          $branch_mail[$branch_id],
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($admin_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );
*/
        $user->removeAttribute("data");
        $user->removeAttribute("token_ref");

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
    
    if($request->getParameter("mode")=="rewrite"){
      $data=(@$user->getAttribute("data"))? $user->getAttribute("data") : array();
      $data['mode']='rewrite';
    }

    if($request->getParameter("mode")=="preview"){
      $data_in_session=($user->getAttribute("data"))? $user->getAttribute("data") : array();
      $data=array_merge($data_in_session,$request->getParameters());
    }


    if($request->getParameter("mode")=="preview"){
    
      $user->setAttribute("data",$data);

/*
      $validatorManager->setRequired(
        "host", 
        true, 
        "???ż?̾?????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "post1", 
        true,
        "͹???ֹ??ʾ壳???ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "post2", 
        true,
        "͹???ֹ??ʲ??????ˤ????Ϥ??Ƥ?????????"
      );
*/
      if($data["post1"] && !preg_match("/^\d+$/",$data["post1"])){
        $validatorManager->setRequired(
          "invalid_zip1", 
          true,
          "͹???ֹ??ʾ壳???ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      if($data["post2"] && !preg_match("/^\d+$/",$data["post2"])){
        $validatorManager->setRequired(
          "invalid_zip2", 
          true,
          "͹???ֹ??ʲ??????ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      
/*
      $validatorManager->setRequired(
        "prefecture", 
        true, 
        "??ƻ?ܸ??????򤷤Ƥ?????????"
      );
*/
      if($data["prefecture"] && ($data["prefecture"]<1 || $data["prefecture"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "??ƻ?ܸ????????????򤷤Ƥ?????????"
        );
      }
/*
      $validatorManager->setRequired(
        "address", 
        true, 
        "?????ϤλԶ?Į¼?ʲ??????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "tel1", 
        true,
        "?????ֹ??ʻԳ????֡ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "tel2", 
        true,
        "?????ֹ??ʻ??????֡ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "tel3", 
        true,
        "?????ֹ??ʲ??????ֹ??ˤ????Ϥ??Ƥ?????????"
      );
*/
      if($data["tel1"] && !preg_match("/^\d+$/",$data["tel1"])){
        $validatorManager->setRequired(
          "invalid_tel1", 
          true,
          "?????ֹ??ʻԳ????֡ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      if($data["tel2"] && !preg_match("/^\d+$/",$data["tel2"])){
        $validatorManager->setRequired(
          "invalid_tel2", 
          true,
          "?????ֹ??ʻ??????֡ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      if($data["tel3"] && !preg_match("/^\d+$/",$data["tel3"])){
        $validatorManager->setRequired(
          "invalid_tel3", 
          true,
          "?????ֹ??ʲ??????ֹ??ˤ??????????Ϥ??Ƥ?????????"
        );
      }

/*
      $validatorManager->setRequired(
        "person_last", 
        true,
        "??ô????̾?????ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "person_first", 
        true,
        "??ô????̾??̾?ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "person_kana_last", 
        true,
        "??ô????̾?եꥬ?ʡ????ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "person_kana_first", 
        true,
        "??ô????̾?եꥬ?ʡ?̾?ˤ????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "email1", 
        true,
        "?᡼?륢?ɥ쥹?????Ϥ??Ƥ?????????"
      );
      $validator = &new EmailValidator();
      $params = array('email_error' => '?᡼?륢?ɥ쥹???????????Ϥ??Ƥ?????????');
      $validator->initialize($params);
      $validatorManager->register('email1', $validator);

      $validatorManager->setRequired(
        "email2", 
        true,
        "?᡼?륢?ɥ쥹?ʳ?ǧ?ˤ????Ϥ??Ƥ?????????"
      );
      
      if($data["email1"] && $data["email2"] && $data["email1"]<>$data["email2"]){
        $validatorManager->setRequired(
          "invalid_email", 
          true,
          "?᡼?륢?ɥ쥹?ʳ?ǧ?ˤ??????????Ϥ??Ƥ?????????"
        );
      }
*/
/*
      $user->setAttribute("data",$data);

      $validatorManager->setRequired(
        "year_1", 
        true,
        "??˾??????????ǯ?ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "month_1", 
        true,
        "??˾?????????ʷ??ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "day_1", 
        true,
        "??˾?????????????ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "hour_from_1", 
        true,
        "??˾?????????ʳ??ϻ??ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "min_from_1", 
        true,
        "??˾?????????ʳ???ʬ?ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "hour_to_1", 
        true,
        "??˾?????????ʽ?λ???ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "min_to_1", 
        true,
        "??˾?????????ʽ?λʬ?ˤ????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "lecture_hall", 
        true,
        "????̾?????Ϥ??Ƥ?????????"
      );
*/

      $validatorManager->setRequired(
        "lecture_prefecture", 
        true, 
        "????????ƻ?ܸ??????򤷤Ƥ?????????"
      );

      if($data["lecture_prefecture"] && ($data["lecture_prefecture"]<1 || $data["lecture_prefecture"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "????????ƻ?ܸ????????????򤷤Ƥ?????????"
        );
      }

/*
      $validatorManager->setRequired(
        "lecture_address", 
        true, 
        "?ֱ??????????ϤλԶ?Į¼?ʲ??????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "lecture_tel1", 
        true,
        "?ֱ????????????ֹ??ʻԳ????֡ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "lecture_tel2", 
        true,
        "?ֱ????????????ֹ??ʻ??????֡ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "lecture_tel3", 
        true,
        "?ֱ????????????ֹ??ʲ??????ֹ??ˤ????Ϥ??Ƥ?????????"
      );
*/
      if($data["lecture_tel1"] && !preg_match("/^\d+$/",$data["lecture_tel1"])){
        $validatorManager->setRequired(
          "invalid_tel1", 
          true,
          "???????????ֹ??ʻԳ????֡ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      if($data["lecture_tel2"] && !preg_match("/^\d+$/",$data["lecture_tel2"])){
        $validatorManager->setRequired(
          "invalid_tel2", 
          true,
          "???????????ֹ??ʻ??????֡ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      if($data["lecture_tel3"] && !preg_match("/^\d+$/",$data["lecture_tel3"])){
        $validatorManager->setRequired(
          "invalid_tel3", 
          true,
          "???????????ֹ??ʲ??????ֹ??ˤ??????????Ϥ??Ƥ?????????"
        );
      }

/*
      $validatorManager->setRequired(
        "object_text", 
        true,
        "?ֱ??оݤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "object_num", 
        true,
        "????ͽ???Ϳ??????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "themes", 
        true,
        "?ֱ??ơ??ޤ????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "video", 
        true,
        "?ӥǥ???˾??̵ͭ?????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "copy", 
        true,
        "??????ɬ???????????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "receiver_address", 
        true,
        "???????????????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "use_pcprj", 
        true,
        "?ѥ????󤪤??ӥץ????????????λ???"
      );
      $validatorManager->setRequired(
        "exp", 
        true,
        "?????٤Τ????ѷи??????Ϥ??Ƥ?????????"
      );
*/
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
