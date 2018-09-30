<?php
	//session_start();
	$db = mysqli_connect('localhost', 'root', '', 'emp_db');
	// initialize variables
	$id = 0;
	$firstname = "";
	$lastname = "";
	$address = "";
	$mobile = 0;
	$departament = "";
	$proffesion = "";
	$salary = 0;
	$update = false;
	//SAVE
	if (isset($_POST['save'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		$departament = $_POST['departament'];
		$proffesion = $_POST['proffesion'];
		$salary = $_POST['salary'];
		mysqli_query($db, "INSERT INTO person (firstname, lastname, address, mobile, departament, proffesion, salary)
			VALUES (
			'$firstname',
			'$lastname',
			'$address',
			'$mobile',
			'$departament',
			'$proffesion',
			'$salary')"
		);
		$_SESSION['message'] = "Employee data saved!";
		header('location: index.php');
	}
	//UPDATE
	if (isset($_POST['update'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		$departament = $_POST['departament'];
		$proffesion = $_POST['proffesion'];
		$salary = $_POST['salary'];
		mysqli_query($db, "UPDATE person SET
			firstname = '$firstname',
			lastname = '$lastname',
			address = '$address',
			mobile = '$mobile',
			departament = '$departament',
			proffesion = '$proffesion',
			salary = '$salary'
			WHERE id=$id"
		);
		$_SESSION['message'] = "Employee data updated!";
		header('location: index.php');
	}
	//DELETE
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM person WHERE id=$id");
		$_SESSION['message'] = "Employee deleted!";
		header('location: index.php');
	}
	//GET all
	$results = mysqli_query($db, "SELECT * FROM emp_db");
?>