<?php
class UserManager{

  var $DB;
  
  function UserManager($db){
    $this->$DB=$db;
  }

  function update($data,$id){
  
    $sql=
      "UPDATE users
      SET
        account=?,
        password=?
      WHERE
        id=?";

    $this->$DB->execute(
      $sql,
      array(
        $data["account"],
        $data["password"],
        $id
      )
    ) or die($this->$DB->ErrorMsg());
    
  }

  function get_all(){
    $sql="SELECT * FROM users";
    $tmp=$this->$DB->GetAll($sql);
    return $tmp;
  }
  
  function get_one($id){
    $sql=sprintf(
      "SELECT * FROM users WHERE id=%d",
      $id
    );
    $tmp=$this->$DB->GetRow($sql);
    return $tmp;
  }


  function search($cid){
    $sql=sprintf(
      "SELECT *
      FROM
        comments
      WHERE
        comment_id='%s'",
      mysql_escape_string($cid)
    );
    $tmp=$this->$DB->GetAll($sql);

    return $tmp;
  }
  
  function account_exist($id,$account){
    $sql=sprintf(
      "COUNT (*) as cnt
      FROM users
      WHERE
        id<>%d
        AND
        account='%s'",
      $id,
      mysql_escape_string($account)
    );
    $tmp=$this->$DB->GetRow($sql);
    
    return $tmp["cnt"];
  }
}
?>