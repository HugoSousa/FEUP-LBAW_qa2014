{include file='common/header.tpl'}

<div class="page-header">
  <h1 style="text-align:center">Q&A2014<br><small>Change Password</small></h1>
</div>

<div class="container">
  <form class="form-horizontal" style="text-align:center" action="{$BASE_URL}actions/users/change_password.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <div class="form-group">
        <label class="control-label">Old Password:</label>
        <div class="controls">
          <input type="password" name="old_password" required="required" class="form-control" style="width:15%; margin-left:auto; margin-right:auto">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label">New Password:</label>
        <div class="controls">
          <input type="password" required="required" name="new_password" class="form-control" style="width:15%; margin-left:auto; margin-right:auto">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label">Confirm New Password:</label>
        <div class="controls">
          <input type="password" required="required" name="new_password2" class="form-control" style="width:15%; margin-left:auto; margin-right:auto">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label"></label>
        <div class="controls">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
      <input name="user_id" value="{$id}" style="display:none">
    </fieldset>
  </form>
</div>


{include file='common/footer.tpl'}


