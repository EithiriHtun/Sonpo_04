<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

  class PubStockIndexAction extends DBAction{

    function execute (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      $article_manager=new PubManager($DB);

      $order_page=$user->getAttribute('ship_page');
      $data=$article_manager->get_pubmaster_all();
      
      $data2=array();
      if($data){
        foreach($data as $val){
          $total_p     =$article_manager->get_pub_count($val['id']);
          $total_online=$article_manager->get_pub_out_count_online($val['id']);
          $total_inst  =$article_manager->get_pub_out_count_type($val['id'],3);
          $total_other =$article_manager->get_pub_out_count_type($val['id'],4);
          $total_adj   =$article_manager->get_pub_out_count_adj($val['id']);
//          $total_m     =$article_manager->get_pub_out_count($val['id']);
          $total_m     =$total_online+$total_inst+$total_other+$total_adj;
          
          $val['total_p']     =$total_p;
          $val['total_online']=$total_online;
          $val['total_inst']  =$total_inst;
          $val['total_other'] =$total_other;
          $val['total_adj']   =$total_adj;
          $val['total_m']     =$total_m;
          $val['stock']       =$total_p-$total_m;
          
          array_push($data2,$val);
        }
      }
      
      $request->setAttribute("data",$data2);

      $log_mgr=new FormLogManager();
      $log_mgr->setlog($user->getAttribute('user_account'),'ºß¸Ë¾õ¶·ÍúÎò');

      return VIEW_SUCCESS;

    }

    function isSecure(){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpoform');
    }

  }
?>
