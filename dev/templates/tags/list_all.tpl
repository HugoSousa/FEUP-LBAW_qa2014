{include file='common/header.tpl'}

{include file='common/topbar.tpl'}

<script src="{$BASE_URL}javascript/tags/list_all.js"></script>
{if $PERMISSION == 'A'}
<script src="{$BASE_URL}javascript/tags/admin_tags.js"></script>
{/if}
{if $PERMISSION == 'R' || $PERMISSION == 'A'}
<script src="{$BASE_URL}javascript/tags/suggest.js"></script>
{/if}

<div id="page-header" class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">

    {if $PERMISSION == 'R' || $PERMISSION == 'A'}
    <div class="row" style="width:70%; margin-left:auto; margin-right:auto">
        <div class="col-lg-6 pull-right" style="padding-right:0px">
          
          <div class="pull-right">
            <label>Suggest a new Tag. Subject of approval by admin.</label>
            <input id="tag-name" type="text" class="form-control" placeholder="Tag Name">
            <input id="tag-description" type="text" class="form-control" placeholder="Tag Description (optional)" style="margin-top:2px">
            <span>
              <button id="suggest-tag" class="btn btn-info pull-right" type="button" style="margin-top:5px">Suggest Tag!</button>
            </span>
          </div>
        </div>
      </div>
      <br><br>
    {/if}
    {if $PERMISSION == 'A' && $notAcceptedTags|@count > 0}
    <div class="panel panel-default" style="width:70%; margin-left:15%; margin-right:auto; " >
        <table class="table" style="table-layout:fixed">
          <thead>
            <tr>
              <th style="width:22%">Tag Name</th>
              <th style="width:58%">Tag Description</th>
              <th style="width:10%"></th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          {for $index = 0 to $notAcceptedTags|@count}
              {if $index < 10}
                <tr>
              {else}
                <tr class="hidden" >
              {/if}

                <td style="word-wrap: break-word;">{$notAcceptedTags[$index].name}</td>
                <td style="word-wrap: break-word;">{$notAcceptedTags[$index].description}</td>
                <td><button type="button" class="btn btn-success btn-xs tag-accept" value="{$notAcceptedTags[$index].idTag}"><span class="glyphicon glyphicon-ok"></span> Accept</button></td>
                <td><button type="button" class="btn btn-danger btn-xs tag-reject" value="{$notAcceptedTags[$index].idTag}"><span class="glyphicon glyphicon-remove"></span> Reject</button></td>
            </tr>
          {/for}
          
        </table>
      </div>
      <br><br>
	{/if}

    <div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">
	<form class="navbar-form navbar-left" role="search" style="padding-left:0">
		<div class="form-group">
        		<input name="search" type="text" class="form-control" placeholder="Search Tag">
       		</div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    </form>


    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order by <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                	{if $order == 'number_tags'}
                		<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'number_tags',  '{$search}')">
                	{else}
                		<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'number_tags', '{$search}')">
                	{/if}
                		Tags</button>
                </li>
                <li>
                	{if $order == 'name'}
                		<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'name', '{$search}')">
                	{else}
                		<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'name',  '{$search}')">
                	{/if}
                		Name</button>
                </li>
            </ul>
        </li>
    </ul>
</div>


<br>

<div class="panel panel-default" style="width:70%; margin-left:15%; margin-right:auto">
    <table class="table">
        <thead>
          	<tr>
              	<th>#</th>
              	<th>Name</th>
              	<th>Tags</th>
            </tr>
        </thead>
        {$counter = (($page-1)*30)+1}
        {foreach $tags as $tag}
        	<tr>
	            <td>{$counter++}</td>
	            <td><a href="#">{$tag.name}</a></td>
	            <td>{$tag.total}</td>
	        </tr>
        {/foreach}

    </table>
</div>

{include file='common/pagination.tpl'}

<br><br>

{include file='common/footer.tpl'}