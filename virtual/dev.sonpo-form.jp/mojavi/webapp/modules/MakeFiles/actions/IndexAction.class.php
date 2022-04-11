<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');
require_once(LIB_DIR.'Pages.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class IndexAction extends DBAction {

  function execute(&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');
    
    $article_manager=new ArticleManager($DB);

    //予約時刻の入ったデータを取ってくる
    $data_all = $article_manager->get_reserved_articles();
    
    if($data_all){
    
      foreach($data_all as $data){
        if(strtotime($data["upload_reserve_datetime"])<=time()){

          $id = $data["id"];

          if($data["category"]==1){
            $page=$this->myMakePage($data, &$controller, &$request, &$user);

            $this->mySaveFile(
              $page,
              SONPO_NEWS_FILE_DIR.$data["open_year"]."/".$article_manager->get_filename($id).'.html'
            );
            $article_manager->update_file_date($id);
            
            if(
              $data["upload_filename"] && 
              $data["upload_filename"]<>$data["open_year"]."/".$article_manager->get_filename($id)
            ){
              unlink(SONPO_NEWS_FILE_DIR.$data["upload_filename"].'.html');
            }

            $article_manager->update_upload_filename(
              $id,
              $data["open_year"]."/".$article_manager->get_filename($id)
            );
          
            $article_manager->update_upload_reserve_datetime(
              $id,
              NULL
            );
            
            $this->_make_news_lists(&$controller, &$request, &$user);
            $this->_make_top_lists(&$controller, &$request, &$user);

          }elseif($data["category"]==3){
            //ファイル作成
            $page=$this->myMakeInfoPage(
              $data,
              $branch[$data["branch"]], 
              $branch_file[$data["branch"]], 
              &$controller, &$request, &$user
            );

            $this->mySaveFile(
              $page,
              SONPO_BRANCH_FILE_DIR.$branch_file[$data["branch"]]."/".$article_manager->get_filename($id).'.html'
            );
            $article_manager->update_file_date($id);

            $article_manager->update_upload_reserve_datetime(
              $id,
              NULL
            );

            $this->_make_branch_lists($data['branch'], &$controller, &$request, &$user);
            $this->_make_top_lists(&$controller, &$request, &$user);

          }elseif($data["category"]==4){

            //ファイル作成
            $page=$this->myMakeTopicPage($data, &$controller, &$request, &$user);
            $this->mySaveFile(
              $page,
              SONPO_TOPIC_FILE_DIR.$data["open_year"]."/".$article_manager->get_filename($id).'.html'
            );
            $article_manager->update_file_date($id);
            
            if(
              $data["upload_filename"] && 
              $data["upload_filename"]<>$data["open_year"]."/".$article_manager->get_filename($id)
            ){
              unlink(SONPO_TOPIC_FILE_DIR.$data["upload_filename"].'.html');
            }

            $article_manager->update_upload_filename(
              $id,
              $data["open_year"]."/".$article_manager->get_filename($id)
            );

            $article_manager->update_upload_reserve_datetime(
              $id,
              NULL
            );

            $this->_make_topic_lists(&$controller, &$request, &$user);
            $this->_make_top_lists(&$controller, &$request, &$user);

          }elseif($data["category"]==5){

            //ファイル作成
            $page=$this->myMakeEnNewsPage($data, &$controller, &$request, &$user);
            $this->mySaveFile(
              $page,
              SONPO_EN_NEWS_FILE_DIR.$data["open_year"]."/".$article_manager->get_filename($id).'.html'
            );
            $article_manager->update_file_date($id);
            
            if(
              $data["upload_filename"] && 
              $data["upload_filename"]<>$data["open_year"]."/".$article_manager->get_filename($id)
            ){
              unlink(SONPO_EN_NEWS_FILE_DIR.$data["upload_filename"].'.html');
            }

            $article_manager->update_upload_filename(
              $id,
              $data["open_year"]."/".$article_manager->get_filename($id)
            );

            $article_manager->update_upload_reserve_datetime(
              $id,
              NULL
            );

            $this->_make_en_news_lists(&$controller, &$request, &$user);
            $this->_make_en_top_lists(&$controller, &$request, &$user);

          }elseif($data["category"]==6){

            //ファイル作成
            $page=$this->myMakeEnStatePage($data, &$controller, &$request, &$user);
            $this->mySaveFile(
              $page,
              SONPO_EN_STATE_FILE_DIR.$data["open_year"]."/".$article_manager->get_filename($id).'.html'
            );
            $article_manager->update_file_date($id);
            
            if(
              $data["upload_filename"] && 
              $data["upload_filename"]<>$data["open_year"]."/".$article_manager->get_filename($id)
            ){
              unlink(SONPO_EN_STATE_FILE_DIR.$data["upload_filename"].'.html');
            }

            $article_manager->update_upload_filename(
              $id,
              $data["open_year"]."/".$article_manager->get_filename($id)
            );

            $article_manager->update_upload_reserve_datetime(
              $id,
              NULL
            );

            $this->_make_en_state_lists(&$controller, &$request, &$user);
            $this->_make_en_top_lists(&$controller, &$request, &$user);

          }elseif($data["category"]==7){

            $article_manager->update_upload_reserve_datetime(
              $id,
              NULL
            );
            
            $this->_make_en_top_lists(&$controller, &$request, &$user);

          }


        }
      }
      
    }
//    echo 'done.';
    

  }

  function myMakePage($data, &$controller, &$request, &$user){
    //ニュース個別ページ
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('news_page.html');
    
    $renderer->setAttribute("data",$data);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeTopicPage($data, &$controller, &$request, &$user){
    //協会からのお知らせ個別ページ
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('topic_page.html');
    
    $renderer->setAttribute("data",$data);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeInfoPage($data, $branch_name, $branch_file, &$controller, &$request, &$user){
    //支部活動個別ページ
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('info_page.html');
    
    $renderer->setAttribute("data",$data);
    $renderer->setAttribute("branch_name",$branch_name);
    $renderer->setAttribute("branch_file",$branch_file);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeEnNewsPage($data, &$controller, &$request, &$user){
    //ニュース個別ページ
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('en_news_page.html');
    
    $data["open_date"]=mktime(
      0,0,0,
      $data["open_month"],$data["open_day"],$data["open_year"]
    );
    
    $month_en = array(
      1  => 'Jan.',
      2  => 'Feb.',
      3  => 'March',
      4  => 'April',
      5  => 'May',
      6  => 'June',
      7  => 'July',
      8  => 'Aug.',
      9  => 'Sep.',
      10 => 'Oct.',
      11 => 'Nov.',
      12 => 'Dec.'
    );
    $data["open_date_en"] = $month_en[$data['open_month']].' '.$data['open_day']*1.', '.$data['open_year'];

    $renderer->setAttribute("data",$data);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeEnStatePage($data, &$controller, &$request, &$user){
    //ニュース個別ページ
    $renderer= new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('en_state_page.html');
    
    $data["open_date"]=mktime(
      0,0,0,
      $data["open_month"],$data["open_day"],$data["open_year"]
    );
    
    $month_en = array(
      1  => 'Jan.',
      2  => 'Feb.',
      3  => 'March',
      4  => 'April',
      5  => 'May',
      6  => 'June',
      7  => 'July',
      8  => 'Aug.',
      9  => 'Sep.',
      10 => 'Oct.',
      11 => 'Nov.',
      12 => 'Dec.'
    );
    $data["open_date_en"] = $month_en[$data['open_month']].' '.$data['open_day']*1.', '.$data['open_year'];

    $renderer->setAttribute("data",$data);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function mySaveFile($page,$filename){
    $fh=fopen($filename,"w");
    fwrite($fh,mb_convert_encoding($page,"SJIS","EUC-JP")."\n");
    fclose($fh);
  }

  function _make_news_lists(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    // 年リストを取ってくる
    $years=$article_manager->get_open_news_list_years();
    
    $pages=new Pages;

    foreach($years as $key=>$val){
      $tmp=$article_manager->get_news_list($key);
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
        $renderer->setTemplate('news_list.html');
    
        $renderer->setAttribute("data",$data);
        $renderer->setAttribute("years",$years);
        $renderer->setAttribute("year",$key);

        $renderer->setAttribute("script_path",SCRIPT_PATH);
        $renderer->setAttribute("include_base",'../../../../../html');
      
        $renderer->setMode(RENDER_VAR);
        $body=$renderer->fetchResult($controller, $request, $user);

        $pages->mySaveFile(
          $body,
          SONPO_NEWS_FILE_DIR."list/".sprintf("%04d",$key).'.html'
        );

      }
    }
    return;
  }

  function _make_branch_lists($branch_id, &$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    $pages=new Pages;

    $tmp=$article_manager->get_info_list($branch_id);
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
      $renderer->setTemplate('info_list.html');
  
      $renderer->setAttribute("data",$data);

      $renderer->setAttribute("branch_id",$branch_id);
      $renderer->setAttribute("branch_name",$branch[$branch_id]);
    
      $renderer->setAttribute("script_path",SCRIPT_PATH);
    
      $renderer->setAttribute("include_base",'../../../../../html');
    
      $renderer->setMode(RENDER_VAR);
      $body=$renderer->fetchResult($controller, $request, $user);

      $pages->mySaveFile(
        $body,
        SONPO_BRANCH_FILE_DIR.$branch_file[$branch_id]."/list.html"
      );

    }

    return;
  }

  function _make_topic_lists(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    // 年リストを取ってくる
    $years=$article_manager->get_open_topic_list_years();
    
    $pages=new Pages;

    foreach($years as $key=>$val){
      $tmp=$article_manager->get_topic_list($key);
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
        $renderer->setTemplate('topic_list.html');
    
        $renderer->setAttribute("data",$data);
        $renderer->setAttribute("years",$years);
        $renderer->setAttribute("year",$key);

        $renderer->setAttribute("script_path",SCRIPT_PATH);
        $renderer->setAttribute("include_base",'../../../../../html');
      
        $renderer->setMode(RENDER_VAR);
        $body=$renderer->fetchResult($controller, $request, $user);

        $pages->mySaveFile(
          $body,
          SONPO_TOPIC_FILE_DIR."list/".sprintf("%04d",$key).'.html'
        );

      }
    }
    return;
  }

  function _make_en_news_lists(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    // 年リストを取ってくる
    $years=$article_manager->get_open_en_news_list_years();
    
    $pages=new Pages;

    $month_en = array(
      1  => 'Jan.',
      2  => 'Feb.',
      3  => 'March',
      4  => 'April',
      5  => 'May',
      6  => 'June',
      7  => 'July',
      8  => 'Aug.',
      9  => 'Sep.',
      10 => 'Oct.',
      11 => 'Nov.',
      12 => 'Dec.'
    );

    foreach($years as $key=>$val){
      $tmp=$article_manager->get_en_news_list($key);
      if($tmp){


        $data=array();
        if($tmp){
          foreach($tmp as $val){
          if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
              $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
              $val["is_time_over"]=1;
              $val["open_date"]=mktime(
                0,0,0,
                $val["open_month"],
                $val["open_day"],
                $val["open_year"]
              );
              $val["open_date_en"] = $month_en[$val['open_month']].' '.$val['open_day']*1.', '.$val['open_year'];
            }
            array_push($data,$val);
          }
        }

        $renderer= new CustomSmartyRenderer($controller, $request, $user);
        $renderer->setTemplate('en_news_list.html');
    
        $renderer->setAttribute("data",$data);
        $renderer->setAttribute("years",$years);
        $renderer->setAttribute("year",$key);

        $renderer->setAttribute("script_path",SCRIPT_PATH);
      
        $renderer->setMode(RENDER_VAR);
        $body=$renderer->fetchResult($controller, $request, $user);

        $pages->mySaveFile(
          $body,
          SONPO_EN_NEWS_FILE_DIR."list/".sprintf("%04d",$key).'.html'
        );

      }
    }
    return;
  }

  function _make_en_state_lists(&$controller, &$request, &$user){
    $DB=$request->getAttribute('db');

    $article_manager=new ArticleManager($DB);
    
    $pages=new Pages;

    $month_en = array(
      1  => 'Jan.',
      2  => 'Feb.',
      3  => 'March',
      4  => 'April',
      5  => 'May',
      6  => 'June',
      7  => 'July',
      8  => 'Aug.',
      9  => 'Sep.',
      10 => 'Oct.',
      11 => 'Nov.',
      12 => 'Dec.'
    );

    $tmp=$article_manager->get_en_state_list();

    if($tmp){

      $data=array();
      if($tmp){
        foreach($tmp as $val){
          if(time()-mktime($val["open_hour"],0,0,$val["open_month"],$val["open_day"],$val["open_year"])>=0){
            $val["open_year2"]=substr(sprintf("%04d",$val["open_year"]),2,2);
            $val["is_time_over"]=1;
            $val["open_date"]=mktime(
              0,0,0,
              $val["open_month"],
              $val["open_day"],
              $val["open_year"]
            );
            $val["open_date_en"] = $month_en[$val['open_month']].' '.$val['open_day']*1.', '.$val['open_year'];
          }
          array_push($data,$val);
        }
      }

      $renderer= new CustomSmartyRenderer($controller, $request, $user);
      $renderer->setTemplate('en_state_list.html');
  
      $renderer->setAttribute("data",$data);

      $renderer->setAttribute("script_path",SCRIPT_PATH);
    
      $renderer->setMode(RENDER_VAR);
      $body=$renderer->fetchResult($controller, $request, $user);

      $pages->mySaveFile(
        $body,
        SONPO_EN_STATE_FILE_DIR."list/index.html"
      );

    }

    return;
  }

}

?>
