<?php /* Smarty version 2.6.9, created on 2022-03-10 11:45:24
         compiled from pubshiplist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubshiplist.html', 26, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<?php echo '
<script>
<!--
  function sendForm01(){
    document.form01.submit();
  }

//-->
</script>
'; ?>

</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・刊行物 管理画面</h2>
<h3>発送履歴（一覧）</h3>
<div class="maincontents">

<a href="/manage/forms/index.php/module/FormManage/action/PubIndex">戻る</a>
<hr>
<div align="right">
［<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">ログアウト</a>］
</div>
<form action="/manage/forms/index.php/module/FormManage/action/PubShipIndex" method="POST" name="form01">
<table>
<tr>
<td align="right">発送月</td><td><select name="out_year" onChange="sendForm01();"><option value="99">▼年度<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['order_page']['out_year']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select><select name="out_month" onChange="sendForm01();"><option value="99">▼月<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['order_page']['out_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select></td>
</tr>
<tr>
<td align="right">属性</td><td><select name="order_type" onChange="sendForm01();"><option value="99">▼すべて<?php $_from = $this->_tpl_vars['pub_order_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['dkey'] <> 5): ?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == @ $this->_tpl_vars['order_page']['order_type']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  endforeach; endif; unset($_from); ?></select></td>
</tr>
<tr>
<td align="right">冊子名</td><td><select name="book_id" onChange="sendForm01();"><option value="0">▼すべて<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum']['id'] == @ $this->_tpl_vars['order_page']['book_id']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select></td>
</tr>
<tr>
<td align="right">請求書発行部署</td><td><select name="bill_user" onChange="sendForm01();"><option value="0">▼すべて<?php $_from = $this->_tpl_vars['sassi_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == @ $this->_tpl_vars['order_page']['bill_user']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select></td>
</tr>
</table>
</form>
<?php if ($this->_tpl_vars['data']): ?>

<form action="index.php/module/FormManage/action/PubShipCsv" method="POST" name="frm1">
<table cellspacing="1" class="azlist">
<tr>
<th>受付番号</th>
<?php if (! $this->_tpl_vars['is_sassi']): ?>
<th>講師派遣<br>受付番号</th>
<?php endif; ?>
<th>発送日</th>
<th>属性</th>
<th>冊子名</th>
<th>名前・主催者名</th>
<th>請求書宛名</th>

<th>請求書発行部署</th>

<th>決済状況</th>
<th>チェック</th>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<?php if ($this->_tpl_vars['datum']['rows']): ?>
<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubShipDetail?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['recept_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
<?php if (! $this->_tpl_vars['is_sassi']): ?>
<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php if ($this->_tpl_vars['datum']['inst_id']):  if ($this->_tpl_vars['datum']['is_dub']): ?><span style="color:red;"><?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['datum']['is_dub']): ?></span><?php endif;  else: ?>&nbsp;<?php endif; ?></td>
<?php endif; ?>
<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['out_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['out_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['out_day'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>

<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['pub_order_type'][$this->_tpl_vars['datum']['type']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['book_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;</td>
<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php if ($this->_tpl_vars['datum']['inst_host']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
：<?php else:  if ($this->_tpl_vars['datum']['user_status'] == 2 && $this->_tpl_vars['datum']['company']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
：<?php endif;  endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;</td>
<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['bill_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;</td>

<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php if (@ $this->_tpl_vars['datum']['bill_user']):  if (@ $this->_tpl_vars['sassi_users'][$this->_tpl_vars['datum']['bill_user']]):  echo ((is_array($_tmp=$this->_tpl_vars['sassi_users'][$this->_tpl_vars['datum']['bill_user']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?><span style="color:#aaaaaa;font-size:smaller;">存在しないユーザ(<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['bill_user'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</span><?php endif;  endif; ?>&nbsp;</td>

<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['settle_status'][$this->_tpl_vars['datum']['settle_status']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<td rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['rows'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" align="center"><input type="checkbox" name="dl[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>

<?php else: ?>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['book_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;</td>
<?php endif; ?>

</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

<div>
<br>
<table cellpadding="1" cellspacing="0" border="0">
<tr>
<td>　　</td>
<td align="right">CSVダウンロード</td><td><input type="button" value="全件のCSV" onClick="document.frm2.submit();">　<input type="submit" name="subbtn" value="チェックしたデータのCSV"></td>
</tr>
</table>
</div>

</form>
<?php endif; ?>
<a href="/manage/forms/index.php/module/FormManage/action/PubIndex">戻る</a>

<form action="index.php/module/FormManage/action/PubShipCsv" method="POST" name="frm2">
<input type="hidden" name="is_all" value="1">
<input type="hidden" name="ids" value="<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']['rows']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,<?php endif;  endforeach; endif; unset($_from); ?>">
<input type="hidden" name="csvtype" value="basic">
</form>

</div>
</body>
</html>