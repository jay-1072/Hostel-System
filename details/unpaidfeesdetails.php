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
		<div class="row">
			<h3 class="text-center mt-3 mb-2 text-primary">Unpaid fees details</h3>
			<h5 class="text-center mt-3 mb-2 text-primary"><?php echo $fullHostelName; ?></h5>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped mt-3 align-middle" id="myTable">
					<thead>
						<tr class="">
							<th>Room Number</th>
							<th>Enrollment Number</th>
							<th>Name</th>
							<th>Branch</th>
							<th>Semester</th>
							<th>Course</th>
							<th>Contact Number</th>
							<th>Email Id</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../dbConn.php";
						$sql = "SELECT * FROM hostel_student_details as hsd JOIN fees ON hsd.enrollment_no = fees.enrollment_no AND hsd.hostel_name = ? ORDER BY fees.payment_date DESC";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("s", $hostelName);
						$stmt->execute();
						$result = $stmt->get_result();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<tr>
									<th scope="row">' . $row['room_no'] . '</th>
									<td>' . $row['enrollment_no'] . '</td>
									<td>XYZ</td>
									<td>IT</td>
									<td>6</td>
									<td>BE/ME</td>
									<td>1112222111</td>
									<td>aaaa@gmail.com</td>
								</tr>';
							}
						}
						?>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>

</html>