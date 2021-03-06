<?php
class PubManager{

  public $DB;
  
  function PubManager($db){
    $this->DB=$db;
  }

  function get_order_list($order_type=99,$out_year=99,$out_month=99,$trans_status=99,$settle_status=99){
    
    $where=' WHERE pub_order.inst_hidden<>1 AND (pub_order.type=1 OR pub_order.type=2 OR (pub_order.type=3 AND pub_order.approve=1) OR (pub_order.type=4 AND pub_order.approve=1) OR pub_order.type=5) AND pub_order.is_delete=0 AND ';
    if($order_type<>99){
      $where.=' pub_order.type='.mysql_escape_string($order_type).' AND';
    }
    if($trans_status<>99){
      $where.=' pub_order.trans_status='.mysql_escape_string($trans_status).' AND';
    }
    if($settle_status<>99){
      $where.=' pub_order.settle_status='.mysql_escape_string($settle_status).' AND';
    }
    if($where<>''){
      $where=$where.' 1=1';
    }
    
    $sql='SELECT pub_order.*,instructor.inst_id as inst_inst_id FROM pub_order LEFT OUTER JOIN instructor ON pub_order.inst_id=instructor.id'.$where.' ORDER BY pub_order.id DESC';
    $tmp=$this->DB->GetAll($sql);

    $tmp2=array();
    if($tmp){
      if($out_year<>99){
        $stime=mktime(0,0,0,1,1,$out_year);
        $etime=mktime(0,0,0,1,1,$out_year+1);
        if($out_month<>99){
          $stime=mktime(0,0,0,$out_month,1,$out_year);
          $etime=mktime(0,0,0,$out_month+1,1,$out_year);
        }
        foreach($tmp as $val){
          if(
            $val['out_year'] &&
            mktime(0,0,0,$val['out_month'],$val['out_day'],$val['out_year'])>=$stime &&
            mktime(0,0,0,$val['out_month'],$val['out_day'],$val['out_year'])<$etime
          ){
            array_push($tmp2,$val);
          }
        }
      }else{
        $tmp2=$tmp;
      }
    }
    
    # sort
    $tmp3=array();
    $inst_ids=array();
    if($tmp2){
      foreach($tmp2 as $val){
        if(isset($val['inst_id']) && $val['inst_id']){
          # inst_idがあるとき
          if(!@$tmp3[$val['id']]){
            $is_dubed=0;
            foreach($tmp2 as $val2){
              if($val2['inst_id']==$val['inst_id']){
                $tmp3[$val2['id']]=$val2;
                if($is_dubed){
                  $tmp3[$val2['id']]['is_dub']=1;
                }
                $is_dubed=1;
              }
            }
          }
        }else{
          # ないとき
          $tmp3[$val['id']]=$val;
        }
      }
    }
    
    return $tmp3;
  }

  function get_order_list_wo_type5($order_type=99,$out_year=99,$out_month=99,$trans_status=99,$settle_status=99){
    
    $where=' WHERE pub_order.type<>5 AND pub_order.inst_hidden<>1 AND (pub_order.type=1 OR pub_order.type=2 OR (pub_order.type=3 AND pub_order.approve=1) OR (pub_order.type=4 AND pub_order.approve=1) OR pub_order.type=5) AND pub_order.is_delete=0 AND ';
    if($order_type<>99){
      $where.=' pub_order.type='.mysql_escape_string($order_type).' AND';
    }
    if($trans_status<>99){
      $where.=' pub_order.trans_status='.mysql_escape_string($trans_status).' AND';
    }
    if($settle_status<>99){
      $where.=' pub_order.settle_status='.mysql_escape_string($settle_status).' AND';
    }
/*
    if($out_year<>99){
      if($out_month<>99){
        $where.=' pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 >='.date("Ymd",mktime(0,0,0,$out_month,1,$out_year)).' AND pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 < '.date("Ymd",mktime(0,0,0,$out_month+1,1,$out_year)).' AND';
      }else{
        $where.=' pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 >='.date("Ymd",mktime(0,0,0,1,1,$out_year)).' AND pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 < '.date("Ymd",mktime(0,0,0,1,1,$out_year+1)).' AND';
      }
    }
*/    
    if($out_year<>99){
      if($out_month<>99){
        if($out_month>=1 && $out_month<=3){
          $out_year = $out_year + 1;
        }
        $where.=' (CASE WHEN pub_order.out_year IS NOT NULL THEN pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 >='.date("Ymd",mktime(0,0,0,$out_month,1,$out_year)).' AND pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 < '.date("Ymd",mktime(0,0,0,$out_month+1,1,$out_year)).' ELSE 1=1 END) AND';
      }else{
        $where.=' (CASE WHEN pub_order.out_year IS NOT NULL THEN pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 >='.date("Ymd",mktime(0,0,0,4,1,$out_year)).' AND pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 < '.date("Ymd",mktime(0,0,0,4,1,$out_year+1)).' ELSE 1=1 END) AND';
      }
    }
    
    if($where<>''){
      $where=$where.' 1=1';
    }
    
    $sql='SELECT pub_order.*,instructor.inst_id as inst_inst_id FROM pub_order LEFT OUTER JOIN instructor ON pub_order.inst_id=instructor.id'.$where.' ORDER BY pub_order.id DESC';
    
    $this->_set_log($sql,array(),'list');

    $tmp=$this->DB->GetAll($sql);

/*
    $tmp2=array();
    if($tmp){
      if($out_year<>99){
        $stime=mktime(0,0,0,1,1,$out_year);
        $etime=mktime(0,0,0,1,1,$out_year+1);
        if($out_month<>99){
          $stime=mktime(0,0,0,$out_month,1,$out_year);
          $etime=mktime(0,0,0,$out_month+1,1,$out_year);
        }
        foreach($tmp as $val){
          if(
            $val['out_year'] &&
            mktime(0,0,0,$val['out_month'],$val['out_day'],$val['out_year'])>=$stime &&
            mktime(0,0,0,$val['out_month'],$val['out_day'],$val['out_year'])<$etime
          ){
            array_push($tmp2,$val);
          }else{
            // array_push($tmp2,$val);
          }
        }
      }else{
        $tmp2=$tmp;
      }
    }
*/

    $tmp2=$tmp;
    
    # sort
    $tmp3=array();
    $inst_ids=array();
    if($tmp2){
      foreach($tmp2 as $val){
        if(isset($val['inst_id']) && $val['inst_id']){
          # inst_idがあるとき
          if(!@$tmp3[$val['id']]){
            $is_dubed=0;
            foreach($tmp2 as $val2){
              if($val2['inst_id']==$val['inst_id']){
                $tmp3[$val2['id']]=$val2;
                if($is_dubed){
                  $tmp3[$val2['id']]['is_dub']=1;
                }
                $is_dubed=1;
              }
            }
          }
        }else{
          # ないとき
          $tmp3[$val['id']]=$val;
        }
      }
    }
    
    return $tmp3;
  }

