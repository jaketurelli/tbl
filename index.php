<?php
include('get_SESSION.php');
?>

<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
<script type="text/javascript" src="overlay.js"></script>
</head>
<body>
	<div id="home">
		<div class="jumbotron">
			<nav class="navbar" role="navigation">
				<div class="navbar-header">	
					<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="navbar-brand navbar-brand-centered" href="index.php"><img src="img/logowhite.png" alt="logo" /></a>
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
				<div class="navbar-collapse overlay navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="league.php">League</a></li>
						<li><a href="lineup.php">Lineup</a></li>
						<li><a href="trashtalk.php">Trash Talk</a></li>
						<li><a href="contestants.php">Contestants</a></li>
						<li><a href="blog.php">Blog</a></li>
						
						<?php
						/*
						// test facebook login stuff:
						if($IS_SIGNED_IN){
							$fb_id = $_SESSION['fb_id'];
						?>
							<li><a href="admin.php"><?php echo $fb_id ?></a></li>
						<?php
						}*/
						if($IS_ADMIN){
						?>
							<li><a href="admin.php">Admin</a></li>
						<?php
						}
						?>
					</ul>
					<ul class="nav navbar-nav pull-right" style="text-align:right">
					<?php 
					if($IS_SIGNED_IN){
					?>
						<li><a class="greeting">Hi <?php echo $ALIAS . '!'?></a></li>
						<li><a class="logout" href="logout.php">Logout</a></li>
					<?php
					}else{
					?>
						<li style="border-right: 1px solid rgba(255,255,255,0.5)"><a class="signup"data-toggle="modal" data-target="#signupmodal" href="#">Sign up</a></li>
						<li><a class="login" data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
					<?php
					}
					?>
					</ul>
				</div>
			</nav>
<!-- TEMP for $_SESSION testing 
			<?php
			if($IS_ADMIN){
			?>
			<div style="color:#FFFFFF">
				<table >
					<thead>

						<tr>
							<th>USER_ID______</th>
							<th>USERNAME______</th>
							<th>ALIAS______</th>
							<th>LEAGUE_ID______</th>
							<th>LEAGUE_NAME______</th>
							<th>COMMISSIONER______</th>
							<th>COMMISH_ID______</th>
							<th>CURRENT_CEREMONY______</th>
							<th>IS_SIGNED_IN______</th>
							<th>IS_ADMIN______</th>
						</tr>
						<tr>
							<th><?php echo $USER_ID; ?></th>
							<th><?php echo $USERNAME; ?></th>
							<th><?php echo $ALIAS; ?></th>
							<th><?php echo $LEAGUE_ID; ?></th>
							<th><?php echo $LEAGUE_NAME; ?></th>
							<th><?php echo $COMMISSIONER; ?></th>
							<th><?php echo $COMMISH_ID; ?></th>
							<th><?php echo $CURRENT_CEREMONY; ?></th>
							<th><?php echo $IS_SIGNED_IN; ?></th>
							<th><?php echo $IS_ADMIN; ?></th>
						</tr>
					</thead>
				</table>
			</div>	
			<?php
			}
			?>
 TEMP for $_SESSION testing -->
			<div class="hero-unit-inner">
				<div class="container">
					<div class="row">
						<!-- <div class="col-md-3"></div> -->
						<div class="col-md-12 text-center">
							<img src="img/tblheadline2.png"  style="width: 75%;" alt="headline" />
						</div>
						<!-- <div class="col-md-3"></div> -->
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 text-center">
							<h3 id="hero-text" class="white">Play along as Nick Viall searches for love...again.</h3>
						</div>
						
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4 text-center">
							<?php if(!$IS_SIGNED_IN){ ?>
							<button type="button" class="btn-white" data-toggle="modal" data-target="#signupmodal">SIGN UP</button>
					
							<?php 
							}elseif($LEAGUE_ID == -1){
							?>
								<button type="button" class="btn-white"><a href='createjoin.php'>JOIN LEAGUE</a></button>
							<?php
							}else{
							?>
								<button type="button" class="btn-white"><a href="league.php">LEAGUE HOME</a></button>
							<?php
							}
							?>
						</div>
						
						<div class="col-md-4"></div>
					
					</div>
				</div>
			</div><!-- hero-unit-inner -->
		</div><!-- hero-unit -->
		<div id="howitworks">
			<div class="container">
				<div class="row text-center">
					<h2 class="section-title">How it works</h2>
				</div>
				<div id="steps" class="row">
					<div class="col-md-3 inner-block center-div text-center">
						<img class="img-responsive" src="img/group-sm.png" alt="group" />
						<p>Join a league with your friends</p>
					</div>
					<div class="col-md-3 inner-block center-div text-center">
						<img class="img-responsive" src="img/roses-sm.png" alt="roses" />
						<p>Before each episode, pick who you think will get a rose</p>
					</div>
					<div class="col-md-3 inner-block center-div text-center">
						<img class="img-responsive" src="img/trashtalk-sm.png" alt="trash" />
						<p>Use the built-in chat to trash talk your leaguemates</p>
					</div>
					<div class="col-md-3 inner-block center-div text-center">
						<img class="img-responsive" src="img/victory-sm.png" alt="trophy" />
						<p>At the end of the season, see who stands victorious</p>
					</div>
				</div>
			</div>
		</div><!-- end of how it works -->
		<hr class="style-eight" width="50%">
		<div id="contestants">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2 class="section-title">Get to know this season's contestants</h2>
						<p>This season's bachelor, Nick Viall, has 25 eligible women to choose from. See what these ladies are all about.</p>
						<a href="contestants.php"><button type="button" class="btn btn-pink">SEE CONTESTANTS</button></a>
					</div>
					<div class="col-md-6">
						<img class="img-responsive" src="img/nickwcontestants.jpg" alt="bachelorettecontestants" />
					</div>
				</div>
			</div>
		</div><!-- end of contestants -->
		<hr class="style-eight" width="50%">
		<div id="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img class="img-responsive" src="img/BlogFeature.png" alt="blog" />
					</div>
					<div class="col-md-6">
						<h2 class="section-title">Your witty commentary could be featured on The Bach League Blog</h2>
						<p>Do your friends like watching The Bachelor with you because you give great commentary and make awesome jokes? Write up your commentary for The Bach League Blog.</p>
						<a href="blog.php"><button type="button" class="btn btn-pink">SEE OUR BLOG</button></a>
					</div>
				</div>
			</div>
		</div><!-- end of blog -->
		<hr class="style-eight" width="50%">
		<div id="app">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2 class="section-title">Mobile app is coming soon!</h2>
						<p>Our site can be viewed on any device and will resize depending on what device you're using, but a downloadable app is expected to come in 2017. Stay tuned!</p>
					</div>
					<div class="col-md-6">
						<img class="img-responsive" src="img/AppComing.png" alt="app" />
					</div>
				</div>
			</div>
		</div><!-- end of app -->
		<hr class="style-eight" width="50%">
		<div id="bottom-home-cta">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 text-center">
					<h2>Start playing The Bach League!</h2>
					<button type="button" class="btn btn-pink bottom-home-cta-button" data-toggle="modal" data-target="#signupmodal">SIGN UP</button>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div><!-- home -->
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
</body>
</html>