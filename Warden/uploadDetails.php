<?php
include "./auth.php";
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
    include("utilities/navbar.php");
    ?>

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

                $sql = "select * from `hostel_student_details` where enrollment_no=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $enrollment);

                foreach ($data as $row) {
                    $enrollment = $row[6];
                    $room_no = $row[14];
                    $stmt->execute();
                    $stmt->store_result();
                    if ($stmt->num_rows() == 0) {
                        $sql1 = "INSERT INTO `hostel_student_details`(`enrollment_no`, `hostel_name`, `room_no`, `occupancy_date`, `release_date`) VALUES (?,?,?,'','')";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->bind_param("ssi", $enrollment, $_POST['hostel'], $room_no);
                        // $enrollment_no = $row[6];
                        $stmt1->execute();
                    } else {
                        $sql2 = "UPDATE `hostel_student_details` set `hostel_name`=?, `room_no`=? WHERE enrollment_no = ?";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->bind_param("sis", $_POST['hostel'], $room_no, $enrollment_no);
                        // $enrollment_no2 = $row[6];
                        // $room_no = $row[14];
                        $stmt2->execute();
                    }
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
            <input type="submit" name="submit" class="form-control btn btn-success">
        </form>
    </div>


    <!-- footer -->
    <?php
    include("footer.php");
    ?>
</body>

</html>