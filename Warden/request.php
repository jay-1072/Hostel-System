<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hostel Portal</title>
		<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	</head>
	<body>
		<?php
		include("header.php");
		?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
			<div class="container-fluid">
				<!--<a class="navbar-brand" href="#">Navbar</a>-->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item mx-2">
							<a class="nav-link" aria-current="page" href="Dashboard.php">Dashboard</a>
						</li>
						<li class="nav-item mx-2">
							<a class="nav-link active" href="#">Requests (0)</a>
						</li>
						<li class="nav-item mx-2">
							<a class="nav-link" href="report.php">Report</a>
						</li>
						<li class="nav-item mx-2">
							<a class="nav-link" href="#">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<table class="table table-hover mt-3">
			<thead>
				<tr>
					<th scope="col">Hostel Name</th>
					<th scope="col">Room Number</th>
					<th scope="col">Enrollment Number</th>
					<th scope="col">Name</th>
					<th scope="col">Branch</th>
					<th scope="col">Semester</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">Boys Hostel 1</th>
					<td>1101</td>
					<td>190170116000</td>
					<td>Xyz</td>
					<td>IT</td>
					<td>6</td>
					<td><a href="feesAction.php">More</a></td>
				</tr>
			</tbody>
		</table>

		<p>To do: when the warden is approve or reject the fees details it will be removed from here</p>
		<?php
		include("footer.php");
		?>
	</body>
</html>