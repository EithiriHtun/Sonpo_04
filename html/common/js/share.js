<!-- globalmenu (mainmenu) -->

m_top_1 = new Image(); m_top_1.src = "/common/ssi/img/m_top_1.gif";
m_top_2 = new Image(); m_top_2.src = "/common/ssi/img/m_top_2.gif";
m_news_1 = new Image(); m_news_1.src = "/common/ssi/img/m_news_1.gif";
m_news_2 = new Image(); m_news_2.src = "/common/ssi/img/m_news_2.gif";
m_useful_1 = new Image(); m_useful_1.src = "/common/ssi/img/m_useful_1.gif";
m_useful_2 = new Image(); m_useful_2.src = "/common/ssi/img/m_useful_2.gif";
m_protection_1 = new Image(); m_protection_1.src = "/common/ssi/img/m_protection_1.gif";
m_protection_2 = new Image(); m_protection_2.src = "/common/ssi/img/m_protection_2.gif";
m_archive_1 = new Image(); m_archive_1.src = "/common/ssi/img/m_archive_1.gif";
m_archive_2 = new Image(); m_archive_2.src = "/common/ssi/img/m_archive_2.gif";
m_about_1 = new Image(); m_about_1.src = "/common/ssi/img/m_about_1.gif";
m_about_2 = new Image(); m_about_2.src = "/common/ssi/img/m_about_2.gif";
m_exam_1 = new Image(); m_exam_1.src = "/common/ssi/img/m_exam_1.gif";
m_exam_2 = new Image(); m_exam_2.src = "/common/ssi/img/m_exam_2.gif";
m_beginner_1 = new Image(); m_beginner_1.src = "/common/ssi/img/m_beginner_1.gif";
m_beginner_2 = new Image(); m_beginner_2.src = "/common/ssi/img/m_beginner_2.gif";

function imgOn(imgName) {
document[imgName].src = eval(imgName + "_2.src");
}
function imgOff(imgName) {
document[imgName].src = eval(imgName + "_1.src");
}

function imgOn2(imgName,imgNo) {
document[imgName+imgNo].src = eval(imgName + "_2.src");
}
function imgOff2(imgName,imgNo) {
document[imgName+imgNo].src = eval(imgName + "_1.src");
}

function subwin(url,wname,w,h,scr){
wo=window.open(url,wname,"width="+w+",height="+h+",left=0,top=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars="+scr+",favorites=no,resizable="+scr+"\"");
wo.focus();
}

<!-- search area -->
function inputareaclr(){
	document.form.query_str.value = "";
}
<!-- globalmenu (pulldown) -->

function openSubm(menuName){
m_sub = document.getElementById(menuName).style;
m_sub.visibility = "visible";
}

function closeSubm(menuName){
m_sub = document.getElementById(menuName).style;
m_sub.visibility = "hidden";
}
