<?php
$enrollmentNo = '180170119023';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hostel Portal</title>
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
	<?php
	include("../warden/header.php");
	?>
	<hr />
	<div class="container mx-auto my-auto">
		For enrollment 180170119023 (BH-1/1101) static data
		<div class="row">
			<h3 class="text-center my-4 mb-2 text-primary">Payment History</h3>
			<div class="table-responsive">
				<table class="table table-bordered text-center table-striped table-hover mt-3 align-middle" id="myTable">
					<thead>
						<tr class="">
							<th>Semester</th>
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
						$sql = "SELECT * FROM fees WHERE enrollment_no = ?";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("s", $enrollmentNo);
						$stmt->execute();
						$result = $stmt->get_result();
						if ($result->num_rows > 0) {
							$fontColor;
							while ($row = $result->fetch_assoc()) {
								($row['status'] == 'Approved') ? $fontColor = 'green' : $fontColor = 'red';
								echo '<tr>
										<td>' . $row['semester'] . '</td>
										<td>' . $row['DU_reference_no'] . '</td>
										<td>' . $row['payment_date'] . '</td>
										<td>' . $row['amount_paid'] . '</td>
										<td>' . $row['penalty'] . '</td>
										<td> <a href="http://localhost/Hostel-system' . $row['receipt'] . '" target="__blank">Click here</a></td>
										<td style="color:' . $fontColor . '">' . $row['status'] . '</td>
										<td>' . $row['remarks'] . '</td>
										</tr>';
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>


		<?php

		$sql = "SELECT * FROM student_details WHERE enrollment_no = ?";
		$stmt = $st_conn->prepare($sql);
		$stmt->bind_param("s", $enrollmentNo);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
			$branch = $row['branch'];
		}

		$sql = "SELECT * FROM hostel_student_details WHERE enrollment_no = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $enrollmentNo);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$hostelName = $row['hostel_name'];
			$roomNo = $row['room_no'];
		}
		?>

		<form class="row g-3 mx-5 my-5" action="feesUploadAction.php" method="POST" enctype="multipart/form-data">
			<h3 class="text-center mt-4 mb-2 text-primary">Fees Payment</h3>
			<div class="col-md-4">
				<label for="inputEnrollmentNo" class="form-label">Enrollment Number</label>
				<input type="text" class="form-control" name="enrollment-no" id="inputEnrollmentNo" value="<?php echo $enrollmentNo; ?>" readonly>
			</div>
			<div class="col-md-4">
				<label for="inputHostelName" class="form-label">Hostel Name</label>
				<input type="text" class="form-control" name="hostel-name" id="inputHostelName" value="<?php echo $hostelName; ?>" readonly>
			</div>
			<div class="col-md-4">
				<label for="inputRoomNumber" class="form-label">Room Number</label>
				<input type="text" class="form-control" name="room-no" id="inputRoomNumber" value="<?php echo $roomNo; ?>" readonly>
			</div>
			<div class="col-md-4">
				<label for="inputName" class="form-label">Name</label>
				<input type="text" class="form-control" name="name" id="inputName" value="<?php echo $name; ?>" readonly>
			</div>
			<div class="col-md-4">
				<label for="inputBranch" class="form-label">Branch</label>
				<input type="text" class="form-control" name="branch" id="inputBranch" value="<?php echo $branch; ?>" readonly>
			</div>
			<div class="col-md-4">
				<label for="inputSem" class="form-label">Semester</label>
				<input type="number" class="form-control" name="semester" id="inputSem" required>
			</div>
			<div class="col-md-4">
				<label for="inputDURefNo" class="form-label">DU Reference Number</label>
				<input type="text" class="form-control" name="DU-reference-no" id="inputDURefNo" required>
			</div>
			<div class="col-md-4">
				<label for="dob" class="form-label">Payment Date</label>
				<input type="date" name="payment-date" class="form-control" id="inputPaymentDate" required>
			</div>
			<div class="col-md-4">
				<label for="inputAmount" class="form-label">Amount Paid</label>
				<input type="text" class="form-control" name="amount-paid" id="inputAmount" value="1250" readonly>
			</div>
			<div class="col-md-4">
				<label for="inputAmountPenalty" class="form-label">Penalty Amount</label>
				<input type="number" class="form-control" name="penalty-amount" id="inputPenaltyAmount" required>
			</div>
			<div class="col-md-4">
				<label for="formFile" class="form-label">Upload PDF</label>
				<input class="form-control" type="file" id="formFile" name='file' accept=".pdf" onchange="checkFile()" required>
			</div>
			<div class="col-12 mb-4">
				<button type="submit" name="submit-fees-btn" class="btn btn-primary">Submit</button>
				<a href="request.php" class="mx-3 text-decoration-none">
					Back
				</a>
			</div>
		</form>
		TODO : receipt <br>
		TODO : Update and request again if Reject
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

	function checkFile() {
		let file = document.getElementById('formFile').value;
		let file_ext = file.split('.').pop();
		if (file_ext !== 'pdf') {
			alert('Please upload file in .pdf formate!!!');
			document.getElementById('formFile').value = "";
		}
	}
</script>

</html>