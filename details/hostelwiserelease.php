<?php
include "../dbConn.php";
$hostelName = $_GET['name'];
$fullHostelName = '';
$flag = true;

switch ($hostelName) {
    case 'BH-1':
        $fullHostelName = 'Boys Hostel 1';
        break;
    case 'BH-2':
        $fullHostelName = 'Boys Hostel 2';
        break;
    case 'GH':
        $fullHostelName = 'Girls Hostel';
        break;
}

if (isset($_POST['submit']) && isset($_POST['enroll_numbers'])) {
    $enroll_numbers = $_POST['enroll_numbers'];
    $date = date('Y-m-d');
    if (sizeof($enroll_numbers)) {
        foreach ($enroll_numbers as $enrollment) {
            $query = "UPDATE `hostel_student_details` SET release_date=? WHERE enrollment_no=?";
            $st = $conn->prepare($query);
            $st->bind_param("ss", $date, $enrollment);
            $st->execute();
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Portal</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <?php
    include("../warden/header.php");
    ?>
    <hr />
    <div class="container">
        <h3 class="text-center mt-3 mb-2 text-primary">Hostel Details</h3>
        <h5 class="text-center mt-3 mb-2 text-primary"><?php echo $fullHostelName; ?></h5>
        <form method="POST">
            <div class="table-responsive my-5">
                <table class="table table-bordered table-hover table-striped mt-3 text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>
                                Select All
                                <input type="checkbox" name="allselect" id="allselect">
                            </th>
                            <th scope="col">Enrollment Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $sql = "SELECT * FROM hostel_student_details WHERE hostel_name=? AND release_date='0000-00-00'";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $hostelName);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {

                                $newSql = "SELECT * FROM student_details WHERE enrollment_no =? and semester=8";
                                // $newStmt = $st_conn->prepare($newSql);
                                $newStmt = $conn->prepare($newSql);
                                $newStmt->bind_param("s", $row['enrollment_no']);
                                $newStmt->execute();
                                $newResult = $newStmt->get_result();

                                if ($newResult->num_rows > 0) {

                                    $flag = false;
                                    while ($newRow = $newResult->fetch_assoc()) {

                                        echo '<tr>
                                        <td><input type="checkbox" class="checkbox" name="enroll_numbers[]" value="' . $row['enrollment_no'] . '"/></td>
                                        <td>' . $newRow['enrollment_no'] . '</td>
                                        <td>' . $newRow['first_name'] . ' ' .  $newRow['middle_name'] . ' ' . $newRow['last_name'] .  '</td>
                                        <td>' . $newRow['branch'] . '</td>
                                        </tr>';
                                    }
                                }
                            }
                            $conn->close();
                            // $st_conn->close();
                        }

                        if ($flag)
                            echo "<tr><td colspan='4'>No data found!</td></tr>";
                        ?>
                    </tbody>
                </table>
                <div class="col-12 text-center">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info" />
                    <a href="../warden/release-student.php" class="mx-3 text-decoration-none">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>
    <?php
    include("../warden/footer.php");
    ?>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#allselect').click(function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    $('.checkbox').prop('checked', true);
                })
            } else {
                $('.checkbox').each(function() {
                    $('.checkbox').prop('checked', false);
                })
            }
        });
    });
</script>

</html>