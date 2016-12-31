<?php
session_start();
//session_unset ();
require_once('../includes/connection.php');

include('functions.php');


$redirectPage = $_SESSION['CURRENT_PAGE'];

if($_POST['signup']) {
	$email      = $_POST['email'];
	$first_name = trim(addslashes($_POST['first_name']));
	$last_name  = trim(addslashes($_POST['last_name']));
	$pswd       = $_POST['pword'];
	if(!empty($first_name)){
		$alias = $first_name;
	}elseif(!empty($last_name)){
		$alias = $last_name;
	}else{
		$split_string = explode("@", $email);
		$alias = $split_string[0];
	}
/*
	$SPECIAL_CHARACTERS = "/[\'^£$%&*()}{#~?><>,|=_+¬-]/";
	if(preg_match($SPECIAL_CHARACTERS, $uname) ){
		echo "<script>alert('No special characters.');
					 window.location.href='index.php';
						</script>";
	}
*/
	//echo "testing" ;
	$query = "SELECT * FROM `user` WHERE `email` LIKE '$email'";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);
	if (mysqli_num_rows($result)==0){

		$pswd_hash = password_hash($pswd, PASSWORD_DEFAULT);
		$query = "INSERT INTO `user` (`user_id` ,`email`,`first_name`,`last_name`,`alias`,`password`) VALUES (NULL, '$email', '$first_name', '$last_name', '$alias', '$pswd_hash')";
		//$query = "INSERT INTO `user` (`user_id`, `email`, `alias`,`password`) VALUES (NULL, '$uname', '$alias', '$pswd_hash')";
		$addUser = mysqli_query($dbc,  $query) or die(mysqli_error($dbc));
		
		$query = "SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$pswd_hash'";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		$user = mysqli_fetch_array($result);
		$USER_ID = $user['user_id'];
		setSessionVariables($dbc, $USER_ID);
/*
		$_SESSION['USER_ID']      = $user['user_id'];
		$_SESSION['EMAIL']        = $user['email'];
		$_SESSION['ALIAS']        = $user['alias'];
		$_SESSION['LEAGUE_ID']    = $user['league_id'];
		$_SESSION['IS_ADMIN']     = $user['is_admin'];
		$_SESSION['IS_SIGNED_IN'] = true;
*/
		emailUser($email, $alias);
		
		echo '<script>window.location.href="' . $redirectPage . '";</script>';
	}else{
		echo '<script>alert("email account already exists for another user.");
				 window.location.href="' . $redirectPage . '";
					</script>';
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
/*
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
*/
		setSessionVariables($dbc, $id);

		emailUser($email, $first);

		echo '<script>window.location.href="' . $redirectPage . '";
					</script>;';
		//echo "<script>window.location.href='index.php';</script>";

	}else{
		// ERROR: EMAIL HAS BEEN USED AND USER ACCOUNT
		echo '<script>alert("This email has already been used to create a user.");
				 window.location.href="' . $redirectPage . '";
					</script>';
	}
}else {
	echo '<script>alert("Please fill out the form.");
				 window.location.href="' . $redirectPage . '";
					</script>';
	
}

function emailUser($email, $alias){
	$email_dev = "admin@thebachleague.com";
	$subject_dev= "New user";
	$message_dev =  $email;
	

	$subject2 = "Thank you for joining The Bach League!";
	$message2 = "Hi " . $alias . "! ";
	$message2 =  '<html>';
    $message2 .= '  <head>';
    $message2 .= '    <title>Sign up</title>';
    $message2 .= '  </head>';
    $message2 .= '  <body>';
    $message2 .= '    <p>Hi '. $alias . '!<p>';
    $message2 .= '    <p>Thank you for signing up for The Bach League! <a href="thebachleague.com">Login</a> to create a new league or join an existing league if you have not done so already.<p>';
    $message2 .= '  </body>';
    $message2 .= '</html>';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
	mail($email_dev,$subject_dev,$message_dev, implode("\r\n", $headers));
	mail($email,$subject2,$message2, implode("\r\n", $headers));
}



?>
