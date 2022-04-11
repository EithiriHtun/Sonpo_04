<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');

  class TransListAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if(
        !$user->getAttribute("is_shipping") &&
        !$user->getAttribute("is_master")   &&
        !$user->getAttribute("is_master2") 
      ){
        $controller->redirect(
          '/manage/forms/index.php/module/FormManage'
        );
        return VIEW_NONE;
      }

      $article_manager=new InstructorManager($DB);

      $years=$article_manager->get_year_list();

      $year    =$request->getParameter('y');
      if(!$year){
        if($years){
          foreach(array_reverse($years,TRUE) as $key=>$val){
            $year=$key;
          }
        }
      }
      
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
          $nbranch=$user->getAttribute("branch");
        }
      }
      $tstatus2=$request->getParameter('tr2');

      $where='';
      if($nbranch){
        $where.='(branch=0 AND (';
        foreach($branch_no as $key=>$val){
          if($nbranch==$val){
            $where.='prefecture='.$key.' OR ';
          }
        }
        $where.=sprintf("1=2 )) OR branch=%d",$nbranch);
      }
      if($tstatus2==1){
        $where.=' t_status=0 AND sregist=1';
      }elseif($tstatus2==2){
        $where.=' t_status=1 AND t_status2=0 AND sregist=1';
      }elseif($tstatus2==3){
        $where.=' t_status=1 AND t_status2=1 AND sregist=1';
      }

      $article_manager=new InstructorManager($DB);
      $data=$article_manager->get_list($where,$year);
      
      $data2=array();
      if($data){
        foreach($data as $val){
          $tmp_flag=1;
          if($val['year_3']){
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
          if(isset($val['sregist']) && $val['sregist']==1){
            $tmp_flag=$tmp_flag*1;
          }else{
            $tmp_flag=$tmp_flag*0;
          }
          if(isset($val['status']) && ($val['status']==2 || $val['status']==3)){
            $tmp_flag=$tmp_flag*1;
          }else{
            $tmp_flag=$tmp_flag*0;
          }
          if($user->getAttribute('is_shipping')){
            if($val['t_status']==1){
              $tmp_flag=$tmp_flag*1;
            }else{
              $tmp_flag=$tmp_flag*0;
            }
          }
          if($tmp_flag){
            array_push($data2,$val);
          }
        }
      }
      
      foreach($data2 as $key=>$val){
        $idate[$key]=$val['iymd'];
      }
      array_multisort($idate, SORT_DESC, $data2);
      
      $request->setAttribute("data",$data2);

      $request->setAttribute("year",$year);
      if($user->getAttribute("branch")){
        if($request->getParameter('br')=='99'){
          $nbranch=99;
        }else{
          $nbranch=$user->getAttribute("branch");
        }
      }
      $request->setAttribute("nbranch",$nbranch);
      $request->setAttribute("tstatus2",$tstatus2);

      $request->setAttribute("years",$years);

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
