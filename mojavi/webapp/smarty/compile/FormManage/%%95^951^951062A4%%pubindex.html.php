<?php /* Smarty version 2.6.9, created on 2022-03-18 14:24:54
         compiled from pubindex.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubindex.html', 15, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>����»���ݸ����񡦴���ʪ ��������</h2>
<div class="maincontents">

<a href="/manage/forms/index.php/module/FormManage">���</a>
<hr>
<div align="right">
��<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">��������</a>��
</div>
<ul>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubReceptIndex">���մ���</a><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2'] || $this->_tpl_vars['is_shipping']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubOrderIndex">ȯ������</a><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2'] || $this->_tpl_vars['is_shipping'] || $this->_tpl_vars['is_sassi']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubShipIndex">ȯ������</a><?php endif; ?>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubStockIndex">�߸˾�������</a>
<?php if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterIndex">����ʪ�ޥ���������</a><?php endif;  if (! $this->_tpl_vars['is_shipping']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMakeOrder">����ʪ����</a><?php endif;  if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubOpenRegist">����ʪ�������հ���������ʼ�󤻤ϴޤޤ���</a><?php endif;  if ($this->_tpl_vars['is_master']): ?><li style="margin-top:10px;"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubInactiveIndex">����ǡ���[���մ�����ȯ������]</a><?php endif; ?>
</ul>

<a href="/manage/forms/index.php/module/FormManage">���</a>

</div>
</body>
</html>