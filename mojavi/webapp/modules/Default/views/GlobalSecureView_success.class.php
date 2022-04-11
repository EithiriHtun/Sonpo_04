 <?php
 class GlobalSecureView extends View
 {
     function & execute (&$controller, &$request, &$user)
     {
//         $renderer = new Renderer($controller, $request, $user);
//         $renderer->setTemplate('login.html');
         $controller->("/manage/index.php/module/Manage");
         return $renderer;
     }
 }
 ?>
