<?php
include('get_SESSION.php');
$_SESSION['CURRENT_PAGE'] = 'privacy.php';
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
	<!-- NAVIGATION PANE START -->
	<?php
	//  $nav_page_id index:
	//  1: commisioner.php
	//  2: league.php
	//  3: lineup.php
	//  4: trashtalk.php
	//  5: createjoin.php
	//  6: contestants.php
	//  7: blog.php
	//  8: admin.php
	$nav_page_id = -1;
	include('navbar_content.php');
	?>
	<!-- NAVIGATION PANE END -->

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-12">
					<h3>Privacy Policy</h3>
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