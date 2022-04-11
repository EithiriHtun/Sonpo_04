<?php
class InstructorManager{

  public $DB;
  
  function InstructorManager($db){
    $this->DB=$db;
  }

  function insert($data){
    $sql=
      "INSERT INTO instructor (
        instructor.host,
        instructor.post1,
        instructor.post2,
        instructor.prefecture,
        instructor.address,
        instructor.tel1,
        instructor.tel2,
        instructor.tel3,
        instructor.fax1,
        instructor.fax2,
        instructor.fax3,
        instructor.person_last,
        instructor.person_first,
        instructor.person_kana_last,
        instructor.person_kana_first,
        instructor.email1,
        instructor.year_1,
        instructor.month_1,
        instructor.day_1,
        instructor.wTx01,
        instructor.hour_from_1,
        instructor.min_from_1,
        instructor.hour_to_1,
        instructor.min_to_1,
        instructor.year_2,
        instructor.month_2,
        instructor.day_2,
        instructor.wTx02,
        instructor.hour_from_2,
        instructor.min_from_2,
        instructor.hour_to_2,
        instructor.min_to_2,
        instructor.lecture_hall,
        instructor.lecture_prefecture,
        instructor.lecture_address,
        instructor.lecture_tel1,
        instructor.lecture_tel2,
        instructor.lecture_tel3,
        instructor.object_text,
        instructor.object_num,
        instructor.themes,
        instructor.theme_text,
        instructor.video,
        instructor.copy,
        instructor.receiver_address,
        instructor.receiver_text,
        instructor.exp,
        instructor.use_year,
        instructor.use_month,
        instructor.connection,
        instructor.date_regist,
        instructor.ip,
        instructor.naisen,
        instructor.yaku,
        instructor.use_pcprj,
        instructor.object_select,
        instructor.lecture_zip1,
        instructor.lecture_zip2,
        instructor.taisyou
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
        $data["host"],
        $data["post1"],
        $data["post2"],
        $data["prefecture"],
        $data["address"],
        $data["tel1"],
        $data["tel2"],
        $data["tel3"],
        $data["fax1"],
        $data["fax2"],
        $data["fax3"],
        $data["person_last"],
        $data["person_first"],
        $data["person_kana_last"],
        $data["person_kana_first"],
        $data["email1"],
        $data["year_1"],
        $data["month_1"],
        $data["day_1"],
        $data["wTx01"],
        $data["hour_from_1"],
        $data["min_from_1"],
        $data["hour_to_1"],
        $data["min_to_1"],
        $data["year_2"],
        $data["month_2"],
        $data["day_2"],
        $data["wTx02"],
        $data["hour_from_2"],
        $data["min_from_2"],
        $data["hour_to_2"],
        $data["min_to_2"],
        $data["lecture_hall"],
        $data["lecture_prefecture"],
        $data["lecture_address"],
        $data["lecture_tel1"],
        $data["lecture_tel2"],
        $data["lecture_tel3"],
        $data["object_text"],
        $data["object_num"],
        $data["themes"],
        $data["theme_text"],
        $data["video"],
        $data["copy"],
        $data["receiver_address"],
        $data["receiver_text"],
        $data["exp"],
        $data["use_year"],
        $data["use_month"],
        $data["connection"],
        date("Y-m-d H:i:s"),
        $data["ip"],
        $data["naisen"],
        $data["yaku"],
        $data["use_pcprj"],
        $data["object_select"],
        $data["lecture_zip1"],
        $data["lecture_zip2"],
        $data["object_select"]
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
      $comment_id='K'.date("ymd").sprintf("%04d",rand(1,9999));
      $sql=sprintf(
        "SELECT COUNT(*) as cnt
        FROM
          instructor
        WHERE
          inst_id='%s'",
        mysql_escape_string($comment_id)
      );
      $tmp=$this->DB->GetRow($sql);
      $is_set=($tmp["cnt"]==0) ? 1 : 0;
    }
    
    $sql=
      "UPDATE instructor
      SET
        inst_id=?
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

