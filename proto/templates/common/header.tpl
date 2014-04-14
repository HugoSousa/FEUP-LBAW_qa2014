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

  </head>
  <body>
    <div class="navbar navbar-static-top navbar-inverse">

      <div class="container">
        <a href="#" class="navbar-brand">Q&A2014</a>
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
          {if $USERNAME}
          <ul class="nav navbar-nav navbar-left">
            <li >
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&#9776;</b>
                  <button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    Dropdown
                    <span class="caret"></span>
                  </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">First Notification</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another notification</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another one</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Last Notification</a></li>
                </ul>
              </a>
            </li>
          </ul>
          {/if}
          <ul class="nav navbar-nav navbar-right">
            {if $USERNAME}
            <li><a href="#">{$USERNAME} | {$REPUTATION}</a></li>
            {if $USERTYPE == 'A'}
            <li><a href="#">Flags</a></li>
            {/if}
            <li><a href="{$BASE_URL}actions/users/logout.php">Log out</a></li>
            {else}
            <li><a href="#">Register</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Log in <b class="caret"></b></a>  
              <div class="dropdown-menu" style="padding: 15px; width:200px">
                <form class="form" action="{$BASE_URL}actions/users/login.php" method="post">
                  <input name="username" id="username" type="text" placeholder="Username" size="30" style="margin-bottom: 15px;" class="form-control"> 
                  <input name="password" id="password" type="password" placeholder="Password" size="30" style="margin-bottom: 15px;" class="form-control"><br>
                  <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px" type="submit" name="commit" value="Sign In" />
                </form>
              </div>
            </li>
            {/if}
          </ul>
            
        </div>
      </div>
    </div>