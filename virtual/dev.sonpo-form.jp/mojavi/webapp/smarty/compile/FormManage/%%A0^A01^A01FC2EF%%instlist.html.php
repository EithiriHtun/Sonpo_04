<?php /* Smarty version 2.6.9, created on 2022-03-10 11:45:12
         compiled from instlist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'instlist.html', 59, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<script language="javascript">
<!--
<?php echo '
var allSel=false;
function fnc_all_click(objAll){
	if(allSel){
	  allSel=false;
	  document.getElementById("btnSelChk").value="������";
	}else{
	  allSel=true;
	  document.getElementById("btnSelChk").value="�����";
	}

	for(var i=0;i<document.frm1.length;i++){
		//�����å��ܥå����Ǥ����
		if(document.frm1[i].type=="checkbox"){
			document.frm1[i].checked = allSel;
		}
	}
}

function checkchecked(){
  var is_check=0;
  var ids=\'\';
  for(index = 0; index < document.frm1.elements["dl[]"].length; index++){
    if(document.frm1.elements["dl[]"][index].checked){
      is_check=is_check+1;
      ids=ids + document.frm1.elements["inst_id[]"][index].value + "\\n";
    }
  }
  
  if(!is_check){
    alert(\'�������ǡ��������򤵤�Ƥ��ޤ���\');
    return false;
  }else{
    return confirm(\'���򤷤��ǡ����������Ƥ�����Ǥ�����\'+ "\\n" + ids);
  }

}

//-->
'; ?>

</script>
</head>

<body bgcolor="#FFFFFF">
<h2>����»���ݸ����񡦹ֻ��ɸ� ��������</h2>
<h3>�ֻ��ɸ��ʰ�����</h3>
<!--<?php echo $this->_tpl_vars['action_memory_usage']; ?>
-->
<!--<?php echo $this->_tpl_vars['action_memory_usage2']; ?>
-->
<!--<?php echo $this->_tpl_vars['memory_usage']; ?>
-->
<div class="maincontents">

<a href="/manage/forms/index.php/module/FormManage">���</a><?php if (@ $this->_tpl_vars['is_master'] || @ $this->_tpl_vars['is_master2']): ?>��<a href="/manage/forms/index.php/module/FormManage/action/InstInactiveIndex?y=<?php echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&br=<?php echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&st=<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&ts=<?php echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">����ǡ���</a><?php endif; ?>

<hr>
<div align="right">
��<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">��������</a>��
</div>

<b><?php if (@ $this->_tpl_vars['year'] == -1): ?> <?php else:  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>ǯ��</b><br>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstAdd?y=<?php echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;br=<?php echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;st=<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;ts=<?php echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">�ɲ���Ͽ</a><br>
<?php if (@ $this->_tpl_vars['data']): ?><br>
�»ܷ���������<?php if (@ $this->_tpl_vars['taisyou_count'][1]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou_count'][1])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?>��⹻<?php if (@ $this->_tpl_vars['taisyou_count'][2]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou_count'][2])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?>����<?php if (@ $this->_tpl_vars['taisyou_count'][3]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou_count'][3])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?>����̰�<?php if (@ $this->_tpl_vars['taisyou_count'][4]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou_count'][4])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?>�����¾<?php if (@ $this->_tpl_vars['taisyou_count'][5]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou_count'][5])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>0<?php endif; ?>��<br>
<?php endif; ?>
<br>
<form action="/manage/forms/index.php/module/FormManage/action/InstList" name="selform">
<table>
<tr>
<td align="right">�ֱ�ǯ��</td><td><select name="y" onChange="document.selform.submit();"><!--<option value="">ǯ��</option>-->
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == @ $this->_tpl_vars['year']): ?> selected<?php endif; ?>><?php if ($this->_tpl_vars['dkey'] == -1): ?>����ʳ�<?php else:  echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></option><?php endforeach; endif; unset($_from); ?></td>
</tr>
<tr>
<td align="right">ô������</td><td><select name="br" onChange="document.selform.submit();"><option value="99">���٤�</option>
<?php $_from = $this->_tpl_vars['branch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == @ $this->_tpl_vars['nbranch']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?></td>
</tr>
<tr>
<td align="right">�о�</td><td><select name="ts" onChange="document.selform.submit();"><option value="0">���٤�</option>
<?php $_from = $this->_tpl_vars['taisyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == @ $this->_tpl_vars['ntaisyou']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?></td>
</tr>
<tr>
<td align="right">���ơ�����</td><td><select name="st" onChange="document.selform.submit();"><option value="99">���٤�</option>
<?php $_from = $this->_tpl_vars['inst_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == @ $this->_tpl_vars['status']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?></td>
</tr>
</table>
</form>
<?php if (@ $this->_tpl_vars['data']): ?>
<form action="index.php/module/FormManage/action/InstCsv" method="POST" name="frm1">
<table cellspacing="1" class="azlist">
<tr>
<th>�����ֹ�</th>
<th>�ֱ���</th>
<th>ô������</th>
<th>�о�</th>
<th>��ż�</th>
<th>�ֱ�ơ���</th>
<th>���ơ�����</th>
<!--<th>ȯ�������ʵ��</th>-->
<th>ȯ������</th>
<th>�����å�</th>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<td><?php if (@ $this->_tpl_vars['is_master'] || @ $this->_tpl_vars['is_master2']): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstRegist?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;y=<?php echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;br=<?php echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;st=<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;ts=<?php echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><?php else:  if (@ $this->_tpl_vars['datum']['branch']):  if (@ $this->_tpl_vars['mybranch'] == @ $this->_tpl_vars['datum']['branch'] || ( @ $this->_tpl_vars['mybranch'] == 6 && @ $this->_tpl_vars['datum']['branch'] == 5 ) || ( @ $this->_tpl_vars['mybranch'] == 20 && @ $this->_tpl_vars['datum']['branch'] == 3 ) || ( @ $this->_tpl_vars['mybranch'] == 21 && @ $this->_tpl_vars['datum']['branch'] == 3 ) || ( @ $this->_tpl_vars['mybranch'] == 21 && @ $this->_tpl_vars['datum']['branch'] == 20 )): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstRegist?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;y=<?php echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;br=<?php echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;st=<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;ts=<?php echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><?php else:  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  else:  if ($this->_tpl_vars['mybranch'] == $this->_tpl_vars['branch_no'][$this->_tpl_vars['datum']['lecture_prefecture']]): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstRegist?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;y=<?php echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;br=<?php echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;st=<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;ts=<?php echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><?php else:  echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  endif;  endif; ?></td>
<td><?php if (@ $this->_tpl_vars['datum']['year_3']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['year_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['month_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['day_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo ((is_array($_tmp=$this->_tpl_vars['datum']['year_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['month_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['day_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if (@ $this->_tpl_vars['datum']['year_2']): ?>(<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['year_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['month_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['day_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php endif;  endif; ?></td>
<td><?php if (@ $this->_tpl_vars['branch'][$this->_tpl_vars['datum']['branch']]):  echo ((is_array($_tmp=$this->_tpl_vars['branch'][$this->_tpl_vars['datum']['branch']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  if (@ $this->_tpl_vars['branch_no2'][$this->_tpl_vars['datum']['lecture_prefecture']]):  echo $this->_tpl_vars['branch_no2'][$this->_tpl_vars['datum']['lecture_prefecture']];  endif;  endif; ?></td>
<td><?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
<td><?php if (@ $this->_tpl_vars['datum']['host2']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['host2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo $this->_tpl_vars['datum']['host'];  endif; ?>&nbsp;</td>
<td><?php if (@ $this->_tpl_vars['datum']['theme2']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['theme2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']]):  echo $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']];  endif;  endif; ?>&nbsp;</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inst_status'][$this->_tpl_vars['datum']['status']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<!-- old --><!--<td>
<?php if (@ $this->_tpl_vars['datum']['is_new'] == 0):  if (@ $this->_tpl_vars['datum']['sdocs']): ?>
  <?php if (@ $this->_tpl_vars['datum']['sregist'] == 1): ?>
    <?php if (@ $this->_tpl_vars['datum']['t_status'] == 1): ?>
      <?php if (@ $this->_tpl_vars['datum']['t_status2'] == 1): ?>ȯ���Ѥ�
      <?php else: ?>ȯ����ǧ�Ѥ�
      <?php endif; ?>
    <?php else: ?>
      <?php if (@ $this->_tpl_vars['datum']['t_status'] == 0): ?>ȯ����ǧ�Ԥ�
      <?php endif; ?>
    <?php endif; ?>
  <?php endif;  endif;  endif; ?>&nbsp;
</td>-->
<td>
<?php if (@ $this->_tpl_vars['datum']['sregist'] == 1):  if (@ $this->_tpl_vars['datum']['approve'] == 1):  if (@ $this->_tpl_vars['datum']['trans_status'] == 1): ?>�б���<?php elseif ($this->_tpl_vars['datum']['trans_status'] == 2): ?>ȯ���Ѥ�<?php else: ?>��ǧ�Ѥ�<?php endif;  else:  if (@ $this->_tpl_vars['datum']['approve'] <> 99): ?>��ǧ�Ԥ�<?php endif;  endif;  endif; ?>
&nbsp;</td>
<td align="center"><input type="checkbox" name="dl[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><input type="hidden" name="inst_id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<input type="hidden" name="dl[]" value="">
<input type="hidden" name="inst_id[]" value="">
<tr><td colspan="8">&nbsp;</td><td><input type="button" value="������" id="btnSelChk" onClick="fnc_all_click(this);"></td></tr>
</table>
<div>
<table cellpadding="1" cellspacing="0" border="0">
<?php if (@ $this->_tpl_vars['is_master'] || @ $this->_tpl_vars['is_master2']): ?>
<tr>
<td>����</td>
<td align="right">�ǡ������</td>
<td><input type="submit" name="subbtn" value="�����å������ǡ����κ��" onClick="return checkchecked();"></td>
</tr>
<?php endif; ?>
<tr>
<td>����</td>
<td align="right">CSV���������</td><td><input type="button" value="�����CSV" onClick="document.frm2.submit();">��<input type="submit" name="subbtn" value="�����å������ǡ�����CSV">��
<input type="radio" name="csvtype" value="basic" checked onClick="if(this.checked)document.frm2.csvtype.value='basic'">���ܾ���<input type="radio" name="csvtype" value="all" onClick="if(this.checked)document.frm2.csvtype.value='all'">���٤Ƥξ���
<input type="hidden" name="y" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="br" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="st" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="ts" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
</table>
</form>
<?php endif; ?>
<br><hr>
<a href="/manage/forms/index.php/module/FormManage">���</a>
<form action="index.php/module/FormManage/action/InstCsv" method="POST" name="frm2">
<input type="hidden" name="is_all" value="1">
<input type="hidden" name="ids" value="<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,<?php endforeach; endif; unset($_from); ?>">
<input type="hidden" name="csvtype" value="basic">
</form>
</div>
</body>
</html>