<?php
	include('get_SESSION.php');
?>

<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
</head>
<body>
	<nav class="navbar nonhome nav-border-bottom">
	 	<!-- <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
  			<div class="collapse navbar-toggleable-md" id="navbarResponsive">
    			<a class="navbar-brand" href="#">Navbar</a>
    			<ul class="nav navbar-nav">
      				<li class="nav-item active">
        				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="#">Link</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="#">Link</a>
      				</li>
      				<li class="nav-item dropdown">
        				<a class="nav-link dropdown-toggle" href="http://example.com" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        				<div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
          					<a class="dropdown-item" href="#">Action</a>
          					<a class="dropdown-item" href="#">Another action</a>
          					<a class="dropdown-item" href="#">Something else here</a>
        				</div>
      				</li>
    			</ul>
    			<form class="form-inline float-lg-right">
      				<input class="form-control" type="text" placeholder="Search">
  					<button class="btn btn-outline-success" type="submit">Search</button>
    			</form>
  			</div> -->
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="navbar-brand navbar-brand-centered" href="index.php"><img src="img/logo.png" alt="brand-image" /></a>
			<ul class="nav pull-right" style="text-align:right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li style="display:none" class="loginnav"><a class="logout" href="logout.php">Logout</a></li>
				<?php
				}else{
				?>
					<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class=" navbar-collapse overlay navbar-right">
			<ul class="nav navbar-nav nav-pills">
				<li><a href="league.php">LEAGUE</a></li>
				<?php
				if($COMMISSIONER){
				?>
					<li class="active"><a href="commissioner.php">COMMISSIONER TOOLS</a></li>
				<?php
				}
				?>
				<li><a href="lineup.php">LINEUP</a></li>
				<li><a href="trashtalk.php">TRASH TALK</a></li>
				<li><a href="contestants.php">CONTESTANTS</a></li>
				<li><a href="blog.php">BLOG</a></li>
				<?php
				if($IS_ADMIN){
				?>
					<li><a href="admin.php">Admin</a></li>
				<?php
				}
				?>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li><a class="logout" href="logout.php">Logout</a></li>
				<?php
				}else{
				?>
					<li style="border-right: 1px solid rgba(255,255,255,0.5); text-align: right"><a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#">Sign up</a></li>
					<li style="text-align:right!important"><a class="login" data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</nav>
	<?php 
	if($IS_SIGNED_IN){
	?>
		<?php
		if($IS_MOBILE)
		{
		?>
			<div class="container-fluid">
				<div class="row">
					
				</div>
			<!--</div> end of container -->
		</div><!-- end of container fluid -->

		<?php
		}else{
		?>
		<div class="container-fluid">
			<div class="row">
				<h3>League Commissioner Tools</h3>
				<div id="accordion" role="tablist" aria-multiselectable="true">
				  	<div class="panel">
				    	<div class="card-header" role="tab" id="headingOne">
				      		<h5 class="mb-0">
				        	<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          	Email league members
				        	</a>
				      		</h5>
				    	</div>

					    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
					      	<div class="card-block">
					        	<div class="modal-body">
									<form method="post" action="email-league.php">
										<label style="display:none;">To</label>
										<input id="email-group" name="email-group" style="display:none;">
										<label>Email Subject</label><br>
										<input id="email" name="email" type="email"><br>
										<label>Message</label><br>
										<textarea id="message" rows="4" class="message" name="message" type="text"></textarea>
										<!-- <label><input type="checkbox"> Send me a copy of the email</input></label> -->
										<div class="modal-footer">
											<input id="submit-email-league" class="btn pull-right text-center" name="submit" type="submit" value="SUBMIT">
										</div>
									</form>
								</div>
					      	</div>
					    </div>
				  	</div>
				  	<div class="card">
				    	<div class="card-header" role="tab" id="headingTwo">
				      		<h5 class="mb-0">
			        		<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				         	Add league members
				        	</a>
				      		</h5>
				    	</div>
					    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
					      	<div class="card-block">
					        	<form method="post" action="contact-us-send.php">
									<label>List of current league members:</label>
									<br>
									<label><input type="checkbox"> Name of league member</input></label><!-- JAKE list each league member -->
									<div class="modal-footer">
										<p>By clicking Submit, you will remove the user from the league and all of their saved ceremonies.</p>
										<a href="#" ><button>SUBMIT</button></a>
										<input class="btn pull-right text-center" value="CANCEL"></input>
									
									</div>
								</form>
					      	</div>
					    </div>
				  	</div>
				  	<div class="card">
				    	<div class="card-header" role="tab" id="headingThree">
				      		<h5 class="mb-0">
				        	<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          	Remove league members
				        	</a>
				      		</h5>
				    	</div>
					    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
					      	<div class="card-block">
					        	<form method="post" action="contact-us-send.php">
									<label>List of current league members:</label>
									<br>
									<label><input type="checkbox"> Name of league member</input></label><!-- JAKE list each league member -->
									<div class="modal-footer">
										<p>By clicking Submit, you will remove the user from the league and all of their saved ceremonies.</p>
										<a href="#" ><button>SUBMIT</button></a>
										<input class="btn pull-right text-center" value="CANCEL"></input>
									</div>
								</form>
					      	</div>
					    </div>
				  	</div>
				  	<div class="card">
				    	<div class="card-header" role="tab" id="headingFour">
				      		<h5 class="mb-0">
				        	<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				          	Adjust scoring
				        	</a>
				      		</h5>
				    	</div>
					    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
					      	<div class="card-block">
					        	
					      	</div>
					    </div>
				  	</div>
				  	<div class="card">
				    	<div class="card-header" role="tab" id="headingFive">
				      		<h5 class="mb-0">
				        	<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
				          	Write league announcement
				        	</a>
				      		</h5>
				    	</div>
					    <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
					      	<div class="card-block">
					        	<p>Upon saving, this league announcement will replace the previous one if there is one.</p>
				        		<textarea rows="3"></textarea>
				        		<button type="button" class="btn btn-blueoutline" data-dismiss="modal">Close</button>
				        		<button type="button" class="btn">Save</button>
					      	</div>
					    </div>
				  	</div>
				</div>
				</div>
			</div>
		</div><!-- end of container fluid -->
		<?php } ?>
	<?php } ?>
	
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
	
</body>
</html>