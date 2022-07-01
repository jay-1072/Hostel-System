<?php

$hostelName = $_GET['name'];
$fullHostelName = '';

switch ($hostelName) {
	case 'BH-1':
		$fullHostelName = 'Boys Hostel 1';
		break;
	case 'BH-2':
		$fullHostelName = 'Boys Hostel 2';
		break;
	case 'GH':
		$fullHostelName = 'Girls Hostel';
		break;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hostel Portal</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

	<style type="text/css">
		.small-middle-container {
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
			<h3 class="text-center mt-3 mb-2 text-primary">Occupancy Details</h3>
			<h5 class="text-center mt-3 mb-2 text-primary"><?php echo $fullHostelName; ?></h5>
			<div class="table-responsive my-5">
				<table class="table table-bordered table-hover table-striped mt-3 align-middle text-center" id="myTable">
					<thead>
						<tr class="">
							<th class="">Room Number</th>
							<th class="">No. of Occupants</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../dbConn.php";
						try {
							$sql = "SELECT * FROM hostel_master WHERE hostel_name = ?";
							$stmt = $conn->prepare($sql);
							$stmt->bind_param("s", $hostelName);
							$stmt->execute();
							$result = $stmt->get_result();
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo '<tr>
										<th scope="row">' . $row['room_no'] . '</th>
										<td>' . $row['no_of_occupancy'] . '</td>
									</tr>';
								}
							}
						} catch (Exception $e) {
							echo $e->getMessage();
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-12 text-center mb-5">
			<?php
			echo '<a href="../reportGenerate/occupancyreport.php?name=' . $hostelName . ' ">';
			echo '<button type="submit" name="report" class="btn btn-info">Generate Report</button>';
			echo '</a>' ?>
			<a href="../warden/report.php" class="mx-3 text-decoration-none">
				Back
			</a>
		</div>
	</div>

	<?php
	include("../warden/footer.php");
	?>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>

</html>