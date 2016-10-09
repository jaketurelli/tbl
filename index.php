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
		<div class="hero-unit">
			<nav class="navbar" role="navigation">
				<div class="navbar-header">	
					<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="navbar-brand navbar-brand-centered" href="index.php"><img src="img/logowhite.png" alt="white-logo" /></a>
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
					<div class="row text-center">
						<div class="col-md-3">
						</div>
						<div class="col-md-6">
							<h4 id="hero-text" class="white">What brings friends together, creates healthy competition, and strengthens a relationship all while watching The Bachelor?</h4>
						</div>
						<div class="col-md-3">
						</div>
					</div>
					<div class="row text-center">
						<img class="img-responsive" src="img/logolargenoimgwhite.png" />
					</div>
					<div class="row text-center">
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
						<img class="img-responsive" src="img/group-sm.svg" alt="group" />
						<p>Join a league with your friends</p>
					</div>
					<div class="col-md-3 inner-block center-div text-center">
						<img class="img-responsive" src="img/roses-sm.svg" alt="roses" />
						<p>Before each episode, pick who you think will get a rose</p>
					</div>
					<div class="col-md-3 inner-block center-div text-center">
						<img class="img-responsive" src="img/trashtalk-sm.svg" alt="trash" />
						<p>Use the built-in chat to trash talk your leaguemates</p>
					</div>
					<div class="col-md-3 inner-block center-div text-center">
						<img class="img-responsive" src="img/victory-sm.svg" alt="trophy" />
						<p>At the end of the season, see who stands victorious</p>
					</div>
				</div>
			</div>
		</div><!-- end of how it works -->
		<div id="contestants">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2 class="section-title">Get to know this season's contestants</h2>
						<p>This season's bachelorette, Jojo Fletcher, has 25 eligible bachelors to choose from. See what these dudes are all about.</p>
						<a href="contestants.php"><button type="button" class="btn btn-pink">SEE CONTESTANTS</button></a>
					</div>
					<div class="col-md-6">
						<img class="img-responsive" src="img/contestants-sm.png" alt="bachelorettecontestants" />
					</div>
				</div>
			</div>
		</div><!-- end of contestants -->
		<div id="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img class="img-responsive" src="img/BlogFeature.svg" alt="blog" />
					</div>
					<div class="col-md-6">
						<h2 class="section-title">Your witty commentary could be featured on The Bach League Blog</h2>
						<p>Do your friends like watching The Bachelor with you because you give great commentary and make awesome jokes? Write up your commentary for The Bach League Blog.</p>
						<a href="blog.php"><button type="button" class="btn btn-pink">SEE OUR BLOG</button></a>
					</div>
				</div>
			</div>
		</div><!-- end of blog -->
		<div id="app">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2 class="section-title">Mobile app is coming soon!</h2>
						<p>Our site can be viewed on any device and will resize depending on what device you're using, but a downloadable app is expected to come in 2017. Stay tuned!</p>
					</div>
					<div class="col-md-6">
						<img class="img-responsive" src="img/AppComing.svg" alt="app" />
					</div>
				</div>
			</div>
		</div><!-- end of app -->
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