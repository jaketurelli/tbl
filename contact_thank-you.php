<?php
include('header_content.html');
?>
<html>
	<body>
		<nav class="navbar nonhome">
			<div class="navbar-header">
				<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" href="#">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="navbar-brand navbar-brand-centered" href="index.php">The Bach League</a>
				<ul class="nav pull-right" style="text-align:right">
					<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">login</a></li>
				</ul>
			</div>
			<div class=" navbar-collapse collapse">
				<ul class="nav navbar-nav nav-pills">
					<li><a href="index.php">home</a></li>
					<li><a href="league.php">league</a></li>
					<li><a href="lineup.php">lineup</a></li>
					<li><a href="trashtalk.php">trash talk</a></li>
					<li><a href="contestants.php">contestants</a></li>
					<li><a href="blog.php">blog</a></li>
					<li><a href="contact-us.php">test contact</a></li>
					<li class="active"><a href="admin.php">admin</a></li>
				</ul>
			</div>
		</nav>
		<p>Thank you, your email has been sent!</p>
	</body>
</html>