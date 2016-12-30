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
	<script type="text/javascript" src="tbl.js"></script>
	<script type="text/javascript" src="overlay.js"></script> 
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
	$nav_page_id = 5;
	include('navbar_content.php');
	?>
	<!-- NAVIGATION PANE END -->

	
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
										<div class = "tile">
											<label>League name:</label>
											<input type="text" style="display:none"> <!-- tricks browser into autofilling this non-visual entry -->
											<input type="password" style="display:none"> <!-- tricks browser into autofilling this non-visual entry -->
											<input type="text" class="form-control" name="leaguename" value="" placeholder = "Enter league name here"/>
											<label>League's password:</label>
											<input type="password" class="form-control" name="leaguepassword" value="" placeholder = "Enter league password here"/>
										</div>
										<br>
										<div>OR:</div>
										<div class = "tile">
											<label>League Code:</label>
											<input type="text" class="form-control" name="leaguecode" value="" placeholder = "Enter emailed code here"/>
										</div>
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