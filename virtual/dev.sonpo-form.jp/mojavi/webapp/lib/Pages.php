<?php
class Pages{

  function Pages(){
  }


  function myMakeIndex($data,&$controller, &$request, &$user){
    //index.html
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('indexpage.html');
    
    $renderer->setAttribute("data",$data);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakePage(&$controller, &$request, &$user){
    //ニュース個別ページ
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('page.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeTopicPage(&$controller, &$request, &$user){
    //協会からのお知らせ個別ページ
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('page.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeInfoPage($branch_name, $branch_file, &$controller, &$request, &$user){
    //支部活動個別ページ
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('page.html');
    
    $renderer->setAttribute("data",$user->getAttribute("data"));
    $renderer->setAttribute("branch_name",$branch_name);
    $renderer->setAttribute("branch_file",$branch_file);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeListPage($years,$year,$data,&$controller, &$request, &$user){
    //ニュースリリースのリスト
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('list.html');
    
    $renderer->setAttribute("data",$data);
    $renderer->setAttribute("year",$year);
    $renderer->setAttribute("years",$years);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeNewinfoPage($years,$year,$data,&$controller, &$request, &$user){
    //最新情報のリスト
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('newinfolist.html');
    
    $renderer->setAttribute("data",$data);
    $renderer->setAttribute("year",$year);
    $renderer->setAttribute("years",$years);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeEnNewsPage(&$controller, &$request, &$user){
    //ニュース個別ページ
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('page.html');
    
    $data=$user->getAttribute("data");
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
    $data["open_date_en"] = $month_en[$data['open_month']].' '.($data['open_day']*1).', '.$data['open_year'];
    
    $renderer->setAttribute("data",$data);

    $renderer->setMode(RENDER_VAR);
    $body=$renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeTopLists($alldata, $params, &$controller, &$request, &$user){
    // data:all pr nr in ni(new_info) rss
    
    $types = array('all','pr','nr','in','pz','br');
    
    foreach($types as $t){
      $data=$alldata[$t];
      if($data){
        $renderer=new CustomSmartyRenderer($controller, $request, $user);
    
        $renderer->setTemplate('../../MakeFiles/templates/top_list.html');
        $renderer->setAttribute("data",$data);
        $renderer->setAttribute("branch_file",$params["branch_file"]);
        $renderer->setAttribute("branch_sname",$params["branch_sname"]);
        if($t=='br'){
          $renderer->setAttribute("is_branch",1);
        }else{
          $renderer->setAttribute("is_branch",0);
        }
        $renderer->setMode(RENDER_VAR);
        $body[$t] = $renderer->fetchResult($controller, $request, $user);
      }else{
        $body[$t] = '';
      }
    }
    
    $data=$alldata['rss'];
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('../../MakeFiles/templates/rss.xml');
    $renderer->setAttribute("site_url",SONPO_SITE_URL);
    $renderer->setAttribute("this_time",time());
    $renderer->setAttribute("data",$data);
    $renderer->setAttribute("branch_file",$params["branch_file"]);
    $renderer->setMode(RENDER_VAR);
    $body['rss'] = $renderer->fetchResult($controller, $request, $user);

    $data=$alldata['region_rss'];
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('../../MakeFiles/templates/rss.xml');
    $renderer->setAttribute("site_url",SONPO_SITE_URL);
    $renderer->setAttribute("this_time",time());
    $renderer->setAttribute("data",$data);
    $renderer->setAttribute("branch_file",$params["branch_file"]);
    $renderer->setMode(RENDER_VAR);
    $body['region_rss'] = $renderer->fetchResult($controller, $request, $user);


    $data=$alldata['ni'];
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('../../MakeFiles/templates/new_info.html');
    $renderer->setAttribute("data",$data);
    $renderer->setAttribute("script_path",SCRIPT_PATH);
    $renderer->setAttribute("branch_file",$params["branch_file"]);
    $renderer->setAttribute("branch_sname",$params["branch_sname"]);
    $renderer->setAttribute("include_base",'../../../../../html');
    $renderer->setMode(RENDER_VAR);
    $body['ni'] = $renderer->fetchResult($controller, $request, $user);
    
    return $body;
  }
  
  function myMakeEnTopLists($alldata, &$controller, &$request, &$user){
    // data:all pr nr in ni(new_info) rss
    
    $data=$alldata['top'];
    if($data){
      $renderer=new CustomSmartyRenderer($controller, $request, $user);
      $renderer->setTemplate('../../MakeFiles/templates/en_top_list.html');
      $renderer->setAttribute("data",$data);
      $renderer->setMode(RENDER_VAR);
      $body['top'] = $renderer->fetchResult($controller, $request, $user);
    }else{
      $body['top'] = array();
    }
    
    $data=$alldata['rss'];
    $renderer=new CustomSmartyRenderer($controller, $request, $user);
    $renderer->setTemplate('../../MakeFiles/templates/en_rss.xml');
    $renderer->setAttribute("data",$data);
    $renderer->setMode(RENDER_VAR);
    $body['rss'] = $renderer->fetchResult($controller, $request, $user);

    return $body;

  }
  
  function mySaveFile($page,$filename){
    $fh=fopen($filename,"w");
    fwrite($fh,mb_convert_encoding($page,"SJIS","EUC-JP")."\n");
    fclose($fh);
  }

}
?>
