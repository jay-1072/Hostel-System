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
		<hr />
		<div class="container">
		<h3 class="text-center mt-3 mb-2 text-primary">Hostel Details</h3>
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