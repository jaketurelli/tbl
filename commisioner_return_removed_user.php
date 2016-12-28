<?php
include('get_SESSION.php');

if(isset($_POST['user_list'])) {
	if(!empty($_POST['user_list'])){
		$user_list = $_POST['user_list'];
		foreach($user_list as $user_id) {
			$return_league_id = abs($LEAGUE_ID); // set league id back to positive
			$NEGATIVE_LEAGUE_ID = -$LEAGUE_ID;
			// ADD POSTIIVE LEAGUE ID BACK TO USER
			$query = "UPDATE user SET league_id = $return_league_id WHERE user_id = $user_id AND league_id = $NEGATIVE_LEAGUE_ID";
			$addUser = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
			
			// ADD POSTIIVE LEAGUE ID BACK TO SCORE
			$query = "UPDATE score SET league_id = $return_league_id WHERE user_id = $user_id AND league_id = $NEGATIVE_LEAGUE_ID";
			$addScore = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
			
			// ADD POSTIIVE LEAGUE ID BACK TO PICKS
			$query = "UPDATE picks SET league_id = $return_league_id WHERE user_id = $user_id AND league_id = $NEGATIVE_LEAGUE_ID";
			$addPicks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
    	}
    }
}

$_SESSION['COMMISSIONER_TAB'] = 4; // remove/add user is tab 4
header('Location: commissioner.php');
exit();

?>