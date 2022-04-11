<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ContactManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class SendAnswerAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');
    return VIEW_NONE;
  }

  function execute(&$controller, &$request, &$user){

    require($controller->getModuleDir()."../Contact/config/config.php");
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    $id=$user->getAttribute("id");
    $contact_manager=new ContactManager($DB);
    $data=$contact_manager->get_one($id);
    if(!$data["id"]){
      die("cannot find data.");
    }
    
    if($user->getAttribute("is_master")==1){
      // メール送信

      // for user
      $user_renderer= new CustomSmartyRenderer($controller, $request, $user);
      $user_renderer->setAttribute('comment_id', $data["comment_id"]);
  
      $user_renderer->setTemplate('mail/answermail.txt');
      $user_renderer->setMode(RENDER_VAR);
      $user_body=$user_renderer->fetchResult($controller, $request, $user);
      $user_body=preg_replace("/\x0D\x0A|\x0D|\x0A/","\n",$user_body);

      mail(
        $data["email"],
          "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($answer_mail_subject,"ISO-2022-JP","EUC-JP"))."?=",
        mb_convert_encoding($user_body,"ISO-2022-JP","EUC-JP"),
        "Content-Transfer-Encoding: 7bit\n".
        "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
        "Reply-To: ".$mail_from."\n".
        "From: ".$mail_from,
        "-f $mail_from"
      );
      
      // data update
      $contact_manager->set_date_send($id);
    }

    $data_in_session=$user->getAttribute("data");
    $data_new=$contact_manager->get_one($id);
    $data_in_session["date_send"]=$data_new["date_send"];
    $data_in_session["status"]=$data_new["status"];
    $user->setAttribute("data",$data_in_session);

    $request->setAttribute("popmsg","メールを送信しました。");
    return VIEW_SUCCESS;
  }

  function getRequestMethods(){
    return REQ_POST;
  }
  
  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocontact');
  }

}

?>
