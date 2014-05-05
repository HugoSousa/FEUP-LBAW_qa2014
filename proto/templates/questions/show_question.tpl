{include file='common/header.tpl'}

{include file='common/topbar.tpl'}
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$BASE_URL}css/jquery.pagedown-bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="{$BASE_URL}javascript/jquery.pagedown-bootstrap.combined.min.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/questions/comment.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/questions/answer.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/questions/vote.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/questions/delete.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/questions/flag.js"></script>
    <script type="text/javascript" src="{$BASE_URL}javascript/questions/accept_answer.js"></script>

    {literal}
    <style>
      a.flag-comment:hover {opacity:1.0 !important;}
    </style>
    {/literal}

    <div id="questionID" style="display:none">{$question.idQuestion}</div>
    <div id="userID" style="display:none">{$userid}</div>


    <div class="page-header" style="width:70%; margin-left:auto; margin-right:auto">
      <h3 style="word-wrap: break-word;">{$question.title}</h3>
    </div>

    <div class="container question" style="width:70%; margin-left:auto; margin-right:auto" id="{$question.idQuestion}">
      <div class="row">
        <div class="col-md-1">
          {if isset($own) && $own != $question.username}
            {if $question.myvoteup}
              <button type="button" class="btn btn-default btn-lg btn-warning questionVote voteUp">
            {else}
              <button type="button" class="btn btn-default btn-lg questionVote voteUp">
            {/if}
            <span class="glyphicon glyphicon-chevron-up"></span>
          </button>
          {/if}
          <br><br>
          {if $question.votes > 0}
          	<span class="label label-success" style="font-size:170%; display: inline-block; width: 50px;">
          {elseif $question.votes == 0}
          	<span class="label label-default" style="font-size:170%; display: inline-block; width: 50px;">
          {else}
          	<span class="label label-danger" style="font-size:170%; display: inline-block; width: 50px;">
          {/if}
          	{$question.votes}
      		</span>

          <br><br>
          {if isset($own) && $own != $question.username }
            {if $question.myvotedown}
              <button type="button" class="btn btn-default btn-lg btn-warning questionVote voteDown">
            {else}
              <button type="button" class="btn btn-default btn-lg questionVote voteDown">
            {/if}
            <span class="glyphicon glyphicon-chevron-down"></span>
          </button>
          {/if}
        </div>
        <div class="well well-lg col-md-8" style="word-wrap: break-word;">
          
          <script type="text/javascript">
            var converter = Markdown.getSanitizingConverter();
            var htmlText = converter.makeHtml("{$question.contentText}");
            document.write(htmlText);
          </script>
          
          
          <br><br><br>
          <span> Asked by <a href="{$BASE_URL}pages/users/show_user.php?username={$question.username}">{$question.username}</a> at {$question.contentDate|date_format:"M d 'Y"}, {$question.contentDate|date_format:"H:i"} </span>
          <br>
          <!-- TAGS -->
          <span> Tags:</span>
          {foreach $tags as $tag}
            <span class="label label-default" style="font-size:100%"><a href="#" style="color:white">{$tag.name}</a></span>
          {/foreach}

          {if $question.username == $own}
            <button type="button" class="btn btn-danger pull-right delete" id="{$question.idQuestion}">Delete</button>
          {/if}
          {if isset($own) && $own != $question.username}
          	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#flagQuestion">Flag</button>

            <div class="modal fade" id="flagQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Reason of flag</h4>
                  </div>
                  <div class="modal-body">
                    <textarea class="form-control" rows="3" style="resize:none"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" value="{$question.idQuestion}"  class="btn btn-primary flag">Ok</button>
                  </div>
                </div>
              </div>
            </div> 
          {/if}
          {if $question.username == $own}
          	<button type="button" class="btn btn-default pull-right">Edit</button>
          {/if}

        </div>
      </div>

    </div>

    <div id="QuestionDiv{$question.idQuestion}">
    {foreach $questionComments as $comment}
      <div class="well well-sm" style="margin-bottom:2px; margin-left:25%; margin-right:32.5%; text-align:justify; word-wrap: break-word;">
        {$comment.contentText}

        {if $own == $comment.username}
          <a class="close pull-right delete" id="{$comment.idComment}" style="color:red">&times;</a>
          <a class="pull-right" href="#">edit&nbsp;</a>
        {elseif isset($own)}
            <a class="pull-right flag-comment" href="#flagComment{$comment.idComment}" style="color:red; opacity:0.5" data-toggle="modal"><span class="glyphicon glyphicon-flag"></span></a>

            <div class="modal fade" id="flagComment{$comment.idComment}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Reason of flag</h4>
                  </div>
                  <div class="modal-body">
                    <textarea class="form-control" rows="3" style="resize:none"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" value="{$comment.idComment}"  class="btn btn-primary flag">Ok</button>
                  </div>
                </div>
              </div>
            </div> 

        {/if}

        <span class="pull-right">
          <a href="{$BASE_URL}pages/users/show_user.php?username={$comment.username}">{$comment.username}</a> <small> at {$comment.contentDate|date_format:"M d 'Y"}, {$comment.contentDate|date_format:"H:i"}&nbsp;&nbsp;&nbsp;</small>
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

    <hr>


     <div id="AllAnswers"> 
    {foreach $answersAndComments as $answer}

    <!--Divisoria Horizontal-->
    

    <!--Resposta-->
    <div class="container" style="width:70%; margin-left:auto; margin-right:auto" id="{$answer.idAnswer}">
      <div class="row">
        <div class="col-md-1">
          {if isset($own) && $own != $answer.username}
            {if $answer.myvoteup}
                <button type="button" class="btn btn-default btn-lg btn-warning answerVote voteUp">
            {else}
                <button type="button" class="btn btn-default btn-lg answerVote voteUp">
            {/if}
              <span class="glyphicon glyphicon-chevron-up"></span>
            </button>
          {/if}
          <br><br>

          {if $answer.votes > 0}
            <span class="label label-success" style="font-size:170%; display: inline-block; width: 50px;">
          {elseif $answer.votes == 0}
            <span class="label label-default" style="font-size:170%; display: inline-block; width: 50px;">
          {else}
            <span class="label label-danger" style="font-size:170%; display: inline-block; width: 50px;">
          {/if}
          {$answer.votes}</span>
          <br><br>

          {if isset($own) && $own != $answer.username}
            {if $answer.myvotedown}
                <button type="button" class="btn btn-default btn-lg btn-warning answerVote voteDown">
            {else}
                <button type="button" class="btn btn-default btn-lg answerVote voteDown">
            {/if}
              <span class="glyphicon glyphicon-chevron-down" ></span>
            </button>
          {/if}
          <br><br>
          {if $answer.isAccepted }
            {if isset($own) && $own == $question.username}
            <button type="button" class="btn btn-default btn-lg accepted accept-button" value="{$answer.idAnswer}" style="border:0; opacity:1">
            {else}
            <button type="button" class="btn btn-default btn-lg disabled accepted accept-button" value="{$answer.idAnswer}" style="border:0; opacity:1">
            {/if}
             <span class="glyphicon glyphicon-ok" style="color:green; font-size:150%"></span>
            </button>
          {elseif isset($own) && $own == $question.username }
            <button type="button" class="btn btn-default btn-lg accept-button" value="{$answer.idAnswer}" style="border:0; opacity:0.2">
              <span class="glyphicon glyphicon-ok" style="color:green; font-size:150%"></span>
            </button>
          {/if}

        </div>
        <div class="well well-lg col-md-8" style="word-wrap: break-word;">

          {$answer.contentText}

          <br><br><br>
          <span> Answered by <a href="{$BASE_URL}pages/users/show_user.php?username={$answer.username}">{$answer.username}</a> at {$answer.contentDate|date_format:"M d 'Y"}, {$answer.contentDate|date_format:"H:i"} </span>
          {if $answer.username == $own}
            <button type="button" class="btn btn-danger pull-right delete" id="{$answer.idAnswer}">Delete</button>
          {/if}
          {if isset($own) && $own != $answer.username}
            <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#flagAnswer{$answer.idAnswer}">Flag</button>

             <div class="modal fade" id="flagAnswer{$answer.idAnswer}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Reason of flag</h4>
                  </div>
                  <div class="modal-body">
                    <textarea class="form-control" rows="3" style="resize:none"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" value="{$answer.idAnswer}"  class="btn btn-primary flag">Ok</button>
                  </div>
                </div>
              </div>
            </div> 
          {/if}
          {if $answer.username == $own}
          <button type="button" class="btn btn-default pull-right">Edit</button>
          {/if}

        </div>
      </div>


    </div>
    <div id="CommentDiv{$answer.idAnswer}">
      {foreach $answer.comments as $comment}

        <div class="well well-sm" style="margin-bottom:2px; margin-left:25%; margin-right:32.5%; text-align:justif; word-wrap: break-word;">
          {$comment.text}
          {if $own == $comment.user}
            <a class="close pull-right delete" id="{$comment.idComment}" style="color:red">&times;</a>
            <a class="pull-right" href="#">edit&nbsp;</a>
          {elseif isset($own)}
            <a class="pull-right flag-comment" href="#flagComment{$comment.idComment}" style="color:red; opacity:0.5" data-toggle="modal"><span class="glyphicon glyphicon-flag"></span></a>

            <div class="modal fade" id="flagComment{$comment.idComment}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Reason of flag</h4>
                  </div>
                  <div class="modal-body">
                    <textarea class="form-control" rows="3" style="resize:none"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" value="{$comment.idComment}" class="btn btn-primary flag">Ok</button>
                  </div>
                </div>
              </div>
            </div>
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

      <hr>

    {/foreach}

  </div>

    
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