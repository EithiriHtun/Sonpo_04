<?php /* Smarty version 2.6.9, created on 2022-03-18 12:27:34
         compiled from form1.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form1.html', 83, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>����»���ݸ����� - SONPO | ���׎�����ʪ������ �� ����ʪ �� ����ʪ������</title>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta name="keywords" content="»���ݸ����ɺҡ����ȡ��罸�ͻ�������ҳ����Ͽ̡��������ݸ����ɲС����̻��Ρ�»���ݸ�����Ź��»���ݸ���Ͽ����͡�»��">
<meta name="description" content="»���ݸ���Ҥλ��ȼ����Ρ����̼���ˡ�� ����»���ݸ�����Υ����ȡ�»���ݸ��ȳ��Υ˥塼����Ϥ��ᡢ»���ݸ��δ���Ū���μ������ס��ɺҡ����ȡ����̰����˴ؤ���������ܡ�">
<link rel="stylesheet" type="text/css" href="/archive/css/import.css">
<link rel="stylesheet" type="text/css" href="/common/css/fmedium.css" title="medium">
<link rel="stylesheet" type="text/css" href="/common/css/flarge.css" title="large">
<link rel="stylesheet" type="text/css" href="/common/css/fexlarge.css" title="exlarge">
<script type="text/javascript" src="/common/js/check.js"></script>
<script type="text/javascript" src="/common/js/fontsize.js"></script>
<script type="text/javascript" src="/common/js/share.js"></script>
<script>
<!--
<?php echo '
function checkBook(){
  var max=document.reportform.elements.length;
  var books=0;
  var price=0;
  for(i=0;i<max;i++){
    temp=document.reportform.elements[i].name.split("_");
    if(temp[0]=="order"){
      if(document.getElementById(\'order_\'+temp[1]).value){
        price+=document.getElementById(\'order_\'+temp[1]).value * document.getElementById(\'price_\'+temp[1]).value;
        books+=document.getElementById(\'order_\'+temp[1]).value * 1;
      }
    }
  }
  document.getElementById("copies").value=books;
  document.getElementById("postage").value=price;
}
'; ?>

//-->
</script>
</head>
<body id="archive-form">
<a name="top"></a>
<div id="wrapper">
	<div id="inbox">

<script type="text/javascript">
<?php echo '
  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-16600020-1\']);
  _gaq.push([\'_setDomainName\', \'.sonpo.or.jp\']);
  _gaq.push([\'_trackPageview\', \'/archive/publish/form_input1.html\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();
'; ?>

</script>

		<!-- �إå� -->
		<div id="head">
			<h1 id="title"><a href="http://www.sonpo.or.jp/"><img src="/common/ssi/img/logo.gif" width="288" height="34" border="0" alt="����»���ݸ����� SONPO"></a></h1>
		</div>

		<!-- //�إå� -->

		<!-- �ᥤ�󥨥ꥢ -->
		<div id="main">
			<!-- ����ƥ�ĥ��ꥢ -->
			<div id="content">

				<!-- content title -->
				<h2 class="lineCFhead"><span class="text2">����ʪ����������</span></h2>

				<div class="contentBlock">
					<img src="./img/step_01.gif" width="670" height="33" border="0" alt="����ʪ������">
				</div>

<?php if ($this->_tpl_vars['errors']): ?>
					<div class="contentBlock" style="border:#aaaaaa solid 1px;background:#ffcccc;">
						<div class="clearfix text2">
							<p><br>
<span style="color:red;font-weight:bold;"><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>��<?php echo ((is_array($_tmp=$this->_tpl_vars['datum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br /><?php endforeach; endif; unset($_from); ?></span></p>
						</div>
					</div>
<br clear="all">
<?php endif; ?>
				<form method="post" action="form.php" autocomplete="off" name="reportform">
				<input type="hidden" name="mode" value="form2"><input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
">
					<div class="subt1">
						<div class="frm">
							<p class="text2">����ʪ������</p>
						</div>
					</div>
					<div class="contentBlock1">
						<div class="clearfix text2">����������������Ⱦ�ѿ��������Ϥ��Ƥ���������</div>
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
									<td align="center" class="gray01"><strong>����̾</strong></td>
									<td align="center" nowrap class="gray01" style="width:90px;"><strong>������������</strong></td>
								</tr>
  <?php $_from = $this->_tpl_vars['datum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
?>
								<tr>
									<td><?php if ($this->_tpl_vars['datum2']['url']): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" target="_blank"><?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['datum2']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['datum2']['url']): ?></a><?php endif;  if ($this->_tpl_vars['datum2']['stock'] > 0 && $this->_tpl_vars['datum2']['stock'] < $this->_tpl_vars['datum2']['border']): ?><span style="color:red;">�ڻľ���</span><?php endif; ?></td>
									<td align="center"><?php if ($this->_tpl_vars['datum2']['stock'] > 0): ?><input type="text" id="order_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="order_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onkeyup="checkBook();">&nbsp;��<?php else: ?><span style="color:red;">�߸ˤʤ�</span><?php endif; ?></td><input type="hidden" id="price_<?php echo ((is_array($_tmp=$this->_tpl_vars['datum2']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
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
									<td align="center"><b> ���������
									<input type="text" name="copies" id="copies" size="3" value="<?php if (@ $this->_tpl_vars['data']['total_count']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['total_count'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" class="Explanation2">
									��&nbsp;&nbsp;��&nbsp;&nbsp;����ʪ��⡧
									<input type="text" name="postage" id="postage" size="8" value="<?php if (@ $this->_tpl_vars['data']['total_price']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['total_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>" class="Explanation2"> ��
									</b></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="contentBlock1">
						<div class="clearfix text2 btn">
							<input type="reset" class="btnback" value="&nbsp;&nbsp;���&nbsp;&nbsp;" onclick="location.href='form.php';">
							&nbsp;&nbsp;
							<input type="submit" value="&nbsp;&nbsp;���Ϥ����������Ϥ���&nbsp;&nbsp;">
						</div>
					</div>
				</form>
				<!-- //������-->
				<!-- colorCF�饤��-->
				<div class="lineCF"></div>
				<!-- //colorCF�饤��-->

				<!-- �ڡ�������Ƭ����� -->
				<div class="topLink"><p class="text2"><a href="#top" class="totop">�ڡ�������Ƭ�����</a></p></div>
				<!-- �ڡ�������Ƭ����� -->
			</div>

			<!-- //����ƥ�ĥ��ꥢ -->
		</div>
		<!-- //�ᥤ�󥨥ꥢ -->

		<!-- �եå� -->
		<div id="foot">
			<div id="copy"><a href="/index.html"><img src="/common/ssi/img/copyright.gif" width="400" height="10" border="0" alt="Copyright (c)  The General Insurance Association of Japan. All rights reserved."></a></div>
		</div>
		<!-- //�եå� -->

	</div>
</div>
</body>
</html>