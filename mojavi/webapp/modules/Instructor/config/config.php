<?php
  $admin_mail="consumer@sonpo.or.jp";
//  $admin_mail="junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+koushi@p1d.com";
//  $admin_mail="t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="mamiko-matsuno@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="matsuno@sonpo.or.jp,mototsugu-omichi@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
//  $admin_mail="mototsugu-omichi@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura@p1d.com";
  $mail_from ="consumer@sonpo.or.jp";

  $user_mail_subject="�ڹֱ��ۤ��������ߤ��꤬�Ȥ��������ޤ�";
  $admin_mail_subject="�ڿ������߼��ա۹ֱ��";
  
  $branch_name=array(
    1  => '�̳�ƻ',
    2  => '����',
//    12 => '�̴���',
//    13 => '�����',
    13 => '����',
//    3  => '����',
    4  => '��Φ',
    5  => '�Ų�',
    6  => '����',
    7  => '�ᵦ',
    8  => '���',
    9  => '�͹�',
    10 => '�彣',
    11 => '����'
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
  $branch_mail=array(
    1  => 'hokkaido@sonpo.or.jp',
    2  => 'tohoku@sonpo.or.jp',
    12 => 'kita-kanto@sonpo.or.jp',
    13 => 'kanto@sonpo.or.jp',
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
//    11 => 'mototsugu-omichi@sonpo.or.jp'

/*
  $branch_mail=array(
    1  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+hokkaido@p1d.com',
    2  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+tohoku@p1d.com',
    12 => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kitakanto@p1d.com',
    13 => 'sonpo@coast.ocn.ne.jp,junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+minamikanto@p1d.com',
    3  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kanto@p1d.com',
    4  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+hokuriku@p1d.com',
    5  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura++shizuoka@p1d.com',
    6  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+nagoya@p1d.com',
    7  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kinki@p1d.com',
    8  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+chugoku@p1d.com',
    9  => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+shikoku@p1d.com',
    10 => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+kyushu@p1d.com',
    11 => 'junki-mizutani@sonpo.or.jp,akiyo-inoue@sonpo.or.jp,misaki-ishikawa@sonpo.or.jp,go-chiba@sonpo.or.jp,t.taguchi@rainbow.co.jp,mura+okinawa@p1d.com'
  );
*/

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
    1  => '���ڻ�������̰����7-1 CARP���ڥӥ�7F',
    2  => '��������ն����Į2-8-15 ������̿����ӥ룹��',
    12 => '�������޻���ܶ����Į1-10-16�� ��������ܥΡ���������10��',
    13 => '�����Ķ����øϩĮ2-9 »�ݲ��12F',
    3  => '�����Ķ����øϩĮ2-9 »�ݲ��12F',
    4  => '��������Į5-16 �������ɲкҥӥ�4��',
    5  => '�Ų��԰������Į1-1-2 �Ų�����Į��������8F',
    6  => '̾�Ų�������4-5-3 KDX̾�Ų��ɥӥ�4��',
    7  => '�������������2-6-26 ��奰�꡼��ӥ�9��',
    8  => '����������Į3-17  ������衼�ӥ�12��',
    9  => '�⾾�Ըſ�Į8-1 �⾾���������ӥ�3��',
    10 => 'ʡ�����������̾2-4-30 ��Ŵ�ֺ�ӥ�9F',
    11 => '���ƻԵ���2-2-20 ��Ʊ�кҳ����ݸ��ʳ��˵��ƥӥ�9F'
  );

/* old
  $branch_address=array(
    1  => '���ڻ�������̰����7-1-2 ���潻ͧ���廥�ڥӥ�7F',
    2  => '��������ն����Į2-8-15 ������̿����ӥ룹��',
    3  => '�����Ķ����øϩĮ2-9 »�ݲ��12F',
    4  => '�����ԹⲬĮ2-37 ���ɥӥ�8F(1�����������ԡ�',
    5  => '�Ų��԰������Į1-1-2 �Ų�����Į��������8F',
    6  => '̾�Ų�������3-23-31 ��Į�ӥ�6F',
    7  => '�������������2-6-26 ���»�ݲ��',
    8  => '��������沰Į1-2-29 »�ݥ���ѥ�ߤ��۶�Թ���ӥ�6F',
    9  => '�⾾�Ա���Į10-1 ���ɲкҥӥ�6F',
    10 => 'ʡ�����������̾2-4-30 ��Ŵ�ֺ�ӥ�9F',
    11 => '���ƻԵ���2-2-20 ��Ʊ�кҳ����ݸ��ʳ��˵��ƥӥ�9F'
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
  
  $theme=array(
    "1" =>'»���ݸ��δ���',
    "2" =>'��餷����δ�����»���ݸ�',
    "3" =>'���̻��ΤȤ�����Ǥ',
    "4" =>'�����ҳ���»���ݸ�',
    "5" =>'»���ݸ��ȳ��θ���',
    "6" =>'»���ݸ��ξ���������',
    "7" =>'»���ݸ��θ���',
    "8" =>'��ž�֤θ��̻��ΤȤ�����Ǥ',
    "9" =>'��ž�֤��괬���ꥹ���Ȥ�����Ǥ',
    "10" => '��ư�趵����Ѵ�˾�ָۡ��̻��ΤȤ�����Ǥ��',
    "11" => '��ư�趵����Ѵ�˾�ּۡ�ž�֤��괬���ꥹ���Ȥ�����Ǥ��',
    "99"=>'����¾'
  );
  
  $taisyou=array(
    1 => '���̾����',
    2 => '�⹻',
    3 => '���',
    4 => '���̰�',
    5 => '����¾'
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