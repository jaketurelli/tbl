<?php
include('get_SESSION.php');

if(isset($_POST['user_list'])) {
	if(!empty($_POST['user_list'])){
		$user_list = $_POST['user_list'];
		foreach($user_list as $user_id) {
			$removed_league_id = -$LEAGUE_ID; // set league id to the negative value (so can rejoin easily)
			
			// REMOVE LEAGUE ID FROM USER
			$query = "UPDATE user SET league_id = $removed_league_id WHERE user_id = $user_id AND league_id = $LEAGUE_ID";
			$removeUser = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
			
			// REMOVE LEAGUE ID FROM SCORE
			$query = "UPDATE score SET league_id = $removed_league_id WHERE user_id = $user_id AND league_id = $LEAGUE_ID";
			$removeScore = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
			
			// REMOVE LEAGUE ID FROM PICKS
			$query = "UPDATE picks SET league_id = $removed_league_id WHERE user_id = $user_id AND league_id = $LEAGUE_ID";
			$removePicks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
    	}
    }
}

$_SESSION['COMMISSIONER_TAB'] = 4; // remove user is tab 4
header('Location: commissioner.php');
exit();

?>