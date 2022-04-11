<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');
require_once(LIB_DIR.'FormUserManager.php');

  class PubMasterIndexAction extends DBAction{
    function execute (&$controller, &$request, &$user){
      $DB=$request->getAttribute('db');

      if(!$user->getAttribute("is_master")){
        $controller->redirect(SCRIPT_PATH);
        return VIEW_NONE;
      }

      $article_manager=new PubManager($DB);

      if($request->getParameter("mode")=='delete'){
      
        $id=$request->getParameter("id");
        $article_manager->delete_pubmaster($id);
      
      }

      $data=$article_manager->get_pubmaster_all();
      
      $user_manager=new FormUserManager($DB);

      //管理部門ユーザを分けて配列に入れる
      $data2=array();
      if($data){
        foreach($data as $val){
          $users=explode(",",$val['users']);
          $users_name=array();
          if($users){
            foreach($users as $val2){
              array_push($users_name,$user_manager->get_user_bikou($val2));
            }
          }
          $val['users_name']=$users_name;
          
          $total_p=$article_manager->get_pub_count($val['id']);
          $total_m=$article_manager->get_pub_out_count($val['id'])+
                   $article_manager->get_pub_out_count_adj($val['id']);
          $val['total_amount']=$total_p-$total_m;
          $val['is_delete']=(
            $article_manager->get_pub_out_count($val['id'])+
            $article_manager->get_pub_out_count_adj($val['id'])
          )? 0 : 1;
          array_push($data2,$val);
        }
      }

      $request->setAttribute("data",$data2);
     
      $log_mgr=new FormLogManager();
      $log_mgr->setlog($user->getAttribute('user_account'),'刊行物マスター一覧');

      return VIEW_SUCCESS;
    }

    function isSecure (){
      return TRUE;
    }

    function getPrivilege (&$controller, &$request, &$user){
      return array('admin', 'sonpoform');
    }

  }
?>
