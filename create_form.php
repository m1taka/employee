<?php
include('server_crud.php');
if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM person WHERE id=$id");
		//if (count($record) == 1) {
			$n = mysqli_fetch_array($record);
			$firstname = $n['firstname'];
			$lastname = $n['lastname'];
			$address = $n['address'];
			$mobile = $n['mobile'];
			$departament = $n['departament'];
			$proffesion = $n['proffesion'];
			$salary = $n['salary'];
		//}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Employee Details</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<form method="post" action="server_crud.php">
			<a href="index.php">Back</a>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="input-group">
				<label>First Name</label>
				<input type="text" name="firstname" value="<?php echo $firstname; ?>">
			</div>
			
			<div class="input-group">
				<label>Last Name</label>
				<input type="text" name="lastname" value="<?php echo $lastname; ?>">
			</div>
			<div class="input-group">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo $address; ?>">
			</div>
			<div class="input-group">
				<label>Mobile</label>
				<input type="text" name="mobile" value="<?php echo $mobile; ?>">
			</div>
			<div class="input-group">
				<label>Departament</label>
				<input type="text" name="departament" value="<?php echo $departament; ?>">
			</div>
			<div class="input-group">
				<label>Proffesion</label>
				<input type="text" name="proffesion" value="<?php echo $proffesion; ?>">
			</div>
			<div class="input-group">
				<label>Salary</label>
				<input type="text" name="salary" value="<?php echo $salary; ?>">
			</div>
			<div class="input-group">
				<?php if ($update == true): ?>
				<button class="edit_btn" type="submit" name="update" style="background: #556B2F;" >update</button>
				<?php else: ?>
				<button class="edit_btn" type="submit" name="save">Save</button>
				<?php endif ?>
			</div>
		</form>
	</body>
</html>