  function get_inactive_list(){
    
    $where=' WHERE pub_order.type<>5 AND pub_order.inst_hidden<>1 AND (pub_order.type=1 OR pub_order.type=2 OR pub_order.type=3 OR pub_order.type=4) AND pub_order.is_delete=1 AND ';

    if($where<>''){
      $where=$where.' 1=1';
    }
    
    $sql='SELECT pub_order.*,instructor.inst_id as inst_inst_id FROM pub_order LEFT OUTER JOIN instructor ON pub_order.inst_id=instructor.id'.$where.' ORDER BY pub_order.id DESC';

    $tmp=$this->DB->GetAll($sql);

    $tmp2=$tmp;
    
    # sort
    $tmp3=array();
    $inst_ids=array();
    if($tmp2){
      foreach($tmp2 as $val){
        if(isset($val['inst_id']) && $val['inst_id']){
          # inst_idがあるとき
          if(!@$tmp3[$val['id']]){
            $is_dubed=0;
            foreach($tmp2 as $val2){
              if($val2['inst_id']==$val['inst_id']){
                $tmp3[$val2['id']]=$val2;
                if($is_dubed){
                  $tmp3[$val2['id']]['is_dub']=1;
                }
                $is_dubed=1;
              }
            }
          }
        }else{
          # ないとき
          $tmp3[$val['id']]=$val;
        }
      }
    }
    
    return $tmp3;
  }

  function get_recept_list($rec_year=99,$rec_month=99,$approve=99){
    
    $where=' WHERE pub_order.is_delete=0 AND pub_order.inst_hidden<>1 AND (pub_order.type=3 OR pub_order.type=4) AND';
    if($approve<>99){
      $where.=' pub_order.approve='.mysql_escape_string($approve).' AND';
    }
    if($rec_year<>99){
      if($rec_month<>99){
        if($rec_month>=1 && $rec_month<=3){
          $rec_year = $rec_year + 1;
        }
        $where .= ' (CASE WHEN pub_order.approve=1 THEN pub_order.regist_time>='.mktime(0,0,0,$rec_month,1,$rec_year).' AND pub_order.regist_time<'.mktime(0,0,0,$rec_month+1,1,$rec_year).' ELSE 1=1 END) AND';
      }else{
        $where .= ' (CASE WHEN pub_order.approve=1 THEN pub_order.regist_time>='.mktime(0,0,0,4,1,$rec_year).' AND pub_order.regist_time<'.mktime(0,0,0,4,1,$rec_year+1).' ELSE 1=1 END) AND';
      }
    }

    $where=$where.' 1=1';
    
    $sql='SELECT pub_order.*,instructor.inst_id as inst_inst_id FROM pub_order LEFT OUTER JOIN instructor ON pub_order.inst_id=instructor.id'.$where.' ORDER BY pub_order.approve ASC, pub_order.req_year*10000+pub_order.req_month*100+pub_order.req_day*1 DESC, pub_order.id DESC';

    $tmp=$this->DB->GetAll($sql);

    $this->_set_log($sql,array(),'list');
/*
    $tmp2=array();
    if($tmp){
      if($rec_year<>99){
        $stime=mktime(0,0,0,1,1,$rec_year);
        $etime=mktime(0,0,0,1,1,$rec_year+1);
        if($rec_month<>99){
          $stime=mktime(0,0,0,$rec_month,1,$rec_year);
          $etime=mktime(0,0,0,$rec_month+1,1,$rec_year);
        }
        foreach($tmp as $val){
          if($val['regist_time']>=$stime && $val['regist_time']<$etime){
            array_push($tmp2,$val);
          }
        }
      }else{
        $tmp2=$tmp;
      }
    }
*/
    $tmp2=$tmp;
    
    # sort
    $tmp3=array();
    $inst_ids=array();
    if($tmp2){
      foreach($tmp2 as $val){
        if(isset($val['inst_id']) && $val['inst_id']){
          # inst_idがあるとき
          if(!@$tmp3[$val['id']]){
            $is_dubed=0;
            foreach($tmp2 as $val2){
              if($val2['inst_id']==$val['inst_id']){
                $tmp3[$val2['id']]=$val2;
                if($is_dubed){
                  $tmp3[$val2['id']]['is_dub']=1;
                }
                $is_dubed=1;
              }
            }
          }
        }else{
          # ないとき
          $tmp3[$val['id']]=$val;
        }
      }
    }
    
    return $tmp3;
  }

