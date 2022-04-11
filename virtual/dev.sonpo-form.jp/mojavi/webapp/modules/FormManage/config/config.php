<?php
$answer_mail_subject="WEB相談の回答について";

$stantou_mail_subject="【講師派遣】資料手配依頼（テスト）";

$sregist_mail_subject="【講師派遣】資料発送承認依頼（テスト）";

$toriyose_admin_mail_subject="【刊行物申し込み】（テスト）";
$toriyose_user_mail_subject ="【刊行物】お申し込みを受け付けました（取り寄せ）（テスト）";

$trans_mail_subject="【講師派遣】資料発送依頼（テスト）";
//$trans_mail_to     ='mototsugu-omichi@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com';

//$trans_mail_to = 'mbs004@mycom.co.jp';
//$trans_mail_to = 'mbs004@mycom.co.jp,mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com';
$trans_mail_to = 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com';

$mail_from ="publish@sonpo.or.jp";

$login_limit_count    = 3;
$pw_change_days       = 365;//days
$pw_change_alert_days = 30;
$pw_default_date      = '2018-5-1';
$reset_login_attempt_count = 30;//min ログイン失敗がリセットされる時間

/*
$admin_users=array(
  array(
    "account"   => 'shoninsha',
    "password"  => 'Yakiniku2ban!',
    "is_master" => 1
  ),
  array(
    "account"   => 'manager',
    "password"  => 'Onsen1ban!',
    "is_master" => 0
  ),
);
*/

$inst_status=array(
  4 => '受託拒否',
  0 => '未対応',
  1 => '対応中',
  2 => '確定',
  3 => '完了',
  5 => '中止'
);

$taisyou=array(
  1 => '一般消費者',
  2 => '高校',
  3 => '大学',
  4 => '相談員',
  5 => 'その他'
);

$inst_type=array(
  1 => '協会職員',
  2 => 'センター職員',
  3 => 'OB講師',
  5 => 'シニアコンダクター',
  6 => 'SAAアドバイザー',
  4 => 'その他'
);

$branch=array(
  1  => '北海道支部',
  2  => '東北支部',
//  3  => '関東支部',
  20 => '北関東支部',
//  21 => '南関東支部',
  21 => '関東支部',
  4  => '北陸支部',
//  5  => '静岡支部',
  6  => '中部支部',
  7  => '近畿支部',
  8  => '中国支部',
  9  => '四国支部',
  10 => '九州支部',
  11 => '沖縄支部',
  12 => '経営企画部',
  22 => 'そんぽＡＤＲセンター',
  15 => '国際企画部',
  16 => '業務企画部',
  17 => '損害サービス企画部',
  18 => '総務人事部',
  19 => '募集・教育企画部',
  24 => 'IT推進部',
  13 => '生活サービス部（2017年3月まで）',
  23 => '法務・リスク管理部（2017年3月まで）'

//  14 => '損害保険相談部',
//  23 => '法務・リスク管理部',
//  25 => 'IT推進部IT支援グループ'
);

/*
$branch=array(
  1  => '北海道支部',
  2  => '東北支部',
  3  => '関東支部',

  20 => '北関東支部',
  21 => '南関東支部',

  4  => '北陸支部',
  5  => '静岡支部',
  6  => '中部支部',
  7  => '近畿支部',
  8  => '中国支部',
  9  => '四国支部',
  10 => '九州支部',
  11 => '沖縄支部',
  12 => '総合企画部',
//  13 => '生活サービス部',
  13 => '業務企画部',
  14 => '損害保険相談部',

  22 => 'そんぽＡＤＲセンター',

  15 => '国際部',
  16 => '業務企画部',
  17 => '損害サービス業務部',
  18 => '総務人事部',
  19 => '募集・研修サービス部',

  23 => '法務・リスク管理部',
  24 => 'IT推進部共同システム開発室',
  25 => 'IT推進部IT支援グループ'
);
*/

