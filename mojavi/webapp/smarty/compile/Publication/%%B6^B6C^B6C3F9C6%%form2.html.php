<?php /* Smarty version 2.6.9, created on 2022-03-15 14:41:42
         compiled from form2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form2.html', 68, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>日本損害保険協会 - SONPO | 統計･刊行物・報告書 − 刊行物 − お届け先情報の入力</title>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta name="keywords" content="損害保険、防災、防犯、募集人試験、自然災害、地震、自賠責保険、防火、交通事故、損害保険代理店、損害保険登録鑑定人、損保">
<meta name="description" content="損害保険会社の事業者団体、一般社団法人 日本損害保険協会のサイト。損害保険業界のニュースをはじめ、損害保険の基礎的な知識や統計、防災・防犯・交通安全に関する情報が満載。">
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

		<!-- ヘッダ -->
		<div id="head">
			<h1 id="title"><a href="http://www.sonpo.or.jp/"><img src="/common/ssi/img/logo.gif" width="288" height="34" border="0" alt="日本損害保険協会 SONPO"></a></h1>
		</div>

		<!-- //ヘッダ -->

<form action="form.php" method="POST" name="frm1" autocomplete="off" onSubmit="return pre_check();">
		<!-- メインエリア -->
		<div id="main">
			<!-- コンテンツエリア -->
			<div id="content">
				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">刊行物お申し込み</span></h2>

				<div class="contentBlock">
					<img src="./img/step_02.gif" width="670" height="33" border="0" alt="お届け先情報の入力">
				</div>

					<div class="subt1">
						<div class="frm">
							<p class="text2">お届け先情報の入力</p>
						</div>
					</div>

<?php if ($this->_tpl_vars['errors']): ?>
					<div class="contentBlock" style="border:#aaaaaa solid 1px;background:#ffcccc;">
						<div class="clearfix text2">
							<p><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>　<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span></p>
						</div>
					</div>
<br clear="all">
<?php endif; ?>

					<div class="contentBlock1">
						<div class="clearfix text2">※<span class="colorE97">*</span>印は必須項目です。</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">ご依頼者様情報</p>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02"><strong>個人、法人・団体等のいずれか一方を選択してください。<span class="colorE97">*</span></strong></td>
								</tr>
								<tr>
									<td>
										<div class="contentBlock">
											<p class="attention">個人を選択された場合は郵便代金引換、法人団体等を選択された場合は<br>銀行振り込み（請求書は刊行物とは<span class="fc-red"><strong>別便</strong></span>で送付）でお支払いいただくこととなります。<br></p>
										</div>
										<table border="0" cellspacing="0" cellpadding="0" class="text3">
											<tr>
												<td style="border:none; padding:2px;"><input type="radio" name="user_status" id="personal" value="1" onClick="document.frm3.submit();"<?php if ($this->_tpl_vars['data']['user_status'] == 1): ?> checked<?php endif; ?>></td><td style="border:none; padding:2px 20px 2px 2px;"><label for="personal">個人</label></td><td style="border:none; padding:2px;"><input type="radio" name="user_status" id="group" value="2" onClick="document.frm4.submit();"<?php if ($this->_tpl_vars['data']['user_status'] == 2): ?> checked<?php endif; ?>></td><td style="border:none; padding:2px;"><label for="group">法人・団体等</label></td>
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
									<td class="gray02"><strong>住所<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">郵便番号<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px 2px 5px 2px;"><input type="text" name="zipcode1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['zipcode1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													−
													<input type="text" name="zipcode2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['zipcode2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													&nbsp;&nbsp;<font class="colorE97">半角数字</font> <br>（例：101-8355） </td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">都道府県<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px 2px 10px 2px;"><select name="prefecture">
														<option value="" selected>選択してください。</option>
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
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">市区町村以下<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="address" size="45" value="<?php if (@ $this->_tpl_vars['data']['address']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													<br>（例：千代田区 神田 淡路町 2-9）</td>
											</tr>
										</table></td>
								</tr>

  <?php if ($this->_tpl_vars['data']['user_status'] == 1): ?>
								<tr>
									<td class="gray02"><strong>お名前<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0; width: 85px;">漢字<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">姓</td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="name1" size="8" value="<?php if (@ $this->_tpl_vars['data']['name1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：損保）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">名</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="name2" size="8" value="<?php if (@ $this->_tpl_vars['data']['name2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：太郎）</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">フリガナ</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">セイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana1" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：ソンポ）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">メイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana2" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">全角カナ</font><br>（例：タロウ）</td>
											</tr>
										</table></td>
								</tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['data']['user_status'] == 2): ?>
								<tr>
									<td class="gray02"><strong>法人・団体名<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">法人・団体名<span class="colorE97">*</span></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="company" size="40" value="<?php if (@ $this->_tpl_vars['data']['company']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：日本損害保険協会）</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">部署</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="section" size="40" value="<?php if (@ $this->_tpl_vars['data']['section']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['section'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：業務企画部）</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>ご担当者<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0; width: 85px;">漢字<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">姓</td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="name1" size="8" value="<?php if (@ $this->_tpl_vars['data']['name1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：損保）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">名</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="name2" size="8" value="<?php if (@ $this->_tpl_vars['data']['name2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：太郎）</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">フリガナ</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">セイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana1" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：ソンポ）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">メイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="kana2" size="8" value="<?php if (@ $this->_tpl_vars['data']['kana2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">全角カナ</font><br>（例：タロウ）</td>
											</tr>
										</table></td>
								</tr>
  <?php endif; ?>

								<tr>
									<td class="gray02"><strong>メールアドレス<span class="colorE97">*</span></strong></td>
									<td><div style="padding-bottom: 5px;"><input type="text" name="email" size="50" value="<?php if (@ $this->_tpl_vars['data']['email']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">半角英数字</font><br>（例：abc@sonpo.or.jp）</div>
										<div>確認のため再度入力してください。<br><input type="text" name="email2" size="50" value="<?php if (@ $this->_tpl_vars['data']['email2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">半角英数字</font></div></td>
								</tr>

								<tr>
									<td class="gray02"><strong>電話番号<span class="colorE97">*</span></strong></td>
									<td><input type="text" name="tel1" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										−
										<input type="text" name="tel2" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										−
										<input type="text" name="tel3" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										&nbsp;&nbsp;<font class="colorE97">半角数字</font><br>（例：03 - 3255 - 1215）</td>
								</tr>

  <?php if ($this->_tpl_vars['data']['user_status'] == 2): ?>
								<tr>
									<td class="gray02"><strong>備考</strong></td>
									<td><textarea name="bikou" cols="50" rows="5"><?php if (@ $this->_tpl_vars['data']['bikou']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea><br>連絡事項等ありましたら、こちらにご入力ください。</td>
								</tr>
  <?php endif; ?>

							</table>
						</div>

					</div>
					<div class="contentBlock1">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td>						<div class="clearfix text2 btn">
							<input type="button" class="btnback" value="&nbsp;&nbsp;戻る&nbsp;&nbsp;" onClick="document.frm2.submit();"></div></td>
<td>							&nbsp;&nbsp;</td>
<td>						<div class="clearfix text2 btn"><input type="hidden" name="mode" value="preview"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
							<input type="submit" value="&nbsp;&nbsp;申し込み内容を確認する&nbsp;&nbsp;">
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
<input type="button" class="btnback" value="&nbsp;&nbsp;戻る&nbsp;&nbsp;" onClick="document.frm2.submit();">
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

				<!-- //送付先-->
				<!-- colorCFライン-->
				<div class="lineCF"></div>
				<!-- //colorCFライン-->

				<!-- ページの先頭に戻る -->
				<div class="topLink"><p class="text2"><a href="#top" class="totop">ページの先頭に戻る</a></p></div>
				<!-- ページの先頭に戻る -->
			</div>

			<!-- //コンテンツエリア -->
		</div>
		<!-- //メインエリア -->

		<!-- フッタ -->
		<div id="foot">
			<div id="copy"><a href="/index.html"><img src="/common/ssi/img/copyright.gif" width="400" height="10" border="0" alt="Copyright (c)  The General Insurance Association of Japan. All rights reserved."></a></div>
		</div>
		<!-- //フッタ -->

	</div>
</div>
</body>
</html>