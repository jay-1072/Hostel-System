<?php
include "./auth.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hostel Portal</title>
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
</head>

<body>
	<?php
	include("header.php");
	include("utilities/navbar.php");
	?>

	<div class="container">
		<h5 class="text-center mt-4 text-danger fs-2">Overall Details</h5>
		<div class="row justify-content-md-center">
			<div class="col-sm-6">
				<div class="table-responsive ">
					<table class="table table-bordered table-hover table-striped mt-3 align-middle text-center" id="myTable">
						<tbody>
							<?php
							include "../dbConn.php";

							try {
								$sql = "SELECT COUNT(room_no) AS roomtotal FROM hostel_master";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$result = $stmt->get_result();
								if ($result->num_rows > 0) {
									$values = $result->fetch_assoc();
									$num_rows = $values['roomtotal'];
									echo '<tr><th scope="row"> Total Rooms </th>';
									if ($num_rows > 0) {
										echo '<td>' . $num_rows . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rows . '</td>';
									}
									echo '</tr>';
								}
							} catch (Exception $e) {
								echo $e->getMessage();
							}

							try {
								$sql1 = "SELECT COUNT(enrollment_no) AS studenttotal FROM hostel_student_details";
								$stmt1 = $conn->prepare($sql1);
								$stmt1->execute();
								$result1 = $stmt1->get_result();
								if ($result1->num_rows > 0) {
									$values1 = $result1->fetch_assoc();
									$num_rows1 = $values1['studenttotal'];
									echo '<tr><th scope="row"> Total Students </th>';
									if ($num_rows1 > 0) {
										echo '<td>' . $num_rows1 . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rows1 . '</td>';
									}
									echo '</tr>';
								}
							} catch (Exception $e) {
								echo $e->getMessage();
							}

							try {
								$sql2 = "SELECT SUM(no_of_occupancy) AS occupancytotal FROM hostel_master";
								$stmt2 = $conn->prepare($sql2);
								$stmt2->execute();
								$result2 = $stmt2->get_result();
								if ($result2->num_rows > 0) {
									$values2 = $result2->fetch_assoc();
									$num_rows2 = $values2['occupancytotal'];
									echo '<tr><th scope="row"> Total Occupancy </th>';
									if ($num_rows2 > 0) {
										echo '<td>' . $num_rows2 . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rows2 . '</td>';
									}
									echo '</tr>';
								}
							} catch (Exception $e) {
								echo $e->getMessage();
							}

							try {
								$sql3 = "SELECT SUM(no_of_occupancy-3) AS vacancytotal FROM hostel_master";
								$stmt3 = $conn->prepare($sql3);
								$stmt3->execute();
								$result3 = $stmt3->get_result();
								if ($result3->num_rows > 0) {
									$values3 = $result3->fetch_assoc();
									$num_rows3 = $values3['vacancytotal'];
									echo '<tr><th scope="row"> Total Vacancy </th>';
									if ($num_rows3 > 0) {
										echo '<td>' . $num_rows3 . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rows3 . '</td>';
									}
									echo '</tr>';
								}
							} catch (Exception $e) {
								echo $e->getMessage();
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row mb-4">
				<div class="col-sm">
					<div class="table-responsive mt-3">
						<table class="table table-bordered table-hover table-light mt-3 align-middle text-center" id="myTable">
							<thead>
								<tr>
									<th colspan="2">Boys Hostel 1</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include "../dbConn.php";

								try {
									$sqlbh1tr = "SELECT COUNT(room_no) AS roomtotalbh1tr FROM hostel_master where hostel_name=?";
									$hostelName = "BH-1";
									$stmt = $conn->prepare($sqlbh1tr);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh1tr = $result->fetch_assoc();
										$num_rowsbh1tr = $valuesbh1tr['roomtotalbh1tr'];
										echo '<tr><th scope="row"> Total Rooms </th>';
										if ($num_rowsbh1tr > 0) {
											echo '<td>' . $num_rowsbh1tr . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh1tr . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								//$sqlbh1ts = "SELECT SUM(no_of_occupancy) AS studenttotalbh1ts FROM hostel_master where hostel_name='BH-1'";
								try {
									$sqlbh1ts = "SELECT COUNT(enrollment_no) AS studenttotalbh1ts FROM hostel_student_details where hostel_name=?";
									$hostelName = "BH-1";
									$stmt = $conn->prepare($sqlbh1ts);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh1ts = $result->fetch_assoc();
										$num_rowsbh1ts = $valuesbh1ts['studenttotalbh1ts'];
										echo '<tr><th scope="row"> Total Students </th>';
										if ($num_rowsbh1ts > 0) {
											echo '<td>' . $num_rowsbh1ts . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh1ts . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								try {
									$sqlbh1to = "SELECT SUM(no_of_occupancy) AS occupancytotalbh1to FROM hostel_master where hostel_name=?";
									$hostelName = "BH-1";
									$stmt = $conn->prepare($sqlbh1to);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh1to = $result->fetch_assoc();
										$num_rowsbh1to = $valuesbh1to['occupancytotalbh1to'];
										echo '<tr><th scope="row"> Total Occupancy </th>';
										if ($num_rowsbh1to > 0) {
											echo '<td>' . $num_rowsbh1to . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh1to . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								try {
									$sqlbh1tv = "SELECT SUM(no_of_occupancy-3) AS vacancytotalbh1tv FROM hostel_master where hostel_name=?";
									$hostelName = "BH-1";
									$stmt = $conn->prepare($sqlbh1tv);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh1tv = $result->fetch_assoc();
										$num_rowsbh1tv = $valuesbh1tv['vacancytotalbh1tv'];
										echo '<tr><th scope="row"> Total Vacancy </th>';
										if ($num_rowsbh1tv > 0) {
											echo '<td>' . $num_rowsbh1tv . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh1tv . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm">
					<div class="table-responsive mt-3">
						<table class="table table-bordered table-hover table-light mt-3 align-middle text-center" id="myTable">
							<thead>
								<tr>
									<th colspan="2">Boys Hostel 2</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include "../dbConn.php";

								try {
									$sqlbh2tr = "SELECT COUNT(room_no) AS roomtotalbh2tr FROM hostel_master where hostel_name=?";
									$hostelName = "BH-2";
									$stmt = $conn->prepare($sqlbh2tr);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh2tr = $result->fetch_assoc();
										$num_rowsbh2tr = $valuesbh2tr['roomtotalbh2tr'];
										echo '<tr><th scope="row"> Total Rooms </th>';
										if ($num_rowsbh2tr > 0) {
											echo '<td>' . $num_rowsbh2tr . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh2tr . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								//$sqlbh2ts = "SELECT SUM(no_of_occupancy) AS studenttotalbh2ts FROM hostel_master where hostel_name='BH-2'";
								try {
									$sqlbh2ts = "SELECT COUNT(enrollment_no) AS studenttotalbh2ts FROM hostel_student_details where hostel_name=?";
									$hostelName = "BH-2";
									$stmt = $conn->prepare($sqlbh2ts);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh2ts = $result->fetch_assoc();
										$num_rowsbh2ts = $valuesbh2ts['studenttotalbh2ts'];
										echo '<tr><th scope="row"> Total Students </th>';
										if ($num_rowsbh2ts > 0) {
											echo '<td>' . $num_rowsbh2ts . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh2ts . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								try {
									$sqlbh2to = "SELECT SUM(no_of_occupancy) AS occupancytotalbh2to FROM hostel_master where hostel_name=?";
									$hostelName = "BH-2";
									$stmt = $conn->prepare($sqlbh2to);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh2to = $result->fetch_assoc();
										$num_rowsbh2to = $valuesbh2to['occupancytotalbh2to'];
										echo '<tr><th scope="row"> Total Occupancy </th>';
										if ($num_rowsbh2to > 0) {
											echo '<td>' . $num_rowsbh2to . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh2to . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								try {
									$sqlbh2tv = "SELECT SUM(no_of_occupancy-3) AS vacancytotalbh2tv FROM hostel_master where hostel_name=?";
									$hostelName = "BH-2";
									$stmt = $conn->prepare($sqlbh2tv);
									$stmt->bind_param("s", $hostelName);
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows > 0) {
										$valuesbh2tv = $result->fetch_assoc();
										$num_rowsbh2tv = $valuesbh2tv['vacancytotalbh2tv'];
										echo '<tr><th scope="row"> Total Vacancy </th>';
										if ($num_rowsbh2tv > 0) {
											echo '<td>' . $num_rowsbh2tv . '</td>';
										} else {
											echo '<td style="color:red">' . $num_rowsbh2tv . '</td>';
										}
										echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm">
					<div class="table-responsive mt-3">
						<table class="table table-bordered table-light table-hover mt-3 align-middle text-center" id="myTable">
							<thead>
								<tr>
									<th colspan="2">Girls Hostel</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include "../dbConn.php";

								try {
								$sqlghtr = "SELECT COUNT(room_no) AS roomtotalghtr FROM hostel_master where hostel_name=?";
								$hostelName = "GH";
								$stmt = $conn->prepare($sqlghtr);
								$stmt->bind_param("s", $hostelName);
								$stmt->execute();
								$result = $stmt->get_result();
								if ($result->num_rows > 0) {
									$valuesghtr = $result->fetch_assoc();
									$num_rowsghtr = $valuesghtr['roomtotalghtr'];
									echo '<tr><th scope="row"> Total Rooms </th>';
									if ($num_rowsghtr > 0) {
										echo '<td>' . $num_rowsghtr . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rowsghtr . '</td>';
									}
									echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								//$sqlghts = "SELECT SUM(no_of_occupancy) AS studenttotalghts FROM hostel_master where hostel_name='GH'";
								try {
								$sqlghts = "SELECT COUNT(enrollment_no) AS studenttotalghts FROM hostel_student_details where hostel_name=?";
								$hostelName = "GH";
								$stmt = $conn->prepare($sqlghts);
								$stmt->bind_param("s", $hostelName);
								$stmt->execute();
								$result = $stmt->get_result();
								if ($result->num_rows > 0) {
									$valuesghts = $result->fetch_assoc();
									$num_rowsghts = $valuesghts['studenttotalghts'];
									echo '<tr><th scope="row"> Total Students </th>';
									if ($num_rowsghts > 0) {
										echo '<td>' . $num_rowsghts . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rowsghts . '</td>';
									}
									echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								try {
								$sqlghto = "SELECT SUM(no_of_occupancy) AS occupancytotalghto FROM hostel_master where hostel_name=?";
								$hostelName = "GH";
								$stmt = $conn->prepare($sqlghto);
								$stmt->bind_param("s", $hostelName);
								$stmt->execute();
								$result = $stmt->get_result();
								if ($result->num_rows > 0) {
									$valuesghto = $result->fetch_assoc();
									$num_rowsghto = $valuesghto['occupancytotalghto'];
									echo '<tr><th scope="row"> Total Occupancy </th>';
									if ($num_rowsghto > 0) {
										echo '<td>' . $num_rowsghto . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rowsghto . '</td>';
									}
									echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}

								try {
								$sqlghtv = "SELECT SUM(no_of_occupancy-3) AS vacancytotalghtv FROM hostel_master where hostel_name=?";
								$hostelName = "GH";
								$stmt = $conn->prepare($sqlghtv);
								$stmt->bind_param("s", $hostelName);
								$stmt->execute();
								$result = $stmt->get_result();
								if ($result->num_rows > 0) {
									$valuesghtv = $result->fetch_assoc();
									$num_rowsghtv = $valuesghtv['vacancytotalghtv'];
									echo '<tr><th scope="row"> Total Vacancy </th>';
									if ($num_rowsghtv > 0) {
										echo '<td>' . $num_rowsghtv . '</td>';
									} else {
										echo '<td style="color:red">' . $num_rowsghtv . '</td>';
									}
									echo '</tr>';
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php
	include("footer.php");
	?>
</body>

</html>