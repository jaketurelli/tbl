<?php
include('get_SESSION.php');
$_SESSION['CURRENT_PAGE'] = 'disclaimer.php';
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
					<h3>Disclaimer</h3>
					<p>The Bach League provides the www.thebachleague.com website as a service to the public and website owners. The Bach League is not responsible for, and expressly disclaims all liability for, damages of any kind arising out of use, reference to, or reliance on any information contained within the site.<br><br>Although The Bach League website may include links providing direct access to other Internet resources, including websites, The Bach League is not responsible for the accuracy or content of information contained in these sites.<br><br>Links from The Bach League to third-party sites do not constitute an endorsement by The Bach League of the parties or their products and services. The appearance on the website of advertisements and product or service information does not constitute an endorsement by The Bach League, and The Bach League has not investigated the claims made by any advertiser.</p>
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