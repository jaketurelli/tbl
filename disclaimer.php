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