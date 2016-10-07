<?php
include('get_SESSION.php');

$query =  "UPDATE `user` SET `is_logged_in` = 0 WHERE `user`.`user_id` = $USER_ID";
$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
session_start();
session_unset ();


header('Location: index.php');
exit();
?>