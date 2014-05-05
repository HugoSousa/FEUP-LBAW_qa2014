{include file='common/header.tpl'}

<script src="{$BASE_URL}javascript/flags/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">
	<ul class="nav navbar-nav navbar-left">
	  <li> <a href="{$BASE_URL}pages/questions/new_question.php" ><b>Ask a Question</b></a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	  <li> <a href="{$BASE_URL}pages/users/list_all.php">Users</a></li>
	  <li> <a href="{$BASE_URL}pages/tags/list_all.php">Tags</a></li>
	  <li class="dropdown">

	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order by <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li>
	          	{if $order == 'date_new'}
	          	<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'date_new')">
	          	{else}
	          	<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'date_new')">
	          	{/if}
	          		Newest</button></li>
	  		  <li>
	  		  	{if $order == 'date_old'}
	  		  	<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'date_old')">
	  		  	{else}
	  		  	<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'date_old')">
	  		  	{/if}
	  		  		Oldest</button></li>
	          <li>
	          	{if $order == 'flags_more'}
	          	<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'flags_more')">
	          	{else}
	          	<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'flags_more')">
	          	{/if}
	          		More # of Flags</button></li>
	  		  <li>
	  		  	{if $order == 'flags_less'}
	  		  	<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'flags_less')">
	  		  	{else}
	  		  	<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'flags_less')">
	  		  	{/if}
	  		  		Less # of Flags</button></li>
	        </ul>
	    </li>
	</ul>
</div>

<br><br>

{if $page >  $pages}
  <h1 style="text-align:center; margin-top:15%"> Unknown page! </h1> 

{else}
<div class="panel panel-default" style="width:70%; margin-left:auto; margin-right:auto">
    <table class="table table-vcenter">
      <thead>
        <tr>
          <th style="width:10%"># of Flags</th>

          <th style="width:65%">Question</th>

          <th style="width:15%">Last Flagged</th>

		  <th style="width:10%"></th>

        </tr>
      </thead>
      {foreach $flags as $flag}
      	<tr>
            <td>{$flag.flags}</td>
            <td><a href="{$BASE_URL}pages/questions/show_question.php?id={$flag.link}">{substr({$flag.text}, 0, 140)}</a></td>
            <td>{$flag.date|date_format:"M d 'Y - H:i"}</td>
            <td align="right"><a class="btn btn-default btn-s" href="{$BASE_URL}pages/flags/show_flag.php?id={$flag.idContent}">Solve</a></td>
        </tr>
      {/foreach}
    </table>
</div>

{if $pages > 1}
	<div style="text-align:center">
	  <ul class="pagination">
	  	{if $page == 1}
	    <li class="disabled">
	    {else}
	    <li>
	    {/if}
	    <a href="{$BASE_URL}pages/flags/list_all.php?page={$page-1}">&laquo;</a></li>

	    {if $pages > 3}
		    {for $p=$page-2 to $page+2}
		    	{if $p >= $pages}
			    	{if $p == $page}
			    		<li class="active">
			    	{else}
			    		<li>
			    	{/if}
		    		<a href="{$BASE_URL}pages/flags/list_all.php?page={$p}">$p</a></li>
		    	{/if}
		    {/for}
		    <li><a href="{$BASE_URL}pages/flags/list_all.php?page={$page+1}">&raquo;</a></li>
		
		{elseif $pages <= 3}
			{for $p=$page to $page+4}
				{if $p >= $pages}
			    	{if $p == $page}
			    		<li class="active">
			    	{else}
			    		<li>
			    	{/if}
			    	<a href="{$BASE_URL}pages/flags/list_all.php?page={$p}">$p</a></li>
			    {/if}
		    {/for}
		    <li><a href="{$BASE_URL}pages/flags/list_all.php?page={$page+1}">&raquo;</a></li>
		{/if}
	  </ul>
	</div>
{/if}

{/if}


<br><br>

{include file='common/footer.tpl'}