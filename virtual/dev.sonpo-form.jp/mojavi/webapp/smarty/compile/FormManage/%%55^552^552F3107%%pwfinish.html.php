<?php /* Smarty version 2.6.9, created on 2021-04-23 18:10:25
         compiled from pwfinish.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pwfinish.html', 9, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物・講師派遣関連 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<script type="text/javascript" src="/manage/cm.js"></script>
</head>

<body bgcolor="#FFFFFF"<?php if (@ $this->_tpl_vars['popmsg']): ?> onLoad="alert('<?php echo ((is_array($_tmp=$this->_tpl_vars['popmsg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"<?php endif; ?>>
<h2>パスワード 管理画面</h2>
<h3></h3>
<div class="maincontents">
<div align="center">
<br>
<br>
<table width="400" cellpadding="0" cellspacing="0" border="0">
<tr>
<td style="border:#dddddd solid 1px;" align="center">
<br>
パスワードを登録しました。<br>
<br>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage">戻る</a>
</td>
</tr>
</table>

</div>
</div>
</body>
</html>