<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>Hostel Portal</title>
		<link rel="stylesheet" type="text/css" href="../css/headerFooter.css">
		<link rel="stylesheet" type="text/css" href="../css/loginPage.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous"></script>
	</head>
	<body>
		<?php 
			include("header.php");
		?>
		<header>
			<input type="checkbox" name="" id="menu-bar">
			<label for="menu-bar"><i class="fa-solid fa-bars"></i></label>
			<nav class="navbar">
				<ul class="">
					<li><a href="test.php">Home</a></li>
					<li><a href="#" class="active">Login</a></li>
				</ul>
			</nav>
		</header>
		<form method="POST" action="../dbFiles/warden-login.php">
			<div class="container">
				<div class="login-box">
					<div class="top-box">
						<div class="title">
							<h1>Sign In</h1>
						</div>
						<div class="textbox">
							<input type="text" name="username" placeholder="Username">
						</div>
						<div class="textbox">
							<input type="password" name="password" placeholder="Password">
						</div>
						<button name="login" class="button" value="Login">Login</button>
						<a href="forgetPassword.php">Forget password</a>
					</div>

				</div>
			</div>
		</form>
		<?php 
			include("footer.php");
		?>
	</body>
>>>>>>> 1c68389f88070619c89a336bdf833b9c2cd2272d
</html>