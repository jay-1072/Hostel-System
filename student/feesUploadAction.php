<?php

include "../dbConn.php";

if (isset($_POST['submit-fees-btn'])) {
    $enrollmentNo = mysqli_real_escape_string($conn, $_POST['enrollment-no']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $hostelName = mysqli_real_escape_string($conn, $_POST['hostel-name']);
    $amountPaid = mysqli_real_escape_string($conn, $_POST['amount-paid']);
    $penalty = mysqli_real_escape_string($conn, $_POST['penalty-amount']);
    $DUReferenceNo = mysqli_real_escape_string($conn, $_POST['DU-reference-no']);
    $paymentDate = mysqli_real_escape_string($conn, $_POST['payment-date']);
    $status = "Pending";

    //for add multipart-data
    $file = $enrollmentNo . "_Sem_" . $semester . "_" . basename($_FILES['file']['name']);
    $target_file = "./../upload/" . $file;
    $file_path = "/upload/" . $file;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        try {
            $sql1 = "SELECT * FROM fees WHERE enrollment_no = ? AND semester = ? AND status = 'Reject'";
            $stmt = $conn->prepare($sql1);
            $stmt->bind_param("si", $enrollmentNo, $semester);
            $result = $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 0) {
                // if not found same entry.
                $sql = "INSERT INTO `fees`(enrollment_no, semester, hostel_name, amount_paid, penalty, payment_date, DU_reference_no, receipt, status) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sisiissss", $enrollmentNo, $semester, $hostelName, $amountPaid, $penalty, $paymentDate, $DUReferenceNo, $file_path, $status);
            } 
            else {
                // if rejected then only it will be found
                $sql = "UPDATE `fees` SET penalty = ?, payment_date = ?, DU_reference_no = ?, receipt = ?, status = ? WHERE enrollment_no = ? AND semester = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isssssi", $penalty, $paymentDate, $DUReferenceNo, $file_path, $status, $enrollmentNo, $semester);

            }

            // $sql = "INSERT INTO `fees`(enrollment_no, semester, hostel_name, amount_paid, penalty, payment_date, DU_reference_no, receipt, status) VALUES (?,?,?,?,?,?,?,?,?)";
            // $stmt = $conn->prepare($sql);
            // $stmt->bind_param("sisiissss", $enrollmentNo, $semester, $hostelName, $amountPaid, $penalty, $paymentDate, $DUReferenceNo, $file_path, $status);
            $stmt->execute();
            header("location: feesdetailform.php");
        } catch (Exception $e) {
            print_r($e);
        }
    }
}
