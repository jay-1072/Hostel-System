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
	<div class="container-fluid">
		<div class="row">
			<h3 class="text-center mt-3 mb-2 text-primary">Paid fees details</h3>
			<h5 class="text-center mt-3 mb-2 text-primary"><?php echo $fullHostelName; ?></h5>
			<div class="table-responsive  my-5">
				<table class="table table-bordered table-hover table-striped mt-3 align-middle text-center" id="myTable">
					<thead>
						<tr class="">
							<th>Room Number</th>
							<th>Enrollment Number</th>
							<th>Name</th>
							<th>Branch</th>
							<th>Semester</th>
							<th>Course</th>
							<th>DU Reference Number</th>
							<th>Payment Date</th>
							<th>Amount</th>
							<th>Penalty</th>
							<th>Receipt</th>
							<th>Status</th>
							<th>Remarks</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../dbConn.php";
						//$sql = "SELECT * FROM hostel_student_details as hsd JOIN fees ON hsd.enrollment_no = fees.enrollment_no AND hsd.hostel_name = ? ORDER BY fees.payment_date DESC";
						$sql = "SELECT * FROM hostel_student_details JOIN fees 
							ON hostel_student_details.enrollment_no = fees.enrollment_no JOIN student_details ON hostel_student_details.enrollment_no = student_details.enrollment_no
							AND hostel_student_details.hostel_name = ? ORDER BY fees.payment_date DESC";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("s", $hostelName);
						$stmt->execute();
						$result = $stmt->get_result();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<tr>
									<th scope="row">' . $row['room_no'] . '</th>
									<td>' . $row['enrollment_no'] . '</td>
									<td>'. $row['first_name'] .'</td>
									<td>'. $row['branch'] .'</td>
									<td>' . $row['semester'] . '</td>
									<td>'. $row['course'] .'</td>
									<td>' . $row['DU_reference_no'] . '</td>
									<td>' . $row['payment_date'] . '</td>
									<td>' . $row['amount_paid'] . '</td>
									<td>' . $row['penalty'] . '</td>
									<td>'. $row['receipt'] .'</td>
									<td>' . $row['status'] . '</td>
									<td>' . $row['remarks'] . '</td>
								</tr>';
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-12 text-center mb-5">
		<?php
			echo '<a href="../reportGenerate/feesreport.php?name='. $hostelName .' ">';
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