{include file='common/header.tpl'}

<script type="text/javascript" src="{$BASE_URL}javascript/jquery.pagedown-bootstrap.combined.min.js"></script>
<script src="{$BASE_URL}javascript/questions/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px; margin-bottom:20px">
  {if isset($own)}
  <ul class="nav navbar-nav navbar-left">
    <li> <a href="{$BASE_URL}pages/questions/new_question.php" ><b>Ask a Question</b></a></li>
  </ul>
  {/if}
  <ul class="nav navbar-nav navbar-right">
    <li> <a href="{$BASE_URL}pages/users/list_all.php">Users</a></li>
    <li> <a href="{$BASE_URL}pages/tags/list_all.php">Tags</a></li>
  </ul>
</div>

{if $page >  $pages}
  <h1 style="text-align:center; margin-top:15%"> Unknown page! </h1> 

{else}


{foreach $questions as $question}
    <div class="panel panel-default" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="panel-heading">

        <span class="pull-right"> Asked {$question.contentDate|date_format:"M d 'Y"} at {$question.contentDate|date_format:"H:i"}  by 
          <a href="{$BASE_URL}pages/users/show_user.php?username={$question.user}">{$question.user}</a></span> <!--link para o user -->
        <!-- so se for aceite -->
        <h3 class="panel-title">

          {if ($question.upvotes - $question.downvotes) > 0}
          <b style="font-size:125%; color:green">
          {else if ($question.upvotes - $question.downvotes) == 0}
          <b style="font-size:125%; color:grey">
          {else}
          <b style="font-size:125%; color:red">
          {/if}
          {$question.upvotes - $question.downvotes}</b>

          {if $question.accepted}
          <span class="glyphicon glyphicon-ok" style="color:green; margin-left:1em"> </span>
          {/if}
        </h3>
        <span class="pull-right" >{$question.answers} Answers</span>
        <h3 class="panel-title" id={$question.id} style="word-wrap: break-word;"><a href="{$BASE_URL}pages/questions/show_question.php?id={$question.id}"><b>{$question.title}</b></a></h3>
      </div>
      <div class="panel-body" style="word-wrap: break-word;">
            <script type="text/javascript">
              var converter = Markdown.getSanitizingConverter();
              var htmlText = converter.makeHtml("{substr($question.contentText, 0, 100)}");
              document.write(htmlText);
          </script>
      </div>
    </div>
{/foreach}

 
{include file='common/pagination.tpl'}

    <br><br>

{/if}


{include file='common/footer.tpl'}