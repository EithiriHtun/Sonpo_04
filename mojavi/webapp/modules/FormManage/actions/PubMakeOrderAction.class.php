<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');
require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');
require_once(VALIDATOR_DIR.'EmailValidator.class.php');
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubMakeOrderAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    require($controller->getModuleDir()."../Publication/config/config.php");

    // check ssl
//    if(!isset($_SERVER['HTTPS'])){
//      $controller->redirect('/');
//      return VIEW_NONE;
//    }
    
    $user->setAttribute("data",'');
    $request->setAttribute("operation","initial");
    
    $DB=$request->getAttribute('db');
    $pub_manager=new PubManager($DB);

    foreach($pub_category as $key=>$val){
      $tmp_book=$pub_manager->get_books_by_category_other($key,1);
      $tmp_book2=array();
      if($tmp_book){
        foreach($tmp_book as $key2=>$val2){
//          if($val2['stock']>0 || $val2['show_if_zero']==1){
            if(isset($data['order_'.$val2['id']])){
              $val2['count']=$data['order_'.$val2['id']];
            }else{
              $val2['count']='';
            }
            $val2['stock']=$pub_manager->get_pub_amount($val2['id']);
            array_push($tmp_book2,$val2);
//          }
        }
      }
      $books[$key]=$tmp_book2;
    }
    
    $request->setAttribute("books",$books);
    
    $log_mgr=new FormLogManager();
    $log_mgr->setlog($user->getAttribute('user_account'),'????ʪ????');

    return 'input1';

  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    require($controller->getModuleDir()."../Publication/config/config.php");

    // check ssl
//    if(!isset($_SERVER['HTTPS'])){
//      $controller->redirect('/');
//      return VIEW_NONE;
//    }

    
    $DB=$request->getAttribute('db');
    $data=$user->getAttribute("data");
    
    $pub_manager=new PubManager($DB);

    switch ($request->getParameter("mode")){
    
      case "form":
        $request->setAttribute("token",$user->getAttribute("token_ref"));

        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_other($key,1);
          $tmp_book2=array();
          if($tmp_book){
            foreach($tmp_book as $key2=>$val2){
//              if($val2['stock']>0 || $val2['show_if_zero']==1){
                if(isset($data['order_'.$val2['id']])){
                  $val2['count']=$data['order_'.$val2['id']];
                }else{
                  $val2['count']='';
                }
                $val2['stock']=$pub_manager->get_pub_amount($val2['id']);
                array_push($tmp_book2,$val2);
//              }
            }
          }
          $books[$key]=$tmp_book2;
        }
        
        $request->setAttribute("books",$books);
        
        return 'input1';

      case "form2":
        $request->setAttribute("token",$user->getAttribute("token_ref"));

        $total_price=0;
        $total_count=0;
        $total_weight=0;
        $trans_price=0;
        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_other($key,1);
          $tmp_book2=array();
          if($tmp_book){
            foreach($tmp_book as $key2=>$val2){
              if(isset($data['order_'.$val2['id']])){
                $val2['count']=$data['order_'.$val2['id']];
                $total_price+=$data['order_'.$val2['id']]*$val2['price'];
                $total_count+=$val2['count'];
                $total_weight+=$data['order_'.$val2['id']]*$val2['weight'];
              }else{
                $val2['count']='';
              }
              array_push($tmp_book2,$val2);
            }
          }
          $books[$key]=$tmp_book2;
        }

/*
        if($data["send_type"]==0){
          $trans_price=$this->_get_trans_price($data['user_status'],$total_weight);
        }elseif($data["send_type"]==1){
          $trans_price=$this->_get_trans_price($data['suser_status'],$total_weight);
        }
*/

        $data['total_price']=$total_price;
        $data['total_count']=$total_count;
        $data['trans_price']=$trans_price;
