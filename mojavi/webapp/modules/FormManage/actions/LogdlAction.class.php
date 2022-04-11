<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'FormUserManager.php');
require_once(LIB_DIR.'InstructorManager.php');
require_once(LIB_DIR.'DocManager.php');
require_once(LIB_DIR.'PubManager.php');

  class LogdlAction extends DBAction{
    function getDefaultView(&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      if(!$user->getAttribute("is_master")){
        $controller->redirect(SCRIPT_PATH);
        return VIEW_NONE;
      }


      return VIEW_SUCCESS;
    }

    function execute(&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      $mode = $request->getParameter("mode");

      $syear  = $request->getParameter("syear");
      $smonth = $request->getParameter("smonth");
      $sday   = $request->getParameter("sday");
      $shour  = $request->getParameter("shour");
      $smin   = $request->getParameter("smin");
      $eyear  = $request->getParameter("eyear");
      $emonth = $request->getParameter("emonth");
      $eday   = $request->getParameter("eday");
      $ehour  = $request->getParameter("ehour");
      $emin   = $request->getParameter("emin");

      $sdate = date("Y-m-d H:i",mktime($shour,$smin,0,$smonth,$sday,$syear)).':00';
      $edate = date("Y-m-d H:i",mktime($ehour,$emin,0,$emonth,$eday,$eyear)).':00';

      if($mode=='´©¹ÔÊª¤Î¿½¹þ'){

        $mgr = new PubManager($DB);

        $logdata = $mgr->get_log($sdate,$edate);

        $fields = $mgr->get_log_fields();
        
        $this->_set_csv($DB,$logdata,$fields,'pub_order_id','publication_order.csv');

      }elseif($mode=='´©¹ÔÊª¥Þ¥¹¥¿¡¼'){

        $mgr = new PubManager($DB);

        $logdata = $mgr->get_publications_log($sdate,$edate);

        $fields = $mgr->get_publications_log_fields();
        
        $this->_set_csv($DB,$logdata,$fields,'publications_id','publications.csv');

      }elseif($mode=='¹Ö»ÕÇÉ¸¯¤Î¿½¹þ'){

        $mgr = new InstructorManager($DB);

        $logdata = $mgr->get_log($sdate,$edate);

        $fields = $mgr->get_log_fields();
        
        $this->_set_csv($DB,$logdata,$fields,'instructor_id','instructor_order.csv');

      }elseif($mode=='ÅÐÏ¿¼Ô'){

        $mgr = new FormUserManager($DB);

        $logdata = $mgr->get_log($sdate,$edate);

        $fields = $mgr->get_log_fields();
        
        $this->_set_csv($DB,$logdata,$fields,'formusers_id','admin_users.csv');

      }

    }
    
    function _set_csv($DB,$logdata,$fields,$id_field,$filename){

      $usermgr = new FormUserManager($DB);

      $fields2 = array();
      foreach($fields as $f){
        if($f==$id_field){
          array_push($fields2, 'id');
        }elseif($f=='user_id'){
          array_push($fields2, 'user');
        }elseif($f=='log_datetime'){
          //nothing
        }else{
          array_push($fields2, $f);
        }
      }
      array_unshift($fields2,'log_datetime');

      $fp = fopen('php://output', 'w');
      
      fputcsv($fp, $fields2, ',', '"');
      
      foreach($logdata as $row){
        $row2 = array();
        $logdt = '';
        foreach($fields as $f){
          if($f=='user_id'){
            $formuser = $usermgr->get_one_for_csv($row[$f]);
            array_push($row2, $formuser['account']);
          }elseif($f=='sql_str'){
            $str = $row[$f];
            
            $str = preg_replace("/\r\n|\r|\n/","",$str);
            $str = preg_replace("/\s+/"," ",$str);
            
            array_push($row2, $str);
          }elseif($f=='log_datetime'){
            $logdt = $row[$f];
          }else{
            array_push($row2, $row[$f]);
          }
        }
        array_unshift($row2,$logdt);
        mb_convert_variables('SJIS-win','EUC-JP',$row2);
        fputcsv($fp, $row2, ',', '"');
      }

      fclose($fp);

      header('Content-Type: application/octet-stream');
      header("Content-Disposition: attachment; filename=".$filename);
      header('Content-Transfer-Encoding: binary');

    }

    function getRequestMethods(){
      return REQ_POST;
    }
  
    function handleError (&$controller, &$request, &$user){
      return $this->getDefaultView($controller,$request,$user);
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpoform');
    }

  }
?>
