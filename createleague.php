<?php

	include('get_SESSION.php');


	$league_name      = $_POST['leaguename'];
	$league_pword     = $_POST['leaguepassword'];
	$league_emails    = $_POST['emailaddresses'];
	//echo $league_emails;

	$SPECIAL_CHARACTERS = "/[\'^£$%&*()}{@#~?><>,|=_+¬-]/";
	if(preg_match($SPECIAL_CHARACTERS, $league_name) ){
		echo "<script>alert('No special characters allowed.');
					 window.location.href='createjoin.php';
						</script>";
	}

	if(!$_POST['createleague']) {
		echo "<script>alert('Please fill out the form.');
					 window.location.href='createjoin.php';
						</script>";
	} else {
		$query = "SELECT * FROM `league` WHERE `name` LIKE '$league_name' ";
		$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
		
		if (mysqli_num_rows($result)==0){
			$league = mysqli_fetch_array($result);

			$pswd_hash = password_hash($league_pword, PASSWORD_DEFAULT);

			$query = "INSERT INTO `league` (`league_id`, `name`, `commissioner_id`, `password`) VALUES (NULL, '$league_name', '$USER_ID', '$pswd_hash')";
			mysqli_query($dbc, $query ) or die(mysqli_error($dbc));

			$query = "SELECT * FROM `league` WHERE `name` LIKE '$league_name' AND `password` LIKE '$pswd_hash'";
			$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
			$league = mysqli_fetch_array($result);
			$league_id = $league['league_id'];
			$_SESSION['LEAGUE_ID'] = $league_id;
			$_SESSION['LEAGUE_NAME'] = $league['name'];

			$query = "SELECT * FROM `user` WHERE `user_id` = $USER_ID";
			$result = mysqli_query($dbc,$query) or die ("Error in query: $query " . mysqli_error($dbc));
			$user = mysqli_fetch_array($result);
			$_SESSION['COMMISSIONER'] = $user['alias'];
			$_SESSION['COMMISH_ID']   = $user['user_id'];
			$user_email = $user['email'];
			$user_first_name = $user['first_name'];
			$user_last_name = $user['last_name'];
			$user_full_name = $user_first_name . ' ' . $user_last_name;

			$query = "UPDATE `user` SET `league_id` = $league_id WHERE `user`.`user_id` = $USER_ID";
			mysqli_query($dbc , $query );


			// SET DEFUALT PICKS FOR ANY CEREMONY NOT LOCKED (ALPHABETICAL SELECTION)
			$query = "SELECT * FROM ceremony";
			$ceremony_query = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));

			if(mysqli_num_rows($ceremony_query) != 0){
				foreach($ceremony_query as $curr_ceremony){
					// get lock time
					$curr_lock_time = $curr_ceremony['lock_time'];
					$curr_ceremony_num = $curr_ceremony['ceremony_number'];
					$curr_ceremony_picks = $curr_ceremony['number_picks'];

					$curr_lock_time = strtotime($curr_lock_time);
					if($curr_lock_time > $CURRENT_TIME){
						$query = "SELECT * FROM picks WHERE user_id = $USER_ID AND league_id = $league_id AND ceremony = $curr_ceremony_num";
						$result = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
						
						if(mysqli_num_rows($result) == 0){
							for($i = 1; $i <= $curr_ceremony_picks; $i++ ){
								$query = "INSERT INTO picks(pick_ind, user_id, ceremony, league_id, contestant_id, pick_order, score) VALUES (NULL, $USER_ID, $curr_ceremony_num, $league_id, $i , $i, 0)";
								$update_picks = mysqli_query($dbc, $query) or die ("Error in query: $query " . mysqli_error($dbc));
							}
						}
					}
				}
			}
			echo "<script>winddow.location.href='createjoin.php';</script>";


			// EMAIL ALL MEMBERS IF THEIR EMAILS ARE INCLUDED UPON CREATION
			if(isset($_POST['emailaddresses'])){
				if(!empty($_POST['emailaddresses'])){
					$headers[] = 'MIME-Version: 1.0';
					$headers[] = 'Content-type: text/html; charset=iso-8859-1';
					
					$email_dev      = "admin@thebachleague.com"; // send dev an email
					$email_commish  = $user_email;               // send commish and email 

					$subject_dev     = "[BachLeague League Addition]: ". $league_name;
					$subject_commish = "BachLeague League, ". $league_name . " Created!";

					$message_dev =  '<html>';
					$message_dev .= '  <head>';
					$message_dev .= '    <title>[BachLeague League Addition]: ' . $league_name . '</title>';
					$message_dev .= '  </head>';
					$message_dev .= '  <body>';
					$message_dev .= '    <p>Commissioner Email: '. $user_email . '<br>';
					$message_dev .= 'Commissioner Name: ' . $user_full_name . '</p>';

					$message_commish =  '<html>';
					$message_commish .= '  <head>';
					$message_commish .= '    <title>BachLeague League,' . $league_name . 'created</title>';
					$message_commish .= '  </head>';
					$message_commish .= '  <body>';
					$message_commish .= '    <p>You have created the ' . $league_name . ' league with password, ' . $league_pword . ', and invited the following people:<br>';

					$email_addresses = explode(',',$league_emails);
					foreach($email_addresses as $email_address){					
						$email_inivitee = $email_address;
					    $subject_invitee = "You Have Been Invited to Join BachLeague!";

						$message_dev     .= 'Invitee email: '. $email_address . '<br>';
						$message_commish .=  $email_address . '<br>';

						$message_invitee =  '<html>';
						$message_invitee .= '  <head>';
						$message_invitee .= '    <title>You Have Been Invtied to Join ' . $league_name . '</title>';
						$message_invitee .= '  </head>';
						$message_invitee .= '  <body>';
						$message_invitee .= '    <p>You have been invited to join '. $league_name .'. <a href="thebachleague.com>Create an account or login</a> and go to Create/Join League to enter the league name and password to join.</p>';
						$message_invitee .= '    <p>League name: '. $league_name .'<br>';
						$message_invitee .= 'League password: '. $league_pword . '</p>';
						$message_invitee .= '  </body>';
						$message_invitee .= '</html>';

						mail($email_inivitee, $subject_invitee, $message_invitee, implode("\r\n", $headers));
					}
					$message_dev .= '  	</p>';
					$message_dev .= '  </body>';
					$message_dev .= '</html>';

					$message_commish .= '  	</p>';
					$message_commish .= '  </body>';
					$message_commish .= '</html>';

					mail($email_dev,    $subject_dev,     $message_dev,     implode("\r\n", $headers));
					mail($email_commish,$subject_commish, $message_commish, implode("\r\n", $headers));
					echo "<script>winddow.location.href='resetpassword_success.php';</script>";
				}
			}

		}else{
			echo "<script>alert('This league name already exists.');
					 window.location.href='createjoin.php';
						</script>";
		}
	}
?>
