<?php /* Smarty version 2.6.9, created on 2021-06-22 10:37:44
         compiled from pubmasterform.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubmasterform.html', 9, false),array('modifier', 'string_format', 'pubmasterform.html', 22, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<script type="text/javascript" src="/manage/cm.js"></script>
</head>

<body bgcolor="#FFFFFF"<?php if (@ $this->_tpl_vars['popmsg']): ?> onLoad="alert('<?php echo ((is_array($_tmp=$this->_tpl_vars['popmsg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"<?php endif; ?>>
<h2>����»���ݸ����񡦴���ʪ ��������</h2>
<h3>����ʪ�ޥ������ʾܺ١�</h3>
<div class="maincontents">
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterIndex">���</a>
<hr>

<?php if (@ $this->_tpl_vars['errors']):  $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span><br><?php endforeach; endif; unset($_from);  endif; ?>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterRegist" method="POST" name="frm1">

<table cellspacing="1" class="azlist">
<!--<tr>
<th>ID</th>
<td width="75%"><?php if (@ $this->_tpl_vars['data']['id']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%05d") : smarty_modifier_string_format($_tmp, "%05d"));  else: ?>&nbsp;<?php endif; ?><input type="hidden" name="id" value=""></td>
</tr>-->
<tr>
<th>�����ֹ�</th>
<td width="75%"><input type="text" name="pub_id_1" value="<?php if (@ $this->_tpl_vars['data']['pub_id_1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['pub_id_1'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%05d") : smarty_modifier_string_format($_tmp, "%05d"));  endif; ?>" size="5"> - <input type="text" name="pub_id_2" value="<?php if (@ $this->_tpl_vars['data']['pub_id_2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['pub_id_2'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d"));  endif; ?>" size="3"><input type="hidden" name="id" value="<?php if (@ $this->_tpl_vars['data']['id']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"></td>
</tr>
<tr>
<th>����̾</th>
<td width="75%"><input type="text" name="name" value="<?php if (@ $this->_tpl_vars['data']['name']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" size="60"></td>
</tr>
<tr>
<th>���ҽ������</th>
<td width="75%"><?php $_from = $this->_tpl_vars['sassi_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><input type="checkbox" name="user[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if (@ $this->_tpl_vars['data']['users']):  $_from = $this->_tpl_vars['data']['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if (@ $this->_tpl_vars['datum2'] == $this->_tpl_vars['datum']['id']): ?> checked<?php endif;  endforeach; endif; unset($_from);  endif; ?> id="user_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><label for="user_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</label><br><?php endforeach; endif; unset($_from); ?></td>
</tr>
<tr>
<th>���ƥ��꡼</th>
<td width="75%">
<select name="category">
<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyval'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['keyval'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['keyval'] == @ $this->_tpl_vars['data']['category']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<?php endforeach; endif; unset($_from); ?>
</select>
</td>
</tr>
<tr>
<th>�߸˿�</th>
<td width="75%"><?php if (@ $this->_tpl_vars['data']['total_amount']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['total_amount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?> ����Ǽ�ʷס�<?php if (@ $this->_tpl_vars['data']['total_amount_p']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['total_amount_p'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php endif; ?>ȯ���ס�<?php if (@ $this->_tpl_vars['data']['total_amount_m']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['total_amount_m'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>��</td>
</tr>
<tr>
<th>������ǽ����</th>
<td width="75%"><input type="text" name="entry_limit" value="<?php if (@ $this->_tpl_vars['data']['entry_limit']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['entry_limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">��</td>
</tr>
<tr>
<th>Ǽ������</th>
<td width="75%"><input type="text" name="pcount" value="<?php if (@ $this->_tpl_vars['data']['pcount']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['pcount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">�����ɲä��ޤ���</td>
</tr>
<tr>
<th>����</th>
<td width="75%"><input type="text" name="weight" value="<?php if (@ $this->_tpl_vars['data']['weight']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['weight'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">��</td>
</tr>
<tr>
<th>ñ��</th>
<td width="75%"><input type="text" name="price" value="<?php if (@ $this->_tpl_vars['data']['price']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">��</td>
</tr>
<tr>
<th>�߸�Ĵ��</th>
<td width="75%"><input type="text" name="adjcount" value="<?php if (@ $this->_tpl_vars['data']['adjcount']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['adjcount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">���������͡��߸˿�����︺������͡��߸˿����ɲá�</td>
</tr>
<tr>
<th>�߸˷ٹ�����</th>
<td width="75%"><input type="text" name="border" value="<?php if (@ $this->_tpl_vars['data']['border']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['border'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">��</td>
</tr>
<tr>
<th>�����</th>
<td width="75%"><input type="text" name="url" value="<?php if (@ $this->_tpl_vars['data']['url']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" size="60"></td>
</tr>

<tr>
<th>ɽ���ϰ�</th>
<!--<td width="75%"><?php $_from = $this->_tpl_vars['showrange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?>
<input type="radio" name="showrange" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if (@ $this->_tpl_vars['data']['showrange'] == $this->_tpl_vars['dkey']): ?> checked<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;
<?php endforeach; endif; unset($_from); ?>
</td>-->
<td width="75%">
<input type="checkbox" name="show_online" value="1"<?php if (@ $this->_tpl_vars['data']['show_online'] == 1): ?> checked<?php endif; ?> id="show_online"><label for="show_online">����饤��</label>&nbsp;
<input type="checkbox" name="show_other" value="1"<?php if (@ $this->_tpl_vars['data']['show_other'] == 1): ?> checked<?php endif; ?> id="show_other"><label for="show_other">����</label>&nbsp;
<input type="checkbox" name="show_inst" value="1"<?php if (@ $this->_tpl_vars['data']['show_inst'] == 1): ?> checked<?php endif; ?> id="show_inst"><label for="show_inst">�ֻ��ɸ�</label>&nbsp;
</td>
</tr>

<tr>
<th>�߸˥����Ǥΰ���<br>ɽ��</th>
<td width="75%">
<input type="radio" name="show_if_zero" value="1"<?php if (@ $this->_tpl_vars['data']['show_if_zero'] == 1): ?> checked<?php endif; ?> id="show_if_zero"><label for="show_if_zero">����</label>&nbsp;
<input type="radio" name="show_if_zero" value="0"<?php if (@ $this->_tpl_vars['data']['show_if_zero'] == 0): ?> checked<?php endif; ?> id="not_show_if_zero"><label for="not_show_if_zero">���ʤ�</label>
</td>
</tr>

<tr>
<td colspan="2"><input type="submit" value="OK">��<input type="button" value="����󥻥�" onClick="location.href='<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/PubMasterIndex'"></td>
</tr>

</table>
</form>

</div>
</body>
</html>