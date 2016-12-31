<?php
function setSessionVariables($dbc, $USER_ID){
	$query = "SELECT * FROM user WHERE user_id = $USER_ID";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);

	$_SESSION['USER_ID']      = $user['user_id'];
	$_SESSION['EMAIL']        = $user['email'];
	$_SESSION['ALIAS']        = $user['alias'];
	$_SESSION['LEAGUE_ID']    = $user['league_id'];
	$_SESSION['IS_ADMIN']     = $user['is_admin'];
	$_SESSION['IS_SIGNED_IN'] = true;
	$_SESSION['fb_id']        = $user['fb_id']; // testing purposes

	$league_id = $user['league_id'];
	if($league_id > 0){
		$league_id = $user['league_id'];
		$query = "SELECT * FROM `league` WHERE `league_id` = $league_id";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		$league = mysqli_fetch_array($result);

		$commish_id = $league['commissioner_id'];
		$query = "SELECT * FROM `user` WHERE `user_id` = $commish_id";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		$commish = mysqli_fetch_array($result);

		$_SESSION['LEAGUE_NAME']  = $league['name'];
		$_SESSION['COMMISSIONER'] = $commish['alias'];
		$_SESSION['COMMISH_ID']   = $commish_id;

		$query = "SELECT ceremony_number FROM ceremony WHERE is_current = 1";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		if(mysqli_num_rows($result)==0){
			$current_ceremony = mysqli_fetch_array($result);
			$_SESSION['current_ceremony']   = $current_ceremony['ceremony_number'];
		}else{
			$_SESSION['current_ceremony']   = 0;
		}
	}
}
?>