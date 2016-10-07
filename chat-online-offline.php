<?php
include('get_SESSION.php');

if($IS_MOBILE){
?>
<div class="row">
	<div class = "col-xs-6">
<?php
}
?>
<h5>online</h5>

<ul id="online-list">
<?php
	$query = "SELECT alias FROM user WHERE league_id = $LEAGUE_ID AND is_logged_in = 1 ORDER BY alias ASC";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	if (mysqli_num_rows($result)==0){
		if($LEAGUE_ID == -1){
			echo "<li>Join a league to trash talk</li>";
		}else{
			echo "<li>Nobody online at the moment</li>";
		}
	}else{
		while($user_on = mysqli_fetch_array($result)){
			echo '<li class="online-list-item"><p>' . $user_on['alias'] . "</p></li>";
		}							
	}
?>
</ul>

<?php
if($IS_MOBILE){
?>
	</div>
	<div class = "col-xs-6">
<?php
}
?>
<h5>offline</h5>
<ul id="offline-list">
<?php
	$query = "SELECT alias FROM user WHERE league_id = $LEAGUE_ID AND is_logged_in = 0 ORDER BY alias ASC";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	if (mysqli_num_rows($result)==0){
		// do nothing
	}else{
		if($LEAGUE_ID == -1){

		}else{
			while($user_on = mysqli_fetch_array($result)){
				echo '<li class="offline-list-item"><em>' . $user_on['alias'] . "</em></li>";
			}		
		}

	}
?>
</ul>

<?php
if($IS_MOBILE){
?>
	</div>
</div>
<?php
}
?>