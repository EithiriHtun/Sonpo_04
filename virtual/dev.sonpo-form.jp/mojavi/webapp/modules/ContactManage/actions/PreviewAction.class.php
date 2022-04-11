<?php

  class PreviewAction extends Action{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      $cid=$request->getParameter("cid");
      $fname="Kaitou_".sprintf("%010d",$cid).".pdf";

      if(file_exists(SONPO_PDF_DIR.$fname)){
        $fp=fopen(SONPO_PDF_DIR.$fname,"r");
        $pdfdata=fread($fp,filesize(SONPO_PDF_DIR.$fname));
        fclose($fp);
      }else{
        die("cannot find file. ".SONPO_PDF_DIR.$fname);
      }

      header("Cache-Control: private;");
      header("Pragma: no-cache;");
      header('Content-type: application/pdf');
      header('Content-Disposition: inline; filename='.$fname);
      print $pdfdata;

      return VIEW_NONE;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpocontact');
    }

  }
?>
