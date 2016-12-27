<?php
include('get_SESSION.php');
$_SESSION['CURRENT_PAGE'] = 'about.php';
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
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="navbar-brand navbar-brand-centered" href="index.php"><img src="img/logo.png" alt="brand-image" /></a>
			<ul class="nav pull-right" style="text-align:right">
				<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">login</a></li>
			</ul>
		</div>
		<!-- NAVIGATION PANE START -->
		<div class="navbar-collapse overlay navbar-right">
			<ul class="nav navbar-nav">
				<?php
				if($IS_SIGNED_IN){
					if($LEAGUE_ID > 0){
						if($IS_COMMISH){
				?>
							<li><a href="commissioner.php">Commissioner Tools</a></li>
				<?php
						}
				?>
						<li><a href="league.php">League</a></li>
						<li><a href="lineup.php">Lineup</a></li>
						<li><a href="trashtalk.php">Trash Talk</a></li>
				<?php
					}else{
				?>
						<li><a href="createjoin.php">Create/Join League</a></li>
				<?php
					}
				?>
					<li><a href="contestants.php">Contestants</a></li>
					<li><a href="blog.php">Blog</a></li>
				<?php
				}else{
				?>
					<li><a href="contestants.php">Contestants</a></li>
					<li><a href="blog.php">Blog</a></li>
				<?php
				}
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
		<!-- NAVIGATION PANE END -->
	</nav>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-12">
					<h3>about the bach league</h3>
					<p>Hey y'all! Thank you for visiting our site, The Bach League! We've created this site so that friends can play a fun game around the TV shows, "The Bachelor" and "The Bachelorette". The site is currently in a beta version which means we've implemented the minimum amount of features/functionality that the site needs. We're currently working on the next version which will be the first full-featured version of the site. Stay tuned!</p>
					<h3>about the creators</h3>
					<p>Our names are Jake and Kacy. We're budding web developers/designers in beautiful Los Angeles, California. We hope you enjoy the site!</p>
				</div>
				<div class="col-md-3"></div>
		</div><!-- end of container -->
	</div><!-- end of container-fluid -->
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
</body>
</html>