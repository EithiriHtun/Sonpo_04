<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');

class IndexAction extends DBAction{
  function execute (&$controller, &$request, &$user){
    if(file_exists(SONPO_EN_NEWS_FILE_DIR."list/top.html")){
      $list = file_get_contents(SONPO_EN_NEWS_FILE_DIR."list/top.html");
    }
    
    $request->setAttribute("data",mb_convert_encoding($list,'EUC-JP','SJIS'));
    
    return VIEW_SUCCESS;

  }
  
}
?>
