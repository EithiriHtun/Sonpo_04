<?php
class TopMessageManager{

  var $DB;
  
  function TopMessageManager($db){
    $this->$DB=$db;
  }

  function update($data,$id){
  
    $sql=
      "UPDATE topmessages
      SET
        sort_num=?,
        is_visible=?,
        message=?,
        link_url=?,
        target=?,
        open_datetime=?,
        update_datetime=?
      WHERE
        id=?";

    $this->$DB->execute(
      $sql,
      array(
        $data["sort_num"],
        $data["is_visible"],
        $data["message"],
        $data["link_url"],
        $data["target"],
        date(
          "Y-m-d H:i:s",
          mktime(
            $data['open_hour'],
            0,0,
            $data['open_month'],
            $data['open_day'],
            $data['open_year']
          )
        ),
        date("Y-m-d H:i:s",time()),
        $id
      )
    ) or die($this->$DB->ErrorMsg());
    
  }

  function get_one($id){
    $sql=sprintf(
      "SELECT *
      FROM
        topmessages
      WHERE
        id=%d",
      $id
    );
    $tmp=$this->$DB->GetRow($sql);
    
    $tmp['open_year']  = date("Y",strtotime($tmp['open_datetime']));
    $tmp['open_month'] = date("m",strtotime($tmp['open_datetime']));
    $tmp['open_day']   = date("d",strtotime($tmp['open_datetime']));
    $tmp['open_hour']  = date("H",strtotime($tmp['open_datetime']));

    return $tmp;
  }
  
  function get_all(){
    $sql=sprintf(
      "SELECT *
      FROM
        topmessages
      ORDER BY sort_num ASC, open_datetime DESC, update_datetime DESC, id DESC"
    );
    $tmp=$this->$DB->GetAll($sql);
    
    $tmp2 = array();
    foreach($tmp as $val){
      $val['open_year']  = date("Y",strtotime($val['open_datetime']));
      $val['open_month'] = date("m",strtotime($val['open_datetime']));
      $val['open_day']   = date("d",strtotime($val['open_datetime']));
      $val['open_hour']  = date("H",strtotime($val['open_datetime']));
      array_push($tmp2,$val);
    }

    return $tmp2;
  }
  
}
?>