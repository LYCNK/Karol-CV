<?php
if(session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Accounts</title>
		<link href="/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>Accounts</h1>
		<a href='./index.php'>Take me home</a>
		<br>
		<br>
		
		<form action="./api.php" method="POST">
			<div class="form-group">
				<label>Username<br></label>
				<input type="text" name="user" class="text" required>
			</div>
			<br>
			<div class="form-group">			
				<label>Full name<br></label>
				<input type="text" name="name" class="text" required>				
			</div>
			<br>			
			<div class="form-group">				
				<label>Email address<br></label>
				<input type="email" name="email" class="text" required>				
			</div>				
			<br>
			<div class="form-group">				
				<label>Passsword<br></label>
				<input type="password" name="password" class="text" required>				
			</div>
			<br>
			<div class="form-group">				
				<label>Confirm password<br></label>
				<input type="password" name="confirm_password" class="text" required>				
			</div>
			<br>
			<div class="form-group">				
				<input type="submit" name="register_btn" class="btn btn-primary" value="Submit">				
			</div>
		</form>
		
		<br>
		
		<a href='./login.php'>Already have an account?</a>
		
	</body>
</html>
