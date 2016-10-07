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
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
 		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<nav class="navbar nonhome">
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="navbar-brand navbar-brand-centered" href="index.php">The Bach League</a>
			<ul class="nav pull-right" style="text-align:right">
				<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
			</ul>
		</div>
		<div class=" navbar-collapse overlay">
			<ul class="nav navbar-nav nav-pills">
				<li><a href="index.php">Home</a></li>
				<li><a href="league.php">League</a></li>
				<li><a href="lineup.php">Lineup</a></li>
				<li><a href="trashtalk.php">Trash Talk</a></li>
				<li><a href="contestants.php">Contestants</a></li>
				<li class="active"><a href="blog.php">Blog</a></li>
				<?php
				if($IS_ADMIN){
				?>
					<li><a href="admin.php">Admin</a></li>
				<?php
				}
				?>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li><a class="logout" href="logout.php">Logout</a></li>
				<?php
				}else{
				?>
					<li style="border-right: 1px solid rgba(255,255,255,0.5); text-align: right"><a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#">Sign up</a></li>
					<li style="text-align:right!important"><a class="login" data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</nav>	
	<?php
	if($IS_MOBILE)
	{
	?>
	<div id="blog-content">
		<!--<div class="row">-->
			<div class="text-center">
				<a href="blog.php"><h4 class="blog-title">The Bach League Blog</h4></a>
			</div>
		<!--</div>-->
			<div class="blog-nav">
				<p class="alignleft"><a href="chad-goes-home.php"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="light-grey"> Chad Goes Home </span></a></p>
				<p class="alignright"><a href="adios-wells.php"><span class="light-grey">Adios Wells</span> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></span></p>
			</div>

		<div class="blog-post-title-bg">
			<h3 class="blog-post-title">The group goes to Uruguay and Alex gets annoying</h3>
		</div>
		<div id="blog-bg" class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 content">
						<div class="blog-main">
	<?php
	}else{
	?>
	<div id="blog-bg" class="container-fluid">
		<div class="container">
			<div class="row">
				<div id="blog-content" class="col-md-9 col-sm-12">
					<div class="row">
						<div class="col-sm-4 text-left">
							<p class="blog-nav"><a href="chad-goes-home.php"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="light-grey"> Chad Goes Home </span></a></p>
						</div>
						<div class="col-sm-4">
							<div class="text-center">
								<a href="blog.php"><h4 class="blog-title">The Bach League Blog</h4></a>
							</div>
						</div>
						<div class="col-sm-4 text-right">
							<p class="blog-nav"><a href="adios-wells.php"><span class="light-grey">Adios Wells</span> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 content">
							<div class="blog-main">
								<div class="blog-post-title-bg">
									<h3 class="blog-post-title">The group goes to Uruguay and Alex gets annoying</h3>
								</div>
								<?php } ?>
							<!--<div class="panel panel-default">-->
								<div class="blog-post">	
									<p class="blog-post-meta">June 14, 2016 by KLM</p>
									<p>A recap of the episode where the mini-Chads emerge.</p>
									<hr>
									<p>The episode opens with James T. playing guitar while the boys spread his "protein ashes" interspliced with shots of Chad walking in the dark and whistling like a creepy weirdo. We all fall in love with Wells a little more for his light-hearted, witty speech during the protein ashes scene.<br><br>
									Cue Daniel welcoming Chad back in the house with a casual "how was your date" with his big bowl of cereal. Chad then gets into another argument with the guys about how he says what he wants to say and how he was backed into a corner and had to do what he "had to do". We see the two James' just watching in the background while Evan and Jordan go at Chad. Daniel's still casually eating his cereal. Robby attempts to keep the peace.<br><br>
									Then the guys have a pretty awesome celebration for Alex in honor of him getting rid of Chad. Like a bunch of little boys, they chant "Slayer of the dragon!" over and over.<br><br>
									Next is a really weird rose ceremony. Too much kissing and Jojo-stealing. But we start with a super cute moment with "Chaser" (what Jojo calls Chase) where they play with giant Knocker Balls (I had to turn on closed captioning to figure out what those things were). Then Robby gets some time and finishes it with a "Jojo, thank you for your time". It reminded me of the end of an interview or telemarketer call.<br><br>
									James F. writes a friggin' poem for Jojo. And it LOOKS like Jojo wipes a tear from her eye. How could he not get a rose, right. Then Alex interrupts him even though he has a rose. I've only been watching this show for a few years, but I know it's a no-no to swoop in when you already have a rose. Daniel said it best when Luke is lurking on his time with Jojo.</p>
									<blockquote>"Mr. Rose over there... They've had their one-on-one time. They say they're great guys [...] and you're pouncing in on my time, you know?"</blockquote>
									<p>Yeah, what's that about, Luke?! EH??<br><br>
									So what's with all the catty behavior? "There was a wonderful thing about Chad. We had a common enemy." Wells, you so smart. But seriously, without Chad, the guys are getting cocky and focusing on other things they didn't notice before. In my opinion, James T., Wells, and Evan have remained true to themselves. Even though I don't much like Evan, he's at least stayed consistent. Anyway, then Chad-I mean Luke, goes for seconds, and Jordan so tastefully makes out with Jojo 10 feet away from everyone else. Come on, Jordan. At least Robby did it under the stars by a gorgeous fountain. You do the whole push-her-against-a-wall bit? Meh.</p>
									<h3>Rose Ceremony</h3>
									<p>James F. and Daniel go home. Daniel was funny and James F. was sweet. It was a bummer. Daniel's parting gift:</p>
									<blockquote>
										<p>She obviously is going for personality. Obviously, my personality is ****. [...] My body has nothing to do with this, 'cause obviously she doesn't care about that 'cause she picked guys like Evan and Wells. [...] I got a better chance of getting struck by lightning... while shaving... my face.</p>
									</blockquote>
									<h3>Uruguay</h3>
									<p>Jordan gets the first one-on-one date in Uruguay. They get to swim with SEALS. I squealed when the seals were swimming and jumping around them. Meanwhile, the guys are getting their hair cut by Vinny (kind of cute). As any good barbershop would have, Vinny has a couple of tabloid mags laying around. The guys see an article where Jojo's ex says that he was seeing Jojo while she was on the show, she's not there for the right reasons, etc. He sounds like a douche and I don't care to waste any more time on him. Jojo cries about it which is understandable as anyone with that gigantic of a douchebag ex would do. The guys take it well and definitely stand up for her.<br><br>
									Back to Jordan's one-on-one, Jojo tells Jordan that a girl he used to date told Jojo that Jordan was a sucky boyfriend. He talks about sports being tough and him being immature. I think unfortunately most guys do go through some insane immaturity phase, so I believe him.<br><br>
									</p>
									<h3>Group Date</h3>
									<p>They go sand surfing and had a ton of fun it looks like.</p>
									<img class="img-responsive" src="img/sandboarding.jpg" alt="groupdate" /><br><br>
									<p>Then Alex talks about how he dislikes Derek. INSECURITY IS NOT OKAY, BRO.</p>
									<blockquote>
										<p>I don't like the guy. [...] He gives off this vibe of insecurity, and I hate it. [...] She needs someone emotionally secure with the relationship. Someone like me.</p>
									</blockquote>
									<p>Yeah, okay.<br><br>Somehow Chad transferred his doucheness to Alex. Alex and Chase, but mostly Alex, gang up on Derek who compares the situation to a frat house. Frankly, with Alex's smug faces and childish remarks and the copious amounts of alcohol, it's exactly like a frat house. Alex is officially obnoxious and not very nice.<br></p>
									<h3>Robby's One-on-One</h3>
									<p>Robby tells Jojo he loves her. She's very happy. He seems genuine, despite all the <a class="blog-a" target="_blank" href="http://www.dailymotion.com/video/xqrvw0_mean-girls-clip-hair-full-of-secrets_shortfilms">secrets his hair is hiding</a>.</p>
									<h3>Rose Ceremony</h3>
									<p>Derek tries to solve the mean girls problem the guys seem to have. Alex is Regina, Jordan is Gretchen, and Chase is Karen. Alex cannot shut up and he is defnitely the meanest. Jordan and Gretchen both have the looks and play a supporting role to Alexgina. And Chase is along for the ride repeating what Alexgina and Jortchen say.<br><br>
									Evan, Grant, and Vinny go home. :( At least you won't have to worry about any more of your shirts getting ripped, Evan. You know, I just realized that Evan never talked about his kids. Hm. Sad to see Vinny cry. He seems like a good guy. Alas, this is when the good ones start getting sent home. Until next time.</p>
									<div class="row">
										<div class="col-md-1">
											<a href="https://twitter.com/share" class="twitter-share-button" data-text="The Bach League Blog" data-hashtags="thebachleague">Tweet</a>
											<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
										</div>
										<div class="col-md-1">
											<div class="fb-share-button" data-layout="button" data-mobile-iframe="true">
												<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.thebachleague.com%2F&amp;src=sdkpreparse"><img src="img/facebook.svg" alt="facebookshare" /></a>
											</div>
										</div>
										<div class="col-md-10"></div>
									</div>
									<p><a class="contact blog-a" href="#">Send us</a> your content to be featured!</p>
								</div><!-- end of blog-post -->
								<div id="blog-bottom-nav" class="row">
									<div class="col-md-12 col-sm-12">
										<div class="col-md-6 col-sm-6 text-left">
											<p><a href="chad-goes-home.php"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="light-grey"> Chad Goes Home </span></a></p>
										</div>
										<div class="col-md-6 col-sm-6 text-right">
											<p><a href="adios-wells.php"><span class="light-grey">Adios Wells</span> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
										</div>
									</div>
								</div><!-- end of blog-bottom-nav -->
						<!--</div> end of panel -->
							</div><!-- end of blog-main -->
						</div><!-- end of content -->
					</div><!-- end of row -->
				</div><!-- end of blog-content -->
			</div><!-- end of row -->
		</div><!-- end of container -->
	</div><!-- end of container-fluid -->
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
</body>
</html>