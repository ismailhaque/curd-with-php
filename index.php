<?php

require_once "app/db.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

	<?php

	if (isset($_POST['add_student'])) {

		// Recive Data
		$name = $_POST['name'];
		$age = $_POST['age'];
		$roll = $_POST['roll'];
		$cell = $_POST['cell'];

		$photo_name = $_FILES['photo']['name'];
		$photo_tmp = $_FILES['photo']['tmp_name'];

		// form validation
		if (empty($name) || empty($age) || empty($roll) || empty($cell)) {

			$mass = "<p class='alert alert-danger'>All feilds are required!</p>";
		} else {

			$sql = "INSERT INTO students ( name, age, roll, cell, photo) VALUES ( '$name', $age, '$roll', '$cell', '$photo_name')";

			move_uploaded_file($photo_tmp, 'photos/'.$photo_name);

			$connection->query($sql);

			$mass = "<p class='alert alert-success'>Data stable!</p>";
		}
	};

	?>

	<div class="wrap shadow">
		<div class="card">
			<div class="card-header">
				<a style="border-radius: 5px;" class="btn btn-primary btn-sm" href="table.php">All Student</a>
			</div>
			<div class="card-body">
				<h2>Sign Up</h2>
				<div>
					<?php

					if (isset($mass)) {

						echo $mass;
					}

					?>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Roll</label>
						<input name="roll" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Phone No</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<hr>
						<input name="photo" type="file">
					</div>
					<div class="form-group">
						<input name="add_student" class="btn btn-primary btn-sm" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>