<?php
class ArticleManager{

  var $DB;
  
  function ArticleManager($db){
    $this->DB=$db;
  }

  function insert($data){
    $sql=
      "INSERT INTO articles (
        category,
        regist_date,
        update_date,
        editor,
        visible,
        branch,
        list_title,
        article_title,
        content,
        link_text_1,
        link_text_2,
        link_text_3,
        link_text_4,
        link_text_5,
        link_url_1,
        link_url_2,
        link_url_3,
        link_url_4,
        link_url_5,
        open_year,
        open_month,
        open_day,
        open_hour,
        link_top,
        show_scroll
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
        ?
      )";

//$this->DB->LogSQL();

    $this->DB->execute(
      $sql,
      array(
        @$data["category"],
        date("Y-m-d H:i:s"),
        date("Y-m-d H:i:s"),
        @$data["editor"],
        @$data["visible"],
        @$data["branch"],
        @$data["list_title"],
        @$data["article_title"],
        @$data["content"],
        @$data["link_text_1"],
        @$data["link_text_2"],
        @$data["link_text_3"],
        @$data["link_text_4"],
        @$data["link_text_5"],
        @$data["link_url_1"],
        @$data["link_url_2"],
        @$data["link_url_3"],
        @$data["link_url_4"],
        @$data["link_url_5"],
        @$data["open_year"],
        @$data["open_month"],
        @$data["open_day"],
        @$data["open_hour"],
        @$data["link_top"],
        @$data["show_scroll"]
      )
    ) or die("cannot insert.".$this->DB->ErrorMsg());

//$this->DB->LogSQL(false);

//$perf = NewPerfMonitor($this->DB);
//echo $perf->SuspiciousSQL();
//echo $perf->ExpensiveSQL();

    $id=mysql_insert_id();
    
    if($data["category"]==3){
      $sql=sprintf(
        "SELECT
          filename
        FROM
          articles
        WHERE
          category=%d
          AND
          branch=%d
          AND
          filename LIKE '%s'
        ORDER BY filename DESC",
        $data["category"],
        $data["branch"],
        sprintf("%02d%02d",substr($data["open_year"],2,2),$data["open_month"]).'%'
      );
      $tmp=$this->DB->GetRow($sql);
      if(@$tmp["filename"]){
        $tmp_filename=explode("_",$tmp["filename"]);
        $file_count=$tmp_filename[1]*1+1;
      }else{
        $file_count=1;
      }
      
    }else{

      $sql=sprintf(
        "SELECT
          filename
        FROM
          articles
        WHERE
          category=%d
          AND
          filename LIKE '%s'
        ORDER BY filename DESC",
        $data["category"],
      sprintf("%02d%02d",substr($data["open_year"],2,2),$data["open_month"]).'%'
      );
      $tmp=$this->DB->GetRow($sql);
      if(@$tmp["filename"]){
        $tmp_filename=explode("_",$tmp["filename"]);
        $file_count=$tmp_filename[1]*1+1;
      }else{
        $file_count=1;
      }
      
    }
    
    $sql=
      "UPDATE articles
      SET
        filename=?
      WHERE
        id=?";
    $this->DB->execute(
      $sql,
      array(
        sprintf(
          "%02d%02d_%02d",
          substr($data["open_year"],2,2),
          $data["open_month"],
          $file_count
        ),
        $id
      )
    ) or die("cannot update.".$this->DB->ErrorMsg());

