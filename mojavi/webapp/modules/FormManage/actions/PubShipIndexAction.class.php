<?php
require_once(LIB_DIR.'DBAction.class.php');
require_once(LIB_DIR.'PubManager.php');

  class PubShipIndexAction extends DBAction{

    function getDefaultView (&$controller, &$request, &$user){
      require($controller->getModuleDir()."config/config.php");
      $DB=$request->getAttribute('db');

      if(
        $user->getAttribute("is_master")  ==1 || 
        $user->getAttribute("is_master2") ==1 || 
        $user->getAttribute("is_sassi")   ==1 || 
        $user->getAttribute("is_shipping")==1
      ){

        $article_manager=new PubManager($DB);

        $order_page=$user->getAttribute('ship_page');

        $date_y = date("Y");
        if(date("n")>=1 && date("n")<=3){
          $date_y = $date_y - 1;
        }
        $order_page['out_year']=isset($order_page['out_year']) ? $order_page['out_year'] : $date_y;
        $data=$article_manager->get_ship_list(
          isset($order_page['out_year']) ? $order_page['out_year'] : 99,
          isset($order_page['out_month']) ? $order_page['out_month'] : 99,
          isset($order_page['order_type']) ? $order_page['order_type'] : 99,
          isset($order_page['book_id']) ? $order_page['book_id'] : 0,
          isset($order_page['bill_user']) ? $order_page['bill_user'] : 0
        );
        $user->setAttribute("ship_page",$order_page);
        
        $data2=array();
        if($data){
          foreach($data as $val){
            $books=$article_manager->get_one_order_item_w_user(
              $val['id'],
              ($user->getAttribute("is_sassi"))? 
                $user->getAttribute("user_id") 
              : 
                0
            );
            if($books){
              $all_book_price=0;
              foreach($books as $val2){
                if($val['type']==3 || $val['type']==4){
                  $all_book_price=0;
                }else{
                  $all_book_price+=$val2['price']*$val2['amount'];
                }
              }
              $book_count=1;
              foreach($books as $val2){
                $val['book_name']=$val2['name'];
                $val['amount']=$val2['amount'];
                if($val['type']==3 || $val['type']==4){
                  $val['price']=0;
                  // $val['trans_price']=0;
                }else{
                  $val['price']=$val2['price']*$val2['amount'];
                }
//                $val['total_price']=$val['amount']*$val['price'];
                $val['total_price']=$all_book_price + $val['trans_price'];

                if(@$order_page['book_id']){
                  if($order_page['book_id']==$val2['pub_id']){
                    $val['rows']=1;
                    array_push($data2,$val);
                  }
                }else{
                  if($book_count==1){
                    $val['rows']=count($books);
                  }else{
                    $val['rows']=0;
                  }
                  array_push($data2,$val);
                  $book_count++;
                }

              }
            }
          }
        }
        
        $request->setAttribute("data",$data2);
        
        $books=$article_manager->get_pubmaster_all_w_user(
          ($user->getAttribute("is_sassi"))? 
            $user->getAttribute("user_id") 
          : 
            0
        );
        $request->setAttribute("books",$books);

        $log_mgr=new FormLogManager();
        $log_mgr->setlog($user->getAttribute('user_account'),'????????????');
        
        $users=$article_manager->get_sassi_distinct_sections();
        foreach($users as $val){
          $sassi_users[$val['id']] = $val['bikou'];
        }
        $request->setAttribute('sassi_users',$sassi_users);

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

      if(
        $user->getAttribute("is_master")  ==1 || 
        $user->getAttribute("is_master2") ==1 || 
        $user->getAttribute("is_sassi")   ==1 || 
        $user->getAttribute("is_shipping")==1
      ){

        $article_manager=new PubManager($DB);

        $order_page=$user->getAttribute('ship_page');
        $date_y = date("Y");
        if(date("n")>=1 && date("n")<=3){
          $date_y = $date_y - 1;
        }
        $order_page['out_year']=isset($order_page['out_year']) ? $order_page['out_year'] : $date_y;
        $data=$article_manager->get_ship_list(
          isset($order_page['out_year']) ? $order_page['out_year'] : 99,
          isset($order_page['out_month']) ? $order_page['out_month'] : 99,
          isset($order_page['order_type']) ? $order_page['order_type'] : 99,
          isset($order_page['book_id']) ? $order_page['book_id'] : 0,
          isset($order_page['bill_user']) ? $order_page['bill_user'] : 0
        );
        
        $data2=array();
        if($data){
          foreach($data as $val){
            $books=$article_manager->get_one_order_item_w_user(
              $val['id'],
              ($user->getAttribute("is_sassi"))? 
                $user->getAttribute("user_id") 
              : 
                0
            );
            if($books){
              $all_book_price=0;
              foreach($books as $val2){
                if($val['type']==3 || $val['type']==4){
                  $all_book_price=0;
                }else{
                  $all_book_price+=$val2['price']*$val2['amount'];
                }
              }
              $book_count=1;
              foreach($books as $val2){
                $val['book_name']=$val2['name'];
                $val['amount']=$val2['amount'];
                if($val['type']==3 || $val['type']==4){
                  $val['price']=0;
                  // $val['trans_price']=0;
                }else{
                  $val['price']=$val2['price']*$val2['amount'];
                }
//                $val['total_price']=$val['amount']*$val['price'];
                $val['total_price']=$all_book_price + $val['trans_price'];

                if($order_page['book_id']){
                  if($order_page['book_id']==$val2['pub_id']){
                    $val['rows']=1;
                    array_push($data2,$val);
                  }
                }else{
                  if($book_count==1){
                    $val['rows']=count($books);
                  }else{
                    $val['rows']=0;
                  }
                  array_push($data2,$val);
                  $book_count++;
                }

              }
            }
          }
        }
        
        $request->setAttribute("data",$data2);

        $books=$article_manager->get_pubmaster_all_w_user(
          ($user->getAttribute("is_sassi"))? 
            $user->getAttribute("user_id") 
          : 
            0
        );
        $request->setAttribute('books',$books);
        
        $users=$article_manager->get_sassi_distinct_sections();
        foreach($users as $val){
          $sassi_users[$val['id']] = $val['bikou'];
        }
        $request->setAttribute('sassi_users',$sassi_users);

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
      
      $data_in_session=$user->getAttribute("ship_page");
      $user->setAttribute(
        "ship_page",
        array_merge($data_in_session,$data)
      );
    
      if(
        $data['order_type']<>99 && 
        !isset($pub_order_type[$data['order_type']])
      ){
        $validatorManager->setRequired(
          "invalid_type", 
          true, 
          "????????????????????????"
        );
      }

      if(
        $data['out_year']<>99 && 
        ($data['out_year']<2009 || $data['out_year']>date("Y")+1)
      ){
        $validatorManager->setRequired(
          "invalid_year", 
          true, 
          "??????????????????????????"
        );
      }
      if(
        $data['out_month']<>99 && 
        ($data['out_month']<1 || $data['out_month']>12)
      ){
        $validatorManager->setRequired(
          "invalid_month", 
          true, 
          "??????????????????????????"
        );
      }
      if(
        ($data['out_month']>=1 && $data['out_month']<=12) &&
        (!$data['out_year'] || $data['out_year']<2009)
      ){
        $validatorManager->setRequired(
          "invalid_month", 
          true, 
          "??????????????????????????"
        );
      }
      
      if(
        !preg_match("/^\d*$/",$data['bill_user'])
      ){
        $validatorManager->setRequired(
          "invalid_bill_user", 
          true, 
          "??????????????????????????????????"
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
