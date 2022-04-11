<?php

 class LoginAction extends Action{
   function execute (&$controller, &$request, &$user){
     $controller->forward(
       'FormManage', 
       'Auth'
     );
     return VIEW_NONE;
   }
 }

?>
