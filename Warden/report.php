<?php include "./auth.php" ?>

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
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item mx-2">
						<a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link" href="uploadDetails.php">Upload Details</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link" href="request.php">Requests (0)</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link active" href="report.php">Report</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link" href="../dbFiles/logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="row justify-content-center mx-auto mt-4">
		<div class="card mx-5 mb-4 border border-dark" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Hostel wise Details</h5>
				<p class="card-text"></p>
			</div>
			<ul class="list-group list-group-flush">
				<a href="../details/hostelwisedetails.php?name=BH-1" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 1</a>
				<a href="../details/hostelwisedetails.php?name=BH-2" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 2</a>
				<a href="../details/hostelwisedetails.php?name=GH" class="list-group-item list-group-item-action list-group-item-info">Girls Hostel</a>
			</ul>
		</div>
		<div class="card mx-5 mb-4 border border-dark" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Hostel wise occupancy details</h5>
				<p class="card-text"></p>
			</div>
			<ul class="list-group list-group-flush">
				<a href="../details/occupancydetails.php?name=BH-1" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 1</a>
				<a href="../details/occupancydetails.php?name=BH-2" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 2</a>
				<a href="../details/occupancydetails.php?name=GH" class="list-group-item list-group-item-action list-group-item-info">Girls Hostel</a>
			</ul>
		</div>
		<div class="card mx-5 mb-4 border border-dark" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Hostel wise vacant details</h5>
				<p class="card-text"></p>
			</div>
			<ul class="list-group list-group-flush">
				<a href="../details/vacantdetails.php?name=BH-1" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 1</a>
				<a href="../details/vacantdetails.php?name=BH-2" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 2</a>
				<a href="../details/vacantdetails.php?name=GH" class="list-group-item list-group-item-action list-group-item-info">Girls Hostel</a>
			</ul>
		</div>
		<!--</div>
		<div class="row justify-content-center mx-auto mb-3">-->
		<div class="card mx-5 mb-4 border border-dark" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Student Details</h5>
				<p class="card-text"></p>
			</div>
			<ul class="list-group list-group-flush">
				<a href="../details/studentdetails.php?name=BH-1" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 1</a>
				<a href="../details/studentdetails.php?name=BH-2" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 2</a>
				<a href="../details/studentdetails.php?name=GH" class="list-group-item list-group-item-action list-group-item-info">Girls Hostel</a>
			</ul>
		</div>
		<div class="card mx-5 mb-4 border border-dark" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Hostel wise fees payment details</h5>
				<p class="card-text"></p>
			</div>
			<ul class="list-group list-group-flush">
				<a href="../details/feespaymentdetails.php?name=BH-1" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 1</a>
				<a href="../details/feespaymentdetails.php?name=BH-2" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 2</a>
				<a href="../details/feespaymentdetails.php?name=GH" class="list-group-item list-group-item-action list-group-item-info">Girls Hostel</a>
			</ul>
		</div>
		<div class="card mx-5 mb-4 border border-dark" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Hostel wise unpaid fees payment details</h5>
				<p class="card-text"></p>
			</div>
			<ul class="list-group list-group-flush">
				<a href="../details/unpaidfeesdetails.php?name=BH-1" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 1</a>
				<a href="../details/unpaidfeesdetails.php?name=BH-2" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 2</a>
				<a href="../details/unpaidfeesdetails.php?name=GH" class="list-group-item list-group-item-action list-group-item-info">Girls Hostel</a>
			</ul>
		</div>
	</div>
	<?php
	include("footer.php");
	?>
</body>

</html>