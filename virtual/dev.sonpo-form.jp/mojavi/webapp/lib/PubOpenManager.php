<?php
class PubOpenManager{

  public $DB;
  
  function PubOpenManager($db){
    $this->DB=$db;
  }

  function update_pubopen($data,$id){
    $sql=
      'UPDATE pub_open
      SET
        message=?,
        do_close=?
      WHERE
        id=?';

    $this->_set_pub_open_log($sql,array(),'update',$id,'before');

    $this->DB->execute(
      $sql,
      array(
        $data['message'],
        $data['do_close'],
        $id
      )
    ) or die("cannot update.".$this->DB->ErrorMsg());

    $this->_set_pub_open_log($sql,array(
        $data['message'],
        $data['do_close'],
        $id
      ),'update',$id,'after');
  }
  
  function get_one($id){
    $sql="SELECT pub_open.* FROM pub_open WHERE pub_open.id=?";
    $tmp=$this->DB->GetRow($sql,array($id));
    return $tmp;
  }
  
  function _set_pub_open_log($sql_str='',$params=array(),$extype='list',$rid='',$exorder=''){
    $fields1 = $this->_fields1();
    $fields2 = $this->_fields4();
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
      
      $query = $this->_makePubOpenInsertQuery($ldata);
      
      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
      
    }elseif($extype=="update"){
      $row = $this->_get_pub_open_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['pub_open_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makePubOpenInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }
    
  }
  
  function _get_pub_open_record($id){
    $sql = "SELECT * FROM pub_open WHERE id=?";
    $row = $this->DB->GetRow($sql,array($id));
    return $row;
  }
  
  function _makePubOpenInsertQuery($data){
  
    $columns = array();
    $values  = array();
    foreach($data as $key=>$val){
      array_push($columns, $key);
      array_push($values, '?');
    }
    return 'INSERT INTO log_pub_open ('.implode(',',$columns).') VALUES ('.implode(',',$values).')';
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
  
  function _fields4(){
    //pub_open
    return array(
      'pub_open_id',
      'do_close',
      'message'
    );
  }

}
?>