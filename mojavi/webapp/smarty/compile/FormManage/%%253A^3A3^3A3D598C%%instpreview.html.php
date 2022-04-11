<?php /* Smarty version 2.6.9, created on 2022-03-17 09:15:29
         compiled from instpreview.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'instpreview.html', 33, false),array('modifier', 'date_format', 'instpreview.html', 57, false),array('modifier', 'nl2br', 'instpreview.html', 134, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物・講師派遣関連 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<!--<script type="text/javascript" src="/manage/cm.js"></script>-->
<script language="javascript">
<!--
<?php echo '
function prtPage(){
  if(document.getElementById || document.layers){
    window.print();
  }
}
'; ?>

//-->
</script>
<style>
<?php echo '
ul.sdocs{
  margin-left:0px;
  padding-left:0px;
}
ul.sdocs li{
  float:left;
  width:500px;
  list-style-type:none;
}
'; ?>

</style>
</head>

<body bgcolor="#FFFFFF"<?php if ($this->_tpl_vars['popmsg']): ?> onLoad="alert('<?php echo ((is_array($_tmp=$this->_tpl_vars['popmsg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');"<?php endif; ?>>
<h2>日本損害保険協会・講師派遣 管理画面</h2>
<h3>講師派遣（詳細・内容確認）</h3>
<div class="maincontents">
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstRegist" method="POST" name="frm1">
<input type="submit" value="　戻る　"><input type="hidden" name="mode" value="rewrite">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>
<hr>
<?php if ($this->_tpl_vars['errors']):  $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span><br><?php endforeach; endif; unset($_from);  endif; ?>
<div align="right" style="padding-right:10%;"><input type="button" value="印刷" onClick="prtPage();"></div>
<?php if ($this->_tpl_vars['data']['sregist'] == 1): ?><a href="#hassou">配布資料確認</a><br><br><?php endif; ?>

申込み内容
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>受付番号</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>受付日時</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['date_regist'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
</td>
</tr>
<tr>
<th>主催者名</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>所在地（郵便番号）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>所在地（都道府県）</th>
<td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>所在地（市町村以下）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ご担当者名</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ご担当者名フリガナ</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ご担当者役職</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>電話番号</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['data']['naisen']): ?>　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>FAX番号</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>メールアドレス</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>

<tr>
<td colspan="2"><hr></td>
</tr>

<tr>
<th>希望開催日時(第1希望)</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['year_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx01'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
〜<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>希望開催日時(第2希望)</th>
<td><?php if ($this->_tpl_vars['data']['year_2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['year_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
〜<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>会場所在地（会場名）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>会場所在地（都道府県）</th>
<td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>会場所在地（市町村以下）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>講演対象</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['object_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>受講予定人数</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>講演テーマ</th>
<td><?php if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']]):  echo ((is_array($_tmp=$this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  if ($this->_tpl_vars['data']['theme_text']): ?><br><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['theme_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp));  endif; ?></td>
</tr>
<tr>
<th>ビデオ</th>
<td><?php if ($this->_tpl_vars['data']['video'] == '1'): ?>あり<?php else: ?>なし<?php endif; ?></td>
</tr>
<tr>
<th>配付希望資料（必要部数）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
部</td>
</tr>
<tr>
<th>配付希望資料（資料送付先）</th>
<td><?php if ($this->_tpl_vars['data']['receiver_address'] == 'host'): ?>主催者<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'venue'): ?>会場<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'other'): ?>その他　（<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['receiver_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
）<?php endif; ?></td>
</tr>
<tr>
<th>パソコンおよびプロジェクターの使用</th>
<td><?php if ($this->_tpl_vars['data']['use_pcprj'] == '1'): ?>使用可能<?php endif;  if ($this->_tpl_vars['data']['use_pcprj'] == '2'): ?>使用不可能<?php endif; ?></td>
</tr>
<tr>
<th>本制度・動画教材のご利用経験</th>
<td><?php if ($this->_tpl_vars['data']['exp'] == '1'): ?>前回は<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年 <?php echo $this->_tpl_vars['data']['use_month']; ?>
月 頃<?php else: ?>なし<?php endif; ?></td>
</tr>
<tr>
<th>その他連絡事項</th>
<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['connection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
</table>

<br><a name="hassou"></a>
確定内容
<table cellspacing="1" class="azlist" width="90%">

<tr>
<th>講演日</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['year_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日</td>
</tr>
<tr>
<th>派遣先</th>
<td>
対象：<?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['taisyou']]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['taisyou']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?><br>
紹介先：<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['syoukai'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br>
主催者名：<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>
<tr>
<th>講演テーマ</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['theme2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>派遣講師</th>
<td>
分類：<?php if (@ $this->_tpl_vars['inst_type'][$this->_tpl_vars['data']['inst_type']]):  echo $this->_tpl_vars['inst_type'][$this->_tpl_vars['data']['inst_type']];  endif; ?><br>
講師名：<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</td>
</tr>
<tr>
<th>担当部署</th>
<td><?php if (@ $this->_tpl_vars['branch'][$this->_tpl_vars['data']['branch']]):  echo ((is_array($_tmp=$this->_tpl_vars['branch'][$this->_tpl_vars['data']['branch']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>聴講者数</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
人</td>
</tr>

<tr>
<th>資料送付先</th>
<td><?php if ($this->_tpl_vars['data']['sregist'] == 1): ?><span style="color:red;font-weight:bold;">以下の内容で配付資料登録を行います。よろしければ「確定」を押してください。</span><br><?php endif; ?>

<table cellspacing="0" cellpadding="1" border="0">
<tr>
<td>郵便番号</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<td>住所</td><td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['spref']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['spref']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<td>あて先</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<td>ご担当者名</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['t_tantou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<td>電話番号</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<td>摘要</td>
<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['stekiyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
</table>

</td>
</tr>

<tr>
<th>配付資料</th>
<td>

  <table cellpadding="1" cellspacing="0" border="0">

<tr>
  <td colspan="2">
<?php if ($this->_tpl_vars['doclist']): ?>
<ul class="sdocs">
<?php $_from = $this->_tpl_vars['doclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['data']['sdocs']):  $_from = $this->_tpl_vars['data']['sdocs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if ($this->_tpl_vars['datum2'] == $this->_tpl_vars['datum']['id']): ?><li>・<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li><?php endif;  endforeach; endif; unset($_from);  endif;  endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>
<br clear="all">
<?php if (@ $this->_tpl_vars['data']['shiryou']):  echo ((is_array($_tmp=$this->_tpl_vars['shiryou'][$this->_tpl_vars['data']['shiryou']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>
  </td>
  </tr>
  <tr>
  <td width="40%">配付資料部数</td><td width="60%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['shiryou_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
部</td>
  </tr>

  <tr>
  <td colspan="2">
<?php if ($this->_tpl_vars['books']): ?>
<table width="100%">
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']['count']): ?>
<tr>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td><td><?php if ($this->_tpl_vars['datum']['count']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 部<?php else: ?>&nbsp;<?php endif; ?></td>
</tr>
<?php endif;  endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
  </td>
  </tr>

  <tr>
  <td>その他</td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['shiryou_other'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
  <tr>
  <td>「その他の資料」手配担当</td><td><?php if ($this->_tpl_vars['data']['stantou'] == 1): ?>本部<?php endif;  if ($this->_tpl_vars['data']['stantou'] == 2): ?>担当支部<?php endif;  if (! $this->_tpl_vars['data']['stantou']): ?>なし<?php endif; ?></td>
  </tr>
  <tr>
  <td>資料到着希望日</td><td><?php if ($this->_tpl_vars['data']['syear']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['syear'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>-<?php endif; ?>年<?php if ($this->_tpl_vars['data']['smonth']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['smonth'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>-<?php endif; ?>月<?php if ($this->_tpl_vars['data']['sday']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['sday'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>-<?php endif; ?>日</td>
  </tr>
  <tr>
  <td>発送登録</td><td><?php if ($this->_tpl_vars['data']['sregist'] == 1): ?>する<?php endif;  if ($this->_tpl_vars['data']['sregist'] == 2): ?>しない<?php endif; ?></td>
  </tr>
  </table>

</td>
</tr>
<tr>
<th>聴講状態</th>
<td>
<?php if (@ $this->_tpl_vars['inst_condition'][$this->_tpl_vars['data']['inst_condition']]):  echo $this->_tpl_vars['inst_condition'][$this->_tpl_vars['data']['inst_condition']];  endif; ?>&nbsp;
</td>
</tr>
<tr>
<th>講演時間</th>
<td>
<?php if (@ $this->_tpl_vars['hours'][$this->_tpl_vars['data']['inst_hour']]):  echo $this->_tpl_vars['hours'][$this->_tpl_vars['data']['inst_hour']];  endif; ?>時間 
<?php if (@ $this->_tpl_vars['mins'][$this->_tpl_vars['data']['inst_min']]):  echo $this->_tpl_vars['mins'][$this->_tpl_vars['data']['inst_min']];  endif; ?>分 
</td>
</tr>
<tr>
<th>備考</th>
<td>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

</td>
</tr>
<tr>
<!--<th>ステータス</th>
<td>
<?php echo $this->_tpl_vars['status'][$this->_tpl_vars['data']['status']]; ?>
</td>
</tr>-->
</table>

<table cellspacing="1" class="azlist" width="90%">
<tr>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstRegist" method="POST" name="frm1">
<td align="center">
<input type="submit" value="　確定　"><input type="hidden" name="mode" value="submit">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</td>
</form>
</tr>
</table>

<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstRegist" method="POST" name="frm1">
<input type="submit" value="　戻る　"><input type="hidden" name="mode" value="rewrite">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>

</div>
</body>
</html>