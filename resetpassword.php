<!DOCTYPE html>
<html>
<head>
<?php
include('header_content.html');
?>
<script type="text/javascript" src="overlay.js"></script>
</head>
<body>
	<h3>Reset Password</h3>
	<form id="resetpasswordform" role="form" action="resetpassword_database.php" onsubmit="return checkPw()" method="post">
		<fieldset class="form-group">
			<label>Email</label>
			<input type="email" id="email" class="form-control" name="email" value="">
		</fieldset>
		<fieldset class="form-group">
			<label>Password Reset Code</label>
			<input type="text" id="reset_code" class="form-control" name="reset_code" value="">
		</fieldset>
		<fieldset class="form-group">
			<label>New Password</label>
			<input type="password" id="newpass" class="form-control" name="pword" autocomplete="new-password" value="">
		</fieldset>
		<fieldset class="form-group">
			<label>Confirm Password</label>
			<input type="password" id="confirmpass" class="form-control" name="pword" autocomplete="new-password" value="">
		</fieldset>
		<fieldset class="form-group text-center">
			<input type="submit" class="btn btn-pink" name="reset" value="RESET PASSWORD">
		</fieldset>
	</form>
</body>
</html>