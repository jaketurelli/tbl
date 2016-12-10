<?php
	include('get_SESSION.php');
	date_default_timezone_set("America/Los_Angeles");
?>
<html>
<head>
<?php
include('header_content.html');
?>
</head>
<body>
	<nav class="navbar nonhome">
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="overlay" data-target=".navbar-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="navbar-brand navbar-brand-centered" href="index.php">The Bach League</a>
			<ul class="nav pull-right" style="text-align:right">
				<?php 
				if($IS_SIGNED_IN){
				?>
					<li><a class="logout" href="logout.php">logout</a></li>
				<?php
				}else{
				?>
					<li style="display:none" class="loginnav"><a data-toggle="modal" data-target="#loginmodal" href="#">login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class=" navbar-collapse overlay">
			<ul class="nav navbar-nav nav-pills">
				<li><a href="index.php">home</a></li>
				<li><a href="league.php">league</a></li>
				<li><a href="lineup.php">lineup</a></li>
				<li><a href="trashtalk.php">trash talk</a></li>
				<li><a href="contestants.php">contestants</a></li>
				<li><a href="blog.php">blog</a></li>
				<li><a href="contact-us.php">test contact</a></li>
				<li class="active"><a href="admin.php">admin</a></li>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li><a class="logout" href="logout.php">logout</a></li>
			</ul>
		</div>
	</nav>	
	<form action = "admin_add-ceremony.php" method = "post" >
		<ul>
			<label>Ceremony Number</label>
			<!--<input type = "text" id = "ceremony_num" name = "ceremony_num" />-->
			<select name="ceremony_num">
				<option value=1>1</option>
				<option value=2>2</option>
				<option value=3>3</option>
				<option value=4>4</optionf>
				<option value=5>5</option>
				<option value=6>6</option>
				<option value=7>7</option>
				<option value=8>8</option>
				<option value=9>9</option>
				<option value=10>10</option>
				<option value=11>11</option>
			</select><br>
		</ul>
		<ul>
			<label>Lock Date:</label>
			<!--<input type = "text" id = "lock_time" name = "lock_time" />-->
			<select name="lock_time_month">
				<option value=1>Jan</option>
				<option value=2>Feb</option>
				<option value=3>Mar</option>
				<option value=4>Apr</option>
				<option value=5>May</option>
				<option value=6>Jun</option>
				<option value=7>Jul</option>
				<option value=8>Aug</option>
				<option value=9>Sep</option>
				<option value=10>Oct</option>
				<option value=11>Nov</option>
				<option value=12>Dec</option>
			</select>
			<select name="lock_time_day">
				<option value=1>1</option>
				<option value=2>2</option>
				<option value=3>3</option>
				<option value=4>4</option>
				<option value=5>5</option>
				<option value=6>6</option>
				<option value=7>7</option>
				<option value=8>8</option>
				<option value=9>9</option>
				<option value=10>10</option>
				<option value=11>11</option>
				<option value=12>12</option>
				<option value=13>13</option>
				<option value=14>14</option>
				<option value=15>15</option>
				<option value=16>16</option>
				<option value=17>17</option>
				<option value=18>18</option>
				<option value=19>19</option>
				<option value=20>20</option>
				<option value=21>21</option>
				<option value=22>22</option>
				<option value=23>23</option>
				<option value=24>24</option>
				<option value=25>25</option>
				<option value=26>26</option>
				<option value=27>27</option>
				<option value=28>28</option>
				<option value=29>29</option>
				<option value=30>30</option>
				<option value=31>31</option>
			</select>
			<select name="lock_time_year">
				<option value=2016>2016</option>
				<option value=2017>2017</option>
			</select><label>Time: </label>
			<select name="lock_time_hour">
				<option value=0>00</option>
				<option value=1>01</option>
				<option value=2>02</option>
				<option value=3>03</option>
				<option value=4>04</option>
				<option value=5>05</option>
				<option value=6>06</option>
				<option value=7>07</option>
				<option value=8>08</option>
				<option value=9>09</option>
				<option value=10>10</option>
				<option value=11>11</option>
				<option value=12>12</option>
				<option value=13>13</option>
				<option value=14>14</option>
				<option value=15>15</option>
				<option value=16>16</option>
				<option value=17>17</option>
				<option value=18>18</option>
				<option value=19>19</option>
				<option value=20>20</option>
				<option value=21>21</option>
				<option value=22>22</option>
				<option value=23>23</option>
				<option value=24>24</option>
			</select> : 
			<select name="lock_time_minute">
				<option value=00>00</option>
				<option value=15>15</option>
				<option value=30>30</option>
				<option value=45>45</option>
			</select><label> : 00  PST</label>

		</ul>
		<ul>
			<label>Num Picks</label>
			<select name="num_picks">
				<option selected = "selected"></option>
				<option value=1>1</option>
				<option value=2>2</option>
				<option value=3>3</option>
				<option value=4>4</option>
				<option value=5>5</option>
				<option value=6>6</option>
				<option value=7>7</option>
				<option value=8>8</option>
				<option value=9>9</option>
				<option value=10>10</option>
				<option value=11>11</option>
				<option value=12>12</option>
				<option value=13>13</option>
				<option value=14>14</option>
				<option value=15>15</option>
				<option value=16>16</option>
				<option value=17>17</option>
				<option value=18>18</option>
				<option value=19>19</option>
				<option value=20>20</option>
				<option value=21>21</option>
				<option value=22>22</option>
				<option value=23>23</option>
				<option value=24>24</option>
				<option value=25>25</option>
			</select>
		</ul>
		<ul>
			<input type = "submit" name = "submit" value = "Click to Add Ceremony" />
		</ul>
	</form>
	<h3>Ceremonies</h3>
		<table> 
		<tr>
			<th align = "center">Ceremony Number</th>
			<th align = "center">Number of Picks</th>
			<th align = "center">Lock Date/Time</th>
			<th align = "center">Update</th>
			<th align = "center">Delete</th>
			<th align = "center">Current?</th>
		</tr>
	<?php
	//date_default_timezone_set('America/Los_Angeles');
	$query = "SELECT * FROM ceremony ORDER BY ceremony_number DESC";
	$ceremonies = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	if (mysqli_num_rows($ceremonies)>0){
		while($this_ceremony = mysqli_fetch_array($ceremonies)){

			$this_ceremony_num = $this_ceremony['ceremony_number'];
			$this_num_picks = $this_ceremony['number_picks'];
			$this_lock_time = $this_ceremony['lock_time'];
			$this_is_current = $this_ceremony['is_current'];
			if ($this_is_current==1){
				$is_current_text = 'checked';
			}else{
				$is_current_text = '';
			}

			//var_dump($this_lock_time);
			$this_date = strtotime($this_lock_time);
			//$this_date = date_format($this_lock_time, 'Y-m-d H:i:s');
			$this_hour = date('H', $this_date);
			$this_minute = date('i', $this_date);
			$this_year = date('Y', $this_date);
			$this_month = date('m', $this_date);
			$this_day = date('d', $this_date);

			//echo $this_month;

			if($this_month == 1){
				$this_month_str = 'Jan';
			}elseif($this_month == 2){
				$this_month_str = 'Feb';
			}elseif($this_month == 3){
				$this_month_str = 'Mar';
			}elseif($this_month == 4){
				$this_month_str = 'Apr';
			}elseif($this_month == 5){
				$this_month_str = 'May';
			}elseif($this_month == 6){
				$this_month_str = 'Jun';
			}elseif($this_month == 7){
				$this_month_str = 'Jul';
			}elseif($this_month == 8){
				$this_month_str = 'Aug';
			}elseif($this_month == 9){
				$this_month_str = 'Sep';
			}elseif($this_month == 10){
				$this_month_str = 'Oct';
			}elseif($this_month == 11){
				$this_month_str = 'Nov';
			}elseif($this_month == 12){
				$this_month_str = 'Dec';
			}

			?>
	<form action = "admin_add-ceremony.php" method = "post" >
		<tr>
			<td>
				<span> <?php echo $this_ceremony_num?> </span>
				<input type = "hidden" name = "ceremony_num" value = <?php echo $this_ceremony_num?> />
			</td>
			<td>
				<select name="num_picks">
					<option selected = "selected"><?php echo $this_num_picks ?></option>
					<option value=1>1</option>
					<option value=2>2</option>
					<option value=3>3</option>
					<option value=4>4</option>
					<option value=5>5</option>
					<option value=6>6</option>
					<option value=7>7</option>
					<option value=8>8</option>
					<option value=9>9</option>
					<option value=10>10</option>
					<option value=11>11</option>
					<option value=12>12</option>
					<option value=13>13</option>
					<option value=14>14</option>
					<option value=15>15</option>
					<option value=16>16</option>
					<option value=17>17</option>
					<option value=18>18</option>
					<option value=19>19</option>
					<option value=20>20</option>
					<option value=21>21</option>
					<option value=22>22</option>
					<option value=23>23</option>
					<option value=24>24</option>
					<option value=25>25</option>
				</select>
			</td>
			<td>
				<select name="lock_time_hour">
					<option selected = "selected"><?php echo $this_hour ?></option>
					<option value=0>00</option>
					<option value=1>01</option>
					<option value=2>02</option>
					<option value=3>03</option>
					<option value=4>04</option>
					<option value=5>05</option>
					<option value=6>06</option>
					<option value=7>07</option>
					<option value=8>08</option>
					<option value=9>09</option>
					<option value=10>10</option>
					<option value=11>11</option>
					<option value=12>12</option>
					<option value=13>13</option>
					<option value=14>14</option>
					<option value=15>15</option>
					<option value=16>16</option>
					<option value=17>17</option>
					<option value=18>18</option>
					<option value=19>19</option>
					<option value=20>20</option>
					<option value=21>21</option>
					<option value=22>22</option>
					<option value=23>23</option>
					<option value=24>24</option>
				</select>

				<select name="lock_time_minute">
					<option selected = "selected"><?php echo $this_minute ?></option>
					<option value=00>00</option>
					<option value=15>15</option>
					<option value=30>30</option>
					<option value=45>45</option>
				</select>
				<label> on </label>
				<select name="lock_time_month">
					<option selected = "selected" value = <?php echo $this_month?>><?php echo $this_month_str ?></option>
					<option value=1>Jan</option>
					<option value=2>Feb</option>
					<option value=3>Mar</option>
					<option value=4>Apr</option>
					<option value=5>May</option>
					<option value=6>Jun</option>
					<option value=7>Jul</option>
					<option value=8>Aug</option>
					<option value=9>Sep</option>
					<option value=10>Oct</option>
					<option value=11>Nov</option>
					<option value=12>Dec</option>
				</select>
				<label> - </label>
				<select name="lock_time_day">
					<option selected = "selected"><?php echo $this_day ?></option>
					<option value=1>1</option>
					<option value=2>2</option>
					<option value=3>3</option>
					<option value=4>4</option>
					<option value=5>5</option>
					<option value=6>6</option>
					<option value=7>7</option>
					<option value=8>8</option>
					<option value=9>9</option>
					<option value=10>10</option>
					<option value=11>11</option>
					<option value=12>12</option>
					<option value=13>13</option>
					<option value=14>14</option>
					<option value=15>15</option>
					<option value=16>16</option>
					<option value=17>17</option>
					<option value=18>18</option>
					<option value=19>19</option>
					<option value=20>20</option>
					<option value=21>21</option>
					<option value=22>22</option>
					<option value=23>23</option>
					<option value=24>24</option>
					<option value=25>25</option>
					<option value=26>26</option>
					<option value=27>27</option>
					<option value=28>28</option>
					<option value=29>29</option>
					<option value=30>30</option>
					<option value=31>31</option>
				</select>
				<label> - </label>
				<select name="lock_time_year">
					<option selected = "selected"><?php echo $this_year ?></option>
					<option value=2016>2016</option>
					<option value=2017>2017</option>
				</select>
				<label> PST </label>
			</td>
			<td>
				<input type = "submit" name = "update" value = "Update" />
			</td>
			<td>
				<input type = "submit" name = "delete" value = "Delete" />
			</td>
			<td>
				<input type = "radio" onclick="is_current_update(this, <?php echo $this_ceremony_num;?> )" name = "is_current" <?php echo $is_current_text ?> >Is Current<br>
			</td>
		</tr>	
		</form>	
		<tr>
			<td>
				<h5>Eliminated this round:</h5>
				<ul>
					<?php
						$query = "SELECT name FROM contestants WHERE eliminated = $this_ceremony_num";
						$results = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
						foreach($results as $this_contestant){
							echo "<li>".$this_contestant['name'] ."</li>";
						}
					?>
					
				</ul>
				<h5>Previously eliminated:</h5>
				<ul>
					<?php
						$query = "SELECT name FROM contestants WHERE eliminated > 0 AND eliminated <  $this_ceremony_num";
						$results = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
						foreach($results as $this_contestant){
							echo "<li>".$this_contestant['name'] ."</li>";
						}
					?>
					
				</ul>
			</td>
			<td>
				<h5>Survived this round:</h5>
				<ul>
					<?php
						$query = "SELECT name FROM contestants WHERE  eliminated >  $this_ceremony_num OR eliminated =  0";
						$results = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
						foreach($results as $this_contestant){
							echo "<li>".$this_contestant['name'] ."</li>";
						}
					?>
				</ul>
			</td>
		</tr>
		<tr>
			<td>
				<!--http://getbootstrap.com/javascript/#modals-related-target -->
				<button type = "button" data-ceremony = <?php echo $this_ceremony_num?> data-toggle="modal" data-target="#setContestants"  href="">Select Contestants</button>
				<div class="modal fade" id="setContestants" tabindex="-1" role="dialog" aria-labelledby="SignUpModal" aria-hidden="true">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4>Contestants</h4>	
							</div>
							<form action="admin_select_contestants.php" method="post">
								<div class="modal-body">
									<label class="c-input c-checkbox">
									<h5>Select the currently standing contestants eliminated this round:</h5>
										<?php

											$query = "SELECT * FROM `contestants` WHERE `eliminated` = 0";
											$results = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
								

											while($contestants = mysqli_fetch_array($results)){
												echo "<input type='checkbox' name = 'contestant_ids_in[]' value = " . $contestants['contestant_id'] . ">";
												echo "<span class='c-indicator'></span>";
												echo $contestants['name'] . "<br>";
											}
										?>
									<h5>Select eleiminated contestants to be back in the running:</h5>
										<?php

											$query = "SELECT * FROM `contestants` WHERE `eliminated` > 0";
											$results = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
								

											while($contestants = mysqli_fetch_array($results)){
												echo "<input type='checkbox' name = 'contestant_ids_out[]' value = " . $contestants['contestant_id'] . ">";
												echo "<span class='c-indicator'></span>";
												echo $contestants['name'] . "<br>";
											}
										?>
									</label> 
									<input class = "modal-ceremony" type = "hidden" name = "ceremony_num">
									<fieldset class="form-group text-center">
										<input type="submit" class="btn btn-wide" name="submit" value= 'Submit' />
									</fieldset>
								</div>
								<div class = "modal-ceremony">
									<input  type = "hidden" name = "ceremony_num">
								</div>
							</form>
						</div><!-- modal-content -->
					</div><!-- modal-dialog -->
				</div><!-- signupmodal -->

				<script>
					$('#setContestants').on('show.bs.modal', function (event) {
					  var button = $(event.relatedTarget) // Button that triggered the modal
					  var recipient = button.data('ceremony') // Extract info from data-* attributes
					  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					  var modal = $(this)
					  //modal.find('.modal-title').text('New message to ' + recipient)
					  modal.find('.modal-ceremony input').val(recipient)
					})
				</script>
				

			</td>
		</tr>
	<?php
		}
	}else{

	}
	?>
	</table>
</body>

<script>

function is_current_update(elmnt,ceremony_number) {
    $.ajax({
		type: "POST",
		url: "admin_update_current_ceremony.php",
		data: "current_ceremony=" + ceremony_number,
		success: function(msg){
			console.log(msg);
		}
	});
	location.reload();


}

</script>
</html>