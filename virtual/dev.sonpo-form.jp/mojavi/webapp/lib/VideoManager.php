<?php
class VideoManager{

  public $DB;
  
  function VideoManager($db){
    $this->DB=$db;
  }

  function insert($data){
    $sql=
      "INSERT INTO video (
        video1,
        video2,
        video3,
        video4,
        video5,
        syear,
        smonth,
        sday,
        eyear,
        emonth,
        eday,
        zipcode1,
        zipcode2,
        prefecture,
        address,
        name_dat,
        name_kana,
        tel1,
        tel2,
        tel3,
        fax1,
        fax2,
        fax3,
        email,
        method,
        month_1,
        day_1,
        visittime,
        szipcode1,
        szipcode2,
        sprefecture,
        saddress,
        sname_dat,
        sname_kana,
        stel1,
        stel2,
        stel3,
        sfax1,
        sfax2,
        sfax3,
        semail,
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
        @$data["video1"],
        @$data["video2"],
        @$data["video3"],
        @$data["video4"],
        @$data["video5"],
        @$data["syear"],
        @$data["smonth"],
        @$data["sday"],
        @$data["eyear"],
        @$data["emonth"],
        @$data["eday"],
        @$data["zipcode1"],
        @$data["zipcode2"],
        @$data["prefecture"],
        @$data["address"],
        @$data["name_dat"],
        @$data["name_kana"],
        @$data["tel1"],
        @$data["tel2"],
        @$data["tel3"],
        @$data["fax1"],
        @$data["fax2"],
        @$data["fax3"],
        @$data["email"],
        @$data["method"],
        @$data["month_1"],
        @$data["day_1"],
        @$data["visittime"],
        @$data["szipcode1"],
        @$data["szipcode2"],
        @$data["sprefecture"],
        @$data["saddress"],
        @$data["sname_dat"],
        @$data["sname_kana"],
        @$data["stel1"],
        @$data["stel2"],
        @$data["stel3"],
        @$data["sfax1"],
        @$data["sfax2"],
        @$data["sfax3"],
        @$data["semail"],
        date("Y-m-d H:i:s"),
        @$data["ip"]
      )
    ) or die("cannot insert.");

    $id=mysql_insert_id();
    
    $inst_id=$this->setCommentId($id);

    return $inst_id;
  }

  function setCommentId($id){
    // comment_id : YYMMDDNNNRRRR
    $is_set=0;
    while($is_set==0){
      $comment_id='V'.date("ymd").sprintf("%04d",rand(1,9999));
      $sql=sprintf(
        "SELECT COUNT(*) as cnt
        FROM
          video
        WHERE
          video_id='%s'",
        mysql_escape_string($comment_id)
      );
      $tmp=$this->DB->GetRow($sql);
      $is_set=($tmp["cnt"]==0) ? 1 : 0;
    }
    
    $sql=
      "UPDATE video
      SET
        video_id=?
      WHERE
        id=?";
    $this->DB->execute(
      $sql,
      array(
        $comment_id,
        $id
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());
    
    return $comment_id;
  }

  function update($data,$id){
  
    $sql=
      "UPDATE video
      SET
        date_update=?,
        rent_date=?,
        back_date=?,
        status=?,
        bikou=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        $data["rent_date"],
        $data["back_date"],
        $data["status"],
        $data["bikou"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function update2($data,$id){
  
    $sql=
      "UPDATE video
      SET
        date_update=?,
        date_answer=?,
        status=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        date("Y-m-d H:i:s"),
        $data["status"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function delete($id){
    $sql="DELETE FROM video WHERE id=?";
    $this->DB->execute($sql,$id);
  }
  
  function get_list($status,$year,$month){
    $where='';
    
    if($status && $status<>99){
      if($status==1){
        $status=0;
      }
      $where.=' AND status='.mysql_escape_string($status);
    }
    
    if($year && $year<>99){
      if($month && $month<>99){
        $start=date("Y-m-d H:i:s",mktime(0,0,0,$month,1,$year));
        $end  =date("Y-m-d H:i:s",mktime(0,0,0,$month+1,1,$year));
      }else{
        $start=date("Y-m-d H:i:s",mktime(0,0,0,1,1,$year));
        $end  =date("Y-m-d H:i:s",mktime(0,0,0,1,1,$year+1));
      }
      $where.=" AND rent_date>='".$start."' AND rent_date<'".$end."'";
    }

    if($where){
      $sql=sprintf(
        "SELECT *
        FROM
          video
        WHERE 1=1 %s
        ORDER BY id DESC",
        $where
      );
      $data=$this->DB->GetAll($sql);
      return $data;
    }else{
      $sql=
        "SELECT *
        FROM
          video
        ORDER BY id DESC";
      $data=$this->DB->GetAll($sql);
      return $data;
    }
  }
  
  function get_one($id){
    $sql=sprintf(
      "SELECT *
      FROM
        video
      WHERE
        id=%d",
      $id
    );
    $tmp=$this->DB->GetRow($sql);

    return $tmp;
  }
  
  function search($cid){
    $sql=sprintf(
      "SELECT *
      FROM
        video
      WHERE
        comment_id='%s'",
      mysql_escape_string($cid)
    );
    $tmp=$this->DB->GetAll($sql);

    return $tmp;
  }
  
}
?>