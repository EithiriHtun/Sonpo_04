<?php /* Smarty version 2.6.9, created on 2022-03-10 11:45:07
         compiled from instinactivelist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'instinactivelist.html', 84, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物・講師派遣関連 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
<script language="javascript">
<!--
<?php echo '
var allSel=false;
function fnc_all_click(objAll){
	if(allSel){
	  allSel=false;
	  document.getElementById("btnSelChk").value="全選択";
	}else{
	  allSel=true;
	  document.getElementById("btnSelChk").value="全解除";
	}

	for(var i=0;i<document.frm1.length;i++){
		//チェックボックスであれば
		if(document.frm1[i].type=="checkbox"){
			document.frm1[i].checked = allSel;
		}
	}
}

function checkchecked(){
  var is_check=0;
  var ids=\'\';
  for(index = 0; index < document.frm1.elements["dl[]"].length; index++){
    if(document.frm1.elements["dl[]"][index].checked){
      is_check=is_check+1;
      ids=ids + document.frm1.elements["inst_id[]"][index].value + "\\n";
    }
  }
  
  if(!is_check){
    alert(\'データが選択されていません。\');
    return false;
  }else{
    return confirm(\'選択したデータを元に戻してよろしいですか？\'+ "\\n" + ids);
  }

}

function checkchecked2(){
  var is_check=0;
  var ids=\'\';
  for(index = 0; index < document.frm1.elements["dl[]"].length; index++){
    if(document.frm1.elements["dl[]"][index].checked){
      is_check=is_check+1;
      ids=ids + document.frm1.elements["inst_id[]"][index].value + "\\n";
    }
  }
  
  if(!is_check){
    alert(\'データが選択されていません。\');
    return false;
  }else{
    conf=confirm(\'選択したデータを完全に削除してよろしいですか？\'+ "\\n" + ids);
    if(conf){
      document.frm1.do_mode.value="delete";
      return true;
    }else{
      return false;
    }
  }

}

//-->
'; ?>

</script>
</head>

<body bgcolor="#FFFFFF">
<h2>日本損害保険協会・講師派遣 管理画面</h2>
<h3>講師派遣削除データ（一覧）</h3>
<!--<?php if (@ $this->_tpl_vars['action_memory_usage']):  echo $this->_tpl_vars['action_memory_usage'];  endif; ?>-->
<!--<?php if (@ $this->_tpl_vars['action_memory_usage2']):  echo $this->_tpl_vars['action_memory_usage2'];  endif; ?>-->
<!--<?php if (@ $this->_tpl_vars['memory_usage']):  echo $this->_tpl_vars['memory_usage'];  endif; ?>-->
<div class="maincontents">

<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstList?y=<?php echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&br=<?php echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&st=<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&ts=<?php echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">講師派遣一覧に戻る</a>
<hr>
<div align="right">
［<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/Logout">ログアウト</a>］
</div>

<?php if ($this->_tpl_vars['data']): ?>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstActivate" method="POST" name="frm1">
<table cellspacing="1" class="azlist">
<tr>
<th>受付番号</th>
<th>講演日</th>
<th>担当部署</th>
<th>対象</th>
<th>主催者</th>
<th>講演テーマ</th>
<th>ステータス</th>
<th>発送状況（旧）</th>
<th>発送状況</th>
<th>チェック</th>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>
<tr>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
<td><?php if (@ $this->_tpl_vars['datum']['year_3']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['year_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['month_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['day_3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo ((is_array($_tmp=$this->_tpl_vars['datum']['year_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['month_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['day_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if (@ $this->_tpl_vars['datum']['year_2']): ?>(<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['year_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['month_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['day_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php endif;  endif; ?></td>
<td><?php if (@ $this->_tpl_vars['branch'][$this->_tpl_vars['datum']['branch']]):  echo ((is_array($_tmp=$this->_tpl_vars['branch'][$this->_tpl_vars['datum']['branch']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  if (@ $this->_tpl_vars['branch_no2'][$this->_tpl_vars['datum']['lecture_prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['branch_no2'][$this->_tpl_vars['datum']['lecture_prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  endif; ?></td>
<td><?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']]):  echo ((is_array($_tmp=$this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
<td><?php if (@ $this->_tpl_vars['datum']['host2']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['host2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo $this->_tpl_vars['datum']['host'];  endif; ?>&nbsp;</td>
<td><?php if (@ $this->_tpl_vars['datum']['theme2']):  echo ((is_array($_tmp=$this->_tpl_vars['datum']['theme2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else:  echo $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']];  endif; ?>&nbsp;</td>
<td><?php if (@ $this->_tpl_vars['inst_status'][$this->_tpl_vars['datum']['status']]):  echo ((is_array($_tmp=$this->_tpl_vars['inst_status'][$this->_tpl_vars['datum']['status']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
<!-- old --><td>
<?php if (@ $this->_tpl_vars['datum']['is_new'] == 0):  if (@ $this->_tpl_vars['datum']['sdocs']): ?>
  <?php if (@ $this->_tpl_vars['datum']['sregist'] == 1): ?>
    <?php if (@ $this->_tpl_vars['datum']['t_status'] == 1): ?>
      <?php if (@ $this->_tpl_vars['datum']['t_status2'] == 1): ?>発送済み
      <?php else: ?>発送承認済み
      <?php endif; ?>
    <?php else: ?>
      <?php if (@ $this->_tpl_vars['datum']['t_status'] == 0): ?>発送承認待ち
      <?php endif; ?>
    <?php endif; ?>
  <?php endif;  endif;  endif; ?>&nbsp;
</td>
<td>
<?php if (@ $this->_tpl_vars['datum']['sregist'] == 1):  if (@ $this->_tpl_vars['datum']['approve'] == 1):  if (@ $this->_tpl_vars['datum']['trans_status'] == 1): ?>対応中<?php elseif (@ $this->_tpl_vars['datum']['trans_status'] == 2): ?>発送済み<?php else: ?>承認済み<?php endif;  else:  if (@ $this->_tpl_vars['datum']['approve'] <> 99): ?>承認待ち<?php endif;  endif;  endif; ?>
&nbsp;</td>
<td align="center"><input type="checkbox" name="dl[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><input type="hidden" name="inst_id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum']['inst_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<input type="hidden" name="dl[]" value="">
<input type="hidden" name="inst_id[]" value="">
<tr><td colspan="9">&nbsp;</td><td><input type="button" value="全選択" id="btnSelChk" onClick="fnc_all_click(this);"></td></tr>
</table>
<div>
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['status']):  echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">

<input type="hidden" name="do_mode" value="activate">
<?php if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><input type="submit" value="チェックしたデータを元に戻す" onClick="return checkchecked();"><?php endif;  if ($this->_tpl_vars['is_master'] || $this->_tpl_vars['is_master2']): ?><input type="submit" value="チェックしたデータを完全に削除する" onClick="return checkchecked2();"><?php endif; ?>
</form>
<?php endif; ?>
<br><hr>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstList?y=<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'));  endif; ?>&br=<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'));  endif; ?>&st=<?php if (@ $this->_tpl_vars['status']):  echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'));  endif; ?>&ts=<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'));  endif; ?>">講師派遣一覧に戻る</a>

</div>
</body>
</html>