<?php
	include('get_SESSION.php');
	$_SESSION['CURRENT_PAGE'] = 'contestants.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>

<script type="text/javascript" src="overlay.js"></script>
<script src="jquery.tablesorter.min.js"></script>
<!-- <script src="main.js"></script> -->
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
	$nav_page_id = 6;
	include('navbar_content.php');
	?>
	<!-- NAVIGATION PANE END -->

	<div id="contestants-info" class="container-fluid">
		<div class="container">
			<!-- <div class="row contestant-content">
				<div class="col-md-12">
					<h3>Meet this season's contestants</h3>
					<a id="collapse-init-ex" class="pull-right" href="#">+ Expand all</a>
					<a id="collapse-init-col" class="pull-right" href="#">- Collapse all</a>
				</div>
				
			</div> -->
			<div class="row contestant-content">
				<div class="col-md-12">
					<table id="contestant-table" class="table table-condensed">
						<thead>
							<tr>
								<th></th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Hometown</th>

								<?php 
								//if(!$IS_MOBILE){ 
								?> 

									<th>Occupation</th>
									<th>Age</th>
									<th>Height</th>
									<th>More</th>

								<?php
								//}
								?>

							</tr>
						</thead>
						<tbody id="accordion" aria-multiselectable="true">
						    
						<?php
							$query = "SELECT * FROM contestants";
							$results = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
							while($contestant_data = mysqli_fetch_array($results)){
								$this_id = $contestant_data['contestant_id'];
								$this_first_name = $contestant_data['first_name'];
								$this_last_name = $contestant_data['last_name'];
								$this_aka = $contestant_data['aka'];
								$this_age = $contestant_data['age'];
								$this_occupation = $contestant_data['occupation'];
								$this_height = $contestant_data['height'];
								$this_image_dir = '"' .  $contestant_data['image_dir'] . '"' ;
								$this_city = $contestant_data['city'];
								$this_bio = '"' . $contestant_data['bio'] . '"';
								$this_search = '"' . $contestant_data['search'] . '"';

								$rowID          = '"row'       . $this_id . '"';
								$collapseID     = '"collapse'  . $this_id . '"';
								$collapseTarget = '"#collapse' . $this_id . '"';
						?>
						    <tr class="collapsed" id= <?php echo $rowID?> data-toggle="collapse" data-parent="#accordion" data-target=<?php echo $collapseTarget;?> aria-expanded="true" aria-controls=<?php echo $collapseID;?>>
								<!-- <td><span class="arrow"><button style="display:none;"></button></span></td> -->
								<td><a href=<?php echo $this_image_dir?> class="preview"><img style="width:50px;" src=<?php echo $this_image_dir?> alt=<?php echo '"' . $this_first_name . '"'?> /></a></td>
								<td><?php echo $this_first_name;?></td>
								<td><?php echo $this_last_name;?></td>
								<td><?php echo $this_city;?></td>
								<?php 
								//if(!$IS_MOBILE){ 
								?>
									<td><?php echo $this_occupation;?></td>
						         	<td><?php echo $this_age;?></td>
						         	<td><?php echo $this_height;?></td>
						         	<td><a href=<?php echo $this_bio?> target="_blank">Full Bio</a><br><a href=<?php echo $this_search?> target="_blank">Google Search</a></td>
								<?php
								//}
								?>
						    </tr>
						    <!-- <tr>
						    	<td aria-labelledby=<?php echo $rowID?> colspan="6" class="hiddenRow">
						    		<div id=<?php echo $collapseID?> class="accordion-body collapse">
						      			<div class="row row-padding">
						      			<?php 
										if(!$IS_MOBILE){ 
										?>
											<div class="col-md-1"></div>
						    				<div class="col-sm-4 col-md-3">
						    					<img style="width:100px;" class="img-responsive" src=<?php echo $this_image_dir?> alt=<?php echo '"' . $this_first_name . '"'?> />
						    				</div>
						    				<div class="col-sm-4 col-md-3">
						    					<p><?php echo $this_aka?></p>
						      					<p><b>City:</b> <?php echo $this_city?></p>
						      				</div>
						      				<div class="col-sm-4 col-md-3">
						      					<a href=<?php echo $this_bio?> target="_blank">Full ABC Bio</a><br>
						      					<a href=<?php echo $this_search?> target="_blank">Google Search</a>
						      				</div>
						      				<div class="col-md-2"></div>
										<?php
										}else{
										?>
						    				<div class="col-xs-6">
						    					<img style="width:70px;" class="img-responsive" src=<?php echo $this_image_dir?> alt=<?php echo '"' . $this_first_name . '"'?> />
						    					<p><?php echo $this_aka?></p>
						      					<p><b>City:</b> <?php echo $this_city?></p>
						      				</div>
						      				<div class="col-xs-6">
						      					<a href=<?php echo $this_bio?> target="_blank">Full ABC Bio</a><br>
						      					<a href=<?php echo $this_search?> target="_blank">Google Search</a>
						      				</div>
						      			</div>
						      			<?php
						      			}
						      			?>
						      		</div>
						  		</td>
						    </tr> -->

						<?php
							}
						?>
						</tbody>
					</table>
				</div>
				
			</div><!-- end of row -->
		</div><!-- end of container -->
	</div><!-- end of container-fluid -->
	<?php
	include('footer.html');
	include('login-signup-content.html');
	?>	
	<script type="text/javascript">
	$(document).ready(function(){
		$('#contestant-table').tablesorter();

	    $('#collapse-init-ex').click(function () {
	            $('.accordion-body').collapse('show');
	            $('.collapsed').attr('data-toggle', '');
	    });
	    $('#collapse-init-col').click(function () {
	            $('.accordion-body').collapse('hide');
	            $('.collapsed').attr('data-toggle', 'collapse');
        });

	});
	
	</script>
</body>
</html>
