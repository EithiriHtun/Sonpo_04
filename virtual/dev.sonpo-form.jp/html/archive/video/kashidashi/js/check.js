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

	// �r�f�I�\�����ݖ{���`�F�b�N
	for(l=0;l<TotalCnt;l++){
		if(TF.elements['videoNo[]'][l].checked){
			videoCnt++;
		}
	}
	if(videoCnt > 4){
		alert("�݂��o����]�r�f�I�� "+videoCnt+" �{�I������Ă��܂��B\n��x�ɑ݂��o���ł���{���͂S�{�܂łł��B");
		TF.elements['videoNo[]'][0].focus();
		return false;
	}
	if(videoCnt == 0){
		alert("�݂��o����]�r�f�I���I������Ă��܂���B");
		TF.elements['videoNo[]'][0].focus();
		return false;
	}
	// �݂��o�����Ԃ̃`�F�b�N
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
		alert("�ؗp���Ԃ̊J�n�����K���ł���܂���B���m�F�������B");
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
		alert("�ؗp���Ԃ̏I�������K���ł���܂���B���m�F�������B");
		TF.eyear.focus();
		return false;
	}
	// �����`�F�b�N
	sttime = new Date( TF.syear.value,TF.smonth.value -1,TF.sday.value );
	edtime = new Date( TF.eyear.value,TF.emonth.value -1,TF.eday.value );
	timeDiff = edtime.getTime()-sttime.getTime();
