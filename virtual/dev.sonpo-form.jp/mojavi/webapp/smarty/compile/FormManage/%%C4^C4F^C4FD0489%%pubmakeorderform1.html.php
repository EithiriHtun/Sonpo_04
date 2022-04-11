<?php /* Smarty version 2.6.9, created on 2021-04-27 13:55:18
         compiled from pubmakeorderform1.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pubmakeorderform1.html', 64, false),)), $this); ?>
<html>
<head>
<title>日本損害保険協会・刊行物 管理画面</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel=STYLESHEET href="/css/manage.css" type="text/css">

<link rel="stylesheet" type="text/css" href="/archive/css/import.css">
<link rel="stylesheet" type="text/css" href="/common/css/fmedium.css" title="medium">
<link rel="stylesheet" type="text/css" href="/common/css/flarge.css" title="large">
<link rel="stylesheet" type="text/css" href="/common/css/fexlarge.css" title="exlarge">
<script type="text/javascript" src="/common/js/check.js"></script>
<script type="text/javascript" src="/common/js/fontsize.js"></script>
<script type="text/javascript" src="/common/js/share.js"></script>

<script type="text/javascript" src="/manage/cm.js"></script>
<script>
<!--
<?php echo '
function checkBook(){
  var max=document.reportform.elements.length;
  var books=0;
  for(i=0;i<max;i++){
    temp=document.reportform.elements[i].name.split("_");
    if(temp[0]=="order"){
      if(document.getElementById(\'order_\'+temp[1]).value){
        books+=document.getElementById(\'order_\'+temp[1]).value * 1;
      }
    }
  }
  document.getElementById("copies").value=books;
}
'; ?>

//-->
</script>
</head>

<body id="archive-form">
<a name="top"></a>
<div id="wrapper">
	<div id="inbox">

		<!-- メインエリア -->
		<div id="main">
			<!-- コンテンツエリア -->
			<div id="content">


<a href="/manage/forms/index.php/module/FormManage/action/PubIndex">戻る</a>

<br>
<br>

				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">刊行物申込</span></h2>

				<div class="contentBlock">
					<img src="/archive/publish/img/step_01.gif" width="670" height="33" border="0" alt="刊行物の選択">
				</div>

<?php if ($this->_tpl_vars['errors']): ?>
					<div class="contentBlock" style="border:#aaaaaa solid 1px;background:#ffcccc;">
						<div class="clearfix text2">
							<p><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>　<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span></p>
						</div>
					</div>
<br clear="all">
<?php endif; ?>
				<form method="post" action="/manage/forms/index.php/module/FormManage/action/PubMakeOrder" name="reportform">
				<input type="hidden" name="mode" value="form2"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo $this->_tpl_vars['token'];  endif; ?>">
					<div class="subt1">
						<div class="frm">
							<p class="text2">刊行物の選択</p>
						</div>
					</div>
					<div class="contentBlock1">
						<div class="clearfix text2">※申し込み部数は半角数字で入力してください。</div>
					</div>
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']): ?>
					<div class="subt2">
						<div class="frm">
							<p class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['category'][$this->_tpl_vars['dkey']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
						</div>
					</div>
					<div class="contentBlock2">
						<div class="clearfix">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="archive_list text2">
								<tr>
									<td align="center" class="gray01"><strong>冊子名</strong></td>
									<td align="center" nowrap class="gray01" style="width:90px;"><strong>申し込み部数</strong></td>
								</tr>
  <?php $_from = $this->_tpl_vars['datum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
?>
								<tr>
									<td><?php if ($this->_tpl_vars['datum2']['url']): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" target="_blank"><?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum2']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['datum2']['url']): ?></a><?php endif;  if ($this->_tpl_vars['datum2']['stock'] > 0 && $this->_tpl_vars['datum2']['stock'] < $this->_tpl_vars['datum2']['border']): ?><span style="color:red;">【残少】</span><?php endif; ?></td>
									<td align="center"><?php if ($this->_tpl_vars['datum2']['stock'] > 0): ?><input type="text" id="order_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="order_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onkeyup="checkBook();">&nbsp;部<?php else: ?><span style="color:red;">在庫なし</span><?php endif; ?></td><hidden id="price_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
								</tr>
  <?php endforeach; endif; unset($_from); ?>
							</table>
						</div>
					</div>

<?php endif;  endforeach; endif; unset($_from); ?>
					<div class="contentBlock1">
						<div class="clearfix">
							<table width="100%" class="text2">
								<tr>
									<td align="center"><b> 合計部数：
									<input type="text" id="copies" name="copies" size="3" value="<?php if (@ $this->_tpl_vars['data']['total_count']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['total_count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" class="Explanation2">
									部&nbsp;&nbsp;<!--／&nbsp;&nbsp;刊行物代金：
									<input type="text" name="postage" size="8" value="<?php if (@ $this->_tpl_vars['data']['total_price']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['total_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" class="Explanation2"> 円-->
									</b></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix text2 btn">
							<input type="submit" value="&nbsp;&nbsp;お届け先情報を入力する&nbsp;&nbsp;">
						</div>
					</div>
				</form>
				<!-- //送付先-->
				<!-- colorCFライン-->
				<div class="lineCF"></div>
				<!-- //colorCFライン-->

<a href="/manage/forms/index.php/module/FormManage/action/PubIndex">戻る</a>

			</div>

			<!-- //コンテンツエリア -->
		</div>
		<!-- //メインエリア -->


	</div>
</div>
</body>
</html>