<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

  class IndexAction extends DBAction{
    function execute ($controller, $request, $user){

      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      $user->setAttribute('l_status','');
      $user->setAttribute('l_year','');
      $user->setAttribute('l_month','');
      
      $user_mgr=new FormUserManager($DB);
      
      //ロック時間の更新
      $user_mgr->update_lock_token_time($user->getAttribute('user_id'));

      $userdata = $user_mgr->get_one_for_csv($user->getAttribute('user_id'));
      
      $pw_set_date = $userdata['pw_set_date'];
      if(!$pw_set_date){
        $pw_set_date = $pw_default_date;
      }
      $pw_alert = 0;
      if(
        time() >= strtotime($pw_set_date) + ($pw_change_days-$pw_change_alert_days)*24*60*60
      ){
        $pw_alert = 1;
      }
      
      if($userdata['is_master']){
        $user->setAttribute('pw_alert', null);
      }else{
        $user->setAttribute('pw_alert', $pw_alert);
      }
      $user->setAttribute(
        'pw_limit_date',
        date( "Y-m-d", strtotime($pw_set_date)+$pw_change_days*24*60*60 )
      );
      
      if($userdata['previous_login_time']){
        $user->setAttribute('previous_login_time', date("Y-m-d H:i",strtotime($userdata['previous_login_time'])));
      }
      return VIEW_SUCCESS;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege ($controller, $request, $user){
      return array('admin', 'sonpoform');
    }

  }
?>
