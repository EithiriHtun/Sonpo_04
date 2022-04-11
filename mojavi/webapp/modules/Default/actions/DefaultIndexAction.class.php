<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'ArticleManager.php');
require_once(LIB_DIR.'TopImageManager.php');
require_once(LIB_DIR.'TopMessageManager.php');

class DefaultIndexAction extends DBAction{
  function execute (&$controller, &$request, &$user){
    require($controller->getModuleDir()."../Default/config/config.php");

    $DB=$request->getAttribute('db');


    $types = array('all','pr','nr','in','pz');

    foreach($types as $val){
      if(file_exists(SONPO_TOP_FILE_DIR."top_".$val.'.html')){
        $list = file_get_contents(SONPO_TOP_FILE_DIR."top_".$val.'.html');
      }
      $request->setAttribute("list_".$val,mb_convert_encoding(@$list,'EUC-JP','SJIS'));
    }

    $topimage_manager = new TopImageManager($DB);
    $images = $topimage_manager->get_one(1);
    
    for($i=4;$i<12;$i++){
      $sort_num[$i]   = $images['sort_num_'.$i];
      $filedate[$i]   = $this->GetImageDate('top_'.$i,SONPO_IMAGE_DIR);
    }
    foreach($sort_num as $key=>$val){
      $sortdata[$key] = array(
        'suffix' => $val,
        'date'   => $filedate[$key],
        'id'     => $key
      );
      $suffix[$key] = $val;
      $fdate[$key] = strtotime($filedate[$key]);
    }
    
    array_multisort($suffix, SORT_ASC, $fdate, SORT_DESC, $sortdata);
    
    foreach($sortdata as $val){
      $sort_suffix[$val['id']] = $val['suffix'];
    }

    $request->setAttribute("topimage",$images);
    $request->setAttribute("sort_suffix",$sort_suffix);
    
    
    $article_manager = new ArticleManager($DB);
    $messages = $article_manager->get_topmessages();

    $topmessage_manager = new TopMessageManager($DB);
    $topmessages = $topmessage_manager->get_all();
    
    $scrolls = array();
    foreach($topmessages as $val){
      if($val['id']==6){
        if($messages){
          foreach($messages as $val2){
            if((time() - mktime($val2['open_hour'],0,0,$val2['open_month'],$val2['open_day'],$val2['open_year']))>=0){
              $prefix = '';
              if($val2['category']==1){
                $link_url = '/news/release/'.sprintf("%04d",$val2['open_year'])."/".$val2['filename'].".html";
                $prefix = 'ニュースリリース（' . substr($val2['open_year'],2,2).'.'.sprintf("%02d",$val2['open_month']).'.'.sprintf("%02d",$val2['open_day']) . '）';
              }elseif($val2['category']==3){
                $link_url = '/about/action/branch/'.$branch_file[$val2['branch']]."/".$val2['filename'].".html";
                $prefix = 'お知らせ（' . substr($val2['open_year'],2,2).'.'.sprintf("%02d",$val2['open_month']).'.'.sprintf("%02d",$val2['open_day']) . '）【'.$branch_sname[$val2['branch']].'】';
              }elseif($val2['category']==4){
                $link_url = '/news/information/'.sprintf("%04d",$val2['open_year'])."/".$val2['filename'].".html";
                $prefix = 'お知らせ（' . substr($val2['open_year'],2,2).'.'.sprintf("%02d",$val2['open_month']).'.'.sprintf("%02d",$val2['open_day']) . '）';
              }
              array_push(
                $scrolls,
                array(
                  'comment'  => $prefix . ' ' . $val2['list_title'],
                  'link_url' => $link_url,
                  'target'   => ''
                )
              );
            }
          }
        }
      }else{
        if($val['is_visible']==1){
          if((time() - strtotime($val['open_datetime']))>=0){
            array_push(
              $scrolls,
              array(
                'comment'  => $val['message'],
                'link_url' => $val['link_url'],
                'target'   => $val['target']
              )
            );
          }
        }
      }
    }

    $request->setAttribute("scrolls",$scrolls);

    return VIEW_SUCCESS;
  }
  
  function GetImageDate ($image_name, $from_dir){
    $filedate = '';

    if(
      file_exists($from_dir.$image_name.".jpg")
    ){
      $filedate = date("Y-m-d H:i:s", filemtime($from_dir.$image_name.".jpg")); 
      return $filedate;
    }elseif(
      file_exists($from_dir.$image_name.".gif")
    ){
      $filedate = date("Y-m-d H:i:s", filemtime($from_dir.$image_name.".gif")); 
      return $filedate;
    }elseif(
      file_exists($from_dir.$image_name.".png")
    ){
      $filedate = date("Y-m-d H:i:s", filemtime($from_dir.$image_name.".png")); 
      return $filedate;
    }
    return '';
  }

}
?>
