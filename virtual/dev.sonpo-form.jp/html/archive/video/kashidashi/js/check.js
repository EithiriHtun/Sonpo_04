<!--
function view_point(){

	if(navigator.appName.charAt(0)!="N"){
		var TF = document.reportform;
		for(k=0;k<13;k++){
			TF.elements[k].style.textAlign="right"
		}
		TF.copies.style.textAlign="right";
		TF.postage.style.textAlign="right";
	}
}

function pre_check(TC){

	var TF = document.videoform;
	var TotalCnt = TC;
	var videoCnt = 0;

	// ビデオ申し込み本数チェック
	for(l=0;l<TotalCnt;l++){
		if(TF.elements['videoNo[]'][l].checked){
			videoCnt++;
		}
	}
	if(videoCnt > 4){
		alert("貸し出し希望ビデオが "+videoCnt+" 本選択されています。\n一度に貸し出しできる本数は４本までです。");
		TF.elements['videoNo[]'][0].focus();
		return false;
	}
	if(videoCnt == 0){
		alert("貸し出し希望ビデオが選択されていません。");
		TF.elements['videoNo[]'][0].focus();
		return false;
	}
	// 貸し出し期間のチェック
	var datechk = 0;
	var now = new Date();

	to_day = now.getDate();
	to_month = now.getMonth() + 1;
	to_year = now.getYear();
	if(to_year < 1900){
		to_year += 1900;
	}
// alert(datechk);

	if(TF.syear.value < to_year){
		datechk = 1;
	} else {
		if(TF.syear.value == to_year && TF.smonth.value < to_month){
			datechk = 1;
		} else {
			if(TF.smonth.value == to_month && TF.sday.value < to_day){
				datechk = 1;
			}
		}
	}
	if(datechk == 1){
		alert("借用期間の開始日が適正でありません。ご確認下さい。");
		TF.syear.focus();
		return false;
	}

	datechk = 0;

	if(TF.eyear.value < to_year){
		datechk = 1;
	} else {
		if(TF.eyear.value == to_year && TF.emonth.value < to_month){
			datechk = 1;
		} else {
			if(TF.emonth.value == to_month && TF.emonth.value == to_month){
				if(TF.eday.value < to_day){
					datechk = 1;
				}
			}
		}
	}
	if(datechk == 1){
		alert("借用期間の終了日が適正でありません。ご確認下さい。");
		TF.eyear.focus();
		return false;
	}
	// 差をチェック
	sttime = new Date( TF.syear.value,TF.smonth.value -1,TF.sday.value );
	edtime = new Date( TF.eyear.value,TF.emonth.value -1,TF.eday.value );
	timeDiff = edtime.getTime()-sttime.getTime();
//alert(sttime+"   "+edtime);
	dayDiff = Math.floor(timeDiff / (1000*60*60*24));
	if(dayDiff <= 0){
//alert(sttime+"   "+edtime);
		alert("借用期間に問題があります。ご確認下さい。");
		TF.syear.focus();
		return false;
	} else {
		if(dayDiff > 7){
			alert("期間は原則1週間です。\n1週間を越える場合は申し込み後、管轄支部までご相談ください。");
		}
	}

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
		alert("申込者：都道府県が未選択です。\n必須項目となりますのでご選択下さい。");
		TF.prefecture.focus();
		return false;
	}
	//送付先住所
	if(TF.address.value.length == 0){
		alert("申込者：住所が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.address.focus();
		return false;
	}
	if(!half_kana_chk(TF.address.value)){
		alert("申込者：住所に半角カタカナが使用されています。\n半角カタカナは使用できません。");
		TF.address.focus();
		return false;
	}
	//あて先
	if(TF.name_dat.value.length == 0){
		alert("お名前が未入力です。\n必須項目となりますのでご入力下さい。");
		TF.name_dat.focus();
		return false;
	}
	if(!half_kana_chk(TF.name_dat.value)){
		alert("お名前に半角カタカナが使用されています。\n半角カタカナは使用できません。");
		TF.name_dat.focus();
		return false;
	}
	// フリガナ
	if(!full_kana_chk(TF.name_kana.value)){
		alert("フリガナに全角カタカナ以外が使用されています。\n全角カタカナで入力してください。");
		TF.name_kana.focus();
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
	// Fax番号
	if(!decimal_chk(TF.fax1.value)){
		alert("FAX番号(市外局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.fax1.focus();
		return false;
	}
	if(!decimal_chk(TF.fax2.value)){
		alert("FAX番号(市内局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.fax2.focus();
		return false;
	}
	if(!decimal_chk(TF.fax3.value)){
		alert("FAX番号(個人番号)が半角数字以外で入力されています。\n正しくご入力下さい。");
		TF.fax3.focus();
		return false;
	}
	// メールアドレスのチェック
	if(TF.email.value.length != 0){
		if(!email_chk(TF.email.value)){
			alert("申込者：メールアドレスが正しく入力されていません。\n正しく入力してください。");
			TF.email.focus();
			return false;
		}
		if(TF.email2.value.length == 0){
			alert("申込者：確認用メールアドレスが未入力です。");
			TF.email2.focus();
			return false;
		}
		if(!email_chk(TF.email2.value)){
			alert("申込者：確認用メールアドレスが正しく入力されていません。\n正しく入力してください。");
			TF.email2.focus();
			return false;
		}
		if(TF.email.value != TF.email2.value){
			alert("申込者：入力されたメールアドレスが一致していません。\n正しく入力してください。");
			TF.email.focus();
			return false;
		}
	} else {
		alert("申込者：メールアドレスが未入力です。");
		TF.email.focus();
		return false;
	}

	if(TF.email.value != TF.email2.value){
		alert("申込者：入力されたメールアドレスが一致していません。\n正しく入力してください。");
		TF.email.focus();
		return false;
	}
	
	// 貸し出し方法
	if(TF.method[0].value == null && TF.method[1].value == null){
		alert("希望貸出方法が未選択です。\n必須項目となりますのでご選択下さい。");
		TF.method[0].focus();
		return false;
	}
	if(TF.method[0].checked == true){
		if(TF.visittime[0].checked == false && TF.visittime[1].checked == false){
			alert("来訪時間が未選択です。\n必須項目となりますのでご選択下さい。");
			TF.visittime[0].focus();
			return false;
		}else{
			// 来訪日のチェック（貸し出し期間内であるか）
			rhtime = new Date( TF.syear.value, TF.month_1.value -1, TF.day_1.value );
			if( rhtime.getTime() < sttime.getTime() || rhtime.getTime() > edtime.getTime() ){
				alert("希望訪問日は借用期間内になるようご入力ください。");
				TF.month_1.focus();
				return false;
			} else {
				if(rhtime.getTime() != sttime.getTime() ){
					alert("貸出期間の開始日を希望来訪日に変更します。");
					TF.smonth.selectedIndex = TF.month_1.value - 1;
					TF.sday.selectedIndex = TF.day_1.value - 1;
					chgEndDay();
				}
			}
		}
	}

	if(TF.method[2].checked == true){
		// 送付先のチェック
		// 郵便番号(半角数字チェック)
		if(TF.szipcode1.value.length == 0){
			alert("送付先：郵便番号が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.szipcode1.focus();
			return false;
		}
		if(!decimal_chk(TF.szipcode1.value)){
			alert("送付先：郵便番号が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.szipcode1.focus();
			return false;
		}
		if(TF.szipcode2.value.length == 0){
			alert("送付先：郵便番号が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.szipcode2.focus();
			return false;
		}
		if(!decimal_chk(TF.szipcode2.value)){
			alert("送付先：郵便番号が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.szipcode2.focus();
			return false;
		}
		//都道府県
		if(TF.sprefecture.value == ''){
			alert("送付先：都道府県が未選択です。\n必須項目となりますのでご選択下さい。");
			TF.sprefecture.focus();
			return false;
		}
		//送付先住所
		if(TF.saddress.value.length == 0){
			alert("送付先：住所が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.saddress.focus();
			return false;
		}
		if(!half_kana_chk(TF.saddress.value)){
			alert("送付先：住所に半角カタカナが使用されています。\n半角カタカナは使用できません。");
			TF.saddress.focus();
			return false;
		}
		//あて先
		if(TF.sname_dat.value.length == 0){
			alert("送付先：あて先が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.sname_dat.focus();
			return false;
		}
		if(!half_kana_chk(TF.sname_dat.value)){
			alert("送付先：あて先に半角カタカナが使用されています。\n半角カタカナは使用できません。");
			TF.sname_dat.focus();
			return false;
		}
		// フリガナ
		if(!full_kana_chk(TF.sname_kana.value)){
			alert("送付先：フリガナに全角カタカナ以外が使用されています。\n全角カタカナで入力してください。");
			TF.sname_kana.focus();
			return false;
		}
		// 電話番号
		if(TF.stel1.value.length == 0){
			alert("送付先：電話番号(市外局番)が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.stel1.focus();
			return false;
		}
		if(!decimal_chk(TF.stel1.value)){
			alert("送付先：電話番号(市外局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.stel1.focus();
			return false;
		}
		if(TF.stel2.value.length == 0){
			alert("送付先：電話番号(市内局番)が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.stel2.focus();
			return false;
		}
		if(!decimal_chk(TF.stel2.value)){
			alert("送付先：電話番号(市内局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.stel2.focus();
			return false;
		}
		if(TF.stel3.value.length == 0){
			alert("送付先：電話番号(個人番号)が未入力です。\n必須項目となりますのでご入力下さい。");
			TF.stel3.focus();
			return false;
		}
		if(!decimal_chk(TF.stel3.value)){
			alert("送付先：電話番号(個人番号)が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.stel3.focus();
			return false;
		}
		// Fax番号
		if(!decimal_chk(TF.sfax1.value)){
			alert("FAX番号(市外局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.sfax1.focus();
			return false;
		}
		if(!decimal_chk(TF.sfax2.value)){
			alert("FAX番号(市内局番)が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.sfax2.focus();
			return false;
		}
		if(!decimal_chk(TF.sfax3.value)){
			alert("FAX番号(個人番号)が半角数字以外で入力されています。\n正しくご入力下さい。");
			TF.sfax3.focus();
			return false;
		}
		// メールアドレスのチェック
		if(TF.semail.value != ''){
			if(!email_chk(TF.semail.value)){
				alert("送付先：メールアドレスが正しく入力されていません。\n正しく入力してください。");
				TF.semail.focus();
				return false;
			}
			if(TF.semail2.value.length == 0){
				alert("送付先：確認用メールアドレスが未入力です。");
				TF.semail2.focus();
				return false;
			}
			if(!email_chk(TF.semail2.value)){
				alert("送付先：確認用メールアドレスが正しく入力されていません。\n正しく入力してください。");
				TF.semail2.focus();
				return false;
			}
			if(TF.semail.value != TF.semail2.value){
				alert("送付先：入力されたメールアドレスが一致していません。\n正しく入力してください。");
				TF.semail.focus();
				return false;
			}
		} else {
			alert("送付先：メールアドレスが未入力です。");
			TF.semail.focus();
			return false;
		}
		if(TF.semail.value != TF.semail2.value){
			alert("送付先：入力されたメールアドレスが一致していません。\n正しく入力してください。");
			TF.semail.focus();
			return false;
		}
	}
	return true;
}

function chk_amount(TC){
	var TF = document.videoform;
	var TotalCnt = TC;
	var videoCnt = 0;

	// ビデオ申し込み本数チェック
	for(l=0;l<TotalCnt;l++){
		if(TF.elements['videoNo[]'][l].checked){
			videoCnt++;
			if(videoCnt > 4){
				alert("貸し出し希望ビデオが "+videoCnt+" 本選択されています。\n一度に貸し出しできる本数は４本までです。");
				TF.elements['videoNo[]'][l].checked = false;
				TF.elements['videoNo[]'][l].focus();
				return false;
			}
		}
	}
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
			TF.month_1.options.selectedIndex=i;
		}
	}
	for(i=0;i<TF.sday.options.length;i++){
		if(TF.sday.options[i].value == sday){
			TF.day_1.options.selectedIndex=i;
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
		TF.day_1.selectedIndex = sday;
	}
	TF.sday.length = lastday;
	TF.day_1.length = lastday;
	for (j = dayCnt + 1;j <= lastday;j++) {
		TF.sday.options[j - 1].text = j;
		TF.day_1.options[j - 1].text = j;
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
	var rmonth = TF.month_1.value;
	var endMonthArr = new Array("","31","28","31","30","31","30","31","31","30","31","30","31");

//	手抜き閏年判別
	if (((ryear % 4 == 0) && (ryear % 100 != 0)) || (ryear % 400 == 0)){
		endMonthArr[2] = 29;
	}

	var lastday = endMonthArr[rmonth];
	var dayCnt = TF.day_1.length;

	if (lastday - 1 < TF.day_1.selectedIndex) {
		TF.day_1.selectedIndex = eday;
	}
	TF.day_1.length = lastday;
	for (j = dayCnt + 1;j <= lastday;j++) {
		TF.day_1.options[j - 1].text = j;
	}
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
		if((vArdatas.charCodeAt(i) >= 12542) || (vArdatas.charCodeAt(i) <= 12449)){
			return false;
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
	TF.visittime[0].disabled = false;
	TF.visittime[1].disabled = false;
	TF.addchk[0].disabled = false;
	TF.addchk[1].disabled = false;

}

function open_method1(){
	var TF = document.videoform;

	TF.month_1.disabled = false;
	TF.day_1.disabled = false;
	TF.visittime[0].disabled = false;
	TF.visittime[1].disabled = false;
	TF.addchk[0].disabled = true;
	TF.addchk[1].disabled = true;
}

function open_method2(){
	var TF = document.videoform;

	TF.month_1.disabled = true;
	TF.day_1.disabled = true;
	TF.visittime[0].disabled = true;
	TF.visittime[1].disabled = true;
	TF.addchk[0].disabled = false;
	TF.addchk[1].disabled = false;
}

function close_soufu(){
	var TF = document.videoform;

	TF.month_1.disabled = false;
	TF.day_1.disabled = false;
	TF.visittime[0].disabled = false;
	TF.visittime[1].disabled = false;
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
	TF.sfax1.disabled = true;
	TF.sfax2.disabled = true;
	TF.sfax3.disabled = true;
	TF.semail.disabled = true;
	TF.semail2.disabled = true;
}

function close_soufu2(){
	var TF = document.videoform;

	TF.month_1.disabled = true;
	TF.day_1.disabled = true;
	TF.visittime[0].disabled = true;
	TF.visittime[1].disabled = true;
	TF.szipcode1.disabled = true;
	TF.szipcode2.disabled = true;
	TF.sprefecture.disabled = true;
	TF.saddress.disabled = true;
	TF.sname_dat.disabled = true;
	TF.sname_kana.disabled = true;
	TF.stel1.disabled = true;
	TF.stel2.disabled = true;
	TF.stel3.disabled = true;
	TF.sfax1.disabled = true;
	TF.sfax2.disabled = true;
	TF.sfax3.disabled = true;
	TF.semail.disabled = true;
	TF.semail2.disabled = true;
}

function open_soufu(){
	var TF = document.videoform;

	TF.month_1.disabled = true;
	TF.day_1.disabled = true;
	TF.visittime[0].disabled = true;
	TF.visittime[1].disabled = true;
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
	TF.visittime[0].disabled = true;
	TF.visittime[1].disabled = true;
	TF.szipcode1.disabled = false;
	TF.szipcode2.disabled = false;
	TF.sprefecture.disabled = false;
	TF.saddress.disabled = false;
	TF.sname_dat.disabled = false;
	TF.sname_kana.disabled = false;
	TF.stel1.disabled = false;
	TF.stel2.disabled = false;
	TF.stel3.disabled = false;
	TF.sfax1.disabled = false;
	TF.sfax2.disabled = false;
	TF.sfax3.disabled = false;
	TF.semail.disabled = false;
	TF.semail2.disabled = false;
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
