<?php
  class Conv2UTF8Filter extends Filter
  {
    function execute (&$filterChain, &$controller, &$request, &$user)
    {
      $data = $request->getParameters();
      foreach($data as $key => $value) {
        if (mb_detect_encoding($value)<>"UTF-8"){
          $c_value= mb_convert_encoding($value,"UTF-8","SJIS");
          $request->setParameter($key,$c_value);
        }
      }
      $filterChain->execute($controller, $request, $user);
    }
  }
?>
