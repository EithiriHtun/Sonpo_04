var Mac = (navigator.appVersion.indexOf("Mac") > -1)
var safari = (navigator.userAgent.indexOf("Safari")!=-1);
var vN = navigator.appVersion.charAt(0);
var bN = navigator.appName.charAt(0);
var cN = "";

function chkbwr(){
//Mac
	if(Mac){
		if(safari){cN="safari";}
		else if(bN=="M"){cN="mie5";}
		else if(vN < 5){cN="mnn4";}
		else{cN="mnn6";}
//Win
	}else{
		if(bN=="M"){cN="wie5";}
		else if(vN < 5){cN="wnn4";}
		else{cN="wnn6";}
	}
	document.write("<link rel='stylesheet' href='/common/css/"+cN+".css' type='text/css'>");
}

chkbwr();