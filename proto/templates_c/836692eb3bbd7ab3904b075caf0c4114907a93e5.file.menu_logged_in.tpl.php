<?php /* Smarty version Smarty-3.1.15, created on 2014-04-11 13:42:38
         compiled from "\wamp\www\frmk\templates\common\menu_logged_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120555347e33ecda6f8-99031104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '836692eb3bbd7ab3904b075caf0c4114907a93e5' => 
    array (
      0 => '\\wamp\\www\\frmk\\templates\\common\\menu_logged_in.tpl',
      1 => 1396901839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120555347e33ecda6f8-99031104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5347e33ece21a9_52248822',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5347e33ece21a9_52248822')) {function content_5347e33ece21a9_52248822($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">Logout</a>
<span class="username"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</span>
<?php }} ?>
