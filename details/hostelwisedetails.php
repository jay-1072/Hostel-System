<<<<<<< HEAD
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

</head>

<body>
	<?php
	include("../warden/header.php");
	?>
	<hr />
	<div class="container">
		<h3 class="text-center mt-3 mb-2 text-primary">Hostel Details</h3>
		<h5 class="text-center mt-3 mb-2 text-primary"><?php echo $fullHostelName; ?></h5>
		<div class="table-responsive my-5">
			<table class="table table-bordered table-hover table-striped mt-3 text-center" id="myTable">
=======
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hostel Portal</title>
	</head>
	<body>
		<?php
		include("../warden/header.php");
		?>
		<hr />
		<div class="container">
		<h3 class="text-center mt-3 mb-2 text-primary">Hostel Details</h3>
		<div class="table-responsive">
			<table class="table table-bordered table-hover mt-3">
>>>>>>> 5db2347eeaacb2b46f3194cd0250a69d58bddc5f
				<thead>
					<tr>
						<th scope="col">Room Number</th>
						<th scope="col">Enrollment Number</th>
						<th scope="col">Name</th>
						<th scope="col">Branch</th>
						<th scope="col">Semester</th>
						<th scope="col">Course</th>
						<th scope="col">Addmission Date</th>
						<th scope="col">Release Date</th>
					</tr>
				</thead>
				<tbody>
<<<<<<< HEAD
					<?php
					include "../dbConn.php";
					$sql = "SELECT * FROM hostel_student_details as hsd JOIN hostel_master AS hm ON hsd.room_no = hm.room_no AND hm.hostel_name = ? ORDER BY hm.room_no";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("s", $hostelName);
					$stmt->execute();
					$result = $stmt->get_result();
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							if ($row['release_date'] == '0000-00-00') {
								$row['release_date'] = '-';
							}
							echo '<tr>
									<th scope="row">' . $row['room_no'] . '</th>
									<td>' . $row['enrollment_no'] . '</td>
									<td>XYZ</td>
									<td>IT</td>
									<td>6</td>
									<td>BE/ME</td>
									<td>' . $row['occupancy_date'] . '</td>
									<td>' . $row['release_date'] . '</td>
								</tr>';
						}
					}
					?>
=======
					<tr>
						<th scope="row">1101</th>
						<td>190170116000</td>
						<td>Xyz</td>
						<td>IT</td>
						<td>6</td>
						<td>BE/ME</td>
						<td></td>
						<td></td>
					</tr>
>>>>>>> 5db2347eeaacb2b46f3194cd0250a69d58bddc5f
				</tbody>
			</table>
		</div>
		<div class="col-12 text-center">
			<button type="submit" class="btn btn-info">Generate Report</button>
			<a href="../warden/report.php" class="mx-3 text-decoration-none">
				Back
			</a>
		</div>
<<<<<<< HEAD
	</div>
	<p>TODO : Download report remaining</p>
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

=======
		</div>
		<p>To do: Hostel name remaining</p>
		<?php
		include("../warden/footer.php");
		?>
	</body>
>>>>>>> 5db2347eeaacb2b46f3194cd0250a69d58bddc5f
</html>