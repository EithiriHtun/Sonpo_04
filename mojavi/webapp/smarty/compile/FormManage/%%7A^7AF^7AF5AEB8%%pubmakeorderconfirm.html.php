<?php /* Smarty version 2.6.9, created on 2022-03-14 18:19:38
         compiled from pubmakeorderconfirm.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubmakeorderconfirm.html', 52, false),array('modifier', 'nl2br', 'pubmakeorderconfirm.html', 52, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">

<link rel="stylesheet" type="text/css" href="/archive/css/import.css">
<link rel="stylesheet" type="text/css" href="/common/css/fmedium.css" title="medium">
<link rel="stylesheet" type="text/css" href="/common/css/flarge.css" title="large">
<link rel="stylesheet" type="text/css" href="/common/css/fexlarge.css" title="exlarge">
<script type="text/javascript" src="/common/js/check.js"></script>
<script type="text/javascript" src="/common/js/fontsize.js"></script>
<script type="text/javascript" src="/common/js/share.js"></script>

<script type="text/javascript" src="/manage/cm.js"></script>
</head>

<body id="archive-form">
<a name="top"></a>
<div id="wrapper">
	<div id="inbox">

		<!-- �ᥤ�󥨥ꥢ -->
		<div id="main">
			<!-- ����ƥ�ĥ��ꥢ -->
			<div id="content">
				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">����ʪ����</span></h2>

				<div class="contentBlock">
					<img src="/archive/publish/img/step_03.gif" width="670" height="33" border="0" alt="�������������ƤΤ���ǧ">
				</div>

				<form method="post" action="/manage/forms/index.php/module/FormManage/action/PubMakeOrder" name="reportform">
					<div class="subt1">
						<div class="frm">
							<p class="text2">�������������Ƥγ�ǧ</p>
						</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">������Ū</p>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>������Ū</strong></td>
									<td><div style="padding-bottom: 5px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['purpose'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

									</div></td>
								</tr>
							</table>
						</div>
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
									<td class="gray02" width="25%"><strong>°��<span class="colorE97">*</span></strong></td>
									<td><div style="padding-bottom: 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address_type_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>����<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">͹���ֹ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">��ƻ�ܸ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">�Զ�Į¼�ʲ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php if ($this->_tpl_vars['data']['address_type'] == 1): ?>
								<tr>
									<td class="gray02"><strong>��̾��<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td class="text2" style="border:none; padding:2px;">����<font class="colorE97">*</font></td>
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
<?php else: ?>
								<tr>
									<td class="gray02"><strong>ˡ�͡�����̾<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">ˡ�͡�����̾<font class="colorE97">*</font></td>
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
												<td valign="top" class="text2" style="border:none; padding:2px;">����<font class="colorE97">*</font></td>
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

								<tr>
									<td class="gray02"><strong>����������<span class="colorE97">*</span></strong></td>
									<td>
									<?php if ($this->_tpl_vars['data']['send_type'] == 0): ?>��������ͽ����Ʊ��<?php endif; ?>
									<?php if ($this->_tpl_vars['data']['send_type'] == 1): ?>��������ͽ���Ȱۤʤ�<?php endif; ?>
									</td>
								</tr>

							</table>
						</div>
					</div>

<?php if ($this->_tpl_vars['data']['send_type'] == 1): ?>
					<div class="subt2">
						<div class="frm">
							<p class="text2">�������������</p>
						</div>
					</div>
					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>°��<span class="colorE97">*</span></strong></td>
									<td><div style="padding-bottom: 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress_type_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>����<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">͹���ֹ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">��ƻ�ܸ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['sprefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['sprefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">�Զ�Į¼�ʲ�<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php if ($this->_tpl_vars['data']['saddress_type'] == 1): ?>
								<tr>
									<td class="gray02"><strong>��̾��<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td class="text2" style="border:none; padding:2px;">����<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">�եꥬ��</td>
												<td class="text2" style="border:none; padding:2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php else: ?>
								<tr>
									<td class="gray02"><strong>ˡ�͡�����̾<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">ˡ�͡�����̾<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['scompany'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">����</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['ssection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>��ô����<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">����<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">�եꥬ��</td>
												<td class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php endif; ?>
<!--
								<tr>
									<td class="gray02"><strong>�᡼�륢�ɥ쥹</strong></td>
									<td><?php if (@ $this->_tpl_vars['data']['semail']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['semail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
								</tr>
-->
								<tr>
									<td class="gray02"><strong>�����ֹ�<span class="colorE97">*</span></strong></td>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								</tr>

							</table>
						</div>
					</div>
<?php endif; ?>

					<div class="subt2">
						<div class="frm">
							<p class="text2">�����˾��</p>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>�����˾��</strong></td>
									<td><div style="padding-bottom: 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ǯ<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_day'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��
									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>�����˾��Ŧ��</strong></td>
									<td><div style="padding-bottom: 5px;">
									<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['req_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

									</div></td>
								</tr>
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
									<td class="gray02" width="25%"><strong>����ʪ</strong></td>
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
<!--								<tr>
									<td class="gray02" width="25%"><strong>����</strong></td>
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
								</tr>
								<tr>
									<td class="gray02"><strong>����ʧ����ˡ</strong></td>
									<td>��Կ������<br><p class="text1">�������ˤĤ��Ƥϡ�����ʪ���Ϥ��Ȥ�<span class="fc-red"><strong>����</strong></span>�Ǥ����ꤤ�����ޤ���������߼�����ϡ������ͤΤ���ô�Ȥʤ�ޤ���</p></td>
								</tr>-->
							</table>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>����</strong></td>
									<td><div style="padding-bottom: 5px;">
									<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

									</div></td>
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
<input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
							<input type="submit" value="&nbsp;&nbsp;��������&nbsp;&nbsp;">
						</div>
					</div>
				</form>

<form method="POST" action="/manage/forms/index.php/module/FormManage/action/PubMakeOrder" name="frm2">
<input type="hidden" name="mode" value="form2">
<input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
</form>

				<!-- //������-->
				<!-- colorCF�饤��-->
				<div class="lineCF"></div>
				<!-- //colorCF�饤��-->

			</div>

			<!-- //����ƥ�ĥ��ꥢ -->
		</div>
		<!-- //�ᥤ�󥨥ꥢ -->


	</div>
</div>
</body>
</html>