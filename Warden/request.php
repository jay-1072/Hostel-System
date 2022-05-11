<?php include "./auth.php"; ?>

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
	include("header.php");
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
		<div class="container-fluid">
			<!--<a class="navbar-brand" href="#">Navbar</a>-->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item mx-2">
						<a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link" href="uploadDetails.php">Upload Student Data</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link active" href="#">Requests (0)</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link" href="report.php">Report</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link" href="../dbFiles/logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<h3 class="text-center mt-5 mb-2 text-danger">Remaining to check the fees details</h3>
		<div class="table-responsive">
			<table class="table table-bordered table-hover mt-3">
				<thead>
					<tr>
						<th scope="col">Hostel Name</th>
						<th scope="col">Room Number</th>
						<th scope="col">Enrollment Number</th>
						<th scope="col">Name</th>
						<th scope="col">Branch</th>
						<th scope="col">Semester</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include "../dbConn.php";
					$sql = "SELECT distinct(enrollment_no) FROM fees WHERE status = 'Pending'";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->get_result();
					if ($result->num_rows > 0) {
						$semester = "";
						while ($row = $result->fetch_assoc()) {
							$enrollmentNo = $row['enrollment_no'];

							$sql1 = "SELECT hostel_name, room_no FROM hostel_student_details WHERE enrollment_no = ?";
							$stmt1 = $conn->prepare($sql1);
							$stmt1->bind_param("s", $enrollmentNo);
							$stmt1->execute();
							$result1 = $stmt1->get_result();
							if ($result1->num_rows > 0) {
								$row1 = $result1->fetch_assoc();
								$hostelName = $row1['hostel_name'];
								$roomNo = $row1['room_no'];
							}

							$sql2 = "SELECT * FROM student_details WHERE enrollment_no = ?";
							$stmt2 = $st_conn->prepare($sql2);
							$stmt2->bind_param("s", $enrollmentNo);
							$stmt2->execute();
							$result2 = $stmt2->get_result();
							if ($result2->num_rows > 0) {
								$row2 = $result2->fetch_assoc();
								$name = $row2['first_name'] . " " . $row2['middle_name'] . " " . $row2['last_name'];
								$branch = $row2['branch'];
								$semester = $row2['semester'];
							}

							$encryptedMessage = openssl_encrypt($row['enrollment_no'], $encryptionAlgo, $encryptionKey, 0, $initVector);

							echo '<tr>
									<td>' . $hostelName . '</td>
									<td>' . $roomNo . '</td>
									<td>' . $enrollmentNo . '</td>
									<td>' . $name . '</td>
									<td>' . $branch . '</td>
									<td>' . $semester . '</td>
									<td><a href="feesAction.php?eno=' . $encryptedMessage . '" class="text-decoration-none">More</a></td>
								</tr>';
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<p>To do: when the warden is approve or reject the fees details it will be removed from here</p>
	<?php
	include("footer.php");
	?>
</body>

</html>