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
<?php
include('header_content.html');
?>
	<!-- <link rel="stylesheet" href="jquery-ui.css">
	<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
	<script type="text/javascript" src="jquery.json.min.js"></script> 
	<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script> -->
	<script type="text/javascript" src="bootstrap-tabcollapse.js"></script>
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
				<li><a href="league.php">LEAGUE</a></li>
				<li class="active"><a href="lineup.php">LINEUP</a></li>
				<li><a href="trashtalk.php">TRASH TALK</a></li>
				<li><a href="contestants.php">CONTESTANTS</a></li>
				<li><a href="blog.php">BLOG</a></li>
				<?php
				if($IS_ADMIN){
				?>
					<li><a href="admin.php">ADMIN</a></li>
				<?php
				}
				?>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li><a class="logout" href="logout.php">LOGOUT</a></li>
				<?php
				}else{
				?>
					<li style="border-right: 1px solid rgba(255,255,255,0.5); text-align: right"><a class="signup"  data-toggle="modal" data-target="#signupmodal" href="#">SIGN UP</a></li>
					<li style="text-align:right!important"><a class="login" data-toggle="modal" data-target="#loginmodal" href="#">LOGIN</a></li>
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
								

<!--  <div class="container" style="margin-top: 50px;">
    <ul id="myTab" class="nav nav-tabs" style="margin-bottom: 15px;">
        <li><a href="#home" data-toggle="tab">Home</a></li>
        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#ceremony2" data-toggle="tab">@fat</a></li>
                <li><a href="#ceremony1" data-toggle="tab">@mdo</a></li>

            </ul>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content" >
        <div class="tab-pane fade" id="home">
            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
        </div>
        <div class="tab-pane fade in active" id="profile">
            <p>Light Blue - is a next generation admin template based on the latest Metro design. There are few reasons we want to tell you, why we have created it:
                We didn't like the darkness of most of admin templates, so we created this light one. We didn't like the high contrast of most of admin templates, so we created this unobtrusive one.
                We searched for a solution of how to make widgets look like real widgets, so we decided that deep background - is what makes widgets look real.</p>
            <button class="btn btn-lg btn-primary">Button with click event attached</button>
        </div>
        <div class="tab-pane fade" id="dropdown3">
            <p>Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
        </div>
        <div class="tab-pane fade" id="dropdown4">
            <p>They sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
        </div>
    </div>
</div> -->
							</div>
						</div>
						<div class="row row-bg">
							<div class="col-xs-8">
								<ul id="myTab" class="nav nav-tabs">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="selected">Ceremony <?php echo $CURRENT_CEREMONY ?></span> <b class="caret"></b></a>
										<ul class="dropdown-menu" id="ceremonytabs">
											
                							<!--<li><a href="#ceremony1" data-toggle="tab">@mdo</a></li>-->
											<?php
												if ($LEAGUE_ID > -1){
													foreach($TABLE_CEREMONY as $this_ceremony){
														$this_ceremony_num = $this_ceremony['ceremony_number'];
														if($this_ceremony_num == $CURRENT_CEREMONY){
															$this_nav_class = ' = "active"';

														}else{
															$this_nav_class = '';
														}?>
														<li class <?php echo $this_nav_class ?>><a href = <?php echo '"#ceremony' . $this_ceremony_num . '"'?> data-toggle="tab">Ceremony <?php echo $this_ceremony_num;?></a></li>
													<?php
													}
												}
											?>
										</ul>
									</li>
								</ul> -->
							</div>
							<div class="col-xs-4">
								<div class="pull-right changes-saved changes-hidden"><p >Changes saved!</p></div>

							
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="tab-content" id="ceremonypages">
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
												$curr_disable_class = ' disabled';
											}else{
												$curr_dragDrop_class = 'dragdrop';
												$curr_button_text = '"Submit Lineup for Ceremony ' . $this_ceremony_num . '" ' ; 
												$curr_button_disable = '';
												$curr_disable_class = '';
											}
							   											
											if($this_ceremony_num == $CURRENT_CEREMONY){
												$this_tab_class = 'tab-pane active';
											}else{
												$this_tab_class = 'tab-pane';
											}
										
									?>	
								
											
											<div class=<?php echo '"'. $this_tab_class. '"'?> id= <?php echo '"ceremony' . $this_ceremony_num . '"'?>>  
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
																					<button class=<?php echo '"move-btn btn' . $curr_disable_class . '"'?> id = <?php echo '"' . $this_ceremony_num . '-' . $curr_contestant_id . '"'; ?> >MOVE</button>
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
																			<button class=<?php echo '"move-btn btn' . $curr_disable_class . '"'?> id = <?php echo '"' . $this_ceremony_num . '-' . $curr_contestant_id . '"'; ?> >MOVE</button>
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
	<script type="text/javascript">
	$(document).ready(function() { 
		$('.dropdown-menu > li > a').click(function(){
			$('.dropdown-menu > li > a').not(this).each(function() {
		 		$(this).closest('li').removeClass("active");
		 	});
		});


		$('#myTab').tabCollapse();

		$(function(){
			$(document).on('click','.move-btn',function(){
				if($(this).hasClass('here')){
					var move_id=$('.grey').prop("id");
					var replacewith_id=this.id;

					var div1=$('#'+move_id); 
					var div2=$('#'+replacewith_id);

					var tdiv1=div1.clone();
					var tdiv2=div2.clone();

					div1.replaceWith(tdiv2);
					div2.replaceWith(tdiv1);

					$('.move-btn').each(function(){
						$(this).removeClass('here').text('MOVE');
						$(this).removeClass('grey');
					});

					//$('.move-btn').removeClass('here').text('MOVE');
					//$('.move-btn').removeClass('grey');
					//$(this).removeClass('here');
					submitPicks();
					$('.changes-saved').addClass('changes-display').delay(1500).fadeTo(500,0, function(){
						$(this).css('visibility','hidden');
					});
					

				} 
				else if($(this).hasClass('grey')){
					$('.move-btn').each(function(){
						$(this).removeClass('here').text('MOVE');
						$(this).removeClass('grey').blur();
					});
				}
				else {
					$(this).addClass('grey');
					$('.move-btn').not(this).each(function() {
						$(this).addClass('here');
						$(this).text('HERE');
					});
				}
			});
		});
		
			


		// $('.move-btn').click(function() {
		// 	if($(this).hasClass('here')){
		// 		var move_id=$('.grey').prop("id");
		// 		var replacewith_id=this.id;

		// 		var div1=$('#'+move_id); 
		// 		var div2=$('#'+replacewith_id);

		// 		var tdiv1=div1.clone();
		// 		var tdiv2=div2.clone();

		// 		div1.replaceWith(tdiv2);
		// 		div2.replaceWith(tdiv1);

		// 		$('.move-btn').each(function(){
		// 			$(this).removeClass('here').text('MOVE');
		// 			$(this).removeClass('grey');
		// 		})

		// 		//$('.move-btn').removeClass('here').text('MOVE');
		// 		//$('.move-btn').removeClass('grey');
		// 		//$(this).removeClass('here');
		// 		submitPicks();
		// 		$('.changes-saved').addClass('changes-display').delay(1500).fadeTo(500,0, function(){
		// 			$(this).css('visibility','hidden');
		// 		});
				

		// 	} 
		// 	else {
		// 		$(this).addClass('grey');
		// 		$('.move-btn').not(this).each(function() {
		// 			$(this).addClass('here');
		// 			$(this).text('HERE');
		// 		});
		// 	}
		// });
		// $('.dropdown-menu > li > a').click(function(){
		// 	$(this).closest('li').addClass("active");
		//	$('.dropdown-menu > li > a').not(this).each(function() {
		// 		$(this).closest('li').removeClass("active");
		// 	});
		// });
		$('.dropdown-menu a').click(function(){
		    $('#selected').text($(this).text());
		});
	});
	</script>

	<script type = "text/javascript">
		// https://www.fourfront.us/blog/store-html-table-data-to-javascript-array
		function submitPicks()
		{
			var lineupTableData;
			//lineupTableData = $.toJSON(storeLineupTblValues());
			lineupTableData = JSON.stringify(storeLineupTblValues());

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
		    	tempString = $(tr).attr('id');
		    	splitString = tempString.split("-"); // ceremony_number-contestant_id
		    	contestant_id = splitString[1];
		        lineupTableData[row]={
		            "contestant_id" : contestant_id,
		            "ceremony_number": ceremonyNum,
		        }    
		    }); 

		    // alert("Your picks have been submitted.")
		    return lineupTableData;
		}

		
	</script>
</body>
</html>