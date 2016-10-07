<?php
	require_once( '../includes/connection.php');
	session_start();
	session_unset ();

	$fbName   = $_POST['fbName'];
	$fbID     = $_POST['fbID'];

	$_SESSION['fbName']= $fbName;
	$_SESSION['fbID']  = $fbID;
?>