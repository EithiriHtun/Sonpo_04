<?php /* Smarty version 2.6.9, created on 2022-02-25 11:18:50
         compiled from logmenu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'logmenu.html', 12, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物・講師派遣関連 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会 管理画面</h2>
<h3>ログのダウンロード</h3>
<div class="maincontents">
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/">戻る</a>

<hr>
<form action="/manage/forms/index.php/module/FormManage/action/Logdl" method="post">
<table cellspacing="1" class="azlist">
<tr>
<th>期間の指定</th>
<td width="75%">
<select name="syear">
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>年
<select name="smonth">
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>月
<select name="sday">
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>日
<select name="shour">
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>時
<select name="smin">
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>分　から　
<br>
<select name="eyear">
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>年
<select name="emonth">
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>月
<select name="eday">
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>日
<select name="ehour">
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>時
<select name="emin">
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>分　まで　
</td>
</tr>

<tr>
<th>ログの種類</th>
<td>
<input type="submit" name="mode" value="刊行物の申込"><br>
<input type="submit" name="mode" value="刊行物マスター"><br>
<input type="submit" name="mode" value="講師派遣の申込"><br>
<input type="submit" name="mode" value="登録者"><br>
</td>
</tr>
</table>
</form>
<hr>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/">戻る</a>
</div>
</body>
</html>