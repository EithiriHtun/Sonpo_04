<?php
  $admin_mail="publish@sonpo.or.jp";
//  $admin_mail="junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="matsuno@sonpo.or.jp,mototsugu-omichi@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";

  $mail_from ="publish@sonpo.or.jp";

  $mbs_mail="mbs004@mycom.co.jp";
//  $mbs_mail="junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $mbs_mail="mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $mbs_mail="mbs004@mycom.co.jp,mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";

  $user_mail_subject="�ڴ���ʪ�ۤ��������ߤ��꤬�Ȥ��������ޤ�";
  $admin_mail_subject="�ڴ���ʪ�������ߡ�";

  $videoDataFile='/var/www/protect/video/video_list.csv';

  $branch_name=array(
    1  => '�̳�ƻ',
    2  => '����',
    3  => '����',
    4  => '��Φ',
    5  => '�Ų�',
    6  => '����',
    7  => '�ᵦ',
    8  => '���',
    9  => '�͹�',
    10 => '�彣',
    11 => '����'
  );

  $branch_mail=array(
/*
    1  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    2  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    3  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    4  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    5  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    6  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    7  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    8  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    9  => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    10 => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com',
    11 => 'mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com'
*/
    1  => 'hokkaido@sonpo.or.jp',
    2  => 'tohoku@sonpo.or.jp',
    3  => 'kanto@sonpo.or.jp',
    4  => 'hokuriku@sonpo.or.jp',
    5  => 'shizuoka@sonpo.or.jp',
    6  => 'nagoya@sonpo.or.jp',
    7  => 'kinki@sonpo.or.jp',
    8  => 'chugoku@sonpo.or.jp',
    9  => 'shikoku@sonpo.or.jp',
    10 => 'kyushu@sonpo.or.jp',
    11 => 'okinawa@sonpo.or.jp'
/*
    1  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+hokkaido@p1d.com',
    2  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+tohoku@p1d.com',
    3  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kanto@p1d.com',
    4  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+hokuriku@p1d.com',
    5  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura++shizuoka@p1d.com',
    6  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+nagoya@p1d.com',
    7  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kinki@p1d.com',
    8  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+chugoku@p1d.com',
    9  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+shikoku@p1d.com',
    10 => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kyushu@p1d.com',
    11 => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+okinawa@p1d.com'
*/
  );

  $branch_zip=array(
    1  => '060-0001',
    2  => '980-0811',
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

  $branch_address=array(
    1  => '���ڻ�������̰����7-1 CARP���ڥӥ�7F',
    2  => '��������ն����Į2-8-15 ������̿����ӥ룹��',
    3  => '�����Ķ����øϩĮ2-9 »�ݲ��12F',
    4  => '�����ԹⲬĮ2-37 ���ɥӥ�8F(1�����������ԡ�',
    5  => '�Ų��԰������Į1-1-2 �Ų�����Į��������8F',
    6  => '̾�Ų�������4-5-3 KDX̾�Ų��ɥӥ�4��',
    7  => '�������������2-6-26 ��奰�꡼��ӥ�9��',
    8  => '����������Į3-17  ������衼�ӥ�12��',
    9  => '�⾾�Ըſ�Į8-1 �⾾���������ӥ�3��',
    10 => 'ʡ�����������̾2-4-30 ��Ŵ�ֺ�ӥ�9F',
    11 => '���ƻԵ���2-2-20 ��Ʊ�кҳ����ݸ��ʳ��˵��ƥӥ�9F'
  );

  $branch_tel=array(
    1  => '011-231-3815',
    2  => '022-221-6466',
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

  $branch_fax=array(
    1  => '011-231-3843',
    2  => '022-221-7381',
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
    1  => "�̳�ƻ",
    2  => "�Ŀ���",
    3  => "��긩",
    4  => "�ܾ븩",
    5  => "���ĸ�",
    6  => "������",
    7  => "ʡ�縩",
    8  => "��븩",
    9  => "���ڸ�",
    10 => "���ϸ�",
    11 => "��̸�",
    12 => "���ո�",
    13 => "�����",
    14 => "�����",
    15 => "���㸩",
    16 => "�ٻ���",
    17 => "���",
    18 => "ʡ�温",
    19 => "������",
    20 => "Ĺ�",
    21 => "���츩",
    22 => "�Ų���",
    23 => "���θ�",
    24 => "���Ÿ�",
    25 => "���츩",
    26 => "������",
    27 => "�����",
    28 => "ʼ�˸�",
    29 => "���ɸ�",
    30 => "�²λ���",
    31 => "Ļ�踩",
    32 => "�纬��",
    33 => "������",
    34 => "���縩",
    35 => "������",
    36 => "���縩",
    37 => "���",
    38 => "��ɲ��",
    39 => "���θ�",
    40 => "ʡ����",
    41 => "���츩",
    42 => "Ĺ�긩",
    43 => "���ܸ�",
    44 => "��ʬ��",
    45 => "�ܺ긩",
    46 => "�����縩",
    47 => "���츩"
  );
  
  $branch_no=array(
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
  );

?>