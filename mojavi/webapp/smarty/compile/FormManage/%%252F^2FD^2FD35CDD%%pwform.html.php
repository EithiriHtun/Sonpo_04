<?php /* Smarty version 2.6.9, created on 2022-03-16 11:55:09
         compiled from pwform.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pwform.html', 9, false),)), $this); ?>
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
<h3>�ѥ��������</h3>

<div class="maincontents">
<a href="/manage/forms/index.php/module/FormManage">���</a>
<br>
<br>
<?php if (@ $this->_tpl_vars['errors']):  $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span><br><?php endforeach; endif; unset($_from);  endif; ?>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/SetPW" method="POST" name="frm1">
<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table cellspacing="1" class="azlist">
<tr>
<th>�ѥ����</th>
<td width="75%"><input type="password" name="password" AUTOCOMPLETE="off"></td>
</tr>
<tr>
<th>�ѥ���ɡʳ�ǧ�ѡ�</th>
<td width="75%"><input type="password" name="password2" AUTOCOMPLETE="off"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="��¸">��<input type="button" value="����󥻥�" onClick="location.href='<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage'"></td>
</tr>

</table>
</form>

</div>
</body>
</html>