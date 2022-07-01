<?php

include "../dbConn.php";
$eno = str_replace(" ", "+", $_GET['eno']);
$enrollmentNo = openssl_decrypt($eno, $encryptionAlgo, $encryptionKey, 0, $initVector);

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

$sql = "SELECT * FROM student_details WHERE enrollment_no = ?";
// $stmt = $st_conn->prepare($sql);
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $enrollmentNo);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
	$branch = $row['branch'];
	$semester = $row['semester'];
}

$sql = "SELECT * FROM fees WHERE enrollment_no = ? AND status = 'Pending'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $enrollmentNo);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$DUReferenceNo = $row['DU_reference_no'];
	$amountPaid = $row['amount_paid'];
	$penalty = $row['penalty'];
	$path = " http://localhost/Hostel-system" . $row['receipt'];
}


// approvement or reject

if (isset($_POST['fees-approval-btn'])) {
	$remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
	$feesApproval = mysqli_real_escape_string($conn, $_POST['fees-approval-radio-btn']);

	try {
		$sql = "UPDATE fees SET remarks = ?, status = ? WHERE enrollment_no = ? AND semester = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssi", $remarks, $feesApproval, $enrollmentNo, $semester);
		$stmt->execute();
		header("location: request.php");
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

?>

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
			<input type="text" class="form-control" id="inputHostelName" value="<?php echo $hostelName; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputRoomNumber" class="form-label">Room Number</label>
			<input type="text" class="form-control" id="inputRoomNumber" value="<?php echo $roomNo; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputEnrollmentNo" class="form-label">Enrollment Number</label>
			<input type="text" class="form-control" id="inputEnrollmentNo" value="<?php echo $enrollmentNo; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputName" class="form-label">Name</label>
			<input type="text" class="form-control" id="inputName" value="<?php echo $name; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputBranch" class="form-label">Branch</label>
			<input type="text" class="form-control" id="inputBranch" value="<?php echo $branch; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputSem" class="form-label">Semester</label>
			<input type="text" class="form-control" id="inputSem" value="<?php echo $semester; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputDURefNo" class="form-label">DU Reference Number</label>
			<input type="text" class="form-control" id="inputDURefNo" value="<?php echo $DUReferenceNo; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputAmount" class="form-label">Amount Paid</label>
			<input type="text" class="form-control" id="inputAmount" value="<?php echo $amountPaid; ?>" readonly>
		</div>
		<div class="col-md-4">
			<label for="inputAmountPenalty" class="form-label">Penalty Amount</label>
			<input type="text" class="form-control" id="inputAmountPenalty" value="<?php echo $penalty; ?>" readonly>
		</div>
		<div class="col-md-4">
			<?php echo "<a href='$path' target='__blank' class='form-control btn btn-primary mt-4'>See here fee receipt</a>"; ?>
		</div>
		<div class="col-md-4 mt-5">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="fees-approval-radio-btn" id="inlineRadio1" value="Approved" required>
				<label class="form-check-label" for="inlineRadio1">Approve</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="fees-approval-radio-btn" id="inlineRadio2" value="Reject" required>
				<label class="form-check-label" for="inlineRadio2">Reject</label>
			</div>
		</div>
		<div class="col-md-12">
			<label for="inputRemarks" class="form-label">Remarks</label>
			<input type="text" class="form-control" name="remarks" id="inputRemarks">
		</div>
		<div class="col-12 mb-4">
			<button type="submit" name="fees-approval-btn" class="btn btn-primary">Submit</button>
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