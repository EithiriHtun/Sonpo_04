<?php /* Smarty version 2.6.9, created on 2021-04-14 11:43:21
         compiled from confirm.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'confirm.html', 76, false),array('modifier', 'nl2br', 'confirm.html', 150, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>����»���ݸ����� - SONPO | ���׎�����ʪ������ �� ����ʪ �� �������������Ƥγ�ǧ</title>
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
  _gaq.push([\'_trackPageview\', \'/archive/publish/form_confirm.html\']);

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
				<h2 class="lineCFhead"><span class="text2">����ʪ����������</span></h2>

				<div class="contentBlock">
					<img src="/archive/publish/img/step_03.gif" width="670" height="33" border="0" alt="�������������ƤΤ���ǧ">
				</div>

				<form method="post" action="form.php" name="reportform">
					<div class="subt1">
						<div class="frm">
							<p class="text2">�������������Ƥγ�ǧ</p>
						</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">���Ϥ���</p>
						</div>
					</div>
					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02"><strong>����<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">͹���ֹ�<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">��ƻ�ܸ�<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">�Զ�Į¼�ʲ�<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php if ($this->_tpl_vars['data']['user_status'] == 1): ?>
								<tr>
									<td class="gray02"><strong>��̾��<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td class="text2" style="border:none; padding:2px;">����<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">�եꥬ��</td>
												<td class="text2" style="border:none; padding:2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php endif;  if ($this->_tpl_vars['data']['user_status'] == 2): ?>
								<tr>
									<td class="gray02"><strong>ˡ�͡�����̾<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">ˡ�͡�����̾<span class="colorE97">*</span></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">����</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['section'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>��ô����<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">����<span class="colorE97">*</span></td>
												<td valign="top" class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">�եꥬ��</td>
												<td class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php endif; ?>
								<tr>
									<td class="gray02"><strong>�᡼�륢�ɥ쥹<span class="colorE97">*</span></strong></td>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								</tr>

								<tr>
									<td class="gray02"><strong>�����ֹ�<span class="colorE97">*</span></strong></td>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								</tr>

<?php if ($this->_tpl_vars['data']['user_status'] == 2): ?>
								<tr>
									<td class="gray02"><strong>����</strong></td>
									<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
								</tr>
<?php endif; ?>

							</table>
						</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">��������������</p>
						</div>
					</div>
					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02"><strong>����ʪ</strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2" width="100%">

<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?>
  <?php $_from = $this->_tpl_vars['datum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
?>
    <?php if ($this->_tpl_vars['datum2']['count'] > 0): ?>
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��</td>
											</tr>
    <?php endif; ?>
  <?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>

										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>����</strong></td>
<?php if ($this->_tpl_vars['data']['user_status'] == 1): ?>
									<td><table border="0" cellspacing="0" cellpadding="2" width="100%">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">����ʪ���</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['total_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��</td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">ȯ������</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['trans_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">��</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['allprice'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��</td>
											</tr>
										</table></td>
<?php endif;  if ($this->_tpl_vars['data']['user_status'] == 2): ?><!--ˡ��-->
									<td><table border="0" cellspacing="0" cellpadding="2" width="100%">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">����ʪ���</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['total_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��

												</td>
											</tr>
											<tr>
												<td valign="top" colspan="2" class="text2" style="border:none; padding:2px;">��ȯ������ˤĤ��ơ�<br>
��������1����ˤĤ�850�ߡ����̡ˤˤʤ�ޤ���<br>
�����Ҥμ�����礭������̡ˤ˱����ƺ��������ư���ޤ�����<br>
���ʤ�������������ˤ���ǧ�Τ�����ʸ���������ϡ������ֹ�ޤǤ�Ϣ����������<br>
<br>
����������ǧϢ������̳�������ȯ�����饰�롼�ס�03-3255-1215<br>
<br>
����1�����850�ߡ����̡ˤ�ȯ���Ǥ����������ܰ¡�
<table style="margin-left:20px;">
<tr><td class="text2" style="padding:5px; text-align:center; font-weight:bold;">����̾</td><td class="text2" style="padding:5px; text-align:center; font-weight:bold;">1����κ�������</td></tr>
<tr><td class="text2" style="padding:5px;">�ۤäȰ¿�������</td><td class="text2" style="padding:5px; text-align:right;">1,500���ޤ�</td></tr>
<tr><td class="text2" style="padding:5px;">�ե����ȥ֥å�</td><td class="text2" style="padding:5px; text-align:right;">50���ޤ�</td></tr>
<tr><td class="text2" style="padding:5px;">�������Τ���μ�ž�ְ�������</td><td class="text2" style="padding:5px; text-align:right;">200���ޤ�</td></tr>
<tr><td class="text2" style="padding:5px;">�ΤäƤ��ޤ�������ž�֤λ���</td><td class="text2" style="padding:5px; text-align:right;">300���ޤ�</td></tr>
<tr><td class="text2" style="padding:5px;">����ž�ɻߥޥ˥奢��</td><td class="text2" style="padding:5px; text-align:right;">400���ޤ�</td></tr>
</table>
												</td>
											</tr>
										</table></td>
<?php endif; ?>
								</tr>
								<tr>
									<td class="gray02"><strong>����ʧ����ˡ</strong></td>
<?php if ($this->_tpl_vars['data']['user_status'] == 1): ?>
									<td>͹��������<br><p class="text1">��ȯ������ˤ��������������ޤߤޤ���</p></td>
<?php endif;  if ($this->_tpl_vars['data']['user_status'] == 2): ?>
									<td>��Կ������<br>�������ˤĤ��Ƥϡ�����ʪ���Ϥ��Ȥ�<span class="fc-red"><strong>����</strong></span>�Ǥ����ꤤ�����ޤ���������߼�����ϡ������ͤΤ���ô�Ȥʤ�ޤ���</td>
<?php endif; ?>
								</tr>
							</table>
						</div>
					</div>

					<div class="contentBlock">
						<div class="clearfix text2">
							<p>�嵭�����Ƥ򤴳�ǧ�Τ������������Сֿ�������ץܥ���򥯥�å����Ƥ���������</p>
						</div>
					</div>

					<div class="contentBlock">
						<div class="clearfix text2 btn">
							<input type="reset" class="btnback" value="&nbsp;&nbsp;���&nbsp;&nbsp;" onclick="document.frm2.submit();">
							&nbsp;&nbsp;
<input type="hidden" name="mode" value="submit">
<input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
">
							<input type="submit" value="&nbsp;&nbsp;��������&nbsp;&nbsp;">
						</div>
					</div>
				</form>

<form method="POST" action="form.php" name="frm2">
<input type="hidden" name="mode" value="form2">
<input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
">
</form>

				<!-- //������-->
				<!-- colorCF�饤��-->
				<div class="lineCF"></div>
				<!-- //colorCF�饤��-->

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