$shiryou=array(
  1  => 'バイヤーズガイド',
  2  => '保険金の請求から受け取りまでの手引',
  3  => 'フレッシャーズガイド',
  4  => 'わかりやすい損害保険の入り方',
  5  => '交通事故とその責任',
  6  => '知っていますか？自転車事故',
  7  => '交通事故被害者のために',
  8  => '地震への備え大丈夫？',
  9  => '地震保険料控除のチラシ',
  10 => '自然災害あなたの備えは大丈夫？',
  11 => '損害保険ナットクガイド',
  12 => '住まいの保険ナットクガイド',
  13 => 'くるまの保険ナットクガイド',
  14 => 'からだの保険ナットクガイド',
  15 => '判例に学ぶ',
  16 => '飲酒運転防止マニュアル',
  17 => 'ファクトブック'
);

$inst_condition=array(
  1  => '静かに熱心に聴いていた',
  2  => 'わりあい熱心に聴いていた',
  3  => '普通であった',
  4  => 'あまり熱心でなかった',
  5  => '私語がめだった',
  6  => '非常に悪かった'
);

$video_status=array(
  4 => '対応不要',
  0 => '対応待ち',
  2 => '貸出中',
  3 => '返却済み'
);

$trans_status=array(
  0 => '発送承認待ち',
  1 => '発送承認済み'
);
$trans_status2=array(
  0 => '未発送',
  1 => '発送済み'
);

  $branch_no=array(
    1  => 1,
    2  => 2,
    3  => 2,
    4  => 2,
    5  => 2,
    6  => 2,
    7  => 2,
    8  => 21,
    9  => 21,
    10 => 21,
    11 => 21,
    12 => 21,
    13 => 21,
    14 => 21,
    15 => 21,
    16 => 4,
    17 => 4,
    18 => 4,
    19 => 21,
    20 => 21,
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
  );

$pub_category=array(
  1 => '損害保険全般',
  2 => '交通安全',
  3 => '自動車盗難',
  4 => '防災・防犯',
  5 => '学校向け教材・資料',
  6 => 'NPO・環境',
  7 => 'その他'
);

$pub_order_user_status=array(
  1 => '個人',
  2 => '法人・団体等'
);

$pub_order_type=array(
  1 => '個人',
  2 => '法人・団体等',
  3 => '講師派遣',
  4 => 'その他（協会内部）',
  5 => '調整'
);

$pub_trans_status=array(
  0 => '未対応',
  1 => '対応中',
  2 => '発送済み'
);

$pub_settle_status=array(
  0 => '未対応',
  1 => '済み（料金回収済み）',
  2 => '済み（料金別納）',
  3 => '　−　'
);

$pub_approve=array(
  0 => '未承認',
  1 => '承認済み'
);

$pub_showrange=array(
  0 => 'オンライン、取り寄せ、講師派遣',
  1 => '取り寄せ、講師派遣のみ'
);

