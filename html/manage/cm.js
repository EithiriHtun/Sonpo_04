var Formatable = 0;
if (document.selection){
  Formatable = 1;
}
var ua = navigator.userAgent;
if (ua.indexOf('Gecko') >= 0 && ua.indexOf('Safari') < 0){
  Formatable = 1;
}

function getSelection(ta){
  if (document.selection){
    return document.selection.createRange().text;
  }else{
    var length=ta.textLength;
    var start=ta.selectionStart;
    var end=ta.selectionEnd;
    if (end==1 || end==2) end=length;
    return ta.value.substring(start,end);
  }
}

function setSelection(ta,val){
  if (document.selection){
    document.selection.createRange().text=val;

    var n=_ieGetSelection(ta).start;
    var slen=val.length;
    ta.focus();
    range=ta.createTextRange();
/*    range.collapse(); */
    range.move("character",n+slen);
    range.select();

  }else{
    var n=_mozillaGetSelection(ta).start;

    var top = ta.scrollTop;
    var length = ta.textLength;
    var start = ta.selectionStart;
    var end = ta.selectionEnd;
    if (end==1 || end==2) end=length;
    ta.value = ta.value.substring(0,start) + val + ta.value.substr(end,length);
    
    ta.scrollTop = top;
    ta.setSelectionRange(n+val.length, n+val.length);
    ta.focus();

  }
}

function setSelection2(ta,val,selS,selE){
  /*
  selS : select start position from end of strings
  selE : select end position from end of strings
  */
  if (document.selection){
    document.selection.createRange().text=val;

    var n=_ieGetSelection(ta).start;

    var slen=val.length;
    ta.focus();
    range=ta.createTextRange();
/*    range.collapse(); */
/*    range.move("character",n+slen);*/
    range.moveStart("character",n+slen - selS);
    while(range.text.length>(selS - selE)){
      range.moveEnd("character", -1);
    }
    range.select();

  }else{
    var n=_mozillaGetSelection(ta).start;

    var top = ta.scrollTop;
    var length = ta.textLength;
    var start = ta.selectionStart;
    var end = ta.selectionEnd;
    if (end==1 || end==2) end=length;
    ta.value = ta.value.substring(0,start) + val + ta.value.substr(end,length);
    
    ta.scrollTop = top;
    ta.setSelectionRange(n+val.length - selS, n+val.length - selE);
    ta.focus();

  }
}

function setSelection3(ta,val){
  if (document.selection){
    document.selection.createRange().text=val;

    var n=_ieGetSelection(ta).start;
    var slen=val.length;
    ta.focus();
    range=ta.createTextRange();
/*    range.collapse(); */
    range.move("character",n);
    range.select();

  }else{
    var n=_mozillaGetSelection(ta).start;

    var top = ta.scrollTop;
    var length = ta.textLength;
    var start = ta.selectionStart;
    var end = ta.selectionEnd;
    if (end==1 || end==2) end=length;
    ta.value = ta.value.substring(0,start) + val + ta.value.substr(end,length);
    
    ta.scrollTop = top;
    ta.setSelectionRange(n+val.length, n+val.length);
    ta.focus();

  }
}

function scrollTextarea(ta,n,len,top){
  if(document.selection){
    ta.focus();
    range=ta.createTextRange();
    range.collapse();
    range.move("character",n+len);
    range.select();
  }else{
    ta.scrollTop = top;
    ta.setSelectionRange(n+len, n+len);
    ta.focus();
  }
  
  return 1;
}

function getScrollTop(ta){
  if(document.selection){
    return 0;
  }else{
    return ta.scrollTop;
  }
}

function decorateStr(ta,col,isBold,classname){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  var attr;
  var clss;
  if(classname){
    clss=' class="'+classname+'"';
  }
  if(col){
    attr='color:'+col+';';
  }
  if(isBold){
    attr=attr+'font-weight:bold;'
  }
  setSelection(ta,'<span'+clss+' style="'+attr+'">'+str+'</span>');
  return false;
}

function decorateHeadL(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection2(ta,'<div class="subt1">'+"\n"+'<div class="frm">'+"\n"+'<p>'+str+'</p>'+"\n"+'</div>'+"\n"+'</div>'+"\n\n"+'<div class="contentBlock1">'+"\n"+'<p><!-- ここ<～>を削除して本文を記載 --></p>'+"\n"+'</div>'+"\n\n",37,13);
  return false;
}

function decorateHeadM(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection2(ta,'<div class="subt2">'+"\n"+'<div class="frm">'+"\n"+'<p>'+str+'</p>'+"\n"+'</div>'+"\n"+'</div>'+"\n\n"+'<div class="contentBlock2">'+"\n"+'<p><!-- ここ<～>を削除して本文を記載 --></p>'+"\n"+'</div>'+"\n\n",37,13);
  return false;
}

function decorateHeadS(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection2(ta,'<div class="subt3">'+"\n"+'<div class="frm">'+"\n"+'<p>'+str+'</p>'+"\n"+'</div>'+"\n"+'</div>'+"\n\n"+'<div class="contentBlock3">'+"\n"+'<p><!-- ここ<～>を削除して本文を記載 --></p>'+"\n"+'</div>'+"\n\n",37,13);
  return false;
}

function decorateHead(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection2(ta,'<div class="subt4">'+"\n"+'<div class="frm">'+"\n"+'<p>'+str+'</p>'+"\n"+'</div>'+"\n"+'</div>'+"\n\n"+'<div class="contentBlock4">'+"\n"+'<p><!-- ここ<～>を削除して本文を記載 --></p>'+"\n"+'</div>'+"\n\n",37,13);
  return false;
}

