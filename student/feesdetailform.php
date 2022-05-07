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
		include("../warden/header.php");
		?>
		<hr />
		<div class="container mx-auto my-auto">
			To Do --> status and remarks
			<div class="row">
				<h3 class="text-center mt-3 mb-2 text-primary">Payment History</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-hover mt-3 align-middle">
						<thead>
							<tr class="">
								<th>Semester</th>
								<th>DU Referencre Number</th>
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
						</tbody>
					</table>
				</div>
			</div>
			
			<form class="row g-3 mx-5" action="" method="POST">
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
					<input type="date" name="paymentDate" class="form-control" id="inputPaymentDate" placeholder="" >
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
</html>