<?php
//  $admin_mail="consumer@sonpo.or.jp";
  $admin_mail="junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+koushi@p1d.com";
//  $admin_mail="t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="matsuno@sonpo.or.jp,mototsugu-omichi@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="mototsugu-omichi@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
  $mail_from ="consumer@sonpo.or.jp";

  $user_mail_subject="[TEST]【講演会】お申し込みありがとうございます";
  $admin_mail_subject="[TEST]【申し込み受付】講演会";
  
  $branch_name=array(
    1  => '北海道',
    2  => '東北',
//    12 => '北関東',
//    13 => '南関東',
    13 => '関東',
//    3  => '関東',
    4  => '北陸',
    5  => '静岡',
    6  => '中部',
    7  => '近畿',
    8  => '中国',
    9  => '四国',
    10 => '九州',
    11 => '沖縄'
  );

/*
  $branch_mail=array(
    1  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    2  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    12 => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    13 => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    3  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    4  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    5  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    6  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    7  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    8  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    9  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    10 => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    11 => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com'
  );
*/
/*
  $branch_mail=array(
    1  => 'hokkaido@sonpo.or.jp',
    2  => 'tohoku@sonpo.or.jp',
    12 => 'kita-kanto@sonpo.or.jp',
    13 => 'minami-kanto@sonpo.or.jp',
    3  => 'kanto@sonpo.or.jp',
    4  => 'hokuriku@sonpo.or.jp',
    5  => 'shizuoka@sonpo.or.jp',
    6  => 'nagoya@sonpo.or.jp',
    7  => 'kinki@sonpo.or.jp',
    8  => 'chugoku@sonpo.or.jp',
    9  => 'shikoku@sonpo.or.jp',
    10 => 'kyushu@sonpo.or.jp',
    11 => 'okinawa@sonpo.or.jp'
  );
*/
//    11 => 'mototsugu-omichi@sonpo.or.jp'

  $branch_mail=array(
    1  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+hokkaido@p1d.com',
    2  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+tohoku@p1d.com',
    12 => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kitakanto@p1d.com',
    13 => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+minamikanto@p1d.com',
    3  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kanto@p1d.com',
    4  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+hokuriku@p1d.com',
    5  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura++shizuoka@p1d.com',
    6  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+nagoya@p1d.com',
    7  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kinki@p1d.com',
    8  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+chugoku@p1d.com',
    9  => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+shikoku@p1d.com',
    10 => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kyushu@p1d.com',
    11 => 'junki-mizutani@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+okinawa@p1d.com'
  );

  $branch_zip=array(
    1  => '060-0001',
    2  => '980-0811',
    12 => '330-0854',
    13 => '101-8335',
    3  => '101-8335',
    4  => '920-0919',
    5  => '420-0031',
    6  => '460-0008',
    7  => '541-0041',
    8  => '730-0036',
    9  => '760-0025',
    10 => '810-0041',
    11 => '900-0033'
  );

  $branch_zip12=array(
    1  => array('060','0001'),
    2  => array('980','0811'),
    12 => array('330','0854'),
    13 => array('101','8335'),
    3  => array('101','8335'),
    4  => array('920','0919'),
    5  => array('420','0031'),
    6  => array('460','0008'),
    7  => array('541','0041'),
    8  => array('730','0036'),
    9  => array('760','0025'),
    10 => array('810','0041'),
    11 => array('900','0033')
  );

  $branch_address=array(
    1  => '札幌市中央区北一条西7-1 CARP札幌ビル7F',
    2  => '仙台市青葉区一番町2-8-15 太陽生命仙台ビル９階',
    12 => 'さいたま市大宮区桜木町1-10-16　 シーノ大宮ノースウィング10Ｆ',
    13 => '千代田区神田淡路町2-9 損保会館12F',
    3  => '千代田区神田淡路町2-9 損保会館12F',
    4  => '金沢市南町5-16 金沢共栄火災ビル4階',
    5  => '静岡市葵区呉服町1-1-2 静岡呉服町スクエア8F',
    6  => '名古屋市中区栄4-5-3 KDX名古屋栄ビル4階',
    7  => '大阪市中央区北浜2-6-26 大阪グリーンビル9階',
    8  => '広島市中区袋町3-17  シシンヨービル12階',
    9  => '高松市古新町8-1 高松スクエアビル3階',
    10 => '福岡市中央区大名2-4-30 西鉄赤坂ビル9F',
    11 => '那覇市久米2-2-20 大同火災海上保険（株）久米ビル9F'
  );

