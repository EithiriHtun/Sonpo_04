<?php
class DocManager{

  public $DB;
  
  function DocManager($db){
    $this->DB=$db;
  }

  function insert($data){
    $sql=
      "INSERT INTO shiryo (
        shiryo.name,
        shiryo.visible
      ) VALUES (
        ?,
        ?
      )";

    $this->DB->execute(
      $sql,
      array(
        $data["name"],
        1
      )
    ) or die("cannot insert.");

    $id=mysql_insert_id();
    
    return $id;
  }

  function update($data,$id){
  
    $sql=
      "UPDATE shiryo
      SET
        name=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        $data["name"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function get_all(){
    $sql="SELECT * FROM shiryo";
    $tmp=$this->DB->GetAll($sql);
    return $tmp;
  }
  
  function get_one($id){
    $sql=sprintf(
      "SELECT * FROM shiryo WHERE id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);
    return $tmp;
  }

  function deactive($id){
  
    $sql=
      "UPDATE shiryo
      SET
        visible=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        0,
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

}
?>