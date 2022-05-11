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
		</div>
			<?php
				include("footer.php");
			?>
		</body>
	</html>