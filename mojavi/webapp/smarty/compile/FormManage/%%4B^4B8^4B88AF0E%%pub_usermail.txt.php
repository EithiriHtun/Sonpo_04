<?php /* Smarty version 2.6.9, created on 2022-03-14 18:20:06
         compiled from mail/pub_usermail.txt */ ?>
<?php echo $this->_tpl_vars['data']['name1']; ?>
 <?php echo $this->_tpl_vars['data']['name2']; ?>
��

����ʪ�Τ��������ߤ򤤤��������ˤ��꤬�Ȥ��������ޤ���
���������߼�³������λ�������ޤ�����

�����ֹ桧<?php echo $this->_tpl_vars['recept_id']; ?>


<<<�������������Ƥϰʲ��ΤȤ���Ǥ�>>>
�ڤ������ߤδ���ʪ��
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 $_from = $this->_tpl_vars['datum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if ($this->_tpl_vars['datum2']['count']): ?>��[ <?php echo $this->_tpl_vars['datum2']['count']; ?>
 �� ] <?php echo $this->_tpl_vars['datum2']['name']; ?>

<?php endif;  endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>

�ڹ��������
��<?php echo $this->_tpl_vars['data']['total_count']; ?>
��
