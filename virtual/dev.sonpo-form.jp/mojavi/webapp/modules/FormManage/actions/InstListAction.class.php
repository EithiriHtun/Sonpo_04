<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');
require_once(LIB_DIR.'PubManager.php');
require_once(LIB_DIR.'FormUserManager.php');

  class InstListAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if($user->getAttribute("is_shipping")==1){
        $controller->redirect(
          '/manage/forms/index.php/module/FormManage'
        );
        return VIEW_NONE;
      }

      $article_manager=new InstructorManager($DB);
      $pub_mgr= new PubManager($DB);

      $years=$article_manager->get_year_list();
      if(date("m")*1<4){
        if(!$years[date("Y")-1]){
          $years[date("Y")-1]=1;
        }
      }else{
        if(!$years[date("Y")]){
          $years[date("Y")]=1;
        }
      }
      krsort($years);

      $year    =$request->getParameter('y');
      if(!$year){
        if($years){
          $year=date('Y');
          if(date("m")*1<4){
            $year=$year-1;
          }
//          foreach(array_reverse($years,TRUE) as $key=>$val){
//            $year=$key;
//          }
        }
      }
      
      if($request->getParameter('st')==''){
        $status='99';
      }elseif($request->getParameter('st')==0){
        $status=0;
      }else{
        $status=$request->getParameter('st');
      }
      $ntaisyou=$request->getParameter('ts');
      $nbranch =(
        $request->getParameter('br') && 
        $request->getParameter('br') <> '99'
      ) ? 
        $request->getParameter('br') 
      : 
        0;
      
      if($user->getAttribute("branch")){
        if($request->getParameter('br')=='99'){
          $nbranch=0;
        }else{
          if(!$nbranch){
            $nbranch=$user->getAttribute("branch");
          }
        }
      }

      $where='';
      if($nbranch){
        $where.='(branch=0 AND (';
        foreach($branch_no as $key=>$val){
          if($nbranch==$val){
            $where.='lecture_prefecture='.$key.' OR ';
          }
        }
        $where.=sprintf("1=2 )) OR branch=%d",$nbranch);
      }
      
      if($where){
        $where .= ' AND ';
      }
      $where .= sprintf(
        "(year_1=%d OR year_1=%d OR year_3=%d OR year_3=%d)",
        $year,
        $year+1,
        $year,
        $year+1
      );

      $data=$article_manager->get_list($where);

      $request->setAttribute('action_memory_usage',memory_get_usage(TRUE));

      $data2=array();

      if($data){
        foreach($data as $val){

          $tmp_flag=1;
          
          if(strtotime($val['date_regist'])<mktime(0,0,0,10,4,2010)){
            $val['is_new']=0;
          }else{
            $val['is_new']=1;
          }

          if(
            isset($val['year_3']) && 
            isset($val['month_3']) && 
            isset($val['day_3']) && 
            $val['year_3']
          ){
            if(
              ($val['year_3']==$year && $val['month_3']>3) ||
              ($val['year_3']==$year+1 && $val['month_3']<4)
            ){
              $val['iyear'] =$val['year_3'];
              $val['imonth']=$val['month_3'];
              $val['iday']  =$val['day_3'];
              $val['iymd']  =sprintf(
                "%04d%02d%02d",
                $val['year_3'],
                $val['month_3'],
                $val['day_3']
              );
            }else{
              $tmp_flag=0;
            }
          }elseif(
            isset($val['year_1']) && 
            isset($val['month_1']) && 
            isset($val['day_1'])
          ){
            if(
              ($val['year_1']==$year && $val['month_1']>3) ||
              ($val['year_1']==$year+1 && $val['month_1']<4)
            ){
              $val['iyear'] =$val['year_1'];
              $val['imonth']=$val['month_1'];
              $val['iday']  =$val['day_1'];
              $val['iymd']  =sprintf(
                "%04d%02d%02d",
                $val['year_1'],
                $val['month_1'],
                $val['day_1']
              );
            }else{
              $tmp_flag=0;
            }
          }else{
            $tmp_flag=0;
          }

          if($status<>'99'){
            if($status==$val['status']){
              $tmp_flag=$tmp_flag*1;
            }else{
              $tmp_flag=$tmp_flag*0;
            }
          }

          if($ntaisyou){
            if(isset($val['taisyou']) && $ntaisyou==$val['taisyou']){
              $tmp_flag=$tmp_flag*1;
            }else{
              $tmp_flag=$tmp_flag*0;
            }
          }

          if($tmp_flag){
            if(isset($val['status']) && $val['status']<>4 && $val['status']<>5){
              @$taisyou_count[$val['taisyou']]++;
            }
            
            $pstatus=$pub_mgr->get_order_status($val['id']);
            if($pstatus){
              $val['trans_status']=$pstatus['trans_status'];
              $val['approve']=$pstatus['approve'];
            }else{
              $val['trans_status']=99;
              $val['approve']=99;
            }

            array_push($data2,$val);
          }

        }
      }

      $request->setAttribute('action_memory_usage2',memory_get_usage(TRUE));

      $data=array();
      
      if($data2){
        foreach($data2 as $key=>$val){
          $idate[$key]=$val['iymd'];
        }
        array_multisort($idate, SORT_DESC, $data2);
      }
      
      $request->setAttribute("data",$data2);

      $request->setAttribute("year",$year);
      $request->setAttribute("status",$status);
      $request->setAttribute("ntaisyou",$ntaisyou);
      if($user->getAttribute("branch")){
        if($request->getParameter('br')=='99'){
          $nbranch=99;
        }else{
          if(!$nbranch){
            $nbranch=$user->getAttribute("branch");
          }
        }
      }
      $request->setAttribute("nbranch",@$nbranch);
      $request->setAttribute("taisyou_count",@$taisyou_count);

      $request->setAttribute("years",$years);

      $log_mgr=new FormLogManager();
      $log_mgr->setlog($user->getAttribute('user_account'),'¹Ö»ÕÇÉ¸¯');

      //¥í¥Ã¥¯»þ´Ö¤Î¹¹¿·
      $user_mgr=new FormUserManager($DB);
      $user_mgr->update_lock_token_time($user->getAttribute('user_id'));

      return VIEW_SUCCESS;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpoform');
    }

  }
?>