$pub_address_type=array(
  1 => array(
    name    => 'その他（個人）',
    zip1    => '',
    zip2    => '',
    pref    => '',
    address => '',
    company => '',
    section => '',
    tel1    => '',
    tel2    => '',
    tel3    => ''
  ),
  2 => array(
    name    => 'その他（法人）',
    zip1    => '',
    zip2    => '',
    pref    => '',
    address => '',
    company => '',
    section => '',
    tel1    => '',
    tel2    => '',
    tel3    => ''
  ),
  3 => array(
    name    => '協会本部',
    zip1    => '101',
    zip2    => '8335',
    pref    => '13',
    address => '千代田区神田淡路町2-9　損保会館内',
    company => '日本損害保険協会',
    section => '',
    tel1    => '',
    tel2    => '',
    tel3    => ''
  ),
  4 => array(
    name    => '北海道支部',
    zip1    => '060',
    zip2    => '0001',
    pref    => '1',
    address => '札幌市中央区北一条西7-1　CARP札幌ビル7F',
    company => '日本損害保険協会',
    section => '北海道支部',
    tel1    => '011',
    tel2    => '231',
    tel3    => '3815'
  ),
  5 => array(
    name    => '東北支部',
    zip1    => '980',
    zip2    => '0811',
    pref    => '4',
    address => '仙台市青葉区一番町2-8-15 太陽生命仙台ビル９階',
    company => '日本損害保険協会',
    section => '東北支部',
    tel1    => '022',
    tel2    => '221',
    tel3    => '6466'
  ),
//  15 => array(
//    name    => '北関東支部',
//    zip1    => '330',
//    zip2    => '0854',
//    pref    => '13',
//    address => 'さいたま市大宮区桜木町1-10-16　 シーノ大宮ノースウィング10Ｆ',
//    company => '日本損害保険協会',
//    section => '関東支部',
//    tel1    => '048',
//    tel2    => '611',
//    tel3    => '6542'
// ),
  16 => array(
//    name    => '南関東支部',
    name    => '関東支部',
    zip1    => '101',
    zip2    => '8335',
    pref    => '13',
    address => '千代田区神田淡路町2-9　損保会館内',
    company => '日本損害保険協会',
    section => '関東支部',
    tel1    => '03',
    tel2    => '3255',
    tel3    => '1450'
  ),
//  6 => array(
//    name    => '関東支部',
//    zip1    => '101',
//    zip2    => '8835',
//    pref    => '13',
//    address => '千代田区神田淡路町2-9　損保会館内',
//    company => '日本損害保険協会',
//    section => '関東支部',
//    tel1    => '03',
//    tel2    => '3255',
//    tel3    => '1450'
//  ),
//  7 => array(
//    name    => '静岡支部',
//    zip1    => '420',
//    zip2    => '0031',
//    pref    => '22',
//    address => '静岡市葵区呉服町1-1-2　静岡呉服町スクエア8F　',
//    company => '日本損害保険協会',
//    section => '静岡支部',
//    tel1    => '054',
//    tel2    => '252',
//    tel3    => '1843'
//  ),
  8 => array(
    name    => '北陸支部',
    zip1    => '920',
    zip2    => '0919',
    pref    => '17',
    address => '金沢市南町5-16　金沢共栄火災ビル4F',
    company => '日本損害保険協会',
    section => '北陸支部',
    tel1    => '076',
    tel2    => '221',
    tel3    => '1149'
  ),
  9 => array(
    name    => '中部支部',
    zip1    => '460',
    zip2    => '0008',
    pref    => '23',
    address => '名古屋市中区栄4-5-3　KDX名古屋栄ビル4F',
    company => '日本損害保険協会',
    section => '中部支部',
    tel1    => '052',
    tel2    => '249',
    tel3    => '9760'
  ),
  10 => array(
    name    => '近畿支部',
    zip1    => '541',
    zip2    => '0041',
    pref    => '27',
    address => '大阪市中央区北浜2-6-26　大阪損保会館',
    company => '日本損害保険協会',
    section => '近畿支部',
    tel1    => '06',
    tel2    => '6202',
    tel3    => '8761'
  ),
  11 => array(
    name    => '中国支部',
    zip1    => '730',
    zip2    => '0036',
    pref    => '34',
    address => '広島市中区袋町3-17  シシンヨービル12階',
    company => '日本損害保険協会',
    section => '中国支部',
    tel1    => '082',
    tel2    => '247',
    tel3    => '4529'
  ),
  12 => array(
    name    => '四国支部',
    zip1    => '760',
    zip2    => '0025',
    pref    => '37',
    address => '高松市古新町8-1　高松スクエアビル3階',
    company => '日本損害保険協会',
    section => '四国支部',
    tel1    => '087',
    tel2    => '851',
    tel3    => '3344'
  ),
  13 => array(
    name    => '九州支部',
    zip1    => '810',
    zip2    => '0041',
    pref    => '40',
    address => '福岡市中央区大名2-4-30　西鉄赤坂ビル9F',
    company => '日本損害保険協会',
    section => '九州支部',
    tel1    => '092',
    tel2    => '771',
    tel3    => '9766'
  ),
  14 => array(
    name    => '沖縄支部',
    zip1    => '900',
    zip2    => '0033',
    pref    => '47',
    address => '那覇市久米2-2-20　大同火災海上保険（株）久米ビル9F',
    company => '日本損害保険協会',
    section => '沖縄支部',
    tel1    => '098',
    tel2    => '862',
    tel3    => '8363'
  )
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
  
?>