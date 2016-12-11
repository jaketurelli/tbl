<?php
include('get_SESSION.php');

$announcement = addslashes($_POST['announcement']);
$query = "INSERT INTO commissioner_announcements(id, league_id, commissioner_id, announcement) VALUES (NULL, $LEAGUE_ID, $USER_ID, '$announcement')";

$add_announcement = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

// RELOCATE TO COMMISSIONER PAGE
echo "<script>window.location.href='commissioner.php';</script>";
?>