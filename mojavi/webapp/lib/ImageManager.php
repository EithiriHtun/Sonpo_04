<?php
class ImageManager{

  var $DB;
  
  function ImageManager($db){
    $this->$DB=$db;
  }

  function insert($data){
    $sql=
      "INSERT INTO images (
        regist_date
      ) VALUES (
        ?
      )";

    $this->$DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s")
      )
    ) or die("cannot insert.".$this->$DB->ErrorMsg());

    $id=mysql_insert_id();
    
    return $id;
  }
  
}
?>