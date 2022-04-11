<?php

 class LoginAction extends Action{
   function execute (&$controller, &$request, &$user){
     $controller->forward(
       'ContactManage', 
       'Auth'
     );
     return VIEW_NONE;
   }
 }

?>
