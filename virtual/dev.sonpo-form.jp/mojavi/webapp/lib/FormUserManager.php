<?php
class FormUserManager{

  var $DB;
  
  function FormUserManager($db){
    $this->DB=$db;
  }

  function update($data,$id){
  
    $sql=
      "UPDATE formusers
      SET
        account=?,
        password=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        $data["account"],
        $data["password"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function update_password($data,$id){
  
    $sql=
      "UPDATE formusers
      SET
        password=?,
        pw_set_date=?,
        pw1=?,
        pw1_set_date=?,
        pw2=?,
        pw2_set_date=?
      WHERE
        id=?";

    $this->_set_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data["password"],
        $data['pw_set_date'],
        $data['pw1'],
        $data['pw1_set_date'],
        $data['pw2'],
        $data['pw2_set_date'],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
    $this->_set_log($sql,array(
        $data["password"],
        $data['pw_set_date'],
        $data['pw1'],
        $data['pw1_set_date'],
        $data['pw2'],
        $data['pw2_set_date'],
        $id
      ),'update',$id,'after');
  }

  function update_bikou($data,$id){
  
    $sql=
      "UPDATE formusers
      SET
        bikou=?
      WHERE
        id=?";

    $this->_set_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data["bikou"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
    $this->_set_log($sql,array(
        $data["bikou"],
        $id
      ),'update',$id,'after');

  }

  function update_email($data,$id){
  
    $sql=
      "UPDATE formusers
      SET
        email=?
      WHERE
        id=?";

    $this->_set_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data["email"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
    $this->_set_log($sql,array(
        $data["email"],
        $id
      ),'update',$id,'after');

  }

  function update_reset_url($id,$reset_url){
  
    $sql=
      "UPDATE formusers
      SET
        reset_url=?,
        reset_request_time=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        $reset_url,
        date('Y-m-d H:i:s'),
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function update_last_login_time($id,$datetime){
  
    $sql=
      "UPDATE formusers
      SET
        last_login_time=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        $datetime,
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function update_previous_login_time($id){
    $sql = "SELECT last_login_time FROM formusers WHERE id=?";
    $tmp = $this->DB->GetRow($sql,array($id));
    
    $llt = @$tmp['last_login_time'];
    
    if($llt){
  
      $sql=
        "UPDATE formusers
        SET
          previous_login_time=?
        WHERE
          id=?";

      $this->DB->execute(
        $sql,
        array(
          $llt,
          $id
        )
      ) or die($this->DB->ErrorMsg());
    
    }
  }

  function update_login_attempt_count($id,$count){
  
    $sql=
      "UPDATE formusers
      SET
        login_attempt_count=?
      WHERE
        id=?";

    $this->_set_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $count,
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
    $this->_set_log($sql,array(
        $count,
        $id
      ),'update',$id,'after');

  }

  function get_all(){
    $sql="SELECT * FROM formusers ORDER BY sort_num ASC, id ASC";
    $tmp=$this->DB->GetAll($sql);
    return $tmp;
  }
  
  function get_user_bikou($id){
    $sql="SELECT bikou FROM formusers WHERE id=?";
    $tmp=$this->DB->GetRow($sql,array($id));
    return @$tmp['bikou'];
  }
  
  function get_sassi_users(){
    $sql="SELECT id,bikou FROM formusers WHERE is_sassi=1";
    $tmp=$this->DB->GetAll($sql);
    return $tmp;
  }
  
  function get_admin_and_sassi_users(){
    $sql="SELECT id,bikou FROM formusers WHERE (is_master=1 OR is_master2=1 OR is_sassi=1) AND bikou<>'' ORDER BY sort_num ASC";
    $tmp=$this->DB->GetAll($sql);
    return $tmp;
  }
  
  function get_one($id){
    $sql=sprintf(
      "SELECT * FROM formusers WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    
    $this->_set_log($sql,array(),'select',$id);
    
    return $tmp;
  }

  function get_one_for_csv($id){
    $sql=sprintf(
      "SELECT * FROM formusers WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    
    return $tmp;
  }


  function account_exist($id,$account){
    $sql=sprintf(
      "COUNT (*) as cnt
      FROM formusers
      WHERE
        id<>%d
        AND
        account='%s'",
      $id,
      mysql_escape_string($account)
    );
    $tmp=$this->DB->GetRow($sql);
    
    return $tmp["cnt"];
  }
  
  function set_lock_token($id, $lock_token, $datetime){
    $sql = "UPDATE formusers SET lock_token=?, lock_time=? WHERE id=?";
    $this->DB->execute($sql, array($lock_token, $datetime, $id)) or die($this->DB->ErrorMsg());
  }
  function update_lock_token_time($id){
    $sql = "UPDATE formusers SET lock_time=? WHERE id=?";
    $this->DB->execute($sql, array(date("Y-m-d H:i:s"), $id)) or die($this->DB->ErrorMsg());
  }
  function clear_lock_token($id){
    $sql = "UPDATE formusers SET lock_token='', lock_time='' WHERE id=?";
    $this->DB->execute($sql, array($id)) or die($this->DB->ErrorMsg());
  }
  function get_lock_token($id, $difftime){
    $sql = "SELECT lock_token,lock_time FROM formusers WHERE id=?";
    $tmp=$this->DB->GetRow($sql, array($id));
    
    if(@$tmp['lock_token']){
      if(@$tmp['lock_time'] && (time() - strtotime(@$tmp['lock_time']) < $difftime)){
        return @$tmp['lock_token'];
      }else{
        return null;
      }
    }else{
      return null;
    }
    
  }

  function get_log($sdate,$edate){
    $sql = "SELECT * FROM log_formusers WHERE log_datetime>? AND log_datetime<=? ORDER BY log_datetime ASC";
    $result = $this->DB->GetAll($sql,array($sdate,$edate));
    
    return $result;
  }

  function get_log_fields(){
    return array_merge($this->_fields1(),$this->_fields2());
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
      
    }elseif($extype=="select"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['formusers_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }elseif($extype=="update"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['formusers_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }
    
  }
  
  function _get_record($id){
    $sql = "SELECT * FROM formusers WHERE id=?";
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
    return 'INSERT INTO log_formusers ('.implode(',',$columns).') VALUES ('.implode(',',$values).')';
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
    //formusers
    return array(
      'formusers_id',
      'account',
      'password',
      'is_master',
      'email',
      'branch',
      'is_shipping',
      'is_sassi',
      'is_master2',
      'bikou',
      'sort_num',
      'pw_set_date',
      'pw1',
      'pw2',
      'pw1_set_date',
      'pw2_set_date',
      'reset_request_time',
      'reset_url',
      'login_attempt_count',
      'last_login_time'
    );
  }

}
?>