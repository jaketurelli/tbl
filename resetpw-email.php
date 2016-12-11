<?php
if (!isset($_POST['submit'])) {
   echo "<h1>Error</h1>";
   echo "<p>Accessing this page directly is not allowed.</p>";
   exit();
}
if (isset($_POST['submit'])) {
  $to = "admin@thebachleague.com";
  $email = $_POST['email'];
  $subject = "Form submission";
  $subject2 = "Thank you for contacting us!";
  $message = $_POST['message'];
  $message2 = "Thank you for contacting The Bach League! We will get back to you shortly. Here is a copy of your message: " . $_POST['message'];
  $headers = "Reply-To: " . $_POST['email'];
  mail($to,$subject,$message,$headers);
  mail($email,$subject2,$message2);

  // $to = "admin@thebachleague.com";
  // $email = $_POST['email'];
  // $subject = "Password reset for " . $_POST['email'];
  // $subject2 = "Reset Password";
  // // $message = $_POST['message'];
  // $message2 = 
  // '<html>
  // <head>
  //   <title>Reset Password</title>
  // </head>
  // <body>
  //   <p>You have requested to reset your password. Please <a href="thebachleague.com/resetpassword.php">click here</a> to reset your password.</p>
  // </body>
  // </html>';
  // // $headers = "Reply-To: " . $_POST['email'];
  // mail($to,$subject);
  // mail($email,$subject2,$message2);
  // header('Location: resetpassword_success.php');
}
?>