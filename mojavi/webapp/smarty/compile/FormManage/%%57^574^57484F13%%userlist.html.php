<?php /* Smarty version 2.6.9, created on 2022-03-08 13:15:27
         compiled from userlist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'userlist.html', 12, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>����»���ݸ�������Ͽ�� ��������</h2>
<h3>��Ͽ�԰���</h3>
<div class="maincontents">
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/">���</a>

<hr>
<?php if ($this->_tpl_vars['data']): ?>
<table cellspacing="1" class="azlist" width="80%">
<tr>
<th>��Ͽ�ԥ��������̾</th>
<th>�ޥ�����<br>��������</th>
<th>�ޥ�����</th>
<th>���ҽ������</th>
<th>����</th>
<th>�����ȼ�</th>
<th>���ҽ������̾������̾</th>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<td align="center"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/SetIDPW?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['account'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
<td align="center"><?php if ($this->_tpl_vars['datum']['is_master']): ?>��<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['datum']['is_master2']): ?>��<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['datum']['is_sassi']): ?>��<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['datum']['branch']): ?>��<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['datum']['is_shipping']): ?>��<?php else: ?>&nbsp;<?php endif; ?></td>
<td align="left"><?php if ($this->_tpl_vars['datum']['bikou']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
<hr>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/">���</a>
</div>
</body>
</html>