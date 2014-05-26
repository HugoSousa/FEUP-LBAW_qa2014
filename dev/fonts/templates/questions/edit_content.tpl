{include file='common/header.tpl'}

{include file='common/topbar.tpl'}
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$BASE_URL}css/jquery.pagedown-bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="{$BASE_URL}javascript/jquery.pagedown-bootstrap.combined.min.js"></script>

    {if $type == 'QUESTION'}

      <form action="{$BASE_URL}actions/questions/edit_question.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{$question.idQuestion}">
    {/if}

      	<div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
          <b>Title</b>
          {if $type == 'QUESTION'}
            <input type="text" name="title" class="form-control" id="title" value="{$question.title}">
          {elseif $type == 'ANSWER'}
            <input type="text" name="title" class="form-control" id="title" value="{$question.title}" readonly>
          {/if}
        </div>

        <br>
        <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">

        {if $type == 'QUESTION'}
            <br>
            <textarea class="form-control" id="pagedownMe" rows="10" id="body" name="body" value="{$FORM_VALUES.body}">{$question.contentText}</textarea>
        {elseif $type == 'ANSWER'}
            <textarea class="form-control" rows="10" id="body" name="body" readonly>{$question.contentText}</textarea>
        {/if}

        </div>
        <br>

        {if $type == 'QUESTION'}
          <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
            <b>Tags</b> 
              <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag1" name="tags[]" value="{$tags[0].name}" readonly>
              <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag2" name="tags[]" value="{$tags[1].name}" readonly>
              <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag3" name="tags[]" value="{$tags[2].name}" readonly>
              <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag4" name="tags[]" value="{$tags[3].name}" readonly>
              <input type="text" class="form-control" style="width:30%; height:30px; margin-bottom:4px" id="tag5" name="tags[]" value="{$tags[4].name}" readonly> 
          </div>
        {/if}
        {if $type == 'QUESTION'}

          <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
            <a role="button" class="btn btn-default pull-right" style="margin-top:10px" href="{$BASE_URL}pages/questions/show_question.php?id={$question.idQuestion}" >Cancel</a>
            <button type="submit" class="btn btn-default btn-info pull-right" id="edit-question" style="margin-top:10px">Edit Question</button>  
          </div>
        {/if}

    {if $type == 'QUESTION'}
      </form>

    {/if}

    {if $type == 'ANSWER'}

      <br>

      <form action="{$BASE_URL}actions/questions/edit_answer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idAnswer" value="{$content.id}">
        <input type="hidden" name="idQuestion" value="{$question.idQuestion}">
        <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
          <b>My Answer</b>
        </div>

        <br><br>

        <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
            <textarea class="form-control" id="pagedownMe" rows="10" id="body" name="body" value="{$FORM_VALUES.body}">{$content.contentText}</textarea>
        </div>

        <br><br>

        <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
          <a role="button" class="btn btn-default pull-right" style="margin-top:10px" href="{$BASE_URL}pages/questions/show_question.php?id={$question.idQuestion}" >Cancel</a>
          <button type="submit" class="btn btn-default btn-info pull-right" id="post-question" style="margin-top:10px">Edit Answer</button>
        </div>
      </form>

    {/if}

    <br><br>
    <br><br>
    

    <script type="text/javascript">
	    (function () {

	      $("textarea#pagedownMe").pagedownBootstrap();

	      $('.wmd-preview').addClass('well');

	    })();
    </script> 

{include file='common/footer.tpl'}