<?php
include('get_SESSION.php');

$contestant_id   = $_GET['contestant_id'];
$ceremony_number = $_GET['ceremony_number'];

// GET ARRAY OF USER'S PICKED CONTESTANTS
$query = "SELECT contestant_id FROM picks WHERE user_id = $USER_ID AND ceremony = $ceremony_number AND league_id = $LEAGUE_ID ORDER BY contestant_id ASC";
$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
$pickedContestants = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	array_push($pickedContestants, $row['contestant_id']);
}


// GET ARRAY OF ALL CONTESTANTS (TO DETERMINE WHO IS BENCHED)
$query = "SELECT contestant_id FROM contestants ORDER BY contestant_id ASC";
$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
$allContestants = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	array_push($allContestants, $row['contestant_id']);
}


// DETERMINE BENCHED PLAYERS TO SHOW IN MODAL
$benchedContestants = array_diff($allContestants, $pickedContestants);


// MODAL CONTESTANTS IS SELECTED CONTESTANT, THEN BENCHED PLAYERS
$modalContestants = $benchedContestants;
array_unshift($modalContestants , $contestant_id); // PREPEND SELECTED CONTESTANT

// GET ALL TABLE INFORMATION ON EACH CONTESTANT (SELECTED AND BENCHED)
$modalArray = array();
foreach($modalContestants as $cntst_id){
	$query = "SELECT * FROM contestants WHERE contestant_id = $cntst_id";
	$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	array_push($modalArray, mysqli_fetch_array($result));
}

// ECHO MODAL CONTESTANTS AS JSON
echo json_encode($modalArray);


?>