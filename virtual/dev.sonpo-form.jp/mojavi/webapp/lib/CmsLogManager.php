<?php
class CmsLogManager{

  var $DB;
  
  function CmsLogManager($db){
    $this->DB=$db;
  }

  function insert($data){
    $sql=
      "INSERT INTO cmslog (
        user_account,
        log_date,
        action
      ) VALUES (
        ?,
        ?,
        ?
      )";

//$this->DB->LogSQL();

    $this->DB->execute(
      $sql,
      array(
        @$data["user_account"],
        date("Y-m-d H:i:s"),
        @$data["action"]
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    
    return $id;
  }
  
  function get_log($limit=100,$offset=0){
    $sql = "SELECT * FROM cmslog ORDER BY log_date DESC LIMIT ?,?";
    $data=$this->DB->GetAll($sql,array($offset*1,$limit*1));
    return $data;
  }
  
  function get_total(){
    $sql = "SELECT COUNT(*) as cnt FROM cmslog";
    $data=$this->DB->GetRow($sql);
    return $data;
  }
  
}
?>