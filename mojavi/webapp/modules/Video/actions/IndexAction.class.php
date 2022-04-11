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
      
      // tokenを作ってセット
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
        //レコードのIDではなく相談の受付IDを生成して返す


        if($data["method"]==3){
          $branch_id=$branch_no[$data["sprefecture"]];
        }else{
          $branch_id=$branch_no[$data["prefecture"]];
        }
        // メール送信

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
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($admin_mail_subject.'（発送依頼）',"ISO-2022-JP","EUC-JP"))."?=",
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
          "希望のビデオを選択してください。"
        );
      }

      if(count($data["video_checked"])>4){
        $validatorManager->setRequired(
          "invalid_video_count", 
          true, 
          "選択できるビデオの数は4本までです。"
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
          "借用期間を正しく入力してください。"
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
          "借用期間を正しく入力してください。"
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
          "借用期間を正しく入力してください。"
        );
      }
*/

      $validatorManager->setRequired(
        "zipcode1", 
        true,
        "郵便番号（上３桁）を入力してください。"
      );
      $validatorManager->setRequired(
        "zipcode2", 
        true,
        "郵便番号（下４桁）を入力してください。"
      );
      if($data["zipcode1"] && !preg_match("/^\d+$/",$data["zipcode1"])){
        $validatorManager->setRequired(
          "invalid_zip1", 
          true,
          "郵便番号（上３桁）を正しく入力してください。"
        );
      }
      if($data["zipcode2"] && !preg_match("/^\d+$/",$data["zipcode2"])){
        $validatorManager->setRequired(
          "invalid_zip2", 
          true,
          "郵便番号（下４桁）を正しく入力してください。"
        );
      }

      $validatorManager->setRequired(
        "prefecture", 
        true, 
        "都道府県を選択してください。"
      );
      if($data["prefecture"] && ($data["prefecture"]<1 || $data["prefecture"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "都道府県を正しく選択してください。"
        );
      }

      $validatorManager->setRequired(
        "address", 
        true, 
        "市区町村以下を入力してください。"
      );

      $validatorManager->setRequired(
        "name_dat", 
        true,
        "お名前を入力してください。"
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

      if($data["fax1"] && !preg_match("/^\d+$/",$data["fax1"])){
        $validatorManager->setRequired(
          "invalid_fax1", 
          true,
          "FAX番号（市外局番）を正しく入力してください。"
        );
      }
      if($data["fax2"] && !preg_match("/^\d+$/",$data["fax2"])){
        $validatorManager->setRequired(
          "invalid_fax2", 
          true,
          "FAX番号（市内局番）を正しく入力してください。"
        );
      }
      if($data["fax3"] && !preg_match("/^\d+$/",$data["fax3"])){
        $validatorManager->setRequired(
          "invalid_fax3", 
          true,
          "FAX番号（加入者番号）を正しく入力してください。"
        );
      }

      $validatorManager->setRequired(
        "email", 
        true,
        "メールアドレスを入力してください。"
      );
      $validator = new EmailValidator();
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
        "method", 
        true, 
        "希望貸し出し方法を入力してください。"
      );

      if(@$data["method"]==1){
        $validatorManager->setRequired(
          "month_1", 
          true,
          "希望来訪日時（月）を入力してください。"
        );
        $validatorManager->setRequired(
          "day_1", 
          true,
          "希望来訪日時（日）を入力してください。"
        );
        if(!checkdate($data["month_1"],$data["day_1"],2008)){
          $validatorManager->setRequired(
            "invalid_date", 
            true,
            "希望来訪日時を正しく入力してください。"
          );
        }
        $validatorManager->setRequired(
          "visittime", 
          true,
          "希望来訪日時（時間帯）を入力してください。"
        );
      }
      
      if(@$data["method"]==3){
      
        $validatorManager->setRequired(
          "szipcode1", 
          true,
          "送付先：郵便番号（上３桁）を入力してください。"
        );
        $validatorManager->setRequired(
          "szipcode2", 
          true,
          "送付先：郵便番号（下４桁）を入力してください。"
        );
        if($data["szipcode1"] && !preg_match("/^\d+$/",$data["szipcode1"])){
          $validatorManager->setRequired(
            "invalid_szip1", 
            true,
            "送付先：郵便番号（上３桁）を正しく入力してください。"
          );
        }
        if($data["szipcode2"] && !preg_match("/^\d+$/",$data["szipcode2"])){
          $validatorManager->setRequired(
            "invalid_szip2", 
            true,
            "送付先：郵便番号（下４桁）を正しく入力してください。"
          );
        }

        $validatorManager->setRequired(
          "sprefecture", 
          true, 
          "送付先：都道府県を選択してください。"
        );
        if($data["sprefecture"] && ($data["sprefecture"]<1 || $data["sprefecture"]>47)){
          $validatorManager->setRequired(
            "invalid_spref", 
            true, 
            "送付先：都道府県を正しく選択してください。"
          );
        }

        $validatorManager->setRequired(
          "saddress", 
          true, 
          "送付先：市区町村以下を入力してください。"
        );

        $validatorManager->setRequired(
          "sname_dat", 
          true,
          "送付先：あて先を入力してください。"
        );

        $validatorManager->setRequired(
          "stel1", 
          true,
          "送付先：電話番号（市外局番）を入力してください。"
        );
        $validatorManager->setRequired(
          "stel2", 
          true,
          "送付先：電話番号（市内局番）を入力してください。"
        );
        $validatorManager->setRequired(
          "stel3", 
          true,
          "送付先：電話番号（加入者番号）を入力してください。"
        );
        if($data["stel1"] && !preg_match("/^\d+$/",$data["stel1"])){
          $validatorManager->setRequired(
            "invalid_stel1", 
            true,
            "送付先：電話番号（市外局番）を正しく入力してください。"
          );
        }
        if($data["stel2"] && !preg_match("/^\d+$/",$data["stel2"])){
          $validatorManager->setRequired(
            "invalid_stel2", 
            true,
            "送付先：電話番号（市内局番）を正しく入力してください。"
          );
        }
        if($data["stel3"] && !preg_match("/^\d+$/",$data["stel3"])){
          $validatorManager->setRequired(
            "invalid_stel3", 
            true,
            "送付先：電話番号（加入者番号）を正しく入力してください。"
          );
        }
/*
        if($data["sfax1"] && !preg_match("/^\d+$/",$data["sfax1"])){
          $validatorManager->setRequired(
            "invalid_sfax1", 
            true,
            "送付先：FAX番号（市外局番）を正しく入力してください。"
          );
        }
        if($data["sfax2"] && !preg_match("/^\d+$/",$data["sfax2"])){
          $validatorManager->setRequired(
            "invalid_sfax2", 
            true,
            "送付先：FAX番号（市内局番）を正しく入力してください。"
          );
        }
        if($data["sfax3"] && !preg_match("/^\d+$/",$data["sfax3"])){
          $validatorManager->setRequired(
            "invalid_sfax3", 
            true,
            "送付先：FAX番号（加入者番号）を正しく入力してください。"
          );
        }

        $validatorManager->setRequired(
          "semail", 
          true,
          "送付先：メールアドレスを入力してください。"
        );
        $validator = &new EmailValidator();
        $params = array('email_error' => 'メールアドレスを正しく入力してください。');
        $validator->initialize($params);
        $validatorManager->register('semail', $validator);

        $validatorManager->setRequired(
          "semail2", 
          true,
          "メールアドレス（確認）を入力してください。"
        );
        
        if($data["semail"] && $data["semail2"] && $data["semail"]<>$data["semail2"]){
          $validatorManager->setRequired(
            "invalid_semail", 
            true,
            "メールアドレス（確認）を正しく入力してください。"
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
