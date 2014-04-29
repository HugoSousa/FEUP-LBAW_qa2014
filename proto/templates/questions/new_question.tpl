{include file='common/header.tpl'}

{include file='common/topbar.tpl'}
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$BASE_URL}css/jquery.pagedown-bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="{$BASE_URL}javascript/jquery.pagedown-bootstrap.combined.min.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/questions/new_question.js"></script>

    <form action="{$BASE_URL}actions/questions/new_question.php" method="post" enctype="multipart/form-data">
	<div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
      <b>Title</b>
      <input type="text" name="title" class="form-control" id="title" value="{$FORM_VALUES.title}">
    </div>

    <br><br>

    <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
        <textarea class="form-control" id="pagedownMe" rows="10" id="body" name="body" value="{$FORM_VALUES.body}"></textarea>
    </div>

    <br><br>

    <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
      <b>Tags</b> <small class="pull-right">Check the existent tags in the <a href="#"> Tags</a> section.</small>
      <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag1" name="tags[]" value="{$FORM_VALUES.tags[0]}">
      <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag2" name="tags[]" value="{$FORM_VALUES.tags[1]}">
      <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag3" name="tags[]" value="{$FORM_VALUES.tags[2]}">
      <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag4" name="tags[]" value="{$FORM_VALUES.tags[3]}">
      <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag5" name="tags[]" value="{$FORM_VALUES.tags[4]}">
      <small>Minimum tags:1 | Maximum tags:5</small>
    </div>

    <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
      <button type="submit" class="btn btn-default btn-info pull-right" id="post-question" style="margin-top:10px">Post Question</button>
    </div>
	</form>
    <br><br>
    <br><br>

    <script type="text/javascript">
	    (function () {

	      $("textarea#pagedownMe").pagedownBootstrap();

	      $('.wmd-preview').addClass('well');

	    })();
    </script> 

{include file='common/footer.tpl'}