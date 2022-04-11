<?php /* Smarty version 2.6.9, created on 2022-03-18 11:14:44
         compiled from csv/instcsv_basic.txt */ ?>
"講演日","対象","主催者名","講演テーマ","分類","講師名","聴講者数"
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['datum']):
?>"<?php if (@ $this->_tpl_vars['datum']['year_3']):  echo $this->_tpl_vars['datum']['year_3']; ?>
年<?php echo $this->_tpl_vars['datum']['month_3']; ?>
月<?php echo $this->_tpl_vars['datum']['day_3']; ?>
日<?php else:  echo $this->_tpl_vars['datum']['year_1']; ?>
年<?php echo $this->_tpl_vars['datum']['month_1']; ?>
月<?php echo $this->_tpl_vars['datum']['day_1']; ?>
日<?php endif; ?>","<?php if (@ $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']]):  echo $this->_tpl_vars['taisyou'][$this->_tpl_vars['datum']['taisyou']];  endif; ?>","<?php if (@ $this->_tpl_vars['datum']['host2']):  echo $this->_tpl_vars['datum']['host2'];  else:  if (@ $this->_tpl_vars['datum']['host']):  echo $this->_tpl_vars['datum']['host'];  endif;  endif; ?>","<?php if (@ $this->_tpl_vars['datum']['theme2']):  echo $this->_tpl_vars['datum']['theme2'];  else:  if (@ $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']]):  echo $this->_tpl_vars['theme'][$this->_tpl_vars['datum']['themes']];  endif;  endif; ?>","<?php if (@ $this->_tpl_vars['inst_type'][$this->_tpl_vars['datum']['inst_type']]):  echo $this->_tpl_vars['inst_type'][$this->_tpl_vars['datum']['inst_type']];  endif; ?>","<?php if (@ $this->_tpl_vars['datum']['inst_name']):  echo $this->_tpl_vars['datum']['inst_name'];  endif; ?>","<?php if (@ $this->_tpl_vars['datum']['inst_num']):  echo $this->_tpl_vars['datum']['inst_num'];  endif; ?>"
<?php endforeach; endif; unset($_from); ?>