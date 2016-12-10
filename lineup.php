<?php

	include('get_SESSION.php');
	
	if($LEAGUE_ID != -1){
		$query_ceremony    = "SELECT * FROM ceremony ORDER BY ceremony_number ASC";
		$query_contestants = "SELECT * FROM contestants ORDER BY eliminated ASC";
		$query_picks       = "SELECT * FROM picks WHERE user_id = $USER_ID AND league_id = $LEAGUE_ID ORDER BY pick_order ASC";
		
		//var_dump($query_picks);
		//exit();
		$TABLE_CEREMONY    = mysqli_query($dbc, $query_ceremony) or die ("Error in query: $query_ceremony " . mysqli_error($dbc));
		$TABLE_CONTESTANTS = mysqli_query($dbc, $query_contestants) or die ("Error in query: $query_contestants " . mysqli_error($dbc));
		$TABLE_PICKS       = mysqli_query($dbc, $query_picks) or die ("Error in query: $query_picks " . mysqli_error($dbc));

		$TABLE_CONTESTANTS_ELIM_ARRAY   = array();
		$TABLE_CONTESTANTS_NAME_ARRAY   = array();
		$TABLE_CONTESTANTS_AKA_ARRAY    = array();
		$TABLE_CONTESTANTS_AGE_ARRAY    = array();
		$TABLE_CONTESTANTS_HEIGHT_ARRAY = array();
		$TABLE_CONTESTANTS_IMG_ARRAY = array();

		while ($row = mysqli_fetch_array($TABLE_CONTESTANTS, MYSQL_NUM)) {
			$ind =  $row[0];
		    $TABLE_CONTESTANTS_ELIM_ARRAY[$ind]   = $row[7];  
		    $TABLE_CONTESTANTS_NAME_ARRAY[$ind]   = $row[1];  
		    $TABLE_CONTESTANTS_AKA_ARRAY[$ind]    = $row[2];  
		    $TABLE_CONTESTANTS_AGE_ARRAY[$ind]    = $row[3];  
		    $TABLE_CONTESTANTS_HEIGHT_ARRAY[$ind] = $row[5];  
		    $TABLE_CONTESTANTS_IMG_ARRAY[$ind]    = 'img/lineup/' . $row[6];  
		}
		$TABLE_CEREMONY_ARRAY = array();
		if(mysqli_num_rows($TABLE_CEREMONY)==0){

		}else{
			while ($row = mysqli_fetch_array($TABLE_CEREMONY, MYSQL_NUM)) {
				$ind =  $row[1]; // ceremony number, NOT index
			    $TABLE_CEREMONY_ARRAY[$ind][0] =  $row[2];
			    $this_lockout_time = $row[3];
			    $this_lockout_time_unix = strtotime($this_lockout_time);
			    $TABLE_CEREMONY_ARRAY[$ind][1] =  $this_lockout_time_unix;
			    $TABLE_CEREMONY_ARRAY[$ind][2] =  $row[4];
			}
		}
		/*var_dump($TABLE_CEREMONY_ARRAY);
		var_dump($CURRENT_TIME);
		exit();
		*/
	}
?>

<!DOCTYPE html>
<html>
<head>
<!--
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,300|Lato:400,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The Bach League</title>
	<link rel="shortcut icon" href="favicon.ico" type="image">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 -->

<?php
include('header_content.html');
if(!$IS_MOBILE){
?>
	<!-- THIS IS NECESSARY FOR DRAGGABLE/DROPPABLE ON DESKTOP BUT DISABLES MODAL STUFF FOR MOBILE.
		 DO NOT INCLUDE IF ON MOBILE -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<?php
}
?>
	<link rel="stylesheet" href="jquery-ui.css">
	<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
	<script type="text/javascript" src="jquery.json.min.js"></script> 
	<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>
