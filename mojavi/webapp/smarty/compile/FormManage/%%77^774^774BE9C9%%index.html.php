<?php /* Smarty version 2.6.9, created on 2022-03-18 14:24:30
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'index.html', 15, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</h2>
<h3>����</h3>
<div class="maincontents">

<hr>
<div align="right">
<?php if ($this->_tpl_vars['previous_login_time']): ?>�ǽ�������������<?php echo ((is_array($_tmp=$this->_tpl_vars['previous_login_time'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php endif; ?>��<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">��������</a>��
</div>
<?php if ($this->_tpl_vars['pw_alert']): ?><div><span style="color:red;">��<?php echo ((is_array($_tmp=$this->_tpl_vars['pw_limit_date'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
�ޤǤ˥ѥ���ɤ��ѹ����Ƥ�������</span></div><?php endif; ?>
<ul>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubIndex">����ʪ</a>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2'] || $this->_tpl_vars['branch']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstList">�ֻ��ɸ�</a><?php endif;  if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/ListIDPW">��Ͽ��</a><?php endif; ?>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/SetPW">�ѥ�����ѹ�</a>
<?php if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logdl">���Υ��������</a><?php endif; ?>
</ul>

</div>
</body>
</html>