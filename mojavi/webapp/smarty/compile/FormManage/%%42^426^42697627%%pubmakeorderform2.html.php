<?php /* Smarty version 2.6.9, created on 2022-03-14 18:19:01
         compiled from pubmakeorderform2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubmakeorderform2.html', 17, false),)), $this); ?>
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
<script>
  var toscroll='<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['toscroll'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';

<?php echo '
  function setPosition(){
    if(toscroll){
      obj = document.getElementById(toscroll);
      y = obj.offsetTop;
      scrollTo(0,y);
      document.frm1.toscroll.value=\'\';
    }
  }

  function changeSendinfo(){
    var send_type=document.frm1.send_type;
    
    for (var i=0;i<send_type.length;i++){
      if(send_type[i].checked && send_type[i].value==\'0\'){
        document.getElementById("sendinfo").style.display="none";
      }
      if(send_type[i].checked && send_type[i].value==\'1\'){
        document.getElementById("sendinfo").style.display="";
      }
    }

  }
'; ?>

</script>
<script type="text/javascript" src="/archive/publish/js/check2.js"></script>
</head>

<body id="archive-form" onLoad="setPosition();changeSendinfo();">
<a name="top"></a>
<div id="wrapper">
	<div id="inbox">

<form action="/manage/forms/index.php/module/FormManage/action/PubMakeOrder" method="POST" name="frm1" onSubmit="return pre_check();">
<input type="hidden" name="toscroll">
		<!-- メインエリア -->
		<div id="main">
			<!-- コンテンツエリア -->
			<div id="content">
				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">刊行物申込</span></h2>

				<div class="contentBlock">
					<img src="/archive/publish/img/step_02.gif" width="670" height="33" border="0" alt="お届け先情報の入力">
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
							<p class="text2">使用目的</p>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>使用目的</strong></td>
									<td><div style="padding-bottom: 5px;">※刊行物の使用目的を記入してください。<br>
									<textarea name="purpose" cols="40" rows="2"><?php if (@ $this->_tpl_vars['data']['purpose']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['purpose'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea>
									</div></td>
								</tr>
							</table>
						</div>
					</div>

<a id="position1"></a>
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
									<td><div style="padding-bottom: 5px;">
									<select name="address_type" onChange="document.frm1.toscroll.value='position1';document.frm1.mode.value='form3';document.frm1.select_address_type.value='1';document.frm1.submit();"><option>▼選択してください
									<?php $_from = $this->_tpl_vars['address_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if (@ $this->_tpl_vars['data']['address_type'] == $this->_tpl_vars['dkey']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?>
									</select><input type="hidden" name="select_address_type" value="0">
									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>住所<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">郵便番号<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px 2px 5px 2px;"><input type="text" name="zipcode1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['zipcode1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													−
													<input type="text" name="zipcode2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['zipcode2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['zipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													&nbsp;&nbsp;<font class="colorE97">半角数字</font> <br>（例：101-8335） </td>
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

  <?php if (@ $this->_tpl_vars['data']['address_type'] == 1): ?>
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
  <?php else: ?>
								<tr>
									<td class="gray02"><strong>法人・団体名<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0;">法人・団体名<font class="colorE97">*</font></td>
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
								<tr>
									<td class="gray02"><strong>資料送付先<span class="colorE97">*</span></strong></td>
									<td>
									<input type="radio" name="send_type" value="0"<?php if (@ $this->_tpl_vars['data']['send_type'] == 0): ?> checked<?php endif; ?> id="send_type_0" onClick="changeSendinfo();"><label for="send_type_0">ご依頼者様住所に同じ</label><br>
									<input type="radio" name="send_type" value="1"<?php if (@ $this->_tpl_vars['data']['send_type'] == 1): ?> checked<?php endif; ?> id="send_type_1" onClick="changeSendinfo();"><label for="send_type_1">ご依頼者様住所と異なる</label>（「資料送付先情報」が表示されますので入力してください。）<br>
									</td>
								</tr>
							</table>
						</div>
					</div>

<div id="sendinfo">
<a id="position2"></a>
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
									<td><div style="padding-bottom: 5px;">
									<select name="saddress_type" onChange="document.frm1.toscroll.value='position2';document.frm1.mode.value='form3';document.frm1.select_saddress_type.value='1';document.frm1.submit();"><option>▼選択してください
									<?php $_from = $this->_tpl_vars['address_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if (@ $this->_tpl_vars['data']['saddress_type'] == $this->_tpl_vars['dkey']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?>
									</select><input type="hidden" name="select_saddress_type" value="0">
									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>住所<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px;">郵便番号<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px 2px 5px 2px;"><input type="text" name="szipcode1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['szipcode1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													−
													<input type="text" name="szipcode2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['szipcode2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['szipcode2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													&nbsp;&nbsp;<font class="colorE97">半角数字</font> <br>（例：101-8355） </td>
											</tr>
											<tr>
												<td class="text2" style="border:none; padding:2px;">都道府県<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px 2px 10px 2px;"><select name="sprefecture">
														<option value="" selected>選択してください。</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?>												<option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == @ $this->_tpl_vars['data']['sprefecture']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
													</select>
												</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">市区町村以下<font class="colorE97">*</font></td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="saddress" size="45" value="<?php if (@ $this->_tpl_vars['data']['saddress']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
													<br>（例：千代田区 神田 淡路町 2-9）</td>
											</tr>
										</table></td>
								</tr>

  <?php if (@ $this->_tpl_vars['data']['saddress_type'] == 1): ?>
								<tr>
									<td class="gray02"><strong>お名前<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0; width: 85px;">漢字<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">姓</td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="sname1" size="8" value="<?php if (@ $this->_tpl_vars['data']['sname1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：損保）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">名</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="sname2" size="8" value="<?php if (@ $this->_tpl_vars['data']['sname2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：太郎）</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">フリガナ</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">セイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="skana1" size="8" value="<?php if (@ $this->_tpl_vars['data']['skana1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['skana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：ソンポ）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">メイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="skana2" size="8" value="<?php if (@ $this->_tpl_vars['data']['skana2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['skana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">全角カナ</font><br>（例：タロウ）</td>
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
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="scompany" size="40" value="<?php if (@ $this->_tpl_vars['data']['scompany']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['scompany'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：日本損害保険協会）</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">部署</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;"></td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="ssection" size="40" value="<?php if (@ $this->_tpl_vars['data']['ssection']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['ssection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：業務企画部）</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="gray02"><strong>ご担当者<span class="colorE97">*</span></strong></td>
									<td><table border="0" cellspacing="0" cellpadding="2">
											<tr>
												<td valign="top" class="text2" style="border:none; padding:2px 0 2px 0; width: 85px;">漢字<font class="colorE97">*</font></td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">姓</td>
												<td valign="top" class="text2" style="border:none; padding:2px;"><input type="text" name="sname1" size="8" value="<?php if (@ $this->_tpl_vars['data']['sname1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['sname1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：損保）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">名</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="sname2" size="8" value="<?php if (@ $this->_tpl_vars['data']['sname2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['sname2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：太郎）</td>
											</tr>
											<tr>
												<td nowrap valign="top" class="text2" style="border:none; padding:2px;">フリガナ</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">セイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="skana1" size="8" value="<?php if (@ $this->_tpl_vars['data']['skana1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['skana1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：ソンポ）</td>
												<td valign="top" class="text2" style="border:none; padding:2px; text-align: right;">メイ</td>
												<td class="text2" style="border:none; padding:2px;"><input type="text" name="skana2" size="8" value="<?php if (@ $this->_tpl_vars['data']['skana2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['skana2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">全角カナ</font><br>（例：タロウ）</td>
											</tr>
										</table></td>
								</tr>
  <?php endif; ?>
<!--
								<tr>
									<td class="gray02"><strong>メールアドレス<span class="colorE97">*</span></strong></td>
									<td><div style="padding-bottom: 5px;"><input type="text" name="semail" size="50" value="<?php if (@ $this->_tpl_vars['data']['semail']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['semail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">半角英数字</font><br>（例：webmaster@sonpo.or.jp）</div>
										<div>確認のため再度入力してください。<br><input type="text" name="semail2" size="50" value="<?php if (@ $this->_tpl_vars['data']['semail2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['semail2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;&nbsp;<font class="colorE97">半角英数字</font></div></td>
								</tr>
-->
								<tr>
									<td class="gray02"><strong>電話番号<span class="colorE97">*</span></strong></td>
									<td><input type="text" name="stel1" size="6" value="<?php if (@ $this->_tpl_vars['data']['stel1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['stel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										−
										<input type="text" name="stel2" size="6" value="<?php if (@ $this->_tpl_vars['data']['stel2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['stel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										−
										<input type="text" name="stel3" size="6" value="<?php if (@ $this->_tpl_vars['data']['stel3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['stel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
										&nbsp;&nbsp;<font class="colorE97">半角数字</font><br>（例：03 - 3255 - 1215）</td>
								</tr>
							</table>
						</div>
					</div>
</div><!--/sendinfo-->

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
									<td><div style="padding-bottom: 5px;">
<select name="req_year"><option value="">▼<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['req_year']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>年 
<select name="req_month"><option value="">▼<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['req_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>月 
<select name="req_day"><option value="">▼<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['req_day']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endforeach; endif; unset($_from); ?></select>日 
									</div></td>
								</tr>
								<tr>
									<td class="gray02"><strong>到着希望日摘要</strong></td>
									<td><div style="padding-bottom: 5px;">
									<textarea name="req_text" cols="40" rows="2"><?php if (@ $this->_tpl_vars['data']['req_text']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['req_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea>
									</div></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td class="gray02" width="25%"><strong>備考</strong></td>
									<td><div style="padding-bottom: 5px;">
									<textarea name="bikou" cols="40" rows="2"><?php if (@ $this->_tpl_vars['data']['bikou']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea>
									</div></td>
								</tr>
							</table>
						</div>
					</div>


					<div class="contentBlock1">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td>						<div class="clearfix text2 btn">
							<input type="button" class="btnback" value="&nbsp;&nbsp;戻る&nbsp;&nbsp;" onClick="document.frm2.submit();"></div></td>
<td>							&nbsp;&nbsp;</td>
<td>						<div class="clearfix text2 btn"><input type="hidden" name="mode" value="preview">
							<input type="submit" value="&nbsp;&nbsp;申し込み内容を確認する&nbsp;&nbsp;">
						</div></td>
</tr>
</table>
					</div>
</form>

<form method="POST" action="/manage/forms/index.php/module/FormManage/action/PubMakeOrder" name="frm2">
<input type="hidden" name="mode" value="form">
</form>

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