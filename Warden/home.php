<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header("location:Dashboard.php");
}
?>
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
						<a class="nav-link text-black active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link" href="./loginPage.php">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mx-auto my-auto">
		<div id="carouselExampleDark" class="carousel carousel-dark slide mt-3 mb-3" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active" data-bs-interval="10000">
					<img src="../images/hostelimages/1.png" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>First slide label</h5>
						<p>Some representative placeholder content for the first slide.</p>
					</div>
				</div>
				<div class="carousel-item" data-bs-interval="2000">
					<img src="../images/hostelimages/2.png" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Second slide label</h5>
						<p>Some representative placeholder content for the second slide.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="../images/hostelimages/3.png" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Third slide label</h5>
						<p>Some representative placeholder content for the third slide.</p>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<div class="row mb-5 mt-5">
			<div class="col-sm-6">
				<div class="card text-center border-dark">
					<div class="card-header bg-light fw-bold fs-5">Boys Hostel Warden Details</div>
					<div class="card-body">
						<p class="card-text">
						<h5 class="h5">Prof. Navin Ganeshan</h5>
						<p>Assistant Professor, EC Department</p>
						<h5 class="h5">Prof. Ashish Patel</h5>
						<p>Assistant Professor, Chemical Department</p>
						<h5 class="h5">Prof. Sunil Patel</h5>
						<p>Assistant Professor, Power Electronics Department</p>
						<h5 class="h5">Prof. Upendrasingh R. Singh</h5>
						<p>Assistant Professor, Civil Department</p>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card text-center border-dark">
					<div class="card-header bg-light fw-bold fs-5">Girls Hostel Warden Details</div>
					<div class="card-body">
						<p class="card-text">
						<h5 class="h5">Prof. Trupti Y. Rathod</h5>
						<p>Assistant Professor, Mechanical Department</p>
						<h5 class="h5">Prof. Sita S. Agrawal</h5>
						<p>Assistant Professor, Electrical Department</p>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include("footer.php");
	?>
</body>

</html>