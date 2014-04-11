<?php /* Smarty version Smarty-3.1.15, created on 2014-04-11 13:31:04
         compiled from "\wamp\www\proto\templates\common\menu_logged_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95605347e088d54ae7-54887407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '498bf6d2dd4fc65c91c4269911f00ccf12020aea' => 
    array (
      0 => '\\wamp\\www\\proto\\templates\\common\\menu_logged_in.tpl',
      1 => 1396901839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95605347e088d54ae7-54887407',
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
  'unifunc' => 'content_5347e088d93a59_90475613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5347e088d93a59_90475613')) {function content_5347e088d93a59_90475613($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">Logout</a>
<span class="username"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</span>
<?php }} ?>
