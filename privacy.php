<?php
include('get_SESSION.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The Bach League</title>
	<link rel="shortcut icon" href="favicon.ico?" type="image">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
					<h3>privacy policy</h3>
					<p>This privacy policy describes how The Bach League makes use of information collected from users of the wwww.thebachleague.com website. If you are asked to provide information when using this website, it will only be used in the ways described in this privacy policy. If you have any questions about this policy, please contact us through our <a href="contact-us.php">contact form</a>.</p>
					<!--<h4>What data we gather</h4>
					<h4>How we use this data</h4>
					<p>Collecting this data helps us appropriately display the data.
					<ul>
						<li>For our own internal records</li>
						<li>To contact you in response to a specific enquiry</li>
						<li>To customize the website for you</li>
					</ul>
					</p>
					<h4>Cookies and how we use them</h4>
					<h5>What is a cookie?</h5>
					<p>A cookie is a small file placed on your computer's hard drive. It enables our website to identify your computer as you view different pages on our website. Cookies allow websites and applications to store your preferences in order to present content, options or functions that are specific to you. They also enable us to see information like how many people use the website and what pages they tend to visit.</p>
					<h5>How we use cookies</h5>
					<p>We may use cookies to:
					<ul>
						<li>Analyze our web traffic</li>
						<li>Identify whether you are signed in to our website</li>
						<li>To recognize when you return</li>
					</ul>
					</p>
					<h5>Controlling cookies</h5>
					<h3>Controlling information about you</h3>
					<h3>Security</h3>
					<h3>Links from our site</h3>-->
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