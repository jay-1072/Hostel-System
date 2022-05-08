<?php

include "../dbConn.php";
$eno = str_replace(" ", "+", $_GET['eno']);
$enrollmentNo = openssl_decrypt($eno, $encryptionAlgo, $encryptionKey, 0, $initVector);
echo $enrollmentNo;

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
	<?php
	include "../dbConn.php";
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
		}
	}
	?>
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
							<li class="list-group-item"><span class="fw-bold">Hostel Name: </span>Boys Hostel 1</li>
							<li class="list-group-item"><span class="fw-bold">Room Number: </span>1110</li>
							<li class="list-group-item"><span class="fw-bold">Branch: </span><?php echo $branch; ?></li>
							<li class="list-group-item"><span class="fw-bold">Semester: </span><?php echo $semester; ?></li>
							<li class="list-group-item"><span class="fw-bold">Course: </span><?php echo $course; ?></li>
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

</html>