<?php /* Smarty version 2.6.9, created on 2022-03-18 11:47:39
         compiled from csv/instcsv.txt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'csv/instcsv.txt', 2, false),array('modifier', 'escape', 'csv/instcsv.txt', 2, false),)), $this); ?>
"受付番号","受付日時","ステータス","主催者名","所在地（郵便番号）","所在地（都道府県）","所在地（市町村以下）","ご担当者名","ご担当者名フリガナ","ご担当者名役職","電話番号","内線","FAX番号","メールアドレス","希望開催日時（第１希望）","希望開催日時（第２希望）","会場所在地（会場名）","会場所在地（郵便番号）","会場所在地（都道府県）","会場所在地（市町村以下）","会場電話番号","対象","受講予定人数","講演テーマ","講演テーマその他","ビデオ","配付希望資料（必要部数）","配付希望資料（資料送付先）","パソコンおよびプロジェクターの使用","本制度・動画教材のご利用経験","その他連絡事項","講演日","派遣先対象","紹介先","主催者名","講演テーマ","派遣講師分類","講師名","管轄支部および部署","聴講者数","聴講状態","講演時間","備考","送付先郵便番号","都道府県","住所","あて先","ご担当者名","電話番号","摘要","配付資料","配付資料（旧）","配付資料（旧版用）","配付資料その他","配付資料部数","到着希望日","発送日","到着予定日","備考","発送状況"
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if (! @ $this->_tpl_vars['mybranch'] || @ $this->_tpl_vars['mybranch'] == @ $this->_tpl_vars['datum']['branch'] || ( ! @ $this->_tpl_vars['datum']['branch'] && @ $this->_tpl_vars['mybranch'] == @ $this->_tpl_vars['branch_no'][$this->_tpl_vars['datum']['prefecture']] )): ?>"<?php echo $this->_tpl_vars['datum']['inst_id']; ?>
","<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['date_regist'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
","<?php echo $this->_tpl_vars['status'][$this->_tpl_vars['datum']['status']]; ?>
","<?php echo $this->_tpl_vars['datum']['host']; ?>
","<?php echo $this->_tpl_vars['datum']['post1']; ?>
-<?php echo $this->_tpl_vars['datum']['post2']; ?>
","<?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['datum']['prefecture']]):  echo $this->_tpl_vars['prefs'][$this->_tpl_vars['datum']['prefecture']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['address']; ?>
","<?php echo $this->_tpl_vars['datum']['person_last']; ?>
　<?php echo $this->_tpl_vars['datum']['person_first']; ?>
","<?php echo $this->_tpl_vars['datum']['person_kana_last']; ?>
　<?php echo $this->_tpl_vars['datum']['person_kana_first']; ?>
","<?php echo $this->_tpl_vars['datum']['yaku']; ?>
","<?php echo $this->_tpl_vars['datum']['tel1']; ?>
-<?php echo $this->_tpl_vars['datum']['tel2']; ?>
-<?php echo $this->_tpl_vars['datum']['tel3']; ?>
","<?php echo $this->_tpl_vars['datum']['naisen']; ?>
","<?php echo $this->_tpl_vars['datum']['fax1']; ?>
-<?php echo $this->_tpl_vars['datum']['fax2']; ?>
-<?php echo $this->_tpl_vars['datum']['fax3']; ?>
","<?php echo $this->_tpl_vars['datum']['email1']; ?>
","<?php echo $this->_tpl_vars['datum']['year_1']; ?>
年<?php echo $this->_tpl_vars['datum']['month_1']; ?>
月<?php echo $this->_tpl_vars['datum']['day_1']; ?>
日(<?php echo $this->_tpl_vars['datum']['wTx01']; ?>
)<?php echo $this->_tpl_vars['datum']['hour_from_1']; ?>
:<?php echo $this->_tpl_vars['datum']['min_from_1']; ?>
〜<?php echo $this->_tpl_vars['datum']['hour_to_1']; ?>
:<?php echo $this->_tpl_vars['datum']['min_to_1']; ?>
","<?php echo $this->_tpl_vars['datum']['year_2']; ?>
年<?php echo $this->_tpl_vars['datum']['month_2']; ?>
月<?php echo $this->_tpl_vars['datum']['day_2']; ?>
日(<?php echo $this->_tpl_vars['datum']['wTx02']; ?>
)<?php echo $this->_tpl_vars['datum']['hour_from_2']; ?>
:<?php echo $this->_tpl_vars['datum']['min_from_2']; ?>
〜<?php echo $this->_tpl_vars['datum']['hour_to_2']; ?>
:<?php echo $this->_tpl_vars['datum']['min_to_2']; ?>
","<?php echo $this->_tpl_vars['datum']['lecture_hall']; ?>
","<?php echo $this->_tpl_vars['datum']['lecture_zip1']; ?>
-<?php echo $this->_tpl_vars['datum']['lecture_zip2']; ?>
","<?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['datum']['lecture_prefecture']]):  echo $this->_tpl_vars['prefs'][$this->_tpl_vars['datum']['lecture_prefecture']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['lecture_address']; ?>
","<?php echo $this->_tpl_vars['datum']['lecture_tel1']; ?>
-<?php echo $this->_tpl_vars['datum']['lecture_tel2']; ?>
-<?php echo $this->_tpl_vars['datum']['lecture_tel3']; ?>
","<?php echo $this->_tpl_vars['datum']['object_text']; ?>
","<?php echo $this->_tpl_vars['datum']['object_num']; ?>
","<?php if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']]):  echo $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['theme_text']; ?>
","<?php if (@ $this->_tpl_vars['datum']['video'] == '1'): ?>あり<?php else: ?>なし<?php endif; ?>","<?php echo $this->_tpl_vars['datum']['copy']; ?>
","<?php if ($this->_tpl_vars['datum']['receiver_address'] == 'host'): ?>主催者<?php endif;  if ($this->_tpl_vars['datum']['receiver_address'] == 'venue'): ?>会場<?php endif;  if ($this->_tpl_vars['datum']['receiver_address'] == 'other'): ?>その他（<?php echo $this->_tpl_vars['datum']['receiver_text']; ?>
）<?php endif; ?>","<?php if ($this->_tpl_vars['datum']['use_pcprj'] == 1): ?>可能<?php endif;  if ($this->_tpl_vars['datum']['use_pcprj'] == 2): ?>不可能<?php endif; ?>","<?php if ($this->_tpl_vars['datum']['exp'] == '1'): ?>前回は<?php echo $this->_tpl_vars['datum']['use_year']; ?>
年 <?php echo $this->_tpl_vars['datum']['use_month']; ?>
月 頃<?php else: ?>なし<?php endif; ?>","<?php echo $this->_tpl_vars['datum']['connection']; ?>
","<?php if ($this->_tpl_vars['datum']['year_3']):  echo $this->_tpl_vars['datum']['year_3']; ?>
年<?php echo $this->_tpl_vars['datum']['month_3']; ?>
月<?php echo $this->_tpl_vars['datum']['day_3']; ?>
日<?php endif; ?>","<?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']]):  echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['syoukai']; ?>
","<?php echo $this->_tpl_vars['datum']['host2']; ?>
","<?php echo $this->_tpl_vars['datum']['theme2']; ?>
","<?php if (@ $this->_tpl_vars['inst_type'][$this->_tpl_vars['datum']['inst_type']]):  echo $this->_tpl_vars['inst_type'][$this->_tpl_vars['datum']['inst_type']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['inst_name']; ?>
","<?php if (@ $this->_tpl_vars['branch'][$this->_tpl_vars['datum']['branch']]):  echo $this->_tpl_vars['branch'][$this->_tpl_vars['datum']['branch']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['inst_num']; ?>
","<?php if (@ $this->_tpl_vars['inst_condition'][$this->_tpl_vars['datum']['inst_condition']]):  echo $this->_tpl_vars['inst_condition'][$this->_tpl_vars['datum']['inst_condition']];  endif; ?>","<?php if ($this->_tpl_vars['datum']['inst_hour']):  echo $this->_tpl_vars['datum']['inst_hour']; ?>
時間<?php endif;  if ($this->_tpl_vars['datum']['inst_min']):  echo $this->_tpl_vars['datum']['inst_min']; ?>
分<?php endif; ?>","<?php echo $this->_tpl_vars['datum']['bikou']; ?>
","<?php echo $this->_tpl_vars['datum']['szip1']; ?>
-<?php echo $this->_tpl_vars['datum']['szip2']; ?>
","<?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['datum']['spref']]):  echo $this->_tpl_vars['prefs'][$this->_tpl_vars['datum']['spref']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['saddress']; ?>
","<?php echo $this->_tpl_vars['datum']['sname']; ?>
","<?php echo $this->_tpl_vars['datum']['t_tantou']; ?>
","<?php echo $this->_tpl_vars['datum']['stel1']; ?>
-<?php echo $this->_tpl_vars['datum']['stel2']; ?>
-<?php echo $this->_tpl_vars['datum']['stel3']; ?>
","<?php echo $this->_tpl_vars['datum']['stekiyou']; ?>
","<?php if (@ $this->_tpl_vars['datum']['books']):  $_from = $this->_tpl_vars['datum']['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
?>・<?php echo $this->_tpl_vars['datum2']['name']; ?>
 <?php endforeach; endif; unset($_from);  endif; ?>","<?php if (@ $this->_tpl_vars['doclist']):  $_from = $this->_tpl_vars['doclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum3']):
 if (@ $this->_tpl_vars['datum']['sdocs']):  $_from = $this->_tpl_vars['datum']['sdocs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if (@ $this->_tpl_vars['datum2'] == @ $this->_tpl_vars['datum3']['id']): ?>・<?php echo ((is_array($_tmp=$this->_tpl_vars['datum3']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php endif;  endforeach; endif; unset($_from);  endif;  endforeach; endif; unset($_from);  endif; ?>","<?php if (@ $this->_tpl_vars['shiryou'][$this->_tpl_vars['datum']['shiryou']]):  echo $this->_tpl_vars['shiryou'][$this->_tpl_vars['datum']['shiryou']];  endif; ?>","<?php if (@ $this->_tpl_vars['datum']['shiryou_other']):  echo $this->_tpl_vars['datum']['shiryou_other'];  endif; ?>","<?php echo $this->_tpl_vars['datum']['shiryou_num']; ?>
","<?php if (@ $this->_tpl_vars['datum']['syear']):  echo $this->_tpl_vars['datum']['syear']; ?>
年<?php echo $this->_tpl_vars['datum']['smonth']; ?>
月<?php echo $this->_tpl_vars['datum']['sday']; ?>
日<?php endif; ?>","<?php if (@ $this->_tpl_vars['datum']['t_syear']):  echo $this->_tpl_vars['datum']['t_syear']; ?>
年<?php echo $this->_tpl_vars['datum']['t_smonth']; ?>
月<?php echo $this->_tpl_vars['datum']['t_sday']; ?>
日<?php endif; ?>","<?php if (@ $this->_tpl_vars['datum']['t_ayear']):  echo $this->_tpl_vars['datum']['t_ayear']; ?>
年<?php echo $this->_tpl_vars['datum']['t_amonth']; ?>
月<?php echo $this->_tpl_vars['datum']['t_aday']; ?>
日<?php endif; ?>","<?php echo $this->_tpl_vars['datum']['t_bikou']; ?>
","<?php if (@ $this->_tpl_vars['datum']['t_status'] == 1):  if (@ $this->_tpl_vars['datum']['t_status2'] == 1): ?>発送済み<?php else: ?>発送承認済み<?php endif;  endif; ?>"
<?php else: ?>"<?php echo $this->_tpl_vars['datum']['inst_id']; ?>
","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","<?php if ($this->_tpl_vars['datum']['year_3']):  echo $this->_tpl_vars['datum']['year_3']; ?>
年<?php echo $this->_tpl_vars['datum']['month_3']; ?>
月<?php echo $this->_tpl_vars['datum']['day_3']; ?>
日<?php else:  echo $this->_tpl_vars['datum']['year_1']; ?>
年<?php echo $this->_tpl_vars['datum']['month_1']; ?>
月<?php echo $this->_tpl_vars['datum']['day_1']; ?>
日<?php endif; ?>","<?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']]):  echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']];  endif; ?>","","<?php if ($this->_tpl_vars['datum']['host2']):  echo $this->_tpl_vars['datum']['host2'];  else:  echo $this->_tpl_vars['datum']['host'];  endif; ?>","<?php if ($this->_tpl_vars['datum']['theme2']):  echo $this->_tpl_vars['datum']['theme2'];  else:  if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']]):  echo $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']];  endif;  endif; ?>","<?php if (@ $this->_tpl_vars['inst_type'][$this->_tpl_vars['datum']['inst_type']]):  echo $this->_tpl_vars['inst_type'][$this->_tpl_vars['datum']['inst_type']];  endif; ?>","<?php echo $this->_tpl_vars['datum']['inst_name']; ?>
","","<?php echo $this->_tpl_vars['datum']['inst_num']; ?>
","","","","","","","","","","","","","","","","","","",""
<?php endif;  endforeach; endif; unset($_from); ?>