<?php /* Smarty version 2.6.9, created on 2022-01-07 19:13:32
         compiled from mail/adminmail.txt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'mail/adminmail.txt', 32, false),)), $this); ?>
�ۡ���ڡ�������»���ݸ��ֱ��ο������ߤ�����դ��ޤ�����
�������������Ƥϰʲ��Τ褦�ˤʤ�ޤ���
ô���λ�����<?php echo $this->_tpl_vars['branch_name']; ?>
�����Ȥʤ�ޤ���

�����ֹ桧<?php echo $this->_tpl_vars['inst_id']; ?>


<<<�ֱ���˾����>>>
�ڴ�˾����������
���裱��˾��<?php echo $this->_tpl_vars['data']['year_1']; ?>
ǯ<?php echo $this->_tpl_vars['data']['month_1']; ?>
��<?php echo $this->_tpl_vars['data']['day_1']; ?>
����<?php echo $this->_tpl_vars['data']['wTx01']; ?>
�ˡ�<?php echo $this->_tpl_vars['data']['hour_from_1']; ?>
��<?php echo $this->_tpl_vars['data']['min_from_1']; ?>
ʬ��<?php echo $this->_tpl_vars['data']['hour_to_1']; ?>
��<?php echo $this->_tpl_vars['data']['min_to_1']; ?>
ʬ<?php if ($this->_tpl_vars['data']['year_2']): ?> 
���裲��˾��<?php echo $this->_tpl_vars['data']['year_2']; ?>
ǯ<?php echo $this->_tpl_vars['data']['month_2']; ?>
��<?php echo $this->_tpl_vars['data']['day_2']; ?>
����<?php echo $this->_tpl_vars['data']['wTx02']; ?>
�ˡ�<?php echo $this->_tpl_vars['data']['hour_from_2']; ?>
��<?php echo $this->_tpl_vars['data']['min_from_2']; ?>
ʬ��<?php echo $this->_tpl_vars['data']['hour_to_2']; ?>
��<?php echo $this->_tpl_vars['data']['min_to_2']; ?>
ʬ<?php endif; ?> 

�ڲ���
�����̾��<?php echo $this->_tpl_vars['data']['lecture_hall']; ?>


���оݡ�
���оݡ�<?php echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['data']['object_select']];  echo $this->_tpl_vars['data']['object_text']; ?>

������ͽ��Ϳ���<?php echo $this->_tpl_vars['data']['object_num']; ?>
 ��

�ڥơ��ޡ�
��<?php echo $this->_tpl_vars['theme'][$this->_tpl_vars['data']['themes']];  if ($this->_tpl_vars['data']['theme_text']): ?> 
��<?php echo $this->_tpl_vars['data']['theme_text'];  endif; ?> 

�ڥӥǥ��߽С�
����˾<?php if ($this->_tpl_vars['data']['video'] == 1): ?>����<?php else: ?>���ʤ�<?php endif; ?> 

�����ջ�����
��������<?php echo $this->_tpl_vars['data']['copy']; ?>
��
�����������衧<?php if ($this->_tpl_vars['data']['receiver_address'] == 'host'): ?>��ż�<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'venue'): ?>���<?php endif;  if ($this->_tpl_vars['data']['receiver_address'] == 'other'): ?>����¾<?php endif; ?> 

�����ѷи���
��<?php if ($this->_tpl_vars['data']['exp'] == '1'): ?>����
��<?php if ($this->_tpl_vars['data']['use_year'] || $this->_tpl_vars['data']['use_month']):  if (((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
ǯ<?php endif;  if ($this->_tpl_vars['data']['use_month']):  echo ((is_array($_tmp=$this->_tpl_vars['data']['use_month'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
��<?php endif; ?>��<?php endif;  else: ?>�ʤ�<?php endif; ?> 