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
			<div class="table-responsive my-5">
				<table class="table table-bordered table-hover table-striped mt-3 align-middle" id="myTable">
					<thead>
						<tr class="">
							<th>Room No.</th>
							<th>Enrollment No.</th>
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

						$sql = "SELECT * FROM fees WHERE status = 'Unpaid' AND hostel_name = ?";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("s", $hostelName);
						$stmt->execute();
						$result = $stmt->get_result();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$enrollment = $row['enrollment_no'];

								$sql1 = "SELECT room_no FROM hostel_student_details WHERE enrollment_no = ?";
								$stmt1 = $conn->prepare($sql1);
								$stmt1->bind_param("s", $enrollment);
								$stmt1->execute();
								$result1 = $stmt1->get_result();
								$row1 = $result1->fetch_assoc();
								$roomNo = $row1['room_no'];

								$sql2 = "SELECT * FROM student_details WHERE enrollment_no = ?";
								$stmt2 = $st_conn->prepare($sql2);
								$stmt2->bind_param("s", $enrollment);
								$stmt2->execute();
								$result2 = $stmt2->get_result();
								$row2 = $result2->fetch_assoc();
								$name = $row2['first_name'] . " " . $row2['middle_name'] . " " . $row2['last_name'];
								$branch = $row2['branch'];
								$semester = $row2['semester'];
								$course = $row2['course'];
								$mobileNo = $row2['student_mobile_no'];
								$email = $row2['student_email'];

								echo '<tr>
									<th scope="row">' . $roomNo . '</th>
									<td>' . $enrollment . '</td>
									<td>' . $name . '</td>
									<td>' . $branch . '</td>
									<td>' . $semester . '</td>
									<td>' . $course . '</td>
									<td>' . $mobileNo . '</td>
									<td>' . $email . '</td>
								</tr>';
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-12 text-center">
		<?php
			echo '<a href="../reportGenerate/unpaidfeesreport.php?name='. $hostelName .' ">';
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