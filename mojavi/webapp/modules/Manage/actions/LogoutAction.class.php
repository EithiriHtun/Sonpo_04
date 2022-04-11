<?php

 class LogoutAction extends Action{
   function execute (&$controller, &$request, &$user){

    $user->setAuthenticated(FALSE);
    $user->removePrivileges('sonpocms');
    $user->setAttribute('is_master',0);
    
    $controller->redirect("/manage/");

   }
 }

?>
