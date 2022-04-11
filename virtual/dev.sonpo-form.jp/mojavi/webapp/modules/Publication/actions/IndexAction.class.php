<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');
require_once(LIB_DIR.'PubOpenManager.php');
require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');
require_once(VALIDATOR_DIR.'EmailValidator.class.php');
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){

    // check ssl
    if(!isset($_SERVER['HTTPS'])){
      $controller->redirect('/');
      return VIEW_NONE;
    }


    $user->setAttribute("data",'');
    $request->setAttribute("operation","initial");
    
    // token���äƥ��å�
    $token=md5(date("YmdHis").rand(1,999));
    $request->setAttribute("token",$token);
    $user->setAttribute("token_ref",$token);
      
    $DB=$request->getAttribute('db');
    $pub_open_manager=new PubOpenManager($DB);
    
    $pub_open_data = $pub_open_manager->get_one(1);
    
    $request->setAttribute("pub_open_data",$pub_open_data);

    return 'annai';

  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../FormManage/config/config.php");
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
    

//foreach($data as $key=>$val){
//  echo $key.':'.$val."<br>";
//}

    $videoData=$this->videoData($controller);
    
    $pub_manager=new PubManager($DB);

    switch ($request->getParameter("mode")){
    
      case "form":
        $request->setAttribute("token",$user->getAttribute("token_ref"));
        $total_weight=0;
        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_online($key,1);
          $tmp_book2=array();
          if($tmp_book){
            foreach($tmp_book as $key2=>$val2){
//              if($val2['stock']>0 || $val2['show_if_zero']==1){
                if(isset($data['order_'.$val2['id']])){
                  $val2['count']=$data['order_'.$val2['id']];
                  $total_weight+=$data['order_'.$val2['id']]*$val2['weight'];
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
        
//        if(!$data['user_status']){
//          $data['user_status']=1;
//        }

        $total_price=0;
        $total_count=0;
        $total_weight=0;
        $trans_price=0;
        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_online($key,1);
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

        $trans_price=$this->_get_trans_price($data['user_status'],$total_weight);

        $data['total_price']=$total_price;
        $data['total_count']=$total_count;
        $data['trans_price']=$trans_price;
        $data['allprice']=$total_price+$trans_price;
        $data['total_weight']=$total_weight;
        $user->setAttribute("data",$data);

        return 'input2';

      case "rewrite":
        $request->setAttribute("token",$user->getAttribute("token_ref"));
        return 'input2';

      case "preview":
        $request->setAttribute("token",$user->getAttribute("token_ref"));

        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_online($key,1);
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
        
        return VIEW_ALERT;

      case "submit":
      
        $data["ip"]=$_SERVER["REMOTE_ADDR"];
      
        $pub_manager=new PubManager($DB);
        $data['order_type']=$data['user_status'];//����饤�󿽹�
        $order_id=$pub_manager->add_pub_order($data);
        
        $recept_id=$pub_manager->get_recept_id($order_id);

        $data['recept_id']=$recept_id;
        
        $order_book_ids=array();
        
        foreach($pub_category as $key=>$val){
          $tmp_book=$pub_manager->get_books_by_category_online($key,1);
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
        
        // �᡼������

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
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($user_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
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

        $admin_renderer->setTemplate('mail/adminmail.txt');
        $admin_renderer->setMode(RENDER_VAR);
        $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
        $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

/*
        mail(
          $admin_mail,
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
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($admin_mail_subject.$recept_id,"ISO-2022-JP","EUC-JP"))."?=",
          mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
          "Content-Transfer-Encoding: 7bit\n".
          "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
          "From: ".$mail_from,
          "-f $mail_from"
        );

        $request->setAttribute("data",$data);

        //������
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
                "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding('�����������',"ISO-2022-JP","EUC-JP"))."?=",
                mb_convert_encoding($border_body,"ISO-2022-JP","EUC-JP"),
                "Content-Transfer-Encoding: 7bit\n".
                "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
                "From: ".$mail_from,
                "-f $mail_from"
              );
            }
          }
        }

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

    if($request->getParameter("mode")=='form2'){
//      $data_in_session=$user->getAttribute("data");
      $data_in_session=(@$user->getAttribute("data"))? $user->getAttribute("data") : array();
      $data=array_merge($data_in_session,$request->getParameters());

      $orders=0;
      $not_num=0;
      $over_order=0;
      $paramnames=$request->getParameterNames();
      $no_rest_msg='';
      foreach($paramnames as $val){
        if(preg_match("/^order_\d+$/",$val)){
          $orders+=($request->getParameter($val))*1;
          $tmp=explode('_',$val);
          if(
            $request->getParameter($val)                        &&
            !preg_match("/^\d+$/",$request->getParameter($val))
          ){
            $not_num=1;
          }
          $pubmaster=$pub_manager->get_pubmaster_one($tmp[1]);
          $entry_limit = 4;
          if($pubmaster['entry_limit']){
            $entry_limit = $pubmaster['entry_limit'];
          }

          if(
            $pub_manager->get_item_price($tmp[1])==0    &&//���ʤ�̵��
            $request->getParameter($val)                &&
            $request->getParameter($val) > $entry_limit
          ){
            $over_order=1;
            //�����Τ���ˤϡ�10000�Ȥ��礭�ʿ�����ֿ�����ǽ�����פ����Ϥ��Ƥ�������
          }

/*
          if(
            $pub_manager->get_item_price($tmp[1])==0 &&//���ʤ�̵��
            $request->getParameter($val)             &&
//            $request->getParameter($val) > 99
            $request->getParameter($val) > 4 //�����ʾ�
          ){
            if($pub_manager->get_pub_id($tmp[1])<>'10001-01'){//10001-01�ΤȤ��Ͻ���
              $over_order=1;
            }
          }
*/

          $pub_total=$pub_manager->get_pub_amount($tmp[1]);

          //�߸˥ޥ��ʥ�
          if($request->getParameter($val)>$pub_total){
//            $pubmaster=$pub_manager->get_pubmaster_one($tmp[1]);
            $no_rest_msg.='��'.$pubmaster['name'].'��';
//            if($pub_manager->get_pub_id($tmp[1])<>'10001-01'){//10001-01�ΤȤ��Ͻ���
//              $no_rest_msg.='��'.$pubmaster['name'].'��';
//            }
          }
          
        }
      }

      $minus_weight=0;
/*
10001-01�ΤȤ��ν��̸���
      foreach($data as $key=>$val){
        if(preg_match("/^order_\d+$/",$key)){
          $tmp=explode('_',$key);
          if($pub_manager->get_pub_id($tmp[1])=='10001-01'){//10001-01�ΤȤ������������
            if($val){
              $minus_weight = $val * $pub_manager->get_item_weight($tmp[1]) * 1;
            }
          }
        }
      }
*/

      if($data){
        foreach($data as $key=>$val){
          if(preg_match("/^order_\d+$/",$key)){
            $orders+=($data[$key])*1;
          }
        }
      }
      if($orders<1){
        $validatorManager->setRequired(
          "invalid_order_count", 
          true, 
          "��������ʾ������򤪴ꤤ���ޤ���"
        );
      }
      if($not_num){
        $validatorManager->setRequired(
          "invalid_order_num", 
          true, 
          "��������������Ⱦ�ѿ��������Ϥ��Ʋ�������"
        );
      }
      if($over_order){
        $validatorManager->setRequired(
          "invalid_over_order", 
          true, 
          "�����̡����������߲��̤Υȥåפ�ɽ������Ƥ����ȯ���˴ؤ��뤪�䤤��碌��פ˾Ȳ񤷤Ƥ���������"
        );
      }
      if(!$over_order && $no_rest_msg){
        $validatorManager->setRequired(
          "invalid_over_order", 
          true, 
          "�߸ˤ�������������Ϥ������������ᡢ�б��Ǥ��ޤ��󡣡�".$no_rest_msg."�˿������������ޤ��󤬡���ʸ������Ĵ�����������������������߲��̤Υȥåפ�ɽ������Ƥ����ȯ���˴ؤ��뤪�䤤��碌��פˤ����̤���������"
        );
      }
      if(@$data['user_status']<>1 && @$data['user_status']<>2){
        $data['user_status']=0;
      }

      if(@$data['user_status']==1){
//echo 'check weight:'.$data["total_weight"];
        if($data["user_status"]==1 && ($data["total_weight"]-$minus_weight)>=4000){
          $request->setParameter("mode","form2_checkweight");
          $validatorManager->setRequired(
            "invalid_weight", 
            true,
            "�����̡��������߲��̤Υȥåפ�ɽ������Ƥ����ȯ���˴ؤ��뤪�䤤��碌��פˤ����̤���������"
          );
        }
      }

      $user->setAttribute("data",$data);
    }

    if($request->getParameter("mode")=="preview"){
      $data_in_session=$user->getAttribute("data");
      $data=array_merge($data_in_session,$request->getParameters());
    }

    if($request->getParameter("mode")=="preview"){
      $user->setAttribute("data",$data);
      
      $minus_weight=0;
/*
      foreach($data as $key=>$val){
        if(preg_match("/^order_\d+$/",$key)){
          $tmp=explode('_',$key);
          if($pub_manager->get_pub_id($tmp[1])=='10001-01'){//10001-01�ΤȤ������������
            if($val){
              $minus_weight = $val * $pub_manager->get_item_weight($tmp[1]) * 1;
            }
          }
        }
      }
*/

      if($data["user_status"]==1 && ($data["total_weight"]-$minus_weight)>=4000){
        $validatorManager->setRequired(
          "invalid_weight", 
          true,
          "�����̡��������߲��̤Υȥåפ�ɽ������Ƥ����ȯ���˴ؤ��뤪�䤤��碌��פˤ����̤���������"
        );
      }
/*
      if($data["user_status"]==2 && $data["total_weight"]>=25000){
        $validatorManager->setRequired(
          "invalid_weight", 
          true,
          "����ʪ�ι�׽��̤������С����Ƥ��ޤ������������߲��̤Υȥåפ�ɽ������Ƥ����ȯ���˴ؤ��뤪�䤤��碌��פˤ����̤���������"
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
        "user_status", 
        true,
        "�Ŀ͡�ˡ�͡������������򤷤Ƥ���������"
      );
      if($data['user_status']==2){
        $validatorManager->setRequired(
          "company", 
          true,
          "ˡ�͡�����̾�����Ϥ��Ƥ���������"
        );
      }

      $validatorManager->setRequired(
        "name1", 
        true,
        "��̾�������ˤ����Ϥ��Ƥ���������"
      );

      $validatorManager->setRequired(
        "name2", 
        true,
        "��̾����̾�ˤ����Ϥ��Ƥ���������"
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

    }

  }


  function handleError (&$controller, &$request, &$user){
    if($request->getParameter('mode')=='form2'){
      $request->setParameter('mode','form');
      return $this->execute($controller,$request,$user);
    }
    if($request->getParameter('mode')=='form2_checkweight'){
      $request->setParameter('mode','form2');
      return $this->execute($controller,$request,$user);
    }
    if($request->getParameter('mode')=='preview'){
      $request->setParameter('mode','form2');
      return $this->execute($controller,$request,$user);
    }
  }
  
  function _get_trans_price($user_status,$weight){
    if($user_status==2){
/*
�ʲ��ξ�硢�Ҥ�Ȣʬ�νŤ����ۤʤ�
���ե����ȥ֥å�2019  17420
���ۤäȰ¿�������  10500
������ž�ɻߥޥ˥奢��2019ǯ7��ȯ��  20400
���ΤäƤ��ޤ�������ž�֤λ���  14700
���������Τ���μ�ž�ְ�������  12600

ˡ�ͤξ�������η׻���ʣ���Ƿ׻��Ǥ��ʤ����ᡢ
�����ǤϷ׻����ʤ�

      $price=770;
      
      $per_weight = 25000;

      $unit=ceil($weight/$per_weight);
      if($unit){
        return $price*$unit;
      }else{
        return $price;
      }
*/
      return 0;

    }else{
      $weight = $weight + 7;//7g embelope
    
      $price=468;
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
  
  function videoData (&$controller){
    require($controller->getModuleDir()."config/config.php");

    $fp=fopen($videoDataFile,"r");
    $counter=1;
    $jenre=array();
    $name=array();
    $url=array();
    $counter=0;
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
