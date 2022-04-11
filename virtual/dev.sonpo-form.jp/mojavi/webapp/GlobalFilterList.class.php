<?php
class GlobalFilterList extends FilterList{
  function registerFilters (&$filterChain, &$controller, &$request, &$user){
    require_once( BASE_DIR . 'filters/Conv2EUCFilter.class.php' );
    $filterChain->register(new Conv2EUCFilter);
  }
}
?>