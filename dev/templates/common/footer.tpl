    <div id="footer"class="navbar navbar-default" style="margin-bottom:0">

      <div class="container">
          <ul class="nav navbar-nav">
            <li><p class="navbar-text navbar-right">LBAW 2013/14 </p></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Rules</a></li>  <!-- link para pagina estatica de rules -->
            <li><a href="#">About</a></li>	<!-- link para pagina estatica de about -->
          </ul>
            
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
