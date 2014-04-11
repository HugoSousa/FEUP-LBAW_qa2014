<?php /* Smarty version Smarty-3.1.15, created on 2014-04-11 13:12:47
         compiled from "\wamp\www\proto\templates\common\menu_logged_out.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131795347dc3f319db8-10855176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b168ed5f0dac6dd65fd62f840bfb8fba5fd93f5' => 
    array (
      0 => '\\wamp\\www\\proto\\templates\\common\\menu_logged_out.tpl',
      1 => 1396901839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131795347dc3f319db8-10855176',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5347dc3f323d45_27448955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5347dc3f323d45_27448955')) {function content_5347dc3f323d45_27448955($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">Register</a>
<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
  <input type="text" placeholder="username" name="username">
  <input type="password" placeholder="password" name="password">
  <input type="submit" value=">">
</form>
<?php }} ?>
