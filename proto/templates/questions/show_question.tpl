{include file='common/header.tpl'}

{include file='common/topbar.tpl'}
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$BASE_URL}css/jquery.pagedown-bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="{$BASE_URL}javascript/jquery.pagedown-bootstrap.combined.min.js"></script>

    <div class="page-header" style="width:70%; margin-left:auto; margin-right:auto">
      <h3>{$question.title}</h3>
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
            <span class="glyphicon glyphicon-chevron-up"></span>
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
            <span class="glyphicon glyphicon-chevron-down"></span>
          </button>
          {/if}
        </div>
        <div class="well well-lg col-md-8">
		      {$question.contentText}
          <br><br><br>
          <span> Asked by <a href="#">{$question.username}</a> at {$question.contentDate|date_format:"M d 'Y"}, {$question.contentDate|date_format:"H:i"} </span>
          <br>
          <!-- FALTA QUERY DE PROCURAR TAGS DE UMA QUESTÃO -->
          <span> Tags:</span>
          <span class="label label-default" style="font-size:100%"><a href="#" style="color:white">lorem</a></span>
          <span class="label label-default" style="font-size:100%"><a href="#" style="color:white">ipsum</a></span>
          <span class="label label-default" style="font-size:100%"><a href="#" style="color:white">sed</a></span>
          {if $question.username == $own}
          	<button type="button" class="btn btn-default pull-right">Flag</button>
          	<button type="button" class="btn btn-default pull-right">Edit</button>
          {/if}

        </div>
      </div>

    </div>


    {foreach $questionComments as $comment}
      <div class="well well-sm" style="margin-bottom:2px; margin-left:25%; margin-right:32.5%; text-align:justify">
        {$comment.contentText}

        {if $own == $comment.username}
          <a class="close pull-right" style="color:red">&times;</a>
          <a class="pull-right" href="#">edit&nbsp;</a>
        {/if}

        <span class="pull-right">
          <a href="#">{$comment.username}</a> <small>{$comment.contentDate|date_format:"M d 'Y"}, {$comment.contentDate|date_format:"H:i"}&nbsp;&nbsp;&nbsp;</small>
        </span>
      </div>
    {/foreach}

    {if isset($own)}
      <br>
      <div class="container" style="margin-right:31.4%">
        <button type="button" class="btn btn-default btn-xs btn-info pull-right">Add Comment</button>
      </div>
    {/if}


    {foreach $answersAndComments as $answer}

    <!--Divisoria Horizontal-->
    <hr>

    <!--Resposta-->
    <div class="container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="row">
        <div class="col-md-1">
          {if $answer.myvoteup}
              <button type="button" class="btn btn-default btn-lg btn-warning">
          {else}
              <button type="button" class="btn btn-default btn-lg">
          {/if}
            <span class="glyphicon glyphicon-chevron-up"></span>
          </button>
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
          {if $answer.myvotedown}
              <button type="button" class="btn btn-default btn-lg btn-warning">
          {else}
              <button type="button" class="btn btn-default btn-lg">
          {/if}
            <span class="glyphicon glyphicon-chevron-down"></span>
          </button>
          <br><br>
          {if $answer.isAccepted}
            <button type="button" class="btn btn-default btn-lg" style="border:0">
              <span class="glyphicon glyphicon-ok" style="color:green; font-size:150%"></span>
            </button>
          {/if}

        </div>
        <div class="well well-lg col-md-8">

          {$answer.contentText}
          <br><br><br>
          <span> Answered by <a href="#">{$answer.username}</a> at {$answer.contentDate|date_format:"M d 'Y"}, {$answer.contentDate|date_format:"H:i"} </span>
          {if $answer.username == $own}
          <button type="button" class="btn btn-danger pull-right">Delete</button>
          {/if}
          {if isset($own)}
          <button type="button" class="btn btn-default pull-right">Flag</button>
          {/if}
          {if $answer.username == $own}
          <button type="button" class="btn btn-default pull-right">Edit</button>
          {/if}

        </div>
      </div>

    </div>

      {foreach $answer.comments as $comment}

        <div class="well well-sm" style=" margin-left:25%; margin-right:32.5%; text-align:justify">
          {$comment.text}
          {if $own == $comment.username}
            <a class="close pull-right" style="color:red">&times;</a>
            <a class="pull-right" href="#">edit&nbsp;</a>
          {/if}
          <span class="pull-right">
            <a href="#">{$comment.user}</a> <small>at {$comment.date|date_format:"M d 'Y"}, {$comment.date|date_format:"H:i"} &nbsp;&nbsp;&nbsp;</small>
          </span>
        </div>


      {/foreach}

    {if isset($own)}
    <div class="container" style="margin-right:31.4%">
      <button type="button" class="btn btn-default btn-xs btn-info pull-right">Add Comment</button>
    </div>
    {/if}

    {/foreach}

    <hr>
    <br>

    {if isset($own)}
    <!--CREDITS:https://github.com/kevinoconnor7/pagedown-bootstrap/-->
    <div class="container" style="margin-left:15%;margin-right:31.4%; width:60%">
      <textarea class="form-control" id="pagedownMe" rows="10"></textarea>
    </div>

    <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
      <button type="button" class="btn btn-default btn-info pull-right" style="margin-top:10px">Post Answer</button>
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