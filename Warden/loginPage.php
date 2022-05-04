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
							<a class="nav-link text-black" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item mx-2">
							<a class="nav-link active" href="#">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container mx-auto my-auto">
			<div class="card mx-auto shadow-sm" style="width: 18rem;" >
				<div class="card-body ">
					<form method="POST" action="">
						<h5 class="card-title text-center">Sign In</h5>
						<div class="textbox mx-2 my-2">
							<input class="my-3 w-100 px-2 py-2 bg-white text-dark border border-1" type="text" name="username" placeholder="Username">
							<input class="my-3 w-100 px-2 py-2 bg-white text-dark border border-1" type="text" name="password" placeholder="Password">
						</div>
						<div class="loginbutton mx-2 my-2">
							<input style="background-color: #70a7ff;" class="w-100 my-3 rounded-pill border-0 py-2" type="button" name="" class="button" value="Login">
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>