{include file='common/header.tpl'}

<div class="page-header">
  <h1 style="text-align:center">Q&A2014<br><small>Registration</small></h1>
</div>

<div class="container">
  <form class="form-horizontal" style="text-align:center" action="{$BASE_URL}actions/users/register.php" method="post" enctype="multipart/form-data">
    <fieldset>
      {if $FIELD_ERRORS.name}
      <div class="form-group has-error">
      {else}
      <div class="form-group">
      {/if}
        <label class="control-label" for="inputError">Name:</label>
        <div class="controls">
          <input type="text" id="inputError" name="name" required="required" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" value="{$FORM_VALUES.name}">
          <p class="help-block">{$FIELD_ERRORS.name}</p>
        </div>
      </div>
      {if $FIELD_ERRORS.login}
      <div class="form-group has-error">
      {else}
      <div class="form-group">
      {/if}
        <label class="control-label">Login:</label>
        <div class="controls">
          <input type="text" id="login" name="login" required="required" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" value="{$FORM_VALUES.login}">
          <span class="field_error">{$FIELD_ERRORS.login}</span>
        </div>
      </div>
      {if $FIELD_ERRORS.email}
      <div class="form-group has-error">
      {else}
      <div class="form-group">
      {/if}
        <label class="control-label">Email:</label>
        <div class="controls">
          <input type="email" id="email" required="required" name="email" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" value="{$FORM_VALUES.email}">
          <span class="field_error">{$FIELD_ERRORS.email}</span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Password:</label>
        <div class="controls">
          <input type="password" id="password1" required="required" name="password1" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" 
          onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Password must contain at least a UPPERCASE letter, a lowercase letter and a number' : '');
          if(this.checkValidity()) form.password2.pattern = this.value;">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Confirm Password:</label>
        <div class="controls">
          <input type="password" id="password2" required="required" name="password2" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" 
          onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label"></label>
        <div class="controls">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>


{include file='common/footer.tpl'}


