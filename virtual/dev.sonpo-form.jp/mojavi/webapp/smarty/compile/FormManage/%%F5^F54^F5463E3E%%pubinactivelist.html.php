<?php /* Smarty version 2.6.9, created on 2022-03-10 11:45:29
         compiled from pubinactivelist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubinactivelist.html', 83, false),array('modifier', 'date_format', 'pubinactivelist.html', 110, false),array('modifier', 'string_format', 'pubinactivelist.html', 111, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ ��������</title>
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
    alert(\'�ǡ��������򤵤�Ƥ��ޤ���\');
    return false;
  }else{
    return confirm(\'���򤷤��ǡ����򸵤��ᤷ�Ƥ�����Ǥ�����\'+ "\\n" + ids);
  }

}

function checkchecked2(){
  var is_check=0;
  var ids=\'\';
  for(index = 0; index < document.form02.elements["dl[]"].length; index++){
    if(document.form02.elements["dl[]"][index].checked){
      is_check=is_check+1;
      ids=ids + document.form02.elements["recept_id[]"][index].value + "\\n";
    }
  }
  
  if(!is_check){
    alert(\'�ǡ��������򤵤�Ƥ��ޤ���\');
    return false;
  }else{
    conf=confirm(\'���򤷤��ǡ��������˺�����Ƥ�����Ǥ�����\'+ "\\n" + ids);
    if(conf){
      document.form02.do_mode.value="delete";
      return true;
    }else{
      return false;
    }
  }

}

//-->
</script>
'; ?>

</head>

<body bgcolor="#FFFFFF">
<h2>����»���ݸ����񡦴���ʪ ��������</h2>
<h3>����ǡ���[���մ�����ȯ������]�ʰ�����</h3>
<div class="maincontents">

<a href="/manage/forms/index.php/module/FormManage/action/PubIndex">���</a>
<hr>
<div align="right">
��<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">��������</a>��
</div>

<?php if ($this->_tpl_vars['data']): ?>

<form action="index.php/module/FormManage/action/PubOrderActivate" method="POST" name="form02">
<table cellspacing="1" class="azlist">
<tr>
<th>�����ֹ�</th>
<th>�ֻ��ɸ�<br>�����ֹ�</th>
<th>°��</th>
<th>̾������ż�̾</th>
<th>������</th>
<!--<th>ȯ����</th>
<th>����ͽ����</th>-->
<th>��ǧ</th>
<th>ȯ������</th>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><th>��Ѿ���</th><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><th>�����å�</th><?php endif; ?>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<td><!--<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubOrderRegist?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">--><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['recept_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<!--</a>--></td>
<td><?php if ($this->_tpl_vars['datum']['inst_id']):  if (@ $this->_tpl_vars['datum']['is_dub']): ?><span style="color:red;"><?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if (@ $this->_tpl_vars['datum']['is_dub']): ?></span><?php endif;  else: ?>&nbsp;<?php endif; ?></td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['pub_order_type'][$this->_tpl_vars['datum']['type']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<td><?php if ($this->_tpl_vars['datum']['inst_host']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php else:  if ($this->_tpl_vars['datum']['user_status'] == 2 && $this->_tpl_vars['datum']['company']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php endif;  endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['regist_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</td>
<!--<td><?php if ($this->_tpl_vars['datum']['out_year']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['out_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['out_month'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['out_day'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d"));  else: ?>&nbsp;<?php endif; ?></td>
<td><?php if ($this->_tpl_vars['datum']['arr_year']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['arr_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['arr_month'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['arr_day'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d"));  else: ?>&nbsp;<?php endif; ?></td>-->
<td><?php if ($this->_tpl_vars['datum']['approve'] == 1): ?>��ǧ<?php else: ?>̤��ǧ<?php endif; ?></td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['trans_status'][$this->_tpl_vars['datum']['trans_status']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><td><?php echo ((is_array($_tmp=$this->_tpl_vars['settle_status'][$this->_tpl_vars['datum']['settle_status']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><td align="center"><input type="checkbox" name="dl[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><input type="hidden" name="recept_id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['recept_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td><?php endif; ?>
</tr>
<?php endforeach; endif; unset($_from); ?>
<input type="hidden" name="dl[]" value="">
<input type="hidden" name="recept_id[]" value="">
</table>
<input type="hidden" name="do_mode" value="activate">
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><input type="checkbox" name="checkall" onClick="allCheck(this.checked);">������<br><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><input type="submit" value="�����å������ǡ����򸵤��᤹" onClick="return checkchecked();"><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><input type="submit" value="�����å������ǡ��������˺������" onClick="return checkchecked2();"><?php endif; ?>
</form>
<?php endif; ?>
<br><a href="/manage/forms/index.php/module/FormManage/action/PubIndex">���</a>

</div>
</body>
</html>