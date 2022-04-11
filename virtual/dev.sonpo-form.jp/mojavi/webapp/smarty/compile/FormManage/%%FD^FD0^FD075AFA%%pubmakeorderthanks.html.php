<?php /* Smarty version 2.6.9, created on 2021-04-21 18:49:47
         compiled from pubmakeorderthanks.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubmakeorderthanks.html', 48, false),array('modifier', 'nl2br', 'pubmakeorderthanks.html', 263, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物 管理画面</title>
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

		<!-- メインエリア -->
		<div id="main">
			<!-- コンテンツエリア -->
			<div id="content">
				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">刊行物申込</span></h2>

				<div class="contentBlock">
					<img src="/archive/publish/img/step_04.gif" width="670" height="33" border="0" alt="お申し込み完了">
				</div>

					<div class="subt1">
						<div class="frm">
							<p class="text2">お申し込み完了</p>
						</div>
					</div>

					<div class="contentBlock1 clearfix">
						<div class=" clearfix text2">以下の内容で承りました。お申込みありがとうございます。</div>
						<div><input type="button" class="btnprint" onclick="window.print();return false;" value="&nbsp;&nbsp;このページを印刷する&nbsp;&nbsp;" ></div>
					</div>

					<div class="contentBlock1">
						<div class="boxNormal text2">
							あなたの受付番号は<br>
							<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['recept_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong><br>
							です。お問い合わせの際に必要ですのでこちらの番号をお控えください。
						</div>
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
									<td class="gray02" width="25%"><strong>属性<span class="colorE97">*</span></strong></td>
									<td><div style="padding-bottom: 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address_type_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>住所<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">郵便番号<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">都道府県<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">市区町村以下<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php if ($this->_tpl_vars['data']['address_type'] == 1): ?>
								<tr>
									<td class="gray02"><strong>お名前<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td class="text2" style="border:none; padding:2px;">漢字<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">フリガナ</td>
												<td class="text2" style="border:none; padding:2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php else: ?>
								<tr>
									<td class="gray02"><strong>法人・団体名<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">法人・団体名<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['company'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">部署</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['section'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>ご担当者<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">漢字<span class="colorE97">*</span></td>
												<td valign="top" class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">フリガナ</td>
												<td class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['kana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php endif; ?>
								<tr>
									<td class="gray02"><strong>メールアドレス<span class="colorE97">*</span></strong></td>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								</tr>

								<tr>
									<td class="gray02"><strong>電話番号<span class="colorE97">*</span></strong></td>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								</tr>

								<tr>
									<td class="gray02"><strong>資料送付先<span class="colorE97">*</span></strong></td>
									<td>
									<?php if ($this->_tpl_vars['data']['send_type'] == 0): ?>ご依頼者様住所に同じ<?php endif; ?>
									<?php if ($this->_tpl_vars['data']['send_type'] == 1): ?>ご依頼者様住所と異なる<?php endif; ?>
									</td>
								</tr>

							</table>
						</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">資料送付先情報</p>
						</div>
					</div>
					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>属性<span class="colorE97">*</span></strong></td>
									<td><div style="padding-bottom: 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress_type_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>住所<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">郵便番号<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">都道府県<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['sprefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['sprefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">市区町村以下<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php if ($this->_tpl_vars['data']['saddress_type'] == 1): ?>
								<tr>
									<td class="gray02"><strong>お名前<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td class="text2" style="border:none; padding:2px;">漢字<span class="colorE97">*</span></td>
												<td class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">フリガナ</td>
												<td class="text2" style="border:none; padding:2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['skana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
<?php else: ?>
								<tr>
									<td class="gray02"><strong>法人・団体名<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">法人・団体名<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['scompany'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">部署</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['ssection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>ご担当者<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">漢字<span class="colorE97">*</span></td>
												<td valign="top" class="text2" style="border:none; padding: 2px 20px 2px 2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
												<td class="text2" style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
											</tr>
											<tr>
												<td nowrap class="text2" style="border:none; padding: 2px 20px 2px 2px;">フリガナ</td>
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
									<td class="gray02"><strong>メールアドレス</strong></td>
									<td><?php if (@ $this->_tpl_vars['data']['semail']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['semail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
								</tr>
-->
								<tr>
									<td class="gray02"><strong>電話番号<span class="colorE97">*</span></strong></td>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								</tr>

							</table>
						</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">到着希望日</p>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>到着希望日</strong></td>
									<td><div style="padding-bottom: 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['req_day'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日
									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>到着希望日摘要</strong></td>
									<td><div style="padding-bottom: 5px;">
									<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['req_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

									</div></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="subt2">
						<div class="frm">
							<p class="text2">お申し込み内容</p>
						</div>
					</div>
					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>刊行物</strong></td>
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
部</td>
											</tr>
    <?php endif; ?>
  <?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>
										</table></td>
								</tr>
<!--								<tr>
									<td class="gray02" width="25%"><strong>料金</strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2" width="100%">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">刊行物代金</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['total_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
円</td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">発送料金</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['trans_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
円</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">計</td>
												<td class="text2" style="text-align:right; border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['allprice'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
円</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>お支払い方法</strong></td>
									<td>銀行振り込み<br><p class="text1">※請求書については、刊行物お届けとは<span class="fc-red"><strong>別便</strong></span>でお送りいたします。振り込み手数料は、お客様のご負担となります。</p></td>
								</tr>-->
							</table>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>備考</strong></td>
									<td><div style="padding-bottom: 5px;">
									<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

									</div></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="contentBlock">
						<div class="clearfix text2 btn">
							<a href="/manage/forms/index.php/module/FormManage/action/PubIndex">戻る</a>
						</div>
					</div>

				<!-- //送付先-->
				<!-- colorCFライン-->
				<div class="lineCF"></div>
				<!-- //colorCFライン-->

			</div>

			<!-- //コンテンツエリア -->
		</div>
		<!-- //メインエリア -->

	</div>
</div>
</body>
</html>