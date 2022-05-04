<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hostel Portal</title>
	</head>
	<body>
		<?php
			include("header.php");
		?>
		<hr />
		<h3 class="text-center mt-2 mb-2">Fees Action Form</h3>
		<form class="row g-3 mx-5" action="" method="POST">
			<div class="col-md-4">
				<label for="inputHostelName" class="form-label">Hostel Name</label>
				<input type="text" class="form-control" id="inputHostelName" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputRoomNumber" class="form-label">Room Number</label>
				<input type="text" class="form-control" id="inputRoomNumber" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputEnrollmentNo" class="form-label">Enrollment Number</label>
				<input type="text" class="form-control" id="inputEnrollmentNo" disabled readonly>
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
				<input type="text" class="form-control" id="inputDURefNo" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputAmount" class="form-label">Amount</label>
				<input type="text" class="form-control" id="inputAmount" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="inputAmountPenalty" class="form-label">Penalty Amount</label>
				<input type="text" class="form-control" id="inputAmountPenalty" disabled readonly>
			</div>
			<div class="col-md-4">
				<label for="formFile" class="form-label">Uploded PDF</label>
				<input class="form-control" type="file" id="formFile" disabled>
			</div>
			<div class="col-md-4 mt-5">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
					<label class="form-check-label" for="inlineRadio1">Approve</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					<label class="form-check-label" for="inlineRadio2">Reject</label>
				</div>
			</div>
			<div class="col-md-12">
				<label for="inputRemarks" class="form-label">Remarks</label>
				<input type="text" class="form-control" id="inputRemarks">
			</div>
			<div class="col-12 mb-4">
				<button type="submit" class="btn btn-primary">Submit</button>
				<a href="request.php" class="mx-3 text-decoration-none">
					Back
				</a>
			</div>
		</form>
		<P>To do: After the form submit the page redirect to request.php and the notification will go to student if possible <br> Check the uplode file</P>
		<?php
		include("footer.php");
		?>
	</body>
</html>