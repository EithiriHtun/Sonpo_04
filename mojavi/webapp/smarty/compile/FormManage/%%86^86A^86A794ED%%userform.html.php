<?php /* Smarty version 2.6.9, created on 2022-03-08 13:15:31
         compiled from userform.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'userform.html', 9, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<script type="text/javascript" src="/manage/cm.js"></script>
</head>

<body bgcolor="#FFFFFF"<?php if (@ $this->_tpl_vars['popmsg']): ?> onLoad="alert('<?php echo ((is_array($_tmp=$this->_tpl_vars['popmsg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"<?php endif; ?>>
<h2>����»���ݸ�������Ͽ�� ��������</h2>
<h3>��Ͽ�Ծܺ�</h3>

<div class="maincontents">
<a href="/manage/forms/index.php/module/FormManage/action/ListIDPW">���</a>
<br>
<br>
<?php if (@ $this->_tpl_vars['errors']):  $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span><br><?php endforeach; endif; unset($_from);  endif; ?>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/SetIDPW" method="POST" name="frm1">
<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table cellspacing="1" class="azlist">
<tr>
<th>��Ͽ�ԥ�����</th>
<td width="75%"><?php if (@ $this->_tpl_vars['data']['is_master'] == 1): ?>�ޥ�������������<?php endif;  if (@ $this->_tpl_vars['data']['is_master2'] == 1): ?>�ޥ�����<?php endif;  if (@ $this->_tpl_vars['data']['branch']): ?>����<?php endif;  if (@ $this->_tpl_vars['data']['is_shipping'] == 1): ?>�����ȼ�<?php endif;  if (@ $this->_tpl_vars['data']['is_sassi'] == 1): ?>���ҽ������<?php endif; ?></td>
</tr>
<tr>
<th>��Ͽ�ԥ��������̾</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['account'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<input type="hidden" name="account" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['account'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>�ѥ����</th>
<td width="75%"><input type="password" name="password" AUTOCOMPLETE="off"></td>
</tr>
<tr>
<th>�ѥ���ɡʳ�ǧ�ѡ�</th>
<td width="75%"><input type="password" name="password2" AUTOCOMPLETE="off"></td>
</tr>
<tr>
<th>���ҽ������̾������̾</th>
<td width="75%"><input type="text" name="bikou" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="50"></td>
</tr>
<tr>
<th>�᡼�륢�ɥ쥹</th>
<td width="75%"><input type="text" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="50"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="��¸">��<input type="button" value="����󥻥�" onClick="location.href='<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/ListIDPW'"></td>
</tr>

</table>
</form>

</div>
</body>
</html>