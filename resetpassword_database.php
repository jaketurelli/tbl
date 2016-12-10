<?php
require_once("../includes/connection.php");

$username = $_POST['username'];
$paswrd   = $_POST['pword'];


// HASH PASSWORD
$pswd_hash = password_hash($paswrd, PASSWORD_DEFAULT);


// UPDATE DATABASE
$query = "UPDATE `user` SET `password` = '$pswd_hash' WHERE `username` LIKE '$username'";
$passwordUpdate = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));


// RELOCATE TO HOMEPAGE
echo "<script>alert('Password updated.');
					 window.location.href='index.php';
						</script>";

?>