<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubShipDetailAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if(
      $user->getAttribute("is_master")  ==1 ||
      $user->getAttribute("is_master2") ==1 ||
      $user->getAttribute("is_sassi")   ==1 || 
      $user->getAttribute("is_shipping")==1
    ){
      if(!$request->getErrors()){
        $user->setAttribute("data",'');
        $user->setAttribute("id",'');
      }

      if($request->getParameter("id")){
        $id=$request->getParameter("id");
        $user->setAttribute("id",$id);
      }else{
        $id=$user->getAttribute("id");
      }
      
      if(!$id){
        $controller->redirect(SCRIPT_PATH);
        return VIEW_NONE;
      }

      if(!$request->getErrors()){

        if($id){
          $article_manager= new PubManager($DB);
          $data=$article_manager->get_one_order($id);
          
          if(!$data){
            $controller->redirect(SCRIPT_PATH);
            return VIEW_NONE;
          }
          
          $books=$article_manager->get_one_order_item($id);
          $total_price=0;
          $total_count=0;
          $allbooks=0;
          
          if($books){
            foreach($books as $val){
              if($data['type']<>3 && $data['type']<>4){
                $total_price+=$val['price']*$val['amount'];
              }
              $total_count+=$val['amount'];
              $allbooks++;
            }
          }
          $data['total_price']=$total_price;
          $data['total_count']=$total_count;

          $data['allprice']=$total_price+$data['trans_price'];
          $data['allbooks']=$allbooks;
          
          $data['books']=$books;
          
          // 
//          $sassi_users=$article_manager->get_sassi_users();
          $sassi_users=$article_manager->get_sassi_distinct_sections();
          $data['sassi_users']=$sassi_users;
          
        }
        $user->setAttribute("data",$data);

      }

      return VIEW_SUCCESS;

    }else{
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

  }

  function getRequestMethods(){
    return REQ_POST;
  }
  

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpoform');
  }

}

?>
