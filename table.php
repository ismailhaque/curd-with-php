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



	<div class="wrap-table shadow">
		<div class="card">
			<div class="card-header">
				<a style="border-radius: 50px;" class="btn btn-success btn-sm" href="index.php">Add Student</a>
			</div>
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Age</th>
							<th>Roll</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php

						// get all data

						$sql = "SELECT * FROM students";
						$data = $connection->query($sql);

						$i = 1;

						while ($fdata = $data->fetch_assoc()) :

						?>

							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $fdata['name']; ?></td>
								<td><?php echo $fdata['age']; ?></td>
								<td><?php echo $fdata['roll']; ?></td>
								<td><?php echo $fdata['cell']; ?></td>
								<td><img style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" src="photos/<?php 
								
								if ( $fdata['photo'] ) {
									echo $fdata['photo'];
								} else {
									echo 'avatar.png';
								}?>" alt=""></td>
								<td>
									<a class="btn btn-sm btn-info" href="#">View</a>
									<a class="btn btn-sm btn-warning" href="#">Edit</a>
									<a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $fdata['id']; ?>">Delete</a>
								</td>
							</tr>

						<?php

						endwhile;

						?>

					</tbody>
				</table>
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