<?php
include('get_SESSION.php');

include('functions.php');

$league_name  = $_POST['leaguename'];
$league_pword = $_POST['leaguepassword'];
$league_code  = $_POST['leaguecode'];

if(!$_POST['joinleague']) {
	echo "<script>alert('Please enter values for league name and password.');
				 window.location.href='createjoin.php';
					</script>";
} else {
	if(!empty($_POST['leaguecode'])){
	// USER JOINING LEAGUE VIA EMAILED LEAGUE CODE
		$query = "SELECT * FROM league_join_code WHERE user_email like '$EMAIL' AND code = $league_code";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		if (mysqli_num_rows($result)==0){
			echo "<script>alert('Code is not valid.');
					 window.location.href='createjoin.php';
						</script>";
		}else{
			$league_join_data = mysqli_fetch_array($result);
			$league_id = $league_join_data['league_id'];
			$query = "UPDATE user SET league_id = $league_id WHERE user_id = $USER_ID";
			$joinLeague = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));

			$query = "DELETE FROM league_join_code WHERE user_email like '$EMAIL' AND code = $league_code";
			$clearRow = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));

		}
	}else{
		$query = "SELECT * FROM `league` WHERE `name` LIKE '$league_name' ";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		$league = mysqli_fetch_array($result);
		if (mysqli_num_rows($result)==0){
			echo "<script>alert('That league name does not exist.');
					 window.location.href='createjoin.php';
						</script>";
		}else{
			$pswd_hash2compare = $league['password'];
			if(password_verify($league_pword,$pswd_hash2compare )){
				$league_id = $league['league_id'];
				$commissioner_id = $league['commissioner_id'];
				$query = "UPDATE user SET league_id = $league_id WHERE user_id = $USER_ID";
				$updateUserLeague = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
				// echo "<script>window.location.href='league.php';</script>";
			}else{
				echo "<script>alert('League name and password do not match.');
					 window.location.href='createjoin.php';
						</script>";

			}
		}
	}

	// SET DEFUALT PICKS FOR ANY CEREMONY NOT LOCKED (ALPHABETICAL SELECTION)
	$query = "SELECT * FROM ceremony";
	$ceremony_query = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

	if(mysqli_num_rows($ceremony_query) != 0){
		foreach($ceremony_query as $curr_ceremony){
			// get lock time
			$curr_lock_time = $curr_ceremony['lock_time'];
			$curr_ceremony_num = $curr_ceremony['ceremony_number'];
			$curr_ceremony_picks = $curr_ceremony['number_picks'];

			$curr_lock_time = strtotime($curr_lock_time);
			if($curr_lock_time > $CURRENT_TIME){
				$query = "SELECT * FROM picks WHERE user_id = $USER_ID AND league_id = $league_id AND ceremony = $curr_ceremony_num";
				$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
				
				if(mysqli_num_rows($result) == 0){
					for($i = 1; $i <= $curr_ceremony_picks; $i++ ){
						$query = "INSERT INTO picks(pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $USER_ID, $curr_ceremony_num, $league_id, $i , $i, 0)";
						$update_picks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
					}
				}
			}
		}
	}

	calculateUserScores($dbc);

	calculatePickPercent($dbc);

	setSessionVariables($dbc, $USER_ID);
	
	echo "<script>window.location.href='league.php';</script>";
}

?>