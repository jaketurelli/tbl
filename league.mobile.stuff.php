			<div class="container-fluid">
				<div class="row">
					<div id="tiledcontent" class="col-sm-12">
						<div class="row text-center">
							<h4>Welcome to the <?php echo $LEAGUE_NAME ?> dashboard!</h4>
							<p>Your league commmissioner is: <?php echo $COMMISSIONER ?></p>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="tile">
									<h3>Site Announcement</h3>
										<p> Hi friends and family! You are using the beta version of The Bach League so it's the bare minimum of features and functionality. Jake and Kacy are in the process of adding features and will let you all know when new changes are pushed to the website! If you have any questions, comments, or feedback, feel free to email/text us.</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="tile">
									<h3>league announcement</h3>
									<?php 
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
									<h3>standings</h3>
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
												$standing_counter=1;
												$counter = 1;
												while($curr_user = mysqli_fetch_array($scores)){
													$ind = $curr_user['user_id'];
													$curr_alias = $TABLE_USER_ALIAS_ARRAY[$ind];
													$curr_score = $curr_user['total_score'];
													if ($counter==1){
														$curr_standing = $standing_counter;
													}else{
														if($previous_score==$curr_score){
															$curr_standing = $standing_counter;
														}else{
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
									<table class="mobile-table">
										<tbody>
											<tr>
												<td class="statcategory">MOST PICKED</td>
												<td>Jordan</td>
												<td>128 picks</td>
											</tr>
											<tr>
												<td></td>
												<td>James T.</td>
												<td>126 picks</td>
											</tr>
											<tr>
												<td></td>
												<td>Luke</td>
												<td>122 picks</td>
											</tr>
											<tr>
												<td class="statcategory">LEAST PICKED</td>
												<td>Chad</td>
												<td>43 picks</td>
											</tr>
											<tr>
												<td class="statcategory">DARK HORSE</td>
												<td>Evan</td>
												<td></td>
											</tr>
										</tbody>
									</table>
									<hr>
									<p class="tabletitle">All-time:</p>
									<table class="mobile-table">
										<tbody>
											<tr>
												<td class="statcategory">MOST PICKED</td>
												<td>Jordan</td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>Luke</td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>Derek</td>
												<td></td>
											</tr>
											<tr>
												<td class="statcategory">LEAST PICKED</td>
												<td>Coley</td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="tile">
									<h3>league stats</h3>
									<p class="tabletitle">Latest week:</p>
									<table class="mobile-table">
										<tbody>
											<tr>
												<td class="statcategory">MOST PICKED</td>
												<td>Jordan</td>
												<td>7 picks</td>
											</tr>
											<tr>
												<td></td>
												<td>James T.</td>
												<td>7 picks</td>
											</tr>
											<tr>
												<td></td>
												<td>Luke</td>
												<td>6 picks</td>
											</tr>
											<tr>
												<td class="statcategory">LEAST PICKED</td>
												<td>Chad</td>
												<td>2 picks</td>
											</tr>
											<tr>
												<td class="statcategory">DARK HORSE</td>
												<td>Evan</td>
												<td></td>
											</tr>
											<tr>
												<td class="statcategory">PERFECT LINEUP</td>
												<td>Julia</td>
												<td></td>
											</tr>
										</tbody>
									</table>
									<hr>
									<p class="tabletitle">All-time:</p>
									<table class="mobile-table">
										<tbody>
											<tr>
												<td class="statcategory">MOST PICKED</td>
												<td>Jordan</td>
												<td>24 picks</td>
											</tr>
											<tr>
												<td></td>
												<td>Luke</td>
												<td>23 picks</td>
											</tr>
											<tr>
												<td></td>
												<td>Derek</td>
												<td>21 picks</td>
											</tr>
											<tr>
												<td class="statcategory">LEAST PICKED</td>
												<td>Coley</td>
												<td>2 picks</td>
											</tr>
											<tr>
												<td class="statcategory">PERFECT LINEUP</td>
												<td>Jacob</td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>Julia</td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>Terence</td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="tile">
									<h3>eliminations</h3>
									<p>Ceremony 3:</p>
									<div class="row">
										<div class="col-md-6">
											<img class="contestantimg" src="img/profilesq.png" /><p class="contestantname">Daniel</p>
										</div>
										<div class="col-md-6">
											<img class="contestantimg" src="img/profilesq.png" /><p class="contestantname">Vinny</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<img class="contestantimg" src="img/profilesq.png" /><p class="contestantname">James F.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!--</div> end of container -->
		</div><!-- end of container fluid -->