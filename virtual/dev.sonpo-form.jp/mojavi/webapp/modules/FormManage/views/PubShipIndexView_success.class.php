<?php
require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

  class PubShipIndexView extends View{
    function & execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $renderer= new CustomSmartyRenderer(
        $controller, $request, $user
      );
    
      $renderer->setTemplate('pubshiplist.html');
      
      $data=$request->getAttribute("data");
      $renderer->setAttribute("data",$data);

      $renderer->setAttribute("pub_order_type",$pub_order_type);
      $renderer->setAttribute("years",range(2009,date("Y")+1));
      $months = array(4,5,6,7,8,9,10,11,12,1,2,3);
      $renderer->setAttribute("months",$months);
      
      $renderer->setAttribute("order_page",$user->getAttribute("ship_page"));

      $renderer->setAttribute("settle_status",$pub_settle_status);

      $renderer->setAttribute("books",$request->getAttribute("books"));

      $renderer->setAttribute("is_master",$user->getAttribute("is_master"));
      $renderer->setAttribute("is_master2",$user->getAttribute("is_master2"));
      $renderer->setAttribute("is_shipping",$user->getAttribute("is_shipping"));
      $renderer->setAttribute("is_sassi",$user->getAttribute("is_sassi"));
      
      $renderer->setAttribute("sassi_users",$request->getAttribute("sassi_users"));

      $renderer->setAttribute("script_path",SCRIPT_PATH);
      
      return $renderer;
    }

  }
?>
