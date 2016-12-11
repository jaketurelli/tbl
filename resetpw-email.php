<?php
require_once("../includes/connection.php");
if (!isset($_POST['resetpw'])) {
   echo "<h1>Error</h1>";
   echo "<p>Accessing this page directly is not allowed.</p>";
   exit();
}else{

    $email = $_POST['email'];
    $identifier = rand()*rand();
    $identifier_hash = password_hash($identifier, PASSWORD_DEFAULT);
    $query = "UPDATE user SET pwrd_reset_hash = '$identifier_hash' WHERE email LIKE '$email'";
    $reset_hash_update = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));



    $to = "admin@thebachleague.com";
    $subject = "Password reset for " . $_POST['email'];
    $subject2 = "Reset Password";
    $message1 = "Password reset sent to " . $email;
    $message2 =  '<html>';
    $message2 .= '  <head>';
    $message2 .= '    <title>Reset Password</title>';
    $message2 .= '  </head>';
    $message2 .= '  <body>';
    $message2 .= '    <p>You have requested to reset your password for The Bach League.<p>';
    $message2 .= '    <p>Your password reset code is '.  $identifier . '.<p>';
    $message2 .= '    <p> Please <a href="thebachleague.com/resetpassword.php">click here</a> to reset your password. You will need your password reset code to update your password.</p>';
    $message2 .= '  </body>';
    $message2 .= '</html>';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    mail($to,   $subject, $message1, implode("\r\n", $headers));
    mail($email,$subject2,$message2,implode("\r\n", $headers));
    header('Location: resetpassword_success.php');
}
?>