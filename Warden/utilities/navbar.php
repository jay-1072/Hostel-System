<?php
$filename = basename($_SERVER['REQUEST_URI']);

include "../dbConn.php";
$sql = "SELECT distinct(enrollment_no) FROM fees WHERE status = 'Pending'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$countRequest = $result->num_rows;

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo ($filename == 'Dashboard.php') ? 'active' : ''; ?>" aria-current="page" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo ($filename == 'uploadDetails.php') ? 'active' : ''; ?>" href="uploadDetails.php">Upload Student Data</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo ($filename == 'request.php') ? 'active' : ''; ?>" href="request.php">Requests (<?php echo $countRequest; ?>)</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo ($filename == 'report.php') ? 'active' : ''; ?>" href="report.php">Report</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?php echo ($filename == 'release-student.php') ? 'active' : ''; ?>" href="release-student.php">Release Student</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../dbFiles/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>