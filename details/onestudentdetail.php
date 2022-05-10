<<<<<<< HEAD
<?php

include "../dbConn.php";
$eno = str_replace(" ", "+", $_GET['eno']);
$enrollmentNo = openssl_decrypt($eno, $encryptionAlgo, $encryptionKey, 0, $initVector);

$sql = "SELECT * FROM student_details WHERE enrollment_no = ?";
$stmt = $st_conn->prepare($sql);
$stmt->bind_param("s", $enrollmentNo);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
		$branch = $row['branch'];
		$semester = $row['semester'];
		$course = $row['course'];
		$studentMobileNo = $row['student_mobile_no'];
		$parentMobileNo = $row['parent_mobile_no'];
		$studentEmail = $row['student_email'];
		$parentEmail = $row['parent_email'];
		$dob = $row['date_of_birth'];
		$permanentAddress = $row['permanent_address'];
		$city = $row['city'];
		$pincode = $row['pincode'];
		$district = $row['district'];
		$state = $row['state'];
		$nationality = $row['nationality'];
		$category = $row['category'];
		$admissionType = $row['admission_type'];
	}
}

$sql = "SELECT * FROM hostel_student_details WHERE enrollment_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $enrollmentNo);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$hostelName = $row['hostel_name'];
		$roomNo = $row['room_no'];
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
	include("../warden/header.php");
	?>
	<hr />
	<div class="container">
		<h5 class="h5 text-center mb-3 mt-3">Enrollment Number : <?php echo $enrollmentNo; ?></h5>
		<h5 class="h5 text-center mb-3">Name: <?php echo $name; ?> </h5>
		<div class="card border-secondary mb-3">
			<div class="row flex-row-reverse">
				<div class="col-auto">
					<img src="../images/dummy.jpg" class="mt-3" alt="Profile Image">
				</div>
				<div class="col order-md-1">
					<div class="card-block px-2 mt-3 mx-3 mb-3">
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><span class="fw-bold">Hostel Name: </span><?php echo $hostelName; ?></li>
							<li class="list-group-item"><span class="fw-bold">Room Number: </span><?php echo $roomNo; ?></li>
							<li class="list-group-item"><span class="fw-bold">Branch: </span><?php echo $branch; ?></li>
							<li class="list-group-item"><span class="fw-bold">Semester: </span><?php echo $semester; ?></li>
							<li class="list-group-item"><span class="fw-bold">Course: </span><?php echo $course; ?></li>
							<li class="list-group-item"><span class="fw-bold">Student's Mobile No.: </span><?php echo $studentMobileNo; ?></li>
							<li class="list-group-item"><span class="fw-bold">Parent's Mobile No.: </span><?php echo $parentMobileNo; ?></li>
							<li class="list-group-item"><span class="fw-bold">Student's Email Id: </span><?php echo $studentEmail; ?></li>
							<li class="list-group-item"><span class="fw-bold">Parent's Email Id.: </span><?php echo $parentEmail; ?></li>
							<li class="list-group-item"><span class="fw-bold">Date of Birth: </span><?php echo $dob; ?></li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div class="card-block px-2 mt-3 mx-3">
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><span class="fw-bold">Permanant Address: </span><?php echo $permanentAddress; ?></li>
							<li class="list-group-item"><span class="fw-bold">City: </span><?php echo $city; ?></li>
							<li class="list-group-item"><span class="fw-bold">Pincode: </span><?php echo $pincode; ?></li>
							<li class="list-group-item"><span class="fw-bold">District: </span><?php echo $district; ?></li>
							<li class="list-group-item"><span class="fw-bold">State: </span><?php echo $state; ?></li>
							<li class="list-group-item"><span class="fw-bold">Nationality: </span><?php echo $nationality; ?></li>
							<li class="list-group-item"><span class="fw-bold">Category: </span><?php echo $category; ?></li>
							<li class="list-group-item"><span class="fw-bold">Admission type: </span><?php echo $admissionType; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 text-center mb-3">
			<a href="../details/studentdetails.php?name=<?php echo $hostelName; ?>" class="mx-3 text-decoration-none">
				Back
			</a>
		</div>
	</div>
	<?php
	include("../warden/footer.php");
	?>
