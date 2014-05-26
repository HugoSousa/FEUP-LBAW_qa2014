{include file='common/header.tpl'}

{include file='common/topbar.tpl'}

<script src="{$BASE_URL}javascript/tags/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">
	

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