<?php
require_once(LIB_DIR . 'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PasswordRequestAction extends DBAction{
  function execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    //いったんログアウト
    $user->removePrivileges('sonpoform');
    $user->setAttribute('is_master',0);
    $user->setAttribute('is_master2',0);
    $user->setAttribute('branch',0);

    $user->setAttribute('user_account','');

    $user_account = $request->getParameter('account');
    $email        = $request->getParameter('email');
    $pw           = $request->getParameter('password');

    if (!$user_account){
       $request->setAttribute(
         'login_error_message',
         'アカウント、パスワードもしくはメールアドレスが間違っています'
       );
       return VIEW_INPUT;
    }
    if (!$email){
       $request->setAttribute(
         'login_error_message',
         'アカウント、パスワードもしくはメールアドレスが間違っています'
       );
       return VIEW_INPUT;
    }
    if (!$pw){
       $request->setAttribute(
         'login_error_message',
         'アカウント、パスワードもしくはメールアドレスが間違っています'
       );
       return VIEW_INPUT;
    }

    $is_match=0;
    $user_id = '';
    $account_name = '';
//
    $user_mgr=new FormUserManager($DB);
    $admin_users=$user_mgr->get_all();
    
    foreach($admin_users as $val){
      if(
        $user_account==$val["account"] && 
        $email==$val["email"] &&
        md5($pw)==$val["password"]
      ){
        $is_match=1;
        $user_id=$val["id"];
        $account_name = $val["account"];
      }
    }
//

    if($is_match){
    
      //一時URLの生成
      $reset_url = md5($user_id . '-' . rand(0,10000)) . md5(microtime());

      //DB更新
      $user_mgr->update_reset_url($user_id,$reset_url);
      
      //メールの送信

      $admin_renderer= new CustomSmartyRenderer($controller, $request, $user);
      //$admin_renderer->setAttribute("reset_url",'https://www.sonpo-form.jp/manage/forms/index.php/module/FormManage/action/ResetPassword/?u='.$reset_url);
      $admin_renderer->setAttribute("reset_url",'https://www.sonpo-form.jp/manage/forms/index.php/module/FormManage/action/ResetPassword/?u='.$reset_url);
      $admin_renderer->setAttribute("account_name",$account_name);

      $admin_renderer->setTemplate('mail/pw_request.txt');
      $admin_renderer->setMode(RENDER_VAR);
      $admin_body=$admin_renderer->fetchResult($controller, $request, $user);
      $admin_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$admin_body);

      mail(
        $email,
        "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding('パスワード設定用画面',"ISO-2022-JP","EUC-JP"))."?=",
        mb_convert_encoding($admin_body,"ISO-2022-JP","EUC-JP"),
        "Content-Transfer-Encoding: 7bit\n".
        "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
        "From: ".$mail_from,
        "-f $mail_from"
      );
      
      return VIEW_SUCCESS;
    }
    
    $request->setAttribute(
      'login_error_message',
      'アカウントもしくはメールアドレスが間違っています'
    );

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