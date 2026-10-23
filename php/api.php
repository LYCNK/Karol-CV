<?php

if(session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
	
$con = mysqli_connect('localhost', 'user', pass', 'user');
	
if (isset($_POST['register_btn'])) {

	$username = $_POST["user"];
	$fullname = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	$stmt = $con->prepare('SELECT * FROM `users` WHERE `username` = ?');
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$stmt->store_result();
	$usernames = $stmt->num_rows;
	
	$stmt = $con->prepare('SELECT * FROM `users` WHERE `email` = ?');
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$stmt->store_result();
	$emails = $stmt->num_rows;

	if ($password != $confirm_password) {
		die("Passwords do not match.");
	} else if ($usernames > 0) {
		die("Username exists.");
	} else if ($emails > 0) {
		die("Email in use.");
	} else if (strlen($username) > 25) {
		die("Username cannot be more than 25 characters.");
	} else {
		$password = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $con->prepare("INSERT INTO `users`(`username`, `fullname`, `email`, `password`) VALUES (?,?,?,?);");
		$stmt->bind_param('ssss', $username, $fullname, $email, $password);
		$stmt->execute();

		header('Location: ./index.php');
		exit(0);	

	}

} else if (isset($_POST['login_btn'])) {

	$username = $_POST['user'];
	$password = $_POST['password'];

	if (!empty(trim($username)) && !empty(trim($password))) {

		$stmt = $con->prepare('SELECT * FROM `users` WHERE `username` LIKE ?');
		$stmt -> bind_param('s', $username);
		$stmt->execute();

		$stmt_result = $stmt->get_result();
		$result = $stmt_result->num_rows;
		
		$name = "";
		$pw = "";
		$id = -1;

		$row_data = null;
		while($row_data = $stmt_result->fetch_assoc()) {
			$name = $row_data['username'];
			$pw = $row_data['password'];
			$id = $row_data['id'];
		}

		if ($result > 0 && password_verify($password, $pw) == true) {

			$stmt = $con->prepare('SELECT `user_id` FROM `users` WHERE `username` = ?');
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$_SESSION['id'] = $row['user_id'];

			$_SESSION['authenticated'] = TRUE;
			$_SESSION['username'] = $username;

			header('Location: ./index.php');
			exit(0);

		} else {

			$higher = $result > 0;
			$pw_verify = password_verify($password, $pw) == true;
			$_SESSION['status'] = "Invalid username or password.";
			die("Invalid username or password.");
		}
	}

} else if (isset($_POST['msg_btn'])) {

	$text = $_POST['txt'];
	$user = $_SESSION['username'];

	

}	
?>
