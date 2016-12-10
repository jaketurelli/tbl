<?php
include('get_SESSION.php');
date_default_timezone_set("America/Los_Angeles");
if(isset($_POST['submit'])){
	$ceremony_num     = $_POST['ceremony_num'];
	$lock_time_month  = $_POST['lock_time_month'];
	$lock_time_day    = $_POST['lock_time_day'];
	$lock_time_year   = $_POST['lock_time_year'];
	$lock_time_hour   = $_POST['lock_time_hour'];
	$lock_time_minute = $_POST['lock_time_minute'];
	$num_picks        = $_POST['num_picks'];


	$lock_time = mktime($lock_time_hour, $lock_time_minute, 0, $lock_time_month, $lock_time_day, $lock_time_year);

	//$lock_date = date('Y-m-d H:i:s', $lock_time);
	//var_dump($lock_date);
	//exit();
	//echo "<p>" . $lock_time . "</p>";
	//echo "<p>" . time() . "</p>";
	$query = "SELECT * FROM ceremony WHERE ceremony_number = $ceremony_num";
	$check_db = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	if (mysqli_num_rows($check_db)>0){
		$this_ceremony = mysqli_fetch_array($check_db);
		$id = $this_ceremony['id'];
		$query = "UPDATE ceremony SET number_picks = $num_picks, lock_time = FROM_UNIXTIME($lock_time) WHERE `ceremony`.`id` = $id";
		$update_result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	}else{

		$query = "INSERT INTO ceremony(id, ceremony_number, number_picks, lock_time) VALUES (NULL, $ceremony_num, $num_picks, FROM_UNIXTIME($lock_time))";

		$add_result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

		// SET DEFUALT PICKS FOR EVERYONE ON THE WEBSITE OF THIS CEREMONY (ALPHABETICAL SELECTION)
		$query = "SELECT user_id, league_id FROM user WHERE league_id > -1";
		$user_query = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
		if(mysqli_num_rows($user_query) != 0){
			$query = "SELECT contestant_id FROM contestants WHERE eliminated = 0 ORDER BY contestant_id ASC";
			$contestants_query = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
			$contestant_id_array = array();
			foreach($contestants_query as $curr_contestant){
				$contestant_id_array[] = $curr_contestant['contestant_id'];
			}
			foreach($user_query as $curr_array_user){
				$curr_user_id   = $curr_array_user['user_id'];
				$curr_league_id = $curr_array_user['league_id'];
				for($i=0; $i<$num_picks; $i++){
					$pick = $i+1;
					$cont = $contestant_id_array[$i];
					//var_dump($cont);
					$query = "INSERT INTO picks(pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $curr_user_id, $ceremony_num,      $curr_league_id,$cont , $pick, 0)";
				           //"INSERT INTO picks(pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $USER_ID,      $curr_ceremony_num, $league_id,     $i ,    $i,    0)";	
					//var_dump($query);
					$update_picks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

				}
				

			}
		}
		
	}
	//header('Location: admin.php');

}elseif(isset($_POST['update'])){
	$ceremony_num     = $_POST['ceremony_num'];
	$lock_time_month  = $_POST['lock_time_month'];
	$lock_time_day    = $_POST['lock_time_day'];
	$lock_time_year   = $_POST['lock_time_year'];
	$lock_time_hour   = $_POST['lock_time_hour'];
	$lock_time_minute = $_POST['lock_time_minute'];
	$num_picks        = $_POST['num_picks'];


	if(is_numeric($lock_time_month)){

	}else{
		if(strcmp($lock_time_month,'Jan')){
			$lock_time_month = 1;
		}elseif(strcmp($lock_time_month,'Feb')){
			$lock_time_month = 2;
		}elseif(strcmp($lock_time_month,'Mar')){
			$lock_time_month = 3;
		}elseif(strcmp($lock_time_month,'Apr')){
			$lock_time_month = 4;
		}elseif(strcmp($lock_time_month,'May')){
			$lock_time_month = 5;
		}elseif(strcmp($lock_time_month,'Jun')){
			$lock_time_month = 6;
		}elseif(strcmp($lock_time_month,'Jul')){
			$lock_time_month = 7;
		}elseif(strcmp($lock_time_month,'Aug')){
			$lock_time_month = 8;
		}elseif(strcmp($lock_time_month,'Sep')){
			$lock_time_month = 9;
		}elseif(strcmp($lock_time_month,'Oct')){
			$lock_time_month = 10;
		}elseif(strcmp($lock_time_month,'Nov')){
			$lock_time_month = 11;
		}elseif(strcmp($lock_time_month,'Dec')){
			$lock_time_month = 12;
		}	
	}		


	$lock_time = mktime($lock_time_hour, $lock_time_minute, 0, $lock_time_month, $lock_time_day, $lock_time_year);

	$query = "SELECT * FROM ceremony WHERE ceremony_number = $ceremony_num";
	$check_db = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	if (mysqli_num_rows($check_db)>0){
		$this_ceremony = mysqli_fetch_array($check_db);
		$id = $this_ceremony['id'];
		$num_picks_previous =  $this_ceremony['number_picks'];
		$query = "UPDATE ceremony SET number_picks = $num_picks, lock_time = FROM_UNIXTIME($lock_time) WHERE `ceremony`.`id` = $id";
		$update_result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));



		// IF NUMBER PICKS CHANGE, SET DEFUALT PICKS FOR EVERYONE ON THE WEBSITE OF THIS CEREMONY (ALPHABETICAL SELECTION)
		
		if ($num_picks_previous != $num_picks){
			$query = "SELECT user_id, league_id FROM user WHERE league_id > -1";
			$user_query = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
			if(mysqli_num_rows($user_query) != 0){
				$query = "SELECT contestant_id FROM contestants WHERE eliminated = 0 ORDER BY contestant_id ASC";
				$contestants_query = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
				$contestant_id_array = array();
				foreach($contestants_query as $curr_contestant){
					$contestant_id_array[] = $curr_contestant['contestant_id'];
				}
				foreach($user_query as $curr_array_user){
					$curr_user_id   = $curr_array_user['user_id'];
					$curr_league_id = $curr_array_user['league_id'];

					$query = "DELETE FROM `picks` WHERE `picks`.`ceremony` =  $ceremony_num AND `picks`.`user_id`= $curr_user_id AND `picks`.`league_id`= $curr_league_id";
					$delete_picks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

					for($i=0; $i<$num_picks; $i++){
						$pick = $i+1;
						$cont = $contestant_id_array[$i];
						//var_dump($cont);
						$query = "INSERT INTO picks(pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $curr_user_id, $ceremony_num,      $curr_league_id,$cont , $pick, 0)";
					           //"INSERT INTO picks(pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $USER_ID,      $curr_ceremony_num, $league_id,     $i ,    $i,    0)";	
						//var_dump($query);
						$update_picks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

					}
					

				}
			}
		}
		

	}else{
		
	}
	//header('Location: admin.php');

}elseif(isset($_POST['delete'])){
	$ceremony_num     = $_POST['ceremony_num'];

	$query = "DELETE FROM `ceremony` WHERE `ceremony`.`ceremony_number` = $ceremony_num";
	$delete_ceremony = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	
	$query = "DELETE FROM `picks` WHERE `picks`.`ceremony` =  $ceremony_num";
	$delete_picks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

	$query = "UPDATE contestants SET eliminated = 0 WHERE eliminated = $ceremony_num";
	$update_contestants = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	//header('Location: admin.php');
}elseif(isset($_POST['is_current'])){
	$ceremony_num = $_POST['is_current'];
	$query = "UPDATE ceremony SET is_current = 1 WHERE ceremony_number = $ceremony_num";
	$update_current_ceremony = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
}


header('Location: admin.php');
exit();
?>

