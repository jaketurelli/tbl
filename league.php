<?php
	include('get_SESSION.php');
	$_SESSION['CURRENT_PAGE'] = 'league.php';
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
		<div class=" navbar-collapse overlay navbar-right">
			<ul class="nav navbar-nav nav-pills">
				<li class="active"><a href="league.php">LEAGUE</a></li>
				<?php
				if($IS_COMMISH){
				?>
					<li><a href="commissioner.php">COMMISSIONER TOOLS</a></li>
				<?php
				}
				?>
				<li><a href="lineup.php">LINEUP</a></li>
				<li><a href="trashtalk.php">TRASH TALK</a></li>
				<li><a href="contestants.php">CONTESTANTS</a></li>
				<li><a href="blog.php">BLOG</a></li>
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
	if($IS_SIGNED_IN){
	?>
		<div class="container-fluid">
				<div id="background" class="row">
				
					<div id="sidebar" class="col-md-3">
						
							<table id="leagueinfo">
								<tbody>
									<tr>
										<td class="leagueinfotitle white-text">LEAGUE</td><td class="leagueinput"><?php echo $LEAGUE_NAME ?></td>
									</tr>
									<tr>
										<td class="leagueinfotitle white-text">COMMISSIONER</td><td class="leagueinput"><?php echo $COMMISSIONER ?></td>
									</tr>
								</tbody>
							</table>
							<hr>
							
							<h3 class="standingsheader white-text">Standings</h3>
							<table id="standings">
								<tbody>
								<?php
									$query_user = "SELECT user_id, alias FROM user WHERE league_id = $LEAGUE_ID ORDER BY user_id ASC";
									$TABLE_USER = mysqli_query($dbc, $query_user) or die ("Error in query: $query_user " . mysqli_error($dbc));
									$TABLE_USER_ALIAS_ARRAY = array();
									while ($row = mysqli_fetch_array($TABLE_USER, MYSQL_NUM)) {
										$ind =  $row[0];
									    $TABLE_USER_ALIAS_ARRAY[$ind] =  $row[1];  
									}
									$query = "SELECT user_id, total_score FROM score WHERE league_id = $LEAGUE_ID ORDER BY total_score DESC";
									$scores = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
									if (mysqli_num_rows($scores)==0){
										// do nothing
									}else{
										// CALCULATE STANDINGS
										$standing_counter=1;
										$counter = 1;
										while($curr_user = mysqli_fetch_array($scores)){
											$ind = $curr_user['user_id'];
											$curr_alias = $TABLE_USER_ALIAS_ARRAY[$ind];
											$curr_score = $curr_user['total_score'];
											if ($counter==1){
												$curr_standing = $standing_counter;
											}else{
												// IF SCORES ARE THE SAME, COUNTER STAYS THE SAME
												if($previous_score==$curr_score){
													$curr_standing = $standing_counter;
												}else{ // ELSE, STANDINGS INCREASE
													$standing_counter=1+$standing_counter;
													$curr_standing= $standing_counter;
												}
											}
											$counter =$counter + 1;
											$previous_score = $curr_score;													
											?>
											<tr>
												<td class="col-md-2 place"><?php echo $curr_standing;?></td><td class="col-md-2"><img src="img/profile.png" /></td><td class="col-md-4"><?php echo $curr_alias ?></td><td class="col-md-4"><?php echo $curr_score ?> pts</td>
											</tr>
											<?php

										}							
									}

								?>
								</tbody>
							</table>
						
					</div>
					<div id="tiledcontent" class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="tile">
									<h3>site announcement</h3><p> Hi friends and family! You are using the beta version of The Bach League so it's the bare minimum of features and functionality. Jake and Kacy are in the process of adding features and will let you all know when new changes are pushed to the website! If you have any questions, comments, or feedback, feel free to email/text us.</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div id="leftleaguecol" class="col-md-6">
								<div class="tile">
									<h3>league announcement</h3>
									<?php 
										// DISPLAY LATEST ANNOUNCEMENT
										$query = "SELECT * FROM commissioner_announcements WHERE league_id = $LEAGUE_ID ORDER BY id DESC";
										$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($result)!=0){
											$latest_announcement = mysqli_fetch_array($result, MYSQL_ASSOC);
											$announcement = $latest_announcement['announcement'];
											echo "<p>" . $announcement . "</p>";
										}else{
											echo "<p>No announcements.</p>";
											
										}
									?>

								</div>
								<div class="tile">
									<h3>blog</h3>
									<h4>Latest article: "BYE CHAD"</h4>
									<p>by Admin 6/14/16</p>
									<p>This week’s episode was epic. We saw Alex take down Chad and Jojo give a rock solid speech to Chad telling him to leave. It reminded me of Emily Maynard’s season when she told Kalen to get the eff out. If you haven’t seen it, you must see it now. And then see the follow-up on her Men Tell All episode.</p>
									<a href="chad-goes-home.php"><button class="btn btn-pink">READ MORE</button></a>
								</div>
								<div class="tile">
									<h3>site stats</h3>
									<p class="tabletitle">Latest week:</p>
									<table>
										<tbody>
										<?php
										$previous_ceremony = $CURRENT_CEREMONY-1;
										// GET CONTESTANT ID ARRAY
										$query = "SELECT contestant_id, name FROM contestants ORDER BY contestant_id ASC";
										$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										$CONTESTANT_ID_ARRAY = array();
										$CONTESTANT_NAME_ARRAY = array();
										while($this_contestant = mysqli_fetch_array($result,MYSQLI_ASSOC)){
											$CONTESTANT_NAME_ARRAY[] = $this_contestant['name']; 
										}


										// CALCULATE MOST PICKED FOR ALL LEAGUES IN PREVIOUS WEEK
										$query = "SELECT contestant_id FROM picks WHERE ceremony = $previous_ceremony";
										$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($result)!=0){
											$pick_array = array();
											while($this_pick = mysqli_fetch_array($result,MYSQLI_NUM)){
												//$curr_cont_id = (int)$this_pick[0]; // 0 index for contestant_id queried
												//$CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] = $CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] + 1; // add pick count 
												$pick_array[] = (int)$this_pick[0];
											}
											$CountedValues = array_count_values($pick_array);
											
											// GET MOST PICKS
											arsort($CountedValues, SORT_NUMERIC);
											$most_picks_ids = array();
											$most_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$most_picks_ids[] = $key;
												$most_picks_vals[] = $val;
											}

											// GET LEAST PICKS
											asort($CountedValues, SORT_NUMERIC);
											$least_picks_ids = array();
											$least_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$least_picks_ids[] = $key;
												$least_picks_vals[] = $val;
											}
										}

										// DISPLAY TOP 3 MOST PICKED
										for($i=0;$i<3;$i++){
											if($i===0){
												$statcat = ' statcategory';
												$identifier = 'MOST PICKED';
											}else{
												$statcat = '';
												$identifier = '';
											}
											$ind = $most_picks_ids[$i]-1;
											?>
											<tr>
												<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
												<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
												<td class="col-md-4"><?php echo $most_picks_vals[$i]?> picks</td>
											</tr>
										<?php
										}

										// DISPLAY 1 LEAST PICKED
										for($i=0;$i<1;$i++){
											if($i===0){
												$statcat = ' statcategory';
												$identifier = 'LEAST PICKED';

											}else{
												$statcat = '';
												$identifier = '';
											}
											$ind = $least_picks_ids[$i]-1;
											?>
											<tr>
												<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
												<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
												<td class="col-md-4"><?php echo $least_picks_vals[$i]?> picks</td>
											</tr>
										<?php


										}
				
										?>
										<!--
											<tr>
												<td class="col-md-5 statcategory">MOST PICKED</td>
												<td class="col-md-3 contestantname">Jordan</td>
												<td class="col-md-4">128 picks</td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">James T.</td>
												<td class="col-md-4">126 picks</td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Luke</td>
												<td class="col-md-4">122 picks</td>
											</tr>
											-->
											<tr>
												<td class="col-md-5 statcategory">LEAST PICKED</td>
												<td class="col-md-3 contestantname">Chad</td>
												<td class="col-md-4">43 picks</td>
											</tr>
											<tr>
												<td class="col-md-5 statcategory">DARK HORSE</td>
												<td class="col-md-3 contestantname">Evan</td>
												<td class="col-md-4"></td>
											</tr>
										</tbody>
									</table>
									<p class="tabletitle">All-time:</p>
									<table>
										<tbody>
											<?php
										// CALCULATE MOST PICKED FOR ALL LEAGUES IN ALL WEEKS
										$query = "SELECT contestant_id FROM picks";
										$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($result)!=0){
											$pick_array = array();
											while($this_pick = mysqli_fetch_array($result,MYSQLI_NUM)){
												//$curr_cont_id = (int)$this_pick[0]; // 0 index for contestant_id queried
												//$CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] = $CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] + 1; // add pick count 
												$pick_array[] = (int)$this_pick[0];
											}
											$CountedValues = array_count_values($pick_array);
											
											// GET MOST PICKS
											arsort($CountedValues, SORT_NUMERIC);
											$most_picks_ids = array();
											$most_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$most_picks_ids[] = $key;
												$most_picks_vals[] = $val;
											}

											// GET LEAST PICKS
											asort($CountedValues, SORT_NUMERIC);
											$least_picks_ids = array();
											$least_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$least_picks_ids[] = $key;
												$least_picks_vals[] = $val;
											}
										}
										?>
											
											<?php
											// DISPLAY TOP 3 MOST PICKED
											for($i=0;$i<3;$i++){
												if($i===0){
													$statcat = ' statcategory';
													$identifier = 'MOST PICKED';
												}else{
													$statcat = '';
													$identifier = '';
												}
												$ind = $most_picks_ids[$i]-1;
												?>
												<tr>
													<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
													<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
													<td class="col-md-4"><?php echo $most_picks_vals[$i]?> picks</td>
												</tr>
											<?php
											}

											// DISPLAY 1 LEAST PICKED
											for($i=0;$i<1;$i++){
												if($i===0){
													$statcat = ' statcategory';
													$identifier = 'LEAST PICKED';

												}else{
													$statcat = '';
													$identifier = '';
												}
												$ind = $least_picks_ids[$i]-1;
												?>
												<tr>
													<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
													<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
													<td class="col-md-4"><?php echo $least_picks_vals[$i]?> picks</td>
												</tr>
											<?php


											}
											?>
											<!--
											<tr>
												<td class="col-md-5 statcategory">MOST PICKED</td>
												<td class="col-md-3 contestantname">Jordan</td>
												<td class="col-md-4"></td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Luke</td>
												<td class="col-md-4"></td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Derek</td>
												<td class="col-md-4"></td>
											</tr>
											<tr>
												<td class="col-md-5 statcategory">LEAST PICKED</td>
												<td class="col-md-3 contestantname">Coley</td>
												<td class="col-md-4"></td>
											</tr>
											-->
										</tbody>
									</table>
								</div>
							</div>
							<div id="rightleaguecol" class="col-md-6">
								<div class="tile">
									<h3>eliminations</h3>
									<p>Ceremony <?php echo $CURRENT_CEREMONY-1;?>:</p>
								
									<?php 
									if ($previous_ceremony!=0){
										// DISPLAY ELIMINATED CONTESTANTS FROM THE PREVIOUS ROUND (1 LESS THAN CURRENT CEREMONY)
										$query = "SELECT contestant_id, name, image_dir FROM contestants WHERE eliminated = $previous_ceremony";
										$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($result)!=0){
											$count=1;
											while($loser = mysqli_fetch_array($result)){
												if(($count)%2==0){
													echo '<div class="row">';
												}
												$curr_loser_name = $loser['name'];
												$curr_loser_image = 'img/lineup/'.$loser['image_dir'];?>
												<div class="col-md-6">
													<img class="contestantimg" src=<?php echo '"'. $curr_loser_image. '"';?>/><p class="contestantname"><?php echo $curr_loser_name?></p>
												</div>
										<?php
												if(($count)%2==0){
													echo '</div>';
												}
												$count=$count+1;
											}
										}else{
											echo '<p>No eliminations yet.</p>';
										}
									}else{
										echo '<p>No eliminations yet.</p>';
									}
									?>
								</div>
								<div class="tile">
									<h3>league stats</h3>
									<p class="tabletitle">Latest week:</p>
									<table>
										<tbody>
										<?php
										
										// CALCULATE MOST PICKED FOR LEAGUE IN PREVIOUS WEEK
										$query = "SELECT contestant_id FROM picks WHERE league_id = $LEAGUE_ID AND ceremony = $previous_ceremony";
										$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($result)!=0){
											$pick_array = array();
											while($this_pick = mysqli_fetch_array($result,MYSQLI_NUM)){
												//$curr_cont_id = (int)$this_pick[0]; // 0 index for contestant_id queried
												//$CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] = $CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] + 1; // add pick count 
												$pick_array[] = (int)$this_pick[0];
											}
											$CountedValues = array_count_values($pick_array);
											
											// GET MOST PICKS
											arsort($CountedValues, SORT_NUMERIC);
											$most_picks_ids = array();
											$most_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$most_picks_ids[] = $key;
												$most_picks_vals[] = $val;
											}

											// GET LEAST PICKS
											asort($CountedValues, SORT_NUMERIC);
											$least_picks_ids = array();
											$least_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$least_picks_ids[] = $key;
												$least_picks_vals[] = $val;
											}
										}

										// DISPLAY TOP 3 MOST PICKED
										for($i=0;$i<3;$i++){
											if($i===0){
												$statcat = ' statcategory';
												$identifier = 'MOST PICKED';
											}else{
												$statcat = '';
												$identifier = '';
											}
											$ind = $most_picks_ids[$i]-1;
											?>
											<tr>
												<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
												<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
												<td class="col-md-4"><?php echo $most_picks_vals[$i]?> picks</td>
											</tr>
										<?php
										}

										// DISPLAY 1 LEAST PICKED
										for($i=0;$i<1;$i++){
											if($i===0){
												$statcat = ' statcategory';
												$identifier = 'LEAST PICKED';

											}else{
												$statcat = '';
												$identifier = '';
											}
											$ind = $least_picks_ids[$i]-1;
											?>
											<tr>
												<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
												<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
												<td class="col-md-4"><?php echo $least_picks_vals[$i]?> picks</td>
											</tr>
										<?php


										}
										?>
										<!--
											<tr>
												<td class="col-md-5 statcategory">MOST PICKED</td>
												<td class="col-md-3 contestantname">Jordan</td>
												<td class="col-md-4">7 picks</td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">James T.</td>
												<td class="col-md-4">7 picks</td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Luke</td>
												<td class="col-md-4">6 picks</td>
											</tr>
											<tr>
												<td class="col-md-5 statcategory">LEAST PICKED</td>
												<td class="col-md-3 contestantname">Chad</td>
												<td class="col-md-4">2 picks</td>
											</tr>
											-->
											<tr>
												<td class="col-md-5 statcategory">DARK HORSE</td>
												<td class="col-md-3 contestantname">Evan</td>
												<td class="col-md-4"></td>
											</tr>
											<tr>
												<td class="col-md-5 statcategory">PERFECT LINEUP</td>
												<td class="col-md-3 contestantname">Julia</td>
												<td class="col-md-4"></td>
											</tr>
											
										</tbody>
									</table>
									<p class="tabletitle">All-time:</p>
									<table>
										<tbody>
										<?php
										// CALCULATE MOST PICKED FOR LEAGUE IN ALL WEEKS
										$query = "SELECT contestant_id FROM picks WHERE league_id = $LEAGUE_ID";
										$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
										if(mysqli_num_rows($result)!=0){
											$pick_array = array();
											while($this_pick = mysqli_fetch_array($result,MYSQLI_NUM)){
												//$curr_cont_id = (int)$this_pick[0]; // 0 index for contestant_id queried
												//$CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] = $CONTESTANT_ID_NUM_PICKS[$curr_cont_id-1] + 1; // add pick count 
												$pick_array[] = (int)$this_pick[0];
											}
											$CountedValues = array_count_values($pick_array);
											
											// GET MOST PICKS
											arsort($CountedValues, SORT_NUMERIC);
											$most_picks_ids = array();
											$most_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$most_picks_ids[] = $key;
												$most_picks_vals[] = $val;
											}

											// GET LEAST PICKS
											asort($CountedValues, SORT_NUMERIC);
											$least_picks_ids = array();
											$least_picks_vals = array();
											foreach($CountedValues as $key => $val){ 
												$least_picks_ids[] = $key;
												$least_picks_vals[] = $val;
											}
										}
										?>
											
											<?php
											// DISPLAY TOP 3 MOST PICKED
											for($i=0;$i<3;$i++){
												if($i===0){
													$statcat = ' statcategory';
													$identifier = 'MOST PICKED';
												}else{
													$statcat = '';
													$identifier = '';
												}
												$ind = $most_picks_ids[$i]-1;
												?>
												<tr>
													<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
													<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
													<td class="col-md-4"><?php echo $most_picks_vals[$i]?> picks</td>
												</tr>
											<?php
											}

											// DISPLAY 1 LEAST PICKED
											for($i=0;$i<1;$i++){
												if($i===0){
													$statcat = ' statcategory';
													$identifier = 'LEAST PICKED';

												}else{
													$statcat = '';
													$identifier = '';
												}
												$ind = $least_picks_ids[$i]-1;
												?>
												<tr>
													<td class=<?php echo '"col-md-5' .$statcat. '"';?>><?php echo $identifier;?></td>
													<td class="col-md-3 contestantname"><?php echo $CONTESTANT_NAME_ARRAY[$ind];?></td>
													<td class="col-md-4"><?php echo $least_picks_vals[$i]?> picks</td>
												</tr>
											<?php


											}
											?>
										<!--
											<tr>
												<td class="col-md-5 statcategory">MOST PICKED</td>
												<td class="col-md-3 contestantname">Jordan</td>
												<td class="col-md-4">24 picks</td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Luke</td>
												<td class="col-md-4">23 picks</td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Derek</td>
												<td class="col-md-4">21 picks</td>
											</tr>
											<tr>
												<td class="col-md-5 statcategory">LEAST PICKED</td>
												<td class="col-md-3 contestantname">Coley</td>
												<td class="col-md-4">2 picks</td>
											</tr>
											-->
											<tr>
												<td class="col-md-5 statcategory">PERFECT LINEUP</td>
												<td class="col-md-3 contestantname">Jacob</td>
												<td class="col-md-4"></td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Julia</td>
												<td class="col-md-4"></td>
											</tr>
											<tr>
												<td class="col-md-5"></td>
												<td class="col-md-3 contestantname">Terence</td>
												<td class="col-md-4"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!--</div> end of container -->
		</div><!-- end of container fluid -->
	<?php
	}else{
	?>
		<?php
		if($IS_MOBILE)
		{
		?>
		<div class="container-fluid">
			<div class="container">
				<div class="row text-center preview-cta">
					<h1 class="preview-title">Start playing today!</h1>
					<p>Sign up or login to start playing The Bach League</p>
					<a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#"><button class="btn btn-pink preview-btn">SIGN UP</button></a>
					<a class="login" data-toggle="modal" data-target="#loginmodal" href="#"><button class="btn btn-pinkoutline preview-btn">LOGIN</button></a>
				</div>
				<div class="row">
					<h2 class="how-title text-center">How does the league dashboard work?</h2>
					<div class="col-md-3">
						<div class="row text-center">
							<img class="preview-img mobile-preview" src="img/previewleaguemobile1.png" alt="league preview" style="width: 90%;"/>
						</div>
						<div class="row feature">
							<img src="img/1.svg" alt="1" /><span class="feature-title">Standings</span><p class="feature-description">The standings are updated immediately after the west coast episode airs so you can see who stands victorious.</p>
						</div>
						<div class="row text-center">
							<img class="preview-img mobile-preview" src="img/previewleaguemobile2.png" alt="league preview" style="width: 90%;"/>
						</div>
						<div class="row feature">
							<img src="img/2.svg" alt="2" /><span class="feature-title">Announcements</span><p class="feature-description">League commissioners can post league announcements here. Site-wide announcements will also be posted here to make sure leagues know about things like needing to pick for two ceremonies in one week.</p>
						</div>
						<div class="row text-center">
							<img class="mobile-preview" src="img/previewleaguemobile3.png" alt="league preview" style="width: 90%;"/>
						</div>
						<div class="row feature">	
							<img src="img/3.svg" alt="3" /><span class="feature-title">Latest blog post</span><p class="feature-description">See a preview of the latest blog post; usually a recap of that week's episode.</p>
						</div>
						<div class="row text-center">
							<img class="mobile-preview" src="img/previewleaguemobile4.png" alt="league preview" style="width: 90%;"/>
						</div>
						<div class="row feature">	
							<img src="img/4.svg" alt="4" /><span class="feature-title">Awesome stats</span><p class="feature-description">We calculate site-wide and league stats so you can see how contestants are doing and how you compare to others.</p>
						</div>
					</div>
					<div class="col-md-9">
						<img class="preview-img" src="" alt="league preview" style="width: 90%;"/>
					</div>
				</div>
			</div>
		</div>
		<?php 
		}else{ 
		?>

		<div class="container-fluid">
			<div class="container">
				<div class="row text-center preview-cta">
					<h1 class="preview-title">Start playing today!</h1>
					<p>Sign up or login to start playing The Bach League</p>
					<a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#"><button class="btn btn-pink preview-btn">SIGN UP</button></a>
					<a class="login" data-toggle="modal" data-target="#loginmodal" href="#"><button class="btn btn-pinkoutline preview-btn">LOGIN</button></a>
				</div>
				<div class="row">
					<h2 class="how-title text-center">How does the league dashboard work?</h2>
					<div class="col-md-3">
						<div class="row feature">
							<img src="img/1.svg" alt="1" /><span class="feature-title">Standings</span><p class="feature-description">The standings are updated immediately after the west coast episode airs so you can see who stands victorious.</p>
						</div>
						<div class="row feature">
							<img src="img/2.svg" alt="2" /><span class="feature-title">Announcements</span><p class="feature-description">League commissioners can post league announcements here. Site-wide announcements will also be posted here to make sure leagues know about things like needing to pick for two ceremonies in one week.</p>
						</div>
						<div class="row feature">
							<img src="img/3.svg" alt="3" /><span class="feature-title">Latest blog post</span><p class="feature-description">See a preview of the latest blog post; usually a recap of that week's episode.</p>
						</div>
						<div class="row feature">
							<img src="img/4.svg" alt="4" /><span class="feature-title">Awesome stats</span><p class="feature-description">We calculate site-wide and league stats so you can see how contestants are doing and how you compare to others.</p>
						</div>
					</div>
					<div class="col-md-9">
						<img class="preview-img" src="img/previewleague.svg" alt="league preview" style="width: 90%;"/>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	<?php
	}
	?>
	
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
	
</body>
</html>