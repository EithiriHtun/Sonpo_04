<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

require_once(VALIDATOR_DIR.'StringValidator.class.php');
require_once(VALIDATOR_DIR.'RegexValidator.class.php');

require_once(LIB_DIR.'CustomSmartyRenderer.class.php');

class PubShipCsvAction extends DBAction {

  function execute(&$controller, &$request, &$user){

    require($controller->getModuleDir()."config/config.php");

    $DB=$request->getAttribute('db');
    

    if(
      $user->getAttribute("is_master")  ==1 || 
      $user->getAttribute("is_master2") ==1 || 
      $user->getAttribute("is_sassi")   ==1 || 
      $user->getAttribute("is_shipping")==1
    ){

      $pub_mgr=new PubManager($DB);

      if($request->getParameter("is_all")=="1"){
        $tmp_ids=$request->getParameter('ids');
        $ids=explode(',',$tmp_ids);
        $dl=array();
        if($ids){
          foreach($ids as $val){
            if($val){
              array_push($dl,$val);
            }
          }
        }
      }else{
        $dl=$_POST["dl"];
      }
      
      $book_id=$request->getParameter("book_id");
      
      $lines=array();
      foreach($dl as $key=>$val){
        $data2=array();

        $data  =$pub_mgr->get_one_order($val);
        $books=$pub_mgr->get_one_order_item_w_user(
          $val,
          ($user->getAttribute("is_sassi"))? 
            $user->getAttribute("user_id") 
          : 
            0
        );


        if($books){
          $all_book_price=0;
          foreach($books as $val2){
            if($data['type']==3 || $data['type']==4){
              $all_book_price=0;
            }else{
              $all_book_price+=$val2['price']*$val2['amount'];
            }
          }
          $book_count=1;
          foreach($books as $val2){
            $val3=$data;
            $val3['book_name']=$val2['name'];
            $val3['amount']=$val2['amount'];
            if($data['type']==3 || $data['type']==4){
              $val3['price']=0;
              // $val3['trans_price']=0;
            }else{
              $val3['price']=$val2['price']*$val2['amount'];
            }
            $val3['total_price']=$all_book_price + $data['trans_price'];

            if($book_id){
              if($book_id==$val2['pub_id']){
                $val3['rows']=1;
                array_push($data2,$val3);
              }
            }else{
              if($book_count==1){
                $val3['rows']=count($books);
              }else{
                $val3['rows']=0;
              }
              array_push($data2,$val3);
              $book_count++;
            }

          }
        }


        if($data2){
          foreach($data2 as $val){
            array_push($lines,$this->myEscapeCsv($val));
          }
        }
      }
      
      $user_renderer=new CustomSmartyRenderer($controller, $request, $user);
      $user_renderer->setAttribute('data', $lines);
      $user_renderer->setAttribute('prefs', $prefs);

      $user_renderer->setAttribute('pub_order_type', $pub_order_type);
      $user_renderer->setAttribute('trans_status', $pub_trans_status);
      $user_renderer->setAttribute('settle_status', $pub_settle_status);

      $user_renderer->setTemplate('csv/pubshipcsv.txt');

      $user_renderer->setMode(RENDER_VAR);
      $user_body=$user_renderer->fetchResult($controller, $request, $user);
      
      header("Cache-Control: private;");
      header("Pragma: no-cache;");
      header("Content-Type: application/x-csv");
      header("Content-Disposition: attachment; filename=hasso_".date("Y-m-d").".csv");
        
      print mb_convert_encoding($user_body,'SJIS','EUC-JP');

  //echo nl2br($user_body);

      return VIEW_NONE;
    }else{
      $controller->redirect(
        '/manage/forms/index.php/module/FormManage'
      );
      return VIEW_NONE;
    }
    
  }

  function isSecure (){
    return TRUE;
  }

  function getPrivilege (&$controller, &$request, &$user){
    return array('admin', 'sonpoform');
  }

  function myEscapeCsv($data){
    $data_new=array();
    
    foreach($data as $key=>$val){
      $val=preg_replace("/\x0D\x0A|\x0D|\x0A/"," ",$val);
      $val=preg_replace("/\"/","\"\"",$val);
      $data_new[$key]=$val;
    }
  
    return $data_new;
  
  }

}

?>
