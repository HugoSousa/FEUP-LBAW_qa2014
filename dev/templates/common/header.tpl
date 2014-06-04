<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Q&A2014</title>

    <!-- Bootstrap -->
    <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{$BASE_URL}javascript/bootstrap.min.js"></script>
    
    <script src="{$BASE_URL}javascript/notifications/notifications.js"></script>
    {literal}
    <style>
      span.username{color:#0000FF;}

      span.username:hover {opacity: 0.3;}
    </style>
    {/literal}

  </head>
  <body>
    <div class="navbar navbar-static-top navbar-inverse">

      <div class="container">
        <a href="{$BASE_URL}" class="navbar-brand">Q&A2014</a>
        <form class="navbar-form navbar-right" role="search" action="{$BASE_URL}pages/questions/list_all.php" method="GET">
          <input name="search" type="text" class="form-control" placeholder="Search">
          <button id="search_questions" type="submit" class="btn btn-default form-control">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </form>
          {if $USERNAME}

          <ul class="nav navbar-nav navbar-left">
            <li > 

              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&#9776;</b><span id="notification-counter"class="badge alert-success nav nabar-nav" style="margin-left:10px">{count($notifications)}</span>
                  <button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    Dropdown
                    <span class="caret"></span>
                  </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="height:auto; max-height:300px; overflow-x:hidden;">
                  {foreach $notifications as $notification}
                    <li role="presentation">
                      <a id="{$notification.idNotification}"role="menuitem" tabindex="-1" href="{$BASE_URL}pages/questions/show_question.php?id={$notification.link}" target="_blank" class="notification">
                        {if $notification.type == 'COMMENT'}
                          <small>{$notification.notificationDate|date_format:"M d 'Y H:i"}</small><br>
                          <span onclick="document.location.href = '{$BASE_URL}pages/users/show_user.php?username={$notification.username}'; return false" class="username">{$notification.username}</span> commented your content<br>
                          <medium>"{substr($notification.content, 0, 100)}"</medium>
                        {elseif $notification.type == 'VOTE'}
                          <small>{$notification.notificationDate|date_format:"M d 'Y H:i"}</small><br>
                          Your content was voted<br>
                          {substr($notification.content, 0, 100)}
                        {elseif $notification.type == 'ANSWER'}
                          <small>{$notification.notificationDate|date_format:"M d 'Y H:i"}</small><br>
                          <span onclick="document.location.href = '{$BASE_URL}pages/users/show_user.php?username={$notification.username}'; return false" class="username">{$notification.username}</span> answered your question<br>
                          {substr($notification.content, 0, 100)}
                        {elseif $notification.type == 'ACCEPT'}
                          <small>{$notification.notificationDate|date_format:"M d 'Y H:i"}</small><br>
                          Your answer was accepted<br>
                          {substr($notification.content, 0, 100)}
                        {/if}
                      </a></li>
                  {/foreach}
                </ul>
              </a>
            </li>
          </ul>
          {/if}
          <ul class="nav navbar-nav navbar-right">
            {if $USERNAME}
            <li><a href="{$BASE_URL}pages/users/show_user.php?username={$USERNAME}">{$USERNAME} | {$REPUTATION}</a></li>
            {if $PERMISSION == 'A'}
            <li><a href="{$BASE_URL}pages/flags/list_all.php">Flags</a></li>
            {/if}
            <li><a href="{$BASE_URL}actions/users/logout.php">Log out</a></li>
            {else}
            <li><a href="{$BASE_URL}pages/users/register.php">Register</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Log in <b class="caret"></b></a>  
              <div class="dropdown-menu" style="padding: 15px; width:200px">
                <form class="form" action="{$BASE_URL}actions/users/login.php" method="post">
                  <input name="login" id="login" type="text" placeholder="Username" size="30" style="margin-bottom: 15px;" class="form-control"> 
                  <input name="password" id="password" type="password" placeholder="Password" size="30" style="margin-bottom: 15px;" class="form-control"><br>
                  <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px" type="submit" name="commit" value="Sign In" />
                </form>
                <br>
                <div style="text-align:center">
                  <a href="{$BASE_URL}pages/users/recover_password.php">Recover Password</a>
                </div>
              </div>
            </li>
            {/if}
          </ul>


            
        </div>
      </div>

      {foreach $ERROR_MESSAGES as $error}
        <div class="alert alert-danger alert-dismissable" style="width:70%; margin-left:auto; margin-right:auto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {$error}
        </div>
      {/foreach}

      {foreach $SUCCESS_MESSAGES as $success}
        <div class="alert alert-success" style="width:70%; margin-left:auto; margin-right:auto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {$success}
        </div>
      {/foreach}
    </div>