    return $id;
  }
  
  function update($data,$id){
  
    $sql=
      "UPDATE articles
      SET
        update_date=?,
        editor=?,
        visible=?,
        list_title=?,
        article_title=?,
        content=?,
        link_text_1=?,
        link_text_2=?,
        link_text_3=?,
        link_text_4=?,
        link_text_5=?,
        link_url_1=?,
        link_url_2=?,
        link_url_3=?,
        link_url_4=?,
        link_url_5=?,
        open_year=?,
        open_month=?,
        open_day=?,
        open_hour=?,
        link_top=?,
        show_scroll=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        @$data["editor"],
        @$data["visible"],
        @$data["list_title"],
        @$data["article_title"],
        @$data["content"],
        @$data["link_text_1"],
        @$data["link_text_2"],
        @$data["link_text_3"],
        @$data["link_text_4"],
        @$data["link_text_5"],
        @$data["link_url_1"],
        @$data["link_url_2"],
        @$data["link_url_3"],
        @$data["link_url_4"],
        @$data["link_url_5"],
        @$data["open_year"],
        @$data["open_month"],
        @$data["open_day"],
        @$data["open_hour"],
        @$data["link_top"],
        @$data["show_scroll"],
        $id
      )
    ) or die($this->DB->ErrorMsg());
    
  }

  function to_invisible($id){
    $sql=
      "UPDATE articles
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
  
  function get_top_list($tab='',$is_all=0){
    $where = '';
    if($tab==""){
//      $where=' (category=1 OR (category=3 AND link_top=1) OR category=4) AND ';
      $where=' (category=1 OR category=4) AND ';
    }elseif($tab=='nr'){//ニュースリリース
      $where=' category=1 AND ';
    }elseif($tab=='pz'){//各社ニュースリリース
      $where=' category=8 AND ';
    }elseif($tab=='in'){//おしらせ
      $where=' category=4 AND ';
    }elseif($tab=='br'){//各地の活動
      $where=' category=3 AND ';
    }
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        %s
        %s
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC
      LIMIT 0,20",
      $where,
      ($is_all)? '' : ' link_top=1 AND '
    );
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
    return $data;
  }
  
  function get_all_new_list($is_br=0){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        %s
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC
      LIMIT 0,60",
      ($is_br)? "category=3 " : "(category=1 OR category=4) "
    );
    $data=$this->DB->GetAll($sql);
    return $data;
  }
  
  function get_info_list($branch_id=''){
    if($branch_id<>''){
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
    }else{
      $sql=sprintf(
        "SELECT *
        FROM
          articles
        WHERE
          category=3
          AND
          visible=1
        ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
        $branch_id
      );
    }

    $data=$this->DB->GetAll($sql);
    return $data;
  }
  
  function get_info_list_by_year($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=3
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
    return $data;
  }
  
  function get_release_list(){
    $st = mktime(0,0,0,date("m")-1,1,date("Y"));
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=8
        AND
        open_year*10000+open_month*100+open_day >= %d
        AND
        visible=1
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC",
      date("Y",$st)*10000 + date("m",$st)*100 + date("d",$st)*1
    );
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
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
    $data=$this->DB->GetAll($sql);
    return $data;
  }
  
  function get_admin_release_list($year){
    $sql=sprintf(
      "SELECT *
      FROM
        articles
      WHERE
        category=8
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
    $data=$this->DB->GetAll($sql);
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
        (category=1 OR (category=3 AND link_top==1) OR category=4)
        AND
        visible=1";
    $data=$this->DB->GetAll($sql);
    
    $years = array();

    if($data){
      foreach($data as $val){
        if($val["open_month"]>3){
          @$years[$val["open_year"]]++;
        }else{
          @$years[$val["open_year"]-1]++;
        }
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
        open_year<>''
        AND
        visible=1";
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_open_info_list_years(){
    $sql=
      "SELECT
        open_month,
        open_year
      FROM
        articles
      WHERE
        category=3
        AND
        visible=1";
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
      }
    }
    
    krsort($years);
    
    return $years;
  }

  function get_release_list_years(){
    $sql=
      "SELECT
        open_month,
        open_year
      FROM
        articles
      WHERE
        open_year>0 AND
        category=8";
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    foreach($data as $val){
      if($val["open_month"]>3){
        @$years[$val["open_year"]]++;
      }else{
        @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            @$years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            @$years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            @$years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            @$years[$val["open_year"]-1]++;
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
    $data=$this->DB->GetAll($sql);
    
    if($data){
      foreach($data as $val){
        if($val["open_year"]){
          if($val["open_month"]>3){
            @$years[$val["open_year"]]++;
          }elseif($val["open_month"]){
            @$years[$val["open_year"]-1]++;
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
    return $this->DB->GetRow($sql);
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
    $tmp=$this->DB->GetRow($sql);

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
    $tmp=$this->DB->GetRow($sql);

    return $tmp["filename"];
  }
  
  function get_reserved_articles(){
    $sql=
      "SELECT *
      FROM
        articles
      WHERE
        visible=1
        AND
        upload_reserve_datetime IS NOT NULL";
    $data=$this->DB->GetAll($sql);
    return $data;
  }

  function get_topmessages(){
    $sql = 
      "SELECT *
      FROM
        articles
      WHERE
        visible=1
        AND
        show_scroll=1
        AND
        (category=1 OR category=3 OR category=4)
      ORDER BY open_year DESC, open_month DESC, open_day DESC, open_hour DESC";
      
    $data=$this->DB->GetAll($sql);
    return $data;
  }


  
  function update_file_date($id){
    $sql=
      "UPDATE articles
      SET
        file_date=?
      WHERE
        id=?";

    $this->DB->execute(
      $sql,
      array(
        date("Y-m-d H:i:s"),
        $id
      )
    ) or die($this->DB->ErrorMsg());
  }
  
  function update_upload_filename($id,$filename){
    $sql=
      "UPDATE articles
      SET
        upload_filename=?
      WHERE
        id=?";
        
    $this->DB->execute(
      $sql,
      array(
        $filename,
        $id
      )
    ) or die($this->DB->ErrorMsg());
  }
  
  function update_upload_reserve_datetime($id,$update_time){
    $sql=
      "UPDATE articles
      SET
        upload_reserve_datetime=?
      WHERE
        id=?";
        
    if($update_time){
      $this->DB->execute(
        $sql,
        array(
          date("Y-m-d H:i:s",$update_time),
          $id
        )
      ) or die($this->DB->ErrorMsg());
    }else{
      $this->DB->execute(
        $sql,
        array(
          NULL,
          $id
        )
      ) or die($this->DB->ErrorMsg());
    }
  }
  
  function update_show_scroll($id,$flag){
    $sql = "UPDATE articles SET show_scroll=? WHERE id=?";
    $this->DB->execute($sql,array($flag,$id)) or die("cannot update.".$this->DB->ErrorMsg());
  }
  
  function delete_article($id){
    $sql="DELETE FROM articles WHERE id=?";
    $this->DB->execute($sql,array($id)) or die("cannot delete.".$this->DB->ErrorMsg());
  }
  
}
?>