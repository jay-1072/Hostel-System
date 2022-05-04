<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hostel Portal</title>
	</head>
	<body>
		<?php
		include("../warden/header.php");
		?>
		<nav class="navbar navbar-light bg-light shadow-sm">
			<div class="container-fluid">
				<a class="navbar-brand"></a>
				<form class="d-flex justify-content-end mx-3">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			
			</div>
		</nav>
		<div class="container">
			<h3 class="text-center mt-3 mb-2 text-primary">Student Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered table-hover mt-3">
					<thead>
						<tr>
							<th scope="col">Room Number</th>
							<th scope="col">Enrollment Number</th>
							<th scope="col">Name</th>
							<th scope="col">Branch</th>
							<th scope="col">Semester</th>
							<th scope="col">Course</th>
							<th scope="col">Addmission Date</th>
							<th scope="col">Release Date</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1101</th>
							<td>190170116000</td>
							<td>Xyz</td>
							<td>IT</td>
							<td>6</td>
							<td>BE/ME</td>
							<td></td>
							<td></td>
							<td><a href="onestudentdetail.php" class="text-decoration-none">More</a></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-12 text-center">
				<button type="submit" class="btn btn-info">Generate Report</button>
				<a href="../warden/report.php" class="mx-3 text-decoration-none">
					Back
				</a>
			</div>
		</div>
		<p>To do: Hostel name remaining</p>
		<?php
		include("../warden/footer.php");
		?>
	</body>
</html>