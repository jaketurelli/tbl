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
	<nav class="navbar nonhome">
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="navbar-brand navbar-brand-centered" href="index.php">The Bach League</a>
			<ul class="nav pull-right" style="text-align:right">
				<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">login</a></li>
			</ul>
		</div>
		<div class=" navbar-collapse overlay">
			<ul class="nav navbar-nav nav-pills">
				<li><a href="index.php">home</a></li>
				<li><a href="league.php">league</a></li>
				<li><a href="lineup.php">lineup</a></li>
				<li><a href="trashtalk.php">trash talk</a></li>
				<li><a href="contestants.php">contestants</a></li>
				<li><a href="blog.php">blog</a></li>
				<?php
				if($IS_ADMIN){
				?>
					<li><a href="admin.php">admin</a></li>
				<?php
				}
				?>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li><a class="logout" href="logout.php">logout</a></li>
				<?php
				}else{
				?>
					<li style="border-right: 1px solid rgba(255,255,255,0.5); text-align: right"><a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#">sign up</a></li>
					<li style="text-align:right!important"><a class="login" data-toggle="modal" data-target="#loginmodal" href="#">login</a></li>
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
					<h3>disclaimer</h3>
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