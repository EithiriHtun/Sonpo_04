<?php /* Smarty version 2.6.9, created on 2022-02-03 15:02:46
         compiled from pw_reset_input.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pw_reset_input.html', 14, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</h2>
<h3>�ѥ���ɺ�����</h3>
<div class="mainmenu">

<form action="/manage/forms/index.php/module/FormManage/action/ResetPassword" method="POST" target="_top">
<input type="hidden" name="reset_token" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reset_token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<!-- ����ƥ�� -->
<table border="0" cellpadding="0" cellspacing="0" width="817">
	<tr>
		<td align="center" style="padding:30px 0px 0px 0px;">
			<table border="0" cellpadding="0" cellspacing="0" width="430">
				<!-- ��å����� -->

				<tr><td style="padding:10px 0px 0px 4px;"><p class="text2">��Ͽ�ԥ��������̾�������ꤹ��ѥ���ɤ����Ϥ��Ƥ���������</p></td></tr>
				<tr><td valign="middle" style="padding-top:8px;">
<?php if ($this->_tpl_vars['login_error_message']): ?><table border="0" cellpadding="0" cellspacing="0" width="430">
<tr>
<td align="center" class="box_attent"></td>
<td style="padding:0px 0px 0px 6px;"><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['login_error_message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span></td>
</tr>
</table><?php endif; ?>
					</td>
				</tr>
				<!-- /��å����� -->
				<tr><td align="center" style="padding-top:10px;">

<div align="center">
<div class="login_frm">
<table class="login_table" border="0" cellpadding="0" cellspacing="0" width="500">
<tr>
<th class="login_th text2" style="padding-top:20px;">��Ͽ�ԥ��������̾</th>
<td class="login_td text2" style="padding-top:20px;"><input type="text" size="100" name="account" style="width:250"></td>
</tr>
<tr>
<th class="login_th text2" style="padding-top:4px;">���ѥ����</th>
<td class="login_td text2" style="padding-top:4px;"><input type="password" size="100" name="passwd" style="width:250"></td>
</tr>
<tr>
<th class="login_th text2" style="padding-top:4px;">���ѥ���ɡʳ�ǧ��</th>
<td class="login_td text2" style="padding-top:4px;"><input type="password" size="100" name="passwd2" style="width:250"></td>
</tr>
</table>
<div class="line_dot_x" style="margin:16px 10px 0px 10px;"><img src="/img_c/spacer.gif" width="1" height="1" border="0" alt=""></div>
<div class="botton_frm"><input type="submit" value="�ϣ�"></div>

</div>
</div>

				</td></tr>
			</table>
		</td>
	</tr>
</table>
<!-- /����ƥ�� -->
</form>

</div>
</body>
</html>