//        $data['allprice']=$total_price+$trans_price;
        $data['allprice']=$trans_price;
        $data['total_weight']=$total_weight;

        $user->setAttribute("data",$data);

        return 'input2';

      case "form3":
        $request->setAttribute("token",$user->getAttribute("token_ref"));

        $total_price=0;
        $total_count=0;
        $total_weight=0;
        $trans_price=0;
        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_other($key,1);
          $tmp_book2=array();
          if($tmp_book){
            foreach($tmp_book as $key2=>$val2){
              if(isset($data['order_'.$val2['id']])){
                $val2['count']=$data['order_'.$val2['id']];
                $total_price+=$data['order_'.$val2['id']]*$val2['price'];
                $total_count+=$val2['count'];
                $total_weight+=$data['order_'.$val2['id']]*$val2['weight'];
              }else{
                $val2['count']='';
              }
              array_push($tmp_book2,$val2);
            }
          }
          $books[$key]=$tmp_book2;
        }

/*
        if($data["send_type"]==0){
          $trans_price=$this->_get_trans_price($data['user_status'],$total_weight);
        }elseif($data["send_type"]==1){
          $trans_price=$this->_get_trans_price($data['suser_status'],$total_weight);
        }
*/

        $data['total_price']=$total_price;
        $data['total_count']=$total_count;
        $data['trans_price']=$trans_price;
