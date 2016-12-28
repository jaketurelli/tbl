<?php
	include('get_SESSION.php');
	//$_SESSION['CURRENT_PAGE'] = 'createjoin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Raleway:700,500,400,300,200,100|Roboto:700,500,400,300,100|Merriweather:300,400|Cabin:400' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	<title>The Bach League</title>
	<link rel="shortcut icon" href="favicon.ico?" type="image">
	<link rel="stylesheet" href="bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous"> -->
	<link href="style.css" rel="stylesheet" type="text/css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	 <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
	<script src="bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar nonhome nav-border-bottom">
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="navbar-brand navbar-brand-centered" href="index.php"><img src="img/logo.png" alt="brand-image" /></a>
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
		<!-- NAVIGATION PANE START -->
		<div class="navbar-collapse overlay navbar-right">
			<ul class="nav navbar-nav">
				<?php
				if($IS_SIGNED_IN){
					if($LEAGUE_ID > 0){
						if($IS_COMMISH){
				?>
							<li><a href="commissioner.php">Commissioner Tools</a></li>
				<?php
						}
				?>
						<li><a href="league.php">League</a></li>
						<li><a href="lineup.php">Lineup</a></li>
						<li><a href="trashtalk.php">Trash Talk</a></li>
				<?php
					}else{
				?>
						<li><a href="createjoin.php">Create/Join League</a></li>
				<?php
					}
				?>
					<li><a href="contestants.php">Contestants</a></li>
					<li><a href="blog.php">Blog</a></li>
				<?php
				}else{
				?>
					<li><a href="contestants.php">Contestants</a></li>
					<li><a href="blog.php">Blog</a></li>
				<?php
				}
				if($IS_ADMIN){
				?>
					<li class="active"><a href="admin.php">Admin</a></li>
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
		<!-- NAVIGATION PANE END -->
	</nav>
	
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div id="accordion" class="createjoin-panel panel-group">
					    <div class="panel panel-default">
					        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
					            <h4 class="panel-title">
					                <a href="#">Create a New League</a>
					            </h4>
					        </div>
					        <div id="collapseOne" class="panel-collapse collapse">
					            <div class="panel-body">
									<form action="createleague.php" method="post">
										<fieldset>
											<label>Enter a name for your league:</label>
											<input type="text" style="display:none"> <!-- tricks browser into autofilling this non-visual entry -->
											<input type="password" style="display:none"> <!-- tricks browser into autofilling this non-visual entry -->
											<input type="text" class="form-control" name="leaguename" value="" placeholder = "Enter league name here"/>
											<label>Create a password for your league that users will enter to join:</label>
											<input type="password" class="form-control" name="leaguepassword" value="" placeholder = "Enter league password here"/>
											<label>Enter the email addresses of friends you want to add to your league. (Optional. Separate email addresses with commas.)</label>
											<input type="text" class="form-control" name="emailaddresses" placeholder = "john@email.com, jane@email.com" value="">
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
					            <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo">
					                <a href="#">Join an Existing League</a>
					            </h4>
					        </div>
					        <div id="collapseTwo" class="panel-collapse collapse">
					            <div class="panel-body">
					            	<form action="joinleague.php" method="post">
										<fieldset>
											<label>League name:</label>
											<input type="text" style="display:none"> <!-- tricks browser into autofilling this non-visual entry -->
											<input type="password" style="display:none"> <!-- tricks browser into autofilling this non-visual entry -->
											<input type="text" class="form-control" name="leaguename" value="" placeholder = "Enter league name here"/>
											<label>League's password:</label>
											<input type="password" class="form-control" name="leaguepassword" value="" placeholder = "Enter league password here"/>
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
				<div class="col-md-6"></div>
				
			</div>
		</div><!-- end of container -->
	</div><!-- end of container-fluid -->

	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
</body>
</html>