<?php /* Smarty version 2.6.9, created on 2022-03-18 14:24:38
         compiled from puborderform.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'puborderform.html', 9, false),array('modifier', 'date_format', 'puborderform.html', 188, false),array('modifier', 'nl2br', 'puborderform.html', 245, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<script type="text/javascript" src="/manage/cm.js"></script>
</head>

<body bgcolor="#FFFFFF"<?php if (@ $this->_tpl_vars['popmsg']): ?> onLoad="alert('<?php echo ((is_array($_tmp=$this->_tpl_vars['popmsg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');"<?php endif; ?>>
<h2>����»���ݸ����񡦴���ʪ ��������</h2>
<h3>ȯ�������ʾܺ١�</h3>
<div class="maincontents">

<a href="/manage/forms/index.php/module/FormManage/action/PubOrderIndex">���</a>
<hr>

<?php if ($this->_tpl_vars['errors']):  $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span><br><?php endforeach; endif; unset($_from);  endif; ?>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubOrderRegist" method="POST" name="frm1">
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>�����ֹ�</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['recept_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>°��</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['pub_order_type'][$this->_tpl_vars['data']['type']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php if ($this->_tpl_vars['data']['inst_inst_id']): ?>
<tr>
<th>�ֻ��ɸ������ֹ�</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php endif; ?>
<tr>
<th>̾������ż�̾</th>
<td width="75%"><?php if ($this->_tpl_vars['data']['inst_host']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
</table>
<br>

<?php if ($this->_tpl_vars['data']['send_type'] <> 1 || $this->_tpl_vars['is_master'] == 1 || $this->_tpl_vars['is_master2']):  if ($this->_tpl_vars['data']['send_type'] == 1): ?>�����<?php else: ?>����������<?php endif; ?>
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>͹���ֹ�</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>����</th>
<td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>�����ֹ�</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php if ($this->_tpl_vars['data']['user_status'] == 1): ?>
<tr>
<th>��̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>�եꥬ��</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php else: ?>
<tr>
<th>ˡ�͡�����̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>����</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['section'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ô���Ի�̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ô���ԥեꥬ��</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php endif; ?>
<tr>
<th>�᡼�륢�ɥ쥹</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
</table>
<br>
<?php endif;  if ($this->_tpl_vars['data']['send_type'] == 1): ?>����������
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>͹���ֹ�</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>����</th>
<td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['sprefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['sprefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>�����ֹ�</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php if ($this->_tpl_vars['data']['suser_status'] == 1): ?>
<tr>
<th>��̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>�եꥬ��</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php else: ?>
<tr>
<th>ˡ�͡�����̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['scompany'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>����</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['ssection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ô���Ի�̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ô���ԥեꥬ��</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php endif; ?>
<!--
<tr>
<th>�᡼�륢�ɥ쥹</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['semail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
-->
</table>

<?php endif; ?>

<table cellspacing="1" class="azlist" width="90%">
<?php $_from = $this->_tpl_vars['data']['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopbooks'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopbooks']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loopbooks']['iteration']++;
?>
<tr>
  <?php if (($this->_foreach['loopbooks']['iteration'] <= 1)): ?>
<th rowspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['allbooks'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">���պ���</th>
  <?php endif; ?>
<td>[ <?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['amount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ��] <?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
<th>�������</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['total_count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ��</td>
</tr>
<tr>
<th>������</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['total_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ��</td>
</tr>
<tr>
<th>ȯ������</th>
<?php if ($this->_tpl_vars['is_shipping']): ?>
<td><input type="text" name="trans_price" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['trans_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"> ��</td>
<?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['trans_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ��</td>
<?php endif; ?>
</tr>
<tr>
<th>��׶��</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['allprice'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ��</td>
</tr>
<tr>
<th>���������̾</th>
<td><?php if ($this->_tpl_vars['data']['bill_name']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['bill_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
</tr>
<?php if ($this->_tpl_vars['data']['inst_shiryou_other']): ?>
<tr>
<th>��������¾</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_shiryou_other'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<?php endif; ?>
</table>


<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?>
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>������</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['regist_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
</tr>
<tr>
<th>ȯ����</th>
<td><?php if ($this->_tpl_vars['data']['out_year']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['out_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['out_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['out_day'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
</tr>
<tr>
<th>����ͽ����</th>
<td><?php if ($this->_tpl_vars['data']['arr_year']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['arr_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['arr_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['arr_day'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
</tr>
<tr>
<th>ȯ������</th>
<td width="75%"><?php if ($this->_tpl_vars['data']['trans_status']):  echo $this->_tpl_vars['trans_status'][$this->_tpl_vars['data']['trans_status']];  else:  echo $this->_tpl_vars['trans_status'][0];  endif; ?></td>
</tr>

</table>

<br>
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>��Ѿ���</th>
<td width="75%"><select name="settle_status">
<?php $_from = $this->_tpl_vars['settle_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo $this->_tpl_vars['dkey']; ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['settle_status']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<?php endforeach; endif; unset($_from); ?>
</select></td>
</tr>
</table>
<br>

<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>����</th>
<td width="75%"><textarea name="bikou" cols="60" rows="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
</table>
<br>

<table cellspacing="1" class="azlist" width="90%">
<tr>
<td colspan="2" align="center"><input type="submit" value="����¸��"><input type="hidden" name="mode" value="submit"></td>
</tr>
</table>
<?php endif; ?>

<?php if ($this->_tpl_vars['is_shipping']): ?>
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>������</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['regist_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
</tr>
<tr>
<th>�����˾��</th>
<td width="75%"><?php if ($this->_tpl_vars['data']['req_year']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['req_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_day'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
</tr>
<!--
<tr>
<th>�����˾��Ŧ��</th>
<td width="75%"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['req_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
-->
<?php if ($this->_tpl_vars['data']['req_text']): ?>
<tr>
<th>�����˾��Ŧ��</th>
<td width="75%"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['req_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
<?php endif;  if ($this->_tpl_vars['data']['inst_stekiyou']): ?>
<tr>
<th>�����˾��Ŧ��</th>
<td width="75%"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['inst_stekiyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
<?php endif; ?>

<tr>
<th>ȯ����</th>
<td>
<select name="out_year"><option value="">��<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['out_year']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>ǯ 
<select name="out_month"><option value="">��<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['out_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>�� 
<select name="out_day"><option value="">��<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['out_day']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>�� 
</td>
</tr>
<tr>
<th>����ͽ����</th>
<td>
<select name="arr_year"><option value="">��<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['arr_year']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>ǯ 
<select name="arr_month"><option value="">��<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['arr_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>�� 
<select name="arr_day"><option value="">��<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['arr_day']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>�� 
</td>
</tr>

<tr>
<th>ȯ������</th>
<td width="75%"><?php echo $this->_tpl_vars['trans_status'][$this->_tpl_vars['data']['trans_status']]; ?>
</td>
</tr>

</table>
<br>

<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>����</th>
<td width="75%"><textarea name="bikou" cols="60" rows="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
</table>
<br>

<table cellspacing="1" class="azlist" width="90%">
<tr>
<td colspan="2" align="center"><input type="submit" value="����¸��"><input type="hidden" name="mode" value="submit"></td>
</tr>
</table>

<?php endif; ?>
</form>

<a href="/manage/forms/index.php/module/FormManage/action/PubOrderIndex">���</a>
</div>
</body>
</html>