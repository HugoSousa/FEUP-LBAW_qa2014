{include file='common/header.tpl'}

{include file='common/topbar.tpl'}

{if $page >  $pages}
  <h1 style="text-align:center; margin-top:15%"> Unknown page! </h1> 

{else}


{foreach $questions as $question}
    <div class="panel panel-default" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="panel-heading">

        <span class="pull-right"> Asked {$question.contentDate|date_format:"M d 'Y"} at {$question.contentDate|date_format:"g:i"}  by 
          <a href="{$BASE_URL}pages/users/user.php?username={$question.user}">{$question.user}</a></span> <!--link para o user -->
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
        <h3 class="panel-title" id={$question.id}><a href="{$BASE_URL}pages/questions/question.php?id={$question.id}"><b>{$question.title}</b></a></h3>
      </div>
      <div class="panel-body">
        {substr($question.contentText, 0, 400)}
      </div>
    </div>
{/foreach}

    <div style="text-align:center">
      <ul class="pagination">
        {if $page == 1}
        <li class="disabled">
        {else}
        <li>
        {/if}
        <a href="#">&laquo;</a></li>

        {if $page >= 3}
          {for $page_=$page-2 to $page+2}
            {if $page_ <= $pages }
            <li><a href="#">{$page_}</a></li>
            {/if}
           {/for}
        {else}
          {for $page_=$page to $page+4}
            {if $page_ <= $pages  }
            <li><a href="#">{$page_}</a></li>
            {/if}
          {/for}
        {/if}


        {if ({sizeof($questions)} < 30)}
        <li class="disabled">
        {else}
        <li>
        {/if}
        <a href="#">&raquo;</a></li>
      </ul>
    </div>

{/if}
{include file='common/footer.tpl'}