  function get_ship_list($out_year=99,$out_month=99,$order_type=99,$book_id=0,$bill_user=0){
    
    $where=' WHERE pub_order.inst_hidden<>1 AND pub_order.trans_status=2 AND';
    if($order_type<>99){
      $where.=' pub_order.type='.mysql_escape_string($order_type).' AND';
    }
    if($out_year<>99){
      if($out_month<>99){
        if($out_month>=1 && $out_month<=3){
          $out_year = $out_year + 1;
        }
        $where.=' pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 >='.date("Ymd",mktime(0,0,0,$out_month,1,$out_year)).' AND pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 < '.date("Ymd",mktime(0,0,0,$out_month+1,1,$out_year)).' AND';
      }else{
        $where.=' pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 >='.date("Ymd",mktime(0,0,0,4,1,$out_year)).' AND pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 < '.date("Ymd",mktime(0,0,0,4,1,$out_year+1)).' AND';
      }
    }
    
    if(@$bill_user){
      $where.=' pub_order.bill_user='.mysql_real_escape_string($bill_user).' AND';
    }
    
    if($where<>''){
      $where=$where.' 1=1';
    }
    
    $sql='SELECT pub_order.*,instructor.inst_id as inst_inst_id FROM pub_order LEFT OUTER JOIN instructor ON pub_order.inst_id=instructor.id'.$where.' ORDER BY pub_order.out_year*10000+pub_order.out_month*100+pub_order.out_day*1 DESC, pub_order.id DESC';

    $this->_set_log($sql,array(),'list');

    $tmp=$this->DB->GetAll($sql);

/*
    $tmp2=array();
    if($tmp){
      if($out_year<>99){
        $stime=mktime(0,0,0,1,1,$out_year);
        $etime=mktime(0,0,0,1,1,$out_year+1);
        if($out_month<>99){
          $stime=mktime(0,0,0,$out_month,1,$out_year);
          $etime=mktime(0,0,0,$out_month+1,1,$out_year);
        }
        foreach($tmp as $val){
          if(
            $val['out_year'] &&
            mktime(0,0,0,$val['out_month'],$val['out_day'],$val['out_year'])>=$stime &&
            mktime(0,0,0,$val['out_month'],$val['out_day'],$val['out_year'])<$etime
          ){
            array_push($tmp2,$val);
          }
        }
      }else{
        $tmp2=$tmp;
      }
    }
*/

    $tmp2=$tmp;

//var_dump($tmp2);

/*
    # sort
    $tmp3=array();
    $inst_ids=array();
    if($tmp2){
      foreach($tmp2 as $val){
        if(isset($val['inst_id']) && $val['inst_id']){
          # inst_idがあるとき
          if(!@$tmp3[$val['id']]){
            $is_dubed=0;
            foreach($tmp2 as $val2){
              if($val2['inst_id']==$val['inst_id']){
                $tmp3[$val2['id']]=$val2;
                if($is_dubed){
                  $tmp3[$val2['id']]['is_dub']=1;
                }
                $is_dubed=1;
              }
            }
          }
        }else{
          # ないとき
          $tmp3[$val['id']]=$val;
        }
      }
    }
*/

    // sortしない
    $tmp3=array();
    $inst_ids=array();
    $is_dubed=array();
    if($tmp2){
      foreach($tmp2 as $val){
        if(isset($val['inst_id']) && $val['inst_id']){
          # inst_idがあるとき
          if(!@$tmp3[$val['id']]){
            //すでに入ってない
            if(@$is_dubed[$val['inst_id']]){
              $val['is_dub'] = 1;
            }else{
              $val['is_dub'] = 0;
              $is_dubed[$val['inst_id']] = 1;
            }
            $tmp3[$val['id']]=$val;
          }
        }else{
          # ないとき
          $tmp3[$val['id']]=$val;
        }
      }
    }
    
    return $tmp3;
  }

  function get_pub_out_count($id){
    $sql=
      "SELECT SUM(pub_order_item.amount) as cnt 
      FROM 
        pub_order_item,
        pub_order
      WHERE 
        pub_order_item.order_id=pub_order.id
        AND
        pub_order_item.pub_id=?
        AND
        pub_order.inst_hidden=0
        AND
        pub_order.trans_status=2";
    $tmp=$this->DB->GetRow($sql,array($id));
    return $tmp['cnt'];
  }

  function get_pub_out_count_online($id){
    $sql=
      "SELECT SUM(pub_order_item.amount) as cnt 
      FROM 
        pub_order_item,
        pub_order
      WHERE 
        pub_order_item.order_id=pub_order.id
        AND
        pub_order_item.pub_id=? 
        AND 
        (pub_order_item.type=1 || pub_order_item.type=2)
        AND
        pub_order.inst_hidden=0
        AND
        pub_order.trans_status=2";
    $tmp=$this->DB->GetRow($sql,array($id));
    return $tmp['cnt'];
  }

  function get_pub_out_count_type($id,$type=1){
    $sql=
      "SELECT SUM(pub_order_item.amount) as cnt 
      FROM 
        pub_order_item,
        pub_order
      WHERE
        pub_order_item.order_id=pub_order.id
        AND
        pub_order_item.pub_id=?
        AND
        pub_order_item.type=?
        AND
        pub_order.inst_hidden=0
        AND
        pub_order.trans_status=2";
    $tmp=$this->DB->GetRow($sql,array($id,$type));
    return $tmp['cnt'];
  }

  function get_pub_out_count_adj($id){
    $sql=
      "SELECT SUM(pub_order_item.amount) as cnt 
      FROM 
        pub_order_item,
        pub_order
      WHERE
        pub_order_item.order_id=pub_order.id
        AND
        pub_order_item.pub_id=?
        AND
        pub_order_item.type=5
        AND
        pub_order.inst_hidden=0";
    $tmp=$this->DB->GetRow($sql,array($id));
    return $tmp['cnt'];
  }

