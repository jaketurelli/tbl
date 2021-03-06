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
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-12">
					<p>You should receive an email with a link to reset your password shortly. Happy bach leaguing! If you do not receive an email to reset your password, feel free to <a href="contact-us.php">contact us</a>.</p>
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