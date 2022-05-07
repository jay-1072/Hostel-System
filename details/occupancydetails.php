<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hostel Portal</title>
		<style type="text/css">
			.small-middle-container{
				margin: auto;
				width: 40%;
			}
		</style>
	</head>
	<body>
		<?php
		include("../warden/header.php");
		?>
		<hr />
		<div class="small-middle-container">
			<div class="row">
				<h3 class="text-center mt-3 mb-2 text-primary">Occupancy details</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-hover mt-3 align-middle">
						<thead>
							<tr class="">
								<th class="">Room Number</th>
								<th class="">No. of Occupants</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1101</th>
								<td></td>
							</tr>
							<tr>
								<th scope="row">1102</th>
								<td></td>
							</tr>
							<tr>
								<th scope="row">1102</th>
								<td></td>
							</tr>
							<tr>
								<th scope="row">1102</th>
								<td></td>
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