  function add_pub_order($data){
    $sql=
      "INSERT INTO pub_order (
        regist_time,
        user_status,
        zipcode1,
        zipcode2,
        prefecture,
        address,
        company,
        section,
        name1,
        name2,
        kana1,
        kana2,
        email,
        tel1,
        tel2,
        tel3,

        send_type,
        suser_status,
        szipcode1,
        szipcode2,
        sprefecture,
        saddress,
        scompany,
        ssection,
        sname1,
        sname2,
        skana1,
        skana2,
        semail,
        stel1,
        stel2,
        stel3,
        
        purpose,
        req_year,
        req_month,
        req_day,
        req_text,
        bikou,
        
        type,
        trans_price,
        inst_id,
        inst_shiryou_other,
        inst_stekiyou,
        inst_host,
        ip
      ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,

        ?,
        ?,
        ?,
        ?,
        ?,
        ?,

        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?
      )";

    $this->DB->execute(
      $sql,
      array(
        time(),
        @$data["user_status"],
        @$data["zipcode1"],
        @$data["zipcode2"],
        @$data["prefecture"],
        @$data["address"],
        @$data["company"],
        @$data["section"],
        @$data["name1"],
        @$data["name2"],
        @$data["kana1"],
        @$data["kana2"],
        @$data["email"],
        @$data["tel1"],
        @$data["tel2"],
        @$data["tel3"],

        @$data["send_type"],
        @$data["suser_status"],
        @$data["szipcode1"],
        @$data["szipcode2"],
        @$data["sprefecture"],
        @$data["saddress"],
        @$data["scompany"],
        @$data["ssection"],
        @$data["sname1"],
        @$data["sname2"],
        @$data["skana1"],
        @$data["skana2"],
        @$data["semail"],
        @$data["stel1"],
        @$data["stel2"],
        @$data["stel3"],

        @$data["purpose"],
        @$data["req_year"],
        @$data["req_month"],
        @$data["req_day"],
        @$data["req_text"],
        @$data["bikou"],

        @$data["order_type"],
        @$data["trans_price"],
        @$data["inst_id"],
        @$data["inst_shiryou_other"],
        @$data["inst_stekiyou"],
        @$data["inst_host"],
        @$data["ip"]
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    $type=$data["order_type"];
    
    $recept_id=$this->setReceptId($id,$type);
    
    $this->_set_log($sql,array(
        time(),
        @$data["user_status"],
        @$data["zipcode1"],
        @$data["zipcode2"],
        @$data["prefecture"],
        @$data["address"],
        @$data["company"],
        @$data["section"],
        @$data["name1"],
        @$data["name2"],
        @$data["kana1"],
        @$data["kana2"],
        @$data["email"],
        @$data["tel1"],
        @$data["tel2"],
        @$data["tel3"],

        @$data["send_type"],
        @$data["suser_status"],
        @$data["szipcode1"],
        @$data["szipcode2"],
        @$data["sprefecture"],
        @$data["saddress"],
        @$data["scompany"],
        @$data["ssection"],
        @$data["sname1"],
        @$data["sname2"],
        @$data["skana1"],
        @$data["skana2"],
        @$data["semail"],
        @$data["stel1"],
        @$data["stel2"],
        @$data["stel3"],

        @$data["purpose"],
        @$data["req_year"],
        @$data["req_month"],
        @$data["req_day"],
        @$data["req_text"],
        @$data["bikou"],

        @$data["order_type"],
        @$data["trans_price"],
        @$data["inst_id"],
        @$data["inst_shiryou_other"],
        @$data["inst_stekiyou"],
        @$data["inst_host"],
        @$data["ip"]
      ),'insert',$id);

    return $id;
  }

  function add_pub_order_adj($data){
    $sql=
      "INSERT INTO pub_order (
        regist_time,
        user_status,
        name1,
        bikou,
        type
      ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?
      )";

    $this->DB->execute(
      $sql,
      array(
        time(),
        $data["user_status"],
        $data["name1"],
        $data["bikou"],
        $data["order_type"]
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    
    $recept_id=$this->setReceptId($id,5);
    
    return $id;
  }

  function setReceptId($id,$type){
    // recept_id : YYMMDDNNNRRRR
    $is_set=0;
    while($is_set==0){
      $pre_str='P';
      if($type>2){
        $pre_str='R';
      }
      $recept_id=$pre_str.date("ymd").sprintf("%04d",rand(1,9999));
      $sql=sprintf(
        "SELECT COUNT(*) as cnt
        FROM
          pub_order
        WHERE
          recept_id='%s'",
        mysql_escape_string($recept_id)
      );
      $tmp=$this->DB->GetRow($sql);
      $is_set=($tmp["cnt"]==0) ? 1 : 0;
    }
    
    $sql=
      "UPDATE pub_order
      SET
        recept_id=?
      WHERE
        id=?";
    $this->DB->execute(
      $sql,
      array(
        $recept_id,
        $id
      )
    ) or die("cannot update.".$this->DB->ErrorMsg());
    
    return $recept_id;
  }
  
  function update_pub_order_shipping($data,$id){
    $sql=
      'UPDATE pub_order
      SET
        out_year=?,
        out_month=?,
        out_day=?,
        arr_year=?,
        arr_month=?,
        arr_day=?,
        trans_status=?,
        trans_price=?,
        bikou=?
      WHERE
        id=?';

    $this->_set_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data['out_year'],
        $data['out_month'],
        $data['out_day'],
        $data['arr_year'],
        $data['arr_month'],
        $data['arr_day'],
        $data['trans_status'],
        $data['trans_price'],
        $data['bikou'],
        $id
      )
    ) or die("cannot update.".$this->DB->ErrorMsg());

    $this->_set_log($sql,array(
        $data['out_year'],
        $data['out_month'],
        $data['out_day'],
        $data['arr_year'],
        $data['arr_month'],
        $data['arr_day'],
        $data['trans_status'],
        $data['trans_price'],
        $data['bikou'],
        $id
      ),'update',$id,'after');
  }
  
