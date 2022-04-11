<?php
require_once(ADODB_DIR . 'adodb.inc.php');
require_once(LIB_DIR.'FormLogManager.php');

class DBAction extends Action{
  function initialize(&$controller,&$request,&$user){
    if(!$request->hasAttribute('initialized')) {
      $GLOBALS["ADODB_CACHE_DIR"]=ADODB_CACHE_DIR;

      $DB=NewADOConnection(SQL_TYPE);
      $DB->debug=ADODB_DEBUG;
      $DB->cacheSecs=ADODB_CACHE_SECS;
      $ok=$DB->Connect(SQL_SERVER,SQL_USER,SQL_PASSWORD,SQL_DATABASE);

      if(!$ok){
        print 'データベースに接続できませんでした。';
        return FALSE;
      }
      
      $DB->execute("SET NAMES ujis");

      $request->setAttribute('db',$DB);

      $request->setAttribute('initialized',TRUE);
    }
    return TRUE;
  }

  function _make_top_lists(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    $tabs = array('','pr','nr','in','pz','br');
    
    $alldata = array();
    
    // top list
    foreach($tabs as $tab){
      $tmp=$article_manager->get_top_list($tab);
      
      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if($tab){

            if($tab=='pz'){
              if(
                time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
                mktime(0,0,0,$val['open_month'],$val['open_day'],$val['open_year']) >= mktime(0,0,0,date("m")-1,1,date("Y")) &&
                count($data)<6
              ){
                $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
                $val["is_time_over"]=1;
                array_push($data,$val);
              }
            }else{
              if(
                time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
                count($data)<6
              ){
                $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
                $val["is_time_over"]=1;
                array_push($data,$val);
              }
            }
          }else{
            if(
              time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
              $val["link_top"] &&
              count($data)<6
            ){
              $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
              $val["is_time_over"]=1;
              array_push($data,$val);
            }
          }
        }
      }
      $tab = ($tab)? $tab : 'all';
      $alldata[$tab] = $data;
    }
    
    //rss
    $tmp=$article_manager->get_top_list("",1);
    $data=array();
    if($tmp){
      foreach($tmp as $val){
        if(
            time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
          count($data)<10
        ){
          $val["is_time_over"]=1;
          array_push($data,$val);
        }
      }
    }
    $alldata['rss'] = $data;

    //region rss
    $tmp=$article_manager->get_top_list('br',1);
    $data=array();
    if($tmp){
      foreach($tmp as $val){
        if(
            time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
          count($data)<10
        ){
          $val["is_time_over"]=1;
          array_push($data,$val);
        }
      }
    }
    $alldata['region_rss'] = $data;

    //new_info
    $tmp=$article_manager->get_all_new_list();
    $years=$article_manager->get_open_all_list_years();
    
    $data=array();
    if($tmp){
      foreach($tmp as $val){
        if(
          time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
          count($data)<51
        ){
          $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
          $val["is_time_over"]=1;
          array_push($data,$val);
        }
      }
    }

    $alldata['ni'] = $data;

    $params["branch_file"] = $branch_file;
    $params["branch_sname"] = $branch_sname;
    
    $pages=new Pages;
    
    //$body = $pages->myMakeTopLists($alldata, $params, &$controller, &$request, &$user);
    $body = $pages->myMakeTopLists($alldata, $params, $controller, $request, $user);
    
    // save
    foreach($tabs as $tab){
      $tab = ($tab)? $tab : 'all';
      $pages->mySaveFile(
        $body[$tab],
        SONPO_TOP_FILE_DIR.'top_'.$tab.'.html'
      );
    }

    $pages->mySaveFile(
      $body['rss'],
      SONPO_RSS_FILE_DIR.'rss.xml'
    );

    $pages->mySaveFile(
      $body['region_rss'],
      SONPO_RSS_FILE_DIR.'region/rss.xml'
    );

    $pages->mySaveFile(
      $body['ni'],
      SONPO_NEWS_FILE_DIR.'list/new_info.html'
    );
  }
  
  function _make_en_top_lists(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    $tmp=$article_manager->get_en_top_list();
      
    $data=array();
    if($tmp){
      foreach($tmp as $val){
        if(
          time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
          count($data)<13
        ){
          $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
          $val["is_time_over"]=1;
          $val["open_date"]=mktime(
            0,0,0,
            $val["open_month"],
            $val["open_day"],
            $val["open_year"]
          );
          array_push($data,$val);
        }
      }
    }
    $alldata['top'] = $data;

    //rss
    $tmp=$article_manager->get_en_top_list();
    $data=array();
    if($tmp){
      foreach($tmp as $val){
        if(
            time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0 &&
          count($data)<10
        ){
          $val["is_time_over"]=1;
          array_push($data,$val);
        }
      }
    }
    $alldata['rss'] = $data;

    $pages=new Pages;
    
    //$body = $pages->myMakeEnTopLists($alldata, &$controller, &$request, &$user);
    $body = $pages->myMakeEnTopLists($alldata, $controller, $request, $user);
    
    // save
    $pages->mySaveFile(
      $body['top'],
      SONPO_EN_NEWS_FILE_DIR.'list/top.html'
    );

    $pages->mySaveFile(
      $body['rss'],
      SONPO_EN_RSS_FILE_DIR.'rss.xml'
    );

  }
  
  function _make_all_branch_lists(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    // 年リストを取ってくる
    $years=$article_manager->get_open_info_list_years();

    $pages=new Pages;

    foreach($years as $key=>$val){
      $tmp=$article_manager->get_info_list_by_year($key);
      if($tmp){

        $data=array();
        if($tmp){
          foreach($tmp as $val){
            if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
              $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
              $val["is_time_over"]=1;
            }
            array_push($data,$val);
          }
        }

        $renderer= new CustomSmartyRenderer($controller, $request, $user);
        $renderer->setTemplate('news_region_list.html');
    
        $renderer->setAttribute("data",$data);
        $renderer->setAttribute("years",$years);
        $renderer->setAttribute("year",$key);

        $renderer->setAttribute("branch_id",$user->getAttribute("branch_id"));
        $renderer->setAttribute("branch_name",$branch[$user->getAttribute("branch_id")]);
        $renderer->setAttribute("branch_file",$branch_file);
        $renderer->setAttribute("branch_sname",$branch_sname);
      
        $renderer->setAttribute("script_path",SCRIPT_PATH);
      
        $renderer->setAttribute("include_base",'../../../../../html');
      
        $renderer->setMode(RENDER_VAR);
        $body=$renderer->fetchResult($controller, $request, $user);

        $pages->mySaveFile(
          $body,
          SONPO_REGION_NEWS_FILE_DIR."list/".sprintf("%04d",$key).'.html'
        );

      }
    }
    return;
  }

}
?>
