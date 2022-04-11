<?php /* Smarty version 2.6.9, created on 2022-03-14 18:20:06
         compiled from mail/pub_adminmail.txt */ ?>
管理画面から刊行物の申し込みを受け付けました。
お申し込み内容は以下のようになります。<?php if (@ $this->_tpl_vars['inst_id']): ?>
これは講師派遣からの申込です。講師派遣受付番号：<?php echo $this->_tpl_vars['inst_id'];  endif; ?>

受付番号：<?php echo $this->_tpl_vars['recept_id']; ?>


【刊行物】
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 $_from = $this->_tpl_vars['datum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum2']):
 if (@ $this->_tpl_vars['datum2']['count']):  echo $this->_tpl_vars['datum2']['name']; ?>
 <?php echo $this->_tpl_vars['datum2']['count']; ?>
 部
<?php endif;  endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>