<?php /* Smarty version Smarty-3.1.15, created on 2014-04-11 19:24:21
         compiled from "\wamp\www\proto\templates\common\topbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20134534833555b8e23-10462490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '762158c01fc41408ef3fc3589d914bde8f1f528c' => 
    array (
      0 => '\\wamp\\www\\proto\\templates\\common\\topbar.tpl',
      1 => 1397239171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20134534833555b8e23-10462490',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_534833555bf682_75140595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534833555bf682_75140595')) {function content_534833555bf682_75140595($_smarty_tpl) {?><div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px; margin-bottom:20px">
  <ul class="nav navbar-nav navbar-left">
    <li> <a href="#" ><b>Ask a Question</b></a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li> <a href="#">Users</a></li>
    <li> <a href="#">Tags</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><button class="btn btn-default btn-block active" >Newest First</button></li>
        <li><button class="btn btn-default btn-block" >Oldest First</button></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search Options<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <div class="row" style="width: 400px;">
            <ul class="list-unstyled col-md-6">
              <li><button class="btn btn-default btn-block active" >Non-Answered</button></li>
              <li><button class="btn btn-default btn-block">Answered</button></li>
              <li><button class="btn btn-default btn-block">All</button></li>
            </ul>
            <ul class="list-unstyled col-md-6">
                <li><button class="btn btn-default btn-block" >Non-Accepted</button></li>
                <li><button class="btn btn-default btn-block active">Accepted</button></li>
                <li><button class="btn btn-default btn-block">All</button></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div><?php }} ?>
