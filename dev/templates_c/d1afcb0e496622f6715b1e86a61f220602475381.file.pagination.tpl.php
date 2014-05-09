<?php /* Smarty version Smarty-3.1.15, created on 2014-05-07 16:21:36
         compiled from "/opt/lbaw/lbaw1346/public_html/dev/templates/common/pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2019375951536a4f80db39f4-74407896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1afcb0e496622f6715b1e86a61f220602475381' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/dev/templates/common/pagination.tpl',
      1 => 1399475590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2019375951536a4f80db39f4-74407896',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'page_' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_536a4f80e1c196_87444040',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536a4f80e1c196_87444040')) {function content_536a4f80e1c196_87444040($_smarty_tpl) {?>    <div style="text-align:center">
      <ul class="pagination">
        <?php if ($_smarty_tpl->tpl_vars['page']->value==1) {?>
        <li class="disabled">
        <?php } else { ?>
        <li>
        <?php }?>
        <a href="#">&laquo;</a></li>

        <?php if ($_smarty_tpl->tpl_vars['page']->value>=3) {?>
          <?php if ($_smarty_tpl->tpl_vars['page']->value-2>1) {?>
            <li><a href="#">1</a></li>
            <li class="disabled">...</li>
          <?php }?>
          <?php $_smarty_tpl->tpl_vars['page_'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page_']->step = 1;$_smarty_tpl->tpl_vars['page_']->total = (int) ceil(($_smarty_tpl->tpl_vars['page_']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value+2+1 - ($_smarty_tpl->tpl_vars['page']->value-2) : $_smarty_tpl->tpl_vars['page']->value-2-($_smarty_tpl->tpl_vars['page']->value+2)+1)/abs($_smarty_tpl->tpl_vars['page_']->step));
if ($_smarty_tpl->tpl_vars['page_']->total > 0) {
for ($_smarty_tpl->tpl_vars['page_']->value = $_smarty_tpl->tpl_vars['page']->value-2, $_smarty_tpl->tpl_vars['page_']->iteration = 1;$_smarty_tpl->tpl_vars['page_']->iteration <= $_smarty_tpl->tpl_vars['page_']->total;$_smarty_tpl->tpl_vars['page_']->value += $_smarty_tpl->tpl_vars['page_']->step, $_smarty_tpl->tpl_vars['page_']->iteration++) {
$_smarty_tpl->tpl_vars['page_']->first = $_smarty_tpl->tpl_vars['page_']->iteration == 1;$_smarty_tpl->tpl_vars['page_']->last = $_smarty_tpl->tpl_vars['page_']->iteration == $_smarty_tpl->tpl_vars['page_']->total;?>
            <?php if ($_smarty_tpl->tpl_vars['page_']->value<=$_smarty_tpl->tpl_vars['pages']->value) {?>
            <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['page_']->value;?>
</a></li>
            <?php }?>
           <?php }} ?>
           <?php if ($_smarty_tpl->tpl_vars['page']->value+2<$_smarty_tpl->tpl_vars['pages']->value) {?>
            <li class="disabled">...</li>
            <li><a href="#">$pages</a></li>
           <?php }?>
        
        <?php } else { ?>
          <?php $_smarty_tpl->tpl_vars['page_'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page_']->step = 1;$_smarty_tpl->tpl_vars['page_']->total = (int) ceil(($_smarty_tpl->tpl_vars['page_']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value+4+1 - ($_smarty_tpl->tpl_vars['page']->value) : $_smarty_tpl->tpl_vars['page']->value-($_smarty_tpl->tpl_vars['page']->value+4)+1)/abs($_smarty_tpl->tpl_vars['page_']->step));
if ($_smarty_tpl->tpl_vars['page_']->total > 0) {
for ($_smarty_tpl->tpl_vars['page_']->value = $_smarty_tpl->tpl_vars['page']->value, $_smarty_tpl->tpl_vars['page_']->iteration = 1;$_smarty_tpl->tpl_vars['page_']->iteration <= $_smarty_tpl->tpl_vars['page_']->total;$_smarty_tpl->tpl_vars['page_']->value += $_smarty_tpl->tpl_vars['page_']->step, $_smarty_tpl->tpl_vars['page_']->iteration++) {
$_smarty_tpl->tpl_vars['page_']->first = $_smarty_tpl->tpl_vars['page_']->iteration == 1;$_smarty_tpl->tpl_vars['page_']->last = $_smarty_tpl->tpl_vars['page_']->iteration == $_smarty_tpl->tpl_vars['page_']->total;?>
            <?php if ($_smarty_tpl->tpl_vars['page_']->value<=$_smarty_tpl->tpl_vars['pages']->value) {?>
            <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['page_']->value;?>
</a></li>
            <?php }?>
          <?php }} ?>

          <?php if ($_smarty_tpl->tpl_vars['page']->value+4<$_smarty_tpl->tpl_vars['pages']->value) {?>
            <li class="disabled">...</li>
            <li><a href="#">$pages</a></li>
           <?php }?>
        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->tpl_vars['pages']->value) {?>
        <li class="disabled">
        <?php } else { ?>
        <li>
        <?php }?>
        <a href="#">&raquo;</a></li>
      </ul>
    </div><?php }} ?>
