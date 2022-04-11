<?php
class JMail{

  var $mailto;
  var $subject;
  var $body;
  var $code;
  var $from;
  
  function JMail($to,$from,$subject,$body,$code){
    $this->$mailto =$to;
    $this->$from   =$from;
    $this->$subject=$subject;
    $this->$body   =$body;
    $this->$code   =$code;
  }

  function send(){
    mail(
      $this->$mailto,
      "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($this->$subject,"ISO-2022-JP",$this->$code))."?=",
      mb_convert_encoding($this->$body,"ISO-2022-JP",$this->$code),
      "Content-Transfer-Encoding: 7bit\n".
      "Content-Type: text/plain; charset=\"iso-2022-jp\"\n".
      "From: ".$this->$from
    );
  }

}
?>