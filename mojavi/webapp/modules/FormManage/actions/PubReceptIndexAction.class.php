<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

  class PubReceptIndexAction extends DBAction{

    function getDefaultView(&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if($user->getAttribute("is_master")==1 || $user->getAttribute("is_master2")==1){

        $article_manager=new PubManager($DB);

        $recept_page=$user->getAttribute('recept_page');
//        $recept_page['rec_year']=isset($recept_page['rec_year']) ? $recept_page['rec_year'] : 99;
        $date_y = date("Y");
        if(date("n")>=1 && date("n")<=3){
          $date_y = $date_y - 1;
        }
        $recept_page['rec_year']=isset($recept_page['rec_year']) ? $recept_page['rec_year'] : $date_y;
        $recept_page['rec_month']=isset($recept_page['rec_month']) ? $recept_page['rec_month'] : 99;
        $recept_page['approve']=isset($recept_page['approve']) ? $recept_page['approve'] : 99;
        $data=$article_manager->get_recept_list(
          $recept_page['rec_year'],
          $recept_page['rec_month'],
          $recept_page['approve']
        );
        $user->setAttribute("recept_page",$recept_page);
        
        $request->setAttribute("data",$data);

        $log_mgr=new FormLogManager();
        $log_mgr->setlog($user->getAttribute('user_account'),'受付管理一覧');

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

      if($user->getAttribute("is_master")==1 || $user->getAttribute("is_master2")==1){

        if(!$request->getErrors()){
          $article_manager=new PubManager($DB);
          
          $recept_page=$user->getAttribute('recept_page');
          $recept_page['rec_year']=isset($recept_page['rec_year']) ? $recept_page['rec_year'] : 99;
          $recept_page['rec_month']=isset($recept_page['rec_month']) ? $recept_page['rec_month'] : 99;
          $recept_page['approve']=isset($recept_page['approve']) ? $recept_page['approve'] : 99;
          $data=$article_manager->get_recept_list(
            $recept_page['rec_year'],
            $recept_page['rec_month'],
            $recept_page['approve']
          );
        }
        $user->setAttribute("recept_page",$recept_page);
        
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
      
      $data_in_session=$user->getAttribute("recept_page");
      $user->setAttribute(
        "recept_page",
        array_merge($data_in_session,$data)
      );
    
      if(
        $data['approve']<>99 && 
        !isset($pub_approve[$data['approve']])
      ){
        $validatorManager->setRequired(
          "invalid_approve", 
          true, 
          "承認が正しくありません。"
        );
      }

      if(
        $data['rec_year']<>99 && 
        ($data['rec_year']<2009 || $data['rec_year']>date("Y")+1)
      ){
        $validatorManager->setRequired(
          "invalid_year", 
          true, 
          "受付日が正しくありません。"
        );
      }
      if(
        $data['rec_month']<>99 && 
        ($data['rec_month']<1 || $data['rec_month']>12)
      ){
        $validatorManager->setRequired(
          "invalid_month", 
          true, 
          "受付日が正しくありません。"
        );
      }
      if(
        ($data['rec_month']>=1 && $data['rec_month']<=12) &&
        (!$data['rec_year'] || $data['rec_year']<2009)
      ){
        $validatorManager->setRequired(
          "invalid_month", 
          true, 
          "受付日が正しくありません。"
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
