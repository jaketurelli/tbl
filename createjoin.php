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
			<a class="navbar-brand navbar-brand-centered" href="index.php">The Bach League</a>
			<ul class="nav pull-right" style="text-align:right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li><a class="logout" href="logout.php">Logout</a></li>
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
	<section>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-xs-6 col-md-4">
						<h3>Create a new league</h3>
						<form action="createleague.php" method="post">
							<fieldset>
								<label>Enter a name for your league:</label>
								<input type="text" class="form-control" name="leaguename" autocomplete="off" value="" />
								<label>Create a password for your league that users will enter to join:</label>
								<input type="password" class="form-control" name="leaguepassword" autocomplete="off" value="" />
								<div class="text-center">
									<input type="submit" class="btn" name="createleague" value="CREATE">
								</div>
							</fieldset>
						</form>
					</div>
					<div class="col-xs-6 col-md-4">
						<h3>Join a league</h3>
						<form action="joinleague.php" method="post">
							<fieldset>
								<label>League name:</label>
								<input type="text" class="form-control" name="leaguename" autocomplete="off" value="" />
								<label>League's password:</label>
								<input type="password" class="form-control" name="leaguepassword" autocomplete="off" value="" />
								<div class="text-center">
									<input type="submit" class="btn" name="joinleague" value="JOIN">
								</div>
							</fieldset>
						</form>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div><!-- end of container -->
		</div><!-- end of container-fluid -->
	</section>
	<?php
	include('footer.html');
	?>
</body>
</html>