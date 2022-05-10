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
<<<<<<< HEAD
							<th>Room Number</th>
=======
>>>>>>> 5db2347eeaacb2b46f3194cd0250a69d58bddc5f
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
<<<<<<< HEAD
						$sql = "SELECT * FROM hostel_student_details as hsd JOIN fees ON hsd.enrollment_no = fees.enrollment_no AND hsd.hostel_name = ? ORDER BY fees.payment_date DESC";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("s", $hostelName);
=======
						$sql1 = "SELECT * FROM student_details as sd JOIN fees ON sd.Enrollment_no=fees.enrollment_no AND sd.hostel_name=? ORDER BY fees.payment_date DESC";
						$stmt = $conn->prepare($sql1);
						$stmt->bind_param("s", $fullHostelName);
>>>>>>> 5db2347eeaacb2b46f3194cd0250a69d58bddc5f
						$stmt->execute();
						$result = $stmt->get_result();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
<<<<<<< HEAD
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
=======

								if($row['status']=='Not Applied' && $row['semester']==$row['Semester']) {
									echo '<tr>
										<td>' . $row['enrollment_no'] . '
										</td>
										<td>' . $row['first_name'] . '
										</td>
										<td>' . $row['branch'] . '
										</td>
										<td>' . $row['semester'] . '
										</td>
										<td>' . $row['course'] . '
										</td>
										<td>' . $row['student_mobile_no'] . '
										</td>
										<td>' . $row['student_email'] . '
										</td>
									</tr>';
								}
								else if($row['semester']!=$row['Semester']) {
									$sql2 = "INSERT INTO `fees` (`enrollment_no`, `Semester`, `Hostel name`, `Amount paid`, `Penalty`, `payment_date`, `DU reference no`, `Receipt pdf`, `status`, `Remark`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
									$stmt = $conn->prepare($sql2);
									$amount = 1270;
									$penalty = null;
									$payDate = null;
									$duNo = null;
									$receipt = null;
									$status = 'Not Applied';
									$remarks = null;
									$stmt->bind_param("sisiisssss", $row['Enrollment_no'], $row['semester'], $row['hostel_name'], $amount, $penalty, $payDate, $duNo, $receipt, $status, $remarks);
									$stmt->execute();
								}
							}
						}

						$sql3 = "SELECT * FROM student_details as sd JOIN fees ON sd.Enrollment_no!=fees.enrollment_no AND sd.hostel_name=?";
						$stmt = $conn->prepare($sql3);
						$stmt->bind_param("s", $fullHostelName);
						$stmt->execute();
						$result = $stmt->get_result();

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$sql4 = "INSERT INTO `fees` (`enrollment_no`, `Semester`, `Hostel name`, `Amount paid`, `Penalty`, `payment_date`, `DU reference no`, `Receipt pdf`, `status`, `Remark`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
								$stmt = $conn->prepare($sql4);
								$amount = 1270;
								$penalty = null;
								$payDate = null;
								$duNo = null;
								$receipt = null;
								$status = 'Not Applied';
								$remarks = null;
								$stmt->bind_param("sisiisssss", $row['Enrollment_no'], $row['semester'], $row['hostel_name'], $amount, $penalty, $payDate, $duNo, $receipt, $status, $remarks);
								$stmt->execute();
							}
						}

					?>
>>>>>>> 5db2347eeaacb2b46f3194cd0250a69d58bddc5f
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