<?php /* Smarty version 2.6.9, created on 2022-03-10 13:00:01
         compiled from pubmasterlist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubmasterlist.html', 13, false),array('modifier', 'string_format', 'pubmasterlist.html', 32, false),array('modifier', 'number_format', 'pubmasterlist.html', 45, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・刊行物 管理画面</h2>
<h3>刊行物マスター（一覧）</h3>
<div class="maincontents">

<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubIndex">戻る</a>
<hr>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterRegist">新規追加</a>
<hr>
<?php if ($this->_tpl_vars['data']): ?>
<table cellspacing="1" class="azlist" width="700">
<tr>
<th>冊子番号</th>
<th>冊子名</th>
<th>オンライン</th>
<th>取寄</th>
<th>講師派遣</th>
<!--<th>冊子管理部門</th>-->
<th>在庫部数</th>
<!--<th>　</th>-->
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<td align="left" valign="top" nowrap><?php if ($this->_tpl_vars['datum']['pub_id_1'] || $this->_tpl_vars['datum']['pub_id_2']): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterRegist?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['pub_id_1'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%05d") : smarty_modifier_string_format($_tmp, "%05d")); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['pub_id_2'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
</a><?php endif; ?></td>
<td align="left" valign="top"><?php if ($this->_tpl_vars['datum']['name']): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterRegist?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><?php else: ?>&nbsp;<?php endif; ?></td>

<!--
<td align="center"><?php if (! $this->_tpl_vars['datum']['showrange'] || $this->_tpl_vars['datum']['showrange'] == 2): ?>○<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="center"><?php if (! $this->_tpl_vars['datum']['showrange'] || $this->_tpl_vars['datum']['showrange'] == 1): ?>○<?php else: ?>&nbsp;<?php endif; ?></td>
-->

<td align="center"><?php if ($this->_tpl_vars['datum']['show_online']): ?>○<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['datum']['show_other']): ?>○<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['datum']['show_inst']): ?>○<?php else: ?>&nbsp;<?php endif; ?></td>

<!--<td align="left" valign="top"><?php if ($this->_tpl_vars['datum']['users_name']):  $_from = $this->_tpl_vars['datum']['users_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 echo ((is_array($_tmp=$this->_tpl_vars['datum2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br><?php endforeach; endif; unset($_from);  else: ?>&nbsp;<?php endif; ?></td>-->
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['total_amount']):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['datum']['total_amount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp));  else: ?>0<?php endif; ?></td>
<!--<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterIndex" method="POST">
<td align="center" valign="top"><?php if ($this->_tpl_vars['datum']['is_delete']): ?><input type="hidden" name="mode" value="delete"><input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><input type="submit" value="削除" onClick="return confirm('このデータを削除してよろしいですか？');"><?php else: ?>　<?php endif; ?></td>
</form>-->
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
<hr>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubIndex">戻る</a>
</div>
</body>
</html>