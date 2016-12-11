<?php
require_once("../includes/connection.php");

if(isset($_POST['reset'])){

	$email      = $_POST['email'];
	$reset_code = $_POST['reset_code'];
	$newpaswrd  = $_POST['pword'];

	$query = "SELECT user_id, email, pwrd_reset_hash FROM user WHERE email LIKE '$email'";
	$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
	$user = mysqli_fetch_array($result);
	if (mysqli_num_rows($result)!=0){
		$hashed_code = $user['pwrd_reset_hash'];
		$user_id = $user['user_id'];
		if(password_verify($reset_code,$hashed_code )){
			// HASH PASSWORD
			$new_pswd_hash = password_hash($newpaswrd, PASSWORD_DEFAULT);

			// UPDATE DATABASE
			$query = "UPDATE `user` SET `password` = '$new_pswd_hash' , `pwrd_reset_hash` = NULL WHERE `user_id` = $user_id";
			$passwordUpdate = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
			

			// RELOCATE TO HOMEPAGE
			echo "<script>alert('Password updated.');
						window.location.href='index.php';
						</script>";
		}else{
			echo "<script>alert('Incorrect password reset code.');
							window.location.href='index.php';
							</script>";
		}
	}else{
		echo "<script>alert('Email does not exist');
							window.location.href='index.php';
							</script>";
	}
}
?>