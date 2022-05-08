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
		To Do --> status and remarks <br>
		For enrollment 180170119023 (BH-1/1101) static data
		<div class="row">
			<h3 class="text-center mt-3 mb-2 text-primary">Payment History</h3>
			<div class="table-responsive">
				<table class="table table-bordered text-center table-hover mt-3 align-middle my-5" id="myTable">
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
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Approve / Reject</td>
							<td></td>
						</tr>
						<?php
						include "../dbConn.php";
						$sql = "SELECT * FROM fees WHERE enrollment_no = '180170119023'";
						$stmt = $conn->prepare($sql);
						// $stmt->bind_param("s", $hostelName);
						$stmt->execute();
						$result = $stmt->get_result();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<tr>
										<td>' . $row['semester'] . '</td>
										<td>' . $row['DU_reference_no'] . '</td>
										<td>' . $row['payment_date'] . '</td>
										<td>' . $row['amount_paid'] . '</td>
										<td>' . $row['penalty'] . '</td>
										<td>Receipt</td>
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

		<form class="row g-3 mx-5 my-5" action="" method="POST">
			<h3 class="text-center mt-4 mb-2 text-primary">Fees Payment</h3>
			<div class="col-md-4">
				<label for="inputEnrollmentNo" class="form-label">Enrollment Number</label>
				<input type="text" class="form-control" id="inputEnrollmentNo" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputHostelName" class="form-label">Hostel Name</label>
				<input type="text" class="form-control" id="inputHostelName" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputRoomNumber" class="form-label">Room Number</label>
				<input type="text" class="form-control" id="inputRoomNumber" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputName" class="form-label">Name</label>
				<input type="text" class="form-control" id="inputName" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputBranch" class="form-label">Branch</label>
				<input type="text" class="form-control" id="inputBranch" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputSem" class="form-label">Sem</label>
				<input type="text" class="form-control" id="inputSem" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputDURefNo" class="form-label">DU Reference Number</label>
				<input type="text" class="form-control" id="inputDURefNo">
			</div>
			<div class="col-md-4">
				<label for="dob" class="form-label">Payment Date</label>
				<input type="date" name="paymentDate" class="form-control" id="inputPaymentDate" placeholder="">
			</div>
			<div class="col-md-4">
				<label for="inputAmount" class="form-label">Amount</label>
				<input type="text" class="form-control" id="inputAmount" placeholder="1250" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputAmountPenalty" class="form-label">Penalty Amount</label>
				<input type="text" class="form-control" id="inputAmountPenalty">
			</div>
			<div class="col-md-4">
				<label for="formFile" class="form-label">Upload PDF</label>
				<input class="form-control" type="file" id="formFile">
			</div>
			<div class="col-12 mb-4">
				<button type="submit" class="btn btn-primary">Submit</button>
				<a href="request.php" class="mx-3 text-decoration-none">
					Back
				</a>
			</div>
		</form>
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