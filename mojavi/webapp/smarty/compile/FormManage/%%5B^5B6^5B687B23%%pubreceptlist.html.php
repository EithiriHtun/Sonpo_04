<?php /* Smarty version 2.6.9, created on 2022-03-17 13:54:47
         compiled from pubreceptlist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubreceptlist.html', 57, false),array('modifier', 'string_format', 'pubreceptlist.html', 88, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<?php echo '
<script>
<!--
function sendForm01(){
  document.form01.submit();
}
function allCheck(check){
  var index;
  if(check){
    for(index = 0; index < document.form02.elements["dl[]"].length; index++){
      document.form02.elements["dl[]"][index].checked = true;
    }
  }else{
    for(index = 0; index < form02.elements["dl[]"].length; index++){
      document.form02.elements["dl[]"][index].checked = false;
    }
  }
}

function checkchecked(){
  var is_check=0;
  var ids=\'\';
  for(index = 0; index < document.form02.elements["dl[]"].length; index++){
    if(document.form02.elements["dl[]"][index].checked){
      is_check=is_check+1;
      ids=ids + document.form02.elements["recept_id[]"][index].value + "\\n";
    }
  }
  
  if(!is_check){
    alert(\'削除するデータが選択されていません。\');
    return false;
  }else{
    return confirm(\'選択したデータを削除してよろしいですか？\'+ "\\n" + ids);
  }

}

//-->
</script>
'; ?>

</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・刊行物 管理画面</h2>
<h3>受付管理（一覧）</h3>
<div class="maincontents">

<a href="/manage/forms/index.php/module/FormManage/action/PubIndex">戻る</a>
<hr>
<div align="right">
［<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">ログアウト</a>］
</div>
<form action="/manage/forms/index.php/module/FormManage/action/PubReceptIndex" method="POST" name="form01">
<table>
<tr>
<tr>
<td align="right">受付月</td><td><select name="rec_year" onChange="sendForm01();"><option value="99">▼年度<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['recept_page']['rec_year']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select><select name="rec_month" onChange="sendForm01();"><option value="99">▼月<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['recept_page']['rec_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select></td>
</tr>
<tr>
<td align="right">承認</td><td><select name="approve" onChange="sendForm01();"><option value="99">▼すべて<?php $_from = $this->_tpl_vars['approve']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['recept_page']['approve']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select></td>
</tr>
</table>
</form>
<?php if ($this->_tpl_vars['data']): ?>

<form action="index.php/module/FormManage/action/PubReceptDelete" method="POST" name="form02">
<table cellspacing="1" class="azlist">
<tr>
<th>受付番号</th>
<th>講師派遣<br>受付番号</th>
<th>名前・主催者名</th>
<th>到着希望日</th>
<th>承認</th>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><th>チェック</th><?php endif; ?>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<td><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubReceptRegist?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['recept_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
<td><?php if ($this->_tpl_vars['datum']['inst_id']):  if (@ $this->_tpl_vars['datum']['is_dub']): ?><span style="color:red;"><?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if (@ $this->_tpl_vars['datum']['is_dub']): ?></span><?php endif;  else: ?>&nbsp;<?php endif; ?></td>
<td><?php if ($this->_tpl_vars['datum']['inst_host']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
：<?php else:  if ($this->_tpl_vars['datum']['user_status'] == 2 && $this->_tpl_vars['datum']['company']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
：<?php endif;  endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<td><?php if ($this->_tpl_vars['datum']['req_year']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['req_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['req_month'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['req_day'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d"));  else: ?>&nbsp;<?php endif; ?></td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['approve'][$this->_tpl_vars['datum']['approve']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><td align="center"><?php if (! $this->_tpl_vars['datum']['approve']): ?><input type="checkbox" name="dl[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><input type="hidden" name="recept_id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['recept_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php else: ?>&nbsp;<?php endif; ?></td><?php endif; ?>
</tr>
<?php endforeach; endif; unset($_from); ?>
<input type="hidden" name="dl[]" value="">
<input type="hidden" name="recept_id[]" value="">
</table>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><input type="checkbox" name="checkall" onClick="allCheck(this.checked);">全選択<br><?php endif; ?>
<input type="submit" value="チェックしたデータの削除" onClick="return checkchecked();">
</form>
<?php endif; ?>
<br><a href="/manage/forms/index.php/module/FormManage/action/PubIndex">戻る</a>

</div>
</body>
</html>