{include file='common/header.tpl'}

<script src="{$BASE_URL}javascript/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px; margin-bottom:20px">
  <ul class="nav navbar-nav navbar-left">
    <li> <a href="#" ><b>Ask a Question</b></a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li> <a href="#">Users</a></li>
    <li> <a href="#">Tags</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order<b class="caret"></b></a>
      <ul class="dropdown-menu" style="padding:0px" id="order_dropdown">
        {if $order == 'new'}
          <li><button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, 'new', '{$filter_ans}', '{$filter_acc}')">Newest First</button></li>
          <li><button class="btn btn-default btn-block " style="border-radius: 0;" onclick="dropdownClick({$page}, 'old', '{$filter_ans}', '{$filter_acc}')">Oldest First</button></li>
        {else}
          <li><button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick({$page}, 'new', '{$filter_ans}', '{$filter_acc}')">Newest First</button></li>
          <li><button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, 'old', '{$filter_ans}', '{$filter_acc}')">Oldest First</button></li>
        {/if}
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search Options<b class="caret"></b></a>
      <ul class="dropdown-menu" style="padding:0px" id="filter_dropdown">
        <li>
          <div class="row" style="width: 400px;">
            <ul class="list-unstyled col-md-6">
              <li>
                {if $filter_ans == 'n'}
                  <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', 'n', '{$filter_acc}')">
                {else}
                  <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', 'n', '{$filter_acc}')">
                {/if}
                Non-Answered</button>
              </li>
              <li>
                {if $filter_ans == 'y'}
                  <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', 'y', '{$filter_acc}')">
                {else}
                  <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', 'y', '{$filter_acc}')">
                {/if}
              Answered</button>
              </li>
              <li>
                {if $filter_ans == 'all'}
                  <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', 'all', '{$filter_acc}')">
                {else}
                  <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', 'all', '{$filter_acc}')">
                {/if}
                All</button>
              </li>
            </ul>
            <ul class="list-unstyled col-md-6">
                <li>
                  {if $filter_ans == 'n'}
                      <button class="btn btn-default btn-block disabled" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'n')">
                  {else}
                    {if $filter_acc == 'n'}
                      <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'n')">
                    {else}
                    <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'n')">
                    {/if}
                  {/if}
                  Non-Accepted</button>
                </li>
                <li>
                  {if $filter_ans == 'n'}
                      <button class="btn btn-default btn-block disabled" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'y')">
                  {else}
                    {if $filter_acc == 'y'}
                      <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'y')">
                    {else}
                    <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'y')">
                    {/if}
                  {/if}
                  Accepted</button>
                </li>
                <li>
                  {if $filter_acc == 'all'}
                    <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'all')">
                  {else}
                    <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick({$page}, '{$order}', '{$filter_ans}', 'all')">
                  {/if}
                  All</button>
                </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div>

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