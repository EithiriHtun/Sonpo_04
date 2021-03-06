<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');
require_once(LIB_DIR.'DocManager.php');
require_once(LIB_DIR.'PubManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class InstRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
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

        $total_amount_p=$book_mgr->get_pub_count($val2['id']);
        $total_amount_m=$book_mgr->get_pub_out_count($val2['id'])+
                        $book_mgr->get_pub_out_count_adj($val2['id']);
        $total_amount=$total_amount_p-$total_amount_m;
        if($total_amount<=0){
          $val2['warn_stock'] = 2;
        }elseif($total_amount<=$val2['border']){
          $val2['warn_stock'] = 1;
        }else{
          $val2['warn_stock'] = 0;
        }

        array_push($books2,$val2);
      }
    }
    $request->setAttribute("books",$books2);
    
    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Instructor/config/config.php");
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");
    
    $article_manager=new InstructorManager($DB);
    $book_mgr= new PubManager($DB);
      
    switch ($request->getParameter("mode")){
    
      case "preview":
      
        if($data["status"]==2){

          $doc_mgr= new DocManager($DB);
          $request->setAttribute("doclist",$doc_mgr->get_all());

          $books=$book_mgr->get_pubmaster_inst();
          $books2=array();
          if($books){
            foreach($books as $key2=>$val2){
              $val2['count']=(isset($data['order_'.$val2['id']]))? 
                $data['order_'.$val2['id']] : '';
              array_push($books2,$val2);
            }
          }
          $request->setAttribute("books",$books2);
          
          return VIEW_ALERT;

        }else{

          if($id){
            $article_manager->update($data,$id);
          }
          
          $doc_mgr= new DocManager($DB);
          $request->setAttribute("doclist",$doc_mgr->get_all());
          
          $books=$book_mgr->get_pubmaster_inst();
          $books2=array();
          $book_mgr->del_pub_order_item_temp($id);
          if($books){
            foreach($books as $key2=>$val2){
              $val2['count']=(isset($data['order_'.$val2['id']]))? 
                $data['order_'.$val2['id']] : '';
              array_push($books2,$val2);
              if($val2['count']){
                $book_mgr->add_pub_order_item_temp(
                  $id,
                  $val2['id'],
                  $val2['name'],
                  $val2['price'],
                  $val2['count'],
                  ''
                );
              }
            }
          }
          $request->setAttribute("books",$books2);

          $request->setAttribute("popmsg","??????????????????????");

//          return VIEW_INPUT;
          $controller->redirect(SCRIPT_PATH.'/module/FormManage/action/InstList?y='.urlencode($request->getParameter("y")).'&br='.urlencode($request->getParameter("br")).'&st='.urlencode($request->getParameter("st")).'&ts='.urlencode($request->getParameter("ts")));
          return VIEW_NONE;
        
        }

      case "submit":

        if($id){
          $article_manager->update($data,$id);
        }
        
        //????????????????
        $order_data['inst_id']=$data['id'];

        $order_data['inst_host']  =$data['host'];

        $order_data['name1']      =$data['person_last'];
        $order_data['name2']      =$data['person_first'];
        $order_data['kana1']      =$data['person_kana_last'];
        $order_data['kana2']      =$data['person_kana_first'];
        $order_data['user_status']=2;
        $order_data['zipcode1']   =$data['post1'];
        $order_data['zipcode2']   =$data['post2'];
        $order_data['prefecture'] =$data['prefecture'];
        $order_data['address']    =$data['address'];
        $order_data['tel1']       =$data['tel1'];
        $order_data['tel2']       =$data['tel2'];
        $order_data['tel3']       =$data['tel3'];
        $order_data['email']      =$data['email1'];
        $order_data['company']    =$data['host'];
        $order_data['section']    ='';

        $order_data['order_type']=3;

        $books=$book_mgr->get_pubmaster_inst();
        $total_count=0;
        $total_weight=0;
        $trans_price=0;
        if($books){
          foreach($books as $key2=>$val2){
            $val2['count']=(isset($data['order_'.$val2['id']]))? 
              $data['order_'.$val2['id']] : '';
            $total_count+=$val2['count'];
            $total_weight+=$data['order_'.$val2['id']]*$val2['weight'];
          }
        }
//        $trans_price=$this->_get_trans_price(2,$total_weight);

        $order_data['trans_price']=$trans_price;

        $order_data['send_type']=1;

        $order_data['sname1']      =$data['t_tantou'];
        $order_data['sname2']      ='';
        $order_data['skana1']      ='';
        $order_data['skana2']      ='';
        $order_data['suser_status']=2;
        $order_data['szipcode1']   =$data['szip1'];
        $order_data['szipcode2']   =$data['szip2'];
        $order_data['sprefecture'] =$data['spref'];
        $order_data['saddress']    =$data['saddress'];
        $order_data['stel1']       =$data['stel1'];
        $order_data['stel2']       =$data['stel2'];
        $order_data['stel3']       =$data['stel3'];
        $order_data['scompany']    =$data['sname'];
        $order_data['ssection']    ='';
        $order_data['semail']      ='';

        $order_data['inst_shiryou_other']=$data['shiryou_other'];
        $order_data['inst_stekiyou']     =$data['stekiyou'];

        $order_data['req_year'] =$data['syear'];
        $order_data['req_month']=$data['smonth'];
        $order_data['req_day']  =$data['sday'];

        if($data['sregist']==1 && ($total_count || $data['shiryou_other'])){
          $order_id=$book_mgr->add_pub_order($order_data);
          $book_mgr->update_old_order_to_hidden($order_id,$data['id']);
        
          $recept_id=$book_mgr->get_recept_id($order_id);
        }else{
          $book_mgr->update_old_order_to_hidden_wo_id($data['id']);
        }

        $books=$book_mgr->get_pubmaster_inst();
        $books2=array();
        $book_mgr->del_pub_order_item_temp($id);
        if($books){
          foreach($books as $key2=>$val2){
            $val2['count']=(isset($data['order_'.$val2['id']]))? 
              $data['order_'.$val2['id']] : '';
            array_push($books2,$val2);
            if($val2['count']){
              if($data['sregist']==1 && $total_count){
                $book_mgr->add_pub_order_item(
                  $order_id,
                  $val2['id'],
                  $val2['name'],
                  $val2['price'],
                  $val2['count'],
                  3
                );
              }
              $book_mgr->add_pub_order_item_temp(
                $id,
                $val2['id'],
                $val2['name'],
                $val2['price'],
                $val2['count'],
                3
              );
            }
          }
        }
        $request->setAttribute("books",$books2);
        
        $doc_mgr= new DocManager($DB);

        if($data['stantou']==1){
          // ??????????
          // ??????????????
          $admin_renderer= new CustomSmartyRenderer($controller, $request, $user);
          $admin_renderer->setAttribute('inst_id', @$inst_id);
          $admin_renderer->setAttribute("prefs",@$prefs);
          $admin_renderer->setAttribute("theme",@$theme);
          $admin_renderer->setAttribute("data",@$data);
          $admin_renderer->setAttribute("branch_name",@$branch_name[$branch_id]);

          $admin_renderer->setTemplate('mail/stantoumail.txt');
          $admin_renderer->setMode(RENDER_VAR);
          $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
          $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

          mail(
            $admin_mail,
            "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($stantou_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
            mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
            "Content-Transfer-Encoding: 7bit\n".
            "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
            "From: ".$mail_from,
            "-f $mail_from"
          );
        }

        if($data['sregist']==1 && $total_count){
          // ??????????
          // ????????????

          // for admin
          $admin_renderer= new CustomSmartyRenderer($controller, $request, $user);
          $admin_renderer->setAttribute('recept_id', @$recept_id);
          $admin_renderer->setAttribute('inst_id', @$data['inst_id']);
          $admin_renderer->setAttribute("books",@$books2);
//        $admin_renderer->setAttribute("branch_name",$branch_name[$branch_id]);

          $admin_renderer->setTemplate('mail/pub_inst_adminmail.txt');
          $admin_renderer->setMode(RENDER_VAR);
          $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
          $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

          mail(
            $admin_mail,
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($admin_mail_subject.$recept_id,"ISO-2022-JP","EUC-JP"))."?=",
            mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
            "Content-Transfer-Encoding: 7bit\n".
            "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
            "From: ".$mail_from,
            "-f $mail_from"
          );

        }

        $request->setAttribute("popmsg","??????????????????????");

        $request->setAttribute("doclist",$doc_mgr->get_all());

