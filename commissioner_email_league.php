<?php
include('get_SESSION.php');
if (!isset($_POST['submit'])) {
   echo "<h1>Error</h1>";
   echo "<p>Accessing this page directly is not allowed.</p>";
   exit();
}
if (isset($_POST['submit'])) {

	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$subject = $_POST['subject'];
	$message = nl2br(htmlspecialchars($_POST['message']));

	$message_html =  '<html>';
	$message_html .= '  <body>';
	$message_html .= '    <p>Message sent from thebachleague.com to all members of the league, <b>'. $LEAGUE_NAME. '</b> from the commissioner, <b>' . $COMMISSIONER. '</b>:<p>';
	$message_html .= '    <p>'. $message. '<p>';
	$message_html .= '  </body>';
	$message_html .= '</html>';


	$query = "SELECT email FROM user WHERE league_id = $LEAGUE_ID";
	$user_query = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
	if(mysqli_num_rows($user_query) != 0){
		foreach($user_query as $curr_user){
			$email_to = $curr_user['email'];
			mail($email_to,$subject, $message_html, implode("\r\n", $headers));
		}
	}

}
// RELOCATE TO COMMISSIONER PAGE
$_SESSION['COMMISSIONER_TAB'] = 1; // league email is the first tab
echo "<script>alert('Emails sent!');</script>";
echo "<script>window.location.href='commissioner.php';</script>";

?>