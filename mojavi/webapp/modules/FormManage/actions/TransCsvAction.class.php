<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'InstructorManager.php');
require_once(LIB_DIR.'DocManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class TransCsvAction extends DBAction {

  function execute(&$controller, &$request, &$user){

    require($controller->getModuleDir()."../Instructor/config/config.php");
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    
    $contact_mgr=new InstructorManager($DB);
    
    if(
      !$user->getAttribute("is_shipping") &&
      !$user->getAttribute("is_master")   &&
      !$user->getAttribute("is_master2") 
    ){
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

    if(!preg_match("/ºï½ü/",$request->getParameter("subbtn"))){

      if($request->getParameter("is_all")=="1"){
        $tmp_ids=$request->getParameter('ids');
        $ids=explode(',',$tmp_ids);
        $dl=array();
        if($ids){
          foreach($ids as $val){
            if($val){
              array_push($dl,$val);
            }
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
      
      $doc_mgr= new DocManager($DB);

      $user_renderer=new CustomSmartyRenderer($controller, $request, $user);
      $user_renderer->setAttribute('data', $lines);
      $user_renderer->setAttribute('prefs', $prefs);
      $user_renderer->setAttribute('theme', $theme);
      $user_renderer->setAttribute('taisyou', $taisyou);
      $user_renderer->setAttribute('inst_type', $inst_type);
      $user_renderer->setAttribute('branch', $branch);
      $user_renderer->setAttribute('shiryou', $shiryou);
      $user_renderer->setAttribute('inst_condition', $inst_condition);
      $user_renderer->setAttribute('status', $inst_status);

      $user_renderer->setAttribute('tstatus', $trans_status);
      $user_renderer->setAttribute('tstatus2', $trans_status2);

      $user_renderer->setAttribute('doclist',$doc_mgr->get_all());

      $user_renderer->setTemplate('csv/transcsv.txt');

      $user_renderer->setMode(RENDER_VAR);
      $user_body=$user_renderer->fetchResult($controller, $request, $user);
      
      header("Cache-Control: private;");
      header("Pragma: no-cache;");
      header("Content-Type: application/x-csv");
      header("Content-Disposition: attachment; filename=transport_".date("Y-m-d").".csv");
        
      print mb_convert_encoding($user_body,'SJIS','EUC-JP');

  //echo nl2br($user_body);

      return VIEW_NONE;
    }else{
      $dl=$_POST["dl"];
      $lines=array();
      foreach($dl as $key=>$val){
        if($user->getAttribute("is_master") || $user->getAttribute("is_master2")){
          $data=$contact_mgr->del_sregist($val);
        }
      }
      $controller->redirect('/manage/forms/index.php/module/FormManage/action/TransList?y='.$request->getParameter('y').'&br='.$request->getParameter('br'));
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
