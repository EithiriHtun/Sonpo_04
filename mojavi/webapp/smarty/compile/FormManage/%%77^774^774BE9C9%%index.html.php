<?php /* Smarty version 2.6.9, created on 2022-03-18 14:24:30
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'index.html', 15, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物・講師派遣関連 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・刊行物・講師派遣関連 管理画面</h2>
<h3>一覧</h3>
<div class="maincontents">

<hr>
<div align="right">
<?php if ($this->_tpl_vars['previous_login_time']): ?>最終ログイン日時：<?php echo ((is_array($_tmp=$this->_tpl_vars['previous_login_time'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php endif; ?>［<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">ログアウト</a>］
</div>
<?php if ($this->_tpl_vars['pw_alert']): ?><div><span style="color:red;">※<?php echo ((is_array($_tmp=$this->_tpl_vars['pw_limit_date'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
までにパスワードを変更してください</span></div><?php endif; ?>
<ul>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubIndex">刊行物</a>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2'] || $this->_tpl_vars['branch']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstList">講師派遣</a><?php endif;  if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/ListIDPW">登録者</a><?php endif; ?>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/SetPW">パスワード変更</a>
<?php if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logdl">ログのダウンロード</a><?php endif; ?>
</ul>

</div>
</body>
</html>