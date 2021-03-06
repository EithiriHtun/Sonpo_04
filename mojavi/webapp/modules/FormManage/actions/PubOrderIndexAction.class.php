<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

  class PubOrderIndexAction extends DBAction{

    function getDefaultView(&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if(
        $user->getAttribute("is_master")  ==1 || 
        $user->getAttribute("is_master2") ==1 || 
        $user->getAttribute("is_shipping")==1
      ){

        $article_manager=new PubManager($DB);

        $order_page=$user->getAttribute('order_page');
        $order_page['trans_status']=(@$order_page['trans_status']=='') ? 
          99
        :
          $order_page['trans_status'];
        $order_page['settle_status']=(@$order_page['settle_status']=='') ? 
          99
        :
          $order_page['settle_status'];
        $date_y = date("Y");
        if(date("n")>=1 && date("n")<=3){
          $date_y = $date_y - 1;
        }
        $order_page['out_year']=isset($order_page['out_year']) ? $order_page['out_year'] : $date_y;
        $data=$article_manager->get_order_list_wo_type5(
          isset($order_page['order_type']) ? $order_page['order_type'] : 99,
          isset($order_page['out_year']) ? $order_page['out_year'] : $date_y,
          isset($order_page['out_month']) ? $order_page['out_month'] : 99,
          ($order_page['trans_status']=='') ? 99:$order_page['trans_status'],
          ($order_page['settle_status']=='') ? 99:$order_page['settle_status']
        );
        $user->setAttribute("order_page",$order_page);
        
        $request->setAttribute("data",$data);

        $log_mgr=new FormLogManager();
        $log_mgr->setlog($user->getAttribute('user_account'),'発送管理一覧');

        return VIEW_SUCCESS;

      }else{
        $controller->redirect(
          '/manage/forms/index.php/module/FormManage'
        );
        return VIEW_NONE;
      }
    }

    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if(
        $user->getAttribute("is_master")  ==1 || 
        $user->getAttribute("is_master2") ==1 || 
        $user->getAttribute("is_shipping")==1
      ){

        if(!$request->getErrors()){
          $article_manager=new PubManager($DB);
          
          $order_page=$user->getAttribute('order_page');
//          $order_page['trans_status']=isset($order_page['trans_status']) ? $order_page['trans_status'] : 99;
//          $order_page['settle_status']=isset($order_page['settle_status']) ? $order_page['settle_status'] : 99;
          $data=$article_manager->get_order_list_wo_type5(
            isset($order_page['order_type']) ? $order_page['order_type'] : 99,
            isset($order_page['out_year']) ? $order_page['out_year'] : 99,
            isset($order_page['out_month']) ? $order_page['out_month'] : 99,
            isset($order_page['trans_status']) ? $order_page['trans_status'] : 99,
            isset($order_page['settle_status']) ? $order_page['settle_status'] : 99
          );
        }
        
        $request->setAttribute("data",$data);

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
    
    function validate(&$controller, &$request, &$user){
      return TRUE;
    }
    
    function registerValidators(&$validatorManager, &$controller, &$request, &$user) {
      require($controller->getModuleDir()."config/config.php");
    
      $data=$request->getParameters();
      
      $data_in_session=$user->getAttribute("order_page");
      $user->setAttribute(
        "order_page",
        array_merge($data_in_session,$data)
      );
    
      if(
        $data['order_type']<>99 && 
        !isset($pub_order_type[$data['order_type']])
      ){
        $validatorManager->setRequired(
          "invalid_type", 
          true, 
          "属性が正しくありません。"
        );
      }

      if(
        $data['out_year']<>99 && 
        ($data['out_year']<2009 || $data['out_year']>date("Y")+1)
      ){
        $validatorManager->setRequired(
          "invalid_year", 
          true, 
          "発送日が正しくありません。"
        );
      }
      if(
        $data['out_month']<>99 && 
        ($data['out_month']<1 || $data['out_month']>12)
      ){
        $validatorManager->setRequired(
          "invalid_month", 
          true, 
          "発送日が正しくありません。"
        );
      }
      if(
        ($data['out_month']>=1 && $data['out_month']<=12) &&
        (!$data['out_year'] || $data['out_year']<2009)
      ){
        $validatorManager->setRequired(
          "invalid_month", 
          true, 
          "発送日が正しくありません。"
        );
      }
      
      if(
        $data['trans_status']<>99 && 
        !isset($pub_trans_status[$data['trans_status']])
      ){
        $validatorManager->setRequired(
          "invalid_trans_status", 
          true, 
          "発送状況が正しくありません。"
        );
      }

      if(
        $data['settle_status']<>99 && 
        !isset($pub_settle_status[$data['settle_status']])
      ){
        $validatorManager->setRequired(
          "invalid_settle_status", 
          true, 
          "決済状況が正しくありません。"
        );
      }
    
    }

    function handleError(&$controller, &$request, &$user){
      return $this->getDefaultView($controller,$request,$user);
    }

    function isSecure(){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpoform');
    }

  }
?>
