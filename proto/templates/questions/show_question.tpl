{include file='common/header.tpl'}

{include file='common/topbar.tpl'}
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$BASE_URL}css/jquery.pagedown-bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="{$BASE_URL}javascript/jquery.pagedown-bootstrap.combined.min.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/comment.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/answer.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/vote.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/flag.js"></script>

    <div class="page-header" style="width:70%; margin-left:auto; margin-right:auto">
      <h3 style="word-wrap: break-word;">{$question.title}</h3>
    </div>

    <div class="container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="row">
        <div class="col-md-1">
          {if isset($own)}
            {if $question.myvoteup}
              <button type="button" class="btn btn-default btn-lg btn-warning">
            {else}
              <button type="button" class="btn btn-default btn-lg">
            {/if}
            <span class="glyphicon glyphicon-chevron-up voteUp"></span>
          </button>
          {/if}
          <br><br>
          {if $question.votes > 0}
          	<span class="label label-success" style="font-size:170%; display: inline-block; width: 50px;">
          {else if $question.votes == 0}
          	<span class="label label-default" style="font-size:170%; display: inline-block; width: 50px;">
          {else}
          	<span class="label label-danger" style="font-size:170%; display: inline-block; width: 50px;">
          {/if}
          	{$question.votes}
      		</span>

          <br><br>
          {if isset($own)}
            {if $question.myvotedown}
              <button type="button" class="btn btn-default btn-lg btn-warning">
            {else}
              <button type="button" class="btn btn-default btn-lg">
            {/if}
            <span class="glyphicon glyphicon-chevron-down voteDown"></span>
          </button>
          {/if}
        </div>
        <div class="well well-lg col-md-8" style="word-wrap: break-word;">
		      {$question.contentText}
          <br><br><br>
          <span> Asked by <a href="{$BASE_URL}pages/users/show_user.php?username={$question.username}">{$question.username}</a> at {$question.contentDate|date_format:"M d 'Y"}, {$question.contentDate|date_format:"H:i"} </span>
          <br>
          <!-- TAGS -->
          <span> Tags:</span>
          {foreach $tags as $tag}
            <span class="label label-default" style="font-size:100%"><a href="#" style="color:white">{$tag.name}</a></span>
          {/foreach}

          {if $question.username == $own}
          	<button type="button" class="btn btn-default pull-right">Flag</button>
          	<button type="button" class="btn btn-default pull-right">Edit</button>
          {/if}

        </div>
      </div>

    </div>
  
    <div id="questionID" style="display:none">"{$question.idQuestion}"</div>
    <div id="userID" style="display:none">{$userid}</div>

    <div id="QuestionDiv{$question.idQuestion}">
    {foreach $questionComments as $comment}
      <div class="well well-sm" style="margin-bottom:2px; margin-left:25%; margin-right:32.5%; text-align:justify; word-wrap: break-word;">
        {$comment.contentText}

        {if $own == $comment.username}
          <a class="close pull-right" style="color:red">&times;</a>
          <a class="pull-right" href="#">edit&nbsp;</a>
        {/if}

        <span class="pull-right">
          <a href="{$BASE_URL}pages/users/show_user.php?username={$comment.username}">{$comment.username}</a> <small>{$comment.contentDate|date_format:"M d 'Y"}, {$comment.contentDate|date_format:"H:i"}&nbsp;&nbsp;&nbsp;</small>
        </span>
      </div>
    {/foreach}
  </div>

    {if isset($own)}
    <div class="container" style="margin-right:31.4%">
      <button id="comment" class="btn btn-default btn-xs btn-info pull-right" data-toggle="modal" data-target="#modalQuestion">
        Add Comment
      </button>
    </div>
    {/if}
      <!-- Modal -->
      <div class="modal fade" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Comment Question of {$question.username}</h4>
            </div>
            <div class="modal-body">
              <textarea class="form-control" rows="10" style="resize:none"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id ="commentQuestion" type="button" value="{$question.idQuestion}"  class="btn btn-primary">Comment</button>
            </div>
          </div>
        </div>
      </div>  


     <div id="AllAnswers"> 
    {foreach $answersAndComments as $answer}

    <!--Divisoria Horizontal-->
    <hr>

    <!--Resposta-->
    <div class="container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="row">
        <div class="col-md-1">
          {if isset($own)}
            {if $answer.myvoteup}
                <button type="button" class="btn btn-default btn-lg btn-warning">
            {else}
                <button type="button" class="btn btn-default btn-lg">
            {/if}
              <span class="glyphicon glyphicon-chevron-up voteUp"></span>
            </button>
          {/if}
          <br><br>

          {if $answer.votes > 0}
            <span class="label label-success" style="font-size:170%; display: inline-block; width: 50px;">
          {else if $answer.votes == 0}
            <span class="label label-default" style="font-size:170%; display: inline-block; width: 50px;">
          {else}
            <span class="label label-danger" style="font-size:170%; display: inline-block; width: 50px;">
          {/if}
          {$answer.votes}</span>
          <br><br>

          {if isset($own)}
            {if $answer.myvotedown}
                <button type="button" class="btn btn-default btn-lg btn-warning">
            {else}
                <button type="button" class="btn btn-default btn-lg">
            {/if}
              <span class="glyphicon glyphicon-chevron-down voteDown" ></span>
            </button>
          {/if}
          <br><br>
          {if $answer.isAccepted}
            <button type="button" class="btn btn-default btn-lg" style="border:0">
              <span class="glyphicon glyphicon-ok" style="color:green; font-size:150%"></span>
            </button>
          {/if}

        </div>
        <div class="well well-lg col-md-8" style="word-wrap: break-word;">

          {$answer.contentText}

          <br><br><br>
          <span> Answered by <a href="{$BASE_URL}pages/users/show_user.php?username={$answer.username}">{$answer.username}</a> at {$answer.contentDate|date_format:"M d 'Y"}, {$answer.contentDate|date_format:"H:i"} </span>
          {if $answer.username == $own}
          <button type="button" class="btn btn-danger pull-right">Delete</button>
          {/if}
          {if isset($own)}
          <button type="button" id="flagContent" class="btn btn-default pull-right">Flag</button>
          {/if}
          {if $answer.username == $own}
          <button type="button" class="btn btn-default pull-right">Edit</button>
          {/if}

        </div>
      </div>


    </div>
    <div id="CommentDiv{$answer.idAnswer}">
      {foreach $answer.comments as $comment}

        <div class="well well-sm" style=" margin-left:25%; margin-right:32.5%; text-align:justif; word-wrap: break-word;">
          {$comment.text}
          {if $own == $comment.username}
            <a class="close pull-right" style="color:red">&times;</a>
            <a class="pull-right" href="#">edit&nbsp;</a>
          {/if}
          <span class="pull-right">
            <a href="{$BASE_URL}pages/users/show_user.php?username={$comment.user}">{$comment.user}</a> <small>at {$comment.date|date_format:"M d 'Y"}, {$comment.date|date_format:"H:i"} &nbsp;&nbsp;&nbsp;</small>
          </span>
        </div>


      {/foreach}
    </div>

    <!-- {if isset($own)} 
     <div class="container" style="margin-right:31.4%">
      <button id="comment" class="btn btn-default btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal{$answer.idAnswer}">
        Add Comment
      </button>
    </div>
     {/if} -->

     {if isset($own)}
    <!-- Button trigger modal -->
     <div class="container" style="margin-right:31.4%">
      <button id="comment" class="btn btn-default btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal{$answer.idAnswer}">
        Add Comment
      </button>
    </div>
    {/if}
      <!-- Modal -->
      <div class="modal fade" id="modal{$answer.idAnswer}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Comment Answer of {$answer.username}</h4>
            </div>
            <div class="modal-body">
              <textarea class="form-control" rows="10" style="resize:none"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id ="commentAnswer" type="button" value="{$answer.idAnswer}"  class="btn btn-primary">Comment</button>
            </div>
          </div>
        </div>
      </div>  

    {/foreach}

  </div>

    <hr>
    <br>

    {if isset($own)}
    <!--CREDITS:https://github.com/kevinoconnor7/pagedown-bootstrap/-->
    <div>
      <div class="container" style="margin-left:15%;margin-right:31.4%; width:60%">
        <textarea class="form-control" id="pagedownMe" rows="10"></textarea>
      </div>

      <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
        <button id="postAnswer" type="button" class="btn btn-default btn-info pull-right" style="margin-top:10px" value="{$question.idQuestion}" >Post Answer</button>
      </div>
    </div>
    {/if}


    <br><br><br><br>

    <script type="text/javascript">
    (function () {

      $("textarea#pagedownMe").pagedownBootstrap();

      $('.wmd-preview').addClass('well');

    })();
    </script>

{include file='common/footer.tpl'}