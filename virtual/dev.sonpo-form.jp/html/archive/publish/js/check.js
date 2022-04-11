function pre_check(){

	var TF = document.frm1;

	datechk = 0;

	// 申込者のチェック
	// 郵便番号(半角数字チェック)
	if(TF.zipcode1.value.length == 0){
		alert("郵便番号が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.zipcode1.focus();
		return false;
	}
	if(!decimal_chk(TF.zipcode1.value)){
		alert("郵便番号が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.zipcode1.focus();
		return false;
	}
	if(TF.zipcode2.value.length == 0){
		alert("郵便番号が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.zipcode2.focus();
		return false;
	}
	if(!decimal_chk(TF.zipcode2.value)){
		alert("郵便番号が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.zipcode2.focus();
		return false;
	}
	//都道府県
	if(TF.prefecture.value == ''){
		alert("都道府県が未選択です。\n必須項目となりますのでご選択下さい。");
		TF.prefecture.focus();
		return false;
	}
	//送付先住所
	if(TF.address.value.length == 0){
		alert("住所が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.address.focus();
		return false;
	}
	if(!half_kana_chk(TF.address.value)){
		alert("住所に半角カタカナが使用されています。\n半角カタカナは使用できません。");
		TF.address.focus();
		return false;
	}

	var us=0;
	for(i=0;i<TF.user_status.length;i++){
	  if(TF.user_status[i].checked){
	    us=TF.user_status[i].value;
	  }
	}
	
    if(us==1){
		//あて先
		if(TF.name1.value.length == 0 && TF.name2.value.length == 0){
			alert("お名前が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.name1.focus();
			return false;
		}
		if(!half_kana_chk(TF.name1.value) || !half_kana_chk(TF.name2.value)){
			alert("お名前に半角カタカナが使用されています。\n半角カタカナは使用できません。");
			TF.name1.focus();
			return false;
		}
		// フリガナ
		if(!full_kana_chk(TF.kana1.value) || !full_kana_chk(TF.kana2.value)){
			alert("フリガナに全角カタカナ以外が使用されています。\n全角カタカナで入力してください。");
			TF.kana1.focus();
			return false;
		}
	}
    if(us==2){
		//あて先
		if(TF.company.value.length == 0){
			alert("法人・団体名が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.company.focus();
			return false;
		}
		if(TF.name1.value.length == 0 && TF.name2.value.length == 0){
			alert("ご担当者名が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.name1.focus();
			return false;
		}
		if(!half_kana_chk(TF.name1.value) || !half_kana_chk(TF.name2.value)){
			alert("ご担当者名に半角カタカナが使用されています。\n半角カタカナは使用できません。");
			TF.name1.focus();
			return false;
		}
		// フリガナ
		if(!full_kana_chk(TF.kana1.value) || !full_kana_chk(TF.kana2.value)){
			alert("ご担当者名フリガナに全角カタカナ以外が使用されています。\n全角カタカナで入力してください。");
			TF.kana1.focus();
			return false;
		}
	}


	// メールアドレスのチェック
	if(TF.email.value.length != 0){
		if(!email_chk(TF.email.value)){
			alert("メールアドレスが正しく入力されていません。\n正しく入力してください。");
			TF.email.focus();
			return false;
		}
		if(TF.email2.value.length == 0){
			alert("確認用メールアドレスが未入力です。");
			TF.email2.focus();
			return false;
		}
		if(!email_chk(TF.email2.value)){
			alert("確認用メールアドレスが正しく入力されていません。\n正しく入力してください。");
			TF.email2.focus();
			return false;
		}
		if(TF.email.value != TF.email2.value){
			alert("入力されたメールアドレスが一致していません。\n正しく入力してください。");
			TF.email.focus();
			return false;
		}
	} else {
		alert("メールアドレスが未入力です。");
		TF.email.focus();
		return false;
	}

	if(TF.email.value != TF.email2.value){
		alert("入力されたメールアドレスが一致していません。\n正しく入力してください。");
		TF.email.focus();
		return false;
	}
	
	// 電話番号
	if(TF.tel1.value.length == 0){
		alert("電話番号(市外局番)が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.tel1.focus();
		return false;
	}
	if(!decimal_chk(TF.tel1.value)){
		alert("電話番号(市外局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.tel1.focus();
		return false;
	}
	if(TF.tel2.value.length == 0){
		alert("電話番号(市内局番)が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.tel2.focus();
		return false;
	}
	if(!decimal_chk(TF.tel2.value)){
		alert("電話番号(市内局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.tel2.focus();
		return false;
	}
	if(TF.tel3.value.length == 0){
		alert("電話番号(個人番号)が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.tel3.focus();
		return false;
	}
	if(!decimal_chk(TF.tel3.value)){
		alert("電話番号(個人番号)が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.tel3.focus();
		return false;
	}
	return true;
}

function chgEndDay(){
	var TF = document.videoform;
	var syear = TF.syear.value;
	var smonth = TF.smonth.value;
	var sday = TF.sday.value;
//	var weekTime = 604800000;
	var weekTime = 518400000;

	edTime = new Date(syear, smonth - 1, sday);
	edTime.setTime(edTime.getTime() + weekTime);	
	edyear = edTime.getYear();
	if(edyear < 1900){
		edyear += 1900;
	}
	edmonth = edTime.getMonth() + 1;
	edday = edTime.getDate();

	for(i=0;i<TF.eyear.options.length;i++){
		if(TF.eyear.options[i].value == edyear){
			TF.eyear.options.selectedIndex=i;
		}
	}
	for(i=0;i<TF.emonth.options.length;i++){
		if(TF.emonth.options[i].value == edmonth){
			TF.emonth.options.selectedIndex=i;
		}
	}
	for(i=0;i<TF.eday.options.length;i++){
		if(TF.eday.options[i].value == edday){
			TF.eday.options.selectedIndex=i;
		}
	}
	for(i=0;i<TF.smonth.options.length;i++){
		if(TF.smonth.options[i].value == smonth){
			TF.smonth.options.selectedIndex=i;
		}
	}
	for(i=0;i<TF.sday.options.length;i++){
		if(TF.sday.options[i].value == sday){
			TF.sday.options.selectedIndex=i;
		}
	}

}

function chgEndDay1(){
	var TF = document.videoform;
	var syear = TF.syear.value;
	var smonth = TF.smonth.value;
	var sday = TF.sday.value;
	var endMonthArr = new Array("","31","28","31","30","31","30","31","31","30","31","30","31");

//	手抜き閏年判別
	if (((syear % 4 == 0) && (syear % 100 != 0)) || (syear % 400 == 0)){
		endMonthArr[2] = 29;
	}

	var lastday = endMonthArr[smonth];
	var dayCnt = TF.sday.length;

	if (lastday - 1 < TF.sday.selectedIndex) {
		sday = lastday - 1;
		TF.sday.selectedIndex = sday;
/*		TF.day_1.selectedIndex = sday;*/
	}
	TF.sday.length = lastday;
/*	TF.day_1.length = lastday;*/
	for (j = dayCnt + 1;j <= lastday;j++) {
		TF.sday.options[j - 1].text = j;
/*		TF.day_1.options[j - 1].text = j;*/
	}
}

function chgEndDay2(){
	var TF = document.videoform;
	var eyear = TF.eyear.value;
	var emonth = TF.emonth.value;
	var eday = TF.eday.value;
	var endMonthArr = new Array("","31","28","31","30","31","30","31","31","30","31","30","31");

//	手抜き閏年判別
	if (((eyear % 4 == 0) && (eyear % 100 != 0)) || (eyear % 400 == 0)){
		endMonthArr[2] = 29;
	}

	var lastday = endMonthArr[emonth];
	var dayCnt = TF.eday.length;

	if (lastday - 1 < TF.eday.selectedIndex) {
		eday = lastday - 1;
		TF.eday.selectedIndex = eday;
	}
	TF.day.length = lastday;
	for (j = dayCnt + 1;j <= lastday;j++) {
		TF.eday.options[j - 1].text = j;
	}
}

function chgEndDay3(){
	var TF = document.videoform;
	var ryear = TF.syear.value;
/*	var rmonth = TF.month_1.value;*/
	var endMonthArr = new Array("","31","28","31","30","31","30","31","31","30","31","30","31");

//	手抜き閏年判別
	if (((ryear % 4 == 0) && (ryear % 100 != 0)) || (ryear % 400 == 0)){
		endMonthArr[2] = 29;
	}

/*	var lastday = endMonthArr[rmonth];
	var dayCnt = TF.day_1.length;

	if (lastday - 1 < TF.day_1.selectedIndex) {
		TF.day_1.selectedIndex = eday;
	}
	TF.day_1.length = lastday;
	for (j = dayCnt + 1;j <= lastday;j++) {
		TF.day_1.options[j - 1].text = j;
	}*/
}

function half_kana_chk(object_value){
	//半角カタカナのチェック
	//含む場合はエラー
	var vArdatas = object_value;
	if(vArdatas.length == 0){
		return true;
	}

	var vArchk_len = vArdatas.length - 1;
	for(i=0;i<=vArchk_len;i++){
		if((vArdatas.charCodeAt(i) >= 65377) && (vArdatas.charCodeAt(i) <= 65439)){
			return false;
		}
	}
	return true;
}


function full_kana_chk(object_value){
	// 全角カナ文字以外をはじく
	var vArdatas = object_value;
	if(vArdatas.length == 0){
		return true;
	}

	var vArchk_len = vArdatas.length - 1;
	var vArchk_flg = 0;
	for(i=0;i<=vArchk_len;i++){
	  if(vArdatas.charCodeAt(i)!=32 && vArdatas.charCodeAt(i)!=12288){
		if((vArdatas.charCodeAt(i) >= 12542) || (vArdatas.charCodeAt(i) <= 12449)){
			return false;
		}
	  }
	}
	return true;
}
function decimal_chk(object_value){

	//数字のチェック
	var vArdatas = object_value;
	var vArdecimal_data = "0123456789";
	if (vArdatas.length == 0){
	      	return true;
	}
	var vArchk_len = vArdatas.length - 1;

	for(i=0;i<=vArchk_len;i++){
		if(vArdecimal_data.indexOf(vArdatas.charAt(i)) == -1){
			return false;
		}
	}

	return true;
}
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


function open_method(){
	var TF = document.videoform;

	TF.month_1.disabled = false;
	TF.day_1.disabled = false;
/*	TF.visittime[0].disabled = false;*/
/*	TF.visittime[1].disabled = false;*/
	TF.addchk[0].disabled = false;
	TF.addchk[1].disabled = false;

}

function open_method1(){
	var TF = document.videoform;

	TF.month_1.disabled = false;
	TF.day_1.disabled = false;
/*	TF.visittime[0].disabled = false;*/
/*	TF.visittime[1].disabled = false;*/
	TF.addchk[0].disabled = true;
	TF.addchk[1].disabled = true;
}

function open_method2(){
	var TF = document.videoform;

	TF.month_1.disabled = true;
	TF.day_1.disabled = true;
/*	TF.visittime[0].disabled = true;*/
/*	TF.visittime[1].disabled = true;*/
	TF.addchk[0].disabled = false;
	TF.addchk[1].disabled = false;
}

function close_soufu(){
	var TF = document.videoform;

	TF.month_1.disabled = false;
	TF.day_1.disabled = false;
/*	TF.visittime[0].disabled = false;*/
/*	TF.visittime[1].disabled = false;*/
	TF.addchk[0].disabled = true;
	TF.addchk[1].disabled = true;
	TF.szipcode1.disabled = true;
	TF.szipcode2.disabled = true;
	TF.sprefecture.disabled = true;
	TF.saddress.disabled = true;
	TF.sname_dat.disabled = true;
	TF.sname_kana.disabled = true;
	TF.stel1.disabled = true;
	TF.stel2.disabled = true;
	TF.stel3.disabled = true;
/*	TF.sfax1.disabled = true;
	TF.sfax2.disabled = true;
	TF.sfax3.disabled = true;
	TF.semail.disabled = true;
	TF.semail2.disabled = true;*/
}

function close_soufu2(){
	var TF = document.videoform;

	TF.month_1.disabled = true;
	TF.day_1.disabled = true;
/*	TF.visittime[0].disabled = true;
	TF.visittime[1].disabled = true;*/
	TF.szipcode1.disabled = true;
	TF.szipcode2.disabled = true;
	TF.sprefecture.disabled = true;
	TF.saddress.disabled = true;
	TF.sname_dat.disabled = true;
	TF.sname_kana.disabled = true;
	TF.stel1.disabled = true;
	TF.stel2.disabled = true;
	TF.stel3.disabled = true;
/*	TF.sfax1.disabled = true;
	TF.sfax2.disabled = true;
	TF.sfax3.disabled = true;
	TF.semail.disabled = true;
	TF.semail2.disabled = true;*/
}

function open_soufu(){
	var TF = document.videoform;

	TF.month_1.disabled = true;
	TF.day_1.disabled = true;
/*	TF.visittime[0].disabled = true;
	TF.visittime[1].disabled = true;*/
	TF.addchk[0].disabled = false;
	TF.addchk[1].disabled = false;
//	TF.szipcode1.disabled = false;
//	TF.szipcode2.disabled = false;
//	TF.sprefecture.disabled = false;
//	TF.saddress.disabled = false;
//	TF.sname_dat.disabled = false;
//	TF.sname_kana.disabled = false;
//	TF.stel1.disabled = false;
//	TF.stel2.disabled = false;
//	TF.stel3.disabled = false;
//	TF.sfax1.disabled = false;
//	TF.sfax2.disabled = false;
//	TF.sfax3.disabled = false;
//	TF.semail.disabled = false;
//	TF.semail2.disabled = false;
}

function open_soufu2(){
	var TF = document.videoform;

	TF.month_1.disabled = true;
	TF.day_1.disabled = true;
/*	TF.visittime[0].disabled = true;
	TF.visittime[1].disabled = true;*/
	TF.szipcode1.disabled = false;
	TF.szipcode2.disabled = false;
	TF.sprefecture.disabled = false;
	TF.saddress.disabled = false;
	TF.sname_dat.disabled = false;
	TF.sname_kana.disabled = false;
	TF.stel1.disabled = false;
	TF.stel2.disabled = false;
	TF.stel3.disabled = false;
/*	TF.sfax1.disabled = false;
	TF.sfax2.disabled = false;
	TF.sfax3.disabled = false;
	TF.semail.disabled = false;
	TF.semail2.disabled = false;*/
}

function open_all(){
	var TF = document.videoform;

	TF.method[0].disabled = false;
	TF.method[1].disabled = false;

//	TF.month_1.disabled = false;
//	TF.day_1.disabled = false;
//	TF.visittime[0].disabled = false;
//	TF.visittime[1].disabled = false;
//	TF.addchk[0].disabled = false;
//	TF.addchk[1].disabled = false;

//	TF.szipcode1.disabled = false;
//	TF.szipcode2.disabled = false;
//	TF.sprefecture.disabled = false;
//	TF.saddress.disabled = false;
//	TF.sname_dat.disabled = false;
//	TF.sname_kana.disabled = false;
//	TF.stel1.disabled = false;
//	TF.stel2.disabled = false;
//	TF.stel3.disabled = false;
//	TF.sfax1.disabled = false;
//	TF.sfax2.disabled = false;
//	TF.sfax3.disabled = false;
//	TF.semail.disabled = false;
//	TF.semail2.disabled = false;
}
