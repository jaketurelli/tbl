<?php
include('get_SESSION.php');

include('functions.php');
// Unescape the string values in the JSON array
$tableData = stripcslashes($_POST['lineupTableData']);

// Decode the JSON array
$tableData = json_decode($tableData,TRUE);

$submission_ceremony = $tableData[0]['ceremony_number'];

// now $tableData can be accessed like a PHP array
$query = "SELECT * FROM picks WHERE user_id = $USER_ID AND league_id = $LEAGUE_ID AND ceremony = $submission_ceremony";

$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
$checkPicks = mysqli_fetch_array($result);
if (mysqli_num_rows($result)>0){

	for($i = 1; $i <= count($tableData);  $i++){
		$curr_contestant_id = $tableData[$i-1]['contestant_id'];
		$query = "UPDATE picks SET contestant_id = '$curr_contestant_id' WHERE `picks`.`user_id` = '$USER_ID' AND `picks`.`ceremony` = '$submission_ceremony' AND `picks`.`league_id` = '$LEAGUE_ID' AND `picks`.`pick_order` = '$i' ";

		debug_to_console( $query );
		$updatePick = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	}
}else{

	for($i = 1; $i <= count($tableData);  $i++){
		$curr_contestant_id = $tableData[$i-1]['contestant_id'];
		$query = "INSERT INTO picks (pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $USER_ID, $submission_ceremony, $LEAGUE_ID, $curr_contestant_id, $i, 0)";
		       //"INSERT INTO picks (pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $USER_ID,      $curr_ceremony_num, $league_id,     $i ,    $i,    0)";	

		$updatePick = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	}
}


// CALCULATE PICK COUNT AND PICK PERCENTAGE FOR EACH CONTESTANT
calculatePickPercent($dbc);


// FOR DEBUGGING
function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}
?>