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
							<a class="nav-link active" aria-current="page" href="#">Dashboard</a>
						</li>
						<li class="nav-item mx-2">
							<a class="nav-link" href="request.php">Requests (0)</a>
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
		<div class="accordion" id="accordionPanelsStayOpenExample">
			<!--<div class="accordion-item mt-4">
				<h2 class="accordion-header" id="panelsStayOpen-headingOne">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
				Boys Hostel 1
				</button>
				</h2>
				<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
					<div class="accordion-body">-->
						<!--<div class="container">
								<div class="row">
										<div class="col-sm-3">
												1101
										</div>
										<div class="col-sm-9">
												<div class="row">
														<div class="col-sm-3 mx-1 rounded py-3 bg-success border border-dark"></div>
														<div class="col-sm-3 mx-1 rounded bg-success border border-dark"></div>
														<div class="col-sm-3 mx-1 rounded bg-danger border border-dark"></div>
												</div>
										</div>
								</div>
						</div>-->
						<!--<div class="container">
							<div class="row">
								<div class="col-1">1101</div>
								<div class="col">
									<div class="row">
										<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
									</div>
								</div>
								<div class="col-1">1102</div>
								<div class="col">
									<div class="row">
										<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
									</div>
								</div>
								<div class="col-1">1103</div>
								<div class="col">
									<div class="row">
										<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-danger border border-dark"></div>
									</div>
								</div>
								<div class="col-1">1104</div>
								<div class="col">
									<div class="row">
										<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-danger border border-dark"></div>
									</div>
								</div>
								<div class="col-1">1105</div>
								<div class="col">
									<div class="row">
										<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
										<div class="col-1 mx-1 rounded bg-danger border border-dark"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="accordion-item mt-4">
			<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
			<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
			Boys Hostel 2
			</button>
			</h2>
			<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
				<div class="accordion-body">
					<div class="container">
						<div class="row">
							<div class="col-1">
								2101
							</div>
							<div class="col">
								<div class="row">
									<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
									<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
									<div class="col-1 mx-1 rounded bg-danger border border-dark"></div>
								</div>
							</div>
							<div class="col-1">
								2102
							</div>
							<div class="col">
								<div class="row">
									<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
									<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
									<div class="col-1 mx-1 rounded bg-danger border border-dark"></div>
								</div>
							</div>
							<div class="col-1">
								2103
							</div>
							<div class="col">
								<div class="row">
									<div class="col-1 mx-1 rounded py-3 bg-success border border-dark"></div>
									<div class="col-1 mx-1 rounded bg-success border border-dark"></div>
									<div class="col-1 mx-1 rounded bg-danger border border-dark"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="accordion-item mt-4">
			<h2 class="accordion-header" id="panelsStayOpen-headingThree">
			<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
			Girls Hostel
			</button>
			</h2>
			<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
				<div class="accordion-body">
					
				</div>
			</div>
		</div>
	</div>-->
	<?php
	include("footer.php");
	?>
</body>
</html>