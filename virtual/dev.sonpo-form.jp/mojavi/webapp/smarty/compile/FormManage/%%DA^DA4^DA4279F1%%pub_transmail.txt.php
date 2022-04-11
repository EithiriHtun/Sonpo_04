<?php /* Smarty version 2.6.9, created on 2020-11-24 21:45:28
         compiled from mail/pub_transmail.txt */ ?>
刊行物の申し込みが承認されました。
お申し込み内容は以下のようになります。

受付番号：<?php echo $this->_tpl_vars['recept_id']; ?>


【刊行物】
<?php $_from = $this->_tpl_vars['books']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
 if ($this->_tpl_vars['datum']['amount']):  echo $this->_tpl_vars['datum']['name']; ?>
 <?php echo $this->_tpl_vars['datum']['amount']; ?>
 部
<?php endif;  endforeach; endif; unset($_from); ?>