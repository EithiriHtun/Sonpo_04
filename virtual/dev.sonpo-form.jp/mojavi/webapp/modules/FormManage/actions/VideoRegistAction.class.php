<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'VideoManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class VideoRegistAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');

    if(
      $user->getAttribute("is_master")  ==1 ||
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

        $categories=array();
        if($id){
          $article_manager= new VideoManager($DB);
          $data=$article_manager->get_one($id);
          
          if($data['rent_date']){
            $data['rent_year'] =date("Y",strtotime($data['rent_date']));
            $data['rent_month']=date("m",strtotime($data['rent_date']));
            $data['rent_day']  =date("d",strtotime($data['rent_date']));
          }
          
          if($data['back_date']){
            $data['back_year'] =date("Y",strtotime($data['back_date']));
            $data['back_month']=date("m",strtotime($data['back_date']));
            $data['back_day']  =date("d",strtotime($data['back_date']));
          }
          
          if(!$data){
            $controller->redirect(SCRIPT_PATH);
            return VIEW_NONE;
          }
          
        }
        $user->setAttribute("data",$data);

      }

      return VIEW_INPUT;

    }else{
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }

  }

  function execute(&$controller, &$request, &$user){

    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    $id=$user->getAttribute("id");
    
      
    $article_manager=new VideoManager($DB);
    
    if($data["status"]==0){
      if(
        $data["rent_year"] && $data["rent_month"] && $data["rent_day"]
      ){
        $data["status"]=2;
        $data["rent_date"]=date(
          "Y-m-d H:i:s",
          mktime(0,0,0,$data["rent_month"],$data["rent_day"],$data["rent_year"])
        );
      }
    }
    if($data["status"]==2){
      $data["rent_date"]=date(
        "Y-m-d H:i:s",
        mktime(0,0,0,$data["rent_month"],$data["rent_day"],$data["rent_year"])
      );
      if(
        $data["back_year"] && $data["back_month"] && $data["back_day"]
      ){
        $data["status"]=3;
        $data["back_date"]=date(
          "Y-m-d H:i:s",
          mktime(0,0,0,$data["back_month"],$data["back_day"],$data["back_year"])
        );
      }
      if(
        !$data["rent_year"] || !$data["rent_month"] || !$data["rent_day"]
      ){
        $data["status"]=0;
        $data["rent_date"]=NULL;
        $data["back_date"]=NULL;
      }
    }
    if($data["status"]==3){
      $data["rent_date"]=date(
        "Y-m-d H:i:s",
        mktime(0,0,0,$data["rent_month"],$data["rent_day"],$data["rent_year"])
      );
      $data["back_date"]=date(
        "Y-m-d H:i:s",
        mktime(0,0,0,$data["back_month"],$data["back_day"],$data["back_year"])
      );
      if(
        !$data["rent_year"] || !$data["rent_month"] || !$data["rent_day"]
      ){
        $data["status"]=0;
        $data["rent_date"]=NULL;
        $data["back_date"]=NULL;
      }elseif(
        !$data["back_year"] || !$data["back_month"] || !$data["back_day"]
      ){
        $data["status"]=2;
        $data["back_date"]=NULL;
      }
    }
      
/*
      if($data["status"]==0){
        if(
          $data["rent_date"]
        ){
          $data["rent_date"]='';
        }
        if(
          $data["back_date"]
        ){
          $data["back_date"]='';
        }
      }
      if($data["status"]==2){
        if(
          !$data["rent_date"] ||
          $data["rent_date"]=="0000-00-00 00:00:00"
        ){
          $data["rent_date"]=date("Y-m-d H:i:s");
        }
      }
      if($data["status"]==3){
        if(
          !$data["back_date"] ||
          $data["back_date"]=="0000-00-00 00:00:00"
        ){
          $data["back_date"]=date("Y-m-d H:i:s");
        }
      }
*/
      
    if($id){
      $article_manager->update($data,$id);
    }
      
    $request->setAttribute("popmsg","データを更新しました。");
      
    $user->setAttribute("data",$data);

    return VIEW_INPUT;
  }

  function getRequestMethods(){
    return REQ_POST;
  }
  
  function validate (&$controller, &$request, &$user){
    return TRUE;
  }
  
  function registerValidators(&$validatorManager, &$controller, &$request, &$user) {
//    require($controller->getModuleDir()."config/config.php");
    $DB=$request->getAttribute('db');
    
    $data=$request->getParameters();
    
//    $article_manager=new ArticleManager($DB);

    $data_in_session=$user->getAttribute("data");
    $user->setAttribute(
      "data",
      array_merge($data_in_session,$data)
    );

    if(@$data["rent_month"] || @$data["rent_day"] || @$data["rent_year"]){
      if(!checkdate($data["rent_month"]*1,$data["rent_day"]*1,$data["rent_year"]*1)){
        $validatorManager->setRequired(
          "invalid_rentdate", 
          true, 
          "発送日が正しくありません。"
        );
      }
    }

    if(@$data["back_month"] || @$data["back_day"] || @$data["back_year"]){
      if(!checkdate($data["rent_month"]*1,$data["rent_day"]*1,$data["rent_year"]*1)){
        $validatorManager->setRequired(
          "invalid_backdate", 
          true, 
          "発送日が正しく入力されていません。"
        );
      }elseif(!checkdate($data["back_month"]*1,$data["back_day"]*1,$data["back_year"]*1)){
        $validatorManager->setRequired(
          "invalid_backdate", 
          true, 
          "返却日が正しくありません。"
        );
      }elseif(
        mktime(0,0,0,$data["back_month"],$data["back_day"],$data["back_year"]) <
        mktime(0,0,0,$data["rent_month"],$data["rent_day"],$data["rent_year"])
      ){
        $validatorManager->setRequired(
          "invalid_backdate", 
          true, 
          "発送日、返却日の指定が正しくありません。"
        );
      }
    }

/*
    if($data["mode"]=="preview"){
    
      $data_in_session=$user->getAttribute("data");
      //チェックボックスの初期化
      //$data_in_session["is_jp"]        =0;
      //$data_in_session["is_style"]     =0;
      //$data_in_session["is_en"]        =0;
      //$data_in_session["show_contents"]=0;
      //$data_in_session["show_logo"]    =0;
      //$data_in_session["show_contact"] =0;

      $user->setAttribute(
        "data",
        array_merge($data_in_session,$data)
      );

      $validatorManager->setRequired(
        "list_title", 
        true, 
        "タイトル（一覧用）が入力されていません。"
      );

      if(!checkdate($data["open_month"],$data["open_day"],$data["open_year"])){
        $validatorManager->setRequired(
          "invalid_date", 
          true, 
          "予約日時が正しくありません。"
        );
      }

      if($data["open_hour"]<0 || $data["open_hour"]>23){
        $validatorManager->setRequired(
          "invalid_hour", 
          true, 
          "予約時刻が正しくありません。"
        );
      }
*/

/*
      $validatorManager->setRequired(
        "date_live", 
        true, 
        "日付（表示用）が入力されていません。"
      );
      $validatorManager->setRequired(
        "date_show", 
        true, 
        "日付（カレンダー用）が入力されていません。"
      );
      $live_manager= new LiveManager($DB);
      $dates=$live_manager->getDateArray($data["date_show"]);
      if(!count($dates)){
        $validatorManager->setRequired(
          "invalid_date_show", 
          true, 
          "日付（カレンダー用）が正しく入力されていません。"
        );
      }
*/

//    }

  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpoform');
  }

}

?>
