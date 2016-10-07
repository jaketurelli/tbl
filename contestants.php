<?php
	include('get_SESSION.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
<script type="text/javascript" src="overlay.js"></script>
<script src="jquery.tablesorter.min.js"></script>
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
		<div class="navbar-collapse overlay navbar-right">
			<ul class="nav navbar-nav nav-pills">
				<li><a href="league.php">League</a></li>
				<li><a href="lineup.php">Lineup</a></li>
				<li><a href="trashtalk.php">Trash Talk</a></li>
				<li class="active"><a href="contestants.php">Contestants</a></li>
				<li><a href="blog.php">Blog</a></li>
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
	<div id="contestants-info" class="container-fluid">
		<div class="container">
			<div class="row text-center contestant-content">
				<div class="col-md-12">
					<h3>Meet this season's contestants</h3>
					<a id="collapse-init-ex" class="pull-right" href="#">+ Expand all</a>
					<a id="collapse-init-col" class="pull-right" href="#">- Collapse all</a>
				</div>
				
			</div>
			<div class="row contestant-content">
				<div class="col-md-12">
					<table id="contestant-table" class="table table-condensed">
						<thead>
							<tr>
								<th class="arrow-col"></th>
								<th>First Name</th>
								<th>Last Name</th>
								<?php 
								if(!$IS_MOBILE){ 
								?>
									<th>Occupation</th>
									<th>Age</th>
									<th>Height</th>
								<?php
								}
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
								<td><span class="arrow"><button style="display:none;"></button></span></td>
								<td><?php echo $this_first_name;?></td>
								<td><?php echo $this_last_name;?></td>
								<?php 
								if(!$IS_MOBILE){ 
								?>
									<td><?php echo $this_occupation;?></td>
						         	<td><?php echo $this_age;?></td>
						         	<td><?php echo $this_height;?></td>
								<?php
								}
								?>
						    </tr>
						    <tr>
						    	<td aria-labelledby=<?php echo $rowID?> colspan="6" class="hiddenRow"><!--removed colspan="6"-->
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
						    </tr>


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
