<?php /* Smarty version 2.6.9, created on 2022-03-18 14:24:22
         compiled from login.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'login.html', 26, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物・講師派遣関連 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・刊行物・講師派遣関連 管理画面</h2>
<h3>ログイン</h3>
<div class="mainmenu">

<form action="/manage/forms/index.php/module/FormManage/action/Auth" method="POST" target="_top">
<!-- コンテンツ -->
<table border="0" cellpadding="0" cellspacing="0" width="817">
	<tr>
		<td align="center" style="padding:30px 0px 0px 0px;">
			<table border="0" cellpadding="0" cellspacing="0" width="430">
				<!-- メッセージ -->

				<tr><td style="padding:10px 0px 0px 4px;"><p class="text2">登録者アカウント名、パスワードを入力してください。</p></td></tr>
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
				<!-- /メッセージ -->
				<tr><td align="center" style="padding-top:10px;">
<!-- ログイン -->

<div align="center">
<div class="login_frm">
<table class="login_table" border="0" cellpadding="0" cellspacing="0" width="500">
<tr>
<th class="login_th text2" style="padding-top:20px;">登録者アカウント名</th>
<td class="login_td text2" style="padding-top:20px;"><input type="text" size="100" name="account" style="width:250"></td>
</tr>
<tr>
<th class="login_th text2" style="padding-top:4px;">パスワード</th>
<td class="login_td text2" style="padding-top:4px;"><input type="password" size="100" name="passwd" style="width:250"></td>
</tr>
</table>
<div class="line_dot_x" style="margin:16px 10px 0px 10px;"><img src="/img_c/spacer.gif" width="1" height="1" border="0" alt=""></div>
<div class="botton_frm"><input type="submit" value="ＯＫ"></div>

</div>
</div>
<!-- ログイン -->
				</td></tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="right">
			<br><br>
			<a href="/manage/forms/index.php/module/FormManage/action/PasswordRequest">パスワード再設定</a>
		</td>
	</tr>
</table>
<!-- /コンテンツ -->
</form>


</div>
</body>
</html>