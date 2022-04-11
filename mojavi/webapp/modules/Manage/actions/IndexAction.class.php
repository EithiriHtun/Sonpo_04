<?php
require_once(LIB_DIR.'DBAction.class.php');

  class IndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){

      if ($handle = opendir(SONPO_TEMP_IMAGE_DIR)){
        while(false !== ($file=readdir($handle))) {
          if($file != "." && $file != ".."){
            if((time()-filemtime(SONPO_TEMP_IMAGE_DIR.$file)) > 4*60*60){
            unlink(SONPO_TEMP_IMAGE_DIR.$file);
            }
          }
        }
        closedir($handle);
      }

      return VIEW_SUCCESS;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpocms');
    }
  }
?>
