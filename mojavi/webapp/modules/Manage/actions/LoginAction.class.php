<?php

 class LoginAction extends Action{
   function execute (&$controller, &$request, &$user){
     $controller->forward(
       'Manage', 
       'Auth'
     );
     return VIEW_NONE;
   }
 }

?>