//        return VIEW_INPUT;
        $controller->redirect(SCRIPT_PATH.'/module/FormManage/action/InstList?y='.urlencode($request->getParameter("y")).'&br='.urlencode($request->getParameter("br")).'&st='.urlencode($request->getParameter("st")).'&ts='.urlencode($request->getParameter("ts")));
        return VIEW_NONE;
      
      case "rewrite":

        $doc_mgr= new DocManager($DB);
        $request->setAttribute("doclist",$doc_mgr->get_all());

        $book_mgr= new PubManager($DB);
        $books=$book_mgr->get_pubmaster_inst();
        $books2=array();
        if($books){
          foreach($books as $key2=>$val2){
            $val2['count']=(isset($data['order_'.$val2['id']]))? 
              $data['order_'.$val2['id']] : '';
            array_push($books2,$val2);
          }
        }
        $request->setAttribute("books",$books2);
          
        return VIEW_INPUT;
      
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
    
    $pub_manager= new PubManager($DB);

    
    if($request->getParameter("mode")=="preview"){
      $data=$request->getParameters();
      $data["sdocs"]=@$_POST["sdoc"];

      $data_in_session=$user->getAttribute("data");
      $user->setAttribute(
        "data",
        array_merge($data_in_session,$data)
      );
    }else{
      $data=$user->getAttribute("data");
    }

    if($request->getParameter("mode")=="preview"){
      if(!checkdate($data["month_3"]*1,$data["day_3"]*1,$data["year_3"]*1)){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "????????????????????????????"
        );
      }elseif(
        mktime(0,0,0,$data["month_3"],$data["day_3"],$data["year_3"]) - 
        time() > 0 &&
        $data["status"]==3
      ){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "??????????????????????????????????"
        );
      }



      $not_num=0;
      $over_order=0;
      $orders=0;
      $paramnames=$request->getParameterNames();
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
            $over_order=1;
          }
        }
      }
      if($not_num){
        $validatorManager->setRequired(
          "invalid_order_num", 
          true, 
          "????????????????????????????????????????"
        );
      }
      
