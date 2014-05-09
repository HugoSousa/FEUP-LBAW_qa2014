{include file='common/header.tpl'}

{include file='common/topbar.tpl'}

<script src="{$BASE_URL}javascript/flags/solve.js"></script>

<div class="page-header" style="width:70%; margin-left:auto; margin-right:auto">
	
	<span><small>{$content.type}</small></span>
    <h2 style="margin-top:0" class="idContent" id="{$content.id}"><a href="#">{substr({$content.contentText},0, 140)}</a> 
    <br><br>
</div>

<br><br>

<div style="width:70%; margin-left:auto; margin-right:auto; text-align:center"> 
	<button type="button" style="width:50%" class="btn btn-danger btn-lg" id="solve"><span class="glyphicon glyphicon-remove"></span>Solved</button></h2>
</div>
<br><br>

 <div class="panel panel-default" style="width:70%; margin-left:auto; margin-right:auto">
    <table class="table table-vcenter">
      <thead>
        <tr>
          <th style="width:15%">Flagged by</th>
          <th style="width:70%">Description</th>
          <th style="width:15%">Date</th>
        </tr>
      </thead>
      {foreach $reports as $report}
      <tr style="vertical-align:middle">
            <td><a href="#">{$report.username}</a></td>
            <td>{$report.reason}</td>
            <td>{$report.flagDate|date_format:"M d 'Y - H:i"}</td>
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

	    {if $page == $pages}
	   	<li class="disabled">
	    {else}
	    <li>
	    {/if}
	    <a href="{$BASE_URL}pages/flags/list_all.php?page={$page+1}">&raquo;</a></li>
{/if}

<br><br>

{include file='common/footer.tpl'}

