<?php
/*
$to       = 'jake.turelli@gmail.com';
$subject  = 'Testing sendmail.exe';
$message  = 'Hi, you just received an email using sendmail!';
$headers  = 'From: thebachleague@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";

*/


/*
if(isset($_POST['submit'])){
	$msg = 'Hi, ' . $_POST['name'] . ', thank you for signing up for The Bach League!';
	$to = $_POST['email'];
	$subject = 'Welcome To The Bach League';
	$headers  = 'From: thebachleague@gmail.com' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8';
	if(mail($to, $subject, $msg, $headers)) {
		header('location: contact-us-thank-you.php');
	} else {
		echo "Email sending failed";
	}
	
}else{
	header('location: contact-us.php');
	exit(0);
}
?>*/
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
}
// KACY'S CODE:
/*if(isset($_POST['submit'])){
   $to = "no-reply@thebachleague.com"; // this is your Email address
   $from = $_POST['email']; // this is the sender's Email address
   $name = $_POST['name'];
   $subject = "Form submission";
   $subject2 = "Copy of your form submission";
   $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
   $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

   $headers = "From:" . $from;
   $headers2 = "From:" . $to;
   mail($to,$subject,$message,$headers);
   mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
   //echo "Your message was sent. Thank you " . $name . ", we will contact you shortly.";
   header('Location: contact_thank-you.php');
   exit();
}*/
?>
