{include file='common/header.tpl'}

{include file='common/topbar.tpl'}

<script src="{$BASE_URL}javascript/users/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">
	<form class="navbar-form navbar-left" role="search" style="padding-left:0">
		<div class="form-group">
        	<input type="text" class="form-control" placeholder="Search User">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order by <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                	{if $order == 'username'}
                		<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'username')">
                	{else}
                		<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'username')">
                	{/if}
                		Username</button>
                </li>
                <li>
                	{if $order == 'registry'}
                		<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'registry')">
                	{else}
                		<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'registry')">
                	{/if}
                		Registry Date</button>
                </li>
                <li>
                	{if $order == 'reputation'}
                		<button class="btn btn-default btn-block active" onclick="dropdownClick({$page}, 'reputation')">
                	{else}
                		<button class="btn btn-default btn-block" onclick="dropdownClick({$page}, 'reputation')">
                	{/if}
                		Reputation</button>
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
              	<th>Username</th>
              	<th>Reputation</th>
              	<th>Registered since</th>
            </tr>
        </thead>
        {$counter = (($page-1)*30)+1}
        {foreach $users as $user}
        	<tr>
	        	<td>{$counter++}</td>
	            <td><a href="{$BASE_URL}pages/users/show_user.php?username={$user.username}">{$user.username}</a></td>
	            <td>{$user.reputation}</td>
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$user.registry|date_format:"d/m/Y"}</td>
	        </tr>
        {/foreach}

    </table>
</div>

{include file='common/pagination.tpl'}

<br><br>

{include file='common/footer.tpl'}