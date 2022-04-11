<?php /* Smarty version 2.6.9, created on 2021-07-27 17:53:26
         compiled from addconfirm.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'addconfirm.html', 48, false),array('modifier', 'nl2br', 'addconfirm.html', 183, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>日本損害保険協会 - SONPO | お役立ち情報 − 講師派遣のご案内 − 入力内容確認画面</title>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<link rel="stylesheet" type="text/css" href="/useful/css/import.css">
<link rel="stylesheet" type="text/css" href="/common/css/fmedium.css" title="medium">
<link rel="stylesheet" type="text/css" href="/common/css/flarge.css" title="large">
<link rel="stylesheet" type="text/css" href="/common/css/fexlarge.css" title="exlarge">
<script type="text/javascript" src="/common/js/check.js"></script>
<script type="text/javascript" src="/common/js/fontsize.js"></script>
<script type="text/javascript" src="/common/js/share.js"></script>

<script language="javascript">
<!---

//-->
</script>
<style>
<?php echo '
body{
  background:none;
}
'; ?>

</style>
<link rel=STYLESHEET href="/css/manage.css" type="text/css">
</head>
<body id="useful-form" style="padding-left:5px;background:#ffffff;">
<a name="top"></a>
<div align="left">
<br>
<h2 style="font-size:130%; padding-left:5px;">日本損害保険協会・講師派遣 管理画面</h2>
<h3>講師派遣（追加登録・内容確認）</h3>
</div>
<div id="wrapper">
	<div id="inbox">

		<!-- メインエリア -->
		<div id="main">
			<!-- コンテンツエリア -->
			<div id="content">
				<!-- content title -->

				<!-- //content title -->

<form method="post" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstAdd" name="confForm">
				<!-- 主催者情報 -->
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">
						<tr>
							<td colspan="2" class="gray01"><strong>主催者情報</strong></td>
						</tr>

						<tr>
							<td valign="top" class="gray02"><strong>主催者名</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['host'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>所在地</strong></td>
							<td valign="top">

								<table border="0" cellspacing="0" cellpadding="2">
									<tr>
										<td valign="top" style="border:none; padding:2px;" class="text2">郵便番号</td>
										<td style="border:none; padding:2px;" class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['post2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>
									<tr>
										<td style="border:none; padding:2px;" class="text2">都道府県</td>

										<td style="border:none; padding:2px;" class="text2"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']]):  echo $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['prefecture']];  endif; ?></td>
									</tr>
									<tr>
										<td nowrap valign="top" style="border:none; padding:2px;" class="text2">市区町村以下</td>
										<td style="border:none; padding:2px;" class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>
								</table>

							</td>
						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>電話番号</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['data']['naisen']): ?><br>内線：<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['naisen'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
						</tr>
				<tr>

					<td valign="top" class="gray02"><strong>FAX番号</strong></td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['fax3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
				</tr>

						<tr>
							<td valign="top" class="gray02"><strong>ご担当者名</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_last'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['person_kana_first'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>ご担当者役職</strong></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['yaku'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>

						</tr>
						<tr>
							<td valign="top" class="gray02"><strong>メールアドレス</strong></td>
							<td valign="top"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>

					</table>
				</div>

				<!-- //主催者情報 -->

				<!-- 講演会内容 -->
				<div class="contentBlock1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list">
						<tr>
							<td colspan="2" class="gray01 text2"><strong>講演会内容</strong></td>

						</tr>

						<tr>
							<td valign="top" class="text2 gray02" nowrap><strong>希望開催日時</strong></td>
							<td align="left">
								<table border="0" cellspacing="0" cellpadding="0" class="noborder text2">
									<tr>
										<td valign="top" align="left" nowrap>第1希望&nbsp;</td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['year_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx01'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
) <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
時<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
分〜<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
時<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
分<?php if ($this->_tpl_vars['date_warn_1']): ?><br><span style="color:red">希望開催日まで1ヶ月を切っているためお引き受けできない場合があります</span><?php endif; ?></td>

									</tr>
<?php if ($this->_tpl_vars['data']['year_2']): ?>									<tr>
										<td valign="top" align="left" nowrap>第2希望&nbsp;</td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['year_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['month_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
日(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['wTx02'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
) <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
時<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_from_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
分〜<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['hour_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
時<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['min_to_2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
分<?php if ($this->_tpl_vars['date_warn_2']): ?><br><span style="color:red">希望開催日まで1ヶ月を切っているためお引き受けできない場合があります</span><?php endif; ?></td>

									</tr><?php endif; ?>
								</table>
							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>会場<br>所在地</strong></td>

							<td valign="top">

								<table border="0" cellspacing="0" cellpadding="2" class="noborder text2">
									<tr>
										<td valign="top" style="border:none; padding:2px;">会場名</td>
										<td style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_hall'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>

									<tr>
										<td valign="top" style="border:none; padding:2px;">郵便番号</td>
										<td style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_zip2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>

									<tr>
										<td style="border:none; padding:2px;">都道府県</td>

										<td style="border:none; padding:2px;"><?php if (@ $this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']]):  echo ((is_array($_tmp=$this->_tpl_vars['prefs'][$this->_tpl_vars['data']['lecture_prefecture']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></td>
									</tr>
									<tr>
										<td nowrap valign="top" style="border:none; padding:2px;">市区町村以下</td>
										<td style="border:none; padding:2px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									</tr>
								</table>

							</td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>会場<br>電話番号</strong></td>
							<td class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['lecture_tel3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>講演対象</strong></td>
							<td class="text2"><?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']]):  echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']];  endif;  echo ((is_array($_tmp=$this->_tpl_vars['data']['object_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>受講予定人数</strong></td>
							<td class="text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['object_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
人 </td>

						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>講演テーマ</strong></td>
							<td valign="top" class="text2"><?php if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']]):  echo ((is_array($_tmp=$this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif;  if ($this->_tpl_vars['data']['themes'] == '99'): ?><br><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['theme_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp));  endif; ?></td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>ビデオ</strong></td>

							<td valign="top" class="text2">希望<?php if (@ $this->_tpl_vars['data']['video'] == '1'): ?>する<?php else: ?>しない<?php endif; ?></td>
						</tr>
						<tr>
							<td valign="top" class="text2 gray02"><strong>資料送付先</strong></td>
							<td valign="top" class="text2">必要部数：<?php if (@ $this->_tpl_vars['data']['copy']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?> 部<br>
							資料送付先：<?php if (@ $this->_tpl_vars['data']['receiver_address'] == 'host'): ?>主催者<?php endif;  if (@ $this->_tpl_vars['data']['receiver_address'] == 'venue'): ?>会場<?php endif;  if (@ $this->_tpl_vars['data']['receiver_address'] == 'other'): ?>その他　（<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['receiver_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
）<?php endif; ?></td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>パソコンおよびプロジェクターの使用</strong></td>
							<td valign="top" class="text2"><?php if (@ $this->_tpl_vars['data']['use_pcprj'] == '1'): ?>使用可能<?php else: ?>使用不可能<?php endif; ?></td>
						</tr>

						<tr>
							<td valign="top" class="text2 gray02"><strong>本制度の<br>ご利用経験</strong></td>
							<td valign="top" class="text2"><?php if (@ $this->_tpl_vars['data']['exp'] == '1'): ?>あり<br>
								<?php if (@ $this->_tpl_vars['data']['use_year'] || @ $this->_tpl_vars['data']['use_month']): ?>前回は<?php if (@ ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年 <?php endif;  if (@ $this->_tpl_vars['data']['use_month']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 月 <?php endif; ?>頃<?php endif;  else: ?>なし<?php endif; ?></td>
						</tr>
					</table>
					<br>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_list text2">

				<tr>
<td class="gray01"><strong>その他連絡事項等ございましたら、ご記入ください。</strong></td></tr><tr><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['connection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>				</tr>


					</table>
				</div>

				<!-- //講演会内容 -->

				<div class="contentBlock1">
					<div class="clearfix text2" align="center">
						<input type="submit" value="保存"><input type="hidden" name="mode" value="submit"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
					</div>
				</div>
				</form>
					<!-- //講師派遣のご案内 -->
<input type="button" value="戻る" onClick="document.form04.submit();">
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['script_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/module/FormManage/action/InstAdd" name="form04" method="POST">
<input type="hidden" name="mode" value="rewrite"><input type="hidden" name="token" value="<?php if (@ $this->_tpl_vars['token']):  echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="y" value="<?php if (@ $this->_tpl_vars['year']):  echo ((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="br" value="<?php if (@ $this->_tpl_vars['nbranch']):  echo ((is_array($_tmp=$this->_tpl_vars['nbranch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="st" value="<?php if (@ $this->_tpl_vars['nstatus']):  echo ((is_array($_tmp=$this->_tpl_vars['nstatus'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
<input type="hidden" name="ts" value="<?php if (@ $this->_tpl_vars['ntaisyou']):  echo ((is_array($_tmp=$this->_tpl_vars['ntaisyou'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">
</form>

			</div>

			<!-- //コンテンツエリア -->
		</div>

		<!-- //メインエリア -->
	</div>

</div>
</body>

</html>
