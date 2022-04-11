<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'VideoManager.php');

  class VideoIndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if(
        $user->getAttribute("is_master")  ==1 || 
        $user->getAttribute("is_shipping")==1
      ){
        $where='';
/*
      if($user->getAttribute("branch")){
        foreach($branch_no as $key=>$val){
          if($user->getAttribute("branch")==$val){
            $where.='(method<>3 AND prefecture='.$key.') OR ';
            $where.='(method=3 AND sprefecture='.$key.') OR ';
          }
        }
        $where.='1=2 ';
      }
*/

        $l_status=99;
        if($request->getParameter('st')){
          if(preg_match("/^\d+$/",$request->getParameter('st'))){
            $l_status=$request->getParameter('st');
          }
        }else{
          if($user->getAttribute('l_status')){
            $l_status=$user->getAttribute('l_status');
          }
        }
        $user->setAttribute('l_status',$l_status);

        $l_year=99;
        if($request->getParameter('y')){
          if(preg_match("/^\d+$/",$request->getParameter('y'))){
            $l_year=$request->getParameter('y');
          }
        }else{
          if($user->getAttribute('l_year')){
            $l_year=$user->getAttribute('l_year');
          }
        }
        $user->setAttribute('l_year',$l_year);

        $l_month=99;
        if($request->getParameter('m')){
          if(preg_match("/^\d+$/",$request->getParameter('m'))){
            $l_month=$request->getParameter('m');
          }
        }else{
          if($user->getAttribute('l_month')){
            $l_month=$user->getAttribute('l_month');
          }
        }
        $user->setAttribute('l_month',$l_month);

        $article_manager=new VideoManager($DB);
        $data=$article_manager->get_list($l_status,$l_year,$l_month);
        
        $request->setAttribute("data",  @$data);
        $request->setAttribute("status",@$status);
        
        return VIEW_SUCCESS;

      }else{
        $controller->redirect(
          '/manage/forms/index.php/module/FormManage'
        );
        return VIEW_NONE;
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
