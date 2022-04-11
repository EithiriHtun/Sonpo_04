<?php
require_once(LIB_DIR . 'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

class ResetPasswordAction extends DBAction{
  function execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    //���ä����������
    $user->removePrivileges('sonpoform');
    $user->setAttribute('is_master',0);
    $user->setAttribute('is_master2',0);
    $user->setAttribute('branch',0);

    $user->setAttribute('user_account','');

    $account   = $request->getParameter('account');
    $password  = $request->getParameter('passwd');
    $password2 = $request->getParameter('passwd2');
    $reset_token = $request->getParameter('reset_token');

    if (!$password || !$password2){
       $request->setAttribute(
         'login_error_message',
         '�ѥ���ɤ����Ϥ���Ƥ��ޤ���'
       );
       return VIEW_INPUT;
    }
    if ($password<>$password2){
       $request->setAttribute(
         'login_error_message',
         '�ѥ���ɤ���ǧ�ѤΥѥ���ɤȰ��פ��Ƥ��ޤ���'
       );
       return VIEW_INPUT;
    }
    if (!$reset_token){
       $request->setAttribute(
         'login_error_message',
         'ɬ�פʾ�����­���Ƥ��ޤ������餿��ƥѥ���ɺ�����ο����򤪤��ʤäƤ���������'
       );
       return VIEW_INPUT;
    }
    if ($reset_token<>$user->getAttribute('reset_token')){
       $request->setAttribute(
         'login_error_message',
         'ɬ�פʾ�����­���Ƥ��ޤ������餿��ƥѥ���ɺ�����ο����򤪤��ʤäƤ���������'
       );
       return VIEW_INPUT;
    }

    $is_match=0;
    $user_id = '';
//
    $user_mgr=new FormUserManager($DB);
    $admin_users=$user_mgr->get_all();
    $userdata = array();
    
    foreach($admin_users as $val){
      if(
        $account == $val['account'] &&
        $user->getAttribute('reset_id')==$val["id"]
      ){
        $is_match=1;
        $user_id=$val["id"];
        $userdata = $val;
      }
    }
//

    if($is_match){
    
      if(!preg_match("/^[0-9a-zA-Z!-\/:-@\[-`{-~]+$/",$password)){
         $request->setAttribute(
           'login_error_message',
           '�ѥ���ɤ�Ⱦ�ѱѿ�������Τ߻��Ѥ��Ƥ���������'
         );
         return VIEW_INPUT;
      }

      $is_validstr = 0;
      if(preg_match("/[0-9]/",$password)){
        $is_validstr++;
      }
      if(preg_match("/[a-z]/",$password)){
        $is_validstr++;
      }
      if(preg_match("/[A-Z]/",$password)){
        $is_validstr++;
      }
      if(preg_match("/[!-\/:-@\[-`{-~]/",$password)){
        $is_validstr++;
      }
      if($is_validstr < 4){
         $request->setAttribute(
           'login_error_message',
           "�ѥ���ɤ�Ⱦ�ѱѻ�����ʸ������ʸ���ˡ�Ⱦ�ѿ�����Ⱦ�ѵ�����Ȥ߹�碌�ƻ��ꤷ�Ƥ���������"
         );
         return VIEW_INPUT;
      }

      if(strlen($password)<10 || strlen($password)>32){
         $request->setAttribute(
           'login_error_message',
           '�ѥ���ɤ�10ʸ���ʾ�32ʸ���ʲ��Ȥ��Ƥ���������'
         );
         return VIEW_INPUT;
      }
      if(
        $userdata['password'] &&
        md5($password) == $userdata['password']
      ){
         $request->setAttribute(
           'login_error_message',
           '�����Ѥ����ѥ���ɤȰۤʤ�ѥ���ɤ����ꤷ�Ƥ���������'
         );
         return VIEW_INPUT;
      }
      if(
        $userdata['pw1'] &&
        md5($password) == $userdata['pw1']
      ){
         $request->setAttribute(
           'login_error_message',
           '�����Ѥ����ѥ���ɤȰۤʤ�ѥ���ɤ����ꤷ�Ƥ���������'
         );
         return VIEW_INPUT;
      }
      if(
        $userdata['pw2'] &&
        md5($password) == $userdata['pw2']
      ){
         $request->setAttribute(
           'login_error_message',
           '�����Ѥ����ѥ���ɤȰۤʤ�ѥ���ɤ����ꤷ�Ƥ���������'
         );
         return VIEW_INPUT;
      }

      if(preg_match("/".preg_quote($userdata['account'])."/",$password)){
         $request->setAttribute(
           'login_error_message',
           '�ѥ���ɤϥ��������̾��ޤޤʤ��褦�ˤ��Ƥ���������'
         );
         return VIEW_INPUT;
      }

      //DB����
      $updata['password']     = md5($password);
      $updata['pw_set_date']  = date("Y-m-d");
      $updata['pw1']          = $userdata['password'];
      $updata['pw1_set_date'] = $userdata['pw_set_date'];
      $updata['pw2']          = $userdata['pw1'];
      $updata['pw2_set_date'] = $userdata['pw1_set_date'];
      $updata['reset_url']    = '';
      $updata['login_attempt_count'] = 0;

      $user_mgr->update_password($updata,$user_id);
      $user_mgr->update_reset_url($user_id,'');
      $user_mgr->update_login_attempt_count($user_id,'');

      $user->setAttribute('count_login_attempt',0);
      
      return VIEW_SUCCESS;
    }
    
    $request->setAttribute(
      'login_error_message',
      'ɬ�פʾ�����­���Ƥ��ޤ������餿��ƥѥ���ɺ�����ο����򤪤��ʤäƤ���������'
    );

    return VIEW_INPUT;
  }

  function getDefaultView (&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');
    
    $reset_url = $_GET['u'];
    
    if(!$reset_url){
      return VIEW_ALERT;
    }
    
    //���»���
    //$limit = 1800;//(s)
    $limit = 4 * 24 * 60 * 60;//(s)
    
    $is_match = 0;
    $user_id = '';
    $email = '';
    
    //�쥳���ɤ�õ��
    $user_mgr=new FormUserManager($DB);
    $admin_users=$user_mgr->get_all();
    
    foreach($admin_users as $val){
      if(
        $reset_url &&
        $reset_url == $val["reset_url"] && 
        $val["reset_request_time"] &&
        time() < strtotime($val["reset_request_time"]) + $limit
      ){
        $is_match = 1;
        $user_id = $val["id"];
        $email = $val['email'];
      }
    }
    
    if($is_match && $user_id){
    
      $reset_token = md5($user_id . $email);
      $user->setAttribute('reset_token',$reset_token);
      $user->setAttribute('reset_id',$user_id);
    
      return VIEW_INPUT;
    }else{
      $user->setAttribute('reset_token','');
      $user->setAttribute('reset_id','');
      return VIEW_ALERT;
    }
  }

  function getRequestMethods (){
    return REQ_POST;
  }
}
?>