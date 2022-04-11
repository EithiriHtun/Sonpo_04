<?php /* Smarty version 2.6.9, created on 2022-01-11 17:02:59
         compiled from form1.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form1.html', 389, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>日本損害保険協会 - SONPO | お役立ち情報 − 講師派遣のご案内 − 損害保険講演会お申込み</title>
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
	// メールアドレスの入力チェックルーチン
	var $email = object_value;
	if ($email.length == 0){
		return true;
	}
	var chk_at = $email.indexOf("@");
	var last_at = $email.lastIndexOf("@");
	var chk_pi = $email.indexOf(".");
	var last_pi = $email.lastIndexOf(".");
	var leng_ma = $email.length - 1;

	//@の個数、位置のチェック
	//存在しない、先頭または最後尾にある場合はエラー
	if((chk_at == -1) || (chk_at == 0) || (last_at == leng_ma)){
		return false;
	}
	//.の個数、位置のチェック
	//存在しない、先頭または最後尾にある場合はエラー
	if((chk_pi == -1) || (chk_pi == 0) || (last_pi == leng_ma)){
		return false;
	}

	//使用可能な文字のみ使用しているかのチェック
	//アルファベット(大文字･小文字)、@、.、_、-、数字など
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
	//半角カタカナのチェック
	//含む場合はエラー
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
	// 全角カナ文字以外をはじく
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
	//数字のチェック
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
	// 全角かな文字以外をはじく
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
	// 日付の存在のチェック
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

// 損害保険講演会入力フォーム１用　エラーチェッカ
function pre_chk_1(){

	var $TF = document.form01;

	// 主催者名のチェック
	if($TF.host.value.length == 0){
		alert("主催者名が未入力です。\\n必須項目となりますので入力してください。");
		$TF.host.focus();
		return false;
	}
	if(!half_kana_chk($TF.host.value)){
		alert("主催者名に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.host.focus();
		return false;
	}

	// 住所のチェック
	// 郵便番号のチェック
	if($TF.post1.value.length == 0){
		alert("郵便番号が未入力です。\\n必須項目となりますので入力してください。");
		$TF.post1.focus();
		return false;
	}
	if(!decimal_chk($TF.post1.value)){
		alert("郵便番号に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.post1.focus();
		return false;
	}

	if($TF.post2.value.length == 0){
		alert("郵便番号が未入力です。\\n必須項目となりますので入力してください。");
		$TF.post2.focus();
		return false;
	}
	if(!decimal_chk($TF.post2.value)){
		alert("郵便番号に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.post2.focus();
		return false;
	}
	if(($TF.post1.value.length != 3) || ($TF.post2.value.length != 4)){
		alert("郵便番号が正しく入力されていません。\\n３桁-４桁で入力してください。");
		$TF.post1.focus();
		return false;
	}

	// 都道府県名の選択チェック
	if($TF.prefecture.selectedIndex == 0){
		alert("都道府県名が選択されていません。\\nリストから選択してください。");
		$TF.prefecture.focus();
		return false;
	}

	// 市区町村以下のチェック
	if($TF.address.value.length == 0){
		alert("市区町村以下が未入力です。\\n必須項目となりますので入力してください。");
		$TF.address.focus();
		return false;
	}
	if(!half_kana_chk($TF.address.value)){
		alert("市区町村以下に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.address.focus();
		return false;
	}


	// 電話番号のチェック
	if($TF.tel1.value.length == 0){
		alert("電話番号(市外局番)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.tel1.focus();
		return false;
	}
	if(!decimal_chk($TF.tel1.value)){
		alert("電話番号(市外局番)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.tel1.focus();
		return false;
	}
	if($TF.tel2.value.length == 0){
		alert("電話番号(市内局番)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.tel2.focus();
		return false;
	}
	if(!decimal_chk($TF.tel2.value)){
		alert("電話番号(市内局番)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.tel2.focus();
		return false;
	}
	if($TF.tel3.value.length == 0){
		alert("電話番号(個人番号)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.tel3.focus();
		return false;
	}
	if(!decimal_chk($TF.tel3.value)){
		alert("電話番号(個人番号)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.tel3.focus();
		return false;
	}

	// FAX番号のチェック
	if(!decimal_chk($TF.fax1.value)){
		alert("FAX番号(市外局番)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.fax1.focus();
		return false;
	}
	if(!decimal_chk($TF.fax2.value)){
		alert("FAX番号(市内局番)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.fax2.focus();
		return false;
	}
	if(!decimal_chk($TF.fax3.value)){
		alert("FAX番号(個人番号)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.fax3.focus();
		return false;
	}

	// ご担当者名のチェック
	if($TF.person_last.value.length == 0){
		alert("ご担当者名(姓)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.person_last.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_last.value)){
		alert("ご担当者名(姓)に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.person_last.focus();
		return false;
	}
	if($TF.person_first.value.length == 0){
		alert("ご担当者名(名)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.person_first.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_first.value)){
		alert("ご担当者名(名)に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.person_first.focus();
		return false;
	}

	// ご担当者名フリガナのチェック
	if($TF.person_kana_last.value.length == 0){
		alert("ご担当者名フリガナ(姓)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.person_kana_last.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_kana_last.value)){
		alert("ご担当者名フリガナ(姓)に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.person_kana_last.focus();
		return false;
	}
	if($TF.person_kana_first.value.length == 0){
		alert("ご担当者名フリガナ(名)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.person_kana_first.focus();
		return false;
	}
	if(!half_kana_chk($TF.person_kana_first.value)){
		alert("ご担当者名フリガナ(名)に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.person_kana_first.focus();
		return false;
	}

	// メールアドレスのチェック
	if($TF.email1.value.length == 0){
		alert("メールアドレスが未入力です。\\n必須項目となりますので入力してください。");
		$TF.email1.focus();
		return false;
	}
	if(!email_chk($TF.email1.value)){
		alert("メールアドレスが正しく入力されていません。\\n正しく入力してください。");
		$TF.email1.focus();
		return false;
	}
	if($TF.email2.value.length == 0){
		alert("確認用メールアドレスが未入力です。\\n必須項目となりますので入力してください。");
		$TF.email2.focus();
		return false;
	}
	if(!email_chk($TF.email2.value)){
		alert("確認用メールアドレスが正しく入力されていません。\\n正しく入力してください。");
		$TF.email2.focus();
		return false;
	}
	if($TF.email1.value != $TF.email2.value){
		alert("入力されたメールアドレスが一致していません。\\n正しく入力してください。");
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

		<!-- ヘッダ -->
		<div id="head">
			<h1 id="title"><a href="http://www.sonpo.or.jp/"><img src="/common/ssi/img/logo.gif" width="288" height="34" border="0" alt="日本損害保険協会 SONPO"></a></h1>
		</div>

		<!-- //ヘッダ -->
		<!-- メインエリア -->
		<div id="main">
			<!-- コンテンツエリア -->
			<div id="content">
				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">損害保険講演会・動画教材使用のお申し込み</span></h2>
				<div class="lineCF"></div>

				<!-- //content title -->

				<div class="contentBlock1">
					<p class="text2">空欄の項目がある場合は、お申込みできませんのでご注意ください。
<br>応募者の情報を他の目的で利用したり、外部に提供することはありません。<br>※講演テーマ「交通事故とその責任」、自転車を取り巻くリスクとその責任」の動画教材（詳しくは<a href="https://www.sonpo.or.jp/about/efforts/action/koushi/douga.html" target="_blank">こちら</a>）も本ページからお申し込みを受け付けております。</p>
					<br>
					<p class="text2">※<span class="fc-red">*</span>印は必須項目です。
<?php if (@ $this->_tpl_vars['errors']): ?><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>　<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span><?php endif; ?></p>

				</div>

<form action="form.php" method="post" name="form01" autocomplete="off" onSubmit="return pre_chk_1();">
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">
						<tr>
							<td valign="top" class="gray02"><strong>主催者名<span class="fc-red">*</span></strong></td>
							<td><input type="text" name="host" size="50" value="<?php if (@ $this->_tpl_vars['data']['host']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

								<br>（例：一般社団法人 日本損害保険協会）</td>
						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>所在地<span class="fc-red">*</span></strong></td>
							<td valign="top">
								<table border="0" cellspacing="0" cellpadding="2">
									<tr>

										<td valign="top" style="border:none; padding:2px;" class="text2">郵便番号<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;" class="text2"><input type="text" name="post1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['post1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											−
											<input type="text" name="post2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['post2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											&nbsp;&nbsp;<span class="fc-red">半角数字</span> <br>（例：101-8355） </td>
									</tr>

									<tr>

										<td style="border:none; padding:2px;" class="text2">都道府県<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;" class="text2"><select name="prefecture">
												<option value="">選択してください。</option>
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

										<td nowrap valign="top" style="border:none; padding:2px;" class="text2">市区町村以下<span class="fc-red">*</span></td>

										<td style="border:none; padding:2px;" class="text2"><input type="text" name="address" size="45" value="<?php if (@ $this->_tpl_vars['data']['address']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											<br>（例：千代田区神田淡路町2-9）</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td valign="top" class="gray02"><strong>電話番号<span class="fc-red">*</span></strong></td>

							<td><input type="text" name="tel1" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								−
								<input type="text" name="tel2" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								−
								<input type="text" name="tel3" size="6" value="<?php if (@ $this->_tpl_vars['data']['tel3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">半角数字</span><br>（例：03 - 3255 - 1215） 

								<table border="0" cellspacing="0" cellpadding="2">
									<tr>
										<td valign="top" style="border:none; padding:2px;" class="text2">内線番号</td>
										<td style="border:none; padding:2px;" class="text2"><input type="text" name="naisen" size="15" maxlength="15" value="<?php if (@ $this->_tpl_vars['data']['naisen']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											&nbsp;&nbsp;<span class="fc-red">半角数字</span> <br>（例：3388） </td>
									</tr>
								</table>

							</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>FAX番号</strong></td>

							<td><input type="text" name="fax1" size="6" value="<?php if (@ $this->_tpl_vars['data']['fax1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								−
								<input type="text" name="fax2" size="6" value="<?php if (@ $this->_tpl_vars['data']['fax2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								−
								<input type="text" name="fax3" size="6" value="<?php if (@ $this->_tpl_vars['data']['fax3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">半角数字</span><br>（例：03 - 3255 - 1215） </td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>ご担当者名<span class="fc-red">*</span></strong></td>

							<td>姓：<input type="text" name="person_last" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_last']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">　
								&nbsp;&nbsp;名：<input type="text" name="person_first" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_first']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								<br>&nbsp;&nbsp;&nbsp;&nbsp;（例：損保）&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（例：太郎）</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>ご担当者名フリガナ<span class="fc-red">*</span></strong></td>

							<td>姓：<input type="text" name="person_kana_last" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_kana_last']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">　
								&nbsp;&nbsp;名：<input type="text" name="person_kana_first" size="20" value="<?php if (@ $this->_tpl_vars['data']['person_kana_first']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">全角カナ</span><br>&nbsp;&nbsp;&nbsp;&nbsp;（例：ソンポ）&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（例：タロウ）</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>ご担当者役職</strong></td>

							<td><input type="text" name="yaku" size="40" value="<?php if (@ $this->_tpl_vars['data']['yaku']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"></td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>メールアドレス<span class="fc-red">*</span></strong></td>

							<td valign="top"><input type="text" name="email1" size="40" value="<?php if (@ $this->_tpl_vars['data']['email1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								&nbsp;&nbsp;<span class="fc-red">半角英数字</span><br> 確認のため、再度入力してください。<br>
								<input type="text" name="email2" size="40" value="<?php if (@ $this->_tpl_vars['data']['email2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['email2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

								&nbsp;&nbsp;<span class="fc-red">半角英数字</span><br>（例：abc@sonpo.or.jp） </td>
						</tr>
					</table>

				</div>
				<div class="contentBlock1">
					<div class="clearfix text2">
<?php if ($this->_tpl_vars['operation'] == 'initial'): ?>						<input name="reset" type="reset" value="&nbsp;&nbsp;入力クリア&nbsp;&nbsp;">
						&nbsp;&nbsp;<?php endif; ?>
						<input name="submit" type="submit" value="&nbsp;&nbsp;次画面へ&nbsp;&nbsp;"><input type="hidden" name="mode" value="form2"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

					</div>
				</div>
				</form>

					<!-- //講師派遣のご案内 -->


				<div class="lineCF"></div>

				<!-- ページの先頭に戻る -->
				<div class="topLink"><p class="text2"><a href="#top" class="totop">ページの先頭に戻る</a></p></div>
				<!-- ページの先頭に戻る -->
<table width="135" border="0" cellpadding="2" cellspacing="0" title="このマークは、SSL/TLSで通信を保護している証です。">
<tr>
<td width="135" align="center" valign="top">
<!-- GeoTrust QuickSSL [tm] Smart  Icon tag. Do not edit. --> <SCRIPT LANGUAGE="JavaScript"  TYPE="text/javascript" SRC="//smarticon.geotrust.com/si.js"></SCRIPT>
<!-- end  GeoTrust Smart Icon tag -->
<a href="https://www.geotrust.co.jp/ssl-certificate/" target="_blank"  style="color:#000000; text-decoration:none; font:bold 12px 'ＭＳ ゴシック',sans-serif; letter-spacing:.5px; text-align:center; margin:0px; padding:0px;">SSLとは？</a></td>
</tr>
</table>
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