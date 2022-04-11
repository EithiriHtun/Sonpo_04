<?php
require_once(LIB_DIR . 'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

class AuthAction extends DBAction{
  function execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');

    //
    /*
    $last_login_attempt_time = $user->getAttribute('last_login_attempt_time');
    if(
      !$last_login_attempt_time ||
      ($last_login_attempt_time && $last_login_attempt_time < (time() - $reset_login_attempt_count*60))
    ){
      $user->setAttribute('last_login_attempt_time',time());
      $last_login_attempt_time = $user->getAttribute('last_login_attempt_time');
      $user->setAttribute('count_login_attempt',0);
    }

    $login_attempts = $user->getAttribute('count_login_attempt');
    if($login_attempts > $login_limit_count){
       $request->setAttribute(
         'login_error_message',
         'ログインの試行回数の上限を超えました。'
       );
       $user->setAttribute('last_login_attempt_time',time());
       return VIEW_INPUT;
    }
    */
    //
    
    //initalize
    $user->removePrivileges('sonpoform');
    $user->setAttribute('is_master',0);
    $user->setAttribute('is_master2',0);
    $user->setAttribute('branch',0);

    $user_account = $request->getParameter('account');
    $password     = $request->getParameter('passwd');
    
    if (!$user_account){
       $request->setAttribute(
         'login_error_message',
         'IDもしくはパスワードが間違っています'
       );
       return VIEW_INPUT;
    }
    if (!$password){
       $request->setAttribute(
         'login_error_message',
         'IDもしくはパスワードが間違っています'
       );
       return VIEW_INPUT;
    }

    $is_auth=0;
    $is_master=0;
    
//
    $user_mgr=new FormUserManager($DB);
    $admin_users=$user_mgr->get_all();
    
    $ng_message = '';
    
    foreach($admin_users as $val){

      if($user_account==$val["account"]){
        $login_attempt_count = (@$val['login_attempt_count'])? $val['login_attempt_count'] : 0;

        if($login_attempt_count + 1 > $login_limit_count){
          $last_login_time = (@$val['last_login_time'])? strtotime($val['last_login_time']) : strtotime('2001-1-1');
          if($last_login_time > time() - $reset_login_attempt_count*60){
            //NG
            $ng_message = 'ログインの試行回数の上限を超えています。';
            break;
          }else{
            //Reset
            $login_attempt_count = 0;
            $user_mgr->update_login_attempt_count($val['id'], 0);
          }
        }
        
        //重複アカウント制限時間
        $locktime = 3600;//(sec)
        $lock_token = $user_mgr->get_lock_token($val['id'], $locktime);
        
        $my_lock_token = $user->getAttribute('lock_token');
        if(@$lock_token && @$lock_token<>$my_lock_token){
          //NG
          $ng_message = '該当アカウントのログインが重複しています。';
          break;
        }
/*
        if(@$val['last_login_time']){
          if(strtotime($val['last_login_time']) < (time() - $reset_login_attempt_count*60)){
            //last login time 更新 login attemptも0にリセット
            $user_mgr->update_last_login_time($val['id'],date('Y-m-d H:i:s'));
            $user_mgr->update_login_attempt_count($val['id'], 0);
            $login_attempt_count = 0;
          }
        }else{
          $user_mgr->update_last_login_time($val['id'],date('Y-m-d H:i:s'));
          $user_mgr->update_login_attempt_count($val['id'], 0);
          $login_attempt_count = 0;
        }
*/        
        
        if(md5($password)==$val["password"]){
          if(!@$val['pw_set_date']){
            $val['pw_set_date'] = $pw_default_date;
          }
        
          if($val["is_master"]){
            $is_auth=1;
            $is_master=$val["is_master"];
            $is_master2=$val["is_master2"];
            $is_shipping=$val["is_shipping"];
            $is_sassi=$val["is_sassi"];
            $branch=$val["branch"];
            $user_id=$val["id"];
            $user->setAttribute('count_login_attempt',0);
            
            break;
          }elseif(
            time() <= (strtotime($val['pw_set_date']) + $pw_change_days * 24*60*60)
          ){
            $is_auth=1;
            $is_master=$val["is_master"];
            $is_master2=$val["is_master2"];
            $is_shipping=$val["is_shipping"];
            $is_sassi=$val["is_sassi"];
            $branch=$val["branch"];
            $user_id=$val["id"];
            $user->setAttribute('count_login_attempt',0);
            
            break;
          }else{
            $ng_message = 'パスワードが無効となっています。パスワードを再設定してください。';
            
            break;
          }
        }else{
          $ng_message = 'IDもしくはパスワードが間違っています';
          //入力ミスをカウント
          if(!$login_attempt_count){
            $login_attempt_count = 0;
          }

          $user_mgr->update_login_attempt_count($val['id'],$login_attempt_count + 1);
          $user_mgr->update_last_login_time($val['id'],date('Y-m-d H:i:s'));

        }
      }
    }
//

/*
//for test----------------------
if(
  $user_account=='account1' &&
  $password=='geN2h7WK'
){
  $is_auth=1;
  $is_master=1;
  $is_shipping=0;
  $branch=0;
}elseif(
  $user_account=='shipping' &&
  $password=='geN2h7WK'
){
  $is_auth=1;
  $is_master=0;
  $is_shipping=1;
  $branch=0;
}elseif(
  $user_account=='kanto' &&
  $password=='geN2h7WK'
){
  $is_auth=1;
  $is_master=0;
  $is_shipping=0;
  $branch=3;
}
//------------------------------
*/
    if($is_auth){
      $user->setAuthenticated(TRUE);
      $user->addPrivilege('admin', 'sonpoform');
      $user->setAttribute('is_master',$is_master);
      $user->setAttribute('is_master2',$is_master2);
      $user->setAttribute('branch',$branch);
      $user->setAttribute('is_shipping',$is_shipping);
      $user->setAttribute('is_sassi',$is_sassi);
      $user->setAttribute('user_id',$user_id);
      
      $user->setAttribute('user_account',$user_account);

      //ログイン試行回数をリセット
      $user_mgr->update_login_attempt_count($user_id, 0);
      $user_mgr->update_previous_login_time($val['id']);
      $user_mgr->update_last_login_time($val['id'],date('Y-m-d H:i:s'));

      $log_mgr=new FormLogManager();
      $log_mgr->setlog($user_account,'ログイン');
      
      //ロック用トークン作成
      $lock_token = md5(time().'-'.$user_id . rand(0,999));
      $user->setAttribute('lock_token', $lock_token);
      $user_mgr->set_lock_token($user_id, $lock_token, date('Y-m-d H:i:s'));
      
      $controller->redirect('/manage/forms/index.php');
      return VIEW_NONE;
    }
    
    $request->setAttribute(
      'login_error_message',
      $ng_message
    );
    $login_attempts = $user->getAttribute('count_login_attempt') + 1;
    $user->setAttribute('count_login_attempt',$login_attempts);

    return VIEW_INPUT;
  }

  function getDefaultView (&$controller, &$request, &$user){
    return VIEW_INPUT;
  }

  function getRequestMethods (){
    return REQ_POST;
  }
}
?>