<?php /* Smarty version 2.6.9, created on 2022-03-15 14:41:42
         compiled from form2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form2.html', 68, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>����»���ݸ����� - SONPO | ���׎�����ʪ������ �� ����ʪ �� ���Ϥ�����������</title>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta name="keywords" content="»���ݸ����ɺҡ����ȡ��罸�ͻ�������ҳ����Ͽ̡��������ݸ����ɲС����̻��Ρ�»���ݸ�����Ź��»���ݸ���Ͽ����͡�»��">
<meta name="description" content="»���ݸ���Ҥλ��ȼ����Ρ����̼���ˡ�� ����»���ݸ�����Υ����ȡ�»���ݸ��ȳ��Υ˥塼����Ϥ��ᡢ»���ݸ��δ���Ū���μ������ס��ɺҡ����ȡ����̰����˴ؤ���������ܡ�">
<link rel="stylesheet" type="text/css" href="/archive/css/import.css">
<link rel="stylesheet" type="text/css" href="/common/css/fmedium.css" title="medium">
<link rel="stylesheet" type="text/css" href="/common/css/flarge.css" title="large">
<link rel="stylesheet" type="text/css" href="/common/css/fexlarge.css" title="exlarge">
<script type="text/javascript" src="/common/js/check.js"></script>
<script type="text/javascript" src="/common/js/fontsize.js"></script>
<script type="text/javascript" src="/common/js/share.js"></script>
<script type="text/javascript" src="/archive/publish/js/check.js"></script>
</head>
<body id="archive-form">
<a name="top"></a>
<div id="wrapper">
	<div id="inbox">

<script type="text/javascript">
<?php echo '
  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-16600020-1\']);
  _gaq.push([\'_setDomainName\', \'.sonpo.or.jp\']);
  _gaq.push([\'_trackPageview\', \'/archive/publish/form_input2.html\']);

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

<form action="form.php" method="POST" name="frm1" autocomplete="off" onSubmit="return pre_check();">
		<!-- �ᥤ�󥨥ꥢ -->
		<div id="main">
			<!-- ����ƥ�ĥ��ꥢ -->
			<div id="content">
				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">����ʪ����������</span></h2>

				<div class="contentBlock">
					<img src="./img/step_02.gif" width="670" height="33" border="0" alt="���Ϥ�����������">
				</div>

					<div class="subt1">
						<div class="frm">
							<p class="text2">���Ϥ�����������</p>
						</div>
					</div>

<?php if ($this->_tpl_vars['errors']): ?>
					<div class="contentBlock" style="border:#aaaaaa solid 1px;background:#ffcccc;">
						<div class="clearfix text2">
							<p><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>��<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span></p>
						</div>
					</div>
<br clear="all">
<?php endif; ?>

					<div class="contentBlock1">
						<div class="clearfix text2">��<span class="colorE97">*</span>����ɬ�ܹ��ܤǤ���</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">��������;���</p>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02"><strong>�Ŀ͡�ˡ�͡��������Τ����줫���������򤷤Ƥ���������<span class="colorE97">*</span></strong></td>
								</tr>
								<tr>
									<td>
										<div class="contentBlock">
											<p class="attention">�Ŀͤ����򤵤줿����͹����������ˡ�������������򤵤줿����<br>��Կ�����ߡ������ϴ���ʪ�Ȥ�<span class="fc-red"><strong>����</strong></span>�����աˤǤ���ʧ�������������ȤȤʤ�ޤ���<br></p>
										</div>
										<table border="0" cellspacing="0" cellpadding="0" class="text3">
											<tr>
												<td style="border:none; padding:2px;"><input type="radio" name="user_status" id="personal" value="1" onClick="document.frm3.submit();"<?php if ($this->_tpl_vars['data']['user_status'] == 1): ?> checked<?php endif; ?>></td><td style="border:none; padding:2px 20px 2px 2px;"><label for="personal">�Ŀ�</label></td><td style="border:none; padding:2px;"><input type="radio" name="user_status" id="group" value="2" onClick="document.frm4.submit();"<?php if ($this->_tpl_vars['data']['user_status'] == 2): ?> checked<?php endif; ?>></td><td style="border:none; padding:2px;"><label for="group">ˡ�͡�������</label></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</div>
<?php if ($this->_tpl_vars['data']['user_status'] == 1 || $this->_tpl_vars['data']['user_status'] == 2): ?>
					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02"><strong>����<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">͹���ֹ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px 2px 5px 2px;"><input type="text" name="zipcode1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['zipcode1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													��
													<input type="text" name="zipcode2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['zipcode2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													&nbsp;&nbsp;<font class="colorE97">Ⱦ�ѿ���</font> <br>���㡧101-8355�� </td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">��ƻ�ܸ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px 2px 10px 2px;"><select name="prefecture">
														<option value="" selected>���򤷤Ƥ���������</option>
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
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">�Զ�Į¼�ʲ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="address" size="45" value="<?php if (@ $this->_tpl_vars['data']['address']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													<br>���㡧�����Ķ� ���� øϩĮ 2-9��</td>
											</tr>
										</table></td>
								</tr>

  <?php if ($this->_tpl_vars['data']['user_status'] == 1): ?>
								<tr>
									<td class="gray02"><strong>��̾��<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0; width: 85px;">����<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">��</td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="name1" size="8" value="<?php if (@ $this->_tpl_vars['data']['name1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧»�ݡ�</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">̾</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="name2" size="8" value="<?php if (@ $this->_tpl_vars['data']['name2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧��Ϻ��</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">�եꥬ��</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">����</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana1" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧����ݡ�</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">�ᥤ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana2" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">���ѥ���</font><br>���㡧������</td>
											</tr>
										</table></td>
								</tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['data']['user_status'] == 2): ?>
								<tr>
									<td class="gray02"><strong>ˡ�͡�����̾<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">ˡ�͡�����̾<span class="colorE97">*</span></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="company" size="40" value="<?php if (@ $this->_tpl_vars['data']['company']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧����»���ݸ������</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">����</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="section" size="40" value="<?php if (@ $this->_tpl_vars['data']['section']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['section'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧��̳�������</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>��ô����<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0; width: 85px;">����<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">��</td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="name1" size="8" value="<?php if (@ $this->_tpl_vars['data']['name1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧»�ݡ�</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">̾</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="name2" size="8" value="<?php if (@ $this->_tpl_vars['data']['name2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧��Ϻ��</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">�եꥬ��</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">����</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana1" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧����ݡ�</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">�ᥤ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana2" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">���ѥ���</font><br>���㡧������</td>
											</tr>
										</table></td>
								</tr>
  <?php endif; ?>

								<tr>
									<td class="gray02"><strong>�᡼�륢�ɥ쥹<span class="colorE97">*</span></strong></td>
									<td><div style="padding-bottom: 5px;"><input type="text" name="email" size="50" value="<?php if (@ $this->_tpl_vars['data']['email']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">Ⱦ�ѱѿ���</font><br>���㡧abc@sonpo.or.jp��</div>
										<div>��ǧ�Τ���������Ϥ��Ƥ���������<br><input type="text" name="email2" size="50" value="<?php if (@ $this->_tpl_vars['data']['email2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">Ⱦ�ѱѿ���</font></div></td>
								</tr>

								<tr>
									<td class="gray02"><strong>�����ֹ�<span class="colorE97">*</span></strong></td>
									<td><input type="text" name="tel1" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										��
										<input type="text" name="tel2" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										��
										<input type="text" name="tel3" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										&nbsp;&nbsp;<font class="colorE97">Ⱦ�ѿ���</font><br>���㡧03 - 3255 - 1215��</td>
								</tr>

  <?php if ($this->_tpl_vars['data']['user_status'] == 2): ?>
								<tr>
									<td class="gray02"><strong>����</strong></td>
									<td><textarea name="bikou" cols="50" rows="5"><?php if (@ $this->_tpl_vars['data']['bikou']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea><br>Ϣ�����������ޤ����顢������ˤ����Ϥ���������</td>
								</tr>
  <?php endif; ?>

							</table>
						</div>

					</div>
					<div class="contentBlock1">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td>						<div class="clearfix text2 btn">
							<input type="button" class="btnback" value="&nbsp;&nbsp;���&nbsp;&nbsp;" onClick="document.frm2.submit();"></div></td>
<td>							&nbsp;&nbsp;</td>
<td>						<div class="clearfix text2 btn"><input type="hidden" name="mode" value="preview"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
							<input type="submit" value="&nbsp;&nbsp;�����������Ƥ��ǧ����&nbsp;&nbsp;">
						</div></td>
</tr>
</table>
					</div>
</form>
<?php else: ?>
</form>

<div class="contentBlock1">
<div class="clearfix">
<div class="clearfix text2 btn">
<input type="button" class="btnback" value="&nbsp;&nbsp;���&nbsp;&nbsp;" onClick="document.frm2.submit();">
</div>
</div>
</div>
<?php endif; ?>

<form method="POST" action="form.php" name="frm2">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
</form>

<form method="POST" action="form.php" name="frm3">
<input type="hidden" name="mode" value="form2">
<input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
<input type="hidden" name="user_status" value="1">
</form>

<form method="POST" action="form.php" name="frm4">
<input type="hidden" name="mode" value="form2">
<input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
<input type="hidden" name="user_status" value="2">
</form>

				<!-- //������-->
				<!-- colorCF�饤��-->
				<div class="lineCF"></div>
				<!-- //colorCF�饤��-->

				<!-- �ڡ�������Ƭ����� -->
				<div class="topLink"><p class="text2"><a href="#top" class="totop">�ڡ�������Ƭ�����</a></p></div>
				<!-- �ڡ�������Ƭ����� -->
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