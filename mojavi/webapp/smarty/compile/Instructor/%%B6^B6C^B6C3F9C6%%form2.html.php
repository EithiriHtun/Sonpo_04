<?php /* Smarty version 2.6.9, created on 2022-03-08 16:27:12
         compiled from form2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form2.html', 652, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>日本損害保険協会 - SONPO | お役立ち情報 − 講師派遣のご案内 − 損害保険講演会・動画教材使用のお申し込み</title>
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

// 損害保険講演会入力フォーム２用　エラーチェッカ
function pre_chk_2(){

	var $TF = document.form02;

	// 開催日時に付いてのチェック
	var localDate = new Date();
	localYear = localDate.getFullYear();
	localMonth = localDate.getMonth() + 1;
	localDay = localDate.getDate();
	// 開催日時第一希望
	var firstYear = $TF.year_1[$TF.year_1.selectedIndex].value;
	var firstMonth = $TF.month_1[$TF.month_1.selectedIndex].value;
	var firstDay = $TF.day_1[$TF.day_1.selectedIndex].value;
	var firstHourFrom = $TF.hour_from_1[$TF.hour_from_1.selectedIndex].value;
	var firstMinFrom = $TF.min_from_1[$TF.min_from_1.selectedIndex].value;
	var firstHourTo = $TF.hour_to_1[$TF.hour_to_1.selectedIndex].value;
	var firstMinTo = $TF.min_to_1[$TF.min_to_1.selectedIndex].value;
	// 開催日時第二希望
	var secondYear = $TF.year_2[$TF.year_2.selectedIndex].value;
	var secondMonth = $TF.month_2[$TF.month_2.selectedIndex].value;
	var secondDay = $TF.day_2[$TF.day_2.selectedIndex].value;
	var secondHourFrom = $TF.hour_from_2[$TF.hour_from_2.selectedIndex].value;
	var secondMinFrom = $TF.min_from_2[$TF.min_from_2.selectedIndex].value;
	var secondHourTo = $TF.hour_to_2[$TF.hour_to_2.selectedIndex].value;
	var secondMinTo = $TF.min_to_2[$TF.min_to_2.selectedIndex].value;

	if(firstYear == ""){
		alert("第１希望の開催日の年が選択されていません。\\n希望年を選択してください。");
		$TF.year_1.focus();
		return false;
	}
	if(firstMonth == ""){
		alert("第１希望の開催日の月が選択されていません。\\n希望月を選択してください。");
		$TF.month_1.focus();
		return false;
	}
	if(firstDay == ""){
		alert("第１希望の開催日の日が選択されていません。\\n希望日を選択してください。");
		$TF.day_1.focus();
		return false;
	}
	if(firstHourFrom == ""){
		alert("第１希望の開催日の開始時間が選択されていません。\\n開始時間を選択してください。");
		$TF.hour_from_1.focus();
		return false;
	}
	if(firstMinFrom == ""){
		alert("第１希望の開催日の開始時間が選択されていません。\\n開始時間を選択してください。");
		$TF.min_from_1.focus();
		return false;
	}
	if(firstHourTo == ""){
		alert("第１希望の開催日の終了時間が選択されていません。\\n終了時間を選択してください。");
		$TF.hour_to_1.focus();
		return false;
	}
	if(firstMinTo == ""){
		alert("第１希望の開催日の終了時間が選択されていません。\\n終了時間を選択してください。");
		$TF.min_to_1.focus();
		return false;
	}
	// 日付の存在チェック
	if(!dateValueChek(firstYear, firstMonth, firstDay)){
		alert("第１希望の開催日が存在しない日にちを選択されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
		$TF.day_1.focus();
		return false;
	}

	if(firstYear == localYear){
		// 今年の場合の処理
		if(firstMonth < localMonth){
			alert("第１希望の開催日が本日より古い日付が指定されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
			$TF.month_1.focus();
			return false;
		}
		if(firstMonth == localMonth){
			if(firstDay < localDay){
				alert("第１希望の開催日が本日より古い日付が指定されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
				$TF.day_1.focus();
				return false;
			}
			if(firstDay == localDay){
				alert("第１希望の開催日に本日が指定されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
				$TF.day_1.focus();
				return false;
			}
		}
	}
	if((firstHourFrom == firstHourTo) && (firstMinFrom == firstMinTo)){
		alert("第１希望の開催日の開始時刻と終了時刻が同じです。\\nもう一度時間をご確認のうえ、選択してください。");
		$TF.hour_from_1.focus();
		return false;
	}
	var timeCalc1 = (firstHourFrom * 60) + parseInt(firstMinFrom, 10);
	var timeCalc2 = (firstHourTo * 60) + parseInt(firstMinTo, 10);

	if((timeCalc2 - timeCalc1) < 50){
		alert("第１希望の開催日講演予定時間が50分以下です。\\nもう一度時間をご確認のうえ、選択してください。");
		$TF.hour_from_1.focus();
		return false;
	}

	// 希望開催日　第二希望のチェック
	// 全ての選択欄が空白の場合は第二希望無しと判断
	if((secondYear != "") || (secondMonth != "") || (secondDay != "") || (secondHourFrom != "") || (secondMinFrom != "") || (secondHourTo != "") || (secondMinTo != "")){

		if(secondYear == ""){
			alert("第２希望の開催日の年が選択されていません。\\n希望年を選択してください。\\n希望されない場合は空欄を選択してください。");
			$TF.year_2.focus();
			return false;
		}
		if(secondMonth == ""){
			alert("第２希望の開催日の月が選択されていません。\\n希望月を選択してください。\\n希望されない場合は空欄を選択してください。");
			$TF.month_2.focus();
			return false;
		}
		if(secondDay == ""){
			alert("第２希望の開催日の日が選択されていません。\\n希望日を選択してください。\\n希望されない場合は空欄を選択してください。");
			$TF.day_2.focus();
			return false;
		}
		if(secondHourFrom == ""){
			alert("第２希望の開催日の開始時間が選択されていません。\\n開始時間を選択してください。\\n希望されない場合は空欄を選択してください。");
			$TF.hour_from_2.focus();
			return false;
		}
		if(secondMinFrom == ""){
			alert("第２希望の開催日の開始時間が選択されていません。\\n開始時間を選択してください。\\n希望されない場合は空欄を選択してください。");
			$TF.min_from_2.focus();
			return false;
		}
		if(secondHourTo == ""){
			alert("第２希望の開催日の終了時間が選択されていません。\\n終了時間を選択してください。\\n希望されない場合は空欄を選択してください。");
			$TF.hour_to_2.focus();
			return false;
		}
		if(secondMinTo == ""){
			alert("第２希望の開催日の終了時間が選択されていません。\\n終了時間を選択してください。\\n希望されない場合は空欄を選択してください。");
			$TF.min_to_2.focus();
			return false;
		}
		// 日付の存在チェック
		if(!dateValueChek(secondYear, secondMonth, secondDay)){
			alert("第２希望の開催日が存在しない日にちを選択されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
			$TF.day_2.focus();
			return false;
		}

		if(secondYear == localYear){
			// 今年の場合の処理
			if(secondMonth < localMonth){
				alert("第２希望の開催日が本日より古い日付が指定されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
				$TF.month_2.focus();
				return false;
			}
			if(secondMonth == localMonth){
				if(secondDay < localDay){
					alert("第２希望の開催日が本日より古い日付が指定されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
					$TF.day_2.focus();
					return false;
				}
				if(secondDay == localDay){
					alert("第２希望の開催日に本日が指定されています。\\nもう一度希望年月日をご確認のうえ、選択してください。");
					$TF.day_2.focus();
					return false;
				}
			}
		}
		if((secondHourFrom == secondHourTo) && (secondMinFrom == secondMinTo)){
			alert("第２希望の開催日の開始時刻と終了時刻が同じです。\\nもう一度時間をご確認のうえ、選択してください。");
			$TF.hour_from_2.focus();
			return false;
		}
		timeCalc1 = (secondHourFrom * 60) + parseInt(secondMinFrom, 10);
		timeCalc2 = (secondHourTo * 60) + parseInt(secondMinTo, 10);

		if((timeCalc2 - timeCalc1) < 50){
			alert("第２希望の開催日講演予定時間が50分以下です。\\nもう一度時間をご確認のうえ、選択してください。");
			$TF.hour_from_2.focus();
			return false;
		}
	}


	// 講演開場名のチェック
	if($TF.lecture_hall.value.length == 0){
		alert("会場名が未入力です。\\n必須項目となりますので入力してください。");
		$TF.lecture_hall.focus();
		return false;
	}
	if(!half_kana_chk($TF.lecture_hall.value)){
		alert("会場名に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.lecture_hall.focus();
		return false;
	}

	// 講演会場都道府県名の選択チェック
	if($TF.lecture_prefecture.selectedIndex == 0){
		alert("会場所在地の都道府県名が選択されていません。\\nリストから選択してください。");
		$TF.lecture_prefecture.focus();
		return false;
	}

	// 講演会場市町村以下のチェック
	if($TF.lecture_address.value.length == 0){
		alert("会場所在地の市区町村以下が未入力です。\\n必須項目となりますので入力してください。");
		$TF.lecture_address.focus();
		return false;
	}
	if(!half_kana_chk($TF.lecture_address.value)){
		alert("会場所在地の市区町村以下に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.lecture_address.focus();
		return false;
	}

	// 講演会場の電話番号のチェック
	if($TF.lecture_tel1.value.length == 0){
		alert("会場の電話番号(市外局番)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.lecture_tel1.focus();
		return false;
	}
	if(!decimal_chk($TF.lecture_tel1.value)){
		alert("会場の電話番号(市外局番)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.lecture_tel1.focus();
		return false;
	}
	if($TF.lecture_tel2.value.length == 0){
		alert("会場の電話番号(市内局番)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.lecture_tel2.focus();
		return false;
	}
	if(!decimal_chk($TF.lecture_tel2.value)){
		alert("会場の電話番号(市内局番)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.lecture_tel2.focus();
		return false;
	}
	if($TF.lecture_tel3.value.length == 0){
		alert("会場の電話番号(個人番号)が未入力です。\\n必須項目となりますので入力してください。");
		$TF.lecture_tel3.focus();
		return false;
	}
	if(!decimal_chk($TF.lecture_tel3.value)){
		alert("会場の電話番号(個人番号)に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.lecture_tel3.focus();
		return false;
	}

	// 講演対象のチェック
	//if($TF.object_text.value.length == 0){
	//	alert("講演対象が未入力です。\\n必須項目となりますので入力してください。");
	//	$TF.object_text.focus();
	//	return false;
	//}
	if(!half_kana_chk($TF.object_text.value)){
		alert("対象に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.object_text.focus();
		return false;
	}
	// 予定人数のチェック
	if($TF.object_num.value.length == 0){
		alert("受講予定人数が未入力です。\\n必須項目となりますので入力してください。");
		$TF.object_num.focus();
		return false;
	}
	if(!decimal_chk($TF.object_num.value)){
		alert("受講予定人数に半角数字以外が使用されています。\\n半角数字で入力してください。");
		$TF.object_num.focus();
		return false;
	}

	// 講演テーマのチェック
	if($TF.themes.value == ""){
		alert("テーマが選択されていません。\\nリストから選択してください。");
		$TF.themes.focus();
		return false;
	}
	if($TF.themes.selectedIndex == 0){
		alert("テーマが選択されていません。\\nリストから選択してください。");
		$TF.themes.focus();
		return false;
	}
	if(($TF.theme_text.value.length == 0) && ($TF.themes.options[$TF.themes.selectedIndex].value == 99)){
		alert("テーマにその他が選択されています。\\n記入欄にテーマを入力してください。");
		$TF.theme_text.focus();
		return false;
	}
	if(!half_kana_chk($TF.theme_text.value)){
		alert("テーマのその他記入欄に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.theme_text.focus();
		return false;
	}

	// ビデオ貸出のチェック
	if(!(($TF.video[0].checked) || ($TF.video[1].checked))){
		alert("ビデオ貸出の希望のあり／なしを選択してください。");
		$TF.video[0].focus();
		return false;
	}
/*
	if($TF.video[0].checked){
		if($TF.video_name.selectedIndex == 0){
			alert("貸出希望のビデオタイトルが選択されていません。\\nリストから選択してください。");
			$TF.video_name.focus();
			return false;
		}
	}
	// 配付希望資料のチェック
	if(!(($TF.distribution_data[0].checked) || ($TF.distribution_data[1].checked))){
		alert("配付希望資料のあり／なしを選択してください。");
		$TF.distribution_data[0].focus();
		return false;
	}
	if($TF.distribution_data[0].checked){
		// 配付希望資料タイトル
		if($TF.handout.selectedIndex == 0){
			alert("配付希望資料のタイトルが選択されていません。\\nリストから選択してください。");
			$TF.handout.focus();
			return false;
		}
*/
		// 配付希望部数
		if($TF.copy.value.length == 0){
			alert("配付希望資料部数が未入力です。\\n必須項目となりますので入力してください。");
			$TF.copy.focus();
			return false;
		}
		if(!decimal_chk($TF.copy.value)){
			alert("配付希望資料部数に半角数字以外が使用されています。\\n半角数字で入力してください。");
			$TF.copy.focus();
			return false;
		}
		// 配付希望資料送付先
		if(!(($TF.receiver_address[0].checked) || ($TF.receiver_address[1].checked) || ($TF.receiver_address[2].checked))){
			alert("配付希望資料の送付先を選択してください。");
			$TF.receiver_address[0].focus();
			return false;
		}
		if($TF.receiver_address[2].checked){
			if($TF.receiver_text.value.length == 0){
				alert("配付希望資料の送付先が未入力です。\\n必須項目となりますので入力してください。");
				$TF.receiver_text.focus();
				return false;
			}
			if(!half_kana_chk($TF.receiver_text.value)){
				alert("配付希望資料の送付先に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
				$TF.receiver_text.focus();
				return false;
			}
		}
/*
	} else {
		// 希望無しなので入力欄クリア
		$TF.copy.value = "";
		$TF.receiver_text.value = "";
	}
*/

	// 
	if(!(($TF.use_pcprj[0].checked) || ($TF.use_pcprj[1].checked))){
		alert("パソコンおよびプロジェクターの使用可能／不可能を選択してください。");
		$TF.use_pcprj[0].focus();
		return false;
	}


	// 本制度のご利用経験のチェック
	if(!(($TF.exp[0].checked) || ($TF.exp[1].checked))){
		alert("本制度・動画教材のご利用経験のあり／なしを選択してください。");
		$TF.exp[0].focus();
		return false;
	}
	if($TF.exp[0].checked){
/*
		if($TF.use_year.value.length == 0){
			alert("本制度のご利用経験(年)が未入力です。\\n必須項目となりますので入力してください。");
			$TF.use_year.focus();
			return false;
		}
*/
		if(!decimal_chk($TF.use_year.value)){
			alert("本制度のご利用経験(年)に半角数字以外が使用されています。\\n半角数字で西暦を入力してください。");
			$TF.use_year.focus();
			return false;
		}
/*
		if($TF.use_month.selectedIndex == 0){
			alert("本制度のご利用経験(月)が選択されていません。\\nリストから選択してください。");
			$TF.use_month.focus();
			return false;
		}
*/
/*
		if(!half_kana_chk($TF.expTxt.value)){
			alert("本制度のご利用経験(講師名)に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
			$TF.expTxt.focus();
			return false;
		}
*/


	} else {
		// 希望無しなので入力欄クリア
		$TF.use_year.value = "";
		$TF.use_month.value = "";
		$TF.expTxt.value = "";
	}

	// その他のチェック
	if(!half_kana_chk($TF.connection.value)){
		alert("その他連絡事項等に半角カタカナが使用されています。\\n半角カタカナは使用できません。");
		$TF.connection.focus();
		return false;
	}


	return true;

}

