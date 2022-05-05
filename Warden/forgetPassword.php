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
					<li><a href="loginPage.php">Login</a></li>
				</ul>
			</nav>
		</header>
		<form method="POST" action="../dbFiles/forget-password.php">
			<div class="container">
				<div class="login-box">
					<div class="top-box">
						<div class="title">
							<h1>Password Change</h1>
						</div>
						<div class="textbox">
							<input type="password" name="password" placeholder="Password">
						</div>
						<div class="textbox">
							<input type="password" name="confirmPassword" placeholder="Confirm password">
						</div>
						<button name="change" class="button" value="change">Change</button>
					</div>

				</div>
			</div>
		</form>
		<?php 
			include("footer.php");
		?>
	</body>
</html>