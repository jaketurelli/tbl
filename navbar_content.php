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
	?>
	<nav class="navbar nonhome nav-border-bottom">
		<div class="navbar-header">
			<div class="navbar-brand-centered navbar-brand"><a href="index.php"><img src="img/logo.png" alt="brand-image" /></a></div>
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<ul class="nav pull-right" style="text-align:right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li style="display:none" class="loginnav"><a class="logout" href="logout.php">Logout</a></li>
				<?php
				}else{
				?>
					<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class="navbar-collapse overlay navbar-right">
			<ul class="nav navbar-nav">
				<?php
				if($IS_SIGNED_IN){
					if($LEAGUE_ID > 0){
						if($IS_COMMISH){
				?>
							<li <?php if($nav_page_id==1){echo 'class = "active"';}?> ><a href="commissioner.php">Commissioner Tools</a></li>
				<?php
						}
				?>
						<li <?php if($nav_page_id==2){echo 'class = "active"';}?>><a href="league.php">League</a></li>
						<li <?php if($nav_page_id==3){echo 'class = "active"';}?>><a href="lineup.php">Lineup</a></li>
						<li <?php if($nav_page_id==4){echo 'class = "active"';}?>><a href="trashtalk.php">Trash Talk</a></li>
				<?php
					}else{
				?>
						<li <?php if($nav_page_id==5){echo 'class = "active"';}?>><a href="createjoin.php">Create/Join League</a></li>
				<?php
					}
				?>
					<li <?php if($nav_page_id==6){echo 'class = "active"';}?>><a href="contestants.php">Contestants</a></li>
					<li <?php if($nav_page_id==7){echo 'class = "active"';}?>><a href="blog.php">Blog</a></li>
				<?php
				}else{
				?>
					<li <?php if($nav_page_id==6){echo 'class = "active"';}?>><a href="contestants.php">Contestants</a></li>
					<li <?php if($nav_page_id==7){echo 'class = "active"';}?>><a href="blog.php">Blog</a></li>
				<?php
				}
				if($IS_ADMIN){
				?>
					<li <?php if($nav_page_id==8){echo 'class = "active"';}?>><a href="admin.php">Admin</a></li>
				<?php
				}
				?>
			</ul>
			<ul class="nav navbar-nav pull-right" style="text-align:right">
			<?php 
			if($IS_SIGNED_IN){
			?>
				<li><a class="greeting">Hi <?php echo $ALIAS . '!'?></a></li>
				<li><a class="logout" href="logout.php">Logout</a></li>
			<?php
			}else{
			?>
				<li style="border-right: 1px solid rgba(255,255,255,0.5)"><a class="signup"data-toggle="modal" data-target="#signupmodal" href="#">Sign up</a></li>
				<li><a class="login" data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
			<?php
			}
			?>
			</ul>
		</div>
	</nav>
