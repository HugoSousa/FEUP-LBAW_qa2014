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