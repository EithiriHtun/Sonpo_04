<?php
class ContactManager{

  var $DB;
  
  function ContactManager($db){
    $this->$DB=$db;
  }

  function insert($data){
    $sql=
      "INSERT INTO comments (
        name1,
        name2,
        kana1,
        kana2,
        zip1,
        zip2,
        pref,
        address,
        tel1,
        tel2,
        tel3,
        email,
        type,
        type_other,
        comment,
        no_answer,
        upassw,
        date_regist,
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
        ?
      )";

    $this->$DB->execute(
      $sql,
      array(
        $data["name1"],
        $data["name2"],
        $data["kana1"],
        $data["kana2"],
        $data["zip1"],
        $data["zip2"],
        $data["pref"],
        $data["address"],
        $data["tel1"],
        $data["tel2"],
        $data["tel3"],
        $data["email"],
        $data["type"],
        $data["type_other"],
        $data["comment"],
        $data["no_answer"],
        $data["upassw"],
        date("Y-m-d H:i:s"),
        $data["ip"]
      )
    ) or die("cannot insert.".$this->$DB->ErrorMsg());

    $id=mysql_insert_id();
    
    $comment_id=$this->setCommentId($id);

    return $comment_id;
  }

  function setCommentId($id){
    // comment_id : YYMMDDNNNRRRR
    $is_set=0;
    while($is_set==0){
      $comment_id=date("ymd").sprintf("%04d",rand(1,9999));
      $sql=sprintf(
        "SELECT COUNT(*) as cnt
        FROM
          comments
        WHERE
          comment_id='%s'",
        mysql_escape_string($comment_id)
      );
      $tmp=$this->$DB->GetRow($sql);
      $is_set=($tmp["cnt"]==0) ? 1 : 0;
    }
    
    $sql=
      "UPDATE comments
      SET
        comment_id=?
      WHERE
        id=?";
    $this->$DB->execute(
      $sql,
      array(
        $comment_id,
        $id
      )
    ) or die("cannot insert.".$this->$DB->ErrorMsg());
    
    return $comment_id;
  }

  function update($data,$id){
  
    $sql=
      "UPDATE comments
      SET
        date_update=?,
        status=?
      WHERE
        id=?";

    $this->$DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        $data["status"],
        $id
      )
    ) or die($this->$DB->ErrorMsg());
    
  }

  function update2($data,$id){
  
    $sql=
      "UPDATE comments
      SET
        date_update=?,
        date_answer=?,
        status=?
      WHERE
        id=?";

    $this->$DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        date("Y-m-d H:i:s"),
        $data["status"],
        $id
      )
    ) or die($this->$DB->ErrorMsg());
    
  }

  function set_fileupload($id){
  
    $sql=sprintf(
      "SELECT status
      FROM
        comments
      WHERE
        id=%d",
      $id
    );
    $tmp=$this->$DB->GetRow($sql);
    
    if(!$tmp["status"]){
      $sql=
        "UPDATE comments
        SET
          date_update=?,
          status=?
        WHERE
          id=?";

      $this->$DB->execute(
        $sql,
        array(
          date("Y-m-d H:i:s"),
          3,
          $id
        )
      ) or die($this->$DB->ErrorMsg());
    }else{
      $sql=
        "UPDATE comments
        SET
          date_update=?
        WHERE
          id=?";

      $this->$DB->execute(
        $sql,
        array(
          date("Y-m-d H:i:s"),
          $id
        )
      ) or die($this->$DB->ErrorMsg());
    }
    
  }

  function set_date_seen($cid){
  
    $sql=
      "UPDATE comments
      SET
        date_seen=?
      WHERE
        comment_id=?";

    $this->$DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        $cid
      )
    ) or die($this->$DB->ErrorMsg());
    
  }

  function set_date_send($id){
  
    $sql=
      "UPDATE comments
      SET
        date_send=?,
        date_answer=?,
        status=?
      WHERE
        id=?";

    $this->$DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        date("Y-m-d H:i:s"),
        2,
        $id
      )
    ) or die($this->$DB->ErrorMsg());
    
  }

  function delete($id){
    $sql="DELETE FROM comments WHERE id=?";
    $this->$DB->execute($sql,$id);
  }
  
  function get_list(){
    $sql=
      "SELECT *
      FROM
        comments
      ORDER BY id DESC";
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_list_for_index(){
    $sql=
      "SELECT
        id,
        comment_id,
        status,
        date_regist,
        date_answer
      FROM
        comments
      ORDER BY id DESC";
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_one($id){
    $sql=sprintf(
      "SELECT *
      FROM
        comments
      WHERE
        id=%d",
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
  
}
?>