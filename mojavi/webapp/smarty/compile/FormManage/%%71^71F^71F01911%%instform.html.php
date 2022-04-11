<?php /* Smarty version 2.6.9, created on 2022-03-18 13:43:47
         compiled from instform.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'instform.html', 88, false),array('modifier', 'date_format', 'instform.html', 111, false),array('modifier', 'nl2br', 'instform.html', 196, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物・講師派遣関連 管理画面</title>
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
    n=f.addresslist[f.addresslist.selectedIndex].value;

    if(n){
      f.szip1.value=szip1[n];
      f.szip2.value=szip2[n];
      f.saddress.value=sadd[n];
      f.sname.value=\'一般社団法人 日本損害保険協会 \'+sname[n]+\'支部\';
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
    f=document.frm1;
    sv=f.status[f.status.selectedIndex].value;
    send=f.sregist[0].checked;
    if(send){
      if(sv==2){
        return true;
      }else{
        if(sv==3 || sv==5){
          return true;
        }else{
          alert(\'ステータスが「確定」になっていません。資料発送依頼をする場合は、ステータスを「確定」に変更してください。\');
          return false;
        }
      }
    }
    return true;
    
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
<h2>日本損害保険協会・講師派遣 管理画面</h2>
<h3>講師派遣（詳細）</h3>
<div class="maincontents">
<a href="/manage/forms/index.php/module/FormManage/action/InstList?y=<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;br=<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;st=<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;ts=<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">戻る</a>
<hr>
<form action="/manage/forms/index.php/module/FormManage/action/InstCopy">
<input type="hidden" name="id" value="<?php if (@ $this->_tpl_vars['data']['id']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<div style="text-align:right;padding-right:10%;"><input type="submit" value="コピー"></div>
</form>
<?php if ($this->_tpl_vars['errors']):  $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><span style="color:red;"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span><br><?php endforeach; endif; unset($_from);  endif; ?>
申込み内容
<table cellspacing="1" class="azlist" width="90%">
<tr>
<th>受付番号</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>受付日時</th>
<td width="75%"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['date_regist'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
</td>
</tr>
<tr>
<th>主催者名</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>所在地（郵便番号）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>所在地（都道府県）</th>
<td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>所在地（市町村以下）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ご担当者名</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ご担当者名フリガナ</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>ご担当者役職</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>電話番号</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['data']['naisen']): ?>　（内）<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>FAX番号</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>メールアドレス</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>

<tr>
<td colspan="2"><hr></td>
</tr>

<tr>
<th>希望開催日時(第1希望)</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['year_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx01'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
〜<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>希望開催日時(第2希望)</th>
<td><?php if ($this->_tpl_vars['data']['year_2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['year_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
〜<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>会場所在地（会場名）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>会場所在地（郵便番号）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>会場所在地（都道府県）</th>
<td><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>会場所在地（市町村以下）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>会場電話番号</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>対象</th>
<td><?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']]):  echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']];  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
</tr>
<tr>
<th>受講予定人数</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>講演テーマ</th>
<td><?php if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']]):  echo ((is_array($_tmp=$this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  if (@ $this->_tpl_vars['data']['theme_text']): ?><br><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['theme_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp));  endif; ?></td>
</tr>
<tr>
<th>ビデオ</th>
<td><?php if ($this->_tpl_vars['data']['video'] == '1'): ?>あり<?php else: ?>なし<?php endif; ?></td>
</tr>
<tr>
<th>配付希望資料（必要部数）</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
部</td>
</tr>
<tr>
<th>配付希望資料（資料送付先）</th>
<td><?php if ($this->_tpl_vars['data']['receiver_address'] == 'host'): ?>主催者<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'venue'): ?>会場<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'other'): ?>その他　（<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['receiver_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
）<?php endif; ?></td>
</tr>
<tr>
<th>パソコンおよびプロジェクターの使用</th>
<td><?php if ($this->_tpl_vars['data']['use_pcprj'] == '1'): ?>使用可能<?php endif;  if ($this->_tpl_vars['data']['use_pcprj'] == '2'): ?>使用不可能<?php endif; ?></td>
</tr>
<tr>
<th>本制度・動画教材のご利用経験</th>
<td><?php if ($this->_tpl_vars['data']['exp'] == '1'): ?>前回は<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年 <?php echo $this->_tpl_vars['data']['use_month']; ?>
月 頃<?php else: ?>なし<?php endif; ?></td>
</tr>
<tr>
<th>その他連絡事項</th>
<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['connection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
</table>

<br>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstRegist" method="POST" name="frm1">
確定内容
<table cellspacing="1" class="azlist" width="90%">

<tr>
<th>講演日</th>
<td width="75%">
<select name="year_3">
<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['data']['year_3']):  if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['year_3']): ?> selected<?php endif;  else:  if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['year_1']): ?> selected<?php endif;  endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 年 
<select name="month_3">
<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['data']['month_3']):  if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['month_3']): ?> selected<?php endif;  else:  if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['month_1']): ?> selected<?php endif;  endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 月 
<select name="day_3">
<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['data']['day_3']):  if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['day_3']): ?> selected<?php endif;  else:  if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['day_1']): ?> selected<?php endif;  endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 日
</td>
</tr>
<tr>
<th>派遣先</th>
<td>
　対象 <select name="taisyou">
<option value=""></option>
<?php $_from = $this->_tpl_vars['taisyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['taisyou']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?></select><br>
紹介先 <input type="text" name="syoukai" size="40" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['syoukai'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br>
主催者名 <input type="text" name="host2" size="40" value="<?php if ($this->_tpl_vars['data']['host2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['host2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</td>
</tr>
<tr>
<th>講演テーマ</th>
<td><input type="text" name="theme2" value="<?php if (@ $this->_tpl_vars['data']['theme2']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['theme2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']]):  echo ((is_array($_tmp=$this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  endif; ?>" size="40"></td>
</tr>
<tr>
<th>派遣講師</th>
<td>
　分類 <select name="inst_type">
<option value=""></option>
<?php $_from = $this->_tpl_vars['inst_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['inst_type'] || $this->_tpl_vars['dkey'] <> 2): ?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['inst_type']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option><?php endif;  endforeach; endif; unset($_from); ?></select><br>
講師名 <input type="text" name="inst_name" size="40" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
</td>
</tr>
<tr>
<th>担当部署</th>
<td>
<select name="branch">
<option value=""></option>
<?php if ($this->_tpl_vars['data']['branch']):  $_from = $this->_tpl_vars['branch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if (( $this->_tpl_vars['dkey'] <> 3 && $this->_tpl_vars['dkey'] <> 5 && $this->_tpl_vars['dkey'] <> 14 ) || $this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['branch']): ?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['branch']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endif;  endforeach; endif; unset($_from); ?></select>
<?php else:  $_from = $this->_tpl_vars['branch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['dkey'] <> 3 && $this->_tpl_vars['dkey'] <> 5 && $this->_tpl_vars['dkey'] <> 14): ?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['branch_no'][$this->_tpl_vars['data']['lecture_prefecture']]): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endif;  endforeach; endif; unset($_from); ?></select>
<?php endif; ?>
</td>
</tr>
<tr>
<th>聴講者数</th>
<td><input type="text" name="inst_num" value="<?php if ($this->_tpl_vars['data']['inst_num']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['inst_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" size="10">人</td>
</tr>

<tr>
<th>資料送付先</th>
<td>
住所自動入力<select name="addresslist">
<option>▼選択しない</option>
<?php $_from = $this->_tpl_vars['branch_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['dkey'] <> 3 && $this->_tpl_vars['dkey'] <> 5): ?><option value="<?php echo $this->_tpl_vars['dkey']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
支部</option><?php endif;  endforeach; endif; unset($_from); ?>
</select><input type="button" value="設定する" onClick="setBranchAddress()">（※支部へ送付する場合）<br>
<br>

<?php if (! $this->_tpl_vars['data']['saddress'] && ! $this->_tpl_vars['data']['sname']):  if ($this->_tpl_vars['data']['receiver_address'] == 'host' || $this->_tpl_vars['data']['receiver_address'] == 'venue'):  if ($this->_tpl_vars['data']['receiver_address'] == 'host'): ?>
<table cellpadding="1" cellspacing="0" border="0">
<tr>
<td>郵便番号</td><td><input type="text" name="szip1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10">-<input type="text" name="szip2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10"></td>
</tr>
<tr>
<td>住所</td><td><select name="spref">
<option value="">選択してください。</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == $this->_tpl_vars['data']['prefecture']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select><br><input type="text" name="saddress" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>あて先</td><td><input type="text" name="sname" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>ご担当者名</td><td><input type="text" name="t_tantou" value="<?php if ($this->_tpl_vars['data']['t_tantou']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['t_tantou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" size="30"></td>
</tr>
<tr>
<td>電話番号</td><td><input type="text" name="stel1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8"></td>
</tr>
<tr>
<td>摘要</td>
<td><textarea name="stekiyou" cols="35" rows="3"></textarea></td>
</tr>
</table>
<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'venue'): ?>
<table cellpadding="1" cellspacing="0" border="0">
<tr>
<td>郵便番号</td><td><input type="text" name="szip1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10">-<input type="text" name="szip2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10"></td>
</tr>
<tr>
<td>住所</td><td><select name="spref">
<option value="">選択してください。</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == $this->_tpl_vars['data']['lecture_prefecture']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select><br><input type="text" name="saddress" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>あて先</td><td><input type="text" name="sname" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>ご担当者名</td><td><input type="text" name="t_tantou" value="<?php if ($this->_tpl_vars['data']['t_tantou']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['t_tantou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" size="30"></td>
</tr>
<tr>
<td>電話番号</td><td><input type="text" name="stel1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8"></td>
</tr>
<tr>
<td>摘要</td>
<td><textarea name="stekiyou" cols="35" rows="3"></textarea></td>
</tr>
</table>
<?php endif;  else: ?>
<table cellpadding="1" cellspacing="0" border="0">
<tr>
<td>郵便番号</td><td><input type="text" name="szip1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10">-<input type="text" name="szip2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10"></td>
</tr>
<tr>
<td>住所</td><td><select name="spref">
<option value="">選択してください。</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == $this->_tpl_vars['data']['spref']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select><br><input type="text" name="saddress" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>あて先</td><td><input type="text" name="sname" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>ご担当者名</td><td><input type="text" name="t_tantou" value="<?php if ($this->_tpl_vars['data']['t_tantou']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['t_tantou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  if ($this->_tpl_vars['data']['receiver_address'] == 'host'):  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  endif; ?>" size="30"></td>
</tr>
<tr>
<td>電話番号</td><td><input type="text" name="stel1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8"></td>
</tr>
<tr>
<td>摘要</td>
<td><textarea name="stekiyou" cols="35" rows="3"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stekiyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
</table>
<?php endif;  else: ?>

<table cellpadding="1" cellspacing="0" border="0">
<tr>
<td>郵便番号</td><td><input type="text" name="szip1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10">-<input type="text" name="szip2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['szip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10"></td>
</tr>
<tr>
<td>住所</td><td><select name="spref">
<option value="">選択してください。</option>
<?php $_from = $this->_tpl_vars['prefs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop_pref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop_pref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['datum']):
        $this->_foreach['loop_pref']['iteration']++;
?><option value="<?php echo $this->_foreach['loop_pref']['iteration']; ?>
"<?php if ($this->_foreach['loop_pref']['iteration'] == $this->_tpl_vars['data']['spref']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select><br><input type="text" name="saddress" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['saddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>あて先</td><td><input type="text" name="sname" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['sname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="60"></td>
</tr>
<tr>
<td>ご担当者名</td><td><input type="text" name="t_tantou" value="<?php if ($this->_tpl_vars['data']['t_tantou']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['t_tantou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" size="30"></td>
</tr>
<tr>
<td>電話番号</td><td><input type="text" name="stel1" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8">-<input type="text" name="stel3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="8"></td>
</tr>
<tr>
<td>摘要</td>
<td><textarea name="stekiyou" cols="35" rows="3"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['stekiyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
</table>
<?php endif; ?>

</td>
</tr>

<tr>
<th>配付資料</th>
<td>
  <table cellpadding="1" cellspacing="0" border="0">
<!--  <tr>
  <td colspan="2">
<?php if ($this->_tpl_vars['doclist']): ?>
<ul class="sdocs">
<?php $_from = $this->_tpl_vars['doclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']['visible']): ?><li><input type="checkbox" name="sdoc[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['data']['sdocs']):  $_from = $this->_tpl_vars['data']['sdocs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if ($this->_tpl_vars['datum2'] == $this->_tpl_vars['datum']['id']): ?> checked<?php endif;  endforeach; endif; unset($_from);  endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li>
<?php else:  if ($this->_tpl_vars['data']['sdocs']):  $_from = $this->_tpl_vars['data']['sdocs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if ($this->_tpl_vars['datum2'] == $this->_tpl_vars['datum']['id']): ?><li><span style="color:#555555;">・<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span></li>
<?php endif;  endforeach; endif; unset($_from);  endif;  endif;  endforeach; endif; unset($_from); ?>
</ul>
<br clear="all">
<?php endif; ?>

<?php $_from = $this->_tpl_vars['shiryou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['shiryou']):  echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  endforeach; endif; unset($_from); ?>
  </td>
  </tr>
  <tr>
  <td>配付資料部数</td><td><input type="text" name="shiryou_num" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['shiryou_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="10"> 部</td>
  </tr>
-->

<tr>
  <td colspan="2">
<?php if ($this->_tpl_vars['doclist'] && $this->_tpl_vars['data']['sdocs']): ?>
<ul class="sdocs">
<?php $_from = $this->_tpl_vars['doclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']['visible']): ?><li><?php if ($this->_tpl_vars['data']['sdocs']):  $_from = $this->_tpl_vars['data']['sdocs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if ($this->_tpl_vars['datum2'] == $this->_tpl_vars['datum']['id']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<input type="hidden" name="sdoc[]" value=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
><?php endif;  endforeach; endif; unset($_from);  endif; ?></li>
<?php else:  if ($this->_tpl_vars['data']['sdocs']):  $_from = $this->_tpl_vars['data']['sdocs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if ($this->_tpl_vars['datum2'] == $this->_tpl_vars['datum']['id']): ?><li><span style="color:#555555;">・<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<input type="hidden" name="sdoc[]" value=<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
></span></li>
<?php endif;  endforeach; endif; unset($_from);  endif;  endif;  endforeach; endif; unset($_from); ?>
</ul>
<br clear="all">
<?php endif; ?>

<?php if ($this->_tpl_vars['shiryou']):  $_from = $this->_tpl_vars['shiryou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['shiryou']):  echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  endforeach; endif; unset($_from);  endif; ?>
  </td>
  </tr>
<?php if ($this->_tpl_vars['data']['shiryou_num']): ?>
  <tr>
  <td>配付資料部数</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['shiryou_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 部</td>
  </tr>
<?php endif; ?>

  <tr>
  <td colspan="2">
<?php if ($this->_tpl_vars['books']): ?>
<table width="100%">
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['datum']['warn_stock'] == 2): ?> <div style="display:inline;float:right;color:red;">在庫無し</div><?php endif;  if ($this->_tpl_vars['datum']['warn_stock'] == 1): ?> <div style="display:inline;float:right;color:red;">残部少</div><?php endif; ?></td><td><input type="text" name="order_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="4" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">部</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
  </td>
  </tr>

  <tr>
  <td>その他</td><td><textarea name="shiryou_other" cols="30" rows="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['shiryou_other'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td> 
  </tr>
  <tr>
  <td>「その他の資料」手配担当</td><td><input type="radio" name="stantou" value="1"<?php if ($this->_tpl_vars['data']['stantou'] == 1): ?> checked<?php endif; ?>>本部　<input type="radio" name="stantou" value="2"<?php if ($this->_tpl_vars['data']['stantou'] == 2): ?> checked<?php endif; ?>>担当支部　<input type="radio" name="stantou" value="0"<?php if (! $this->_tpl_vars['data']['stantou']): ?> checked<?php endif; ?>>なし<br>
  </td>
  </tr>

  <tr>
  <td>資料到着希望日</td>
  <td><select name="syear">
<option value=""></option>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['syear']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 年 
<select name="smonth">
<option value=""></option>
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['smonth']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 月 
<select name="sday">
<option value=""></option>
<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['sday']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 日<br>
  </td>
  </tr>

  <tr>
  <td>発送登録</td>
  <td><input type="radio" name="sregist" value="1"<?php if ($this->_tpl_vars['data']['sregist'] == 1): ?> checked<?php endif; ?>>する　<input type="radio" name="sregist" value="2"<?php if ($this->_tpl_vars['data']['sregist'] == 2 || ! $this->_tpl_vars['data']['sregist']): ?> checked<?php endif; ?>>しない</td>
  </tr>
  <tr>
  <td>発送状況（旧）</td>
  <td>
<?php if ($this->_tpl_vars['data']['is_new'] == 0):  if ($this->_tpl_vars['data']['sregist'] == 1):  if ($this->_tpl_vars['data']['sdocs']): ?>
  <?php if ($this->_tpl_vars['data']['t_status'] == 1): ?>
    <?php if ($this->_tpl_vars['data']['t_status2'] == 1): ?>発送済み
    <?php else: ?>発送承認済み
    <?php endif; ?>
  <?php else: ?>
    <?php if ($this->_tpl_vars['data']['t_status'] == 0): ?>発送承認待ち
    <?php endif; ?>
  <?php endif;  endif;  endif;  endif; ?>&nbsp;</td>
  </tr>
  <tr>
  <td>発送状況</td>
  <td>
<?php if ($this->_tpl_vars['data']['sregist'] == 1): ?>
  <?php if ($this->_tpl_vars['data']['approve'] == 1): ?><span style="color:red;">
    <?php if ($this->_tpl_vars['data']['trans_status'] == 1): ?>対応中
    <?php elseif ($this->_tpl_vars['data']['trans_status'] == 2): ?>発送済み
    <?php else: ?>承認済み
    <?php endif; ?></span>
  <?php else:  if ($this->_tpl_vars['data']['approve'] <> 99): ?>承認待ち<?php endif; ?>
  <?php endif;  endif; ?>&nbsp;</td>
  </tr>

  </table>

</td>
</tr>
<tr>
<th>聴講状態</th>
<td>
<select name="inst_condition">
<option value=""></option>
<?php $_from = $this->_tpl_vars['inst_condition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dkey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['inst_condition']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?></select>
</td>
</tr>
<tr>
<th>講演時間</th>
<td>
<select name="inst_hour">
<?php $_from = $this->_tpl_vars['hours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['inst_hour']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?></select>時間 
<select name="inst_min">
<?php $_from = $this->_tpl_vars['mins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['datum'] == $this->_tpl_vars['data']['inst_min']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
<?php endforeach; endif; unset($_from); ?></select>分 
</td>
</tr>
<tr>
<th>備考</th>
<td>
<textarea name="bikou" cols="30" rows="3"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['bikou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
</td>
</tr>
<tr>
<th>ステータス</th>
<td><select name="status">
<?php $_from = $this->_tpl_vars['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
?><option value="<?php echo $this->_tpl_vars['dkey']; ?>
"<?php if ($this->_tpl_vars['dkey'] == $this->_tpl_vars['data']['status']): ?> selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<?php endforeach; endif; unset($_from); ?>
</select></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="　更新　" onClick="return checkStatus();"><input type="hidden" name="mode" value="preview"></td>
</tr>
</table>
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>
<a href="/manage/forms/index.php/module/FormManage/action/InstList?y=<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;br=<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;st=<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>&amp;ts=<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">戻る</a>
</div>
</body>
</html>