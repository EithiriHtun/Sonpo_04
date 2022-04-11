<?php /* Smarty version 2.6.9, created on 2022-03-10 11:44:43
         compiled from pubstocklist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubstocklist.html', 13, false),array('modifier', 'string_format', 'pubstocklist.html', 25, false),array('modifier', 'number_format', 'pubstocklist.html', 33, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・刊行物 管理画面</h2>
<h3>在庫状況履歴</h3>
<div class="maincontents">

<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubIndex">戻る</a>
<hr>
<?php if ($this->_tpl_vars['data']): ?>
<table cellspacing="1" class="azlist" width="800">
<tr>
<th>冊子番号</th>
<th>冊子名</th>
<th>在庫数</th>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']['stock']): ?>
<tr>
<td align="left" valign="top"><!--<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%05d") : smarty_modifier_string_format($_tmp, "%05d")); ?>
:--><?php if ($this->_tpl_vars['datum']['pub_id_1'] || $this->_tpl_vars['datum']['pub_id_2']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['pub_id_1'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%05d") : smarty_modifier_string_format($_tmp, "%05d")); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['pub_id_2'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d"));  endif; ?></td>
<td align="left" valign="top"><?php if ($this->_tpl_vars['datum']['name']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
<!--<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['total_p']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['total_p'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?></td>
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['total_online']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['total_online'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?></td>
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['total_inst']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['total_inst'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?></td>
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['total_other']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['total_other'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?></td>
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['total_adj']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['total_adj'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?></td>
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['total_m']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['total_m'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?></td>-->
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['stock']):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['datum']['stock'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp));  else: ?>0<?php endif; ?></td>
</tr>
<?php else:  if ($this->_tpl_vars['datum']['show_if_zero'] == 1 || $this->_tpl_vars['datum']['stock'] > 0): ?><tr>
<td align="left" valign="top"><!--<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%05d") : smarty_modifier_string_format($_tmp, "%05d")); ?>
:--><?php if ($this->_tpl_vars['datum']['pub_id_1'] || $this->_tpl_vars['datum']['pub_id_2']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['pub_id_1'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%05d") : smarty_modifier_string_format($_tmp, "%05d")); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['pub_id_2'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d"));  endif; ?></td>
<td align="left" valign="top"><?php if ($this->_tpl_vars['datum']['name']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
<td align="right" valign="top"><?php if ($this->_tpl_vars['datum']['stock']):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['datum']['stock'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp));  else: ?>0<?php endif; ?></td>
</tr><?php endif;  endif;  endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
<hr>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubIndex">戻る</a>
</div>
</body>
</html>