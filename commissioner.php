<?php
	include('get_SESSION.php');
	$_SESSION['CURRENT_PAGE'] = 'commissioner.php';
	if(!isset($_SESSION['COMMISSIONER_TAB'])){
		$_SESSION['COMMISSIONER_TAB'] = 1;
	}else{
	}

?>

<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
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
	$nav_page_id = 1;
	include('navbar_content.php');
	?>
	<!-- NAVIGATION PANE END -->
	
	<?php 
	if($IS_SIGNED_IN){
	?>
		<?php
		if($IS_MOBILE)
		{
		?>
			<div class="container-fluid">
				<div class="row">
					
				</div>
			<!--</div> end of container -->
		</div><!-- end of container fluid -->

		<?php
		}else{
		?>
		<div class="container-fluid">
		<!-- <ul class="nav nav-tabs">
   <li><a href="#a" data-toggle="tab">a</a></li>
   <li><a href="#b" data-toggle="tab">b</a></li>
   <li><a href="#c" data-toggle="tab">c</a></li>
   <li><a href="#d" data-toggle="tab">d</a></li>
</ul>

<div class="tab-content">
   <div class="tab-pane active" id="a">..a.</div>
   <div class="tab-pane" id="b">..b.</div>
   <div class="tab-pane" id="c">.c..</div>
   <div class="tab-pane" id="d">.h..</div>
</div> -->
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 col-sm-12">
					<h3>League Commissioner Tools</h3>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3 col-sm-3 tabbable sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
						<li <?php if($_SESSION['COMMISSIONER_TAB']==1){echo 'class = "active"';}?>><a href="#a" data-toggle="tab">Email league members</a></li>
						<li <?php if($_SESSION['COMMISSIONER_TAB']==2){echo 'class = "active"';}?>><a href="#b" data-toggle="tab">Write league announcement</a></li>
						<li <?php if($_SESSION['COMMISSIONER_TAB']==3){echo 'class = "active"';}?>><a href="#c" data-toggle="tab">Adjust scoring</a></li>
						<li <?php if($_SESSION['COMMISSIONER_TAB']==4){echo 'class = "active"';}?>><a href="#d" data-toggle="tab">Remove league members</a></li>
						<li <?php if($_SESSION['COMMISSIONER_TAB']==5){echo 'class = "active"';}?>><a href="#e" data-toggle="tab">Add league members</a></li>

						<!-- <li role="presentation" class="active"><a class="item" data-target="1" href="#">Email league members</a></li>
						<li role="presentation"><a class="item" data-target="2" href="#">Write league announcement</a></li>
						<li role="presentation"><a class="item" data-target="3" href="#">Adjust scoring</a></li>
						<li role="presentation"><a class="item" data-target="4" href="#">Remove league members</a></li>
						<li role="presentation"><a class="item" data-target="5" href="#">Add league members</a></li> -->
					</ul>
				</div>
				<div id="commissioner-tab-content" class="tab-content col-md-7 col-sm-9">
				<!--<div id="a" class = "tab-pane active">-->
					<div id="a" <?php if($_SESSION['COMMISSIONER_TAB']==1){echo 'class = "tab-pane active"';}else{echo 'class = "tab-pane"';}?>> 
						<form method="post" action="commissioner_email_league.php">
							<label style="display:none;">To</label>
							<input id="email-group" name="email-group" style="display:none;">
							<label>Email Subject</label><br>
							<input id="subject" name="subject" type="text"><br>
							<label>Message</label><br>
							<textarea id="message" rows="4" class="message" name="message" type="text"></textarea>
							<!-- <label><input type="checkbox"> Send me a copy of the email</input></label> -->
							<input type = "submit" name = "submit" class="btn pull-right text-center" value="SEND"></input>
							<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
						</form>
					</div>
				<!--<div id="b" class="tab-pane">-->
					<div id="b" <?php if($_SESSION['COMMISSIONER_TAB']==2){echo 'class = "tab-pane active"';}else{echo 'class = "tab-pane"';}?>> 
						<form id="addannouncementform" role="form" method="post" action="commissioner_announcement.php">
							<p>Upon posting, this league announcement will replace the previous one if there is one.</p>
		        			<input type="text" id="announcement" class="form-control" name="announcement" value="">
		        			<input type = "submit" class="btn pull-right text-center" value="POST"></input>
							<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
						</form>
						<?php 
							$query = "SELECT * FROM commissioner_announcements WHERE league_id = $LEAGUE_ID ORDER BY id DESC";
							$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
							if(mysqli_num_rows($result)!=0){
								while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
									$curr_announcement =  $row['announcement'];
									$curr_time_stamp =  $row['time_stamp'];
									?>
									<tr>
										<td>
											<?php echo $curr_time_stamp . ":" . $curr_announcement;?>
										</td><br>
									</tr>
									<?php
								}
							}


							?>
					</div>
					<div id="c" <?php if($_SESSION['COMMISSIONER_TAB']==3){echo 'class = "tab-pane active"';}else{echo 'class = "tab-pane"';}?>> 
						<p>This feature is coming soon. If you would like to modify a league member's score, please email admin@thebachleague.com</p>
<!--
						<p>Select ceremony number:</p>
						<p>Ceremony 1 (Week 1 Date)</p>
						<p>Number of points: 10</p>
						<p>Enter updated number of points for Ceremony #:</p>
						<input class="text"></input><br>
						<input class="btn pull-right text-center" value="SAVE"></input>
						<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
-->
					</div>
					<div id="d" <?php if($_SESSION['COMMISSIONER_TAB']==4){echo 'class = "tab-pane active"';}else{echo 'class = "tab-pane"';}?>> 
						<div class = "tile">
							<form method="post" action="commisioner_remove_user.php">
								<label><b>List of current league members:</b></label>
								<br>
								<label>
									<?php
										$query = "SELECT user_id, first_name, last_name, alias FROM user WHERE league_id = $LEAGUE_ID AND user_id != $USER_ID";
										$getUsers = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($getUsers)>0){
											while($curr_user = mysqli_fetch_array($getUsers)){
												$display_name = $curr_user['first_name'] . ' ' . $curr_user['last_name'] ;
												$curr_user_id = $curr_user['user_id'];
												?>
												<input type="checkbox" name = "user_list[]" value = <?php echo '"' . $curr_user_id . '"'?> id = <?php echo '"' . $curr_user_id . '"'?>> <?php echo $display_name?></input><br>
												<?php
											}

										}else{
											echo '<p>You currently have no league members</p>';
										}
										
									?>
								</label>
								<p>By clicking Remove, you will remove the user from the league. The user can always be added back to your league.</p>
							<!--<input class="btn pull-right text-center" type = 'submit' value="REMOVE"></input>
								<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
							-->
								<input class="btn " type = 'submit' value="REMOVE"></input>
								<input class="btn btn-secondary " value="CANCEL"></input>

							</form>
						</div>
						<div class = "tile">
							<form method="post" action="commisioner_return_removed_user.php">
								<label><b>List of removed league members:</b></label>
								<br>
								<label>
									<?php
										$removed_league_id = -$LEAGUE_ID;
										$query = "SELECT user_id, first_name, last_name, alias FROM user WHERE league_id = $removed_league_id";
										$getUsers = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($getUsers)>0){
											while($curr_user = mysqli_fetch_array($getUsers)){
												$display_name = $curr_user['first_name'] . ' ' . $curr_user['last_name'] ;
												$curr_user_id = $curr_user['user_id'];
												?>
												<input type="checkbox" name = "user_list[]" value = <?php echo '"' . $curr_user_id . '"'?> id = <?php echo '"' . $curr_user_id . '"'?>> <?php echo $display_name?></input><br>
												<?php
											}
										}else{
											echo '<p>There are currently no removed users.</p>';
										}
										
									?>
								</label>
								<p>By clicking Add, you will return the removed user to your league.</p>
								<input class="btn " type = 'submit' value="ADD"></input>
								<input class="btn btn-secondary " value="CANCEL"></input>

							</form>
						</div>

					</div>
					<div id="e" <?php if($_SESSION['COMMISSIONER_TAB']==5){echo 'class = "tab-pane active"';}else{echo 'class = "tab-pane"';}?>> 
						<form method="post" action="commissioner_invite_user.php">
							<label>Enter email address of the user you'd like to invite:</label>
							<br>
							<input type="email" name = "email" value=""></input>
							<p>The user will be sent an email containing information on joining your league.</p>
							<input type = "submit" class="btn pull-right text-center" name = "invite" value="INVITE"></input>
							<input class="btn btn-secondary pull-right text-center" value="CANCEL"></input>
						</form>
					</div>


					<!-- <div id="div1" class="targetDiv">
						<form method="post" action="email-league.php">
							<label style="display:none;">To</label>
							<input id="email-group" name="email-group" style="display:none;">
							<label>Email Subject</label><br>
							<input id="email" name="email" type="email"><br>
							<label>Message</label><br>
							<textarea id="message" rows="4" class="message" name="message" type="text"></textarea>
							<label><input type="checkbox"> Send me a copy of the email</input></label>
							<div class="modal-footer">
								<input id="submit-email-league" class="btn pull-right text-center" name="submit" type="submit" value="SUBMIT">
							</div>
						</form>
					</div>
					<div id="div2" class="targetDiv">
						<p>Upon saving, this league announcement will replace the previous one if there is one.</p>
		        		<textarea rows="3"></textarea>
		        		<button type="button" class="btn btn-blueoutline" data-dismiss="modal">Close</button>
		        		<button type="button" class="btn">Save</button>
					</div>
					<div id="div3" class="targetDiv">
						
					</div>
					<div id="div4" class="targetDiv">
						<form method="post" action="contact-us-send.php">
							<label>List of current league members:</label>
							<br>
							<label><input type="checkbox"> Name of league member</input></label><!-- JAKE list each league member
							<div class="modal-footer">
								<p>By clicking Submit, you will remove the user from the league and all of their saved ceremonies.</p>
								<a href="#" ><button>SUBMIT</button></a>
								<input class="btn pull-right text-center" value="CANCEL"></input>
							
							</div>
						</form>
					</div>
					<div id="div5" class="targetDiv">
						<form method="post" action="contact-us-send.php">
							<label>Enter email address of the user you'd like to invite:</label>
							<br>
							<input type="email">Email address</input>
							<div class="modal-footer">
								<p>The user will be sent an email containing information on joining your league.</p>
								<a href="#" ><button>SUBMIT</button></a>
								<input class="btn pull-right text-center" value="CANCEL"></input>
							</div>
						</form>
					</div> -->
				</div>
				<div class="col-md-1"></div>
				</div>
			</div>
		</div><!-- end of container fluid -->
		<?php } ?>
	<?php } ?>
	
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
	
	<script type="text/javascript">
	</script>
</body>
</html>