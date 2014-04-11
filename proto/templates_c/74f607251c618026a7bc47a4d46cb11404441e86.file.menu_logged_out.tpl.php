<?php /* Smarty version Smarty-3.1.15, created on 2014-04-11 13:42:42
         compiled from "\wamp\www\frmk\templates\common\menu_logged_out.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155975347e34295b962-16398559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74f607251c618026a7bc47a4d46cb11404441e86' => 
    array (
      0 => '\\wamp\\www\\frmk\\templates\\common\\menu_logged_out.tpl',
      1 => 1396901839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155975347e34295b962-16398559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5347e3429a7994_50632762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5347e3429a7994_50632762')) {function content_5347e3429a7994_50632762($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">Register</a>
<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
  <input type="text" placeholder="username" name="username">
  <input type="password" placeholder="password" name="password">
  <input type="submit" value=">">
</form>
<?php }} ?>
