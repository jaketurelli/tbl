<?php
require_once("../includes/connection.php");
$query = "SELECT * FROM picks";
$picks = mysqli_query($dbc, $query);
foreach($picks as $pick){
	$pick_ind      = $pick['pick_ind'];
	$ceremony      = $pick['ceremony'];
	$contestant_id = $pick['contestant_id'];

	// UPDATE THOSE THAT GAINED POINTS
	$query = "SELECT contestant_id FROM contestants WHERE contestant_id = $contestant_id AND (`contestants`.`eliminated` = 0 OR `contestants`.`eliminated` > $ceremony)";
	$scored = mysqli_query($dbc, $query);
	if(mysqli_num_rows($scored)!=0){
		$query = "UPDATE picks SET score = 1 WHERE `picks`.`pick_ind` = $pick_ind";
		mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	}else{
		
	}

	// UPDATE THOSE THAT DID NOT GAIN POINTS
	$query = "SELECT contestant_id FROM contestants WHERE contestant_id = $contestant_id AND (eliminated > 0 AND eliminated <= $ceremony)";
	$not_scored = mysqli_query($dbc, $query);
	if(mysqli_num_rows($not_scored)!=0){
		$query = "UPDATE picks SET score = 0 WHERE `picks`.`pick_ind` = $pick_ind";
		mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	} 
}

// Update score table for all users
$query = "SELECT * FROM user WHERE league_id > 0";
$users = mysqli_query($dbc, $query);
foreach($users as $user){
	$user_id = $user['user_id'];
	$league_id = $user['league_id'];

	$query = "SELECT score FROM picks WHERE user_id =  $user_id AND league_id = $league_id";
	$scores = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	$total_score = 0;
	foreach($scores as $score){
		$this_score = $score['score'];
		$total_score = $total_score+$this_score;
	}

	$query = "SELECT * FROM score WHERE user_id = $user_id AND league_id = $league_id";
	$this_user = mysqli_query($dbc, $query);
	if(mysqli_num_rows($this_user)==0){
		$query = "INSERT INTO score (id, user_id, league_id, total_score) VALUES (NULL, $user_id, $league_id, $total_score)";
		mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	}else{
		$query = "UPDATE score SET total_score = $total_score WHERE `score`.`user_id` = $user_id AND `score`.`league_id` = $league_id";
		mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	}



}


header('Location: admin.php');
exit();

?>