<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');
require_once(LIB_DIR.'DocManager.php');
require_once(LIB_DIR.'PubManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class InstCopyAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
  //コピーしたフォームを表示
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if($user->getAttribute("is_shipping")==1){
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

    if(!$request->getErrors()){
      $user->setAttribute("data",'');
      $user->setAttribute("id",'');
      $user->setAttribute("prestatus",'');
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

    $book_mgr= new PubManager($DB);

    if(!$request->getErrors()){

      $categories=array();
      if($id){
        $article_manager= new InstructorManager($DB);
        $data=$article_manager->get_one($id);
        
        if(!$data){
          $controller->redirect(SCRIPT_PATH);
          return VIEW_NONE;
        }
        
        $temp_items=$book_mgr->get_one_order_item_temp($id);
        $items=array();
        if($temp_items){
          foreach($temp_items as $val){
//            $items[$val['pub_id']]=$val;
            $data['order_'.$val['pub_id']]=$val['amount'];
          }
        }
        
      }
      
      $pstatus=$book_mgr->get_order_status($id);
      if($pstatus){
        $data['trans_status']=$pstatus['trans_status'];
        $data['approve']=$pstatus['approve'];
      }else{
        $data['trans_status']=99;
        $data['approve']=99;
      }

      if(strtotime($data['date_regist'])<mktime(0,0,0,10,4,2010)){
        $data['is_new']=0;
      }else{
        $data['is_new']=1;
      }

      
      $user->setAttribute("data",$data);
      $user->setAttribute("prestatus",$data["status"]);

    }else{
      $data=$user->getAttribute("data");
    }
    
    $doc_mgr= new DocManager($DB);
    $request->setAttribute("doclist",$doc_mgr->get_all());
    
//    $books=$book_mgr->get_pubmaster_all();
    $books=$book_mgr->get_pubmaster_inst();
    $books2=array();
    if($books){
      foreach($books as $key2=>$val2){
//        $val2['count']=(isset($items[$val2['id']]))? 
//          $items[$val2['id']]['amount'] : '';
        $val2['count']=(isset($data['order_'.$val2['id']]))? 
          $data['order_'.$val2['id']] : '';
        array_push($books2,$val2);
      }
    }
    $request->setAttribute("books",$books2);
    
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
        $time2=mktime(0,0,0,$data["month_2"],$data["day_2"],$data["year_2"]);
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
        $id=$inst_manager->insert3($data);

        $branch_id=(@$branch_no[$data["prefecture"]])? $branch_no[$data["prefecture"]] : '';

/*
        // メール送信

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

        $controller->redirect("/manage/forms/index.php/module/FormManage/action/InstRegist?id=".$id);
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
    
    if($request->getParameter("mode")=="submit"){
      $data_in_session=$user->getAttribute("data");
      $data=array_merge($data_in_session,$request->getParameters());
    }


    if($data["mode"]=="submit"){
    
      $user->setAttribute("data",$data);

/*
      $validatorManager->setRequired(
        "host", 
        true, 
        "主催者名を入力してください。"
      );

      $validatorManager->setRequired(
        "post1", 
        true,
        "郵便番号（上３桁）を入力してください。"
      );
      $validatorManager->setRequired(
        "post2", 
        true,
        "郵便番号（下４桁）を入力してください。"
      );
*/
      if($data["post1"] && !preg_match("/^\d+$/",$data["post1"])){
        $validatorManager->setRequired(
          "invalid_zip1", 
          true,
          "郵便番号（上３桁）を正しく入力してください。"
        );
      }
      if($data["post2"] && !preg_match("/^\d+$/",$data["post2"])){
        $validatorManager->setRequired(
          "invalid_zip2", 
          true,
          "郵便番号（下４桁）を正しく入力してください。"
        );
      }
      
/*
      $validatorManager->setRequired(
        "prefecture", 
        true, 
        "都道府県を選択してください。"
      );
*/
      if($data["prefecture"] && ($data["prefecture"]<1 || $data["prefecture"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "都道府県を正しく選択してください。"
        );
      }
/*
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
*/
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

/*
      $validatorManager->setRequired(
        "person_last", 
        true,
        "ご担当者名（姓）を入力してください。"
      );
      $validatorManager->setRequired(
        "person_first", 
        true,
        "ご担当者名（名）を入力してください。"
      );
      $validatorManager->setRequired(
        "person_kana_last", 
        true,
        "ご担当者名フリガナ（姓）を入力してください。"
      );
      $validatorManager->setRequired(
        "person_kana_first", 
        true,
        "ご担当者名フリガナ（名）を入力してください。"
      );

      $validatorManager->setRequired(
        "email1", 
        true,
        "メールアドレスを入力してください。"
      );
      $validator = &new EmailValidator();
      $params = array('email_error' => 'メールアドレスを正しく入力してください。');
      $validator->initialize($params);
      $validatorManager->register('email1', $validator);

      $validatorManager->setRequired(
        "email2", 
        true,
        "メールアドレス（確認）を入力してください。"
      );
      
      if($data["email1"] && $data["email2"] && $data["email1"]<>$data["email2"]){
        $validatorManager->setRequired(
          "invalid_email", 
          true,
          "メールアドレス（確認）を正しく入力してください。"
        );
      }
*/
/*
      $user->setAttribute("data",$data);

      $validatorManager->setRequired(
        "year_1", 
        true,
        "希望開催日時（年）を入力してください。"
      );
      $validatorManager->setRequired(
        "month_1", 
        true,
        "希望開催日時（月）を入力してください。"
      );
      $validatorManager->setRequired(
        "day_1", 
        true,
        "希望開催日時（日）を入力してください。"
      );
      $validatorManager->setRequired(
        "hour_from_1", 
        true,
        "希望開催日時（開始時）を入力してください。"
      );
      $validatorManager->setRequired(
        "min_from_1", 
        true,
        "希望開催日時（開始分）を入力してください。"
      );
      $validatorManager->setRequired(
        "hour_to_1", 
        true,
        "希望開催日時（終了時）を入力してください。"
      );
      $validatorManager->setRequired(
        "min_to_1", 
        true,
        "希望開催日時（終了分）を入力してください。"
      );

      $validatorManager->setRequired(
        "lecture_hall", 
        true,
        "会場名を入力してください。"
      );
      $validatorManager->setRequired(
        "lecture_prefecture", 
        true, 
        "講演会場の都道府県を選択してください。"
      );
*/
      if($data["lecture_prefecture"] && ($data["lecture_prefecture"]<1 || $data["lecture_prefecture"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "会場の都道府県を正しく選択してください。"
        );
      }
/*
      $validatorManager->setRequired(
        "lecture_address", 
        true, 
        "講演会場所在地の市区町村以下を入力してください。"
      );

      $validatorManager->setRequired(
        "lecture_tel1", 
        true,
        "講演会場の電話番号（市外局番）を入力してください。"
      );
      $validatorManager->setRequired(
        "lecture_tel2", 
        true,
        "講演会場の電話番号（市内局番）を入力してください。"
      );
      $validatorManager->setRequired(
        "lecture_tel3", 
        true,
        "講演会場の電話番号（加入者番号）を入力してください。"
      );
*/
      if($data["lecture_tel1"] && !preg_match("/^\d+$/",$data["lecture_tel1"])){
        $validatorManager->setRequired(
          "invalid_tel1", 
          true,
          "会場の電話番号（市外局番）を正しく入力してください。"
        );
      }
      if($data["lecture_tel2"] && !preg_match("/^\d+$/",$data["lecture_tel2"])){
        $validatorManager->setRequired(
          "invalid_tel2", 
          true,
          "会場の電話番号（市内局番）を正しく入力してください。"
        );
      }
      if($data["lecture_tel3"] && !preg_match("/^\d+$/",$data["lecture_tel3"])){
        $validatorManager->setRequired(
          "invalid_tel3", 
          true,
          "会場の電話番号（加入者番号）を正しく入力してください。"
        );
      }

/*
      $validatorManager->setRequired(
        "object_text", 
        true,
        "講演対象を入力してください。"
      );
      $validatorManager->setRequired(
        "object_num", 
        true,
        "予定人数を入力してください。"
      );
      $validatorManager->setRequired(
        "themes", 
        true,
        "講演テーマを入力してください。"
      );

      $validatorManager->setRequired(
        "video", 
        true,
        "ビデオ希望の有無を入力してください。"
      );

      $validatorManager->setRequired(
        "copy", 
        true,
        "資料の必要部数を入力してください。"
      );
      $validatorManager->setRequired(
        "receiver_address", 
        true,
        "資料送付先を入力してください。"
      );
      $validatorManager->setRequired(
        "use_pcprj", 
        true,
        "パソコンおよびプロジェクターの使用"
      );
      $validatorManager->setRequired(
        "exp", 
        true,
        "本制度のご利用経験を入力してください。"
      );
*/
    }
  }

  function _get_trans_price($user_status,$weight){
    if($user_status==2){
//      return 700;
//      $price=735;
//      $price=648;
      $price=770;
//      $unit=1;
      $unit=ceil($weight/25000);
      if($unit){
        return $price*$unit;
      }else{
        return $price;
      }
    }else{
      $weight = $weight + 7;//7g embelope
    
      $price=460;
      if($weight<50){
        $price+=120;
      }elseif($weight<100){
        $price+=140;
      }elseif($weight<150){
        $price+=210;
      }elseif($weight<250){
        $price+=250;
      }elseif($weight<500){
        $price+=390;
      }elseif($weight<1000){
        $price+=580;
      }elseif($weight<2000){
        $price+=1040;
      }elseif($weight<4000){
        $price+=1350;
      }else{
        $price+=1350;
      }
      return $price;
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
