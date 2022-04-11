<?php
require_once(SMARTY_DIR . 'Smarty.class.php');
require_once(RENDERER_DIR . 'SmartyRenderer.class.php');

class CustomSmartyRenderer extends SmartyRenderer{
  function CustomSmartyRenderer($controller,$request,$cache=SMARTY_CACHING,$cache_lifetime=SMARTY_CACHE_LIFETIME){
    parent::SmartyRenderer();

    $module=$controller->getRequestModule();

    $compile_dir=SMARTY_COMPILE_DIR . "$module/";
    $cache_dir  =SMARTY_CACHE_DIR   . "$module/";

    if(!file_exists(SMARTY_COMPILE_DIR)) mkdir(SMARTY_COMPILE_DIR,0755);
    if(!file_exists(SMARTY_CACHE_DIR))   mkdir(SMARTY_CACHE_DIR,0755);
    if(!file_exists($compile_dir))       mkdir($compile_dir,0755);
    if(!file_exists($cache_dir))         mkdir($cache_dir,0755); 

    $cache_lifetime = 0;

    $params = array(
      'caching'        => $cache,
      'cache_lifetime' => $cache_lifetime,
      'cache_dir'      => $cache_dir,
      'force_compile'  => SMARTY_FORCE_COMPILE,
      'compile_dir'    => $compile_dir,
      'config_dir'     => $controller->getModuleDir() . 'config/',
      'debug_tpl'      => SMARTY_DEBUG_TPL,
      'debugging_ctrl' => SMARTY_DEBUGGING_CTRL,
      'debugging'      => SMARTY_DEBUGGING
    );

    $smarty = $this->getEngine();
    foreach ( $params AS $key => $value ) $smarty->$key = $value;
  }
}
?>
