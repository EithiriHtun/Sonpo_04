<?php
require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');
require_once(VALIDATOR_DIR.'EmailValidator.class.php');
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class AEntryAction extends Action {

  function getDefaultView(&$controller, &$request, &$user){
    if(!$request->getErrors()){
      $user->setAttribute("data",'');
    }
    
    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."/config/config.php");

    $data=$user->getAttribute("data");
    
    switch ($request->getParameter("mode")){
    
      case "preview":
        return VIEW_ALERT;

      case "rewrite":
        return VIEW_INPUT;

      case "submit":
      
        // �᡼������
        $earn=array();
        for($i=1;$i<40;$i++){
          $earn[$i]=($i-1)*50+100;
        }
        // for user
        $user_renderer= new CustomSmartyRenderer($controller, $request, $user);
        $user_renderer->setAttribute('data', $data);
        $user_renderer->setAttribute("schools",$schools);
        $user_renderer->setAttribute("emp_type",$emp_type);
        $user_renderer->setAttribute("level",$level);
        $user_renderer->setAttribute("earn",$earn);
    
        $user_renderer->setTemplate('mail/a_usermail.txt');
        $user_renderer->setMode(RENDER_VAR);
        $user_body=$user_renderer->fetchResult($controller, $request, $user);
        $user_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$user_body);

        mail(
          $data["email"],
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($a_user_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($user_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from
        );

        // for admin
        $admin_renderer= new CustomSmartyRenderer($controller, $request, $user);
        $admin_renderer->setAttribute('data', $data);
        $admin_renderer->setAttribute("submit_date",date(Y-m-d));
        $admin_renderer->setAttribute("schools",$schools);
        $admin_renderer->setAttribute("emp_type",$emp_type);
        $admin_renderer->setAttribute("level",$level);
        $admin_renderer->setAttribute("earn",$earn);

        $admin_renderer->setTemplate('mail/a_adminmail.txt');
        $admin_renderer->setMode(RENDER_VAR);
        $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
        $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

        mail(
          $admin_mail,
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($a_admin_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from
        );

        $user->setAttribute("data",'');

        $controller->redirect("http://www.fits-japan.com/company/recruit/arbeit/entry_thanks.html");
        return VIEW_NONE;
//        return VIEW_SUCCESS;
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
        "��̾�����ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "name2", 
        true, 
        "��̾��̾�ˤ����Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "kana1", 
        true, 
        "��̾�ʥեꥬ�� ���ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "kana2", 
        true, 
        "��̾�ʥեꥬ�� ̾�ˤ����Ϥ��Ƥ���������"
      );

      if(!checkdate($data["bmonth"],$data["bday"],$data["byear"])){
        $validatorManager->setRequired(
          "virthday", 
          true, 
          "��ǯ���������������Ϥ��Ƥ���������"
        );
      }
      
      $validatorManager->setRequired(
        "wjob", 
        true, 
        "��˾��������Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "email", 
        true, 
        "�᡼�륢�ɥ쥹�����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "email2", 
        true, 
        "�᡼�륢�ɥ쥹�ʳ�ǧ�ѡˤ����Ϥ��Ƥ���������"
      );
      if($data["email"] && $data["email2"] && $data["email"]<>$data["email2"]){
        $validatorManager->setRequired(
          "invalid_email", 
          true, 
          "�᡼�륢�ɥ쥹�����������Ϥ��Ƥ���������"
        );
      }
      $validator = &new EmailValidator();
      $params = array('email_error' => 'E�᡼�륢�ɥ쥹�������Ǥ���');
      $validator->initialize($params);
      $validatorManager->register('email', $validator);

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
      $validatorManager->setRequired(
        "address", 
        true, 
        "��������Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "tel1", 
        true, 
        "Ϣ��μ��������ֹ�ʻԳ����֡ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "tel2", 
        true, 
        "Ϣ��μ��������ֹ�ʻ�����֡ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "tel3", 
        true, 
        "Ϣ��μ��������ֹ�ʲ������ֹ�ˤ����Ϥ��Ƥ���������"
      );
      
      if($data["w_status"] && ($data["w_status"]<1 || $data["w_status"]>4)){
        $validatorManager->setRequired(
          "invalid_w_status", 
          true, 
          " ���ߤξ��������������򤷤Ƥ���������"
        );
      }

      $validatorManager->setRequired(
        "schoolname", 
        true, 
        "�ǽ�����γع����������زʤ����Ϥ��Ƥ���������"
      );
      if(!checkdate($data["gmonth"],1,$data["gyear"])){
        $validatorManager->setRequired(
          "grad_date", 
          true, 
          "´��ǯ������������Ϥ��Ƥ���������"
        );
      }

      if(
        ($data["c1_smonth"] || $data["c1_syear"]) && 
        !checkdate($data["c1_smonth"],1,$data["c1_syear"])
      ){
        $validatorManager->setRequired(
          "c1_sdate",
          true, 
          "���򣱤κ߿����֡ʳ��ϡˤ����������Ϥ��Ƥ���������"
        );
      }
      if(
        ($data["c1_emonth"] || $data["c1_eyear"]) && 
        !checkdate($data["c1_emonth"],1,$data["c1_eyear"])
      ){
        $validatorManager->setRequired(
          "c1_edate",
          true, 
          "���򣱤κ߿����֡ʽ�λ�ˤ����������Ϥ��Ƥ���������"
        );
      }
      if(
        checkdate($data["c1_smonth"],1,$data["c1_syear"]) &&
        checkdate($data["c1_emonth"],1,$data["c1_eyear"]) &&
        (
          mktime(0,0,0,$data["c1_emonth"],1,$data["c1_eyear"])-
          mktime(0,0,0,$data["c1_smonth"],1,$data["c1_syear"])
        ) < 0
      ){
        $validatorManager->setRequired(
          "c1_invalid_date",
          true, 
          "���򣱤κ߿����֤����������Ϥ��Ƥ���������"
        );
      }
      if($data["c1_emp_id"] && ($data["c1_emp_id"]<1 || $data["c1_emp_id"]>6)){
        $validatorManager->setRequired(
          "invalid_c1_emp_id", 
          true, 
          "���򣱤θ��ѷ��֤����������򤷤Ƥ���������"
        );
      }
      if(mb_strlen($data["c1_job"])>1000){
        $validatorManager->setRequired(
          "c1_job_length",
          true, 
          "���򣱤ο�̳���Ƥ�Ĺ�����ޤ���"
        );
      }

      if(
        ($data["c2_smonth"] || $data["c2_syear"]) && 
        !checkdate($data["c2_smonth"],1,$data["c2_syear"])
      ){
        $validatorManager->setRequired(
          "c2_sdate",
          true, 
          "���򣲤κ߿����֡ʳ��ϡˤ����������Ϥ��Ƥ���������"
        );
      }
      if(
        ($data["c2_emonth"] || $data["c2_eyear"]) && 
        !checkdate($data["c2_emonth"],1,$data["c2_eyear"])
      ){
        $validatorManager->setRequired(
          "c2_edate",
          true, 
          "���򣲤κ߿����֡ʽ�λ�ˤ����������Ϥ��Ƥ���������"
        );
      }
      if(
        checkdate($data["c2_smonth"],1,$data["c2_syear"]) &&
        checkdate($data["c2_emonth"],1,$data["c2_eyear"]) &&
        (
          mktime(0,0,0,$data["c2_emonth"],1,$data["c2_eyear"])-
          mktime(0,0,0,$data["c2_smonth"],1,$data["c2_syear"])
        ) < 0
      ){
        $validatorManager->setRequired(
          "c2_invalid_date",
          true, 
          "���򣲤κ߿����֤����������Ϥ��Ƥ���������"
        );
      }
      if($data["c2_emp_id"] && ($data["c2_emp_id"]<1 || $data["c2_emp_id"]>6)){
        $validatorManager->setRequired(
          "invalid_c2_emp_id", 
          true, 
          "���򣲤θ��ѷ��֤����������򤷤Ƥ���������"
        );
      }
      if(mb_strlen($data["c2_job"])>1000){
        $validatorManager->setRequired(
          "c2_job_length",
          true, 
          "���򣲤ο�̳���Ƥ�Ĺ�����ޤ���"
        );
      }

      if(
        ($data["c3_smonth"] || $data["c3_syear"]) && 
        !checkdate($data["c3_smonth"],1,$data["c3_syear"])
      ){
        $validatorManager->setRequired(
          "c3_sdate",
          true, 
          "���򣳤κ߿����֡ʳ��ϡˤ����������Ϥ��Ƥ���������"
        );
      }
      if(
        ($data["c3_emonth"] || $data["c3_eyear"]) && 
        !checkdate($data["c3_emonth"],1,$data["c3_eyear"])
      ){
        $validatorManager->setRequired(
          "c3_edate",
          true, 
          "���򣳤κ߿����֡ʽ�λ�ˤ����������Ϥ��Ƥ���������"
        );
      }
      if(
        checkdate($data["c3_smonth"],1,$data["c3_syear"]) &&
        checkdate($data["c3_emonth"],1,$data["c3_eyear"]) &&
        (
          mktime(0,0,0,$data["c3_emonth"],1,$data["c3_eyear"])-
          mktime(0,0,0,$data["c3_smonth"],1,$data["c3_syear"])
        ) < 0
      ){
        $validatorManager->setRequired(
          "c3_invalid_date",
          true, 
          "���򣳤κ߿����֤����������Ϥ��Ƥ���������"
        );
      }
      if($data["c3_emp_id"] && ($data["c3_emp_id"]<1 || $data["c3_emp_id"]>6)){
        $validatorManager->setRequired(
          "invalid_c3_emp_id", 
          true, 
          "���򣳤θ��ѷ��֤����������򤷤Ƥ���������"
        );
      }
      if(mb_strlen($data["c3_job"])>1000){
        $validatorManager->setRequired(
          "c3_job_length",
          true, 
          "���򣳤ο�̳���Ƥ�Ĺ�����ޤ���"
        );
      }

      if($data["elevel_id"] && ($data["elevel_id"]<1 || $data["elevel_id"]>4)){
        $validatorManager->setRequired(
          "invalid_elevel_id", 
          true, 
          "�Ѳ��äΥ�٥�����������򤷤Ƥ���������"
        );
      }

      if($data["llevel_id"] && ($data["llevel_id"]<1 || $data["llevel_id"]>3)){
        $validatorManager->setRequired(
          "invalid_llevel_id", 
          true, 
          "����¾��ؤ�ǽ�Ϥ����������򤷤Ƥ���������"
        );
      }

      if(mb_strlen($data["entitle"])>1000){
        $validatorManager->setRequired(
          "entitle_length",
          true, 
          "��ʤ�Ĺ�����ޤ���"
        );
      }

      if(
        ($data["wmonth"] || $data["wyear"]) && 
        !checkdate($data["wmonth"],1,$data["wyear"])
      ){
        $validatorManager->setRequired(
          "invalid_wdate",
          true, 
          "���Ҵ�˾���������������Ϥ��Ƥ���������"
        );
      }

      if(mb_strlen($data["worktime"])>1000){
        $validatorManager->setRequired(
          "worktime_length",
          true, 
          "��̳��ǽ���֤�Ĺ�����ޤ���"
        );
      }

      if(mb_strlen($data["wreason"])>1000){
        $validatorManager->setRequired(
          "wreason_length",
          true, 
          "��˾��ͳ��Ĺ�����ޤ���"
        );
      }

      if(mb_strlen($data["comment"])>1000){
        $validatorManager->setRequired(
          "comment_length",
          true, 
          "����¾���ͤ�Ĺ�����ޤ���"
        );
      }

    }
  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

}

?>