</head>
<body>
	<nav class="navbar nonhome">
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
				<li><a href="league.php">LEAGUE</a></li>
				<li class="active"><a href="lineup.php">LINEUP</a></li>
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
		<div id="lineup-bg" class="container-fluid">
			<div id="lineup-content" class="container">
				<div class="row row-bg">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div id="lineup-instructions">
									<h3>Set your lineup</h3>
									<p>Select the ceremony tab you'd like to set your lineup for. Drag and drop the contestants you want to put in the lineup and who you want to sit on the bench for that ceremony. You can also set your lineup ahead of time for future ceremonies.</p>
								</div>
								
							</div>
						</div>
						<!-- <table>
							<tbody>
								<tr id=<?php echo '"' . $LEAGUE_ID . '"' ?>><td><button>butt</button></td><td><?php echo '"' . $LEAGUE_ID . '"' ?></td><td><img src="img/derek.jpg" /></td></tr>
							
								<tr id=<?php echo '"' . $LEAGUE_ID . '1"'?>><td><button>butt2</button></td><td><img src="img/grant.jpg" /></td><td><?php echo '"' . $LEAGUE_ID . '"'
						?></td></tr>
							</tbody>
						</table> -->
						<div class="row row-bg">
							<div class="col-md-12">
								<nav class="ceremony-nav">
									<ul class="nav nav-tabs" id="ceremonytabs">
										<?php
											if ($LEAGUE_ID > -1){
												?>
												<li><a id = "ceremony-tab">Ceremony</a></li>
												<?php
												foreach($TABLE_CEREMONY as $this_ceremony){
													$this_ceremony_num = $this_ceremony['ceremony_number'];
													if($this_ceremony_num == $CURRENT_CEREMONY){
														$this_nav_class = 'nav-item active';
													}else{
														$this_nav_class = 'nav-item';
													}?>

													<li class = <?php echo  '"' . $this_nav_class . '"' ?>><a data-target =  <?php echo '#ceremony' . $this_ceremony_num?> data-toggle = "tab" href = "#"><?php 
													if($this_ceremony_num == 1){
														echo $this_ceremony_num;
													}else{
														echo $this_ceremony_num;
													}
													?></a></li>

													<?php
												}
											}
										?>
									</ul>
								</nav>
								<div class="tab-content" id = "ceremonypages">
									<?php
									if ($LEAGUE_ID > -1){
										foreach($TABLE_CEREMONY as $this_ceremony){
											$this_ceremony_num = $this_ceremony['ceremony_number'];

											// CHECK TO SEE IF CEREMONY PICKS IS LOCKED OUT 
											$curr_lockout_time = $TABLE_CEREMONY_ARRAY[$this_ceremony_num][1];
											if($curr_lockout_time < $CURRENT_TIME){
												// TABEL_CEREMONY_ARRAY[ceremony_index][1] where 1 is index for lockout time
												$curr_dragDrop_class = '';
												$curr_button_text = '"Ceremony ' . $this_ceremony_num . ' locked" ' ; 
												$curr_button_disable = ' disabled';
											}else{
												$curr_dragDrop_class = 'dragdrop';
												$curr_button_text = '"Submit Lineup for Ceremony ' . $this_ceremony_num . '" ' ; 
												$curr_button_disable = '';
											}
							   											
											if($this_ceremony_num == $CURRENT_CEREMONY){
												$this_tab_class = 'tab-pane active';
											}else{
												$this_tab_class = 'tab-pane';
											}
										
									?>	
								
											
											<div class=<?php echo '"'. $this_tab_class. '"'?> id= <?php echo '"ceremony' . $this_ceremony_num . '"'?>>  
												<div class="row">
													<div class="col-md-12">
														<input class="btn btn-pink btn-submit" name = "submitPicks" onclick = "submitPicks()" type = "button"  value = <?php echo $curr_button_text . $curr_button_disable ?> >
													</div>
												</div>
												<table><tbody>
												<tr id=<?php echo '"' . $this_ceremony_num . 'poo"' ?>><td><button>butt</button></td><td><?php echo '"' . $this_ceremony_num . '"' ?></td><td>poop</td></tr>
												</tbody></table>

												<table><tbody>
												<tr id=<?php echo '"' . $this_ceremony_num . '1poo"'?>><td><button>butt2</button></td><td>poop</td><td><?php echo '"' . $this_ceremony_num . '"'
						?></td></tr></tbody></table>
												<table id= <?php echo '"roster_ceremony' . $this_ceremony_num . '"'?> class="table lineup-table">
													<thead>
														<tr>
															<th class="td-center">Move</th>
															<th class="td-center" data-html="true" data-toggle="tooltip" title="Contestants still on the show have an Active status. The contestants who have been sent home are on the IR.">Status</th>
															<th>Player</th>
														<?php
														if(!$IS_MOBILE){ ?>
															<th>AKA</th>
															<th class="td-right">Age</th>
															<th class="td-center">Height</th>
															<th class="td-center" data-html="true" data-toggle="tooltip" title="Number of times the contestant has been picked all season.">Picked</th>
															<th class="td-center" data-html="true" data-toggle="tooltip" title="Percentage of lineups with this contestant.">Starting %</th>
														<?php
														} ?>
														</tr>
													</thead>
													<tbody id=<?php echo '"lineup_ceremony' . $this_ceremony_num . '"'?>>

													
														<?php
															$bookkeep_picked= array();
															foreach($TABLE_PICKS as $this_pick){
																$curr_picks_ceremony = $this_pick['ceremony']; // get ceremony of the current pick row

																// show selected by user for this ceremony 
																if($curr_picks_ceremony == $this_ceremony_num){
																	$curr_contestant_id = $this_pick['contestant_id'];

																	//var_dump($this_pick);
																	$bookkeep_picked[] = $curr_contestant_id;
																	if(count($bookkeep_picked) <= $TABLE_CEREMONY_ARRAY[$this_ceremony_num][1]){
																		$curr_is_elim = $TABLE_CONTESTANTS_ELIM_ARRAY[$curr_contestant_id];
																		$curr_name    = $TABLE_CONTESTANTS_NAME_ARRAY[$curr_contestant_id];
																		$curr_aka     = $TABLE_CONTESTANTS_AKA_ARRAY[$curr_contestant_id] ;
							    										$curr_age     = $TABLE_CONTESTANTS_AGE_ARRAY[$curr_contestant_id]  ;
							   											$curr_height  = $TABLE_CONTESTANTS_HEIGHT_ARRAY[$curr_contestant_id] ; 
							   											$curr_img     = $TABLE_CONTESTANTS_IMG_ARRAY[$curr_contestant_id];

																		if($curr_is_elim == 0 || $curr_is_elim > $this_ceremony_num){ 
																			$curr_status = 'A';
																		}else{
																			$curr_status = 'IR';
																		}
																		?>

																			<tr class=<?php echo '"' . $curr_dragDrop_class . '"'?> id = <?php echo '"' . $this_ceremony_num . '-' . $curr_contestant_id . '"'; ?>>
																				<td class="td-center">
																				<?php if($IS_MOBILE){ ?>
																					<button class="move-btn" data-toggle="modal" id = <?php echo '"' . $this_ceremony_num . '-' . $curr_contestant_id . '"'; ?> data-target="#movemodal">MOVE</a>
																				<?php } else { ?>
																					<span class="glyphicon glyphicon-menu-hamburger"></span>
																				<?php } ?>
																				</td>
																				<td class="td-center"><?php echo $curr_status ?></td>
																				<td><img class = "lineup-img" src= <?php echo '"' . $curr_img . '"' ?> /><?php echo $curr_name ?></td> 
																			<?php
																			if(!$IS_MOBILE){ ?>
																				<td><?php echo $curr_aka ?></td>
																				<td class="td-right"><?php echo $curr_age  ?></td>
																				<td class="td-right"><?php echo $curr_height  ?></td>
																				<td class="td-right"><?php echo '109'  ?></td>
																				<td class="td-right"><?php echo '78%'  ?></td>
																			<?php 
																			} ?>
																			</tr> 

																		<?php
																	}

																}
															}
														?>
													</tbody>

														

													<tbody id="bench-title"><tr><th>Bench</th></tr></tbody>
													<tbody id="bench">
														<?php
														//var_dump($bookkeep_picked);
						
															// show those not seleted by user for this ceremony 
															foreach($TABLE_CONTESTANTS as $this_contestant){

																$curr_contestant_id = $this_contestant['contestant_id'];
																if(!in_array($curr_contestant_id, $bookkeep_picked)){

																	$curr_name   = $this_contestant['name'];
																	$curr_aka    = $this_contestant['aka'];
																	$curr_age    = $this_contestant['age'];
																	$curr_height = $this_contestant['height'];
																	$curr_img    = 'img/lineup/' . $this_contestant['image_dir'];

																	$curr_is_elim = $this_contestant['eliminated'];
																	if($curr_is_elim == 0 || $curr_is_elim > $this_ceremony_num){ 
																		$curr_status = 'A';
																	}else{
																		$curr_status = 'IR';
																	}
																	?>
																	<tr class=<?php echo '"' . $curr_dragDrop_class . '"'?> id = <?php echo '"' . $this_ceremony_num . '-' . $curr_contestant_id . '"';?>>
																		<td class="td-center">
																		<?php if($IS_MOBILE){ ?>
																			<button class="move-btn" data-toggle="modal" id = <?php echo '"' . $this_ceremony_num . '-' . $curr_contestant_id . '"'; ?> data-target="#movemodal">MOVE</button>
																		<?php } else { ?>
																			<span class="glyphicon glyphicon-menu-hamburger"></span>
																		<?php } ?>
																		</td>
																			<td class="td-center"><?php echo $curr_status ?></td>
																			<td><img class = "lineup-img" src= <?php echo '"' . $curr_img . '"' ?> /><?php echo $curr_name ?></td> 
																		<?php
																		if(!$IS_MOBILE){ ?>
																			<td><?php echo $curr_aka ?></td>
																			<td class="td-right"><?php echo $curr_age  ?></td>
																			<td class="td-right"><?php echo $curr_height  ?></td>
																			<td class="td-right"><?php echo '109'  ?></td>
																			<td class="td-right"><?php echo '78%'  ?></td>
																		<?php
																		} ?>
																	</tr> <?php
																}
															}
														?>
													</tbody>
												</table>
											</div>
									<?php
											}
										}
									?>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-3 row-bg">
						<div class="ceremony-schedule">
							<table class="table">
								<thead>
									<tr>
										<th class="td-center">Ceremony</th>
										<th>Air Date</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="td-center">1</td>
										<td>May 23</td>
									</tr>
									<tr>
										<td class="td-center">2</td>
										<td>May 30</td>
									</tr>
									<tr>
										<td class="td-center">3</td>
										<td>June 6</td>
									</tr>
									<tr>
										<td class="td-center">4</td>
										<td>June 7</td>
									</tr>
									<tr>
										<td class="td-center">5</td>
										<td>June 20</td>
									</tr>
									<tr>
										<td class="td-center">6</td>
										<td>June 27</td>
									</tr>
									<tr>
										<td class="td-center">7</td>
										<td>July 11</td>
									</tr>
									<tr>
										<td class="td-center">8</td>
										<td>July 18</td>
									</tr>
									<tr>
										<td class="td-center">9</td>
										<td>July 25</td>
									</tr>
									<tr>
										<td class="td-center">10</td>
										<td>August 1</td>
									</tr>
								</tbody>
							</table>
							<small>The table above lists the ceremony number and the date we're expecting to see it air. We may change them during the season as needed; updated air dates will be in red.</small>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	<?php
	}else{
	?>
		<div class="container-fluid">
			<div class="container">
				<!--<div class="row text-center preview-title">
					<h3>trash talk</h3>
				</div>-->
				<div class="row text-center preview-cta">
					<h1 class="preview-title">Start playing The Bach League with your friends today!</h1>
					<p>Sign up or login to start playing The Bach League</p>
					<a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#"><button class="btn btn-pink preview-btn">SIGN UP</button></a>
					<a class="login" data-toggle="modal" data-target="#loginmodal" href="#"><button class="btn btn-pinkoutline preview-btn">LOGIN</button></a>
				</div>
				<div class="row">
					<h2 class="how-title text-center">How does setting your lineup work?</h2>
					<div class="col-md-3">
						<div class="row feature">
							<img src="img/1.svg" alt="1" /><span class="feature-title">Drag-and-drop</span><p class="feature-description">Drag-and-drop contestants to set your lineup and put the rest of the contestants on the bench.</p>
						</div>
						<div class="row feature">
							<img src="img/2.svg" alt="2" /><span class="feature-title">Set future lineups</span><p class="feature-description">Set your lineup for future ceremonies in case you forget.</p>
						</div>
						<div class="row feature">
							<img src="img/3.svg" alt="2" /><span class="feature-title">Stats</span><p class="feature-description">Use the stats to see who is most picked.</p>
						</div>
						<div class="row feature">
							<img src="img/4.svg" alt="2" /><span class="feature-title">Ceremony schedule</span><p class="feature-description">Know when you need to update your lineup with our rose ceremony schedule.</p>
						</div>
					</div>
					<div class="col-md-9">
						<img class="preview-img" src="img/previewlineup.svg" alt="lineup preview" style="width: 90%;"/>
					</div>
				</div>
			</div>
		</div>

	<?php
	}
	?>
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>
	<div class="modal fade" id="movemodal" tabindex="-1" role="dialog" aria-labelledby="moveContestantsModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aroa-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="moveContestantsModal">Adjust Lineup</h4>
				</div>
				<div id = "modal-replace" class="modal-body">
					
					This data is replaced by ajax
					
				</div>
			</div>
		</div>
	</div>




