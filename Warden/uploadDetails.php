<?php

include("../dbConn.php");

?>

<!DOCTYPE html>
<html lang="en">

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

    <!-- navabar  -->
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
                        <a class="nav-link active" href="uploadDetails.php">Upload Student Data</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="request.php">Requests (0)</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="report.php">Report</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- body container -->
    <div class="p-4">

        <!-- for svg icon in bootstrap -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <?php
        require '../vendor/autoload.php';

        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
        use PhpOffice\PhpSpreadsheet\Writer\Csv;
        use PhpOffice\PhpSpreadsheet\Writer\Xls;

        $valid_ext = ['xlsx', 'csv', 'xls'];

        if (isset($_POST['submit'])) {
            $filename = $_FILES['file']['name'];
            $file = explode(".", $filename);
            $file_ext = end($file);

            if (in_array($file_ext, $valid_ext)) {
                $path = $_FILES['file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $data = array_slice($data, 1);

                if (isset($_POST['permission'])) {
                    $sql = "DELETE FROM `hostel_student_details`";
                    $res1 = mysqli_query($conn, $sql);
                    $sql = "DELETE FROM `fees`";
                    $res2 = mysqli_query($conn, $sql);

                    if (!$res1 && !$res2) {
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show mx-sm-5 px-md-5' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                            <strong>Oops! </strong>" . mysqli_error($conn)
                            . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                }

                // create sql statement template
                $sql = "INSERT INTO `hostel_student_details`(`enrollment_no`, `hostel_name`, `room_no`, `occupancy_date`, `release_date`) VALUES (?,?,?,'','')";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $enrollment_no, $_POST['hostel'], $room_no);

                foreach ($data as $row) {
                    $enrollment_no = $row[6];
                    $room_no = $row[14];
                    $res = $stmt->execute();
                }

                $sql = "INSERT INTO `fees`(`enrollment_no`, `semester`, `hostel_name`, `amount_paid`, `penalty`, `payment_date`, `DU_reference_no`, `receipt`, `status`, `remarks`) VALUES (?,?,?,?,0,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sisisssss", $enrollment_no, $semester, $_POST['hostel'], $amount_paid, $payment_date, $DU_reference_no, $receipt, $status, $remarks);
                foreach ($data as $row) {
                    $enrollment_no = $row[6];
                    $semester = $row[8];
                    $amount_paid = $row[4];
                    $payment_date = $row[3];
                    $DU_reference_no = $row[2];
                    $receipt = "";
                    $status = "";
                    $remarks = $row[21];
                    $res = $stmt->execute();
                }

                echo "
                    <div class='alert alert-success alert-dismissible fade show mx-sm-5 px-md-5' role='alert'>
                        Your data is successfully saved!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            } else {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show mx-sm-5 px-md-5' role='alert'>
                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                        <strong>Oops!</strong> Your file is not in .xls,.csv or .xlsx format.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }
        ?>

        <h2 class="text-center m-4">Upload student details</h2>
        <form action="./uploadDetails.php" method="post" class="mx-sm-5 px-md-5" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="hostel" class="form-label mx-2">Hostel Name: </label>
                <select name="hostel" class="form-select select w-75" id="hostel" style="display:inline !important;">
                    <option selected disabled>select</option>
                    <option value="BH-1">Boys Hostel 1</option>
                    <option value="BH-2">Boys Hostel 2</option>
                    <option value="GH-1">Girls Hostel 1</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="file" id="fileForm" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                <div id="fileForm" class="form-text">The file must be in .xls,.csv or .xlsx format</div>
            </div>
            <div class="mb-3">
                <input type="checkbox" class="mx-2" name="permission" id="permission">
                <label for="permission">Do you want to delete previous data-base?</label>
            </div>
            <input type="submit" name="submit" class="form-control btn btn-success">
        </form>
    </div>


    <!-- footer -->
    <?php
    include("footer.php");
    ?>
</body>

</html>