  function update_pub_order_master($data,$id){
    $sql=
      'UPDATE pub_order
      SET
        settle_status=?,
        bikou=?
      WHERE
        id=?';

    $this->_set_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data['settle_status'],
        $data['bikou'],
        $id
      )
    ) or die("cannot update.".$this->DB->ErrorMsg());

    $this->_set_log($sql,array(
        $data['settle_status'],
        $data['bikou'],
        $id
      ),'update',$id,'after');
  }
  
  function update_pub_recept_master($data,$id){
    $sql=
      'UPDATE pub_order
      SET
        bill_name=?,
        req_year=?,
        req_month=?,
        req_day=?,
        req_text=?,
        approve=?,
        purpose=?,
        bikou=?,
        is_recept_edited=?
      WHERE
        id=?';

    $this->_set_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data['bill_name'],
        $data['req_year'],
        $data['req_month'],
        $data['req_day'],
        $data['req_text'],
        $data['approve'],
        $data['purpose'],
        $data['bikou'],
        $data['is_recept_edited'],
        $id
      )
    ) or die("cannot update.".$this->DB->ErrorMsg());

    $this->_set_log($sql,array(
        $data['bill_name'],
        $data['req_year'],
        $data['req_month'],
        $data['req_day'],
        $data['req_text'],
        $data['approve'],
        $data['purpose'],
        $data['bikou'],
        $data['is_recept_edited'],
        $id
      ),'update',$id,'after');
  }

  function update_old_order_to_hidden($id,$inst_id){
    $sql="UPDATE pub_order SET inst_hidden=1 WHERE inst_id=? AND approve=0 AND id<>?";
    $this->DB->execute($sql,array($inst_id,$id)) or die("cannot update.".$this->DB->ErrorMsg());
  }

  function update_old_order_to_hidden_wo_id($inst_id){
    $sql="UPDATE pub_order SET inst_hidden=1 WHERE inst_id=? AND approve=0";
    $this->DB->execute($sql,array($inst_id)) or die("cannot update.".$this->DB->ErrorMsg());
  }

  function get_recept_id($order_id){
    $sql="SELECT recept_id FROM pub_order WHERE id=?";
    $tmp=$this->DB->GetRow($sql,array($order_id));
    return $tmp['recept_id'];
  }
  
  function get_one_order($id){
    $sql="SELECT pub_order.*,instructor.inst_id as inst_inst_id FROM pub_order LEFT OUTER JOIN instructor ON pub_order.inst_id=instructor.id WHERE pub_order.id=?";
    $tmp=$this->DB->GetRow($sql,array($id));
    
    $this->_set_log($sql,array($id),'select',$id);
    
    return $tmp;
  }
  
  function get_one_order_item($id){
    $sql="SELECT * FROM pub_order_item WHERE order_id=? ORDER BY id ASC";
    $tmp=$this->DB->GetAll($sql,array($id));
    return $tmp;
  }

  function get_one_order_item_w_inst_id($inst_id){
    $sql="SELECT pub_order_item.* FROM pub_order_item,pub_order WHERE pub_order_item.order_id=pub_order.id AND pub_order.inst_id=? ORDER BY id ASC";
    $tmp=$this->DB->GetAll($sql,array($inst_id));
    return $tmp;
  }

  function get_one_order_item_w_user($id,$user_id=0){
  
    if(!$user_id){
      return $this->get_one_order_item($id);
    }
  
    $sql="
      SELECT 
        pub_order_item.*,
        publications.users as users
      FROM 
        pub_order_item,
        publications
      WHERE 
        pub_order_item.pub_id=publications.id
        AND
        pub_order_item.order_id=?
      ORDER BY id ASC";
    $tmp=$this->DB->GetAll($sql,array($id));
    $tmp2=array();
    if($tmp){
      foreach($tmp as $val){
        $is_my_book=0;
        $users=explode(',',$val['users']);
        if($users){
          foreach($users as $val2){
            if($val2==$user_id){
              $is_my_book=1;
            }
          }
        }
        if($is_my_book){
          array_push($tmp2,$val);
        }
      }
    }
    
    return $tmp2;
  }

  function get_one_order_item_temp($inst_id){
    $sql="SELECT * FROM pub_order_item_temp WHERE inst_id=? ORDER BY id ASC";
    $tmp=$this->DB->GetAll($sql,array($inst_id));
    return $tmp;
  }

  function get_order_status($inst_id){
    $sql="SELECT trans_status,approve FROM pub_order WHERE inst_id=? AND inst_hidden<>1 AND is_delete<>1";
    $tmp=$this->DB->GetRow($sql,array($inst_id));
    
    return $tmp;
  }

  function get_pub_recept_approve($id){
    $sql="SELECT approve FROM pub_order WHERE id=?";
    $tmp=$this->DB->GetRow($sql,array($id));
    return $tmp['approve'];
  }

  function add_pub_order_item($order_id,$publication_id,$name,$price,$amount,$type){
    $sql=
      "INSERT INTO pub_order_item (
        pub_id,
        order_id,
        name,
        price,
        amount,
        type
      ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        ?
      )";

    $this->DB->execute(
      $sql,
      array(
        $publication_id,
        $order_id,
        $name,
        $price,
        $amount,
        $type
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    
    return $id;
  }

  function add_pub_order_item_temp($inst_id,$publication_id,$name,$price,$amount,$type){
    $sql=
      "INSERT INTO pub_order_item_temp (
        pub_id,
        inst_id,
        name,
        price,
        amount,
        type
      ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        ?
      )";

    $this->DB->execute(
      $sql,
      array(
        $publication_id,
        $inst_id,
        $name,
        $price,
        $amount,
        $type
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    
    return $id;
  }

  function inactivate_pub_order($order_id){
    if($order_id){
      $sql="UPDATE pub_order SET is_delete=1 WHERE id=?";

      $this->_set_log($sql,array($order_id),'update',$order_id,'before');

      $this->DB->execute($sql,array($order_id));

      $this->_set_log($sql,array($order_id),'update',$order_id,'after');
    }

    return;
  }
  
  function activate_pub_order($order_id){
    if($order_id){
      $sql="UPDATE pub_order SET is_delete=0 WHERE id=?";

      $this->_set_log($sql,array($order_id),'update',$order_id,'before');

      $this->DB->execute($sql,array($order_id));

      $this->_set_log($sql,array($order_id),'update',$order_id,'after');
    }
    return;
  }
  
  function del_pub_order($order_id){
  
    if($order_id){

      $sql="DELETE FROM pub_order WHERE id=?";

      $this->_set_log($sql,array($order_id),'delete',$order_id);

      $this->DB->execute($sql,array($order_id));
      $this->del_pub_order_item($order_id);

    }

    return;
  }
  
  function del_pub_order_item($order_id){
    $sql="DELETE FROM pub_order_item WHERE order_id=?";

    $this->DB->execute($sql,array($order_id));

    return;
  }
  
  function del_pub_order_item_temp($inst_id){
    $sql="DELETE FROM pub_order_item_temp WHERE inst_id=?";

    $this->DB->execute($sql,array($inst_id));

    return;
  }
  
  function get_pub_amount($pub_id){
    $total_p=$this->get_pub_count($pub_id);
    $total_m=$this->get_pub_out_count($pub_id)+
             $this->get_pub_out_count_adj($pub_id);
    
    return $total_p-$total_m;
  }

//--------------------------------------

  function _check_pub_id($id="", $pub_id_1=0, $pub_id_2=0){
    $pub_id_1 = $pub_id_1 * 1;
    $pub_id_2 = $pub_id_2 * 1;
    if($id){
      if($pub_id_1==0 && $pub_id_2==0){
        return false;
      }else{
        $sql = "SELECT COUNT(*) as cnt FROM publications WHERE id<>? AND pub_id_1=? AND pub_id_2=?";
        $tmp = $this->DB->GetRow($sql,array($id, $pub_id_1*1, $pub_id_2*1));
      }
      if(@$tmp['cnt']){
        return true;
      }else{
        return false;
      }
    }else{
      if($pub_id_1==0 && $pub_id_2==0){
        return false;
      }else{
        $sql = "SELECT COUNT(*) as cnt FROM publications WHERE pub_id_1=? AND pub_id_2=?";
        $tmp = $this->DB->GetRow($sql,array($pub_id_1*1, $pub_id_2*1));
      }
      if(@$tmp['cnt']){
        return true;
      }else{
        return false;
      }
    }
  }

  function get_pubmaster_all(){
    $sql="SELECT * FROM publications ORDER BY pub_id_1 IS NULL ASC, pub_id_1=0 ASC, pub_id_1 ASC, pub_id_2 ASC, id ASC";
    $tmp=$this->DB->GetAll($sql);

    $this->_set_publications_log($sql,array(),'list');
    
    return $tmp;
  }
  
  function get_pubmaster_inst(){
    $sql="SELECT * FROM publications WHERE show_inst=1 ORDER BY pub_id_1 IS NULL ASC, pub_id_1=0 ASC, pub_id_1 ASC, pub_id_2 ASC, id ASC";
    $tmp=$this->DB->GetAll($sql);
    
    $this->_set_publications_log($sql,array(),'list');
    
    return $tmp;
  }
  
  function get_pubmaster_all_w_user($user_id=0){
    $tmp=$this->get_pubmaster_all();
    
    if(!$user_id){
      return $tmp;
    }
    
    $tmp2=array();
    
    if($tmp){
      foreach($tmp as $val){
        $is_my_book=0;
        $users=explode(',',$val['users']);
        if($users){
          foreach($users as $val2){
            if($val2==$user_id){
              $is_my_book=1;
            }
          }
        }
        if($is_my_book){
          array_push($tmp2,$val);
        }
      }
    }
    
    return $tmp2;
  }
  
  function get_pubmaster_one($id){
    $sql=sprintf(
      "SELECT id,pub_id_1,pub_id_2,name,weight,price,users,category,border,url,showrange,show_online,show_other,show_inst,show_if_zero,entry_limit FROM publications WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    
    $this->_set_publications_log($sql,array(),'select',$id);
    
    $users=explode(',',$tmp['users']);
    $tmp['users']=$users;
    return $tmp;
  }

  function get_item_price($id=0){
    $sql=sprintf(
      "SELECT price FROM publications WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    return $tmp['price'];
  }
  
  function get_pub_id($id=0){
    $sql=sprintf(
      "SELECT pub_id_1,pub_id_2 FROM publications WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    $pub_id = '';
    if($tmp['pub_id_1'] && $tmp['pub_id_2']){
      $pub_id = sprintf("%d-%02d",$tmp['pub_id_1'],$tmp['pub_id_2']);
    }elseif($tmp['pub_id_1']){
      $pub_id = sprintf("%d",$tmp['pub_id_1']);
    }elseif($tmp['pub_id_2']){
      $pub_id = sprintf("%02d",$tmp['pub_id_2']);
    }
    return $pub_id;
  }
  
  function get_item_weight($id=0){
    $sql=sprintf(
      "SELECT weight FROM publications WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    return $tmp['weight'];
  }
  
  function get_item_border($id=0){
    $sql=sprintf(
      "SELECT border FROM publications WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    return $tmp['border'];
  }

  function get_books_by_category($category){
    $sql="SELECT * FROM publications WHERE category=? ORDER BY id ASC";
    return $this->DB->GetAll($sql,array($category));
  }
  
  function get_books_by_category_w_range($category,$show_online=0,$show_other=0,$show_inst=0){
    $sql="SELECT * FROM publications WHERE category=? AND show_online=? AND show_other=? AND show_inst=? ORDER BY id ASC";
    return $this->DB->GetAll($sql,array($category,$show_online,$show_other,$show_inst));
  }
  
  function get_books_by_category_online($category,$show_online=1){
    $sql="SELECT * FROM publications WHERE category=? AND show_online=? ORDER BY pub_id_1 IS NULL ASC, pub_id_1=0 ASC, pub_id_1 ASC, pub_id_2 ASC, id ASC";
    return $this->DB->GetAll($sql,array($category,$show_online));
  }
  
  function get_books_by_category_other($category,$show_other=1){
    $sql="SELECT * FROM publications WHERE category=? AND show_other=? ORDER BY pub_id_1 IS NULL ASC, pub_id_1=0 ASC, pub_id_1 ASC, pub_id_2 ASC, id ASC";
    return $this->DB->GetAll($sql,array($category,$show_other));
  }
  
/*
  function get_books_by_category_w_range($category,$showrange=0){
    $sql="SELECT * FROM publications WHERE category=? AND (showrange=0 OR showrange=?) ORDER BY id ASC";
    return $this->DB->GetAll($sql,array($category,$showrange));
  }
*/
  
  function add_pubmaster($data){
    $sql=
      "INSERT INTO publications (
        name,
        weight,
        price,
        adjcount,
        users,
        category,
        border,
        url,
        showrange,
        show_online,
        show_other,
        show_inst,
        pub_id_1,
        pub_id_2,
        show_if_zero,
        entry_limit
      ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?
      )";

    $this->DB->execute(
      $sql,
      array(
        @$data["name"],
        @$data["weight"],
        @$data["price"],
        @$data["adjcount"],
        implode(",",@$data["users"]),
        @$data["category"],
        @$data["border"],
        @$data["url"],
        @$data["showrange"],
        @$data["show_online"],
        @$data["show_other"],
        @$data["show_inst"],
        @$data["pub_id_1"],
        @$data["pub_id_2"],
        @$data["show_if_zero"],
        @$data["entry_limit"]
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    
    $this->_set_publications_log($sql,array(
        @$data["name"],
        @$data["weight"],
        @$data["price"],
        @$data["adjcount"],
        implode(",",@$data["users"]),
        @$data["category"],
        @$data["border"],
        @$data["url"],
        @$data["showrange"],
        @$data["show_online"],
        @$data["show_other"],
        @$data["show_inst"],
        @$data["pub_id_1"],
        @$data["pub_id_2"],
        @$data["show_if_zero"],
        @$data["entry_limit"]
      ),'insert',$id);

    return $id;
  }

  function update_pubmaster($data,$id){
  
    $sql=
      "UPDATE publications
      SET
        name=?,
        pcount=?,
        weight=?,
        price=?,
        adjcount=?,
        users=?,
        category=?,
        border=?,
        url=?,
        showrange=?,
        show_online=?,
        show_other=?,
        show_inst=?,
        pub_id_1=?,
        pub_id_2=?,
        show_if_zero=?,
        entry_limit=?
      WHERE
        id=?";

    $this->_set_publications_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data["name"],
        $data["pcount"],
        $data["weight"],
        $data["price"],
        $data["adjcount"],
        implode(",",$data["users"]),
        $data["category"],
        $data["border"],
        $data["url"],
        $data["showrange"],
        ($data["show_online"])? 1 : 0,
        ($data["show_other"])? 1 : 0,
        ($data["show_inst"])? 1 : 0,
        $data["pub_id_1"],
        $data["pub_id_2"],
        ($data["show_if_zero"])? 1 : 0,
        $data["entry_limit"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
    $this->_set_publications_log($sql,array(
        $data["name"],
        $data["pcount"],
        $data["weight"],
        $data["price"],
        $data["adjcount"],
        implode(",",$data["users"]),
        $data["category"],
        $data["border"],
        $data["url"],
        $data["showrange"],
        ($data["show_online"])? 1 : 0,
        ($data["show_other"])? 1 : 0,
        ($data["show_inst"])? 1 : 0,
        $data["pub_id_1"],
        $data["pub_id_2"],
        ($data["show_if_zero"])? 1 : 0,
        $data["entry_limit"],
        $id
      ),'update',$id,'after');

  }
  
  function delete_pubmaster($id){
  
    $sql="DELETE FROM publications WHERE id=?";

    $this->DB->execute(
      $sql,
      array($id)
    ) or die($this->DB->ErrorMsg());
    
  }
  
  function add_pub_quantity($id,$pcount,$user_id){
    $sql=
      "INSERT INTO publication_quantity (
        pub_id,
        amount,
        regist_time,
        user_id
      ) VALUES (
        ?,
        ?,
        ?,
        ?
      )";

    $this->DB->execute(
      $sql,
      array(
        $id,
        $pcount,
        time(),
        $user_id
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());
    
  }

  function get_pub_count($id){
    $sql="SELECT SUM(amount) as cnt FROM publication_quantity WHERE pub_id=?";
    $tmp=$this->DB->GetRow($sql,array($id));
    return $tmp['cnt'];
  }
  
  function get_sassi_users(){
    $sql="SELECT * FROM formusers WHERE is_sassi=1";
    $result=$this->DB->GetAll($sql);
    return $result;
  }

  function get_sassi_distinct_sections(){
    $sql="SELECT * FROM formusers WHERE is_sassi=1 OR is_master=1 OR is_master2=1 ORDER BY sort_num ASC";
    $result=$this->DB->GetAll($sql);
    
    $result2 = array();
    if($result){
      foreach($result as $val){
        if(@$section[$val['bikou']]<>1){
          array_push($result2,$val);
          $section[$val['bikou']] = 1;
        }
      }
    }
    
    return $result2;
  }

  function update_pub_bill($data,$id){
    $sql="UPDATE pub_order SET bill_user=?, bill_status=? WHERE id=?";
    $this->DB->execute(
      $sql,
      array(
        $data['bill_user'],
        $data['bill_status'],
        $id
      )
    );
  }
  
  function get_log($sdate,$edate){
    $sql = "SELECT * FROM log_pub_order WHERE log_datetime>? AND log_datetime<=? ORDER BY log_datetime ASC";
    $result = $this->DB->GetAll($sql,array($sdate,$edate));
    
    return $result;
  }

  function get_log_fields(){
    return array_merge($this->_fields1(),$this->_fields2());
  }

  function get_publications_log($sdate,$edate){
    $sql = "SELECT * FROM log_publications WHERE log_datetime>? AND log_datetime<=? ORDER BY log_datetime ASC";
    $result = $this->DB->GetAll($sql,array($sdate,$edate));
    
    return $result;
  }

  function get_publications_log_fields(){
    return array_merge($this->_fields1(),$this->_fields3());
  }

  function _set_log($sql_str='',$params=array(),$extype='list',$rid='',$exorder=''){
    $fields1 = $this->_fields1();
    $fields2 = $this->_fields2();
    $sess = $_SESSION['attributes']['org.mojavi'];
    
    $user_id = $sess['user_id'];

    $request_url = $_SERVER['REQUEST_URI'];
    
    $ldata = array(
      'remote_addr'  => $_SERVER['REMOTE_ADDR'],
      'user_agent'   => $_SERVER['HTTP_USER_AGENT'],
      'log_datetime' => date("Y-m-d H:i:s"),
      'user_id'      => $user_id,
      'request_url'  => $request_url,
      'sql_str'      => $sql_str,
      'parameters'   => serialize($params),
      'exorder'      => $exorder
    );

    if($extype=='list'){
      
      $query = $this->_makeInsertQuery($ldata);
      
      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
      
    }elseif($extype='select'){
      $row = $this->_get_record($rid);
      
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['pub_order_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());

    }elseif($extype=="update"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['pub_order_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());

    }elseif($extype=="insert"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['pub_order_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());

    }elseif($extype=="delete"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['pub_order_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }
    
  }
  
  function _set_publications_log($sql_str='',$params=array(),$extype='list',$rid='',$exorder=''){
    $fields1 = $this->_fields1();
    $fields2 = $this->_fields3();
    $sess = $_SESSION['attributes']['org.mojavi'];
    
    $user_id = $sess['user_id'];

    $request_url = $_SERVER['REQUEST_URI'];
    
    $ldata = array(
      'remote_addr'  => $_SERVER['REMOTE_ADDR'],
      'user_agent'   => $_SERVER['HTTP_USER_AGENT'],
      'log_datetime' => date("Y-m-d H:i:s"),
      'user_id'      => $user_id,
      'request_url'  => $request_url,
      'sql_str'      => $sql_str,
      'parameters'   => serialize($params),
      'exorder'      => $exorder
    );

    if($extype=='list'){
      
      $query = $this->_makePublicationsInsertQuery($ldata);
      
      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
      
    }elseif($extype='select'){
      $row = $this->_get_publications_record($rid);
      
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['publications_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makePublicationsInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }elseif($extype=="update"){
      $row = $this->_get_publications_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['publications_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makePublicationsInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }elseif($extype=="insert"){
      $row = $this->_get_publications_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['publications_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makePublicationsInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }
    
  }
  
  function _get_record($id){
    $sql = "SELECT * FROM pub_order WHERE id=?";
    $row = $this->DB->GetRow($sql,array($id));
    return $row;
  }
  
  function _get_publications_record($id){
    $sql = "SELECT * FROM publications WHERE id=?";
    $row = $this->DB->GetRow($sql,array($id));
    return $row;
  }
  
  function _makeInsertQuery($data){
  
    $columns = array();
    $values  = array();
    foreach($data as $key=>$val){
      array_push($columns, $key);
      array_push($values, '?');
    }
    return 'INSERT INTO log_pub_order ('.implode(',',$columns).') VALUES ('.implode(',',$values).')';
  }

  function _makePublicationsInsertQuery($data){
  
    $columns = array();
    $values  = array();
    foreach($data as $key=>$val){
      array_push($columns, $key);
      array_push($values, '?');
    }
    return 'INSERT INTO log_publications ('.implode(',',$columns).') VALUES ('.implode(',',$values).')';
  }

  function _fields1(){
    return array(
      'remote_addr',
      'user_agent',
      'log_datetime',
      'user_id',
      'request_url',
      'sql_str',
      'parameters',
      'exorder'
    );
  }
  
  function _fields2(){
    //pub_order

    return array(
      'pub_order_id',
      'recept_id',
      'regist_time',
      'name1',
      'name2',
      'kana1',
      'kana2',
      'user_status',
      'zipcode1',
      'zipcode2',
      'prefecture',
      'address',
      'tel1',
      'tel2',
      'tel3',
      'email',
      'company',
      'section',
      'type',
      'trans_price',
      'trans_status',
      'settle_status',
      'bikou',
      'out_year',
      'out_month',
      'out_day',
      'req_year',
      'req_month',
      'req_day',
      'arr_year',
      'arr_month',
      'arr_day',
      'req_text',
      'approve',
      'purpose',
      'send_type',
      'sname1',
      'sname2',
      'skana1',
      'skana2',
      'suser_status',
      'szipcode1',
      'szipcode2',
      'sprefecture',
      'saddress',
      'stel1',
      'stel2',
      'stel3',
      'scompany',
      'ssection',
      'semail',
      'bill_name',
      'inst_id',
      'is_recept_edited',
      'ip',
      'inst_stekiyou',
      'inst_shiryou_other',
      'inst_hidden',
      'inst_host',
      'bill_user',
      'bill_status',
      'is_delete'
    );
  }
  
  function _fields3(){
    //publications
    return array(
      'publications_id',
      'pub_id_1',
      'pub_id_2',
      'name',
      'pcount',
      'weight',
      'price',
      'adjcount',
      'users',
      'category',
      'border',
      'url',
      'showrange',
      'show_online',
      'show_other',
      'show_inst',
      'show_if_zero',
      'entry_limit'
    );
  }

}
?>