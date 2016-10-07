
<?php
//admin_set-default-picks.php
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
?>