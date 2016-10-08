<?php
if (!isset($_POST['submit'])) {
   echo "<h1>Error</h1>";
   echo "<p>Accessing this page directly is not allowed.</p>";
   exit();
}
if (isset($_POST['submit'])) {
  $to = "kacy.mckibben@gmail.com"; // JAKE email addresses of league members
  $subject = "From your league commissioner";
  $message = $_POST['message'];
  $headers = "Reply-To: jake.turelli@gmail.com"; // JAKE reply-to should be the email address of the league commissioner?
  mail($to,$subject,$message,$headers);
}
?>