<?php /* Smarty version 2.6.9, created on 2022-03-08 16:27:12
         compiled from form2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form2.html', 652, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>����»���ݸ����� - SONPO | ����Ω������ �� �ֻ��ɸ��Τ����� �� »���ݸ��ֱ��ư�趵����ѤΤ���������</title>
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

// »���ݸ��ֱ�����ϥե����ࣲ�ѡ����顼�����å�
function pre_chk_2(){

	var $TF = document.form02;

	// �����������դ��ƤΥ����å�
	var localDate = new Date();
	localYear = localDate.getFullYear();
	localMonth = localDate.getMonth() + 1;
	localDay = localDate.getDate();
	// ������������˾
	var firstYear = $TF.year_1[$TF.year_1.selectedIndex].value;
	var firstMonth = $TF.month_1[$TF.month_1.selectedIndex].value;
	var firstDay = $TF.day_1[$TF.day_1.selectedIndex].value;
	var firstHourFrom = $TF.hour_from_1[$TF.hour_from_1.selectedIndex].value;
	var firstMinFrom = $TF.min_from_1[$TF.min_from_1.selectedIndex].value;
	var firstHourTo = $TF.hour_to_1[$TF.hour_to_1.selectedIndex].value;
	var firstMinTo = $TF.min_to_1[$TF.min_to_1.selectedIndex].value;
	// �������������˾
	var secondYear = $TF.year_2[$TF.year_2.selectedIndex].value;
	var secondMonth = $TF.month_2[$TF.month_2.selectedIndex].value;
	var secondDay = $TF.day_2[$TF.day_2.selectedIndex].value;
	var secondHourFrom = $TF.hour_from_2[$TF.hour_from_2.selectedIndex].value;
	var secondMinFrom = $TF.min_from_2[$TF.min_from_2.selectedIndex].value;
	var secondHourTo = $TF.hour_to_2[$TF.hour_to_2.selectedIndex].value;
	var secondMinTo = $TF.min_to_2[$TF.min_to_2.selectedIndex].value;

	if(firstYear == ""){
		alert("�裱��˾�γ�������ǯ�����򤵤�Ƥ��ޤ���\\n��˾ǯ�����򤷤Ƥ���������");
		$TF.year_1.focus();
		return false;
	}
	if(firstMonth == ""){
		alert("�裱��˾�γ������η���򤵤�Ƥ��ޤ���\\n��˾������򤷤Ƥ���������");
		$TF.month_1.focus();
		return false;
	}
	if(firstDay == ""){
		alert("�裱��˾�γ��������������򤵤�Ƥ��ޤ���\\n��˾�������򤷤Ƥ���������");
		$TF.day_1.focus();
		return false;
	}
	if(firstHourFrom == ""){
		alert("�裱��˾�γ������γ��ϻ��֤����򤵤�Ƥ��ޤ���\\n���ϻ��֤����򤷤Ƥ���������");
		$TF.hour_from_1.focus();
		return false;
	}
	if(firstMinFrom == ""){
		alert("�裱��˾�γ������γ��ϻ��֤����򤵤�Ƥ��ޤ���\\n���ϻ��֤����򤷤Ƥ���������");
		$TF.min_from_1.focus();
		return false;
	}
	if(firstHourTo == ""){
		alert("�裱��˾�γ������ν�λ���֤����򤵤�Ƥ��ޤ���\\n��λ���֤����򤷤Ƥ���������");
		$TF.hour_to_1.focus();
		return false;
	}
	if(firstMinTo == ""){
		alert("�裱��˾�γ������ν�λ���֤����򤵤�Ƥ��ޤ���\\n��λ���֤����򤷤Ƥ���������");
		$TF.min_to_1.focus();
		return false;
	}
	// ���դ�¸�ߥ����å�
	if(!dateValueChek(firstYear, firstMonth, firstDay)){
		alert("�裱��˾�γ�������¸�ߤ��ʤ����ˤ������򤵤�Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
		$TF.day_1.focus();
		return false;
	}

	if(firstYear == localYear){
		// ��ǯ�ξ��ν���
		if(firstMonth < localMonth){
			alert("�裱��˾�γ��������������Ť����դ����ꤵ��Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
			$TF.month_1.focus();
			return false;
		}
		if(firstMonth == localMonth){
			if(firstDay < localDay){
				alert("�裱��˾�γ��������������Ť����դ����ꤵ��Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
				$TF.day_1.focus();
				return false;
			}
			if(firstDay == localDay){
				alert("�裱��˾�γ����������������ꤵ��Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
				$TF.day_1.focus();
				return false;
			}
		}
	}
	if((firstHourFrom == firstHourTo) && (firstMinFrom == firstMinTo)){
		alert("�裱��˾�γ������γ��ϻ���Ƚ�λ���郎Ʊ���Ǥ���\\n�⤦���ٻ��֤򤴳�ǧ�Τ��������򤷤Ƥ���������");
		$TF.hour_from_1.focus();
		return false;
	}
	var timeCalc1 = (firstHourFrom * 60) + parseInt(firstMinFrom, 10);
	var timeCalc2 = (firstHourTo * 60) + parseInt(firstMinTo, 10);

	if((timeCalc2 - timeCalc1) < 50){
		alert("�裱��˾�γ������ֱ�ͽ����֤�50ʬ�ʲ��Ǥ���\\n�⤦���ٻ��֤򤴳�ǧ�Τ��������򤷤Ƥ���������");
		$TF.hour_from_1.focus();
		return false;
	}

	// ��˾�������������˾�Υ����å�
	// ���Ƥ������󤬶���ξ��������˾̵����Ƚ��
	if((secondYear != "") || (secondMonth != "") || (secondDay != "") || (secondHourFrom != "") || (secondMinFrom != "") || (secondHourTo != "") || (secondMinTo != "")){

		if(secondYear == ""){
			alert("�裲��˾�γ�������ǯ�����򤵤�Ƥ��ޤ���\\n��˾ǯ�����򤷤Ƥ���������\\n��˾����ʤ����϶�������򤷤Ƥ���������");
			$TF.year_2.focus();
			return false;
		}
		if(secondMonth == ""){
			alert("�裲��˾�γ������η���򤵤�Ƥ��ޤ���\\n��˾������򤷤Ƥ���������\\n��˾����ʤ����϶�������򤷤Ƥ���������");
			$TF.month_2.focus();
			return false;
		}
		if(secondDay == ""){
			alert("�裲��˾�γ��������������򤵤�Ƥ��ޤ���\\n��˾�������򤷤Ƥ���������\\n��˾����ʤ����϶�������򤷤Ƥ���������");
			$TF.day_2.focus();
			return false;
		}
		if(secondHourFrom == ""){
			alert("�裲��˾�γ������γ��ϻ��֤����򤵤�Ƥ��ޤ���\\n���ϻ��֤����򤷤Ƥ���������\\n��˾����ʤ����϶�������򤷤Ƥ���������");
			$TF.hour_from_2.focus();
			return false;
		}
		if(secondMinFrom == ""){
			alert("�裲��˾�γ������γ��ϻ��֤����򤵤�Ƥ��ޤ���\\n���ϻ��֤����򤷤Ƥ���������\\n��˾����ʤ����϶�������򤷤Ƥ���������");
			$TF.min_from_2.focus();
			return false;
		}
		if(secondHourTo == ""){
			alert("�裲��˾�γ������ν�λ���֤����򤵤�Ƥ��ޤ���\\n��λ���֤����򤷤Ƥ���������\\n��˾����ʤ����϶�������򤷤Ƥ���������");
			$TF.hour_to_2.focus();
			return false;
		}
		if(secondMinTo == ""){
			alert("�裲��˾�γ������ν�λ���֤����򤵤�Ƥ��ޤ���\\n��λ���֤����򤷤Ƥ���������\\n��˾����ʤ����϶�������򤷤Ƥ���������");
			$TF.min_to_2.focus();
			return false;
		}
		// ���դ�¸�ߥ����å�
		if(!dateValueChek(secondYear, secondMonth, secondDay)){
			alert("�裲��˾�γ�������¸�ߤ��ʤ����ˤ������򤵤�Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
			$TF.day_2.focus();
			return false;
		}

		if(secondYear == localYear){
			// ��ǯ�ξ��ν���
			if(secondMonth < localMonth){
				alert("�裲��˾�γ��������������Ť����դ����ꤵ��Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
				$TF.month_2.focus();
				return false;
			}
			if(secondMonth == localMonth){
				if(secondDay < localDay){
					alert("�裲��˾�γ��������������Ť����դ����ꤵ��Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
					$TF.day_2.focus();
					return false;
				}
				if(secondDay == localDay){
					alert("�裲��˾�γ����������������ꤵ��Ƥ��ޤ���\\n�⤦���ٴ�˾ǯ�����򤴳�ǧ�Τ��������򤷤Ƥ���������");
					$TF.day_2.focus();
					return false;
				}
			}
		}
		if((secondHourFrom == secondHourTo) && (secondMinFrom == secondMinTo)){
			alert("�裲��˾�γ������γ��ϻ���Ƚ�λ���郎Ʊ���Ǥ���\\n�⤦���ٻ��֤򤴳�ǧ�Τ��������򤷤Ƥ���������");
			$TF.hour_from_2.focus();
			return false;
		}
		timeCalc1 = (secondHourFrom * 60) + parseInt(secondMinFrom, 10);
		timeCalc2 = (secondHourTo * 60) + parseInt(secondMinTo, 10);

		if((timeCalc2 - timeCalc1) < 50){
			alert("�裲��˾�γ������ֱ�ͽ����֤�50ʬ�ʲ��Ǥ���\\n�⤦���ٻ��֤򤴳�ǧ�Τ��������򤷤Ƥ���������");
			$TF.hour_from_2.focus();
			return false;
		}
	}


	// �ֱ鳫��̾�Υ����å�
	if($TF.lecture_hall.value.length == 0){
		alert("���̾��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.lecture_hall.focus();
		return false;
	}
	if(!half_kana_chk($TF.lecture_hall.value)){
		alert("���̾��Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.lecture_hall.focus();
		return false;
	}

	// �ֱ�����ƻ�ܸ�̾����������å�
	if($TF.lecture_prefecture.selectedIndex == 0){
		alert("������Ϥ���ƻ�ܸ�̾�����򤵤�Ƥ��ޤ���\\n�ꥹ�Ȥ������򤷤Ƥ���������");
		$TF.lecture_prefecture.focus();
		return false;
	}

	// �ֱ����Į¼�ʲ��Υ����å�
	if($TF.lecture_address.value.length == 0){
		alert("������ϤλԶ�Į¼�ʲ���̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.lecture_address.focus();
		return false;
	}
	if(!half_kana_chk($TF.lecture_address.value)){
		alert("������ϤλԶ�Į¼�ʲ���Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.lecture_address.focus();
		return false;
	}

	// �ֱ���������ֹ�Υ����å�
	if($TF.lecture_tel1.value.length == 0){
		alert("���������ֹ�(�Գ�����)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.lecture_tel1.focus();
		return false;
	}
	if(!decimal_chk($TF.lecture_tel1.value)){
		alert("���������ֹ�(�Գ�����)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.lecture_tel1.focus();
		return false;
	}
	if($TF.lecture_tel2.value.length == 0){
		alert("���������ֹ�(�������)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.lecture_tel2.focus();
		return false;
	}
	if(!decimal_chk($TF.lecture_tel2.value)){
		alert("���������ֹ�(�������)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.lecture_tel2.focus();
		return false;
	}
	if($TF.lecture_tel3.value.length == 0){
		alert("���������ֹ�(�Ŀ��ֹ�)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.lecture_tel3.focus();
		return false;
	}
	if(!decimal_chk($TF.lecture_tel3.value)){
		alert("���������ֹ�(�Ŀ��ֹ�)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.lecture_tel3.focus();
		return false;
	}

	// �ֱ��оݤΥ����å�
	//if($TF.object_text.value.length == 0){
	//	alert("�ֱ��оݤ�̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
	//	$TF.object_text.focus();
	//	return false;
	//}
	if(!half_kana_chk($TF.object_text.value)){
		alert("�оݤ�Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.object_text.focus();
		return false;
	}
	// ͽ��Ϳ��Υ����å�
	if($TF.object_num.value.length == 0){
		alert("����ͽ��Ϳ���̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
		$TF.object_num.focus();
		return false;
	}
	if(!decimal_chk($TF.object_num.value)){
		alert("����ͽ��Ϳ���Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
		$TF.object_num.focus();
		return false;
	}

	// �ֱ�ơ��ޤΥ����å�
	if($TF.themes.value == ""){
		alert("�ơ��ޤ����򤵤�Ƥ��ޤ���\\n�ꥹ�Ȥ������򤷤Ƥ���������");
		$TF.themes.focus();
		return false;
	}
	if($TF.themes.selectedIndex == 0){
		alert("�ơ��ޤ����򤵤�Ƥ��ޤ���\\n�ꥹ�Ȥ������򤷤Ƥ���������");
		$TF.themes.focus();
		return false;
	}
	if(($TF.theme_text.value.length == 0) && ($TF.themes.options[$TF.themes.selectedIndex].value == 99)){
		alert("�ơ��ޤˤ���¾�����򤵤�Ƥ��ޤ���\\n������˥ơ��ޤ����Ϥ��Ƥ���������");
		$TF.theme_text.focus();
		return false;
	}
	if(!half_kana_chk($TF.theme_text.value)){
		alert("�ơ��ޤΤ���¾�������Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.theme_text.focus();
		return false;
	}

	// �ӥǥ��߽ФΥ����å�
	if(!(($TF.video[0].checked) || ($TF.video[1].checked))){
		alert("�ӥǥ��߽Фδ�˾�Τ��꡿�ʤ������򤷤Ƥ���������");
		$TF.video[0].focus();
		return false;
	}
/*
	if($TF.video[0].checked){
		if($TF.video_name.selectedIndex == 0){
			alert("�߽д�˾�Υӥǥ������ȥ뤬���򤵤�Ƥ��ޤ���\\n�ꥹ�Ȥ������򤷤Ƥ���������");
			$TF.video_name.focus();
			return false;
		}
	}
	// ���մ�˾�����Υ����å�
	if(!(($TF.distribution_data[0].checked) || ($TF.distribution_data[1].checked))){
		alert("���մ�˾�����Τ��꡿�ʤ������򤷤Ƥ���������");
		$TF.distribution_data[0].focus();
		return false;
	}
	if($TF.distribution_data[0].checked){
		// ���մ�˾���������ȥ�
		if($TF.handout.selectedIndex == 0){
			alert("���մ�˾�����Υ����ȥ뤬���򤵤�Ƥ��ޤ���\\n�ꥹ�Ȥ������򤷤Ƥ���������");
			$TF.handout.focus();
			return false;
		}
*/
		// ���մ�˾����
		if($TF.copy.value.length == 0){
			alert("���մ�˾����������̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
			$TF.copy.focus();
			return false;
		}
		if(!decimal_chk($TF.copy.value)){
			alert("���մ�˾����������Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ��������Ϥ��Ƥ���������");
			$TF.copy.focus();
			return false;
		}
		// ���մ�˾����������
		if(!(($TF.receiver_address[0].checked) || ($TF.receiver_address[1].checked) || ($TF.receiver_address[2].checked))){
			alert("���մ�˾����������������򤷤Ƥ���������");
			$TF.receiver_address[0].focus();
			return false;
		}
		if($TF.receiver_address[2].checked){
			if($TF.receiver_text.value.length == 0){
				alert("���մ�˾�����������褬̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
				$TF.receiver_text.focus();
				return false;
			}
			if(!half_kana_chk($TF.receiver_text.value)){
				alert("���մ�˾�������������Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
				$TF.receiver_text.focus();
				return false;
			}
		}
/*
	} else {
		// ��˾̵���ʤΤ������󥯥ꥢ
		$TF.copy.value = "";
		$TF.receiver_text.value = "";
	}
*/

	// 
	if(!(($TF.use_pcprj[0].checked) || ($TF.use_pcprj[1].checked))){
		alert("�ѥ����󤪤�ӥץ������������λ��Ѳ�ǽ���Բ�ǽ�����򤷤Ƥ���������");
		$TF.use_pcprj[0].focus();
		return false;
	}


	// �����٤Τ����ѷи��Υ����å�
	if(!(($TF.exp[0].checked) || ($TF.exp[1].checked))){
		alert("�����١�ư�趵��Τ����ѷи��Τ��꡿�ʤ������򤷤Ƥ���������");
		$TF.exp[0].focus();
		return false;
	}
	if($TF.exp[0].checked){
/*
		if($TF.use_year.value.length == 0){
			alert("�����٤Τ����ѷи�(ǯ)��̤���ϤǤ���\\nɬ�ܹ��ܤȤʤ�ޤ��Τ����Ϥ��Ƥ���������");
			$TF.use_year.focus();
			return false;
		}
*/
		if(!decimal_chk($TF.use_year.value)){
			alert("�����٤Τ����ѷи�(ǯ)��Ⱦ�ѿ����ʳ������Ѥ���Ƥ��ޤ���\\nȾ�ѿ�������������Ϥ��Ƥ���������");
			$TF.use_year.focus();
			return false;
		}
/*
		if($TF.use_month.selectedIndex == 0){
			alert("�����٤Τ����ѷи�(��)�����򤵤�Ƥ��ޤ���\\n�ꥹ�Ȥ������򤷤Ƥ���������");
			$TF.use_month.focus();
			return false;
		}
*/
/*
		if(!half_kana_chk($TF.expTxt.value)){
			alert("�����٤Τ����ѷи�(�ֻ�̾)��Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
			$TF.expTxt.focus();
			return false;
		}
*/


	} else {
		// ��˾̵���ʤΤ������󥯥ꥢ
		$TF.use_year.value = "";
		$TF.use_month.value = "";
		$TF.expTxt.value = "";
	}

	// ����¾�Υ����å�
	if(!half_kana_chk($TF.connection.value)){
		alert("����¾Ϣ����������Ⱦ�ѥ������ʤ����Ѥ���Ƥ��ޤ���\\nȾ�ѥ������ʤϻ��ѤǤ��ޤ���");
		$TF.connection.focus();
		return false;
	}


	return true;

}

// ���������Ѥ������ǡ���
var weekT = new Array("��","��","��","��","��","��","��");

// �����λ��С�����˾��
function weekTxt01(){

	var $TF = document.form02;
	// ������������˾
	var chYear = $TF.year_1[$TF.year_1.selectedIndex].value;
	var chMonth = $TF.month_1[$TF.month_1.selectedIndex].value;
	var chDay = $TF.day_1[$TF.day_1.selectedIndex].value;

	if((chYear != \'\') && (chMonth != \'\') && (chDay != \'\')){
		var chDate = new Date(chYear*1,(chMonth-1)*1,chDay*1);
		$TF.wTx01.value = weekT[chDate.getDay()];
	}
}



// �����λ��С������˾��
function weekTxt02(){

	var $TF = document.form02;
	// �������������˾
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
					<p class="text2">����ι��ܤ�������ϡ��������ߤǤ��ޤ���ΤǤ����դ���������<br>
����Ԥξ����¾����Ū�����Ѥ����ꡢ�������󶡤��뤳�ȤϤ���ޤ���<br>���ֱ�ơ��ޡָ��̻��ΤȤ�����Ǥ�ס���ž�֤��괬���ꥹ���Ȥ�����Ǥ�פ�ư�趵��ʾܤ�����<a href="https://www.sonpo.or.jp/about/efforts/action/koushi/douga.html" target="_blank">������</a>�ˤ��ܥڡ������餪�������ߤ�����դ��Ƥ���ޤ���</p>
					<br>
					<p class="text2">��<span class="fc-red">*</span>����ɬ�ܹ��ܤǤ���
<?php if ($this->_tpl_vars['errors']): ?><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>��<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span><?php endif; ?></p>

				</div>

<form action="form.php" method="post" name="form02" autocomplete="off" onSubmit="return pre_chk_2()">
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list">
						<tr>
							<td valign="top" class="text2 gray02" nowrap><strong>��˾��������<span class="fc-red">*</span></strong></td>
							<td align="left">

								<table border="0" cellspacing="0" cellpadding="0" class="noborder text2">
									<tr>
										<td valign="top" align="left" nowrap>��1��˾<span class="fc-red">*</span></td>
										<td>
											<select name="year_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['year_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ǯ 
											<select name="month_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['month_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="day_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['day_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											&nbsp;&nbsp;<input type="text" name="wTx01" size="2" value="<?php if (@ $this->_tpl_vars['data']['wTx01']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx01'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;����<br>&nbsp;&nbsp;&nbsp;
											<select name="hour_from_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_from_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="min_from_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_from_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ʬ �� 
											<select name="hour_to_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_to_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="min_to_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_to_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ʬ
										</td>

									</tr>
									<tr>
										<td colspan="2">&nbsp;</td>
									</tr>

									<tr>
										<td valign="top" nowrap>��2��˾</td>
										<td>
											<select name="year_2" onChange="weekTxt02()">

												<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['year_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> ǯ 
											<select name="month_2" onChange="weekTxt02()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['month_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="day_2" onChange="weekTxt02()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['day_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											&nbsp;&nbsp;<input type="text" name="wTx02" size="2" value="<?php if (@ $this->_tpl_vars['data']['wTx02']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">&nbsp;����<br>&nbsp;&nbsp;&nbsp;
											<select name="hour_from_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_from_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> �� 
											<select name="min_from_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_from_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> ʬ �� 
											<select name="hour_to_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['hour_to_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="min_to_2">

												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['min_to_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ʬ
										</td>

									</tr>
								</table>
								<div>
									<p class="caution text2">�ڹֱ��Τ��������ߤξ���</p><p class="caution text2" style="padding:0;padding-left:1em;">�����Ŵ�˾���Σ��������ޤǤˤ������ߤ�����������˾�������ޤǣ�������ڤäƤ����硢�����������Ǥ��ʤ���礬����ޤ���<br>
									���ֱ���֤Ϻ��㣵��ʬ�ʾ�Ǥ��ꤤ�������ޤ���</p>
									<p class="caution text2">��ư�趵��򤪿������ߤξ���</p>
									<p class="caution text2" style="padding:0;padding-left:1em;">��ư�����Ѥ���ͽ��������򤴵�������������</p>

								</div>
							</td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>���<br>�����<span class="fc-red">*</span></strong></td>
							<td valign="top">
								<table border="0" cellspacing="0" cellpadding="2" class="noborder text2">

									<tr>
										<td valign="top" style="border:none; padding:2px;">���̾<span class="fc-red">*</span></td>

										<td style="border:none; padding:2px;" class="text2"><input type="text" name="lecture_hall" size="45" value="<?php if (@ $this->_tpl_vars['data']['lecture_hall']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"></td>
									</tr>

									<tr>
										<td valign="top" style="border:none; padding:2px;">͹���ֹ�<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;"><input type="text" name="lecture_zip1" size="3" maxlength="3" value="<?php if (@ $this->_tpl_vars['data']['lecture_zip1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											��
											<input type="text" name="lecture_zip2" size="4" maxlength="4" value="<?php if (@ $this->_tpl_vars['data']['lecture_zip2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
											&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѿ���</span> <br>���㡧101-8355�� </td>
									</tr>

									<tr>
										<td style="border:none; padding:2px;">��ƻ�ܸ�<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;"><select name="lecture_prefecture">

												<option value="">���򤷤Ƥ���������</option>
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
										<td nowrap valign="top" style="border:none; padding:2px;">�Զ�Į¼�ʲ�<span class="fc-red">*</span></td>
										<td style="border:none; padding:2px;"><input type="text" name="lecture_address" size="45" value="<?php if (@ $this->_tpl_vars['data']['lecture_address']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"></td>
									</tr>
								</table>

							</td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>���<br>�����ֹ�<span class="fc-red">*</span></strong></td>
							<td class="text2"><input type="text" name="lecture_tel1" size="6" value="<?php if (@ $this->_tpl_vars['data']['lecture_tel1']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								��
								<input type="text" name="lecture_tel2" size="4" value="<?php if (@ $this->_tpl_vars['data']['lecture_tel2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								��
								<input type="text" name="lecture_tel3" size="4" value="<?php if (@ $this->_tpl_vars['data']['lecture_tel3']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

								&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѿ���</span></td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>�о�<span class="fc-red">*</span></strong></td>
							<td class="text2"><select name="object_select">
												<option value="">���򤷤Ƥ���������</option>
<?php $_from = $this->_tpl_vars['taisyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_taisyou'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_taisyou']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_taisyou']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_taisyou']['iteration']; ?>
"<?php if ($this->_foreach['loop_taisyou']['iteration'] == @ $this->_tpl_vars['data']['object_select']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?></select><input type="text" name="object_text" size="40" value="<?php if (@ $this->_tpl_vars['data']['object_text']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><br>���㡧�⹻ 2ǯ�������̾���� 30��50���
								<p class="caution"><!--�����������̤��оݤιֱ�ξ�硢���γ�ǯ�⤴��������������<br>�����̾���Ԥ��оݤιֱ�ξ�硢����ǯ���ؤ⤴��������������<br>
�������������̰������ϡ������̰��פ����򤷤Ƥ��������������β��ˤ��������פǤ���<br>-->
�������Τɤ�ˤ⤢�ƤϤޤ�ʤ����ϡ��֤���¾�פ����򤷡������β��˶���Ū�ˤ���������������</p>

							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>����ͽ��Ϳ�<span class="fc-red">*</span></strong></td>
							<td class="text2"><input type="text" size="8" name="object_num" value="<?php if (@ $this->_tpl_vars['data']['object_num']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"> ��&nbsp;&nbsp;<span class="fc-red">Ⱦ�ѿ���</span></td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>�ơ���<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">�ơ�����򤴻��ȤΤ�������˾����ֱ�Υơ��ޤ����Ӥ���������<br>ư�趵�����Ѥ�����ϡ���ư�趵����Ѵ�˾�ۤȵ��ܤ��Ƥ���ơ��ޤ��餪���Ӥ���������<br>
								<select name="themes">
									<option value="">�����餫�餪���Ӥ���������</option>

<?php $_from = $this->_tpl_vars['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_theme'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_theme']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
        $this->_foreach['loop_theme']['iteration']++;
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if (@ $this->_tpl_vars['data']['themes'] == ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
								</select><br><br>
								����¾�򤴴�˾�����ϲ����ؤ���˾�ιֱ����Ƥ򤴵�������������<br>
								<textarea cols="40" rows="3" name="theme_text"><?php if (@ $this->_tpl_vars['data']['theme_text']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['theme_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea>
							</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>�ӥǥ�<span class="fc-red">*</span></strong></td>

							<td valign="top" class="text2">�ֱ��ˤ����ƥӥǥ���ǤΤ���˾������С֤���פ����Ӥ���������ư�趵��򤪿������ߤξ��ϡ֤ʤ��פ����Ӥ���������<br>
								&nbsp;<br>
								
								<input type="radio" name="video" value="1"<?php if (@ $this->_tpl_vars['data']['video'] == '1'): ?> checked<?php endif; ?>>&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;

								<input type="radio" name="video" value="0"<?php if (@ $this->_tpl_vars['data']['video'] == '0'): ?> checked<?php endif; ?>>&nbsp;�ʤ�<br>
								&nbsp;<br>

							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>����������<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">
								�ֱ������ɬ�������򤴵�������������ư�趵��򤪿������ߤ����ϡ����ͻ�����<a href="https://www.sonpo.or.jp/report/publish/bousai/trf_0002.html" target="_blank">������</a>�ˤ�ɬ�פʾ�硢����������������<br><br>
								ɬ������<br>
								&nbsp;&nbsp;&nbsp;&nbsp;	<input type="text" name="copy" size="5" value="<?php if (@ $this->_tpl_vars['data']['copy']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"> ��&nbsp;&nbsp;Ⱦ�ѿ���<br>

								����������<br>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="receiver_address" value="host"<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'host'): ?> checked<?php endif; ?>> ��ż�<br>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="receiver_address" value="venue"<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'venue'): ?> checked<?php endif; ?>> ���<br>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="receiver_address" value="other"<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'other'): ?> checked<?php endif; ?>> ����¾&nbsp;&nbsp;�����轻��&nbsp;&nbsp;<input type="text" name="receiver_text" size="35" value="<?php if (@ $this->_tpl_vars['data']['receiver_text']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['receiver_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
								

							</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>�ѥ����󤪤�ӥץ������������λ���<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">
								<input type="radio" name="use_pcprj" value="1"<?php if (@ $this->_tpl_vars['data']['use_pcprj'] == '1'): ?> checked<?php endif; ?>> ���Ѳ�ǽ<br>
								<input type="radio" name="use_pcprj" value="2"<?php if (@ $this->_tpl_vars['data']['use_pcprj'] == '2'): ?> checked<?php endif; ?>> �����Բ�ǽ
							</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>�����١�ư�趵���<br>�����ѷи�<span class="fc-red">*</span></strong></td>
							<td valign="top" class="text2">
								<span class="fc-red">*</span>

								<input type="radio" name="exp" value="1"<?php if (@ $this->_tpl_vars['data']['exp'] == '1'): ?> checked<?php endif; ?>>����&nbsp;&nbsp;&nbsp;&nbsp;

								<input type="radio" name="exp" value="0"<?php if (@ $this->_tpl_vars['data']['exp'] == '0'): ?> checked<?php endif; ?>> �ʤ� <br>
								&nbsp;<br>
								�����
								<input type="text" size="4" maxlength="4" name="use_year" value="<?php if (@ $this->_tpl_vars['data']['use_year']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"> ǯ 
								<select name="use_month">

								<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == @ $this->_tpl_vars['data']['use_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
								</select> �� ��&nbsp;&nbsp;(ǯ������Σ����Ⱦ�ѿ���)

							</td>
						</tr>
					</table>
					<br>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">
						<tr>
							<td class="gray01"><strong>����¾Ϣ���������������ޤ����顢����������������</strong></td>

						</tr>
						<tr>
							<td><textarea cols="60" rows="5" name="connection" style="width:100%"><?php if (@ $this->_tpl_vars['data']['connection']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['connection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></textarea></td>
						</tr>
					</table>
				</div>
				<div class="contentBlock1">
					<div class="clearfix text2">
						<input type="button" value="&nbsp;&nbsp;���&nbsp;&nbsp;" onClick="document.form03.submit();">
						&nbsp;&nbsp;
						<input type="submit" value="&nbsp;&nbsp;��ǧ���̤�&nbsp;&nbsp;"><input type="hidden" name="mode" value="preview"><input type="hidden" name="token" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
					</div>
				</div>
				</form>
<form name="form03" action="form.php" method="POST">
<input type="hidden" name="mode" value="form1">
<input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>
					<!-- //�ֻ��ɸ��Τ����� -->


				<div class="lineCF"></div>

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