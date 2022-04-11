<?php
class TopImageManager{

  var $DB;
  
  function TopImageManager($db){
    $this->$DB=$db;
  }

  function update($url,$target,$anime_pattern,$is_visible,$opensec,$sort_num,$id){
  
    $sql=
      "UPDATE topimages
      SET
        url_1=?,
        url_2=?,
        url_3=?,
        url_4=?,
        url_5=?,
        url_6=?,
        url_7=?,
        url_8=?,
        url_9=?,
        url_10=?,
        url_11=?,
        url_12=?,
        target_1=?,
        target_2=?,
        target_3=?,
        target_4=?,
        target_5=?,
        target_6=?,
        target_7=?,
        target_8=?,
        target_9=?,
        target_10=?,
        target_11=?,
        target_12=?,
        anime_pattern=?,
        is_visible_4=?,
        is_visible_5=?,
        is_visible_6=?,
        is_visible_7=?,
        is_visible_8=?,
        is_visible_9=?,
        is_visible_10=?,
        is_visible_11=?,
        opensec_4=?,
        opensec_5=?,
        opensec_6=?,
        opensec_7=?,
        opensec_8=?,
        opensec_9=?,
        opensec_10=?,
        opensec_11=?,
        sort_num_4=?,
        sort_num_5=?,
        sort_num_6=?,
        sort_num_7=?,
        sort_num_8=?,
        sort_num_9=?,
        sort_num_10=?,
        sort_num_11=?
      WHERE
        id=?";

    $this->$DB->execute(
      $sql,
      array(
        $url[1],
        $url[2],
        $url[3],
        $url[4],
        $url[5],
        $url[6],
        $url[7],
        $url[8],
        $url[9],
        $url[10],
        $url[11],
        $url[12],
        $target[1],
        $target[2],
        $target[3],
        $target[4],
        $target[5],
        $target[6],
        $target[7],
        $target[8],
        $target[9],
        $target[10],
        $target[11],
        $target[12],
        $anime_pattern,
        $is_visible[4],
        $is_visible[5],
        $is_visible[6],
        $is_visible[7],
        $is_visible[8],
        $is_visible[9],
        $is_visible[10],
        $is_visible[11],
        $opensec[4],
        $opensec[5],
        $opensec[6],
        $opensec[7],
        $opensec[8],
        $opensec[9],
        $opensec[10],
        $opensec[11],
        $sort_num[4],
        $sort_num[5],
        $sort_num[6],
        $sort_num[7],
        $sort_num[8],
        $sort_num[9],
        $sort_num[10],
        $sort_num[11],
        $id
      )
    ) or die($this->$DB->ErrorMsg());
    
  }

  function get_one($id){
    $sql=sprintf(
      "SELECT *
      FROM
        topimages
      WHERE
        id=%d",
      $id
    );
    $tmp=$this->$DB->GetRow($sql);

    return $tmp;
  }
  
}
?>