<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ContactManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class CsvAction extends DBAction {

  function execute(&$controller, &$request, &$user){

    require($controller->getModuleDir()."../Contact/config/config.php");
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    $contact_mgr=new ContactManager($DB);
    
    $dl=$_POST["dl"];
    $lines=array();
    foreach($dl as $key=>$val){
      $data=$contact_mgr->get_one($val);
      if($data){
        $tmp=$this->myEscapeCsv($data);
        array_push($lines,$tmp);
      }
    }
    
    $user_renderer= new CustomSmartyRenderer($controller, $request, $user);
    $user_renderer->setAttribute('data', $lines);
    $user_renderer->setAttribute('astatus', $status);
    $user_renderer->setAttribute('prefs', $prefs);
    $user_renderer->setAttribute('types', $types);
  
    $user_renderer->setTemplate('csv/csv.txt');
    $user_renderer->setMode(RENDER_VAR);
    $user_body=$user_renderer->fetchResult($controller, $request, $user);
    
    header("Cache-Control: private;");
    header("Pragma: no-cache;");
    header("Content-Type: application/x-csv");
    header("Content-Disposition: attachment; filename=websoudan_".date("Y-m-d").".csv");
      
    print mb_convert_encoding($user_body,'SJIS','EUC-JP');

//echo nl2br($user_body);

    return VIEW_NONE;
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocontact');
  }

  function myEscapeCsv($data){
    $data_new=array();
    
    foreach($data as $key=>$val){
      $val=preg_replace("/\x0D\x0A|\x0D|\x0A/"," ",$val);
      $val=preg_replace("/\"/","\"\"",$val);
      $data_new[$key]=$val;
    }
  
    return $data_new;
  
  }

}

?>
