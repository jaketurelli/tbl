<?php
include('get_SESSION.php');
if (!isset($_POST['invite'])) {
   echo "<h1>Error</h1>";
   echo "<p>Accessing this page directly is not allowed.</p>";
   exit();
}
if (isset($_POST['invite'])) {
	$user_email = $_POST['email'];
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$subject = 'You Have Been Invited to Join theBachLeague';
	$league_invite_code = rand()*rand();
    $query = "INSERT INTO `league_join_code` (`id`, `user_email`, `league_id` , `code` ) VALUES (NULL, '$user_email', $LEAGUE_ID, $league_invite_code)";
    $add_user_code = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));


	$message_html =  '<html>';
	$message_html .= '  <body>';
	$message_html .= '    <p>You have been invited to join <b>'. $LEAGUE_NAME. '</b> by the commissioner, <b>' . $COMMISSIONER. '</b>.<p>';
	$message_html .= '    <p>Please use the following League Code to join:<br>';
	$message_html .=        'League Code: ' . '<b>' . strval($league_invite_code) . '<b></p>';
	$message_html .= '  </body>';
	$message_html .= '</html>';


	mail($user_email,$subject, $message_html, implode("\r\n", $headers));

}

// RELOCATE TO COMMISSIONER PAGE
$_SESSION['COMMISSIONER_TAB'] = 1; // league email is the first tab
echo "<script>alert('Email sent!');</script>";
echo "<script>window.location.href='commissioner.php';</script>";

?>