  function insert2($data){
    $sql=
      "INSERT INTO instructor (
        instructor.host,
        instructor.post1,
        instructor.post2,
        instructor.prefecture,
        instructor.address,
        instructor.tel1,
        instructor.tel2,
        instructor.tel3,
        instructor.fax1,
        instructor.fax2,
        instructor.fax3,
        instructor.person_last,
        instructor.person_first,
        instructor.person_kana_last,
        instructor.person_kana_first,
        instructor.email1,
        instructor.year_1,
        instructor.month_1,
        instructor.day_1,
        instructor.wTx01,
        instructor.hour_from_1,
        instructor.min_from_1,
        instructor.hour_to_1,
        instructor.min_to_1,
        instructor.year_2,
        instructor.month_2,
        instructor.day_2,
        instructor.wTx02,
        instructor.hour_from_2,
        instructor.min_from_2,
        instructor.hour_to_2,
        instructor.min_to_2,
        instructor.lecture_hall,
        instructor.lecture_prefecture,
        instructor.lecture_address,
        instructor.lecture_tel1,
        instructor.lecture_tel2,
        instructor.lecture_tel3,
        instructor.object_text,
        instructor.object_num,
        instructor.themes,
        instructor.theme_text,
        instructor.video,
        instructor.copy,
        instructor.receiver_address,
        instructor.receiver_text,
        instructor.exp,
        instructor.use_year,
        instructor.use_month,
        instructor.connection,
        instructor.date_regist,
        instructor.ip,
        instructor.naisen,
        instructor.yaku,
        instructor.use_pcprj,
        instructor.object_select,
        instructor.lecture_zip1,
        instructor.lecture_zip2,
        instructor.taisyou
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
        (@$data["host"])? $data["host"] : '',
        (@$data["post1"])? $data["post1"] : '',
        (@$data["post2"])? $data["post2"] : '',
        (@$data["prefecture"]) ? $data["prefecture"] : '',
        (@$data["address"])? $data["address"] : '',
        (@$data["tel1"])? $data["tel1"] : '',
        (@$data["tel2"])? $data["tel2"] : '',
        (@$data["tel3"])? $data["tel3"] : '',
        (@$data["fax1"])? $data["fax1"] : '',
        (@$data["fax2"])? $data["fax2"] : '',
        (@$data["fax3"])? $data["fax3"] : '',
        (@$data["person_last"])? $data["person_last"] : '',
        (@$data["person_first"])? $data["person_first"] : '',
        (@$data["person_kana_last"])? $data["person_kana_last"] : '',
        (@$data["person_kana_first"])? $data["person_kana_first"] : '',
        (@$data["email1"])? $data["email1"] : '',
        (@$data["year_1"])? $data["year_1"] : '',
        (@$data["month_1"])? $data["month_1"] : '',
        (@$data["day_1"])? $data["day_1"] : '',
        (@$data["wTx01"])? $data["wTx01"] : '',
        (@$data["hour_from_1"])? $data["hour_from_1"] : '',
        (@$data["min_from_1"])? $data["min_from_1"] : '',
        (@$data["hour_to_1"])? $data["hour_to_1"] : '',
        (@$data["min_to_1"])? $data["min_to_1"] : '',
        (@$data["year_2"])? $data["year_2"] : '',
        (@$data["month_2"])? $data["month_2"] : '',
        (@$data["day_2"])? $data["day_2"] : '',
        (@$data["wTx02"])? $data["wTx02"] : '',
        (@$data["hour_from_2"])? $data["hour_from_2"] : '',
        (@$data["min_from_2"])? $data["min_from_2"] : '',
        (@$data["hour_to_2"])? $data["hour_to_2"] : '',
        (@$data["min_to_2"])? $data["min_to_2"] : '',
        (@$data["lecture_hall"])? $data["lecture_hall"] : '',
        (@$data["lecture_prefecture"]) ? $data["lecture_prefecture"] : 0,
        (@$data["lecture_address"])? $data["lecture_address"] : '',
        (@$data["lecture_tel1"])? $data["lecture_tel1"] : '',
        (@$data["lecture_tel2"])? $data["lecture_tel2"] : '',
        (@$data["lecture_tel3"])? $data["lecture_tel3"] : '',
        (@$data["object_text"])? $data["object_text"] : '',
        (@$data["object_num"])? $data["object_num"] : '',
        (@$data["themes"]) ? $data["themes"] : 0,
        (@$data["theme_text"])? $data["theme_text"] : '',
        (@$data["video"]) ? $data["video"] : 0,
        (@$data["copy"])? $data["copy"] : '',
        (@$data["receiver_address"])? $data["receiver_address"] : '',
        (@$data["receiver_text"])? $data["receiver_text"] : '',
        (@$data["exp"]) ? $data["exp"] : 0,
        (@$data["use_year"])? $data["use_year"] : '',
        (@$data["use_month"])? $data["use_month"] : '',
        (@$data["connection"])? $data["connection"] : '',
        date("Y-m-d H:i:s"),
        (@$data["ip"])? $data["ip"] : '',
        @$data["naisen"],
        @$data["yaku"],
        @$data["use_pcprj"],
        @$data["object_select"],
        @$data["lecture_zip1"],
        @$data["lecture_zip2"],
        (@$data["object_select"])? $data["object_select"] : ''
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    
    $this->_set_log($sql, array(
        (@$data["host"])? $data["host"] : '',
        (@$data["post1"])? $data["post1"] : '',
        (@$data["post2"])? $data["post2"] : '',
        (@$data["prefecture"]) ? $data["prefecture"] : '',
        (@$data["address"])? $data["address"] : '',
        (@$data["tel1"])? $data["tel1"] : '',
        (@$data["tel2"])? $data["tel2"] : '',
        (@$data["tel3"])? $data["tel3"] : '',
        (@$data["fax1"])? $data["fax1"] : '',
        (@$data["fax2"])? $data["fax2"] : '',
        (@$data["fax3"])? $data["fax3"] : '',
        (@$data["person_last"])? $data["person_last"] : '',
        (@$data["person_first"])? $data["person_first"] : '',
        (@$data["person_kana_last"])? $data["person_kana_last"] : '',
        (@$data["person_kana_first"])? $data["person_kana_first"] : '',
        (@$data["email1"])? $data["email1"] : '',
        (@$data["year_1"])? $data["year_1"] : '',
        (@$data["month_1"])? $data["month_1"] : '',
        (@$data["day_1"])? $data["day_1"] : '',
        (@$data["wTx01"])? $data["wTx01"] : '',
        (@$data["hour_from_1"])? $data["hour_from_1"] : '',
        (@$data["min_from_1"])? $data["min_from_1"] : '',
        (@$data["hour_to_1"])? $data["hour_to_1"] : '',
        (@$data["min_to_1"])? $data["min_to_1"] : '',
        (@$data["year_2"])? $data["year_2"] : '',
        (@$data["month_2"])? $data["month_2"] : '',
        (@$data["day_2"])? $data["day_2"] : '',
        (@$data["wTx02"])? $data["wTx02"] : '',
        (@$data["hour_from_2"])? $data["hour_from_2"] : '',
        (@$data["min_from_2"])? $data["min_from_2"] : '',
        (@$data["hour_to_2"])? $data["hour_to_2"] : '',
        (@$data["min_to_2"])? $data["min_to_2"] : '',
        (@$data["lecture_hall"])? $data["lecture_hall"] : '',
        (@$data["lecture_prefecture"]) ? $data["lecture_prefecture"] : 0,
        (@$data["lecture_address"])? $data["lecture_address"] : '',
        (@$data["lecture_tel1"])? $data["lecture_tel1"] : '',
        (@$data["lecture_tel2"])? $data["lecture_tel2"] : '',
        (@$data["lecture_tel3"])? $data["lecture_tel3"] : '',
        (@$data["object_text"])? $data["object_text"] : '',
        (@$data["object_num"])? $data["object_num"] : '',
        (@$data["themes"]) ? $data["themes"] : 0,
        (@$data["theme_text"])? $data["theme_text"] : '',
        (@$data["video"]) ? $data["video"] : 0,
        (@$data["copy"])? $data["copy"] : '',
        (@$data["receiver_address"])? $data["receiver_address"] : '',
        (@$data["receiver_text"])? $data["receiver_text"] : '',
        (@$data["exp"]) ? $data["exp"] : 0,
        (@$data["use_year"])? $data["use_year"] : '',
        (@$data["use_month"])? $data["use_month"] : '',
        (@$data["connection"])? $data["connection"] : '',
        date("Y-m-d H:i:s"),
        (@$data["ip"])? $data["ip"] : '',
        @$data["naisen"],
        @$data["yaku"],
        @$data["use_pcprj"],
        @$data["object_select"],
        @$data["lecture_zip1"],
        @$data["lecture_zip2"],
        (@$data["object_select"])? $data["object_select"] : ''
      ),'insert',$id);

    $inst_id=$this->setCommentId($id);

    return $inst_id;
  }