//alert(sttime+"   "+edtime);
	dayDiff = Math.floor(timeDiff / (1000*60*60*24));
	if(dayDiff <= 0){
//alert(sttime+"   "+edtime);
		alert("�ؗp���Ԃɖ�肪����܂��B���m�F�������B");
		TF.syear.focus();
		return false;
	} else {
		if(dayDiff > 7){
			alert("���Ԃ͌���1�T�Ԃł��B\n1�T�Ԃ��z����ꍇ�͐\�����݌�A�Ǌ��x���܂ł����k���������B");
		}
	}

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
		alert("�\���ҁF�s���{�������I���ł��B\n�K�{���ڂƂȂ�܂��̂ł��I���������B");
		TF.prefecture.focus();
		return false;
	}
	//���t��Z��
	if(TF.address.value.length == 0){
		alert("�\���ҁF�Z���������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.address.focus();
		return false;
	}
	if(!half_kana_chk(TF.address.value)){
		alert("�\���ҁF�Z���ɔ��p�J�^�J�i���g�p����Ă��܂��B\n���p�J�^�J�i�͎g�p�ł��܂���B");
		TF.address.focus();
		return false;
	}
	//���Đ�
	if(TF.name_dat.value.length == 0){
		alert("�����O�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
		TF.name_dat.focus();
		return false;
	}
	if(!half_kana_chk(TF.name_dat.value)){
		alert("�����O�ɔ��p�J�^�J�i���g�p����Ă��܂��B\n���p�J�^�J�i�͎g�p�ł��܂���B");
		TF.name_dat.focus();
		return false;
	}
	// �t���K�i
	if(!full_kana_chk(TF.name_kana.value)){
		alert("�t���K�i�ɑS�p�J�^�J�i�ȊO���g�p����Ă��܂��B\n�S�p�J�^�J�i�œ��͂��Ă��������B");
		TF.name_kana.focus();
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
	// Fax�ԍ�
	if(!decimal_chk(TF.fax1.value)){
		alert("FAX�ԍ�(�s�O�ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
		TF.fax1.focus();
		return false;
	}
	if(!decimal_chk(TF.fax2.value)){
		alert("FAX�ԍ�(�s���ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
		TF.fax2.focus();
		return false;
	}
	if(!decimal_chk(TF.fax3.value)){
		alert("FAX�ԍ�(�l�ԍ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
		TF.fax3.focus();
		return false;
	}
	// ���[���A�h���X�̃`�F�b�N
	if(TF.email.value.length != 0){
		if(!email_chk(TF.email.value)){
			alert("�\���ҁF���[���A�h���X�����������͂���Ă��܂���B\n���������͂��Ă��������B");
			TF.email.focus();
			return false;
		}
		if(TF.email2.value.length == 0){
			alert("�\���ҁF�m�F�p���[���A�h���X�������͂ł��B");
			TF.email2.focus();
			return false;
		}
		if(!email_chk(TF.email2.value)){
			alert("�\���ҁF�m�F�p���[���A�h���X�����������͂���Ă��܂���B\n���������͂��Ă��������B");
			TF.email2.focus();
			return false;
		}
		if(TF.email.value != TF.email2.value){
			alert("�\���ҁF���͂��ꂽ���[���A�h���X����v���Ă��܂���B\n���������͂��Ă��������B");
			TF.email.focus();
			return false;
		}
	} else {
		alert("�\���ҁF���[���A�h���X�������͂ł��B");
		TF.email.focus();
		return false;
	}

	if(TF.email.value != TF.email2.value){
		alert("�\���ҁF���͂��ꂽ���[���A�h���X����v���Ă��܂���B\n���������͂��Ă��������B");
		TF.email.focus();
		return false;
	}
	
	// �݂��o�����@
	if(TF.method[0].value == null && TF.method[1].value == null){
		alert("��]�ݏo���@�����I���ł��B\n�K�{���ڂƂȂ�܂��̂ł��I���������B");
		TF.method[0].focus();
		return false;
	}
	if(TF.method[0].checked == true){
		if(TF.visittime[0].checked == false && TF.visittime[1].checked == false){
			alert("���K���Ԃ����I���ł��B\n�K�{���ڂƂȂ�܂��̂ł��I���������B");
			TF.visittime[0].focus();
			return false;
		}else{
			// ���K���̃`�F�b�N�i�݂��o�����ԓ��ł��邩�j
			rhtime = new Date( TF.syear.value, TF.month_1.value -1, TF.day_1.value );
			if( rhtime.getTime() < sttime.getTime() || rhtime.getTime() > edtime.getTime() ){
				alert("��]�K����͎ؗp���ԓ��ɂȂ�悤�����͂��������B");
				TF.month_1.focus();
				return false;
			} else {
				if(rhtime.getTime() != sttime.getTime() ){
					alert("�ݏo���Ԃ̊J�n������]���K���ɕύX���܂��B");
					TF.smonth.selectedIndex = TF.month_1.value - 1;
					TF.sday.selectedIndex = TF.day_1.value - 1;
					chgEndDay();
				}
			}
		}
	}

	if(TF.method[2].checked == true){
		// ���t��̃`�F�b�N
		// �X�֔ԍ�(���p�����`�F�b�N)
		if(TF.szipcode1.value.length == 0){
			alert("���t��F�X�֔ԍ��������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.szipcode1.focus();
			return false;
		}
		if(!decimal_chk(TF.szipcode1.value)){
			alert("���t��F�X�֔ԍ������p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.szipcode1.focus();
			return false;
		}
		if(TF.szipcode2.value.length == 0){
			alert("���t��F�X�֔ԍ��������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.szipcode2.focus();
			return false;
		}
		if(!decimal_chk(TF.szipcode2.value)){
			alert("���t��F�X�֔ԍ������p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.szipcode2.focus();
			return false;
		}
		//�s���{��
		if(TF.sprefecture.value == ''){
			alert("���t��F�s���{�������I���ł��B\n�K�{���ڂƂȂ�܂��̂ł��I���������B");
			TF.sprefecture.focus();
			return false;
		}
		//���t��Z��
		if(TF.saddress.value.length == 0){
			alert("���t��F�Z���������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.saddress.focus();
			return false;
		}
		if(!half_kana_chk(TF.saddress.value)){
			alert("���t��F�Z���ɔ��p�J�^�J�i���g�p����Ă��܂��B\n���p�J�^�J�i�͎g�p�ł��܂���B");
			TF.saddress.focus();
			return false;
		}
		//���Đ�
		if(TF.sname_dat.value.length == 0){
			alert("���t��F���Đ悪�����͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.sname_dat.focus();
			return false;
		}
		if(!half_kana_chk(TF.sname_dat.value)){
			alert("���t��F���Đ�ɔ��p�J�^�J�i���g�p����Ă��܂��B\n���p�J�^�J�i�͎g�p�ł��܂���B");
			TF.sname_dat.focus();
			return false;
		}
		// �t���K�i
		if(!full_kana_chk(TF.sname_kana.value)){
			alert("���t��F�t���K�i�ɑS�p�J�^�J�i�ȊO���g�p����Ă��܂��B\n�S�p�J�^�J�i�œ��͂��Ă��������B");
			TF.sname_kana.focus();
			return false;
		}
		// �d�b�ԍ�
		if(TF.stel1.value.length == 0){
			alert("���t��F�d�b�ԍ�(�s�O�ǔ�)�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.stel1.focus();
			return false;
		}
		if(!decimal_chk(TF.stel1.value)){
			alert("���t��F�d�b�ԍ�(�s�O�ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.stel1.focus();
			return false;
		}
		if(TF.stel2.value.length == 0){
			alert("���t��F�d�b�ԍ�(�s���ǔ�)�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.stel2.focus();
			return false;
		}
		if(!decimal_chk(TF.stel2.value)){
			alert("���t��F�d�b�ԍ�(�s���ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.stel2.focus();
			return false;
		}
		if(TF.stel3.value.length == 0){
			alert("���t��F�d�b�ԍ�(�l�ԍ�)�������͂ł��B\n�K�{���ڂƂȂ�܂��̂ł����͉������B");
			TF.stel3.focus();
			return false;
		}
		if(!decimal_chk(TF.stel3.value)){
			alert("���t��F�d�b�ԍ�(�l�ԍ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.stel3.focus();
			return false;
		}
		// Fax�ԍ�
		if(!decimal_chk(TF.sfax1.value)){
			alert("FAX�ԍ�(�s�O�ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.sfax1.focus();
			return false;
		}
		if(!decimal_chk(TF.sfax2.value)){
			alert("FAX�ԍ�(�s���ǔ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.sfax2.focus();
			return false;
		}
		if(!decimal_chk(TF.sfax3.value)){
			alert("FAX�ԍ�(�l�ԍ�)�����p�����ȊO�œ��͂���Ă��܂��B\n�����������͉������B");
			TF.sfax3.focus();
			return false;
		}
		// ���[���A�h���X�̃`�F�b�N
		if(TF.semail.value != ''){
			if(!email_chk(TF.semail.value)){
				alert("���t��F���[���A�h���X�����������͂���Ă��܂���B\n���������͂��Ă��������B");
				TF.semail.focus();
				return false;
			}
			if(TF.semail2.value.length == 0){
				alert("���t��F�m�F�p���[���A�h���X�������͂ł��B");
				TF.semail2.focus();
				return false;
			}
			if(!email_chk(TF.semail2.value)){
				alert("���t��F�m�F�p���[���A�h���X�����������͂���Ă��܂���B\n���������͂��Ă��������B");
				TF.semail2.focus();
				return false;
			}
			if(TF.semail.value != TF.semail2.value){
				alert("���t��F���͂��ꂽ���[���A�h���X����v���Ă��܂���B\n���������͂��Ă��������B");
				TF.semail.focus();
				return false;
			}
		} else {
			alert("���t��F���[���A�h���X�������͂ł��B");
			TF.semail.focus();
			return false;
		}
		if(TF.semail.value != TF.semail2.value){
			alert("���t��F���͂��ꂽ���[���A�h���X����v���Ă��܂���B\n���������͂��Ă��������B");
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

	// �r�f�I�\�����ݖ{���`�F�b�N
	for(l=0;l<TotalCnt;l++){
		if(TF.elements['videoNo[]'][l].checked){
			videoCnt++;
			if(videoCnt > 4){
				alert("�݂��o����]�r�f�I�� "+videoCnt+" �{�I������Ă��܂��B\n��x�ɑ݂��o���ł���{���͂S�{�܂łł��B");
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

//	�蔲���[�N����
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
	var rmonth = TF.month_1.value;
	var endMonthArr = new Array("","31","28","31","30","31","30","31","31","30","31","30","31");

//	�蔲���[�N����
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
		if((vArdatas.charCodeAt(i) >= 12542) || (vArdatas.charCodeAt(i) <= 12449)){
			return false;
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
