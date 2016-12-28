<?php
include('get_SESSION.php');
$_SESSION['CURRENT_PAGE'] = 'blog.php';
?>

<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
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
	$nav_page_id = 7;
	include('navbar_content.php');
	?>
	<!-- NAVIGATION PANE END -->

	<div class="container-fluid" ><!-- removed id="blog-bg" class="container-fluid" -->
		<div class="container"><!-- removed id="blog-content" -->
			<div class="row">
				<div class="blog-header">
					<h4 class="blog-title">THE BACH LEAGUE BLOG</h4>
					<h5 class="blog-description">The drama broken down. There may be spoilers.</h5>
					<hr>
				</div>
			</div>
			<div class="row">
				<p>Stay tuned for the first post after the season premiere on January 2nd, 2017!</p>
				<!--<div class="col-md-12">
					<div class="blog-preview">
								<div class="row">
									<div class="col-sm-12">
										<h2 class="post-title">The guys go to Argentina</h2>
										<h5>6/28/2016 by KLM</h5>
									</div>
								</div>
						
							<div class="row">
								<div class="col-sm-6">
									<p>A recap of the episode in Argentina. Wells gets the first one-on-one in Argentina. It's also HIS first one-on-one. The ENTIRE one-on-one commentary focuses on how Wells hasn't kissed Jojo yet. It all feels juvenile with the other guys teasing him about breath mints and epic kissing. The man wanted their first kiss to be extra special. Ain't nothing wrong with that. In fact, America probably fell in love with him a little more. But fast forward past their first kiss and a sweaty dinner date...</p>
									<a href="adios-wells.php"><button type="button" class="btn btn-pink">Go to Full Article</button></a>
								</div>
								<div class="col-sm-6">
									<img class="img-responsive img-smaller" src="img/jojotango.jpg" />
								</div>
							</div>
					</div>
					<div class="blog-preview">
								<div class="row">
									<div class="col-sm-12">
										<h2 class="post-title">The group goes to Uruguay and Alex gets annoying</h2>
										<h5>6/14/2016 by KLM</h5>
									</div>
								</div>
							<div class="row">
								<div class="col-sm-6">
									<p>A recap of the episode where the mini-Chads emerge. The episode opens with James T. playing guitar while the boys spread his "protein ashes" interspliced with shots of Chad walking in the dark and whistling like a creepy weirdo. We all fall in love with Wells a little more for his light-hearted, witty speech during the protein ashes scene. Cue Daniel welcoming Chad back in the house with a casual "how was your date" with his big bowl of cereal. Chad then gets into another argument...</p> 
									<a href="uruguay-robby-jordan.php"><button type="button" class="btn btn-pink">Go to Full Article</button></a>
								</div>
								<div class="col-sm-6">
									<img class="img-responsive" src="img/sandboarding.jpg" />
								</div>
							</div>
					</div>
					<div class="blog-preview">
						<div class="row">
							<div class="col-sm-12">
								<h2 class="post-title">Chad goes home</h2>
								<h5>6/10/2016 by KLM</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<p>A recap of the two episodes that aired June 6th and June 7th. Jojo's first one-on-one date was with Chase to do some yoga. I missed it because we were eating In n Out. Next is the group date where Chad seems to be unaware that you go on group dates in this show. "Honestly I don't want to go. I'd rather you guys go and do your thing, and I'll have a one on one later. [...] Twelve guys is too many." The task at hand was to entertain an audience at a comedy club by sharing their personal sexual experiences...</p>
								<a href="chad-goes-home.php"><button type="button" class="btn btn-pink">Go to Full Article</button></a>
							</div>
							<div class="col-sm-6">
								<img class="img-responsive" src="img/chadpotato.gif" />
							</div>
						</div>
					</div>
				</div>-->
			</div>
		</div>
	</div>
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
</body>
</html>