<!-- 	<script>
		// THIS UPDATES THE MOBILE MODAL LINEUP SELECTION HTML
		$('#movemodal').on('show.bs.modal', function(e) {
			//PASSED USER_ID, LEAGUE_ID, CEREMONY, CONTESTANT_ID IN ORDER TO PROPERLY SHOW BENCHED PLAYERS 
			// https://openenergymonitor.org/emon/node/107
			var $modal = $(this),
			contestant_id = e.relatedTarget.id;
			// QUERY CONTESTANT ID FOR STATUS, IMG, NAME
			// NEED CONTESTANT ID, USER ID, CEREMONY ID IN ORDER TO SHOW BENCHED
		    //-----------------------------------------------------------------------
		    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
		    //-----------------------------------------------------------------------
		    $.ajax({                                      
				url: 'lineup_mobile_modal.php',    	//the script to call to get data          
				type: "GET",
				data: { contestant_id:  contestant_id,
					},                        		//you can insert url argumnets here to pass to api.php
				                               		//for example "id=5&parent=6"
				dataType: 'json',             		//data format      
				success: function(data)         	//on recieve of reply
				{

				// SHOW SELECTED CONTESTANT
				var selectedStatus = "A"; // default active
				if (data[0][7] != 0) {
					selectedStatus = "IR";
				}
				var selectedImage = 'img/lineup/'+data[0][6];
				var selectedName = data[0][1];
				var htmlString = '<h4>Moving:</h4>'+
									'<table class="table lineup-table">'+
										'<tr id="m'+contestant_id+'" class="contestant-to-move">'+
											'<td class="td-center">'+selectedStatus+'</td><td><img class = "lineup-img" src="'+selectedImage+'"/>'+ selectedName+'</td>'+
										'</tr>'+
									'</table>';

				// SHOW BENCHED CONTESTANTS TO REPLACE WITH
				var status = "A"; // active by default
				// start at i=1 (2nd index) to start showing contestants other than that seleceted (index = 0)
				htmlString += 	'<h4>Replace With:</h4>'+
									'<table class="table lineup-table">';
				for (i = 1; i <= data.length-1; i++) { 
					if (data[i][7] != 0) {
						status = "IR";
					}
				    htmlString += 	'<a href="#" >'+
				    					'<tr class="swap-mobile" >'+
				    						'<td><button class="swap-mobile btn" id="m'+data[i][0]+'">SELECT</button></td><td class="td-center">'+status+'</td><td><img class = "lineup-img" src="'+'img/lineup/'+data[i][6]+'"/>'+ data[i][1]+'</td>'+
				    					'</tr>'+
				    				'</a>';
				}
				htmlString += 	"</table>";

				// UPDATE MODAL HTML
				$('#modal-replace').html(htmlString);
				}
		    });

		    $("button.swap-mobile").click(function() {

				move_id=contestant_id.slice(1);
				replacewith_id=this.id.slice(1);
				alert(move_id);
				div1=$('#1');
				div2=$('#clicked_id');

				tdiv1=div1.clone;
				tdiv2=div2.clone;

				div1.replaceWith(tdiv2);
				div2.replaceWith(tdiv1);
			});
		});
		
	</script> --> 

	<script>
	// THIS UPDATES THE MOBILE MODAL LINEUP SELECTION HTML
		$('#movemodal').on('show.bs.modal', function(e) {
			//PASSED USER_ID, LEAGUE_ID, CEREMONY, CONTESTANT_ID IN ORDER TO PROPERLY SHOW BENCHED PLAYERS 
			// https://openenergymonitor.org/emon/node/107
			var $modal = $(this),
			//contestant_id = e.relatedTarget.id;
			contestant_string = e.relatedTarget.id;
			string_split = contestant_string.split("-"); // ceremony_number-contestant_id
			ceremony_number = string_split[0];
			contestant_id = string_split[1];

			// QUERY CONTESTANT ID FOR STATUS, IMG, NAME
			// NEED CONTESTANT ID, USER ID, CEREMONY ID IN ORDER TO SHOW BENCHED
		    //-----------------------------------------------------------------------
		    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
		    //-----------------------------------------------------------------------
		    $.ajax({                                      
				url: 'lineup_mobile_modal.php',    	//the script to call to get data          
				type: "GET",
				data: { ceremony_number: ceremony_number,
						contestant_id:  contestant_id,
					},                        		//you can insert url argumnets here to pass to api.php
				                               		//for example "id=5&parent=6"
				dataType: 'json',             		//data format      
				success: function(data)         	//on recieve of reply
				{

				// SHOW SELECTED CONTESTANT
				var selectedStatus = "A"; // default active
				if (data[0][7] != 0) {
					selectedStatus = "IR";
				}
				var selectedImage = 'img/lineup/'+data[0][6];
				var selectedName = data[0][1];
				var htmlString = '<h4>Moving:</h4>'+ '<button id="test-btn">TEST</button>'+
										'<div id="m-'+ceremony_number+'-'+contestant_id+'" class="contestant-to-move">'+
											'<div>'+selectedStatus+'</div><div><img class = "lineup-img" src="'+selectedImage+'"/>'+ selectedName+'</div>'+
										'</div>'
									;

				// SHOW BENCHED CONTESTANTS TO REPLACE WITH
				var status = "A"; // active by default
				// start at i=1 (2nd index) to start showing contestants other than that seleceted (index = 0)
				htmlString += 	'<h4>Replace With:</h4>';
				for (i = 1; i <= data.length-1; i++) { 
					if (data[i][7] != 0) {
						status = "IR";
					}
				    htmlString += 	'<a href="#">'+
				    						'<div><button class="swap-mobile btn" id="m-'+ceremony_number+'-'+data[i][0]+'">SELECT</button></div><div>'+status+'</div><div><img class = "lineup-img" src="'+'img/lineup/'+data[i][6]+'"/>'+ data[i][1]+'</div>'+
				    				'</a>';
				}

				// UPDATE MODAL HTML
				$('#modal-replace').html(htmlString);
				}
		    });

		   
		});
		 
	</script>

	<script type = "text/javascript">
		// https://www.fourfront.us/blog/store-html-table-data-to-javascript-array
		function submitPicks()
		{
			var lineupTableData;
			lineupTableData = $.toJSON(storeLineupTblValues());

			$.ajax({
				type: "POST",
				url: "lineup_update_picks.php",
				data: "lineupTableData=" + lineupTableData,
				success: function(msg){
					//
				}
			});
		}

		function storeLineupTblValues()
		{
		    var lineupTableData = new Array();
		    var activeTab = $("#ceremonytabs li.active");
		    var activeCeremony = activeTab[0]['children'][0]['attributes'][0]['nodeValue'];
		    activeCeremony = activeCeremony.substr(1, activeCeremony.length-1)
		    var ceremonyNum = activeCeremony.substr("#ceremony".length-1, activeCeremony.length-1)
		    var getLineup = "#lineup_" + activeCeremony + " tr" ;

		    $(getLineup).each(function(row, tr){
		        lineupTableData[row]={
		            "contestant_id" : $(tr).attr('id'),
		            "ceremony_number": ceremonyNum,
		        }    
		    }); 

		    alert("Your picks have been submitted.")
		    return lineupTableData;
		}
	</script>
	<script type="text/javascript">
		jQuery.fn.swap = function(b) {
			b = jQuery(b)[0];
			var a = this[0];
			var t = a.parentNode.insertBefore(document.createTextNode(''), a);
			b.parentNode.insertBefore(a, b);
			t.parentNode.insertBefore(b, t);
			t.parentNode.removeChild(t);
			return this;
		};

		$('tbody').droppable().draggable();
		$(document).ready(function(){
			$(".dragdrop").draggable({
				revert: "invalid",
				axis: "y",
				helper: function(event){
					return $('<div class="drag-row"><table></table></div>').find('table').append($(event.target).closest('tr').clone()).end();
				}
			});

			$(".dragdrop").droppable({
				accept: ".dragdrop",
				activeClass: "ui-state-hover",
				hoverClass: "ui-state-active",
				drop: function( event, ui ) {
					var draggable = ui.draggable, droppable = $(this), dragPos = draggable.position(), dropPos = droppable.position();

					draggable.css({
						left: dropPos.left+'px',
						top: dropPos.top+'px'
					});
					droppable.css({
						left: dragPos.left+'px',
						top: dragPos.top+'px'
					});
					draggable.swap(droppable);
				}
			})
			$('th[data-toggle="tooltip"]').tooltip({'placement': 'top'});

			// $(".move-btn").click(function() {
			// 	$(".move-btn").removeClass("move-pressed").text("HERE").addClass("here");
			// 	$(".move-btn").parents("tr").addClass("tr-here");
			// 	$(this).addClass("move-pressed").removeClass("here").text("MOVE");
			// 	$(this).parents("tr").removeClass("tr-here").addClass("tr-pressed");
			// 	$(".here").click(function() {
			// 		var d = $(this).parents("tr");
			// 		d.swap($(".move-pressed").parents("tr"));
			// 		$(".move-btn").removeClass("move-pressed").removeClass("here").text("MOVE");
			// 		$(".move-btn").parents("tr").removeClass("tr-pressed").removeClass("tr-here");
			// })
		// })
		
		 });
		

	</script>

	<script type="text/javascript">
	$(document).ready(function(){
		$(function(){
			$(document).on("click","#test-btn",function(event){
				alert('pooooooo');
				var item1=$('#2poo');
				alert(item1);
				var item2=$('#21poo');
				var copy1=item1.clone();
				var copy2=item2.clone();
				// $("#5poo").replaceWith($("#51"));
				item1.replaceWith(copy2);
				item2.replaceWith(copy1);
			});
		});
	});

	</script>
	<script type="text/javascript">
		$(function(){
			$(document).on("click",".swap-mobile",function(event){
				// alert('boo');
				// $("#poo1").replaceWith($("#poo2"));
				var m_move_id=$("div.contestant-to-move").prop("id");
				alert(m_move_id); // m-id
				var move_id=m_move_id.split(/-(.+)/)[1];
				alert(move_id); // id
				var replacewith_id=this.id.split(/-(.+)/)[1];
				alert(replacewith_id); // id of replacement
				var div1=$('#'+move_id); 
				//var div1=$(div1_id);
				alert(div1.text());
				var div2=$('#'+replacewith_id);
				//var div2=$(div2_id);
				alert(div2.text());
				var tdiv1=div1.clone();
				var tdiv2=div2.clone();
				//var poop=div1.html();


				//div1.html(tdiv2.html());
				//div2.html(tdiv1.html());
				div1.replaceWith(tdiv2);
				div2.replaceWith(tdiv1);

				alert(tdiv1);
			})
		});
			// $(".swap-mobile").click(function() {
			// 	alert('boo');
			// 	move_id=contestant_id.slice(1);
			// 	replacewith_id=this.id.slice(1);
			// 	alert(move_id);
			// 	div1=$('#1');
			// 	div2=$('#clicked_id');

			// 	tdiv1=div1.clone;
			// 	tdiv2=div2.clone;

			// 	div1.replaceWith(tdiv2);
			// 	div2.replaceWith(tdiv1);
			// });
		// $(function(){
  //   		$(document).on("click", "#test", function(event){
  //       		alert( "GO" ); 
  //   		}); 
		// });
	</script>
</body>
</html>