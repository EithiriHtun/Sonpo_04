<?php /* Smarty version 2.6.9, created on 2021-07-27 17:53:26
         compiled from addconfirm.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'addconfirm.html', 48, false),array('modifier', 'nl2br', 'addconfirm.html', 183, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>����»���ݸ����� - SONPO | ����Ω������ �� �ֻ��ɸ��Τ����� �� �������Ƴ�ǧ����</title>
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

//-->
</script>
<style>
<?php echo '
body{
  background:none;
}
'; ?>

</style>
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>
<body id="useful-form" style="padding-left:5px;background:#ffffff;">
<a name="top"></a>
<div align="left">
<br>
<h2 style="font-size:130%; padding-left:5px;">����»���ݸ����񡦹ֻ��ɸ� ��������</h2>
<h3>�ֻ��ɸ����ɲ���Ͽ�����Ƴ�ǧ��</h3>
</div>
<div id="wrapper">
	<div id="inbox">

		<!-- �ᥤ�󥨥ꥢ -->
		<div id="main">
			<!-- ����ƥ�ĥ��ꥢ -->
			<div id="content">
				<!-- content title -->

				<!-- //content title -->

<form method="post" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstAdd" name="confForm">
				<!-- ��żԾ��� -->
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">
						<tr>
							<td colspan="2" class="gray01"><strong>��żԾ���</strong></td>
						</tr>

						<tr>
							<td valign="top" class="gray02"><strong>��ż�̾</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>�����</strong></td>
							<td valign="top">

								<table border="0" cellspacing="0" cellpadding="2">
									<tr>
										<td valign="top" style="border:none; padding:2px;" class="text2">͹���ֹ�</td>
										<td style="border:none; padding:2px;" class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>
									<tr>
										<td style="border:none; padding:2px;" class="text2">��ƻ�ܸ�</td>

										<td style="border:none; padding:2px;" class="text2"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']];  endif; ?></td>
									</tr>
									<tr>
										<td nowrap valign="top" style="border:none; padding:2px;" class="text2">�Զ�Į¼�ʲ�</td>
										<td style="border:none; padding:2px;" class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>
								</table>

							</td>
						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>�����ֹ�</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['data']['naisen']): ?><br>������<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
						</tr>
				<tr>

					<td valign="top" class="gray02"><strong>FAX�ֹ�</strong></td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
				</tr>

						<tr>
							<td valign="top" class="gray02"><strong>��ô����̾</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>��ô������</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>�᡼�륢�ɥ쥹</strong></td>
							<td valign="top"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>

					</table>
				</div>

				<!-- //��żԾ��� -->

				<!-- �ֱ������ -->
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list">
						<tr>
							<td colspan="2" class="gray01 text2"><strong>�ֱ������</strong></td>

						</tr>

						<tr>
							<td valign="top" class="text2 gray02" nowrap><strong>��˾��������</strong></td>
							<td align="left">
								<table border="0" cellspacing="0" cellpadding="0" class="noborder text2">
									<tr>
										<td valign="top" align="left" nowrap>��1��˾&nbsp;</td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['year_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ǯ<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx01'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
) <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ʬ��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ʬ<?php if ($this->_tpl_vars['date_warn_1']): ?><br><span style="color:red">��˾�������ޤ�1������ڤäƤ��뤿�ᤪ���������Ǥ��ʤ���礬����ޤ�</span><?php endif; ?></td>

									</tr>
<?php if ($this->_tpl_vars['data']['year_2']): ?>									<tr>
										<td valign="top" align="left" nowrap>��2��˾&nbsp;</td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['year_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ǯ<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
) <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ʬ��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ʬ<?php if ($this->_tpl_vars['date_warn_2']): ?><br><span style="color:red">��˾�������ޤ�1������ڤäƤ��뤿�ᤪ���������Ǥ��ʤ���礬����ޤ�</span><?php endif; ?></td>

									</tr><?php endif; ?>
								</table>
							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>���<br>�����</strong></td>

							<td valign="top">

								<table border="0" cellspacing="0" cellpadding="2" class="noborder text2">
									<tr>
										<td valign="top" style="border:none; padding:2px;">���̾</td>
										<td style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>

									<tr>
										<td valign="top" style="border:none; padding:2px;">͹���ֹ�</td>
										<td style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>

									<tr>
										<td style="border:none; padding:2px;">��ƻ�ܸ�</td>

										<td style="border:none; padding:2px;"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
									</tr>
									<tr>
										<td nowrap valign="top" style="border:none; padding:2px;">�Զ�Į¼�ʲ�</td>
										<td style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>
								</table>

							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>���<br>�����ֹ�</strong></td>
							<td class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>�ֱ��о�</strong></td>
							<td class="text2"><?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']]):  echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']];  endif;  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>����ͽ��Ϳ�</strong></td>
							<td class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
�� </td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>�ֱ�ơ���</strong></td>
							<td valign="top" class="text2"><?php if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']]):  echo ((is_array($_tmp=$this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  if ($this->_tpl_vars['data']['themes'] == '99'): ?><br><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['theme_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp));  endif; ?></td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>�ӥǥ�</strong></td>

							<td valign="top" class="text2">��˾<?php if (@ $this->_tpl_vars['data']['video'] == '1'): ?>����<?php else: ?>���ʤ�<?php endif; ?></td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>����������</strong></td>
							<td valign="top" class="text2">ɬ��������<?php if (@ $this->_tpl_vars['data']['copy']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?> ��<br>
							���������衧<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'host'): ?>��ż�<?php endif;  if (@ $this->_tpl_vars['data']['receiver_address'] == 'venue'): ?>���<?php endif;  if (@ $this->_tpl_vars['data']['receiver_address'] == 'other'): ?>����¾����<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['receiver_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php endif; ?></td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>�ѥ����󤪤�ӥץ����������λ���</strong></td>
							<td valign="top" class="text2"><?php if (@ $this->_tpl_vars['data']['use_pcprj'] == '1'): ?>���Ѳ�ǽ<?php else: ?>�����Բ�ǽ<?php endif; ?></td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>�����٤�<br>�����ѷи�</strong></td>
							<td valign="top" class="text2"><?php if (@ $this->_tpl_vars['data']['exp'] == '1'): ?>����<br>
								<?php if (@ $this->_tpl_vars['data']['use_year'] || @ $this->_tpl_vars['data']['use_month']): ?>�����<?php if (@ ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ǯ <?php endif;  if (@ $this->_tpl_vars['data']['use_month']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 �� <?php endif; ?>��<?php endif;  else: ?>�ʤ�<?php endif; ?></td>
						</tr>
					</table>
					<br>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">

				<tr>
<td class="gray01"><strong>����¾Ϣ��������������ޤ����顢����������������</strong></td></tr><tr><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['connection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>				</tr>


					</table>
				</div>

				<!-- //�ֱ������ -->

				<div class="contentBlock1">
					<div class="clearfix text2" align="center">
						<input type="submit" value="��¸"><input type="hidden" name="mode" value="submit"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
					</div>
				</div>
				</form>
					<!-- //�ֻ��ɸ��Τ����� -->
<input type="button" value="���" onClick="document.form04.submit();">
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstAdd" name="form04" method="POST">
<input type="hidden" name="mode" value="rewrite"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>

			</div>

			<!-- //����ƥ�ĥ��ꥢ -->
		</div>

		<!-- //�ᥤ�󥨥ꥢ -->
	</div>

</div>
</body>

</html>
