<?php /* Smarty version 2.6.9, created on 2022-03-16 13:49:26
         compiled from instcopyform.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'instcopyform.html', 112, false),)), $this); ?>
<html>
<head>
<title>����»���ݸ����񡦴���ʪ���ֻ��ɸ���Ϣ ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<!--<script type="text/javascript" src="/manage/cm.js"></script>-->
<script languege="javascript">
<!--
  var szip1=new Array();
  var szip2=new Array();
  var spref=new Array();
  var sadd =new Array();
  var sname=new Array();
  var stel1=new Array();
  var stel2=new Array();
  var stel3=new Array();
  <?php $_from = $this->_tpl_vars['branch_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?>
  szip1[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_zip12'][$this->_tpl_vars['dkey']][0]; ?>
';szip2[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_zip12'][$this->_tpl_vars['dkey']][1]; ?>
';
  spref[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_pref'][$this->_tpl_vars['dkey']]; ?>
';
  sadd[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_address'][$this->_tpl_vars['dkey']]; ?>
';
  sname[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_name'][$this->_tpl_vars['dkey']]; ?>
';
  stel1[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_tel123'][$this->_tpl_vars['dkey']][0]; ?>
';stel2[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_tel123'][$this->_tpl_vars['dkey']][1]; ?>
';stel3[<?php echo $this->_tpl_vars['dkey']; ?>
]='<?php echo $this->_tpl_vars['branch_tel123'][$this->_tpl_vars['dkey']][2]; ?>
';
  <?php endforeach; endif; unset($_from);  echo '
  function setBranchAddress(){
    f=document.frm1;
    n=f.addresslist.selectedIndex;
    if(n){
      f.szip1.value=szip1[n];
      f.szip2.value=szip2[n];
      f.saddress.value=sadd[n];
      f.sname.value=\'���̼���ˡ�� ����»���ݸ����� \'+sname[n]+\'����\';
      f.stel1.value=stel1[n];
      f.stel2.value=stel2[n];
      f.stel3.value=stel3[n];
      f.spref.selectedIndex=spref[n];
    }else{
      f.szip1.value=\'\';
      f.szip2.value=\'\';
      f.saddress.value=\'\';
      f.sname.value=\'\';
      f.stel1.value=\'\';
      f.stel2.value=\'\';
      f.stel3.value=\'\';
      f.spref.selectedIndex=0;
    }
  }

  function checkStatus(){
    if(confirm(\'�����ֹ���ä���Ͽ���ޤ�����\')){
      return true;
    }else{
      return false;
    }
    
  }

// ���������Ѥ������ǡ���
var weekT = new Array("��","��","��","��","��","��","��");

// �����λ��С�����˾��
function weekTxt01(){

	var $TF = document.form01;
	// ������������˾
	var chYear = $TF.year_1[$TF.year_1.selectedIndex].value;
	var chMonth = $TF.month_1[$TF.month_1.selectedIndex].value;
	var chDay = $TF.day_1[$TF.day_1.selectedIndex].value;

	if((chYear != \'\') && (chMonth != \'\') && (chDay != \'\')){
		var chDate = new Date(chYear*1,(chMonth-1),chDay*1);
		$TF.wTx01.value = weekT[chDate.getDay()];
	}
}



// �����λ��С������˾��
function weekTxt02(){

	var $TF = document.form01;
	// �������������˾
	var chYear = $TF.year_2[$TF.year_2.selectedIndex].value;
	var chMonth = $TF.month_2[$TF.month_2.selectedIndex].value;
	var chDay = $TF.day_2[$TF.day_2.selectedIndex].value;

	if((chYear != \'\') && (chMonth != \'\') && (chDay != \'\')){
		var chDate = new Date(chYear*1,(chMonth-1),chDay*1);
		$TF.wTx02.value = weekT[chDate.getDay()];
	}
}

'; ?>

//-->
</script>
<style>
<?php echo '
ul.sdocs{
  margin-left:0px;
  padding-left:0px;
}
ul.sdocs li{
  float:left;
  width:500px;
  list-style-type:none;
}
'; ?>


</style>
</head>

<body bgcolor="#FFFFFF"<?php if (@ $this->_tpl_vars['popmsg']): ?> onLoad="alert('<?php echo ((is_array($_tmp=$this->_tpl_vars['popmsg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');"<?php endif; ?>>
<h2>����»���ݸ����񡦹ֻ��ɸ� ��������</h2>
<h3>�ֻ��ɸ��ʾܺ١˥��ԡ�</h3>
<div class="maincontents">
<a href="/manage/forms/index.php/module/FormManage/action/InstList?y=<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;br=<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;st=<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;ts=<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">���</a>
<hr>
<?php if (@ $this->_tpl_vars['errors']):  $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span><br><?php endforeach; endif; unset($_from);  endif; ?>
����������
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstCopy" method="post" name="form01"><!-- onSubmit="return pre_chk_1();"-->
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>��ż�̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<input type="hidden" name="host" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>����ϡ�͹���ֹ��</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<input type="hidden" name="post1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="post2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>����ϡ���ƻ�ܸ���</th>
<td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?><input type="hidden" name="prefecture" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['prefecture'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>����ϡʻ�Į¼�ʲ���</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<input type="hidden" name="address" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>��ô����̾</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<input type="hidden" name="person_last" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="person_first" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>��ô����̾�եꥬ��</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<input type="hidden" name="person_kana_last" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="person_kana_first" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>��ô������</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<input type="hidden" name="yaku" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>�����ֹ�</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['data']['naisen']): ?>�������<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>
<input type="hidden" name="tel1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="tel2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="tel3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="naisen" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>FAX�ֹ�</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<input type="hidden" name="fax1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="fax2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="fax3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>�᡼�륢�ɥ쥹</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<input type="hidden" name="email1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>

<tr>
<td colspan="2"><hr></td>
</tr>

<tr>
<th>��˾��������(��1��˾)</th>
<td>
											<select name="year_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['year_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ǯ 
											<select name="month_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['month_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="day_1" onChange="weekTxt01()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['day_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											&nbsp;&nbsp;<input type="text" name="wTx01" size="2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx01'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">&nbsp;����<br>&nbsp;&nbsp;&nbsp;
											<select name="hour_from_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['hour_from_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="min_from_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['min_from_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ʬ �� 
											<select name="hour_to_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['hour_to_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="min_to_1">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['min_to_1']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ʬ
</td>
</tr>
<tr>
<th>��˾��������(��2��˾)</th>
<td>
											<select name="year_2" onChange="weekTxt02()">

												<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['year_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> ǯ 
											<select name="month_2" onChange="weekTxt02()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['month_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="day_2" onChange="weekTxt02()">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['day_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											&nbsp;&nbsp;<input type="text" name="wTx02" size="2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">&nbsp;����<br>&nbsp;&nbsp;&nbsp;
											<select name="hour_from_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['hour_from_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> �� 
											<select name="min_from_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['min_from_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>

											</select> ʬ �� 
											<select name="hour_to_2">
												<option value=""></option>
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['hour_to_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> �� 
											<select name="min_to_2">

												<option value=""></option>
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['min_to_2']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
											</select> ʬ

<?php if ($this->_tpl_vars['data']['year_2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['year_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ǯ<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>
</td>
</tr>
<tr>
<th>������ϡʲ��̾��</th>
<td><input type="text" name="lecture_hall" size="45" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>������ϡ�͹���ֹ��</th>
<td><input type="text" name="lecture_zip1" size="3" maxlength="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
��
<input type="text" name="lecture_zip2" size="4" maxlength="4" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>������ϡ���ƻ�ܸ���</th>
<td><select name="lecture_prefecture">
<option value="">���򤷤Ƥ���������</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == $this->_tpl_vars['data']['lecture_prefecture']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select></td>
</tr>
<tr>
<th>������ϡʻ�Į¼�ʲ���</th>
<td><input type="text" name="lecture_address" size="45" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>��������ֹ�</th>
<td><input type="text" name="lecture_tel1" size="6" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
								��
								<input type="text" name="lecture_tel2" size="4" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
								��
								<input type="text" name="lecture_tel3" size="4" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>�о�</th>
<td><select name="object_select">
												<option value="">���򤷤Ƥ���������</option>
<?php $_from = $this->_tpl_vars['taisyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_taisyou'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_taisyou']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_taisyou']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_taisyou']['iteration']; ?>
"<?php if ($this->_foreach['loop_taisyou']['iteration'] == $this->_tpl_vars['data']['object_select']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?></select><input type="text" name="object_text" size="40" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['object_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>����ͽ��Ϳ�</th>
<td><input type="text" size="8" name="object_num" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>�ֱ�ơ���</th>
<td><select name="themes">
									<option value="">�����餫�餪���Ӥ���������</option>

<?php $_from = $this->_tpl_vars['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_theme'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_theme']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
        $this->_foreach['loop_theme']['iteration']++;
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['data']['themes'] == ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
								</select><br />����¾�ξ�硧<br><textarea cols="40" rows="3" name="theme_text"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['theme_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
<tr>
<th>�ӥǥ�</th>
<td><input type="radio" name="video" value="1"<?php if ($this->_tpl_vars['data']['video'] == '1'): ?> checked<?php endif; ?>>&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="video" value="0"<?php if ($this->_tpl_vars['data']['video'] == '0'): ?> checked<?php endif; ?>>&nbsp;�ʤ�</td>
</tr>
<tr>
<th>���մ�˾������ɬ��������</th>
<td><input type="text" name="copy" size="5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">��</td>
</tr>
<tr>
<th>���մ�˾�����ʻ����������</th>
<td><input type="radio" name="receiver_address" value="host"<?php if ($this->_tpl_vars['data']['receiver_address'] == 'host'): ?> checked<?php endif; ?>> ��ż�<br>
<input type="radio" name="receiver_address" value="venue"<?php if ($this->_tpl_vars['data']['receiver_address'] == 'venue'): ?> checked<?php endif; ?>> ���<br>
<input type="radio" name="receiver_address" value="other"<?php if ($this->_tpl_vars['data']['receiver_address'] == 'other'): ?> checked<?php endif; ?>> ����¾&nbsp;&nbsp;�����轻��   &nbsp;&nbsp;
								<input type="text" name="receiver_text" size="45" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['receiver_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>�ѥ����󤪤�ӥץ����������λ���</th>
<td><input type="radio" name="use_pcprj" value="1"<?php if ($this->_tpl_vars['data']['use_pcprj'] == '1'): ?> checked<?php endif; ?>> ���Ѳ�ǽ<br>
								<input type="radio" name="use_pcprj" value="2"<?php if ($this->_tpl_vars['data']['use_pcprj'] == '2'): ?> checked<?php endif; ?>> �����Բ�ǽ</td>
</tr>
<tr>
<th>�����١�ư�趵��Τ����ѷи�</th>
<td><input type="radio" name="exp" value="1"<?php if ($this->_tpl_vars['data']['exp'] == '1'): ?> checked<?php endif; ?>>����&nbsp;&nbsp;&nbsp;&nbsp;

								<input type="radio" name="exp" value="0"<?php if ($this->_tpl_vars['data']['exp'] == '0'): ?> checked<?php endif; ?>> �ʤ� <br>
								&nbsp;<br>
								�����
								<input type="text" size="4" maxlength="4" name="use_year" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"> ǯ 
								<select name="use_month">

								<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['use_month']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
								</select> �� ��</td>
</tr>
<tr>
<th>����¾Ϣ�����</th>
<td><textarea cols="60" rows="5" name="connection" style="width:100%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['connection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="����Ͽ��" onClick="return checkStatus();"><input type="hidden" name="mode" value="submit"></td>
</tr>
</table>
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>

<a href="/manage/forms/index.php/module/FormManage/action/InstList?y=<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;br=<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;st=<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;ts=<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">���</a>
</div>
</body>
</html>