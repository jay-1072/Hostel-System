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

							$sqlbh1tr = "SELECT COUNT(room_no) AS roomtotalbh1tr FROM hostel_master where hostel_name='BH-1'";
							$resultbh1tr = mysqli_query($conn, $sqlbh1tr);
							$valuesbh1tr = mysqli_fetch_assoc($resultbh1tr);
							$num_rowsbh1tr = $valuesbh1tr['roomtotalbh1tr'];
							echo '<tr><th scope="row"> Total Rooms </th>';
							if ($num_rowsbh1tr > 0) {
								echo '<td>' . $num_rowsbh1tr . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh1tr . '</td>';
							}
							echo '</tr>';

							//$sqlbh1ts = "SELECT SUM(no_of_occupancy) AS studenttotalbh1ts FROM hostel_master where hostel_name='BH-1'";
							$sqlbh1ts = "SELECT COUNT(enrollment_no) AS studenttotalbh1ts FROM hostel_student_details where hostel_name='BH-1'";
							$resultbh1ts = mysqli_query($conn, $sqlbh1ts);
							$valuesbh1ts = mysqli_fetch_assoc($resultbh1ts);
							$num_rowsbh1ts = $valuesbh1ts['studenttotalbh1ts'];
							echo '<tr><th scope="row"> Total Students </th>';
							if ($num_rowsbh1ts > 0) {
								echo '<td>' . $num_rowsbh1ts . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh1ts . '</td>';
							}
							echo '</tr>';

							$sqlbh1to = "SELECT SUM(no_of_occupancy) AS occupancytotalbh1to FROM hostel_master where hostel_name='BH-1'";
							$resultbh1to = mysqli_query($conn, $sqlbh1to);
							$valuesbh1to = mysqli_fetch_assoc($resultbh1to);
							$num_rowsbh1to = $valuesbh1to['occupancytotalbh1to'];
							echo '<tr><th scope="row"> Total Occupancy </th>';
							if ($num_rowsbh1to > 0) {
								echo '<td>' . $num_rowsbh1to . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh1to . '</td>';
							}
							echo '</tr>';

							$sqlbh1tv = "SELECT SUM(no_of_occupancy-3) AS vacancytotalbh1tv FROM hostel_master where hostel_name='BH-1'";
							$resultbh1tv = mysqli_query($conn, $sqlbh1tv);
							$valuesbh1tv = mysqli_fetch_assoc($resultbh1tv);
							$num_rowsbh1tv = $valuesbh1tv['vacancytotalbh1tv'];
							echo '<tr><th scope="row"> Total Vacancy </th>';
							if ($num_rowsbh1tv > 0) {
								echo '<td>' . $num_rowsbh1tv . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh1tv . '</td>';
							}
							echo '</tr>';
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

							$sqlbh2tr = "SELECT COUNT(room_no) AS roomtotalbh2tr FROM hostel_master where hostel_name='BH-2'";
							$resultbh2tr = mysqli_query($conn, $sqlbh2tr);
							$valuesbh2tr = mysqli_fetch_assoc($resultbh2tr);
							$num_rowsbh2tr = $valuesbh2tr['roomtotalbh2tr'];
							echo '<tr><th scope="row"> Total Rooms </th>';
							if ($num_rowsbh2tr > 0) {
								echo '<td>' . $num_rowsbh2tr . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh2tr . '</td>';
							}
							echo '</tr>';

							//$sqlbh2ts = "SELECT SUM(no_of_occupancy) AS studenttotalbh2ts FROM hostel_master where hostel_name='BH-2'";
							$sqlbh2ts = "SELECT COUNT(enrollment_no) AS studenttotalbh2ts FROM hostel_student_details where hostel_name='BH-2'";
							$resultbh2ts = mysqli_query($conn, $sqlbh2ts);
							$valuesbh2ts = mysqli_fetch_assoc($resultbh2ts);
							$num_rowsbh2ts = $valuesbh2ts['studenttotalbh2ts'];
							echo '<tr><th scope="row"> Total Students </th>';
							if ($num_rowsbh2ts > 0) {
								echo '<td>' . $num_rowsbh2ts . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh2ts . '</td>';
							}
							echo '</tr>';

							$sqlbh2to = "SELECT SUM(no_of_occupancy) AS occupancytotalbh2to FROM hostel_master where hostel_name='BH-2'";
							$resultbh2to = mysqli_query($conn, $sqlbh2to);
							$valuesbh2to = mysqli_fetch_assoc($resultbh2to);
							$num_rowsbh2to = $valuesbh2to['occupancytotalbh2to'];
							echo '<tr><th scope="row"> Total Occupancy </th>';
							if ($num_rowsbh2to > 0) {
								echo '<td>' . $num_rowsbh2to . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh2to . '</td>';
							}
							echo '</tr>';

							$sqlbh2tv = "SELECT SUM(no_of_occupancy-3) AS vacancytotalbh2tv FROM hostel_master where hostel_name='BH-2'";
							$resultbh2tv = mysqli_query($conn, $sqlbh2tv);
							$valuesbh2tv = mysqli_fetch_assoc($resultbh2tv);
							$num_rowsbh2tv = $valuesbh2tv['vacancytotalbh2tv'];
							echo '<tr><th scope="row"> Total Vacancy </th>';
							if ($num_rowsbh2tv > 0) {
								echo '<td>' . $num_rowsbh2tv . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsbh2tv . '</td>';
							}
							echo '</tr>';
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

							$sqlghtr = "SELECT COUNT(room_no) AS roomtotalghtr FROM hostel_master where hostel_name='GH'";
							$resultghtr = mysqli_query($conn, $sqlghtr);
							$valuesghtr = mysqli_fetch_assoc($resultghtr);
							$num_rowsghtr = $valuesghtr['roomtotalghtr'];
							echo '<tr><th scope="row"> Total Rooms </th>';
							if ($num_rowsghtr > 0) {
								echo '<td>' . $num_rowsghtr . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsghtr . '</td>';
							}
							echo '</tr>';

							//$sqlghts = "SELECT SUM(no_of_occupancy) AS studenttotalghts FROM hostel_master where hostel_name='GH'";
							$sqlghts = "SELECT COUNT(enrollment_no) AS studenttotalghts FROM hostel_student_details where hostel_name='GH'";
							$resultghts = mysqli_query($conn, $sqlghts);
							$valuesghts = mysqli_fetch_assoc($resultghts);
							$num_rowsghts = $valuesghts['studenttotalghts'];
							echo '<tr><th scope="row"> Total Students </th>';
							if ($num_rowsghts > 0) {
								echo '<td>' . $num_rowsghts . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsghts . '</td>';
							}
							echo '</tr>';

							$sqlghto = "SELECT SUM(no_of_occupancy) AS occupancytotalghto FROM hostel_master where hostel_name='GH'";
							$resultghto = mysqli_query($conn, $sqlghto);
							$valuesghto = mysqli_fetch_assoc($resultghto);
							$num_rowsghto = $valuesghto['occupancytotalghto'];
							echo '<tr><th scope="row"> Total Occupancy </th>';
							if ($num_rowsghto > 0) {
								echo '<td>' . $num_rowsghto . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsghto . '</td>';
							}
							echo '</tr>';

							$sqlghtv = "SELECT SUM(no_of_occupancy-3) AS vacancytotalghtv FROM hostel_master where hostel_name='GH'";
							$resultghtv = mysqli_query($conn, $sqlghtv);
							$valuesghtv = mysqli_fetch_assoc($resultghtv);
							$num_rowsghtv = $valuesghtv['vacancytotalghtv'];
							echo '<tr><th scope="row"> Total Vacancy </th>';
							if ($num_rowsghtv > 0) {
								echo '<td>' . $num_rowsghtv . '</td>';
							} else {
								echo '<td style="color:red">' . $num_rowsghtv . '</td>';
							}
							echo '</tr>';
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<p>Here, total students are 212 and occupancy is 720 that means here one student has multiple
		occupancy. -- check
	</p>

	</div>
	<?php
	include("footer.php");
	?>
</body>

</html>