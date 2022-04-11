<?php
class ReleaseManager{

  var $DB;
  
  function ReleaseManager($db){
    $this->$DB=$db;
  }

  function to_invisible($id){
    $sql=
      "UPDATE articles
      SET
        visible=?
      WHERE
        id=?";

    $this->$DB->execute(
      $sql,
      array(
        0,
        $id
      )
    ) or die($this->$DB->ErrorMsg());
    
  }
  
  function get_top_list($tab){
    if($tab==""){
      $where=' (category=1 OR category=2 OR category=4) AND ';
    }elseif($tab=='nr'){//ニュースリリース
      $where=' category=1 AND ';
    }elseif($tab=='pz'){//懸賞
      $where=' category=2 AND ';
    }elseif($tab=='in'){//おしらせ
      $where=' category=4 AND ';
    }
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        %s
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC
      LIMIT 0,20",
      $where
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_en_top_list(){
    $where=' (category=5 OR category=6 OR category=7) AND ';
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        %s
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $where
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_info_list($branch_id){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=3
        AND
        branch=%d
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $branch_id
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }

  function get_all_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        (category=1 OR category=2 OR category=4)
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_all_new_list(){
    $sql=
      "SELECT *
      FROM
        articles
      WHERE
        (category=1 OR category=2 OR category=4)
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC
      LIMIT 0,60";
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_info_list($branch_id){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=3
        AND
        branch=%d
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $branch_id
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_news_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=1
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_prize_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=2
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_topic_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=4
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_en_news_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=5
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_en_state_list(){
    $sql=
      "SELECT *
      FROM
        articles
      WHERE
        category=6
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC";
    
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_news_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=1
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_topic_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=4
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_prize_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=2
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_en_news_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=5
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_en_state_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=6
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_en_info_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=7
        AND
        (
          (
            open_year=%d
            AND
            open_month>3
          )
          OR
          (
            open_year=%d
            AND
            open_month<4
          )
        )
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      $year,
      $year+1
    );
    $data=$this->$DB->GetAll($sql);
    return $data;
  }
  
  function get_open_all_list_years(){
    $sql=
      "SELECT
        open_year,
        open_month
      FROM
        articles
      WHERE
        (category=1 OR category=2 OR category=4)
        AND
        visible=1";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_open_topic_list_years(){
    $sql=
      "SELECT *
      FROM
        articles
      WHERE
        category=4
        AND
        visible=1";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_open_prize_list_years(){
    $sql=
      "SELECT
        open_year,
        open_month
      FROM
        articles
      WHERE
        category=2
        AND
        visible=1";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_open_news_list_years(){
    $sql=
      "SELECT
        open_month,
        open_year
      FROM
        articles
      WHERE
        category=1
        AND
        visible=1";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_open_en_news_list_years(){
    $sql=
      "SELECT
        open_month,
        open_year
      FROM
        articles
      WHERE
        category=5
        AND
        visible=1";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_open_en_state_list_years(){
    $sql=
      "SELECT
        open_month,
        open_year
      FROM
        articles
      WHERE
        category=6
        AND
        visible=1";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_prize_list_years(){
    $sql=
      "SELECT
        open_month,
        open_year
      FROM
        articles
      WHERE
        open_year>0 AND
        category=2";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_topic_list_years(){
    $sql=
      "SELECT
        open_year,
        open_month
      FROM
        articles
      WHERE
        open_year>0 AND
        category=4";
    $data=$this->$DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        $years[$val["open_year"]]++;
      }else{
        $years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_news_list_years(){
    $sql=
      "SELECT
        open_year,
        open_month
      FROM
        articles
      WHERE
        open_year>0 AND
        category=1";
    $data=$this->$DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            $years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            $years[$val["open_year"]-1]++;
          }
        }
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_en_news_list_years(){
    $sql=
      "SELECT
        open_year,
        open_month
      FROM
        articles
      WHERE
        open_year>0 AND
        category=5";
    $data=$this->$DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            $years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            $years[$val["open_year"]-1]++;
          }
        }
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_en_state_list_years(){
    $sql=
      "SELECT
        open_year,
        open_month
      FROM
        articles
      WHERE
        open_year>0 AND
        category=6";
    $data=$this->$DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            $years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            $years[$val["open_year"]-1]++;
          }
        }
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_en_info_list_years(){
    $sql=
      "SELECT
        open_year,
        open_month
      FROM
        articles
      WHERE
        open_year>0 AND
        category=7";
    $data=$this->$DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            $years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            $years[$val["open_year"]-1]++;
          }
        }
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_count(){
    $sql=
      "SELECT COUNT(*) as cnt
      FROM
        articles";
    return $this->$DB->GetRow($sql);
  }
  
  function get_one($id){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        id=%d",
      $id
    );
    $tmp=$this->$DB->GetRow($sql);

    return $tmp;
  }
  
  function get_filename($id){
    $sql=sprintf(
      "SELECT filename
      FROM
        articles
      WHERE
        id=%d",
      $id
    );
    $tmp=$this->$DB->GetRow($sql);

    return $tmp["filename"];
  }
  
  function update_file_date($id){
    $sql=
      "UPDATE articles
      SET
        file_date=?
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
  
  function update_upload_filename($id,$filename){
    $sql=
      "UPDATE articles
      SET
        upload_filename=?
      WHERE
        id=?";
        
    $this->$DB->execute(
      $sql,
      array(
        $filename,
        $id
      )
    ) or die($this->$DB->ErrorMsg());
  }
  
  function delete_article($id){
    $sql="DELETE FROM articles WHERE id=?";
    $this->$DB->execute($sql,array($id)) or die("cannot delete.".$this->$DB->ErrorMsg());
  }
  
}
?>