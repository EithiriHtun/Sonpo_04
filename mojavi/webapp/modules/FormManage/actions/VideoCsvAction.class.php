<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'VideoManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class VideoCsvAction extends DBAction {

  function execute(&$controller, &$request, &$user){

    require($controller->getModuleDir()."../Video/config/config.php");
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    if(
      $user->getAttribute("is_master")  ==1 ||
      $user->getAttribute("is_master2") ==1 ||
      $user->getAttribute("is_shipping")==1
    ){

      $contact_mgr=new VideoManager($DB);
      
      if($request->getParameter("is_all")=="1"){
        $where='';
        if($user->getAttribute("branch")){
          foreach($branch_no as $key=>$val){
            if($user->getAttribute("branch")==$val){
              $where.='prefecture='.$key.' OR ';
            }
          }
          $where.='1=2 ';
        }

        $dl=array();
        $data=$contact_mgr->get_list($where);
        if($data){
          foreach($data as $val){
            array_push($dl,$val["id"]);
          }
        }
        
      }else{
        $dl=$_POST["dl"];
      }
      $lines=array();
      foreach($dl as $key=>$val){
        $data=$contact_mgr->get_one($val);
        if($data){
          $tmp=$this->myEscapeCsv($data);
          array_push($lines,$tmp);
        }
      }
      
      $user_renderer=new CustomSmartyRenderer($controller, $request, $user);
      $user_renderer->setAttribute('data', $lines);
      $user_renderer->setAttribute('prefs', $prefs);
      $user_renderer->setAttribute('status', $video_status);

      $user_renderer->setTemplate('csv/videocsv.txt');
      $user_renderer->setMode(RENDER_VAR);
      $user_body=$user_renderer->fetchResult($controller, $request, $user);
      
      header("Cache-Control: private;");
      header("Pragma: no-cache;");
      header("Content-Type: application/x-csv");
      header("Content-Disposition: attachment; filename=video_".date("Y-m-d").".csv");
        
      print mb_convert_encoding($user_body,'SJIS','EUC-JP');

  //echo nl2br($user_body);

      return VIEW_NONE;

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