</body>

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
			<h5 class="h5 text-center mb-3 mt-3">Enrollment Number : 190170116000</h5>
			<h5 class="h5 text-center mb-3">Name: XYZ </h5>
			<div class="card border-secondary mb-3">
				<div class="row flex-row-reverse">
					<div class="col-auto">
						<img src="../images/dummy.jpg" class="mt-3" alt="Profile Image">
					</div>
					<div class="col order-md-1">
						<div class="card-block px-2 mt-3 mx-3 mb-3">
							<!--<p class="card-text"><span class="fw-bold">Branch: </span>Information Technology</p>
							<p class="card-text"><span class="fw-bold">Semester: </span>6</p>
							<p class="card-text"><span class="fw-bold">Course: </span>BE</p>
							<p class="card-text"><span class="fw-bold">Student's Mobile No.: </span>1112222111</p>
							<p class="card-text"><span class="fw-bold">Parent's Mobile No.: </span>1112222111</p>
							<p class="card-text"><span class="fw-bold">Student's Email Id: </span>aaa@gmail.com</p>
							<p class="card-text"><span class="fw-bold">Parent's Email Id.: </span>aaa@gmail.com</p>
							<p class="card-text"><span class="fw-bold">Date of Birth: </span>01-01-2001</p>-->
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><span class="fw-bold">Hostel Name: </span>Boys Hostel 1</li>
								<li class="list-group-item"><span class="fw-bold">Room Number: </span>1110</li>
								<li class="list-group-item"><span class="fw-bold">Branch: </span>Information Technology</li>
								<li class="list-group-item"><span class="fw-bold">Semester: </span>6</li>
								<li class="list-group-item"><span class="fw-bold">Course: </span>BE</li>
								<li class="list-group-item"><span class="fw-bold">Student's Mobile No.: </span>1112222111</li>
								<li class="list-group-item"><span class="fw-bold">Parent's Mobile No.: </span>1112222111</li>
								<li class="list-group-item"><span class="fw-bold">Student's Email Id: </span>aaa@gmail.com</li>
								<li class="list-group-item"><span class="fw-bold">Parent's Email Id.: </span>aaa@gmail.com</li>
								<li class="list-group-item"><span class="fw-bold">Date of Birth: </span>01-01-2001</li>
							</ul>
						</div>
					</div>
					<div class="col">
						<div class="card-block px-2 mt-3 mx-3">
							<!--<p class="card-text"><span class="fw-bold">Permanant Address: </span>A-1, Silicon Apartment, Near Gift City</p>
							<p class="card-text"><span class="fw-bold">City: </span>Ahmedabad</p>
							<p class="card-text"><span class="fw-bold">Pincode: </span>383838</p>
							<p class="card-text"><span class="fw-bold">District: </span>Ahmedabad</p>
							<p class="card-text"><span class="fw-bold">State: </span>Gujarat</p>
							<p class="card-text"><span class="fw-bold">Nationality: </span>Indian</p>
							<p class="card-text"><span class="fw-bold">Category: </span>Open</p>
							<p class="card-text mb-2"><span class="fw-bold">Admission type: </span>ACPC</p>-->
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><span class="fw-bold">Permanant Address: </span>A-1, Silicon Apartment, Near Gift City</li>
								<li class="list-group-item"><span class="fw-bold">City: </span>Ahmedabad</li>
								<li class="list-group-item"><span class="fw-bold">Pincode: </span>383838</li>
								<li class="list-group-item"><span class="fw-bold">District: </span>Ahmedabad</li>
								<li class="list-group-item"><span class="fw-bold">State: </span>Gujarat</li>
								<li class="list-group-item"><span class="fw-bold">Nationality: </span>Indian</li>
								<li class="list-group-item"><span class="fw-bold">Category: </span>Open</li>
								<li class="list-group-item"><span class="fw-bold">Admission type: </span>ACPC</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 text-center mb-3">
				<a href="../details/studentdetails.php" class="mx-3 text-decoration-none">
					Back
				</a>
			</div>
		</div>
		<?php
		include("../warden/footer.php");
		?>
	</body>
>>>>>>> 5db2347eeaacb2b46f3194cd0250a69d58bddc5f
</html>