/*
========== ::: �����ݒ� ::: ==========
*/

// �l�̒P�ʂ�ݒ�i�K���_�u���N�I�[�g���N�I�[�g�Ŋ���j
var fontSizeUnit = "%";

// ���̑���ŕω�������l��ݒ�i�_�u���N�I�[�g��N�I�[�g�Ŋ���Ȃ��j
var perOrder = 20;

// ������Ԃ̒l��ݒ�i�_�u���N�I�[�g��N�I�[�g�Ŋ���Ȃ��j
var defaultSize = 100;

// �N�b�L�[�̖��O�i�K���_�u���N�I�[�g���N�I�[�g�Ŋ���j
var ckName = "FSCc";

// �N�b�L�[�̗L�������i���j�i�_�u���N�I�[�g��N�I�[�g�Ŋ���Ȃ��j
var ckDays = 2;

// �N�b�L�[�̃p�X�i�K���_�u���N�I�[�g���N�I�[�g�Ŋ���B�w�肪�s�v�̏ꍇ��"/"�ɂ���j
var ckPath = "/"


/*
========== ::: �y�[�W�ǂݍ��ݎ��̒l��ݒ� ::: ==========
*/

// �N�b�L�[�ǂݏo��
var fsCK = GetCookie( ckName );

if ( fsCK == null ){
  var currentSize = defaultSize;          //�N�b�L�[��������Ό��݂̒l��������Ԃ̒l�ɐݒ�
}
else{
  var currentSize = eval( fsCK );          //�N�b�L�[������Ό��݂̒l���N�b�L�[�̒l�ɐݒ�
}


/*
========== ::: head����style�v�f���o�� ::: ==========
*/
document.writeln( '<style type="text/css">' );
document.writeln( 'body{font-size:' + currentSize + fontSizeUnit+ '}' );
document.write( 'table{font-size:' + currentSize + fontSizeUnit+ '}' );
document.writeln( '</style>' );


/*===================================
  [�֐� fsc]
  ����CMD�ɓn�����l�ɉ�����
  �ύX��̒l���Z�o���N�b�L�[�ɏ������ށB
====================================*/

function fsc( CMD ){

  // �g��F�����_�̒l�Ɉ��̑���ŕω�������l�������đ����̒l"newSize"�ɑ��
  if ( CMD == "larger" ){
    var newSize = Number( currentSize + perOrder );
    SetCookie( ckName , newSize );          //�N�b�L�[��������
  }

  // �k���F�����_�̒l������̑���ŕω�������l�����������̒l�ɑ��
  // �����_�̃T�C�Y�̒l�����̑���ŕω�������l�Ɠ����Ȃ炻�̂܂ܑ����̒l�ɑ��
  if ( CMD == "smaller" ){
    if ( currentSize != perOrder ){
      var newSize = Number( currentSize - perOrder );
      SetCookie( ckName , newSize );          //�N�b�L�[��������
    }
    else{
      var newSize = Number( currentSize );
    }
  }

  // ���ɖ߂��F�����̒l�������l�ɂ���
  if ( CMD == "default" ){
    DeleteCookie( ckName );          //�N�b�L�[�폜
  }

  // �y�[�W�̍ēǂݍ���
  // �ēǂݍ��݂����邱�ƂŕύX��̒l�𔽉f����style�v�f���o�͂����
  location.reload();
}

// _______________________________________ end of function fsc() ___ 


/*===================================
  [�֐� SetCookie]
  �N�b�L�[�ɒl����������
====================================*/
function SetCookie( name , value ){
  var dobj = new Date();
  dobj.setTime(dobj.getTime() + 24 * 60 * 60 * ckDays * 1000);
  var expiryDate = dobj.toGMTString();
  document.cookie = name + '=' + escape(value) + ';expires=' + expiryDate + ';path=' + ckPath + '; secure';
}

/*===================================
  [�֐� GetCookie]
  �N�b�L�[���擾����
====================================*/
function GetCookie (name){
  var arg  = name + "=";
  var alen = arg.length;
  var clen = document.cookie.length;
  var i = 0;
  while (i < clen){
    var j = i + alen;
    if (document.cookie.substring(i, j) == arg)
    return getCookieVal (j);
    i = document.cookie.indexOf(" ", i) + 1;
    if (i == 0) break;
  }
  return null;
}

/*===================================
  [�֐� getCookieVal]
  �N�b�L�[�̒l�𒊏o����
====================================*/
function getCookieVal (offset){
  var endstr = document.cookie.indexOf (";", offset);
  if (endstr == -1)
  endstr = document.cookie.length;
  return unescape(document.cookie.substring(offset,endstr));
}

/*===================================
  [�֐� DeleteCookie]
  �N�b�L�[���폜����
====================================*/
function DeleteCookie(name){
  if (GetCookie(name)){
    document.cookie = name + '=' +
    '; expires=Thu, 01-Jan-70 00:00:01 GMT;path='+ckPath;
  }
}

//EOF