//        $data['allprice']=$total_price+$trans_price;
        $data['allprice']=$trans_price;
        $data['total_weight']=$total_weight;

        if($data['address_type'] && $data['select_address_type']){
          $address_type=$pub_address_type[$data['address_type']];
          $data['zipcode1']  =$address_type['zip1'];
          $data['zipcode2']  =$address_type['zip2'];
          $data['prefecture']=$address_type['pref'];
          $data['address']   =$address_type['address'];
          $data['company']   =$address_type['company'];
          $data['section']   =$address_type['section'];
          $data['name1']     ='';
          $data['name2']     ='';
          $data['kana1']     ='';
          $data['kana2']     ='';
          $data['email']     ='';
          $data['email2']    ='';
          $data['tel1']      =$address_type['tel1'];
          $data['tel2']      =$address_type['tel2'];
          $data['tel3']      =$address_type['tel3'];

        }

        if($data['saddress_type'] && $data['select_saddress_type']){
          $address_type=$pub_address_type[$data['saddress_type']];
          $data['szipcode1']  =$address_type['zip1'];
          $data['szipcode2']  =$address_type['zip2'];
          $data['sprefecture']=$address_type['pref'];
          $data['saddress']   =$address_type['address'];
          $data['scompany']   =$address_type['company'];
          $data['ssection']   =$address_type['section'];
          $data['sname1']     ='';
          $data['sname2']     ='';
          $data['skana1']     ='';
          $data['skana2']     ='';
          $data['semail']     ='';
          $data['semail2']    ='';
          $data['stel1']      =$address_type['tel1'];
          $data['stel2']      =$address_type['tel2'];
          $data['stel3']      =$address_type['tel3'];

        }

        $user->setAttribute("data",$data);

        return 'input2';

      case "rewrite":
        $request->setAttribute("token",$user->getAttribute("token_ref"));
        return 'input2';

      case "preview":
        $request->setAttribute("token",$user->getAttribute("token_ref"));

        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_other($key,1);
          $tmp_book2=array();
          if($tmp_book){
            foreach($tmp_book as $key2=>$val2){
              $val2['count']=(isset($data['order_'.$val2['id']]))? 
                $data['order_'.$val2['id']] : '';
              array_push($tmp_book2,$val2);
            }
          }
          $books[$key]=$tmp_book2;
        }
        
        $request->setAttribute("books",$books);
        
        $data['address_type_name']=@$pub_address_type[$data['address_type']]['name'];
        $data['saddress_type_name']=@$pub_address_type[$data['saddress_type']]['name'];
        
        $user->setAttribute("data",$data);

        return VIEW_ALERT;

      case "submit":
      
        $data["ip"]=$_SERVER["REMOTE_ADDR"];
      
        $pub_manager = new PubManager($DB);
        $data['order_type']=4;//????????
        $data['user_status']=(@$data['address_type']==1)? 1 : 2;
        $data['suser_status']=(@$data['saddress_type']==1)? 1 : 2;
        $order_id=$pub_manager->add_pub_order($data);
        
        $recept_id=$pub_manager->get_recept_id($order_id);

        $data['recept_id']=$recept_id;
        
        if(@$data['send_type']<>'1'){
          $data['szipcode1']  ='';
          $data['szipcode2']  ='';
          $data['sprefecture']='';
          $data['saddress']   ='';
          $data['scompany']   ='';
          $data['ssection']   ='';
          $data['sname1']     ='';
          $data['sname2']     ='';
          $data['skana1']     ='';
          $data['skana2']     ='';
          $data['semail']     ='';
          $data['semail2']    ='';
          $data['stel1']      ='';
          $data['stel2']      ='';
          $data['stel3']      ='';
        }
        
        
        $order_book_ids=array();
        
        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_other($key,1);
          $tmp_book2=array();
          if($tmp_book){
            foreach($tmp_book as $key2=>$val2){
              if(isset($data['order_'.$val2['id']])){
                $val2['count']=$data['order_'.$val2['id']];
                if($val2['count']>0){
                  $pub_manager->add_pub_order_item(
                    $order_id,
                    $val2['id'],
                    $val2['name'],
                    $val2['price'],
                    $val2['count'],
                    $data['order_type']
                  );
                  array_push($order_book_ids,$val2['id']);
                }
              }else{
                $val2['count']='';
              }
              array_push($tmp_book2,$val2);
            }
          }
          $books[$key]=$tmp_book2;
        }
        
        $request->setAttribute("books",$books);
        
        // ?᡼??????

        // for user
        $user_renderer=new CustomSmartyRenderer($controller, $request, $user);
        $user_renderer->setAttribute('recept_id', $recept_id);
        $user_renderer->setAttribute("prefs",$prefs);
        $user_renderer->setAttribute("data",$data);
        $user_renderer->setAttribute("books",$books);
    
        $user_renderer->setTemplate('mail/pub_usermail.txt');
        $user_renderer->setMode(RENDER_VAR);
        $user_body=$user_renderer->fetchResult($controller, $request, $user);
        $user_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$user_body);

        mail(
          $data["email"],
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($toriyose_user_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($user_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "Reply-To: ".$mail_from."\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );

        // for admin
        $admin_renderer=new CustomSmartyRenderer($controller, $request, $user);
        $admin_renderer->setAttribute('recept_id', $recept_id);
        $admin_renderer->setAttribute("prefs",$prefs);
        $admin_renderer->setAttribute("data",$data);
        $admin_renderer->setAttribute("books",$books);
//        $admin_renderer->setAttribute("branch_name",$branch_name[$branch_id]);

        $admin_renderer->setTemplate('mail/pub_adminmail.txt');
        $admin_renderer->setMode(RENDER_VAR);
        $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
        $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

        mail(
          $admin_mail,
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($toriyose_admin_mail_subject.$recept_id,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );

/*
        mail(
          $mbs_mail,
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($admin_mail_subject.'??ȯ????????',"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );
*/
        $request->setAttribute("data",$data);

//
        //??????
        if($order_book_ids){
          foreach($order_book_ids as $val){
            $publication=$pub_manager->get_pubmaster_one($val);
            $pub_total=$pub_manager->get_pub_amount($val);
            if($publication['border'] > $pub_total){
              $border_renderer=new CustomSmartyRenderer($controller, $request, $user);
              $border_renderer->setAttribute("book_name",$publication['name']);
              $border_renderer->setAttribute("book_id",sprintf("%05d",$publication['id']));
              $border_renderer->setAttribute("amount",$pub_total);

              $border_renderer->setTemplate('mail/underbordermail.txt');
              $border_renderer->setMode(RENDER_VAR);
              $border_body=$border_renderer->fetchResult($controller, $request, $user);
              $border_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$border_body);
              mail(
                $admin_mail,
                "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding('????????????',"ISO-2022-JP","EUC-JP"))."?=",
                mb_convert_encoding($border_body,"ISO-2022-JP","EUC-JP"),
                "Content-Transfer-Encoding: 7bit\n".
                "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
                "From: ".$mail_from,
                "-f $mail_from"
              );
            }
          }
        }
// 

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
    
    $pub_manager=new PubManager($DB);

    $data = $user->getAttribute("data");
    if(
      $request->getParameter("mode")=='form2' || 
      $request->getParameter("mode")=='form3'
    ){
      $data_in_session = $data;
      $data_in_session['toscroll']='';
      $data=array_merge($data_in_session,$request->getParameters());

      $orders=0;
      $not_num=0;
      $over_order=0;
      $paramnames=$request->getParameterNames();
      $no_rest_msg='';
      foreach($paramnames as $val){
        if(preg_match("/^order_\d+$/",$val)){
          $orders+=$request->getParameter($val);
          $tmp=explode('_',$val);
          if(
            $request->getParameter($val)                        &&
            !preg_match("/^\d+$/",$request->getParameter($val))
          ){
            $not_num=1;
          }
          if(
            $pub_manager->get_item_price($tmp[1])==0 &&
            $request->getParameter($val)             &&
            $request->getParameter($val) > 99
          ){
            if($pub_manager->get_pub_id($tmp[1])<>'10001-01'){//10001-01?ΤȤ??Ͻ???
              $over_order=1;
            }
          }
          $pub_total=$pub_manager->get_pub_amount($tmp[1]);
          //?߸˥ޥ??ʥ?
          if($request->getParameter($val)>$pub_total){
            $pubmaster=$pub_manager->get_pubmaster_one($tmp[1]);
            $no_rest_msg.='??'.$pubmaster['name'].'??';
//            if($pub_manager->get_pub_id($tmp[1])<>'10001-01'){//10001-01?ΤȤ??Ͻ???
//              $no_rest_msg.='??'.$pubmaster['name'].'??';
//            }
          }
        }
      }
      if($data){
        foreach($data as $key=>$val){
          if(preg_match("/^order_\d+$/",$key)){
            $orders+=$data[$key];
          }
        }
      }
      if($orders<1){
        $validatorManager->setRequired(
          "invalid_order_count", 
          true, 
          "?????????ʾ????????򤪴ꤤ???ޤ???"
        );
      }
      if($not_num){
        $validatorManager->setRequired(
          "invalid_order_num", 
          true, 
          "??????????????Ⱦ?ѿ????????Ϥ??Ʋ???????"
        );
      }
/*
      if($over_order){
        $validatorManager->setRequired(
          "invalid_over_order", 
          true, 
          "̵???δ???ʪ??99???ޤǤȤ??Ʋ???????"
        );
      }
*/
/*
      if($over_order){
        $validatorManager->setRequired(
          "invalid_over_order", 
          true, 
          "?????̡??????????߲??̤Υȥåפ?ɽ???????Ƥ?????ȯ???˴ؤ??뤪?䤤???碌???פ˾Ȳ񤷤Ƥ?????????"
        );
      }
*/
      if($no_rest_msg){
        $validatorManager->setRequired(
          "invalid_over_order", 
          true, 
          "?߸ˤ??????????????????Ϥ????????????ᡢ?б??Ǥ??ޤ??󡣿????????????ޤ??󤬡???ʸ????????Ĵ????????????????̳????????ȯ?????饰?롼?פޤǤ??䤤???碌????????????".$no_rest_msg."??"
        );
      }
      if(@$data['user_status']<>1 && @$data['user_status']<>2){
        $data['user_status']=0;
      }
      

      $user->setAttribute("data",$data);
    }

    if($request->getParameter("mode")=="preview"){
      $data_in_session=$user->getAttribute("data");
      $data=array_merge($data_in_session,$request->getParameters());
    }

    if($request->getParameter("mode")=="preview"){

      $user->setAttribute("data",$data);
      
      $validatorManager->setRequired(
        "zipcode1", 
        true,
        "͹???ֹ??ʾ壳???ˤ????Ϥ??Ƥ?????????"
      );
      $validatorManager->setRequired(
        "zipcode2", 
        true,
        "͹???ֹ??ʲ??????ˤ????Ϥ??Ƥ?????????"
      );
      if($data["zipcode1"] && !preg_match("/^\d+$/",$data["zipcode1"])){
        $validatorManager->setRequired(
          "invalid_zip1", 
          true,
          "͹???ֹ??ʾ壳???ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      if($data["zipcode2"] && !preg_match("/^\d+$/",$data["zipcode2"])){
        $validatorManager->setRequired(
          "invalid_zip2", 
          true,
          "͹???ֹ??ʲ??????ˤ??????????Ϥ??Ƥ?????????"
        );
      }

      $validatorManager->setRequired(
        "prefecture", 
        true, 
        "??ƻ?ܸ??????򤷤Ƥ?????????"
      );
      if($data["prefecture"] && ($data["prefecture"]<1 || $data["prefecture"]>47)){
        $validatorManager->setRequired(
          "invalid_pref", 
          true, 
          "??ƻ?ܸ????????????򤷤Ƥ?????????"
        );
      }

      $validatorManager->setRequired(
        "address", 
        true, 
        "?Զ?Į¼?ʲ??????Ϥ??Ƥ?????????"
      );
      
      $validatorManager->setRequired(
        "address_type", 
        true,
        "°???????򤷤Ƥ?????????"
      );
      if($data['address_type']<>1){
        $validatorManager->setRequired(
          "company", 
          true,
          "ˡ?͡?????̾?????Ϥ??Ƥ?????????"
        );
      }

      $validatorManager->setRequired(
        "name1", 
        true,
        "??̾???????ˤ????Ϥ??Ƥ?????????"
      );

      $validatorManager->setRequired(
        "name2", 
        true,
        "??̾????̾?ˤ????Ϥ??Ƥ?????????"
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

      $validatorManager->setRequired(
        "email", 
        true,
        "?᡼?륢?ɥ쥹?????Ϥ??Ƥ?????????"
      );
      $validator = new EmailValidator();
      $params = array('email_error' => '?᡼?륢?ɥ쥹???????????Ϥ??Ƥ?????????');
      $validator->initialize($params);
      $validatorManager->register('email', $validator);

      $validatorManager->setRequired(
        "email2", 
        true,
        "?᡼?륢?ɥ쥹?ʳ?ǧ?ˤ????Ϥ??Ƥ?????????"
      );
      
      if($data["email"] && $data["email2"] && $data["email"]<>$data["email2"]){
        $validatorManager->setRequired(
          "invalid_email", 
          true,
          "?᡼?륢?ɥ쥹?ʳ?ǧ?ˤ??????????Ϥ??Ƥ?????????"
        );
      }
      
      if($data['send_type']==1){

        $validatorManager->setRequired(
          "szipcode1", 
          true,
          "͹???ֹ??ʾ壳???ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );
        $validatorManager->setRequired(
          "szipcode2", 
          true,
          "͹???ֹ??ʲ??????ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );
        if($data["szipcode1"] && !preg_match("/^\d+$/",$data["szipcode1"])){
          $validatorManager->setRequired(
            "invalid_zip1", 
            true,
            "͹???ֹ??ʾ壳???ˤ??????????Ϥ??Ƥ??????????ʻ???????????"
          );
        }
        if($data["szipcode2"] && !preg_match("/^\d+$/",$data["szipcode2"])){
          $validatorManager->setRequired(
            "invalid_zip2", 
            true,
            "͹???ֹ??ʲ??????ˤ??????????Ϥ??Ƥ??????????ʻ???????????"
          );
        }

        $validatorManager->setRequired(
          "sprefecture", 
          true, 
          "??ƻ?ܸ??????򤷤Ƥ??????????ʻ???????????"
        );
        if($data["sprefecture"] && ($data["sprefecture"]<1 || $data["sprefecture"]>47)){
          $validatorManager->setRequired(
            "invalid_pref", 
            true, 
            "??ƻ?ܸ????????????򤷤Ƥ??????????ʻ???????????"
          );
        }

        $validatorManager->setRequired(
          "saddress", 
          true, 
          "?Զ?Į¼?ʲ??????Ϥ??Ƥ??????????ʻ???????????"
        );
        
        $validatorManager->setRequired(
          "saddress_type", 
          true,
          "°???????򤷤Ƥ??????????ʻ???????????"
        );
        if($data['saddress_type']<>1){
          $validatorManager->setRequired(
            "scompany", 
            true,
            "ˡ?͡?????̾?????Ϥ??Ƥ??????????ʻ???????????"
          );
        }

        $validatorManager->setRequired(
          "sname1", 
          true,
          "??̾???????ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );

        $validatorManager->setRequired(
          "sname2", 
          true,
          "??̾????̾?ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );

        $validatorManager->setRequired(
          "stel1", 
          true,
          "?????ֹ??ʻԳ????֡ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );
        $validatorManager->setRequired(
          "stel2", 
          true,
          "?????ֹ??ʻ??????֡ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );
        $validatorManager->setRequired(
          "stel3", 
          true,
          "?????ֹ??ʲ??????ֹ??ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );
        if($data["stel1"] && !preg_match("/^\d+$/",$data["stel1"])){
          $validatorManager->setRequired(
            "invalid_tel1", 
            true,
            "?????ֹ??ʻԳ????֡ˤ??????????Ϥ??Ƥ??????????ʻ???????????"
          );
        }
        if($data["stel2"] && !preg_match("/^\d+$/",$data["stel2"])){
          $validatorManager->setRequired(
            "invalid_tel2", 
            true,
            "?????ֹ??ʻ??????֡ˤ??????????Ϥ??Ƥ??????????ʻ???????????"
          );
        }
        if($data["stel3"] && !preg_match("/^\d+$/",$data["stel3"])){
          $validatorManager->setRequired(
            "invalid_tel3", 
            true,
            "?????ֹ??ʲ??????ֹ??ˤ??????????Ϥ??Ƥ??????????ʻ???????????"
          );
        }

/*
        $validatorManager->setRequired(
          "semail", 
          true,
          "?᡼?륢?ɥ쥹?????Ϥ??Ƥ??????????ʻ???????????"
        );
        $validator = new EmailValidator();
        $params = array('email_error' => '?᡼?륢?ɥ쥹???????????Ϥ??Ƥ??????????ʻ???????????');
        $validator->initialize($params);
        $validatorManager->register('semail', $validator);

        $validatorManager->setRequired(
          "semail2", 
          true,
          "?᡼?륢?ɥ쥹?ʳ?ǧ?ˤ????Ϥ??Ƥ??????????ʻ???????????"
        );
        
        if($data["semail"] && $data["semail2"] && $data["semail"]<>$data["semail2"]){
          $validatorManager->setRequired(
            "invalid_email", 
            true,
            "?᡼?륢?ɥ쥹?ʳ?ǧ?ˤ??????????Ϥ??Ƥ??????????ʻ???????????"
          );
        }
*/
        

      }

      if($data['req_year'] || $data['req_month'] || $data['req_day']){
        if(!checkdate($data['req_month']*1,$data['req_day']*1,$data['req_year']*1)){
          $validatorManager->setRequired(
            "invalid_req_date", 
            true,
            "??????˾?????????????Ϥ??Ƥ?????????"
          );
        }
        if(
          mktime(0,0,0,$data['req_month'],$data['req_day'],$data['req_year'])
          -mktime(0,0,0,date('m'),date('d')+1,date('Y')) 
          < 2*24*60*60
        ){
          $validatorManager->setRequired(
            "invalid_req_date", 
            true,
            "??????˾???ϡ??ʤ????????ʹߤȤ??Ƥ?????????"
          );
        }
      }

    }else{

      $validatorManager->setRequired(
        "mode", 
        true, 
        "mode"
      );
    }

  }

  function handleError (&$controller, &$request, &$user){
    if(
      $request->getParameter('mode')=='form2' || 
      $request->getParameter('mode')=='form3'
    ){
      $request->setParameter('mode','form');
      return $this->execute($controller,$request,$user);
    }
    if($request->getParameter('mode')=='preview'){
      $request->setParameter('mode','form2');
      return $this->execute($controller,$request,$user);
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
  
  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpoform');
  }

}

?>
