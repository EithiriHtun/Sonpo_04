<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'VideoManager.php');
require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');
require_once(VALIDATOR_DIR.'EmailValidator.class.php');
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){

    // check ssl
//    if(!isset($_SERVER['HTTPS'])){
//      $controller->redirect('/');
//      return VIEW_NONE;
//    }
    
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
    
    $videoData=$this->videoData(&$controller);
    
    $request->setAttribute("jenre",$videoData["jenre_name"]);
    $request->setAttribute("video_id",$videoData["video_id"]);
    $request->setAttribute("vname",$videoData["vname"]);
    $request->setAttribute("vurl",$videoData["vurl"]);
    $request->setAttribute("nvideo",$videoData["nvideo"]);
    
    return VIEW_INPUT;

  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    // check ssl
//    if(!isset($_SERVER['HTTPS'])){
//      $controller->redirect('/');
//      return VIEW_NONE;
//    }

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
    
    $videoData=$this->videoData(&$controller);
    
    $request->setAttribute("jenre",$videoData["jenre_name"]);
    $request->setAttribute("video_id",$videoData["video_id"]);
    $request->setAttribute("vname",$videoData["vname"]);
    $request->setAttribute("vurl",$videoData["vurl"]);
    $request->setAttribute("nvideo",$videoData["nvideo"]);

    switch ($request->getParameter("mode")){
    
      case "rewrite":
        $request->setAttribute("token",$user->getAttribute("token_ref"));
        return VIEW_INPUT;

      case "preview":
        $request->setAttribute("token",$user->getAttribute("token_ref"));
        $request->setAttribute("nselectvideo",count($data["video_checked"]));
        return VIEW_ALERT;

      case "submit":
      
        $data["ip"]=$_SERVER["REMOTE_ADDR"];
      
        $counter=1;
        if($videoData["vname"]){
          foreach($videoData["vname"] as $key=>$val){
            if(@$data["video_checked"][$key]){
              $data["video".$counter]=$val;
              $counter++;
            }
          }
        }
      
        $video_manager=new VideoManager($DB);
        $video_id=$video_manager->insert($data);
        //�쥳���ɤ�ID�ǤϤʤ����̤μ���ID�����������֤�


        if($data["method"]==3){
          $branch_id=$branch_no[$data["sprefecture"]];
        }else{
          $branch_id=$branch_no[$data["prefecture"]];
        }
        // �᡼������

        // for user
        $user_renderer= new CustomSmartyRenderer($controller, $request, $user);
        $user_renderer->setAttribute('video_id', $video_id);
        $user_renderer->setAttribute("prefs",$prefs);
        $user_renderer->setAttribute("data",$data);
//        $user_renderer->setAttribute("branch_name",$branch_name[$branch_id]);
//        $user_renderer->setAttribute("branch_zip",$branch_zip[$branch_id]);
//        $user_renderer->setAttribute("branch_address",$branch_address[$branch_id]);
//        $user_renderer->setAttribute("branch_tel",$branch_tel[$branch_id]);
//        $user_renderer->setAttribute("branch_fax",$branch_fax[$branch_id]);
    
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
        $admin_renderer->setAttribute('video_id', $video_id);
        $admin_renderer->setAttribute("prefs",$prefs);
        $admin_renderer->setAttribute("data",$data);
//        $admin_renderer->setAttribute("branch_name",$branch_name[$branch_id]);

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

/*
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
        mail(
          $mbs_mail,
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($admin_mail_subject.'��ȯ�������',"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );

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
    
    if($request->getParameter("mode")=="preview"){
      $data_in_session=$user->getAttribute("data");
      $data_in_session["videoNo"]=array();
      $data=array_merge($data_in_session,$request->getParameters());
      $video_checked=array();
      $videoNo=$_REQUEST["videoNo"];

      if($videoNo){
        foreach($videoNo as $val){
          $video_checked[$val]=1;
        }
      }
      $data["video_checked"]=$video_checked;
    }

    if($request->getParameter("mode")=="preview"){
      $user->setAttribute("data",$data);
      
      if(count($data["video_checked"])<1){
        $validatorManager->setRequired(
          "invalid_video_count", 
          true, 
          "��˾�Υӥǥ������򤷤Ƥ���������"
        );
      }

      if(count($data["video_checked"])>4){
        $validatorManager->setRequired(
          "invalid_video_count", 
          true, 
          "����Ǥ���ӥǥ��ο���4�ܤޤǤǤ���"
        );
      }
      
      if(
        mktime(0,0,0,$data["smonth"],$data["sday"],$data["syear"]) -
        mktime(0,0,0,date("m"),date("d"),date("Y"))
        < 3*24*60*60
      ){
        $validatorManager->setRequired(
          "invalid_start_date", 
          true, 
          "���Ѵ��֤����������Ϥ��Ƥ���������"
        );
      }

      if(
        mktime(0,0,0,$data["emonth"],$data["eday"],$data["eyear"]) -
        mktime(0,0,0,$data["smonth"],$data["sday"],$data["syear"])
        < 0
      ){
        $validatorManager->setRequired(
          "invalid_start_date", 
          true, 
          "���Ѵ��֤����������Ϥ��Ƥ���������"
        );
      }

/*
      if(
        mktime(0,0,0,$data["emonth"],$data["eday"],$data["eyear"]) -
        mktime(0,0,0,$data["smonth"],$data["sday"],$data["syear"])
        > 7*24*60*60
      ){
        $validatorManager->setRequired(
          "invalid_start_date", 
          true, 
          "���Ѵ��֤����������Ϥ��Ƥ���������"
        );
      }
*/

      $validatorManager->setRequired(
        "zipcode1", 
        true,
        "͹���ֹ�ʾ壳��ˤ����Ϥ��Ƥ���������"
      );
      $validatorManager->setRequired(
        "zipcode2", 
        true,
        "͹���ֹ�ʲ�����ˤ����Ϥ��Ƥ���������"
      );
      if($data["zipcode1"] && !preg_match("/^\d+$/",$data["zipcode1"])){
        $validatorManager->setRequired(
          "invalid_zip1", 
          true,
          "͹���ֹ�ʾ壳��ˤ����������Ϥ��Ƥ���������"
        );
      }
      if($data["zipcode2"] && !preg_match("/^\d+$/",$data["zipcode2"])){
        $validatorManager->setRequired(
          "invalid_zip2", 
          true,
          "͹���ֹ�ʲ�����ˤ����������Ϥ��Ƥ���������"
        );
      }

      $validatorManager->setRequired(
        "prefecture", 
        true, 
        "��ƻ�ܸ������򤷤Ƥ���������"
      );
      if($data["prefecture"] && ($data["prefecture"]<1 || $data["prefecture"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "��ƻ�ܸ������������򤷤Ƥ���������"
        );
      }

      $validatorManager->setRequired(
        "address", 
        true, 
        "�Զ�Į¼�ʲ������Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "name_dat", 
        true,
        "��̾�������Ϥ��Ƥ���������"
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

      if($data["fax1"] && !preg_match("/^\d+$/",$data["fax1"])){
        $validatorManager->setRequired(
          "invalid_fax1", 
          true,
          "FAX�ֹ�ʻԳ����֡ˤ����������Ϥ��Ƥ���������"
        );
      }
      if($data["fax2"] && !preg_match("/^\d+$/",$data["fax2"])){
        $validatorManager->setRequired(
          "invalid_fax2", 
          true,
          "FAX�ֹ�ʻ�����֡ˤ����������Ϥ��Ƥ���������"
        );
      }
      if($data["fax3"] && !preg_match("/^\d+$/",$data["fax3"])){
        $validatorManager->setRequired(
          "invalid_fax3", 
          true,
          "FAX�ֹ�ʲ������ֹ�ˤ����������Ϥ��Ƥ���������"
        );
      }

      $validatorManager->setRequired(
        "email", 
        true,
        "�᡼�륢�ɥ쥹�����Ϥ��Ƥ���������"
      );
      $validator = new EmailValidator();
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
        "method", 
        true, 
        "��˾�ߤ��Ф���ˡ�����Ϥ��Ƥ���������"
      );

      if(@$data["method"]==1){
        $validatorManager->setRequired(
          "month_1", 
          true,
          "��˾��ˬ�����ʷ�ˤ����Ϥ��Ƥ���������"
        );
        $validatorManager->setRequired(
          "day_1", 
          true,
          "��˾��ˬ���������ˤ����Ϥ��Ƥ���������"
        );
        if(!checkdate($data["month_1"],$data["day_1"],2008)){
          $validatorManager->setRequired(
            "invalid_date", 
            true,
            "��˾��ˬ���������������Ϥ��Ƥ���������"
          );
        }
        $validatorManager->setRequired(
          "visittime", 
          true,
          "��˾��ˬ�����ʻ����ӡˤ����Ϥ��Ƥ���������"
        );
      }
      
      if(@$data["method"]==3){
      
        $validatorManager->setRequired(
          "szipcode1", 
          true,
          "�����衧͹���ֹ�ʾ壳��ˤ����Ϥ��Ƥ���������"
        );
        $validatorManager->setRequired(
          "szipcode2", 
          true,
          "�����衧͹���ֹ�ʲ�����ˤ����Ϥ��Ƥ���������"
        );
        if($data["szipcode1"] && !preg_match("/^\d+$/",$data["szipcode1"])){
          $validatorManager->setRequired(
            "invalid_szip1", 
            true,
            "�����衧͹���ֹ�ʾ壳��ˤ����������Ϥ��Ƥ���������"
          );
        }
        if($data["szipcode2"] && !preg_match("/^\d+$/",$data["szipcode2"])){
          $validatorManager->setRequired(
            "invalid_szip2", 
            true,
            "�����衧͹���ֹ�ʲ�����ˤ����������Ϥ��Ƥ���������"
          );
        }

        $validatorManager->setRequired(
          "sprefecture", 
          true, 
          "�����衧��ƻ�ܸ������򤷤Ƥ���������"
        );
        if($data["sprefecture"] && ($data["sprefecture"]<1 || $data["sprefecture"]>47)){
          $validatorManager->setRequired(
            "invalid_spref", 
            true, 
            "�����衧��ƻ�ܸ������������򤷤Ƥ���������"
          );
        }

        $validatorManager->setRequired(
          "saddress", 
          true, 
          "�����衧�Զ�Į¼�ʲ������Ϥ��Ƥ���������"
        );

        $validatorManager->setRequired(
          "sname_dat", 
          true,
          "�����衧����������Ϥ��Ƥ���������"
        );

        $validatorManager->setRequired(
          "stel1", 
          true,
          "�����衧�����ֹ�ʻԳ����֡ˤ����Ϥ��Ƥ���������"
        );
        $validatorManager->setRequired(
          "stel2", 
          true,
          "�����衧�����ֹ�ʻ�����֡ˤ����Ϥ��Ƥ���������"
        );
        $validatorManager->setRequired(
          "stel3", 
          true,
          "�����衧�����ֹ�ʲ������ֹ�ˤ����Ϥ��Ƥ���������"
        );
        if($data["stel1"] && !preg_match("/^\d+$/",$data["stel1"])){
          $validatorManager->setRequired(
            "invalid_stel1", 
            true,
            "�����衧�����ֹ�ʻԳ����֡ˤ����������Ϥ��Ƥ���������"
          );
        }
        if($data["stel2"] && !preg_match("/^\d+$/",$data["stel2"])){
          $validatorManager->setRequired(
            "invalid_stel2", 
            true,
            "�����衧�����ֹ�ʻ�����֡ˤ����������Ϥ��Ƥ���������"
          );
        }
        if($data["stel3"] && !preg_match("/^\d+$/",$data["stel3"])){
          $validatorManager->setRequired(
            "invalid_stel3", 
            true,
            "�����衧�����ֹ�ʲ������ֹ�ˤ����������Ϥ��Ƥ���������"
          );
        }
/*
        if($data["sfax1"] && !preg_match("/^\d+$/",$data["sfax1"])){
          $validatorManager->setRequired(
            "invalid_sfax1", 
            true,
            "�����衧FAX�ֹ�ʻԳ����֡ˤ����������Ϥ��Ƥ���������"
          );
        }
        if($data["sfax2"] && !preg_match("/^\d+$/",$data["sfax2"])){
          $validatorManager->setRequired(
            "invalid_sfax2", 
            true,
            "�����衧FAX�ֹ�ʻ�����֡ˤ����������Ϥ��Ƥ���������"
          );
        }
        if($data["sfax3"] && !preg_match("/^\d+$/",$data["sfax3"])){
          $validatorManager->setRequired(
            "invalid_sfax3", 
            true,
            "�����衧FAX�ֹ�ʲ������ֹ�ˤ����������Ϥ��Ƥ���������"
          );
        }

        $validatorManager->setRequired(
          "semail", 
          true,
          "�����衧�᡼�륢�ɥ쥹�����Ϥ��Ƥ���������"
        );
        $validator = &new EmailValidator();
        $params = array('email_error' => '�᡼�륢�ɥ쥹�����������Ϥ��Ƥ���������');
        $validator->initialize($params);
        $validatorManager->register('semail', $validator);

        $validatorManager->setRequired(
          "semail2", 
          true,
          "�᡼�륢�ɥ쥹�ʳ�ǧ�ˤ����Ϥ��Ƥ���������"
        );
        
        if($data["semail"] && $data["semail2"] && $data["semail"]<>$data["semail2"]){
          $validatorManager->setRequired(
            "invalid_semail", 
            true,
            "�᡼�륢�ɥ쥹�ʳ�ǧ�ˤ����������Ϥ��Ƥ���������"
          );
        }
*/
      
      }
      
    }

  }


  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }
  
  function videoData (&$controller){
    require($controller->getModuleDir()."config/config.php");

    $fp=fopen($videoDataFile,"r");
    $counter=1;
    $jenre=array();
    $name=array();
    $url=array();
    while (!feof($fp)) {
      $line=fgets($fp, 4096);
      $line=mb_convert_encoding($line,"EUC-JP","SJIS");
      $elm=explode(",",$line);
      $jenre[$counter]=@$elm[0];
      $name[$counter] =@$elm[1];
      $url[$counter]  =@$elm[2];
      $counter++;
    }
    fclose ($fp);
    $counter--;

    $video_id=array();
    $jenre_name=array();
    $idtmp=array();
    $nametmp="";
    $jcounter=1;
    for($i=1;$i<$counter;$i++){
      if($i>1 && $jenre[$i]<>$nametmp){
        $video_id[$jcounter]=$idtmp;
        $idtmp=array();
        $jenre_name[$jcounter]=$nametmp;
        $jcounter++;
      }
      array_push($idtmp,$i);
      $nametmp=$jenre[$i];
      if($i==$counter-1){
        $video_id[$jcounter]=$idtmp;
        $jenre_name[$jcounter]=$nametmp;
      }
    }
    
    return array(
      "video_id"   => $video_id,
      "jenre_name" => $jenre_name,
      "vname"      => $name,
      "vurl"       => $url,
      "nvideo"     => $counter-1
    );

  }


}

?>
