<?php
include('get_SESSION.php');
$_SESSION['CURRENT_PAGE'] = 'contact-us.php';
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
					<h3>Contact us</h3>
					<form method="post" action="contact-us-send.php">
						<label>Name</label><br>
						<input id="name" name="name"><br>
						<label>Email</label><br>
						<input id="email" name="email" type="email"><br>
						<label>Message</label><br>
						<textarea id="message" rows="8" class="message" name="message" type="text"></textarea>
						<input id="submit" class="btn pull-right text-center" name="submit" type="submit" value="SUBMIT">
					</form>
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
<!-- http://yogeshchaugule.com/blog/2013/configure-sendmail-wamp 
<form action = "contact-us-send.php" method = "post" >
	<ul>
		<li>
			<label for = "name">Your Name:</label>
			<input type = "text" id = "name" name = "name" />
		</li>
		<li>
			<label for = "email">Your Email:</label>
			<input type = "text" id = "email" name = "email" />
		</li>
		<li>
			<label for = "comment">Your Comment:</label>
			<textarea name = "comment" id - "comment"></textarea>
		</li>
		<li>
			<input type = "submit" name = "submit" value = "Click to send Your Comments" />
		</li>
	</ul>
</form> -->