<?php /* Smarty version 2.6.9, created on 2020-11-24 21:45:28
         compiled from mail/pub_transmail.txt */ ?>
����ʪ�ο������ߤ���ǧ����ޤ�����
�������������Ƥϰʲ��Τ褦�ˤʤ�ޤ���

�����ֹ桧<?php echo $this->_tpl_vars['recept_id']; ?>


�ڴ���ʪ��
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']['amount']):  echo $this->_tpl_vars['datum']['name']; ?>
 <?php echo $this->_tpl_vars['datum']['amount']; ?>
 ��
<?php endif;  endforeach; endif; unset($_from); ?>