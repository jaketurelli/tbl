<?php
	include('get_SESSION.php');
	//$_SESSION['CURRENT_PAGE'] = 'createjoin.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
</head>
<body>
	<nav class="navbar nonhome nav-border-bottom">
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<?php
			if($IS_MOBILE){
			?>
				<a class="navbar-brand navbar-brand-centered" href="index.php"><img src="img/logo-mobile.png" alt="brand-image" /></a>
			<?php
			}else{
			?>
				<a class="navbar-brand navbar-brand-centered" href="index.php"><img src="img/logo.png" alt="brand-image" /></a>
			<?php
			}
			?>
			<ul class="nav pull-right" style="text-align:right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li><a class="logout" href="logout.php">Logout</a></li>
				<?php
				}else{
				?>
					<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class=" navbar-collapse overlay navbar-right">
			<ul class="nav navbar-nav nav-pills">
				<?php
				if($IS_SIGNED_IN){
				?>
					<li><a href="league.php">League</a></li>
					<li><a href="lineup.php">Lineup</a></li>
					<li><a href="trashtalk.php">Trash Talk</a></li>
					<li><a href="contestants.php">Contestants</a></li>
					<li><a href="blog.php">Blog</a></li>
				
				<?php
				}else{
				?>
					<li><a href="createjoin.php">Create/Join League</a></li>
				<?php
				}
				
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
	
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div id="accordion" class="createjoin-panel panel-group">
				    <div class="panel panel-default">
				        <div class="panel-heading">
				            <h4 class="panel-title">
				                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Create a New League</a>
				            </h4>
				        </div>
				        <div id="collapseOne" class="panel-collapse collapse">
				            <div class="panel-body">
				                <h3>Create a new league</h3>
								<form action="createleague.php" method="post">
									<fieldset>
										<label>Enter a name for your league:</label>
										<input type="text" class="form-control" name="leaguename" autocomplete="off" value="" />
										<label>Create a password for your league that users will enter to join:</label>
										<input type="password" class="form-control" name="leaguepassword" autocomplete="off" value="" />
										<div class="text-center">
											<input type="submit" class="btn" name="createleague" value="CREATE">
										</div>
									</fieldset>
								</form>
				            </div>
				        </div>
				    </div>
				    <div class="panel panel-default">
				        <div class="panel-heading">
				            <h4 class="panel-title">
				                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Join an Existing League</a>
				            </h4>
				        </div>
				        <div id="collapseTwo" class="panel-collapse collapse">
				            <div class="panel-body">
				                <h3>Join a league</h3>
								<form action="joinleague.php" method="post">
									<fieldset>
										<label>League name:</label>
										<input type="text" class="form-control" name="leaguename" autocomplete="off" value="" />
										<label>League's password:</label>
										<input type="password" class="form-control" name="leaguepassword" autocomplete="off" value="" />
										<div class="text-center">
											<input type="submit" class="btn" name="joinleague" value="JOIN">
										</div>
									</fieldset>
								</form>
				            </div>
				        </div>
				    </div>
				</div><!-- end of accordion -->
			</div>
		</div><!-- end of container -->
	</div><!-- end of container-fluid -->

	<?php
	include('footer.html');
	?>
</body>
</html>