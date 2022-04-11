<?php
class FormLogManager{

  function FormLogManager(){
  }

  function setlog($user,$action){

    $dir = '/var/www/virtual/dev.sonpo-form.jp/formlog/';
    
    $filename = date("Ym").'.csv';
    
    $text = $user.','.date("Y-m-d H:i:s").','.mb_convert_encoding($action,'SJIS','EUC-JP').','.$_SERVER["REMOTE_ADDR"]."\n";
    
    error_log($text, 3, $dir.$filename);
//var_dump($text);
//var_dump($dir.$filename);
//exit();
  
  }
  
}
?>