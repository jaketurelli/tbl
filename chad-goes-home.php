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
				<li class="active"><a href="blog.php">blog</a></li>
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
	<div id="blog-bg" class="container-fluid">
		<div id="blog-content" class="container">
			<div class="blog-header">
				<a href="blog.php"><h2 class="blog-title">the bach league blog</h2></a>
			</div>
			<div class="row">
				<!--<div class="col-md-6 col-sm-6 text-left">
					<p><a href="chad-goes-home.html"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Previous Post <span class="light-grey">  Chad Goes Home</span></a></p>
				</div>-->
				<div class="col-md-6 col-sm-6">
					<p><a href="uruguay-robby-jordan.php"><span class="light-grey">group goes to uruguay </span>next post <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
				</div>		
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-9 content">
					<div class="blog-main">
						<!--<div class="panel panel-default">-->
							<div class="blog-post">
								<h3 class="blog-post-title">Chad Goes Home</h3>
								<p class="blog-post-meta">June 11, 2016 by KLM</p>
								<p>A recap of the two episodes that aired June 6th and June 7th.</p>
								<hr>
								<p>Jojo's first one-on-one date was with Chase to do some yoga. I missed it because we were eating In 'n Out. #worthit Next is the group date where Chad seems to be unaware that you go on group dates in this show.</p>
								<blockquote>
									<p>"Honestly I don't want to go. I'd rather you guys go and do your thing, and I'll have a one on one later. [...] Twelve guys is too many."</p>
								</blockquote>
								<p>Yeah, you try that, Chad. So the task at hand was to entertain an audience at a comedy club by sharing their sexual experiences. All the guys put forth their best efforts in making Jojo and the rest of the audience laugh. Chad just tried to awkwardly kiss Jojo after ripping Evan's shirt.</p>
								<p>Back at the mansion, Chad and Daniel have one of the best conversations while Chad is eating a raw sweet potato that he probably pulled out of the ground near the onion tree (#teamAshleyS).</p>
								<img class="blog-img" src="img/chadpotato.gif" alt="chad-gif" />
								<blockquote>
									<p>Daniel: "If I talk to you, I get dragged down your negativity route. Let's just pretend you're Hitler—"</p>
									<p>Chad: "Let's not pretend I'm Hitler."</p>
									<p>Daniel: "Let's just say, you know?"</p>
									<p>Chad: "Let's not just say."</p>
									<p>Daniel: "Let's say you're Donald Trump or something like that. If I hang out with you, it's gonna make me look bad. So let's be not so much like Hitler but more like Mussolini. You know? Or Bush, right? Like, take it down a notch."</p>
								</blockquote>
								<p>#brospeak</p>
								<h3>Rose Ceremony</h3>
								<p>Christian, Ali, and Nick B are sent home. :(</p>
								<h3>Off to Pennsylvania</h3>
								<p>Jojo and the bros head off to PA where she gets one of the best dates I've ever seen. EIGHT adorable doggies, a hot tub, dinner, a private concert, and a Luke? Yes, please.</p>
								<p>Then the group date commences where Jordan gets to show off his football prowess, and the boys compete in a friendly game of football guided by Hines Ward, Big Ben, and Brett Keisel. Jojo seriously has my dream dates. Sidenote, did anyone else notice how much effort Evan put into how he wore his sweatband? Somehow he made himself look MORE high maintenance by wearing a sweatband. The blue team wins and gets more time with Jojo.</p>
								<p>Lastly, our favorite part of the episode: the two-on-one date with Alex and Chad. I do think Alex and Evan purposely push Chad's buttons. But Chad is just difficult to put it lightly. My boyfriend thinks maybe the producers put him up to it, and really, he's just the nicest teddy bear. Who knows.</p>
								<p>Jojo puts her foot down in an awesome, respectful, but hella firm manner and sends Chaddy packing. I love seeing the girls on these shows putting an end to douches.</p>
								<blockquote><p>Chad, I don't think that you are the person that you say you are. I don't think that the way that you behave and resort to violence is something that is acceptable. I don't want somebody that threatens other people, who can't get along with other people and thinks that physical violence is the way to solve things. So with that said, Alex, will you accept this rose?</p>
								</blockquote>
								<p>Mic drop.</p>

								
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
							</div>
								
						<!--</div>-->
						<div id="blog-bottom-nav" class="row">
									<div class="col-md-12 col-sm-12">
										<div class="col-md-6 col-sm-6 text-left">
											<!--<p><a href="chad-goes-home.html"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> previous post <span class="light-grey"> CHAD GOES HOME </span></a></p>-->
										</div>
										<div class="col-md-6 col-sm-6 text-right">
											<p><a href="uruguay-robby-jordan.php"><span class="light-grey">group goes to uruguay</span> next post<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
										</div>
									</div>
							</div><!-- end of row -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
</body>
</html>