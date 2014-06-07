    <div id="footer" class="navbar navbar-default" style="margin-bottom:0px" role="navigation">

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand">LBAW 2013/14</div>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{$BASE_URL}pages/rules.php">Rules</a></li>  
            <li><a href="{$BASE_URL}pages/about.php">About</a></li>	
          </ul>  
        </div>
        </div>
    </div>

    <script>

      $(document).ready(function() {

       var docHeight = $(window).height();
       var footerHeight = $('#footer').height();
       var footerTop = $('#footer').position().top + footerHeight;
       
       if (footerTop < docHeight) {
        $('#footer').css('margin-top', 10+ (docHeight - footerTop - 15) + 'px');
       }
      });
     </script>


  </body>
</html>
