<?php
require_once("../includes/connection.php");

include('functions.php');

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
calculateUserScores($dbc);

calculatePickPercent($dbc);


header('Location: admin.php');
exit();

?>