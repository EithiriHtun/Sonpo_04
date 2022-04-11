<?php /* Smarty version 2.6.9, created on 2022-03-18 14:24:54
         compiled from pubindex.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubindex.html', 15, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・刊行物 管理画面</h2>
<div class="maincontents">

<a href="/manage/forms/index.php/module/FormManage">戻る</a>
<hr>
<div align="right">
［<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">ログアウト</a>］
</div>
<ul>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubReceptIndex">受付管理</a><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2'] || $this->_tpl_vars['is_shipping']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubOrderIndex">発送管理</a><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2'] || $this->_tpl_vars['is_shipping'] || $this->_tpl_vars['is_sassi']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubShipIndex">発送履歴</a><?php endif; ?>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubStockIndex">在庫状況履歴</a>
<?php if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterIndex">刊行物マスター管理</a><?php endif;  if (! $this->_tpl_vars['is_shipping']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMakeOrder">刊行物申込</a><?php endif;  if ($this->_tpl_vars['is_master']): ?><li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubOpenRegist">刊行物申込受付一時停止設定（取寄せは含まず）</a><?php endif;  if ($this->_tpl_vars['is_master']): ?><li style="margin-top:10px;"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubInactiveIndex">削除データ[受付管理・発送管理]</a><?php endif; ?>
</ul>

<a href="/manage/forms/index.php/module/FormManage">戻る</a>

</div>
</body>
</html>