<?php /* Smarty version Smarty-3.1.15, created on 2014-04-18 21:07:12
         compiled from "/opt/lbaw/lbaw1346/public_html/proto/templates/common/topbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:521711996535185f1006548-11805830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a3e3dc9de579a35f2bbaef33420d9af6690296c' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/proto/templates/common/topbar.tpl',
      1 => 1397850308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '521711996535185f1006548-11805830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_535185f1012397_14424759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535185f1012397_14424759')) {function content_535185f1012397_14424759($_smarty_tpl) {?><div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px; margin-bottom:20px">
  <ul class="nav navbar-nav navbar-left">
    <li> <a href="#" ><b>Ask a Question</b></a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li> <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/list_all.php">Users</a></li>
    <li> <a href="#">Tags</a></li>
  </ul>
</div><?php }} ?>
