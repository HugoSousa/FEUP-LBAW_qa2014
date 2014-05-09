<?php /* Smarty version Smarty-3.1.15, created on 2014-05-07 16:27:24
         compiled from "/opt/lbaw/lbaw1346/public_html/dev/templates/common/topbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:673939736536a50dc5255a7-77474084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8572902e33cdce0f0eb9ea000dac32994338d049' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/dev/templates/common/topbar.tpl',
      1 => 1399475590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '673939736536a50dc5255a7-77474084',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'own' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_536a50dc5395b2_73997793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536a50dc5395b2_73997793')) {function content_536a50dc5395b2_73997793($_smarty_tpl) {?><div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px; margin-bottom:20px">
  <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
  <ul class="nav navbar-nav navbar-left">
    <li> <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/new_question.php" ><b>Ask a Question</b></a></li>
  </ul>
  <?php }?>
  <ul class="nav navbar-nav navbar-right">
    <li> <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/list_all.php">Users</a></li>
    <li> <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/tags/list_all.php">Tags</a></li>
  </ul>
</div><?php }} ?>