// 曜日算出用の曜日データ
var weekT = new Array("日","月","火","水","木","金","土");

// 曜日の算出：第一希望日
function weekTxt01(){

	var $TF = document.form02;
	// 開催日時第一希望
	var chYear = $TF.year_1[$TF.year_1.selectedIndex].value;
	var chMonth = $TF.month_1[$TF.month_1.selectedIndex].value;
	var chDay = $TF.day_1[$TF.day_1.selectedIndex].value;

	if((chYear != \'\') && (chMonth != \'\') && (chDay != \'\')){
		var chDate = new Date(chYear*1,(chMonth-1)*1,chDay*1);
		$TF.wTx01.value = weekT[chDate.getDay()];
	}
}



// 曜日の算出：第二希望日
function weekTxt02(){

	var $TF = document.form02;
	// 開催日時第二希望
	var chYear = $TF.year_2[$TF.year_2.selectedIndex].value;
	var chMonth = $TF.month_2[$TF.month_2.selectedIndex].value;
	var chDay = $TF.day_2[$TF.day_2.selectedIndex].value;

	if((chYear != \'\') && (chMonth != \'\') && (chDay != \'\')){
		var chDate = new Date(chYear*1,(chMonth-1)*1,chDay*1);
		$TF.wTx02.value = weekT[chDate.getDay()];
	}
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
  _gaq.push([\'_trackPageview\', \'/useful/koushi/moushikomi/form_input2.html\']);

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
					<p class="text2">空欄の項目がある場合は、お申込みできませんのでご注意ください。<br>
応募者の情報を他の目的で利用したり、外部に提供することはありません。<br>※講演テーマ「交通事故とその責任」、自転車を取り巻くリスクとその責任」の動画教材（詳しくは<a href="https://www.sonpo.or.jp/about/efforts/action/koushi/douga.html" target="_blank">こちら</a>）も本ページからお申し込みを受け付けております。</p>
					<br>
					<p class="text2">※<span class="fc-red">*</span>印は必須項目です。
<?php if ($this->_tpl_vars['errors']): ?><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>　<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span><?php endif; ?></p>

				</div>

<form action="form.php" method="post" name="form02" autocomplete="off" onSubmit="return pre_chk_2()">
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list">
						<tr>
							<td valign="top" class="text2 gray02" nowrap><strong>希望開催日時<span class="fc-red">*</span></strong></td>
							<td align="left">

								<table border="0" cellspacing="0" cellpadding="0" class="noborder text2">
									<tr>
										<td valign="top" align="left" nowrap>第1希望<span class="fc-red">*</span></td>
										<td>
											<select name="year_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['year_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 年 
											<select name="month_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['month_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 月 
											<select name="day_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['day_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 日 
											&nbsp;&nbsp;<input type="text" name="wTx01" size="2" value="<?php if (@ $this->_tpl_vars['data']['wTx01']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx01'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;曜日<br>&nbsp;&nbsp;&nbsp;
											<select name="hour_from_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_from_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 時 
											<select name="min_from_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_from_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 分 〜 
											<select name="hour_to_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_to_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 時 
											<select name="min_to_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_to_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 分
										</td>

									</tr>
									<tr>
										<td colspan="2">&nbsp;</td>
									</tr>

									<tr>
										<td valign="top" nowrap>第2希望</td>
										<td>
											<select name="year_2" onChange="weekTxt02()">

												<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['year_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> 年 
											<select name="month_2" onChange="weekTxt02()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['month_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 月 
											<select name="day_2" onChange="weekTxt02()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['day_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 日 
											&nbsp;&nbsp;<input type="text" name="wTx02" size="2" value="<?php if (@ $this->_tpl_vars['data']['wTx02']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;曜日<br>&nbsp;&nbsp;&nbsp;
											<select name="hour_from_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_from_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> 時 
											<select name="min_from_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_from_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> 分 〜 
											<select name="hour_to_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_to_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 時 
											<select name="min_to_2">

												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_to_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> 分
										</td>

									</tr>
								</table>
								<div>
									<p class="caution text2">【講演会のお申し込みの場合】</p><p class="caution text2" style="padding:0;padding-left:1em;">※開催希望日の１ヶ月前までにお申込みください。希望開催日まで１ヶ月を切っている場合、お引き受けできない場合があります。<br>
									※講演時間は最低５０分以上でお願いいたします。</p>
									<p class="caution text2">【動画教材をお申し込みの場合】</p>
									<p class="caution text2" style="padding:0;padding-left:1em;">※動画を使用する予定の日時をご記入ください。</p>

								</div>
							</td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>会場<br>所在地<span class="fc-red">*</span></strong></td>
							<td valign="top">
								<table border="0" cellspacing="0" cellpadding="2" class="noborder text2">

									<tr>
										<td valign="top" style="border:none; padding:2px;">会場名<span class="fc-red">*</span></td>

										<td style="border:none; padding:2px;" class="text2"><input type="text" name="lecture_hall" size="45" value="<?php if (@ $this->_tpl_vars['data']['lecture_hall']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"></td>
									</tr>

									<tr>
										<td valign="top" style="border:none; padding:2px;">郵便番号<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;"><input type="text" name="lecture_zip1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['lecture_zip1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											−
											<input type="text" name="lecture_zip2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['lecture_zip2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											&nbsp;&nbsp;<span class="fc-red">半角数字</span> <br>（例：101-8355） </td>
									</tr>

									<tr>
										<td style="border:none; padding:2px;">都道府県<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;"><select name="lecture_prefecture">

												<option value="">選択してください。</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?>												<option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == @ $this->_tpl_vars['data']['lecture_prefecture']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select>
										</td>

									</tr>
									<tr>
										<td nowrap valign="top" style="border:none; padding:2px;">市区町村以下<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;"><input type="text" name="lecture_address" size="45" value="<?php if (@ $this->_tpl_vars['data']['lecture_address']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"></td>
									</tr>
								</table>

							</td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>会場<br>電話番号<span class="fc-red">*</span></strong></td>
							<td class="text2"><input type="text" name="lecture_tel1" size="6" value="<?php if (@ $this->_tpl_vars['data']['lecture_tel1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								−
								<input type="text" name="lecture_tel2" size="4" value="<?php if (@ $this->_tpl_vars['data']['lecture_tel2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								−
								<input type="text" name="lecture_tel3" size="4" value="<?php if (@ $this->_tpl_vars['data']['lecture_tel3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

								&nbsp;&nbsp;<span class="fc-red">半角数字</span></td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>対象<span class="fc-red">*</span></strong></td>
							<td class="text2"><select name="object_select">
												<option value="">選択してください。</option>
<?php $_from = $this->_tpl_vars['taisyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_taisyou'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_taisyou']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_taisyou']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_taisyou']['iteration']; ?>
"<?php if ($this->_foreach['loop_taisyou']['iteration'] == @ $this->_tpl_vars['data']['object_select']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?></select><input type="text" name="object_text" size="40" value="<?php if (@ $this->_tpl_vars['data']['object_text']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>（例：高校 2年生、一般消費者 30〜50代）
								<p class="caution"><!--※学生や生徒が対象の講演の場合、その学年もご記入ください。<br>※一般消費者が対象の講演の場合、その年齢層もご記入ください。<br>
※消費生活相談員の方は、「相談員」を選択してください。選択肢の横には入力不要です。<br>-->
※選択肢のどれにもあてはまらない場合は、「その他」を選択し、選択肢の横に具体的にご記入ください。</p>

							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>受講予定人数<span class="fc-red">*</span></strong></td>
							<td class="text2"><input type="text" size="8" name="object_num" value="<?php if (@ $this->_tpl_vars['data']['object_num']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"> 人&nbsp;&nbsp;<span class="fc-red">半角数字</span></td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>テーマ<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">テーマ例をご参照のうえ、希望する講演のテーマをお選びください。<br>動画教材を使用する場合は、【動画教材使用希望】と記載しているテーマからお選びください。<br>
								<select name="themes">
									<option value="">こちらからお選びください。</option>

<?php $_from = $this->_tpl_vars['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_theme'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_theme']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
        $this->_foreach['loop_theme']['iteration']++;
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if (@ $this->_tpl_vars['data']['themes'] == ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
								</select><br><br>
								その他をご希望の方は下記へご希望の講演内容をご記入ください。<br>
								<textarea cols="40" rows="3" name="theme_text"><?php if (@ $this->_tpl_vars['data']['theme_text']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['theme_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea>
							</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>ビデオ<span class="fc-red">*</span></strong></td>

							<td valign="top" class="text2">講演会においてビデオ上映のご希望があれば「あり」をお選びください。動画教材をお申し込みの場合は「なし」をお選びください。<br>
								&nbsp;<br>
								
								<input type="radio" name="video" value="1"<?php if (@ $this->_tpl_vars['data']['video'] == '1'): ?> checked<?php endif; ?>>&nbsp;あり&nbsp;&nbsp;&nbsp;&nbsp;

								<input type="radio" name="video" value="0"<?php if (@ $this->_tpl_vars['data']['video'] == '0'): ?> checked<?php endif; ?>>&nbsp;なし<br>
								&nbsp;<br>

							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>資料送付先<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">
								講演資料の必要部数をご記入ください。動画教材をお申し込みの方は、参考資料（<a href="https://www.sonpo.or.jp/report/publish/bousai/trf_0002.html" target="_blank">こちら</a>）が必要な場合、ご記入ください。<br><br>
								必要部数<br>
								&nbsp;&nbsp;&nbsp;&nbsp;	<input type="text" name="copy" size="5" value="<?php if (@ $this->_tpl_vars['data']['copy']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"> 部&nbsp;&nbsp;半角数字<br>

								資料送付先<br>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="receiver_address" value="host"<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'host'): ?> checked<?php endif; ?>> 主催者<br>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="receiver_address" value="venue"<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'venue'): ?> checked<?php endif; ?>> 会場<br>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="receiver_address" value="other"<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'other'): ?> checked<?php endif; ?>> その他&nbsp;&nbsp;送付先住所&nbsp;&nbsp;<input type="text" name="receiver_text" size="35" value="<?php if (@ $this->_tpl_vars['data']['receiver_text']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['receiver_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								

							</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>パソコンおよびプロジェクターの使用<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">
								<input type="radio" name="use_pcprj" value="1"<?php if (@ $this->_tpl_vars['data']['use_pcprj'] == '1'): ?> checked<?php endif; ?>> 使用可能<br>
								<input type="radio" name="use_pcprj" value="2"<?php if (@ $this->_tpl_vars['data']['use_pcprj'] == '2'): ?> checked<?php endif; ?>> 使用不可能
							</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>本制度・動画教材の<br>ご利用経験<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">
								<span class="fc-red">*</span>

								<input type="radio" name="exp" value="1"<?php if (@ $this->_tpl_vars['data']['exp'] == '1'): ?> checked<?php endif; ?>>あり&nbsp;&nbsp;&nbsp;&nbsp;

								<input type="radio" name="exp" value="0"<?php if (@ $this->_tpl_vars['data']['exp'] == '0'): ?> checked<?php endif; ?>> なし <br>
								&nbsp;<br>
								前回は
								<input type="text" size="4" maxlength="4" name="use_year" value="<?php if (@ $this->_tpl_vars['data']['use_year']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"> 年 
								<select name="use_month">

								<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['use_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
								</select> 月 頃&nbsp;&nbsp;(年は西暦の４桁を半角数字)

							</td>
						</tr>
					</table>
					<br>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">
						<tr>
							<td class="gray01"><strong>その他連絡事項等ございましたら、ご記入ください。</strong></td>

						</tr>
						<tr>
							<td><textarea cols="60" rows="5" name="connection" style="width:100%"><?php if (@ $this->_tpl_vars['data']['connection']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['connection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea></td>
						</tr>
					</table>
				</div>
				<div class="contentBlock1">
					<div class="clearfix text2">
						<input type="button" value="&nbsp;&nbsp;戻る&nbsp;&nbsp;" onClick="document.form03.submit();">
						&nbsp;&nbsp;
						<input type="submit" value="&nbsp;&nbsp;確認画面へ&nbsp;&nbsp;"><input type="hidden" name="mode" value="preview"><input type="hidden" name="token" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
					</div>
				</div>
				</form>
<form name="form03" action="form.php" method="POST">
<input type="hidden" name="mode" value="form1">
<input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>
					<!-- //講師派遣のご案内 -->


				<div class="lineCF"></div>

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