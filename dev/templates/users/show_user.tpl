{include file='common/header.tpl'}

{include file='common/topbar.tpl'}

	<script src="{$BASE_URL}javascript/users/user.js"></script>

    <div class="page-header" style="width:70%; margin-left:auto; margin-right:auto" >
      <h1><span class="user-name" id="{$user.username}">{$user.username}
            {if $user.banned}
              <span style="color:red"> [banned] 
              </span>
            {/if}
          </span>
      {if $PERMISSION == 'A' && $USERNAME != $user.username && !$user.banned}
        <button type="button" id="ban-user" class="btn btn-danger btn-lg pull-right"><span class="glyphicon glyphicon-remove"></span> Ban</button>
      {/if}
      {if $PERMISSION == 'R' && $USERNAME == $user.username && !$user.banned}
        <a class="btn btn-primary pull-right" href="{$BASE_URL}pages/users/change_password.php?id={$user.id}">Change Password</a>
      {/if}
      </h1>

    </div>


    <div style="text-align:center">
      <small>Reputation</small>
      <br>
      <h2>{$user.reputation}</h2>
    </div>

    <br><br>

    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="col-md-4">
        <i>Real Name</i>
      </div>
      <div class="col-md-8"  id="realname">
        <span>{if empty($user.realName)}---------------{else}{$user.realName}{/if}</span>
        {if $own == $user.username}
        <a class="pull-right edit" href="javascript:undefined">Edit</a>
        {/if}
      </div>
    </div>  
    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="col-md-4">
        <i>Location</i>
      </div>
      <div class="col-md-8" id="location">
        <span>{if empty($user.location)}---------------{else}{$user.location}{/if}</span>
        {if $own == $user.username}
        <a class="pull-right edit" href="javascript:undefined" >Edit</a>
        {/if}
      </div>
    </div>    
    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto;">
      <div class="col-md-4">
        <i>Email</i>
      </div>
      <div class="col-md-8" id="email">
        <span>{$user.email}</span>
      </div>
    </div>
    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto;">
      <div class="col-md-4">
        <i>Registered since</i>
      </div>
      <div class="col-md-8">
        <span>{$user.registry|date_format:"d/m/Y"}</span>
      </div>
    </div>

    <br>
    <div style="width:70%; margin-left:auto; margin-right:auto;"> 
      <small>Biography</small>
      {if $own == $user.username}
        <a class="pull-right" id="edit_biography" href="#">Edit</a>
      {/if}
    </div>


    <div class="well" style="width:70%; margin-left:auto; margin-right:auto;">
    	{$user.biography}
    </div>

    <hr>


    <div class="row" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="col-md-6" style="padding-left:0">
        <div class="panel panel-default">
          <div class="panel-heading">
            Top Questions
          </div>
          <div class="panel-body">
            <table class="table" style="margin-bottom:0px">
              {foreach $topQuestions as $question}
	              <tr>
	              	<td style="width:5%; border:0; height:55px">
	              	{if $question.total > 0}
	                	<span style="font-size:125%; color:green">
	                {else if $question.total == 0}
	                	<span style="font-size:125%; color:grey">
	                {else}
	                	<span style="font-size:125%; color:red">
	                {/if}
	    
	                {$question.total}</span></td>
	                <td style="border:0"><a href="{$BASE_URL}pages/questions/show_question.php?id={$question.idQuestion}">
	                {if strlen($question.title) > 140} 
	                	{substr($question.title,0,137)}
	                	...
	                {else}
	                	{$question.title}
	                {/if}
	            	</a></td>
	              </tr>
              {/foreach}
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-6" style="padding-right:0">
        <div class="panel panel-default">
          <div class="panel-heading">
            Top Answers
          </div>
          <div class="panel-body">
            <table class="table" style="margin-bottom:0px">
              {foreach $topAnswers as $answer}
	              <tr>
	                <td style="width:5%; border:0; height:55px">
	                {if $answer.total > 0}
	                	<span style="font-size:125%; color:green">
	                {else if $answer.total == 0}
	                	<span style="font-size:125%; color:grey">
	                {else}
	                	<span style="font-size:125%; color:red">
	                {/if}
	                {$answer.total}</span></td>
	                <td style="border:0"><a href="{$BASE_URL}pages/questions/show_question.php?id={$answer.idQuestion}">
	                {if strlen($answer.contentText) > 140} 
	                	{substr($answer.contentText,0,137)}
	                	...
	                {else}
	                	{$answer.contentText}
	                {/if}
	            	</a></td>
	              </tr>
              {/foreach}
            </table>
          </div>
        </div>
      </div>


    </div>

    <br><br><br>

{include file='common/footer.tpl'}