<?php /* Smarty version 2.6.9, created on 2022-02-25 11:18:50
         compiled from logmenu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'logmenu.html', 12, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>����»���ݸ����� ��������</h2>
<h3>���Υ��������</h3>
<div class="maincontents">
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/">���</a>

<hr>
<form action="/manage/forms/index.php/module/FormManage/action/Logdl" method="post">
<table cellspacing="1" class="azlist">
<tr>
<th>���֤λ���</th>
<td width="75%">
<select name="syear">
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>ǯ
<select name="smonth">
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>��
<select name="sday">
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>��
<select name="shour">
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>��
<select name="smin">
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>ʬ�����顡
<br>
<select name="eyear">
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>ǯ
<select name="emonth">
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>��
<select name="eday">
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>��
<select name="ehour">
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>��
<select name="emin">
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dval']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>ʬ���ޤǡ�
</td>
</tr>

<tr>
<th>���μ���</th>
<td>
<input type="submit" name="mode" value="����ʪ�ο���"><br>
<input type="submit" name="mode" value="����ʪ�ޥ�����"><br>
<input type="submit" name="mode" value="�ֻ��ɸ��ο���"><br>
<input type="submit" name="mode" value="��Ͽ��"><br>
</td>
</tr>
</table>
</form>
<hr>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/">���</a>
</div>
</body>
</html>