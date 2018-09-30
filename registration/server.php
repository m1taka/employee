<?php
	session_start();
	
	// initialize variables
	$username = "";
	$email = "";
	$errors = array();
	$_SESSION['success'] = "";
	//connect do db
	$db = mysqli_connect('localhost', 'root', '', 'emp_db');
	// REGISTER USER
	if(isset($_POST['reg_user'])){
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		//form validation
			if (empty($username)) {	array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }
		$user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		if ($user) {
			if ($user['username'] === $username) {
				array_push($errors, "Username already exists");
			}
			if ($user['email'] === $email) {
			array_push($errors, "Email already exists");
			}
		}
		// register user if there are no errors
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO user (username, email, password)
					VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: ../index.php');
		}
	}
	//LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: ../index.php');
			} else {
				array_push($errors, "Wrong email/password");
			}
		}
	}
?>