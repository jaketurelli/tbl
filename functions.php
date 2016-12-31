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


function calculateUserScores($dbc){
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
			$query = "UPDATE score SET total_score = $total_score WHERE user_id = $user_id AND league_id = $league_id";
			mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
		}



	}
}

function calculatePickPercent($dbc){
	$query = "SELECT ceremony_number FROM ceremony WHERE is_current";
	$getCurrentCeremony = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	if(mysqli_num_rows($getCurrentCeremony)==0){
		$current_ceremony=0;
	}else{
		$ceremony = mysqli_fetch_array($getCurrentCeremony);
		$current_ceremony = $ceremony['ceremony_number'];
	}
	

	$query = "SELECT user_id FROM user WHERE league_id > 0";
	$getUserCount = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user_count = mysqli_num_rows($getUserCount);

	$total_selectable = $current_ceremony * $user_count;

	$query = "SELECT contestant_id FROM contestants";
	$getContestants = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

	if (mysqli_num_rows($getContestants)>0){
		while($this_contestant = mysqli_fetch_array($getContestants)){
			$this_contestant_id = $this_contestant['contestant_id'];
			$query = "SELECT pick_ind FROM picks WHERE contestant_id = $this_contestant_id AND ceremony <= $current_ceremony AND league_id > 0";
			$getContestantPicks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
			$pick_count = mysqli_num_rows($getContestantPicks);
			if($total_selectable==0){
				$pick_percent = 0;
			}else{
				$pick_percent = round($pick_count*100/$total_selectable);
			}
			$query = "UPDATE contestants SET pick_count = $pick_count, pick_percent = $pick_percent WHERE contestant_id = $this_contestant_id";
			$updatePickCounts = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
		}
	}
}
?>