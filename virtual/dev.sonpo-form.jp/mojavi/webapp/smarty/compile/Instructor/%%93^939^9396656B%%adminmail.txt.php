<?php /* Smarty version 2.6.9, created on 2022-01-07 19:13:32
         compiled from mail/adminmail.txt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'mail/adminmail.txt', 32, false),)), $this); ?>
ホームページから損害保険講演会の申し込みを受け付けました。
お申し込み内容は以下のようになります。
担当の支部は<?php echo $this->_tpl_vars['branch_name']; ?>
支部となります。

受付番号：<?php echo $this->_tpl_vars['inst_id']; ?>


<<<講演会希望内容>>>
【希望開催日時】
　第１希望　<?php echo $this->_tpl_vars['data']['year_1']; ?>
年<?php echo $this->_tpl_vars['data']['month_1']; ?>
月<?php echo $this->_tpl_vars['data']['day_1']; ?>
日（<?php echo $this->_tpl_vars['data']['wTx01']; ?>
）　<?php echo $this->_tpl_vars['data']['hour_from_1']; ?>
時<?php echo $this->_tpl_vars['data']['min_from_1']; ?>
分〜<?php echo $this->_tpl_vars['data']['hour_to_1']; ?>
時<?php echo $this->_tpl_vars['data']['min_to_1']; ?>
分<?php if ($this->_tpl_vars['data']['year_2']): ?> 
　第２希望　<?php echo $this->_tpl_vars['data']['year_2']; ?>
年<?php echo $this->_tpl_vars['data']['month_2']; ?>
月<?php echo $this->_tpl_vars['data']['day_2']; ?>
日（<?php echo $this->_tpl_vars['data']['wTx02']; ?>
）　<?php echo $this->_tpl_vars['data']['hour_from_2']; ?>
時<?php echo $this->_tpl_vars['data']['min_from_2']; ?>
分〜<?php echo $this->_tpl_vars['data']['hour_to_2']; ?>
時<?php echo $this->_tpl_vars['data']['min_to_2']; ?>
分<?php endif; ?> 

【会場】
　会場名：<?php echo $this->_tpl_vars['data']['lecture_hall']; ?>


【対象】
　対象：<?php echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']];  echo $this->_tpl_vars['data']['object_text']; ?>

　受講予定人数：<?php echo $this->_tpl_vars['data']['object_num']; ?>
 人

【テーマ】
　<?php echo $this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']];  if ($this->_tpl_vars['data']['theme_text']): ?> 
　<?php echo $this->_tpl_vars['data']['theme_text'];  endif; ?> 

【ビデオ貸出】
　希望<?php if ($this->_tpl_vars['data']['video'] == 1): ?>する<?php else: ?>しない<?php endif; ?> 

【配付資料】
　部数：<?php echo $this->_tpl_vars['data']['copy']; ?>
部
　資料送付先：<?php if ($this->_tpl_vars['data']['receiver_address'] == 'host'): ?>主催者<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'venue'): ?>会場<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'other'): ?>その他<?php endif; ?> 

【利用経験】
　<?php if ($this->_tpl_vars['data']['exp'] == '1'): ?>あり
　<?php if ($this->_tpl_vars['data']['use_year'] || $this->_tpl_vars['data']['use_month']):  if (((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
年<?php endif;  if ($this->_tpl_vars['data']['use_month']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
月<?php endif; ?>頃<?php endif;  else: ?>なし<?php endif; ?> 