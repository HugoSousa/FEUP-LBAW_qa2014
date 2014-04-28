<?php /* Smarty version Smarty-3.1.15, created on 2014-04-23 19:20:17
         compiled from "/opt/lbaw/lbaw1346/public_html/proto/templates/questions/show_question.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1709845750535185f0aaf253-47226038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bdce32400fcfdbc1afb8d52692ca8d83bf66b62' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/proto/templates/questions/show_question.tpl',
      1 => 1398277176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1709845750535185f0aaf253-47226038',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_535185f0f37af2_59239038',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'question' => 0,
    'own' => 0,
    'tags' => 0,
    'tag' => 0,
    'userid' => 0,
    'questionComments' => 0,
    'comment' => 0,
    'answersAndComments' => 0,
    'answer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535185f0f37af2_59239038')) {function content_535185f0f37af2_59239038($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1346/public_html/proto/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/topbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/jquery.pagedown-bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/jquery.pagedown-bootstrap.combined.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/comment.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/answer.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/vote.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/flag.js"></script>

    <div class="page-header" style="width:70%; margin-left:auto; margin-right:auto">
      <h3 style="word-wrap: break-word;"><?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>
</h3>
    </div>

    <div class="container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="row">
        <div class="col-md-1">
          <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['question']->value['myvoteup']) {?>
              <button type="button" class="btn btn-default btn-lg btn-warning">
            <?php } else { ?>
              <button type="button" class="btn btn-default btn-lg">
            <?php }?>
            <span class="glyphicon glyphicon-chevron-up voteUp"></span>
          </button>
          <?php }?>
          <br><br>
          <?php if ($_smarty_tpl->tpl_vars['question']->value['votes']>0) {?>
          	<span class="label label-success" style="font-size:170%; display: inline-block; width: 50px;">
          <?php } elseif ($_smarty_tpl->tpl_vars['question']->value['votes']==0) {?>
          	<span class="label label-default" style="font-size:170%; display: inline-block; width: 50px;">
          <?php } else { ?>
          	<span class="label label-danger" style="font-size:170%; display: inline-block; width: 50px;">
          <?php }?>
          	<?php echo $_smarty_tpl->tpl_vars['question']->value['votes'];?>

      		</span>

          <br><br>
          <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['question']->value['myvotedown']) {?>
              <button type="button" class="btn btn-default btn-lg btn-warning">
            <?php } else { ?>
              <button type="button" class="btn btn-default btn-lg">
            <?php }?>
            <span class="glyphicon glyphicon-chevron-down voteDown"></span>
          </button>
          <?php }?>
        </div>
        <div class="well well-lg col-md-8" style="word-wrap: break-word;">
		      <?php echo $_smarty_tpl->tpl_vars['question']->value['contentText'];?>

          <br><br><br>
          <span> Asked by <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/user.php?username=<?php echo $_smarty_tpl->tpl_vars['question']->value['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value['username'];?>
</a> at <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['question']->value['contentDate'],"M d 'Y");?>
, <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['question']->value['contentDate'],"H:i");?>
 </span>
          <br>
          <!-- TAGS -->
          <span> Tags:</span>
          <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
            <span class="label label-default" style="font-size:100%"><a href="#" style="color:white"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a></span>
          <?php } ?>

          <?php if ($_smarty_tpl->tpl_vars['question']->value['username']==$_smarty_tpl->tpl_vars['own']->value) {?>
          	<button type="button" class="btn btn-default pull-right">Flag</button>
          	<button type="button" class="btn btn-default pull-right">Edit</button>
          <?php }?>

        </div>
      </div>

    </div>
  
    <div id="questionID" style="display:none">"<?php echo $_smarty_tpl->tpl_vars['question']->value['idQuestion'];?>
"</div>
    <div id="userID" style="display:none"><?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
</div>

    <div id="QuestionDiv<?php echo $_smarty_tpl->tpl_vars['question']->value['idQuestion'];?>
">
    <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questionComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
      <div class="well well-sm" style="margin-bottom:2px; margin-left:25%; margin-right:32.5%; text-align:justify; word-wrap: break-word;">
        <?php echo $_smarty_tpl->tpl_vars['comment']->value['contentText'];?>


        <?php if ($_smarty_tpl->tpl_vars['own']->value==$_smarty_tpl->tpl_vars['comment']->value['username']) {?>
          <a class="close pull-right" style="color:red">&times;</a>
          <a class="pull-right" href="#">edit&nbsp;</a>
        <?php }?>

        <span class="pull-right">
          <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/user.php?username=<?php echo $_smarty_tpl->tpl_vars['comment']->value['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['username'];?>
</a> <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value['contentDate'],"M d 'Y");?>
, <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value['contentDate'],"H:i");?>
&nbsp;&nbsp;&nbsp;</small>
        </span>
      </div>
    <?php } ?>
  </div>

    <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
    <div class="container" style="margin-right:31.4%">
      <button id="comment" class="btn btn-default btn-xs btn-info pull-right" data-toggle="modal" data-target="#modalQuestion">
        Add Comment
      </button>
    </div>
    <?php }?>
      <!-- Modal -->
      <div class="modal fade" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Comment Question of <?php echo $_smarty_tpl->tpl_vars['question']->value['username'];?>
</h4>
            </div>
            <div class="modal-body">
              <textarea class="form-control" rows="10" style="resize:none"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id ="commentQuestion" type="button" value="<?php echo $_smarty_tpl->tpl_vars['question']->value['idQuestion'];?>
"  class="btn btn-primary">Comment</button>
            </div>
          </div>
        </div>
      </div>  


     <div id="AllAnswers"> 
    <?php  $_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['answer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['answersAndComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->key => $_smarty_tpl->tpl_vars['answer']->value) {
$_smarty_tpl->tpl_vars['answer']->_loop = true;
?>

    <!--Divisoria Horizontal-->
    <hr>

    <!--Resposta-->
    <div class="container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="row">
        <div class="col-md-1">
          <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['answer']->value['myvoteup']) {?>
                <button type="button" class="btn btn-default btn-lg btn-warning">
            <?php } else { ?>
                <button type="button" class="btn btn-default btn-lg">
            <?php }?>
              <span class="glyphicon glyphicon-chevron-up voteUp"></span>
            </button>
          <?php }?>
          <br><br>

          <?php if ($_smarty_tpl->tpl_vars['answer']->value['votes']>0) {?>
            <span class="label label-success" style="font-size:170%; display: inline-block; width: 50px;">
          <?php } elseif ($_smarty_tpl->tpl_vars['answer']->value['votes']==0) {?>
            <span class="label label-default" style="font-size:170%; display: inline-block; width: 50px;">
          <?php } else { ?>
            <span class="label label-danger" style="font-size:170%; display: inline-block; width: 50px;">
          <?php }?>
          <?php echo $_smarty_tpl->tpl_vars['answer']->value['votes'];?>
</span>
          <br><br>

          <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['answer']->value['myvotedown']) {?>
                <button type="button" class="btn btn-default btn-lg btn-warning">
            <?php } else { ?>
                <button type="button" class="btn btn-default btn-lg">
            <?php }?>
              <span class="glyphicon glyphicon-chevron-down voteDown" ></span>
            </button>
          <?php }?>
          <br><br>
          <?php if ($_smarty_tpl->tpl_vars['answer']->value['isAccepted']) {?>
            <button type="button" class="btn btn-default btn-lg" style="border:0">
              <span class="glyphicon glyphicon-ok" style="color:green; font-size:150%"></span>
            </button>
          <?php }?>

        </div>
        <div class="well well-lg col-md-8" style="word-wrap: break-word;">

          <?php echo $_smarty_tpl->tpl_vars['answer']->value['contentText'];?>


          <br><br><br>
          <span> Answered by <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/user.php?username=<?php echo $_smarty_tpl->tpl_vars['answer']->value['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['answer']->value['username'];?>
</a> at <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['answer']->value['contentDate'],"M d 'Y");?>
, <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['answer']->value['contentDate'],"H:i");?>
 </span>
          <?php if ($_smarty_tpl->tpl_vars['answer']->value['username']==$_smarty_tpl->tpl_vars['own']->value) {?>
          <button type="button" class="btn btn-danger pull-right">Delete</button>
          <?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
          <button type="button" id="flagContent" class="btn btn-default pull-right">Flag</button>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['answer']->value['username']==$_smarty_tpl->tpl_vars['own']->value) {?>
          <button type="button" class="btn btn-default pull-right">Edit</button>
          <?php }?>

        </div>
      </div>


    </div>
    <div id="CommentDiv<?php echo $_smarty_tpl->tpl_vars['answer']->value['idAnswer'];?>
">
      <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['answer']->value['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>

        <div class="well well-sm" style=" margin-left:25%; margin-right:32.5%; text-align:justif; word-wrap: break-word;">
          <?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>

          <?php if ($_smarty_tpl->tpl_vars['own']->value==$_smarty_tpl->tpl_vars['comment']->value['username']) {?>
            <a class="close pull-right" style="color:red">&times;</a>
            <a class="pull-right" href="#">edit&nbsp;</a>
          <?php }?>
          <span class="pull-right">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/user.php?username=<?php echo $_smarty_tpl->tpl_vars['comment']->value['user'];?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['user'];?>
</a> <small>at <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value['date'],"M d 'Y");?>
, <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value['date'],"H:i");?>
 &nbsp;&nbsp;&nbsp;</small>
          </span>
        </div>


      <?php } ?>
    </div>

    <!-- <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?> 
     <div class="container" style="margin-right:31.4%">
      <button id="comment" class="btn btn-default btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal<?php echo $_smarty_tpl->tpl_vars['answer']->value['idAnswer'];?>
">
        Add Comment
      </button>
    </div>
     <?php }?> -->

     <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
    <!-- Button trigger modal -->
     <div class="container" style="margin-right:31.4%">
      <button id="comment" class="btn btn-default btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal<?php echo $_smarty_tpl->tpl_vars['answer']->value['idAnswer'];?>
">
        Add Comment
      </button>
    </div>
    <?php }?>
      <!-- Modal -->
      <div class="modal fade" id="modal<?php echo $_smarty_tpl->tpl_vars['answer']->value['idAnswer'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Comment Answer of <?php echo $_smarty_tpl->tpl_vars['answer']->value['username'];?>
</h4>
            </div>
            <div class="modal-body">
              <textarea class="form-control" rows="10" style="resize:none"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id ="commentAnswer" type="button" value="<?php echo $_smarty_tpl->tpl_vars['answer']->value['idAnswer'];?>
"  class="btn btn-primary">Comment</button>
            </div>
          </div>
        </div>
      </div>  

    <?php } ?>

  </div>

    <hr>
    <br>

    <?php if (isset($_smarty_tpl->tpl_vars['own']->value)) {?>
    <!--CREDITS:https://github.com/kevinoconnor7/pagedown-bootstrap/-->
    <div>
      <div class="container" style="margin-left:15%;margin-right:31.4%; width:60%">
        <textarea class="form-control" id="pagedownMe" rows="10"></textarea>
      </div>

      <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
        <button id="postAnswer" type="button" class="btn btn-default btn-info pull-right" style="margin-top:10px" value="<?php echo $_smarty_tpl->tpl_vars['question']->value['idQuestion'];?>
" >Post Answer</button>
      </div>
    </div>
    <?php }?>


    <br><br><br><br>

    <script type="text/javascript">
    (function () {

      $("textarea#pagedownMe").pagedownBootstrap();

      $('.wmd-preview').addClass('well');

    })();
    </script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
