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
			<div class="row">
				<h3 class="text-center mt-3 mb-2 text-primary">Unpaid fees details</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-hover mt-3 align-middle">
						<thead>
							<tr class="">
								<th>Room Number</th>
								<th>Enrollment Number</th>
								<th>Name</th>
								<th>Branch</th>
								<th>Semester</th>
								<th>Course</th>
								<th>Contact Number</th>
								<th>Email Id</th>
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
								<td>1112222111</td>
								<td>aaaa@gmail.com</td>
							</tr>
						</tbody>
					</table>
				</div>
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