  function insert3($data){
    $sql=
      "INSERT INTO instructor (
        instructor.host,
        instructor.post1,
        instructor.post2,
        instructor.prefecture,
        instructor.address,
        instructor.tel1,
        instructor.tel2,
        instructor.tel3,
        instructor.fax1,
        instructor.fax2,
        instructor.fax3,
        instructor.person_last,
        instructor.person_first,
        instructor.person_kana_last,
        instructor.person_kana_first,
        instructor.email1,
        instructor.year_1,
        instructor.month_1,
        instructor.day_1,
        instructor.wTx01,
        instructor.hour_from_1,
        instructor.min_from_1,
        instructor.hour_to_1,
        instructor.min_to_1,
        instructor.year_2,
        instructor.month_2,
        instructor.day_2,
        instructor.wTx02,
        instructor.hour_from_2,
        instructor.min_from_2,
        instructor.hour_to_2,
        instructor.min_to_2,
        instructor.lecture_hall,
        instructor.lecture_prefecture,
        instructor.lecture_address,
        instructor.lecture_tel1,
        instructor.lecture_tel2,
        instructor.lecture_tel3,
        instructor.object_text,
        instructor.object_num,
        instructor.themes,
        instructor.theme_text,
        instructor.video,
        instructor.copy,
        instructor.receiver_address,
        instructor.receiver_text,
        instructor.exp,
        instructor.use_year,
        instructor.use_month,
        instructor.connection,
        instructor.date_regist,
        instructor.ip,
        instructor.naisen,
        instructor.yaku,
        instructor.use_pcprj,
        instructor.object_select,
        instructor.lecture_zip1,
        instructor.lecture_zip2,
        instructor.taisyou
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
        (@$data["host"])? $data["host"] : '',
        (@$data["post1"])? $data["post1"] : '',
        (@$data["post2"])? $data["post2"] : '',
        (@$data["prefecture"]) ? $data["prefecture"] : '',
        (@$data["address"])? $data["address"] : '',
        (@$data["tel1"])? $data["tel1"] : '',
        (@$data["tel2"])? $data["tel2"] : '',
        (@$data["tel3"])? $data["tel3"] : '',
        (@$data["fax1"])? $data["fax1"] : '',
        (@$data["fax2"])? $data["fax2"] : '',
        (@$data["fax3"])? $data["fax3"] : '',
        (@$data["person_last"])? $data["person_last"] : '',
        (@$data["person_first"])? $data["person_first"] : '',
        (@$data["person_kana_last"])? $data["person_kana_last"] : '',
        (@$data["person_kana_first"])? $data["person_kana_first"] : '',
        (@$data["email1"])? $data["email1"] : '',
        (@$data["year_1"])? $data["year_1"] : '',
        (@$data["month_1"])? $data["month_1"] : '',
        (@$data["day_1"])? $data["day_1"] : '',
        (@$data["wTx01"])? $data["wTx01"] : '',
        (@$data["hour_from_1"])? $data["hour_from_1"] : '',
        (@$data["min_from_1"])? $data["min_from_1"] : '',
        (@$data["hour_to_1"])? $data["hour_to_1"] : '',
        (@$data["min_to_1"])? $data["min_to_1"] : '',
        (@$data["year_2"])? $data["year_2"] : '',
        (@$data["month_2"])? $data["month_2"] : '',
        (@$data["day_2"])? $data["day_2"] : '',
        (@$data["wTx02"])? $data["wTx02"] : '',
        (@$data["hour_from_2"])? $data["hour_from_2"] : '',
        (@$data["min_from_2"])? $data["min_from_2"] : '',
        (@$data["hour_to_2"])? $data["hour_to_2"] : '',
        (@$data["min_to_2"])? $data["min_to_2"] : '',
        (@$data["lecture_hall"])? $data["lecture_hall"] : '',
        (@$data["lecture_prefecture"]) ? $data["lecture_prefecture"] : 0,
        (@$data["lecture_address"])? $data["lecture_address"] : '',
        (@$data["lecture_tel1"])? $data["lecture_tel1"] : '',
        (@$data["lecture_tel2"])? $data["lecture_tel2"] : '',
        (@$data["lecture_tel3"])? $data["lecture_tel3"] : '',
        (@$data["object_text"])? $data["object_text"] : '',
        (@$data["object_num"])? $data["object_num"] : '',
        (@$data["themes"]) ? $data["themes"] : 0,
        (@$data["theme_text"])? $data["theme_text"] : '',
        (@$data["video"]) ? $data["video"] : 0,
        (@$data["copy"])? $data["copy"] : '',
        (@$data["receiver_address"])? $data["receiver_address"] : '',
        (@$data["receiver_text"])? $data["receiver_text"] : '',
        (@$data["exp"]) ? $data["exp"] : 0,
        (@$data["use_year"])? $data["use_year"] : '',
        (@$data["use_month"])? $data["use_month"] : '',
        (@$data["connection"])? $data["connection"] : '',
        date("Y-m-d H:i:s"),
        (@$data["ip"])? $data["ip"] : '',
        @$data["naisen"],
        @$data["yaku"],
        @$data["use_pcprj"],
        @$data["object_select"],
        @$data["lecture_zip1"],
        @$data["lecture_zip2"],
        (@$data["object_select"])? $data["object_select"] : ''
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

    $id=mysql_insert_id();
    
    $inst_id=$this->setCommentId($id);

    return $id;
  }

