<?php
  class UserdataFilter extends Filter
  {
    function execute (&$filterChain, &$controller, &$request, &$user)
    {
      // 前処理フィルタ
      print ' before ';
      // filter chainの次のフィルタを実行する
      $filterChain->execute($controller, $request, $user);
      // 後処理フィルタ
      print ' after ';
    }
  }
?>
