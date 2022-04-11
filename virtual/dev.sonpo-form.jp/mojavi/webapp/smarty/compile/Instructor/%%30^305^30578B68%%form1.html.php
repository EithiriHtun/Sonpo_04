<?php /* Smarty version 2.6.9, created on 2022-01-11 17:02:59
         compiled from form1.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form1.html', 389, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>����»���ݸ����� - SONPO | ����Ω������ �� �ֻ��ɸ��Τ����� �� »���ݸ��ֱ�񤪿�����</title>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<link rel="stylesheet" type="text/css" href="/useful/css/import.css">
<link rel="stylesheet" type="text/css" href="/common/css/fmedium.css" title="medium">
<link rel="stylesheet" type="text/css" href="/common/css/flarge.css" title="large">
<link rel="stylesheet" type="text/css" href="/common/css/fexlarge.css" title="exlarge">
<script type="text/javascript" src="/common/js/check.js"></script>

<script type="text/javascript" src="/common/js/fontsize.js"></script>

<script type="text/javascript" src="/common/js/share.js"></script>
<script language="javascript">
<!---
<?php echo '
function email_chk(object_value){
	// �᡼�륢�ɥ쥹�����ϥ����å��롼����
	var $email = object_value;
	if ($email.length == 0){
		return true;
	}
	var chk_at = $email.indexOf("@");
	var last_at = $email.lastIndexOf("@");
	var chk_pi = $email.indexOf(".");
	var last_pi = $email.lastIndexOf(".");
	var leng_ma = $email.length - 1;

	//@�θĿ������֤Υ����å�
	//¸�ߤ��ʤ�����Ƭ�ޤ��ϺǸ����ˤ�����ϥ��顼
	if((chk_at == -1) || (chk_at == 0) || (last_at == leng_ma)){
		return false;
	}
	//.�θĿ������֤Υ����å�
	//¸�ߤ��ʤ�����Ƭ�ޤ��ϺǸ����ˤ�����ϥ��顼
	if((chk_pi == -1) || (chk_pi == 0) || (last_pi == leng_ma)){
		return false;
	}

	//���Ѳ�ǽ��ʸ���Τ߻��Ѥ��Ƥ��뤫�Υ����å�
	//����ե��٥å�(��ʸ������ʸ��)��@��.��_��-�������ʤ�
	var $string_list = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz._-+=<>@";
	var $chk_cha = "";
	for(i=0;i<=leng_ma;i++){
		$chk_cha = $email.charAt(i);
		if ($string_list.indexOf($chk_cha) == -1) {
			return false;
		}
	}
	return true;
}

function half_kana_chk(object_value){
	//Ⱦ�ѥ������ʤΥ����å�
	//�ޤ���ϥ��顼
	var $datas = object_value;
	if($datas.length == 0){
		return true;
	}

	var $chk_len = $datas.length - 1;
	for(i=0;i<=$chk_len;i++){
		if(($datas.charCodeAt(i) >= 65377) && ($datas.charCodeAt(i) <= 65439)){
			return false;
		}
	}
	return true;
}


function full_kana_chk(object_value){
	// ���ѥ���ʸ���ʳ���Ϥ���
	var $datas = object_value;
	if($datas.length == 0){
		return true;
	}

	var $chk_len = $datas.length - 1;
	var $chk_flg = 0;
	for(i=0;i<=$chk_len;i++){
		if(($datas.charCodeAt(i) >= 12542) || ($datas.charCodeAt(i) <= 12449)){
			return false;
		}
	}
	return true;
}

function decimal_chk(object_value){
	//�����Υ����å�
	var $datas = object_value;
	var $decimal_data = "0123456789";
	if ($datas.length == 0){
        	return true;
	}
	var $chk_len = $datas.length - 1;

	for(i=0;i<=$chk_len;i++){
		if($decimal_data.indexOf($datas.charAt(i)) == -1){
			return false;
		}
	}
	return true;
}
function hira_kana_chk(object_value){
	// ���Ѥ���ʸ���ʳ���Ϥ���
	var $datas = object_value;
	if($datas.length == 0){
		return true;
	}

	var $chk_len = $datas.length - 1;
	var $chk_flg = 0;
	for(i=0;i<=$chk_len;i++){
		if(($datas.charCodeAt(i) >= 12446) || ($datas.charCodeAt(i) <= 12353)){
			return false;
		}
	}
	return true;
}

function dateValueChek(year_value, month_value, day_value){
	// ���դ�¸�ߤΥ����å�
	$check_day = 31;
	if((month_value == 4) || (month_value == 6) || (month_value == 9) || (month_value == 11)){
		$check_day = 30;
	}
	if(month_value == 2){
		$check_day = 28;
		if((year_value % 400) == 0){
			$check_day = 29;
		} else {
			if((year_value % 100) == 0){
				$check_day = 28;
			} else {
				if((year_value % 4) == 0){
					$check_day = 29;
				}
			}
		}
	}

	if($check_day < day_value){
		return false;
	}

	return true;

}

// »���ݸ��ֱ�����ϥե����ࣱ�ѡ����顼�����å�
function pre_chk_1(){

	var $TF = document.form01;

	// ��ż�̾�Υ����å�
	if($TF.host.value.length == 0){
		alert("��ż�̾��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.host.focus();
		return false;
	}
	if(!half_kana_chk($TF.host.value)){
		alert("��ż�̾��Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.host.focus();
		return false;
	}

	// ����Υ����å�
	// ͹���ֹ�Υ����å�
	if($TF.post1.value.length == 0){
		alert("͹���ֹ椬̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.post1.focus();
		return false;
	}
	if(!decimal_chk($TF.post1.value)){
		alert("͹���ֹ��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.post1.focus();
		return false;
	}

	if($TF.post2.value.length == 0){
		alert("͹���ֹ椬̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.post2.focus();
		return false;
	}
	if(!decimal_chk($TF.post2.value)){
		alert("͹���ֹ��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.post2.focus();
		return false;
	}
	if(($TF.post1.value.length != 3) || ($TF.post2.value.length != 4)){
		alert("͹���ֹ椬���������Ϥ���Ƥ��ޤ���\\n����-��������Ϥ��Ƥ���������");
		$TF.post1.focus();
		return false;
	}

	// ��ƻ�ܸ�̾����������å�
	if($TF.prefecture.selectedIndex == 0){
		alert("��ƻ�ܸ�̾�����򤵤�Ƥ��ޤ���\\n�ꥹ�Ȥ������򤷤Ƥ���������");
		$TF.prefecture.focus();
		return false;
	}

	// �Զ�Į¼�ʲ��Υ����å�
	if($TF.address.value.length == 0){
		alert("�Զ�Į¼�ʲ���̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.address.focus();
		return false;
	}
	if(!half_kana_chk($TF.address.value)){
		alert("�Զ�Į¼�ʲ���Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.address.focus();
		return false;
	}


	// �����ֹ�Υ����å�
	if($TF.tel1.value.length == 0){
		alert("�����ֹ�(�Գ�����)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.tel1.focus();
		return false;
	}
	if(!decimal_chk($TF.tel1.value)){
		alert("�����ֹ�(�Գ�����)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.tel1.focus();
		return false;
	}
	if($TF.tel2.value.length == 0){
		alert("�����ֹ�(�������)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.tel2.focus();
		return false;
	}
	if(!decimal_chk($TF.tel2.value)){
		alert("�����ֹ�(�������)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.tel2.focus();
		return false;
	}
	if($TF.tel3.value.length == 0){
		alert("�����ֹ�(�Ŀ��ֹ�)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.tel3.focus();
		return false;
	}
	if(!decimal_chk($TF.tel3.value)){
		alert("�����ֹ�(�Ŀ��ֹ�)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.tel3.focus();
		return false;
	}

	// FAX�ֹ�Υ����å�
	if(!decimal_chk($TF.fax1.value)){
		alert("FAX�ֹ�(�Գ�����)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.fax1.focus();
		return false;
	}
	if(!decimal_chk($TF.fax2.value)){
		alert("FAX�ֹ�(�������)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.fax2.focus();
		return false;
	}
	if(!decimal_chk($TF.fax3.value)){
		alert("FAX�ֹ�(�Ŀ��ֹ�)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.fax3.focus();
		return false;
	}

	// ��ô����̾�Υ����å�
	if($TF.person_last.value.length == 0){
		alert("��ô����̾(��)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.person_last.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_last.value)){
		alert("��ô����̾(��)��Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.person_last.focus();
		return false;
	}
	if($TF.person_first.value.length == 0){
		alert("��ô����̾(̾)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.person_first.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_first.value)){
		alert("��ô����̾(̾)��Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.person_first.focus();
		return false;
	}

	// ��ô����̾�եꥬ�ʤΥ����å�
	if($TF.person_kana_last.value.length == 0){
		alert("��ô����̾�եꥬ��(��)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.person_kana_last.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_kana_last.value)){
		alert("��ô����̾�եꥬ��(��)��Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.person_kana_last.focus();
		return false;
	}
	if($TF.person_kana_first.value.length == 0){
		alert("��ô����̾�եꥬ��(̾)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.person_kana_first.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_kana_first.value)){
		alert("��ô����̾�եꥬ��(̾)��Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.person_kana_first.focus();
		return false;
	}

	// �᡼�륢�ɥ쥹�Υ����å�
	if($TF.email1.value.length == 0){
		alert("�᡼�륢�ɥ쥹��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.email1.focus();
		return false;
	}
	if(!email_chk($TF.email1.value)){
		alert("�᡼�륢�ɥ쥹�����������Ϥ���Ƥ��ޤ���\\n���������Ϥ��Ƥ���������");
		$TF.email1.focus();
		return false;
	}
	if($TF.email2.value.length == 0){
		alert("��ǧ�ѥ᡼�륢�ɥ쥹��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.email2.focus();
		return false;
	}
	if(!email_chk($TF.email2.value)){
		alert("��ǧ�ѥ᡼�륢�ɥ쥹�����������Ϥ���Ƥ��ޤ���\\n���������Ϥ��Ƥ���������");
		$TF.email2.focus();
		return false;
	}
	if($TF.email1.value != $TF.email2.value){
		alert("���Ϥ��줿�᡼�륢�ɥ쥹�����פ��Ƥ��ޤ���\\n���������Ϥ��Ƥ���������");
		$TF.email1.focus();
		return false;
	}


	return true;

}
'; ?>

//-->
</script>
</head>
<body id="useful-form">
<a name="top"></a>
<div id="wrapper">
	<div id="inbox">

<script type="text/javascript">
<?php echo '
  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-16600020-1\']);
  _gaq.push([\'_setDomainName\', \'.sonpo.or.jp\']);
  _gaq.push([\'_trackPageview\', \'/useful/koushi/moushikomi/form_input1.html\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();
'; ?>

</script>

		<!-- �إå� -->
		<div id="head">
			<h1 id="title"><a href="http://www.sonpo.or.jp/"><img src="/common/ssi/img/logo.gif" width="288" height="34" border="0" alt="����»���ݸ����� SONPO"></a></h1>
		</div>

		<!-- //�إå� -->
		<!-- �ᥤ�󥨥ꥢ -->
		<div id="main">
			<!-- ����ƥ�ĥ��ꥢ -->
			<div id="content">
				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">»���ݸ��ֱ��ư�趵����ѤΤ���������</span></h2>
				<div class="lineCF"></div>

				<!-- //content title -->

				<div class="contentBlock1">
					<p class="text2">����ι��ܤ�������ϡ��������ߤǤ��ޤ���ΤǤ���դ���������
<br>����Ԥξ����¾����Ū�����Ѥ����ꡢ�������󶡤��뤳�ȤϤ���ޤ���<br>���ֱ�ơ��ޡָ��̻��ΤȤ�����Ǥ�ס���ž�֤��괬���ꥹ���Ȥ�����Ǥ�פ�ư�趵��ʾܤ�����<a href="https://www.sonpo.or.jp/about/efforts/action/koushi/douga.html" target="_blank">������</a>�ˤ��ܥڡ������餪�������ߤ�����դ��Ƥ���ޤ���</p>
					<br>
					<p class="text2">��<span class="fc-red">*</span>����ɬ�ܹ��ܤǤ���
<?php if (@ $this->_tpl_vars['errors']): ?><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>��<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span><?php endif; ?></p>

				</div>

<form action="form.php" method="post" name="form01" autocomplete="off" onSubmit="return pre_chk_1();">
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">
						<tr>
							<td valign="top" class="gray02"><strong>��ż�̾<span class="fc-red">*</span></strong></td>
							<td><input type="text" name="host" size="50" value="<?php if (@ $this->_tpl_vars['data']['host']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

								<br>���㡧���̼���ˡ�� ����»���ݸ������</td>
						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>�����<span class="fc-red">*</span></strong></td>
							<td valign="top">
								<table border="0" cellspacing="0" cellpadding="2">
									<tr>

										<td valign="top" style="border:none; padding:2px;" class="text2">͹���ֹ�<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;" class="text2"><input type="text" name="post1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['post1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											��
											<input type="text" name="post2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['post2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѿ���</span> <br>���㡧101-8355�� </td>
									</tr>

									<tr>

										<td style="border:none; padding:2px;" class="text2">��ƻ�ܸ�<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;" class="text2"><select name="prefecture">
												<option value="">���򤷤Ƥ���������</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?>												<option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == @ $this->_tpl_vars['data']['prefecture']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select>
										</td>
									</tr>
									<tr>

										<td nowrap valign="top" style="border:none; padding:2px;" class="text2">�Զ�Į¼�ʲ�<span class="fc-red">*</span></td>

										<td style="border:none; padding:2px;" class="text2"><input type="text" name="address" size="45" value="<?php if (@ $this->_tpl_vars['data']['address']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											<br>���㡧�����Ķ����øϩĮ2-9��</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td valign="top" class="gray02"><strong>�����ֹ�<span class="fc-red">*</span></strong></td>

							<td><input type="text" name="tel1" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								��
								<input type="text" name="tel2" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								��
								<input type="text" name="tel3" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѿ���</span><br>���㡧03 - 3255 - 1215�� 

								<table border="0" cellspacing="0" cellpadding="2">
									<tr>
										<td valign="top" style="border:none; padding:2px;" class="text2">�����ֹ�</td>
										<td style="border:none; padding:2px;" class="text2"><input type="text" name="naisen" size="15" maxlength="15" value="<?php if (@ $this->_tpl_vars['data']['naisen']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѿ���</span> <br>���㡧3388�� </td>
									</tr>
								</table>

							</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>FAX�ֹ�</strong></td>

							<td><input type="text" name="fax1" size="6" value="<?php if (@ $this->_tpl_vars['data']['fax1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								��
								<input type="text" name="fax2" size="6" value="<?php if (@ $this->_tpl_vars['data']['fax2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								��
								<input type="text" name="fax3" size="6" value="<?php if (@ $this->_tpl_vars['data']['fax3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѿ���</span><br>���㡧03 - 3255 - 1215�� </td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>��ô����̾<span class="fc-red">*</span></strong></td>

							<td>����<input type="text" name="person_last" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_last']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">��
								&nbsp;&nbsp;̾��<input type="text" name="person_first" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_first']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								<br>&nbsp;&nbsp;&nbsp;&nbsp;���㡧»�ݡ�&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���㡧��Ϻ��</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>��ô����̾�եꥬ��<span class="fc-red">*</span></strong></td>

							<td>����<input type="text" name="person_kana_last" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_kana_last']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">��
								&nbsp;&nbsp;̾��<input type="text" name="person_kana_first" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_kana_first']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">���ѥ���</span><br>&nbsp;&nbsp;&nbsp;&nbsp;���㡧����ݡ�&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���㡧������</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>��ô������</strong></td>

							<td><input type="text" name="yaku" size="40" value="<?php if (@ $this->_tpl_vars['data']['yaku']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"></td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>�᡼�륢�ɥ쥹<span class="fc-red">*</span></strong></td>

							<td valign="top"><input type="text" name="email1" size="40" value="<?php if (@ $this->_tpl_vars['data']['email1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѱѿ���</span><br> ��ǧ�Τ��ᡢ�������Ϥ��Ƥ���������<br>
								<input type="text" name="email2" size="40" value="<?php if (@ $this->_tpl_vars['data']['email2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

								&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѱѿ���</span><br>���㡧abc@sonpo.or.jp�� </td>
						</tr>
					</table>

				</div>
				<div class="contentBlock1">
					<div class="clearfix text2">
<?php if ($this->_tpl_vars['operation'] == 'initial'): ?>						<input name="reset" type="reset" value="&nbsp;&nbsp;���ϥ��ꥢ&nbsp;&nbsp;">
						&nbsp;&nbsp;<?php endif; ?>
						<input name="submit" type="submit" value="&nbsp;&nbsp;�����̤�&nbsp;&nbsp;"><input type="hidden" name="mode" value="form2"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

					</div>
				</div>
				</form>

					<!-- //�ֻ��ɸ��Τ����� -->


				<div class="lineCF"></div>

				<!-- �ڡ�������Ƭ����� -->
				<div class="topLink"><p class="text2"><a href="#top" class="totop">�ڡ�������Ƭ�����</a></p></div>
				<!-- �ڡ�������Ƭ����� -->
<table width="135" border="0" cellpadding="2" cellspacing="0" title="���Υޡ����ϡ�SSL/TLS���̿����ݸ�Ƥ���ڤǤ���">
<tr>
<td width="135" align="center" valign="top">
<!-- GeoTrust QuickSSL [tm] Smart  Icon tag. Do not edit. --> <SCRIPT LANGUAGE="JavaScript"  TYPE="text/javascript" SRC="//smarticon.geotrust.com/si.js"></SCRIPT>
<!-- end  GeoTrust Smart Icon tag -->
<a href="https://www.geotrust.co.jp/ssl-certificate/" target="_blank"  style="color:#000000; text-decoration:none; font:bold 12px '�ͣ� �����å�',sans-serif; letter-spacing:.5px; text-align:center; margin:0px; padding:0px;">SSL�Ȥϡ�</a></td>
</tr>
</table>
			</div>
			<!-- //����ƥ�ĥ��ꥢ -->

		</div>
		<!-- //�ᥤ�󥨥ꥢ -->
		<!-- �եå� -->
		<div id="foot">
			<div id="copy"><a href="/index.html"><img src="/common/ssi/img/copyright.gif" width="400" height="10" border="0" alt="Copyright (c)  The General Insurance Association of Japan. All rights reserved."></a></div>
		</div>
		<!-- //�եå� -->
	</div>

</div>

</body>
</html>