  function update($data,$id){
  
    $sql=
      "UPDATE instructor
      SET
        instructor.date_update=?,
        instructor.status=?,
        instructor.year_3=?,
        instructor.month_3=?,
        instructor.day_3=?,
        instructor.taisyou=?,
        instructor.syoukai=?,
        instructor.theme2=?,
        instructor.inst_type=?,
        instructor.inst_name=?,
        instructor.branch=?,
        instructor.inst_num=?,
        instructor.shiryou=?,
        instructor.shiryou_other=?,
        instructor.inst_condition=?,
        instructor.inst_hour=?,
        instructor.inst_min=?,
        instructor.bikou=?,
        instructor.host2=?,
        instructor.szip1=?,
        instructor.szip2=?,
        instructor.spref=?,
        instructor.saddress=?,
        instructor.sname=?,
        instructor.stel1=?,
        instructor.stel2=?,
        instructor.stel3=?,
        instructor.stekiyou=?,
        instructor.stantou=?,
        instructor.syear=?,
        instructor.smonth=?,
        instructor.sday=?,
        instructor.sregist=?,
        instructor.t_tantou=?
      WHERE
        instructor.id=?";

    $this->_set_log($sql,array(),'update',$id,'before');

    $sdocs='';
    if($data["sdocs"]){
      foreach($data["sdocs"] as $val){
        $sdocs.=$val.",";
      }
    }

    $this->DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        @$data["status"],
        @$data["year_3"],
        @$data["month_3"],
        @$data["day_3"],
        @$data["taisyou"],
        @$data["syoukai"],
        @$data["theme2"],
        @$data["inst_type"],
        @$data["inst_name"],
        @$data["branch"],
        @$data["inst_num"],
        @$data["shiryou"],
        @$data["shiryou_other"],
        @$data["inst_condition"],
        @$data["inst_hour"],
        @$data["inst_min"],
        @$data["bikou"],
        @$data["host2"],
        @$data["szip1"],
        @$data["szip2"],
        @$data["spref"],
        @$data["saddress"],
        @$data["sname"],
        @$data["stel1"],
        @$data["stel2"],
        @$data["stel3"],
        @$data["stekiyou"],
        @$data["stantou"],
        @$data["syear"],
        @$data["smonth"],
        @$data["sday"],
        @$data["sregist"],
        @$data["t_tantou"],
        @$id
      )
    ) or die($this->DB->ErrorMsg());
    
    $this->_set_log($sql,array(
        date("Y-m-d H:i:s"),
        @$data["status"],
        @$data["year_3"],
        @$data["month_3"],
        @$data["day_3"],
        @$data["taisyou"],
        @$data["syoukai"],
        @$data["theme2"],
        @$data["inst_type"],
        @$data["inst_name"],
        @$data["branch"],
        @$data["inst_num"],
        @$data["shiryou"],
        @$data["shiryou_other"],
        @$data["inst_condition"],
        @$data["inst_hour"],
        @$data["inst_min"],
        @$data["bikou"],
        @$data["host2"],
        @$data["szip1"],
        @$data["szip2"],
        @$data["spref"],
        @$data["saddress"],
        @$data["sname"],
        @$data["stel1"],
        @$data["stel2"],
        @$data["stel3"],
        @$data["stekiyou"],
        @$data["stantou"],
        @$data["syear"],
        @$data["smonth"],
        @$data["sday"],
        @$data["sregist"],
        @$data["t_tantou"],
        @$id
      ),'update',$id,'after');

  }

  function update2($data,$id){
  
    $sql=
      "UPDATE instructor
      SET
        instructor.date_update=?,
        instructor.date_answer=?,
        instructor.status=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        date("Y-m-d H:i:s"),
        @$data["status"],
        @$id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function trans_update($data,$id){
  
    $sql=
      "UPDATE instructor
      SET
        instructor.t_syear=?,
        instructor.t_smonth=?,
        instructor.t_sday=?,
        instructor.t_ayear=?,
        instructor.t_amonth=?,
        instructor.t_aday=?,
        instructor.t_bikou=?,
        instructor.t_status=?,
        instructor.t_status2=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        @$data["t_syear"],
        @$data["t_smonth"],
        @$data["t_sday"],
        @$data["t_ayear"],
        @$data["t_amonth"],
        @$data["t_aday"],
        @$data["t_bikou"],
        @$data["t_status"],
        @$data["t_status2"],
        @$id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function delete($id){
    $sql="UPDATE instructor SET is_delete=1 WHERE id=?";
    
    $this->_set_log($sql,array($id),'update',$id,'before');
    
    $this->DB->execute($sql,array($id));

    $this->_set_log($sql,array($id),'update',$id,'after');
  }
  
/*
  function delete($id){
    $sql="DELETE FROM instructor WHERE id=?";
    $this->DB->execute($sql,$id);
  }
*/
  
  function del_sregist($id){
    $sql="UPDATE instructor SET sregist=0 WHERE id=?";
    $this->DB->execute($sql,$id);
  }
  
  function get_list($where){
    if($where){
      $sql=sprintf(
        "SELECT *
        FROM
          instructor
        WHERE (%s) AND (is_delete=0 OR is_delete IS NULL)
        ORDER BY id DESC",
        mysql_escape_string($where)
      );
      $data=$this->DB->GetAll($sql);

      $this->_set_log($sql,array(),'list');

      return $data;
    }else{
      $sql=
        "SELECT *
        FROM
          instructor
        WHERE (is_delete=0 OR is_delete IS NULL)
        ORDER BY id DESC";
      $data=$this->DB->GetAll($sql);

      $this->_set_log($sql,array(),'list');

      return $data;
    }
  }
  
  function get_list2($where){
    if($where){
      $sql=sprintf(
        "SELECT
          id,
          year_1,
          month_1,
          day_1,
          year_2,
          month_2,
          day_2,
          year_3,
          month_3,
          day_3,
          status,
          taisyou,
          trans_status,
          inst_id,
          branch,
          lecture_prefecture,
          host2,
          host,
          themes,
          theme2,
          sregist,
          sdocs,
          t_status,
          t_status2
        FROM
          instructor
        WHERE %s AND is_delete=0
        ORDER BY id DESC",
        mysql_escape_string($where)
      );
      $data=$this->DB->GetAll($sql);
      return $data;
    }else{
      $sql=
        "SELECT *
        FROM
          instructor
        WHERE
          is_delete=0
        ORDER BY id DESC";
      $data=$this->DB->GetAll($sql);
      return $data;
    }
  }
  
  function get_one($id){
    $sql=sprintf(
      "SELECT *
      FROM
        instructor
      WHERE
        id=%d",
      $id
    );

    $tmp=$this->DB->GetRow($sql);

    $this->_set_log($sql,array(),'select',$id);

    if(@$tmp["sdocs"]){
      $sdocs=$tmp["sdocs"];
      preg_replace("/,$/","",$sdocs);
      $tmp2=explode(",",$sdocs);
      $tmp["sdocs"]=$tmp2;
    }

    return $tmp;
  }
  
  function get_inactive_list(){
    
    $sql=
      "SELECT *
      FROM
        instructor
      WHERE is_delete=1
      ORDER BY id DESC";
    $data=$this->DB->GetAll($sql);
    return $data;

  }

  function search($cid){
    $sql=sprintf(
      "SELECT *
      FROM
        instructor
      WHERE
        comment_id='%s'",
      mysql_escape_string($cid)
    );
    $tmp=$this->DB->GetAll($sql);

    return $tmp;
  }
  
  function get_year_list(){
    $sql="SELECT
        year_1,month_1,day_1,
        year_3,month_3,day_3
      FROM
        instructor
      WHERE
        is_delete=0";

    $data=$this->DB->GetAll($sql);
    
    $years=array();
    if($data){
      foreach($data as $key=>$val){
        if($val['year_3']){
          if($val['month_3']>3){
            $years[$val['year_3']]=1;
          }else{
            $years[$val['year_3']-1]=1;
          }
        }else{
          if($val['month_1']>3){
            $years[$val['year_1']]=1;
          }else{
            $years[$val['year_1']-1]=1;
          }
        }
      }
    }
    
    krsort($years);
    
    return $years;
  }
  
  function get_trans_year_list(){
    $year_tmp=date("Y");
    $month   =date("m");
    
    $year_tmp=$year_tmp-2;

    $year=$year_tmp;
    if($month<4){
      $year=$year-1;//fiscal year
    }

    $sql="SELECT
        year_1,month_1,day_1,
        year_2,month_2,day_2,
        year_3,month_3,day_3
      FROM
        instructor
      WHERE
        is_delete=0
        AND
        sregist=1
        AND
        (status=2 OR status=3)";

    $data=$this->DB->GetAll($sql);
    
    $years=array();
    if($data){
      foreach($data as $key=>$val){
        if($val['year_3']){
          if(
            $val['year_3']>$year &&
            $val['month_3']>3
          ){
            $years[$val['year_3']]=1;
          }else{
            if($val['year_3']>$year+1){
              $years[$val['year_3']-1]=1;
            }
          }
        }else{
          if(
            $val['year_1']>$year &&
            $val['month_1']>3
          ){
            $years[$val['year_1']]=1;
          }else{
            if($val['year_1']>$year+1){
              $years[$val['year_1']-1]=1;
            }
          }
        }
      }
    }
    
    krsort($years);
    
    return $years;
  }
  
  function check_delete(){
    $year_tmp=date("Y");
    $month   =date("m");
    
    $year_tmp=$year_tmp-2;

    $year=$year_tmp;
    if($month<4){
      $year=$year-1;//fiscal year
    }
    
    $ids=array();
    $sql="SELECT
        id,
        year_1,
        month_1,
        year_3,
        month_3
      FROM
        instructor";
      
    $data=$this->DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["year_3"]){
          if(
            (
              $val["year_3"]<$year &&
              $val["month_3"]>3
            ) ||
            (
              $val["year_3"]<$year+1 &&
              $val["month_3"]<4
            )
          ){
            array_push($ids, $val["id"]);
          }
        }elseif($val["year_1"]){
          if(
            (
              $val["year_1"]<$year &&
              $val["month_1"]>3
            ) ||
            (
              $val["year_1"]<$year+1 &&
              $val["month_1"]<4
            )
          ){
            array_push($ids, $val["id"]);
          }
        }
      }
    }
    
    if($ids){
      foreach($ids as $val){
        $sql="DELETE FROM instructor WHERE id=?";
        $this->DB->execute($sql,$val);
      }
    }
  }
  
  function del_one_inst($id){
  
    if($id){

      $sql="DELETE FROM instructor WHERE id=?";

      $this->_set_log($sql,array($id),'delete',$id);

      $this->DB->execute($sql,array($id));

    }

    return;
  }
  
  function activate_inst($id){
    if($id){
      $sql="UPDATE instructor SET is_delete=0 WHERE id=?";

      $this->_set_log($sql,array($id),'update',$id,'before');

      $this->DB->execute($sql,array($id));

      $this->_set_log($sql,array($id),'update',$id,'after');
    }
    return;
  }
  
  function get_log($sdate,$edate){
    $sql = "SELECT * FROM log_instructor WHERE log_datetime>? AND log_datetime<=? ORDER BY log_datetime ASC";
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
      $ldata['instructor_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());

    }elseif($extype=="update"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['instructor_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());

    }elseif($extype=="insert"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['instructor_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());

    }elseif($extype=="delete"){
      $row = $this->_get_record($rid);
    
      foreach($fields2 as $key){
        $ldata[$key] = $row[$key];
      }
      $ldata['instructor_id'] = $row['id'];
      unset($ldata['id']);

      $query = $this->_makeInsertQuery($ldata);

      $this->DB->execute($query,$ldata) or die("cannot insert.".$this->DB->ErrorMsg());
    }
    
  }
  
  function _get_record($id){
    $sql = "SELECT * FROM instructor WHERE id=?";
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
    return 'INSERT INTO log_instructor ('.implode(',',$columns).') VALUES ('.implode(',',$values).')';
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
    //instructor
    return array(
      'instructor_id',
      '`host`',
      'post1',
      'post2',
      'prefecture',
      'address',
      'tel1',
      'tel2',
      'tel3',
      'fax1',
      'fax2',
      'fax3',
      'person_last',
      'person_first',
      'person_kana_last',
      'person_kana_first',
      'email1',
      'year_1',
      'month_1',
      'day_1',
      'wTx01',
      'hour_from_1',
      'min_from_1',
      'hour_to_1',
      'min_to_1',
      'year_2',
      'month_2',
      'day_2',
      'wTx02',
      'hour_from_2',
      'min_from_2',
      'hour_to_2',
      'min_to_2',
      'lecture_hall',
      'lecture_prefecture',
      'lecture_address',
      'lecture_tel1',
      'lecture_tel2',
      'lecture_tel3',
      'object_text',
      'object_num',
      'themes',
      'theme_text',
      'video',
      'copy',
      'receiver_address',
      'receiver_text',
      'exp',
      'use_year',
      'use_month',
      'connection',
      'date_regist',
      'ip',
      'year_3',
      'month_3',
      'day_3',
      'taisyou',
      'syoukai',
      'theme2',
      'inst_type',
      'inst_name',
      'branch',
      'inst_num',
      'shiryou',
      'shiryou_num',
      'shiryou_other',
      'inst_condition',
      'inst_hour',
      'inst_min',
      'bikou',
      'status',
      'inst_id',
      'date_update',
      'host2',
      'naisen',
      'yaku',
      'use_pcprj',
      'szip1',
      'szip2',
      'spref',
      'saddress',
      'sname',
      'stel1',
      'stel2',
      'stel3',
      'stekiyou',
      'sdocs',
      'stantou',
      'syear',
      'smonth',
      'sday',
      'sregist',
      't_syear',
      't_smonth',
      't_sday',
      't_ayear',
      't_amonth',
      't_aday',
      't_bikou',
      't_status',
      't_status2',
      'object_select',
      'lecture_zip1',
      'lecture_zip2',
      't_tantou',
      'is_delete'
    );
  }

}
?>