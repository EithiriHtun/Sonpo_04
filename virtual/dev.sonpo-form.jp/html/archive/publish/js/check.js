function pre_check(){

	var TF = document.frm1;

	datechk = 0;

	// �\���҂̃`�F�b�N
	// �X�֔ԍ�(���p�����`�F�b�N)
	if(TF.zipcode1.value.length == 0){
		alert("�X�֔ԍ��������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.zipcode1.focus();
		return false;
	}
	if(!decimal_chk(TF.zipcode1.value)){
		alert("�X�֔ԍ������p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
		TF.zipcode1.focus();
		return false;
	}
	if(TF.zipcode2.value.length == 0){
		alert("�X�֔ԍ��������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.zipcode2.focus();
		return false;
	}
	if(!decimal_chk(TF.zipcode2.value)){
		alert("�X�֔ԍ������p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
		TF.zipcode2.focus();
		return false;
	}
	//�s���{��
	if(TF.prefecture.value == ''){
		alert("�s���{�������I���ł��B\n�K�{���ڂƂȂ�܂��̂ł��I���������B");
		TF.prefecture.focus();
		return false;
	}
	//���t��Z��
	if(TF.address.value.length == 0){
		alert("�Z���������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.address.focus();
		return false;
	}
	if(!half_kana_chk(TF.address.value)){
		alert("�Z���ɔ��p�J�^�J�i���g�p����Ă��܂��B\n���p�J�^�J�i�͎g�p�ł��܂���B");
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
		//���Đ�
		if(TF.name1.value.length == 0 && TF.name2.value.length == 0){
			alert("�����O�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.name1.focus();
			return false;
		}
		if(!half_kana_chk(TF.name1.value) || !half_kana_chk(TF.name2.value)){
			alert("�����O�ɔ��p�J�^�J�i���g�p����Ă��܂��B\n���p�J�^�J�i�͎g�p�ł��܂���B");
			TF.name1.focus();
			return false;
		}
		// �t���K�i
		if(!full_kana_chk(TF.kana1.value) || !full_kana_chk(TF.kana2.value)){
			alert("�t���K�i�ɑS�p�J�^�J�i�ȊO���g�p����Ă��܂��B\n�S�p�J�^�J�i�œ��͂��Ă��������B");
			TF.kana1.focus();
			return false;
		}
	}
    if(us==2){
		//���Đ�
		if(TF.company.value.length == 0){
			alert("�@�l�E�c�̖��������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.company.focus();
			return false;
		}
		if(TF.name1.value.length == 0 && TF.name2.value.length == 0){
			alert("���S���Җ��������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.name1.focus();
			return false;
		}
		if(!half_kana_chk(TF.name1.value) || !half_kana_chk(TF.name2.value)){
			alert("���S���Җ��ɔ��p�J�^�J�i���g�p����Ă��܂��B\n���p�J�^�J�i�͎g�p�ł��܂���B");
			TF.name1.focus();
			return false;
		}
		// �t���K�i
		if(!full_kana_chk(TF.kana1.value) || !full_kana_chk(TF.kana2.value)){
			alert("���S���Җ��t���K�i�ɑS�p�J�^�J�i�ȊO���g�p����Ă��܂��B\n�S�p�J�^�J�i�œ��͂��Ă��������B");
			TF.kana1.focus();
			return false;
		}
	}


	// ���[���A�h���X�̃`�F�b�N
	if(TF.email.value.length != 0){
		if(!email_chk(TF.email.value)){
			alert("���[���A�h���X�����������͂���Ă��܂���B\n���������͂��Ă��������B");
			TF.email.focus();
			return false;
		}
		if(TF.email2.value.length == 0){
			alert("�m�F�p���[���A�h���X�������͂ł��B");
			TF.email2.focus();
			return false;
		}
		if(!email_chk(TF.email2.value)){
			alert("�m�F�p���[���A�h���X�����������͂���Ă��܂���B\n���������͂��Ă��������B");
			TF.email2.focus();
			return false;
		}
		if(TF.email.value != TF.email2.value){
			alert("���͂��ꂽ���[���A�h���X����v���Ă��܂���B\n���������͂��Ă��������B");
			TF.email.focus();
			return false;
		}
	} else {
		alert("���[���A�h���X�������͂ł��B");
		TF.email.focus();
		return false;
	}

	if(TF.email.value != TF.email2.value){
		alert("���͂��ꂽ���[���A�h���X����v���Ă��܂���B\n���������͂��Ă��������B");
		TF.email.focus();
		return false;
	}
	
	// �d�b�ԍ�
	if(TF.tel1.value.length == 0){
		alert("�d�b�ԍ�(�s�O�ǔ�)�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.tel1.focus();
		return false;
	}
	if(!decimal_chk(TF.tel1.value)){
		alert("�d�b�ԍ�(�s�O�ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
		TF.tel1.focus();
		return false;
	}
	if(TF.tel2.value.length == 0){
		alert("�d�b�ԍ�(�s���ǔ�)�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.tel2.focus();
		return false;
	}
	if(!decimal_chk(TF.tel2.value)){
		alert("�d�b�ԍ�(�s���ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
		TF.tel2.focus();
		return false;
	}
	if(TF.tel3.value.length == 0){
		alert("�d�b�ԍ�(�l�ԍ�)�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.tel3.focus();
		return false;
	}
	if(!decimal_chk(TF.tel3.value)){
		alert("�d�b�ԍ�(�l�ԍ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
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

//	�蔲���[�N����
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

//	�蔲���[�N����
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

//	�蔲���[�N����
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
	//���p�J�^�J�i�̃`�F�b�N
	//�܂ޏꍇ�̓G���[
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
	// �S�p�J�i�����ȊO���͂���
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

	//�����̃`�F�b�N
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
	// ���[���A�h���X�̓��̓`�F�b�N���[�`��
	var $email = object_value;
	if ($email.length == 0){
	return true;
	}
	var chk_at = $email.indexOf("@");
	var last_at = $email.lastIndexOf("@");
	var chk_pi = $email.indexOf(".");
	var last_pi = $email.lastIndexOf(".");
	var leng_ma = $email.length - 1;

	//@�̌��A�ʒu�̃`�F�b�N
	//���݂��Ȃ��A�擪�܂��͍Ō���ɂ���ꍇ�̓G���[
	if((chk_at == -1) || (chk_at == 0) || (last_at == leng_ma)){
	return false;
	}
	//.�̌��A�ʒu�̃`�F�b�N
	//���݂��Ȃ��A�擪�܂��͍Ō���ɂ���ꍇ�̓G���[
	if((chk_pi == -1) || (chk_pi == 0) || (last_pi == leng_ma)){
	return false;
	}

	//�g�p�\�ȕ����̂ݎg�p���Ă��邩�̃`�F�b�N
	//�A���t�@�x�b�g(�啶���������)�A@�A.�A_�A-�A�����Ȃ�
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
