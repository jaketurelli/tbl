<?php
require_once( '../includes/connection.php');
session_start();
session_unset ();

$league_id = -1;
$uname    = $_POST['uname'];
$pswd     = $_POST['pword'];

// .htaccess is preventing $_POST information somehow. Problem open.
$SPECIAL_CHARACTERS = "/[\'^£$%&*()}{#~?><>,|=_+¬-]/";
if(preg_match($SPECIAL_CHARACTERS, $uname) ){
	echo "<script>alert('No special characters allowed.');
				 window.location.href='index.php';
					</script>";
}

if($_POST['login']) {
	$query = "SELECT * FROM `user` WHERE `username` LIKE '$uname'";

	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);
	if (mysqli_num_rows($result)!=0){
		$pswd_hash2compare = $user['password'];
		if(password_verify($pswd,$pswd_hash2compare )){
			$user_id = $user['user_id'];
			$_SESSION['IS_SIGNED_IN'] = TRUE;
			$_SESSION['USER_ID'] =  $user_id;
			$_SESSION['USERNAME'] = $user['username'];
			$_SESSION['ALIAS'] = $user['alias'];
			$_SESSION['LEAGUE_ID'] = $user['league_id'];
			$_SESSION['IS_ADMIN'] = $user['is_admin'];
			$league_id = $user['league_id'];

			$query =  "UPDATE `user` SET `is_logged_in` = 1 WHERE `user`.`user_id` = $user_id";
			$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));

		}else{
			echo "<script>alert('Incorrect Password.');
					</script>";
		}

	}else{	
		echo "<script>alert('Username does not exist.');
					</script>";
	}
}elseif(isset($_POST['fb_id'])) {
	$fb_id	 	= $_POST['fb_id'];
	$first 	 	= $_POST['first'];
	$last 	 	= $_POST['last'];
	$fullName 	= $_POST['fullName'];
	$email 	 	= $_POST['email'];
	$query = "SELECT * FROM `user` WHERE `user`.`fb_id` = $fb_id";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	if (mysqli_num_rows($result)==0){
		echo "<script>alert('Seems like you have not signed up for Bach League yet!');
					</script>";
	}else{
		$user = mysqli_fetch_array($result);
		$user_id = $user['user_id'];
		$query =  "UPDATE `user` SET `is_logged_in` = 1 WHERE `user`.`user_id` = $user_id";
		$updateIsLoggedIn = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));

		$_SESSION['USER_ID']      = $user['user_id'];
		$_SESSION['fb_id']        = $user['fb_id']; // testing purposes
		$_SESSION['USERNAME']     = $user['username'];
		$_SESSION['ALIAS']        = $user['alias'];
		$_SESSION['LEAGUE_ID']    = $user['league_id'];
		$_SESSION['IS_ADMIN']     = $user['is_admin'];
		$_SESSION['IS_SIGNED_IN'] = true;
		$league_id = $user['league_id'];

		echo "<script>window.location.reload();</script>";

			
	}
}else {
	echo "<script>alert('How did you get here?');
				 window.location.href='index.php';
					</script>";
}


// GET SESSION VARIABLES FOR LEAGUE INFO IF IN A LEAGUE
if($league_id == -1){
	// SEND TO LEAGUE PAGE TO SIGNUP OR CREATE A LEAGUE
	echo "<script>window.location.href='league.php';
		</script>";
}else{
	$query = "SELECT * FROM `league` WHERE `league_id` = $league_id";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$league = mysqli_fetch_array($result);

	$commish_id = $league['commissioner_id'];
	$query = "SELECT * FROM `user` WHERE `user_id` = $commish_id";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);

	$_SESSION['LEAGUE_NAME']  = $league['name'];
	$_SESSION['COMMISSIONER'] = $user['username'];
	$_SESSION['COMMISH_ID']   = $commish_id;

	$query = "SELECT ceremony_number FROM ceremony WHERE is_current = 1";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	if(mysqli_num_rows($result)==0){
		$current_ceremony = mysqli_fetch_array($result);
		$_SESSION['current_ceremony']   = $current_ceremony['ceremony_number'];
	}


	echo "<script>alert('How did you get here?');
				 window.location.href='index.php';
					</script>";
}
?>