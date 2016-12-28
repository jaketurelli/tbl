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
					<h3>About The Bach League</h3>
					<p>Hey y'all! Thank you for visiting our site, The Bach League! We've created this site so that friends can play a fun game around the TV shows, "The Bachelor" and "The Bachelorette". The site is currently in a beta version which means we've implemented the minimum amount of features/functionality that the site needs. We're currently working on the next version which will be the first full-featured version of the site. Stay tuned!</p>
					<h3>About the Creators</h3>
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