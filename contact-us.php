<?php
include('get_SESSION.php');
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
					<h3>contact us</h3>
					<form method="post" action="contact-us-send.php">
						<label>name</label><br>
						<input id="name" name="name"><br>
						<label>email</label><br>
						<input id="email" name="email" type="email"><br>
						<label>message</label><br>
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