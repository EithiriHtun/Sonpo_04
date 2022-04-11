<?php
  class Conv2EUCFilter extends Filter
  {
    function execute (&$filterChain, &$controller, $request, &$user)
    {
      $data = $request->getParameters();
      foreach($data as $key => $value) {
        if (@$value && !is_array(@$value)){
          if(mb_detect_encoding($value)<>"eucJP-win"){
            $c_value= mb_convert_encoding($value,"eucJP-win","SJIS-win");
            $request->setParameter($key,$c_value);
          }
        }
      }
      $filterChain->execute($controller, $request, $user);
    }
  }
?>
