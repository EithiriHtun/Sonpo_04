<?php /* Smarty version 2.6.9, created on 2022-03-14 09:25:58
         compiled from mail/pub_usermail.txt */ ?>
<?php echo $this->_tpl_vars['data']['name1']; ?>
 <?php echo $this->_tpl_vars['data']['name2']; ?>
様

刊行物のお申し込みをいただき誠にありがとうございます。
お申し込み手続きが完了いたしました。

受付番号：<?php echo $this->_tpl_vars['recept_id']; ?>


【お問い合わせ先】
　日本損害保険協会
　業務企画部啓発・教育グループ
　TEL：03-3255-1215（9:00〜17:00/土日・祝祭日休み）

<<<お申し込み内容は以下のとおりです>>>
【お申込みの刊行物】
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 $_from = $this->_tpl_vars['datum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if (@ $this->_tpl_vars['datum2']['count']): ?>　[ <?php echo $this->_tpl_vars['datum2']['count']; ?>
 部 ] <?php echo $this->_tpl_vars['datum2']['name']; ?>

<?php endif;  endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>

【合計部数】
　<?php echo $this->_tpl_vars['data']['total_count']; ?>
部

【代金】
<?php if ($this->_tpl_vars['data']['user_status'] == 1): ?>　冊子代：<?php echo $this->_tpl_vars['data']['total_price']; ?>
円
　送料：<?php echo $this->_tpl_vars['data']['trans_price']; ?>
円
　合計：<?php echo $this->_tpl_vars['data']['allprice']; ?>
円<?php endif;  if ($this->_tpl_vars['data']['user_status'] == 2): ?>　冊子代：<?php echo $this->_tpl_vars['data']['total_price']; ?>
円

【発送料金について】
　送料は1梱包につき850円（税別）になります。
　冊子の種類（大きさや重量）に応じて梱包数が変動します。　
　なお、送料を事前にご確認のうえ注文したい方は、次の番号までご連絡ください。

　＜送料確認連絡先＞業務企画部啓発・教育グループ　03-3255-1215

　＜1梱包（850円：税別）で発送できる部数の目安＞
　冊子名：1梱包の最大部数
　ほっと安心ガイド：1,500部まで
　ファクトブック：50部まで
　小学生のための自転車安全教室：200部まで
　知っていますか？自転車の事故：300部まで
　飲酒運転防止マニュアル：400部まで<?php endif; ?>

<?php if (@ $this->_tpl_vars['data']['bikou']): ?>
【備考】
<?php echo $this->_tpl_vars['data']['bikou']; ?>

<?php endif; ?>

※日本損害保険協会では、発送ならびに集金代行業務については、
「株式会社　マイナビサポート」に委託しております。
そのため、発送伝票には委託業者名が発信元として明記されますのでお含み置き願います。

※法人・団体等でお申し込みの場合は、刊行物お届けとは別便で請求書をお送りいたします。