/*
      if($data['sregist'] && (!$orders && !$data["sdocs"])){
        $validatorManager->setRequired(
          "invalid_sorder", 
          true, 
          "??????????????????????????????????????????????"
        );
      }
*/
      
/*
      if($over_order){
        $validatorManager->setRequired(
          "invalid_over_order", 
          true, 
          "??????????????99????????????????????"
        );
      }
*/

      if($data["shiryou_other"] && !$data["stantou"]){
        $validatorManager->setRequired(
          "invalid_stantou", 
          true, 
          "??????????????????????????????????????????????"
        );
      }
      if($data["sregist"]==1){
/*
        $validatorManager->setRequired(
          "shiryou_num", 
          true, 
          "??????????????????????????????????"
        );
*/
        if(!checkdate(@$data["smonth"]*1,@$data["sday"]*1,@$data["syear"]*1)){
          $validatorManager->setRequired(
            "invalid_sdate", 
            true, 
            "??????????????????????????????????"
          );
        }
      }
      
      if($data["syear"]){
        if(!checkdate($data["smonth"]*1,$data["sday"]*1,$data["syear"]*1)){
          $validatorManager->setRequired(
            "invalid_sdate", 
            true, 
            "??????????????????????????????????"
          );
        }elseif(
          mktime(0,0,0,$data["smonth"],$data["sday"],$data["syear"])-
          mktime(0,0,0,$data["month_3"],$data["day_3"],$data["year_3"]) >0
        ){
          $validatorManager->setRequired(
            "invalid_sdate", 
            true, 
            "??????????????????????????????????"
          );
        }
      }
      
      if($data["status"]==3){
        if(
          $user->getAttribute('prestatus')<>3 && 
          $user->getAttribute('prestatus')<>2
        ){
          $validatorManager->setRequired(
            "invalid_setstatus", 
            true, 
            "????????????????????????????????????????????????????????????"
          );
        }
      }
    }

/*
    if($data["mode"]=="preview"){
    
      $data_in_session=$user->getAttribute("data");
      //????????????????????????
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
        "????????????????????????????????????????"
      );

      if(!checkdate($data["open_month"],$data["open_day"],$data["open_year"])){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "????????????????????????????"
        );
      }

      if($data["open_hour"]<0 || $data["open_hour"]>23){
        $validatorManager->setRequired(
          "invalid_hour", 
          true, 
          "????????????????????????????"
        );
      }
*/

/*
      $validatorManager->setRequired(
        "date_live", 
        true, 
        "????????????????????????????????????"
      );
      $validatorManager->setRequired(
        "date_show", 
        true, 
        "??????????????????????????????????????????"
      );
      $live_manager= new LiveManager($DB);
      $dates=$live_manager->getDateArray($data["date_show"]);
      if(!count($dates)){
        $validatorManager->setRequired(
          "invalid_date_show", 
          true, 
          "????????????????????????????????????????????????"
        );
      }
*/

//    }

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
