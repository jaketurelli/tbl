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
		<!-- <ul class="nav nav-tabs">
   <li><a href="#a" data-toggle="tab">a</a></li>
   <li><a href="#b" data-toggle="tab">b</a></li>
   <li><a href="#c" data-toggle="tab">c</a></li>
   <li><a href="#d" data-toggle="tab">d</a></li>
</ul>

<div class="tab-content">
   <div class="tab-pane active" id="a">..a.</div>
   <div class="tab-pane" id="b">..b.</div>
   <div class="tab-pane" id="c">.c..</div>
   <div class="tab-pane" id="d">.h..</div>
</div> -->
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 col-sm-12">
					<h3>League Commissioner Tools</h3>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3 col-sm-3 tabbable sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="#a" data-toggle="tab">Email league members</a></li>
						<li><a href="#b" data-toggle="tab">Write league announcement</a></li>
						<li><a href="#c" data-toggle="tab">Adjust scoring</a></li>
						<li><a href="#d" data-toggle="tab">Remove league members</a></li>
						<li><a href="#e" data-toggle="tab">Add league members</a></li>

						<!-- <li role="presentation" class="active"><a class="item" data-target="1" href="#">Email league members</a></li>
						<li role="presentation"><a class="item" data-target="2" href="#">Write league announcement</a></li>
						<li role="presentation"><a class="item" data-target="3" href="#">Adjust scoring</a></li>
						<li role="presentation"><a class="item" data-target="4" href="#">Remove league members</a></li>
						<li role="presentation"><a class="item" data-target="5" href="#">Add league members</a></li> -->
					</ul>
				</div>
				<div id="commissioner-tab-content" class="tab-content col-md-7 col-sm-9">
					<div id="a" class="tab-pane active">
						<form method="post" action="email-league.php">
							<label style="display:none;">To</label>
							<input id="email-group" name="email-group" style="display:none;">
							<label>Email Subject</label><br>
							<input id="email" name="email" type="email"><br>
							<label>Message</label><br>
							<textarea id="message" rows="4" class="message" name="message" type="text"></textarea>
							<!-- <label><input type="checkbox"> Send me a copy of the email</input></label> -->
							<input class="btn pull-right text-center" value="SEND"></input>
							<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
						</form>
					</div>
					<div id="b" class="tab-pane">
						<form id="addannouncementform" role="form" method="post" action="commissioner_announcement.php">
							<p>Upon posting, this league announcement will replace the previous one if there is one.</p>
		        			<input type="text" id="announcement" class="form-control" name="announcement" value="">
		        			<input type = "submit" class="btn pull-right text-center" value="POST"></input>
							<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
						</form>
						<?php 
							$query = "SELECT * FROM commissioner_announcements WHERE league_id = $LEAGUE_ID ORDER BY id DESC";
							$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
							if(mysqli_num_rows($result)!=0){
								$announcement_number = 1;
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$curr_announcement =  $row['announcement'];?>
									<tr>
										<td>
											<?php echo $announcement_number . ":" . $curr_announcement;?>
										</td><br>
									</tr>
								    <?php
								    $announcement_number = $announcement_number+1;
								}
							}


							?>
					</div>
					<div id="c" class="tab-pane">
						<p>Select league member:</p>
						<p>Select ceremony number:</p>
						<p>Ceremony 1 (Week 1 Date)</p>
						<p>Number of points: 10</p>
						<p>Enter updated number of points for Ceremony #:</p>
						<input class="text"></input><br>
						<input class="btn pull-right text-center" value="SAVE"></input>
						<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
					</div>
					<div id="d" class="tab-pane">
						<form method="post" action="contact-us-send.php">
							<label>List of current league members:</label>
							<br>
							<label><input type="checkbox"> Name of league member</input></label><!-- JAKE list each league member -->
							<p>By clicking Remove, you will remove the user from the league and all of their saved ceremonies.</p>
							<input class="btn pull-right text-center" value="REMOVE"></input>
							<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>

						</form>
					</div>
					<div id="e" class="tab-pane">
						<form method="post" action="contact-us-send.php">
							<label>Enter email address of the user you'd like to invite:</label>
							<br>
							<input type="email" value=""></input>
							<p>The user will be sent an email containing information on joining your league.</p>
							<input class="btn pull-right text-center" value="INVITE"></input>
							<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
						</form>
					</div>


					<!-- <div id="div1" class="targetDiv">
						<form method="post" action="email-league.php">
							<label style="display:none;">To</label>
							<input id="email-group" name="email-group" style="display:none;">
							<label>Email Subject</label><br>
							<input id="email" name="email" type="email"><br>
							<label>Message</label><br>
							<textarea id="message" rows="4" class="message" name="message" type="text"></textarea>
							<label><input type="checkbox"> Send me a copy of the email</input></label>
							<div class="modal-footer">
								<input id="submit-email-league" class="btn pull-right text-center" name="submit" type="submit" value="SUBMIT">
							</div>
						</form>
					</div>
					<div id="div2" class="targetDiv">
						<p>Upon saving, this league announcement will replace the previous one if there is one.</p>
		        		<textarea rows="3"></textarea>
		        		<button type="button" class="btn btn-blueoutline" data-dismiss="modal">Close</button>
		        		<button type="button" class="btn">Save</button>
					</div>
					<div id="div3" class="targetDiv">
						
					</div>
					<div id="div4" class="targetDiv">
						<form method="post" action="contact-us-send.php">
							<label>List of current league members:</label>
							<br>
							<label><input type="checkbox"> Name of league member</input></label><!-- JAKE list each league member
							<div class="modal-footer">
								<p>By clicking Submit, you will remove the user from the league and all of their saved ceremonies.</p>
								<a href="#" ><button>SUBMIT</button></a>
								<input class="btn pull-right text-center" value="CANCEL"></input>
							
							</div>
						</form>
					</div>
					<div id="div5" class="targetDiv">
						<form method="post" action="contact-us-send.php">
							<label>Enter email address of the user you'd like to invite:</label>
							<br>
							<input type="email">Email address</input>
							<div class="modal-footer">
								<p>The user will be sent an email containing information on joining your league.</p>
								<a href="#" ><button>SUBMIT</button></a>
								<input class="btn pull-right text-center" value="CANCEL"></input>
							</div>
						</form>
					</div> -->
				</div>
				<div class="col-md-1"></div>
				</div>
			</div>
		</div><!-- end of container fluid -->
		<?php } ?>
	<?php } ?>
	
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
	
	<script type="text/javascript">
		
	</script>
</body>
</html>