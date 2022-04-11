<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'TopMessageManager.php');
require_once(LIB_DIR.'ArticleManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

class IndexAction extends DBAction {

  function getDefaultView(&$controller, &$request, &$user){
    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');

    if(!$request->getErrors()){
      $user->setAttribute("data",'');
    }

    $article_manager=new ArticleManager($DB);
    
    $tmp = $article_manager->get_topmessages();
    $articles = array();
    if($tmp){
      foreach($tmp as $val){
        if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
          $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
          $val["is_time_over"]=1;
        }
        array_push($articles,$val);
      }
    }
    $request->setAttribute('articles',$articles);

    if(!$request->getErrors()){

      $msg_manager= new TopMessageManager($DB);
      $alldata=$msg_manager->get_all();
      $i = 1;
      foreach($alldata as $val){
        if($val['id']<6){
          $data['id_'.$i]         = $val['id'];
          $data['sort_num_'.$i]   = $val['sort_num'];
          $data['is_visible_'.$i] = $val['is_visible'];
          $data['message_'.$i]    = $val['message'];
          $data['link_url_'.$i]   = $val['link_url'];
          $data['target_'.$i]     = $val['target'];
          $data['open_year_'.$i]  = $val['open_year'];
          $data['open_month_'.$i] = $val['open_month'];
          $data['open_day_'.$i]   = $val['open_day'];
          $data['open_hour_'.$i]  = $val['open_hour'];
          $data['is_reserve_'.$i] = (mktime($val['open_hour'],0,0,$val['open_month'],$val['open_day'],$val['open_year'])-time()>0)? 1 : 0;
          $i++;
        }else{
          $data['id_6']         = $val['id'];
          $data['sort_num_6']   = $val['sort_num'];
          $data['is_visible_6'] = $val['is_visible'];
          $data['message_6']    = $val['message'];
          $data['link_url_6']   = $val['link_url'];
          $data['target_6']     = $val['target'];
          $data['open_year_6']  = $val['open_year'];
          $data['open_month_6'] = $val['open_month'];
          $data['open_day_6']   = $val['open_day'];
          $data['open_hour_6']  = $val['open_hour'];
          $data['is_reserve_6'] = (mktime($val['open_hour'],0,0,$val['open_month'],$val['open_day'],$val['open_year'])-time()>0)? 1 : 0;
        }
      }
      
      if(!$data){
        $controller->redirect("/manage/index.php");
        return VIEW_NONE;
      }

      $user->setAttribute("data",$data);

    }

    return VIEW_INPUT;
  }

  function execute(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');
    
    $data=$user->getAttribute("data");
    
    switch ($request->getParameter("mode")){
    
      case "rewrite":

      $request->setAttribute("data",$data);

      return VIEW_INPUT;

      case "submit":
      
      $msg_manager=new TopMessageManager($DB);
      
      for($i=1;$i<7;$i++){
        $updata = array(
          'id'         => $data['id_'.$i],
          'sort_num'   => $data['sort_num_'.$i],
          'is_visible' => $data['is_visible_'.$i],
          'message'    => $data['message_'.$i],
          'link_url'   => $data['link_url_'.$i],
          'target'     => $data['target_'.$i],
          'open_year'  => $data['open_year_'.$i],
          'open_month' => $data['open_month_'.$i],
          'open_day'   => $data['open_day_'.$i],
          'open_hour'  => $data['open_hour_'.$i]
        );
        $msg_manager->update($updata,$i);
      }
      
      $article_manager=new ArticleManager($DB);

      $ids   = $_POST['show_scroll_id'];
      $flags = $_POST['show_scroll'];
      if($ids){
        foreach($ids as $val){
          if(!in_array($val,$flags)){
            $article_manager->update_show_scroll($val,0);
          }
        }
      }

      $user->setAttribute("data","");

      $controller->redirect("/manage/index.php/module/ManageTopmessage");
      return VIEW_NONE;
    }
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
    
    for($i=1;$i<6;$i++){
      if(
        $data['message_'.$i]==''  &&
        $data['is_visible_'.$i]==1
      ){
        $data['is_visible_'.$i]=0;
      }
    }

    if($data["mode"]=="submit"){
      $user->setAttribute(
        "data",
        $data
      );
    }
    
/*
    if(mb_strlen($data['message_1'],'EUC-JP')>34){
      $validatorManager->setRequired(
        "invalid_strlen", 
        true, 
        "テキスト1の長さが長過ぎます。"
      );
    }
    if(mb_strlen($data['message_2'],'EUC-JP')>34){
      $validatorManager->setRequired(
        "invalid_strlen", 
        true, 
        "テキスト2の長さが長過ぎます。"
      );
    }
    if(mb_strlen($data['message_3'],'EUC-JP')>34){
      $validatorManager->setRequired(
        "invalid_strlen", 
        true, 
        "テキスト3の長さが長過ぎます。"
      );
    }
    if(mb_strlen($data['message_4'],'EUC-JP')>34){
      $validatorManager->setRequired(
        "invalid_strlen", 
        true, 
        "テキスト4の長さが長過ぎます。"
      );
    }
    if(mb_strlen($data['message_5'],'EUC-JP')>34){
      $validatorManager->setRequired(
        "invalid_strlen", 
        true, 
        "テキスト5の長さが長過ぎます。"
      );
    }
*/

  }

  function handleError (&$controller, &$request, &$user){
    return $this->getDefaultView($controller,$request,$user);
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpocms');
  }

}

?>