/* old
  $branch_address=array(
    1  => '札幌市中央区北一条西7-1-2 三井住友海上札幌ビル7F',
    2  => '仙台市青葉区一番町2-8-15 太陽生命仙台ビル９階',
    3  => '千代田区神田淡路町2-9 損保会館12F',
    4  => '金沢市高岡町2-37 三栄ビル8F(1階あおぞら銀行）',
    5  => '静岡市葵区呉服町1-1-2 静岡呉服町スクエア8F',
    6  => '名古屋市中区錦3-23-31 栄町ビル6F',
    7  => '大阪市中央区北浜2-6-26 大阪損保会館',
    8  => '広島市中区紙屋町1-2-29 損保ジャパンみずほ銀行広島ビル6F',
    9  => '高松市塩屋町10-1 共栄火災ビル6F',
    10 => '福岡市中央区大名2-4-30 西鉄赤坂ビル9F',
    11 => '那覇市久米2-2-20 大同火災海上保険（株）久米ビル9F'
  );
*/

  $branch_pref=array(
    1  => 1,
    2  => 4,
    12 => 11,
    13 => 13,
    3  => 13,
    4  => 17,
    5  => 22,
    6  => 23,
    7  => 27,
    8  => 34,
    9  => 37,
    10 => 40,
    11 => 47
  );

  $branch_tel=array(
    1  => '011-231-3815',
    2  => '022-221-6466',
    12 => '048-611-6542',
    13 => '03-3255-1450',
    3  => '03-3255-1450',
    4  => '076-221-1149',
    5  => '054-252-1843',
    6  => '052-249-9760',
    7  => '06-6202-8761',
    8  => '082-247-4529',
    9  => '087-851-3344',
    10 => '092-771-9766',
    11 => '098-862-8363'
  );

  $branch_tel123=array(
    1  => array('011','231','3815'),
    2  => array('022','221','6466'),
    12 => array('048','611','6542'),
    13 => array('03','3255','1450'),
    3  => array('03','3255','1450'),
    4  => array('076','221','1149'),
    5  => array('054','252','1843'),
    6  => array('052','249','9760'),
    7  => array('06','6202','8761'),
    8  => array('082','247','4529'),
    9  => array('087','851','3344'),
    10 => array('092','771','9766'),
    11 => array('098','862','8363')
  );

  $branch_fax=array(
    1  => '011-231-3843',
    2  => '022-221-7381',
    12 => '048-611-6551',
    13 => '03-3255-1238',
    3  => '03-3255-1238',
    4  => '076-221-0482',
    5  => '054-273-2514',
    6  => '052-249-9761',
    7  => '06-6202-8764',
    8  => '082-242-3992',
    9  => '087-823-1377',
    10 => '092-731-7878',
    11 => '098-862-8372'
  );


  $prefs=array(
    1  => "北海道",
    2  => "青森県",
    3  => "岩手県",
    4  => "宮城県",
    5  => "秋田県",
    6  => "山形県",
    7  => "福島県",
    8  => "茨城県",
    9  => "栃木県",
    10 => "群馬県",
    11 => "埼玉県",
    12 => "千葉県",
    13 => "東京都",
    14 => "神奈川県",
    15 => "新潟県",
    16 => "富山県",
    17 => "石川県",
    18 => "福井県",
    19 => "山梨県",
    20 => "長野県",
    21 => "岐阜県",
    22 => "静岡県",
    23 => "愛知県",
    24 => "三重県",
    25 => "滋賀県",
    26 => "京都府",
    27 => "大阪府",
    28 => "兵庫県",
    29 => "奈良県",
    30 => "和歌山県",
    31 => "鳥取県",
    32 => "島根県",
    33 => "岡山県",
    34 => "広島県",
    35 => "山口県",
    36 => "徳島県",
    37 => "香川県",
    38 => "愛媛県",
    39 => "高知県",
    40 => "福岡県",
    41 => "佐賀県",
    42 => "長崎県",
    43 => "熊本県",
    44 => "大分県",
    45 => "宮崎県",
    46 => "鹿児島県",
    47 => "沖縄県"
  );
  
  $theme=array(
    "1" =>'損害保険の基礎',
    "2" =>'暮らしの中の危険と損害保険',
    "3" =>'交通事故とその責任',
    "4" =>'自然災害と損害保険',
    "5" =>'損害保険業界の現状',
    "6" =>'損害保険の上手な選び方',
    "7" =>'損害保険の現状',
    "8" =>'自転車の交通事故とその責任',
    "9" =>'自転車を取り巻くリスクとその責任',
    "10" => '【動画教材使用希望】「交通事故とその責任」',
    "11" => '【動画教材使用希望】「自転車を取り巻くリスクとその責任」',
    "99"=>'その他'
  );
  
  $taisyou=array(
    1 => '一般消費者',
    2 => '高校',
    3 => '大学',
    4 => '相談員',
    5 => 'その他'
  );

  $branch_no=array(
    1  => 1,
    2  => 2,
    3  => 2,
    4  => 2,
    5  => 2,
    6  => 2,
    7  => 2,
    8  => 13,
    9  => 13,
    10 => 13,
    11 => 13,
    12 => 13,
    13 => 13,
    14 => 13,
    15 => 13,
    16 => 4,
    17 => 4,
    18 => 4,
    19 => 13,
    20 => 13,
    21 => 6,
    22 => 6,
    23 => 6,
    24 => 6,
    25 => 7,
    26 => 7,
    27 => 7,
    28 => 7,
    29 => 7,
    30 => 7,
    31 => 8,
    32 => 8,
    33 => 8,
    34 => 8,
    35 => 8,
    36 => 9,
    37 => 9,
    38 => 9,
    39 => 9,
    40 => 10,
    41 => 10,
    42 => 10,
    43 => 10,
    44 => 10,
    45 => 10,
    46 => 10,
    47 => 11
/*
    1  => 1,
    2  => 2,
    3  => 2,
    4  => 2,
    5  => 2,
    6  => 2,
    7  => 2,
    8  => 3,
    9  => 3,
    10 => 3,
    11 => 3,
    12 => 3,
    13 => 3,
    14 => 3,
    15 => 3,
    16 => 4,
    17 => 4,
    18 => 4,
    19 => 3,
    20 => 3,
    21 => 6,
    22 => 5,
    23 => 6,
    24 => 6,
    25 => 7,
    26 => 7,
    27 => 7,
    28 => 7,
    29 => 7,
    30 => 7,
    31 => 8,
    32 => 8,
    33 => 8,
    34 => 8,
    35 => 8,
    36 => 9,
    37 => 9,
    38 => 9,
    39 => 9,
    40 => 10,
    41 => 10,
    42 => 10,
    43 => 10,
    44 => 10,
    45 => 10,
    46 => 10,
    47 => 11
*/
  );

?>