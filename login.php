<?php
require_once( '../includes/connection.php');
session_start();

//function setSessionVariables($user){}
include('function_setSessionVariables.php');

//session_unset ();
$redirectPage = $_SESSION['CURRENT_PAGE'];
$league_id = 0;
$email    = $_POST['email'];
$pswd     = $_POST['pword'];
//$redirect_page = $_POST['redirect_page'];

// .htaccess is preventing $_POST information somehow. Problem open.
/*
$SPECIAL_CHARACTERS = "/[\'^£$%&*()}{#~?><>,|=_+¬-]/";
if(preg_match($SPECIAL_CHARACTERS, $uname) ){
	echo "<script>alert('No special characters allowed.');
				 window.location.href='index.php';
					</script>";
}
*/
if($_POST['login']) {
	$query = "SELECT * FROM `user` WHERE `email` LIKE '$email'";

	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);
	if (mysqli_num_rows($result)!=0){
		$pswd_hash2compare = $user['password'];
		if(password_verify($pswd,$pswd_hash2compare )){
			$user_id = $user['user_id'];
/*
			$_SESSION['IS_SIGNED_IN'] = TRUE;
			$_SESSION['USER_ID'] =  $user_id;
			$_SESSION['EMAIL'] = $user['email'];
			$_SESSION['ALIAS'] = $user['alias'];
			$_SESSION['LEAGUE_ID'] = $user['league_id'];
			$_SESSION['IS_ADMIN'] = $user['is_admin'];
*/
			setSessionVariables($dbc, $user_id);
			$league_id = $user['league_id'];

			$query =  "UPDATE `user` SET `is_logged_in` = 1 WHERE `user`.`user_id` = $user_id";
			$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
			echo '<script>window.location.href="' . $redirectPage . '";
					</script>;';
		}else{
			echo "<script>alert('Incorrect Password.');
					</script>";
		}

	}else{	
		echo "<script>alert('User with that email does not exist.');
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
/*
		$_SESSION['USER_ID']      = $user['user_id'];
		$_SESSION['fb_id']        = $user['fb_id']; // testing purposes
		$_SESSION['EMAIL']        = $user['email'];
		$_SESSION['ALIAS']        = $user['alias'];
		$_SESSION['LEAGUE_ID']    = $user['league_id'];
		$_SESSION['IS_ADMIN']     = $user['is_admin'];
		$_SESSION['IS_SIGNED_IN'] = true;
*/
		$league_id = $user['league_id'];
		setSessionVariables($dbc, $user_id);
		//echo "<script>window.location.reload();</script>";
		echo '<script>window.location.href="' . $redirectPage . '";
					</script>;';
			
	}
}else {
	echo "<script>alert('How did you get here? No login, no fb_id.');
				 window.location.href='index.php';
					</script>";
}


// GET SESSION VARIABLES FOR LEAGUE INFO IF IN A LEAGUE
/*
if($league_id <= 0){
	echo '<script>window.location.href="' . $redirectPage . '";
					</script>;';
}else{
	// GET SESSION VARIABLES
	$query = "SELECT * FROM `league` WHERE `league_id` = $league_id";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$league = mysqli_fetch_array($result);

	$commish_id = $league['commissioner_id'];
	$query = "SELECT * FROM `user` WHERE `user_id` = $commish_id";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);

	$_SESSION['LEAGUE_NAME']  = $league['name'];
	$_SESSION['COMMISSIONER'] = $user['alias'];
	$_SESSION['COMMISH_ID']   = $commish_id;

	$query = "SELECT ceremony_number FROM ceremony WHERE is_current = 1";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	if(mysqli_num_rows($result)==0){
		$current_ceremony = mysqli_fetch_array($result);
		$_SESSION['current_ceremony']   = $current_ceremony['ceremony_number'];
	}
	echo '<script>window.location.href="' . $redirectPage . '";
					</script>;';
}
*/
echo '<script>window.location.href="' . $redirectPage . '";
					</script>;';
?>