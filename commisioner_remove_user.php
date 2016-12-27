<?php
include('get_SESSION.php');

if(isset($_POST['user_list'])) {
	if(!empty($_POST['user_list'])){
		$user_list = $_POST['user_list'];
		foreach($user_list as $user_id) {
			$query = "UPDATE user SET league_id = -1 WHERE user_id = $user_id AND league_id = $LEAGUE_ID";
			$removeUser = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
    	}
    }
}

header('Location: commissioner.php');
exit();

?>