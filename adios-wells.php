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
		<div class="container">
			<div class="row">
			<div id="blog-content" class="col-md-9 col-sm-12">
					<div class="blog-header">
						<a href="blog.php"><h2 class="blog-title">the bach league blog</h2></a>
					</div>
					<div class="row">	
						<div class="col-md-6 col-sm-6 text-left">
							<p><a href="uruguay-robby-jordan.php"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> previous post <span class="light-grey"> group goes to uruguay </span></a></p>
						</div>
						<div class="col-md-6 col-sm-6 text-right">
							<!--<p><a href="#">next post <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>-->
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 content">
							<div class="blog-main">
								<!--<div class="panel panel-default">-->
									<div class="blog-post">
										<h3 class="blog-post-title">Adios, Wells</h3>
										<p class="blog-post-meta">June 28, 2016 by KLM</p>
										<p>A recap of the episode in Argentina.</p>
										<hr>
										<p>Wells gets the first one-on-one in Argentina. It's also HIS first one-on-one. The ENTIRE one-on-one commentary focuses on how Wells hasn't kissed Jojo yet. It all feels juvenile with the other guys teasing him about breath mints and epic kissing. The man wanted their first kiss to be extra special. Ain't nothing wrong with that. In fact, America probably fell in love with him a little more. But fast forward past their first kiss and a sweaty dinner date, and Wells is sent packing. I was definitely shocked to see him not get a rose not just because it's a one-on-one, but because he's thoughtful and sweet and NOT DRAMATIC. But I guess that last reason is probably why he wasn't good for the show. #TEAMWELLSFORBACHELOR<br><br>
										They show the guys reacting to Wells not coming back. Alex has this stupid grin on his face like he's more just surprised that someone didn't come back from a one-on-one. Compare that to James T.'s face of genuine sadness.</p>
										<h3>Group date where James doesn't feel sexy</h3>
										<p>Next is the group date with everyone but Derek and Chase who are slated for the two-on-one. The group goes to play soccer. And any time you get dudes and sports in the same arena, there's going to be drama. James T. feels less sexy than the other dudes. I get that. But that's what the next 20 minutes are about including a bit about James calling Jordan a little entitled which seems fair. I don't claim to know everything about Aaron's lil bro, but we do know what he's like on the show and that he doesn't seem to be <a class="blog-a" href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwii6-iFytDNAhVE32MKHcquDd0QqQIIHTAA&url=http%3A%2F%2Fwww.people.com%2Farticle%2Fbachelorette-jordan-rodgers-relationship-brother-aaron-rodgers&usg=AFQjCNF3I468PMLPOpUbzd5bMThHZGCvUg&sig2=OkiZYdZk9FRcdQTykacZWw&bvm=bv.126130881,d.cGc">close to Aaron.</a> Jojo seems to have some doubts about Jordan. She claims to go with her gut, but when you keep having doubts about the dude... send him home, girl. Just send him home. You got so many other good ones (as long as you don't keep sending them home).<br><br>
										So the group date ends, and the rose goes to Luke. Then there's some major awkward silence during which James asks Jojo how she feels and she says, "I feel great. You guys are making me feel weird." Boys are soooo dramatic.</p>
										<h3>The two-on-one with Derek and Chaser</h3>
										<p>The guys tango with Jojo which would have been cute to watch had it just been one dude with Jojo but was just kind of awkward with two.</p>
										<img src="img/jojotango.jpg" alt="jojotango" /><br><br>
										<p>Both guys are so confident that they'll get chosen. So it tugs at the heart strings when Derek is sent home in tears. It's just not the same when you're rooting for both. Not sure what ABC was thinking on this one.</p>
										<h3>Rose Ceremony</h3>
										<p>Let's just start with Jojo's prom dress. Normally, I like her style. It's sparkly but bold and edgy. Tonight's dress was not so much. On to the cocktail ceremony, Jordan opens up but still manages to sound distant in my opinion. Alex tells Jojo he was upset after the group date because he's never gotten a group date rose or had a true one-on-one. Sounds like someone's a little insecure (read <a class="blog-a" href="uruguay-robby-jordan.html">last week's blog post</a> for Alex's rip on Derek for being insecure). Anyway, she gives everyone a rose. I think ABC let her since they screwed her on the two-on-one. As always, my favorite scene is after the rose ceremony when the guys are just hanging out. James talks about how 41% of his weight is from eating pizza. Then Robby calls him out for spelling margherita pizza like a margarita drink. It was lighthearted and all in good fun. Good way to end a dramatic episode.</p>
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
									<div id="blog-bottom-nav" class="row">
										<div class="col-md-12 col-sm-12">
											<div class="col-md-6 col-sm-6 text-left">
												<p><a href="chad-goes-home.php"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> previous post <span class="light-grey"> group goes to uruguay </span></a></p>
											</div>
											<div class="col-md-6 col-sm-6 text-right">
												<!--<p><a href="">next post<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>-->
											</div>
										</div>
									</div><!-- end of row -->
								<!--</div> end of panel -->
							</div><!-- end of blog-main -->
						</div><!-- end of content -->
					</div><!-- end of row -->
				</div>
			</div>
		</div><!-- end of container -->
	</div><!-- end of container-fluid -->
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
</body>
</html>