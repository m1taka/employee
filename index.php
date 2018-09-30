<?php
	//session_start();
	include('server_crud.php');
	include('registration/server.php');
	if (!isset($_SESSION['email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: registration/login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
		header("location: registration/login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Employee Details</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body class="content">
		
		
		<?php $results = mysqli_query($db, "SELECT * FROM person"); ?>
		<div class="container">
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark form-inline">
				
				<ul class="form-inline">
					
					<?php  if (isset($_SESSION['email'])) : ?>
					<p> <a href="#" class="navbar-brand">Welcome, <?php echo $_SESSION['email']; ?></a></p>
					
					<p> <a href="index.php?logout='1'" class="btn btn-danger">logout</a> </p>
					<?php endif ?>
					
				</ul>
			</nav>
			
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Address</th>
						<th>Mobile</th>
						<th>Departament</th>
						<th>Proffesion</th>
						<th>Salary</th>
					</tr>
				</thead>
				<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['firstname']; ?></td>
					<td><?php echo $row['lastname']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td><?php echo $row['mobile']; ?></td>
					<td><?php echo $row['departament']; ?></td>
					<td><?php echo $row['proffesion']; ?></td>
					<td><?php echo $row['salary']; ?></td>
					<td>
						<a href="create_form.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
					</td>
					<td>
						<a href="server_crud.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
			<a href="create_form.php" class="edit_btn" action="server_crud">Create</a>
			
			<?php if (isset($_SESSION['message'])): ?>
			<div class="msg">
				<?php
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				?>
			</div>
			<?php endif ?>
			
		</div>
	</body>
</html>