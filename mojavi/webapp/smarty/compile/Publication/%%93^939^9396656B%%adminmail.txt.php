<?php /* Smarty version 2.6.9, created on 2022-03-14 09:25:58
         compiled from mail/adminmail.txt */ ?>
�ۡ���ڡ������鴩��ʪ�ο������ߤ�����դ��ޤ�����
�������������Ƥϰʲ��Τ褦�ˤʤ�ޤ���

�����ֹ桧<?php echo $this->_tpl_vars['recept_id']; ?>


�ڴ���ʪ��
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 $_from = $this->_tpl_vars['datum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if ($this->_tpl_vars['datum2']['count']):  echo $this->_tpl_vars['datum2']['name']; ?>
 <?php echo $this->_tpl_vars['datum2']['count']; ?>
 ��
<?php endif;  endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>