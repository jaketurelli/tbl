<?php 
include('get_SESSION.php');
$msg       = $_REQUEST['msg'];
$msg = addslashes($msg); // add slashes to special characters in order to handle properly

$query = "INSERT INTO chat (alias, user_id, league_id, comment) VALUES ('$ALIAS', $USER_ID, $LEAGUE_ID, '$msg')";

//$_SESSION['TESTquery'] = $query;
$add2query = mysqli_query($dbc,$query)or die ("Error in query: $query " . mysqli_error($dbc));

include('chat_display.php');
 ?>
