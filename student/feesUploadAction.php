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

    try {
        $sql = "INSERT INTO `fees`(enrollment_no, semester, hostel_name, amount_paid, penalty, payment_date, DU_reference_no, status) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisiisss", $enrollmentNo, $semester, $hostelName, $amountPaid, $penalty, $paymentDate, $DUReferenceNo, $status);
        $stmt->execute();
        header("location: feesdetailform.php");
    } catch (Exception $e) {
        print_r($e);
    }
}
