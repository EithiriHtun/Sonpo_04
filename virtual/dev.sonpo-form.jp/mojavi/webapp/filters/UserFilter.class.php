<?php
  class UserdataFilter extends Filter
  {
    function execute (&$filterChain, &$controller, &$request, &$user)
    {
      // �������ե��륿
      print ' before ';
      // filter chain�μ��Υե��륿��¹Ԥ���
      $filterChain->execute($controller, $request, $user);
      // ������ե��륿
      print ' after ';
    }
  }
?>