function decorateTextColor(ta,clss){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection(ta,'<span class="'+clss+'">'+str+'</span>');
  return false;
}

function decorateTextS(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection(ta,'<span class="texts">'+str+'</span>');
  return false;
}

function decorateTextL(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection(ta,'<span class="textl">'+str+'</span>');
  return false;
}

function decorateTextStrong(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  if(!str) return;
  setSelection(ta,'<strong>'+str+'</strong>');
  return false;
}

function insertShortBorder(ta){
  if(!Formatable) return;
  var str=getSelection(ta);
  var cr=String.fromCharCode(13)
  var strInsert='<!--%%shortborder%%-->'+cr;
  if (document.selection){
    ta.focus();
  }
  setSelection(ta,strInsert);
  return false;
}

function addText(e,v){
  if(!Formatable) return;
  if (document.selection){
    e.focus();
  }
  e.value=e.value + v;
  return false;
}

function openImageForm(wndname,ta,ta2){
  if(!Formatable) return;

  var keepstr=ta.value;
  
  var str=getSelection(ta);
  var cr=String.fromCharCode(13)
  var strInsert='<!--%%midashi%%-->';
  if (document.selection){
    ta.focus();
  }
  setSelection(ta,strInsert);
  ta2.value=ta.value;
  if(!document.selection){
    var top = ta.scrollTop;
  }
  ta.value=keepstr;
  if(!document.selection){
    ta.scrollTop = top;
  }
  
  subwin=window.open('/manage/index.php/module/ManageNews/action/ImageRegist',wndname,"width=600, height=600,location=no, menubar=no, scrollbars=yes");
  //subwin.document.frm1.content.value=ta.value;
  
}

function openLinkForm(wndname,ta,ta2){
  if(!Formatable) return;

  var keepstr=ta.value;
  
  var str=getSelection(ta);
  var cr=String.fromCharCode(13)
  var strInsert='<!--%%midashi%%-->';
  if (document.selection){
    ta.focus();
  }
  setSelection(ta,strInsert);
  ta2.value=ta.value;
  if(!document.selection){
    var top = ta.scrollTop;
  }
  ta.value=keepstr;
  if(!document.selection){
    ta.scrollTop = top;
  }
  
  subwin=window.open('/manage/index.php/module/ManageNews/action/LinkRegist',wndname,"width=600, height=400,location=no, menubar=no, scrollbars=yes");
  //subwin.document.frm1.content.value=ta.value;
  
}

function openFileForm(wndname,ta,ta2){
  if(!Formatable) return;

  var keepstr=ta.value;
  
  var str=getSelection(ta);
  var cr=String.fromCharCode(13)
  var strInsert='<!--%%midashi%%-->';
  if (document.selection){
    ta.focus();
  }
  setSelection(ta,strInsert);
  ta2.value=ta.value;
  if(!document.selection){
    var top = ta.scrollTop;
  }
  ta.value=keepstr;
  if(!document.selection){
    ta.scrollTop = top;
  }
  
  subwin=window.open('/manage/index.php/module/ManageNews/action/FileRegist',wndname,"width=600, height=400,location=no, menubar=no, scrollbars=yes");
  //subwin.document.frm1.content.value=ta.value;
  
}

function insertBr(ta){
  if(!Formatable) return;

  var str=getSelection(ta);
  var cr=String.fromCharCode(13)
  var strInsert='<br />';
  if (document.selection){
    ta.focus();
  }
  setSelection3(ta,strInsert);
  return false;
}

function insertBlank(ta){
  if(!Formatable) return;

  var str=getSelection(ta);
  var cr=String.fromCharCode(13)
  var strInsert='<br /><br />';
  if (document.selection){
    ta.focus();
  }
  setSelection3(ta,strInsert);
  
}

function _mozillaGetSelection(ta){
    return { 
        start: ta.selectionStart, 
        end: ta.selectionEnd 
    };
}

function _ieGetSelection(e){
	e.focus();
	
	var r = document.selection.createRange();

	var len = r.text.replace(/\r/g, "").length;

	// BODY要素のテキスト範囲を作成する
	var br = document.body.createTextRange();

	// BODY要素のテキスト範囲をeのテキスト範囲に移動する
	// これはe.createTextRange()とほぼ同等
	br.moveToElementText( e );

	// eのテキストの長さを取得する
	var all_len = br.text.replace(/\r/g, "").length;

	// eのテキスト範囲の始点を、rの範囲の始点に移動する
	br.setEndPoint( "StartToStart", r );

	// 始点 ＝ 全体 － （rの始点からeの終点） 
	var s = all_len - br.text.replace(/\r/g, "").length;

	// 終点 ＝ 始点 ＋ 選択範囲の長さ
	var e = s + len;

	// 始点と終点を含むオブジェクトを返す
	return { start: s, end: e };
}

function _ieGetSelection_org(ta){
    ta.focus();

    var range = document.selection.createRange();
    var bookmark = range.getBookmark();

    var contents = ta.value;
    var originalContents = contents;
    var marker = _createSelectionMarker();
    while(contents.indexOf(marker) != -1) {
        marker = _createSelectionMarker();
    }

    var parent = range.parentElement();
    if (parent == null || parent.type != "textarea") {
        return { start: 0, end: 0 };
    }
    range.text = marker + range.text + marker;
    contents = ta.value;

    var result = {};
    result.start = contents.indexOf(marker);
    contents = contents.replace(marker, "");
    result.end = contents.indexOf(marker);

    ta.value = originalContents;
    range.moveToBookmark(bookmark);
    range.select();

    return result;
}
function _createSelectionMarker() {
    return "##SELECTION_MARKER_" + Math.random() + "##";
}

