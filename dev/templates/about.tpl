{include file='common/header.tpl'}

{include file='common/topbar.tpl'}

<div class="page-body" style="width:50%; margin-left:auto; margin-right:auto;" >
  
	<div class="jumbotron">
        	<h1 style="font-size:500%">About Us</h1>
		<br>
		<div id="about-us" style="text-align: justify;">
		<p class = "lead" style="font-size:125%"> 
			Q&A2014 is a project developed for the 2013/2014 instance of the course Database and Web Applications Laboratory from FEUP.

		</p>
		<p id="second-paragraph" style="font-size:125%">
			We are aiming for colaborative and interactive space, where you can share your solve your questions and help others with your insights.
		</p>
	</div>
	<div id="signup-button" style= "text-align:center">
        	<p><a class="btn btn-lg btn-success" href="{$BASE_URL}pages/users/register.php" role="button">Join the community!</a></p>
	</div>
	</div>
	<div class="team" style="font-size:125%" >
		<p> We are: </p>
		<ul style="list-style-type: none;">
			<li> Hugo Sousa </li>
			<li> Jo&atilde;o Castro </li>
			<li> Ricardo Silva </li>
		</ul>
		<br><br><br>
	
      </div>

</div>

{include file='common/footer.tpl'}
