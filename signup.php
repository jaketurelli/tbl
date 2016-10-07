<?php
session_start();
session_unset ();
require_once('../includes/connection.php');


if($_POST['signup']) {
	$uname    = $_POST['uname'];
	$alias    = $_POST['alias'];
	$pswd     = $_POST['pword'];

	$SPECIAL_CHARACTERS = "/[\'^£$%&*()}{#~?><>,|=_+¬-]/";
	if(preg_match($SPECIAL_CHARACTERS, $uname) ){
		echo "<script>alert('No special characters.');
					 window.location.href='index.php';
						</script>";
	}
	//echo "testing" ;
	$query = "SELECT * FROM `user` WHERE `username` LIKE '$uname'";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);
	if (mysqli_num_rows($result)==0){

		$pswd_hash = password_hash($pswd, PASSWORD_DEFAULT);
		$query = "INSERT INTO `user` (`user_id`, `username`, `alias`,`password`) VALUES (NULL, '$uname', '$alias', '$pswd_hash')";
		mysqli_query($dbc,  $query) or die(mysqli_error($dbc));
		

		$query = "SELECT * FROM `user` WHERE `username` LIKE '$uname' AND `password` LIKE '$pswd_hash'";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		$user = mysqli_fetch_array($result);

		$_SESSION['USER_ID']      = $user['user_id'];
		$_SESSION['USERNAME']     = $user['username'];
		$_SESSION['ALIAS']        = $user['alias'];
		$_SESSION['LEAGUE_ID']    = $user['league_id'];
		$_SESSION['IS_ADMIN']     = $user['is_admin'];
		$_SESSION['IS_SIGNED_IN'] = true;
		header('Location: index.php');
	}else{
		echo "<script>alert('username already exists.');
				 window.location.href='index.php';
					</script>";
	}
	
}elseif(isset($_POST['fb_id'])) {
	$fb_id	 	= $_POST['fb_id'];
	$first 	 	= $_POST['first'];
	$last 	 	= $_POST['last'];
	$fullName 	= $_POST['fullName'];
	$email 	 	= $_POST['email'];

	// CHECK TO SEE IF EMAIL HAS BEEN USED (EMAIL IS UNIQUE IDENTIFIER FOR USERS)
	$query = "SELECT * FROM `user` WHERE `email` LIKE '$email'";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));

	if (mysqli_num_rows($result)==0){
		// EMAIL HAS NOT BEEN USED AND USER ACCOUNT CAN BE CREATED

		$pswd_hash = password_hash('facebookSignup', PASSWORD_DEFAULT); // no password necessary, so just hash 'facebookSignup'
		$query = "INSERT INTO `user` (`user_id`, `username`, `alias`,`password`,`fb_id`, `is_logged_in`, `email`) VALUES (NULL, '$first', '$first', '$pswd_hash', $fb_id, 1, '$email')";
		$addUser = mysqli_query($dbc,  $query) or die(mysqli_error($dbc));
		$id = mysqli_insert_id($dbc); // USER IS LATEST INSERTED 

		$query = "SELECT * FROM `user` WHERE `user_id` = $id";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		$user = mysqli_fetch_array($result);

		$_SESSION['USER_ID']      = $user['user_id'];
		$_SESSION['fb_id']        = $user['fb_id']; // testing purposes
		$_SESSION['USERNAME']     = $user['username'];
		$_SESSION['ALIAS']        = $user['alias'];
		$_SESSION['LEAGUE_ID']    = $user['league_id'];
		$_SESSION['IS_ADMIN']     = $user['is_admin'];
		$_SESSION['IS_SIGNED_IN'] = true;
		
		echo "<script>window.location.reload();</script>";
		//echo "<script>window.location.href='index.php';</script>";

	}else{
		// ERROR: EMAIL HAS BEEN USED AND USER ACCOUNT
		"<script>alert('This email has already been used to create a user.');
				 window.location.href='index.php';
					</script>";
	}
}else {
	echo "<script>alert('Please fill out the form.');
				 window.location.href='index.php';
					</script>";
	
}
?>
