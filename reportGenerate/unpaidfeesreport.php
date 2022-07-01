<?php 

$hostelName = $_GET['name'];
$fullHostelName = '';

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

include '../dbConn.php'; 
 
try {
$sql = "SELECT * FROM fees join hostel_student_details ON fees.enrollment_no = hostel_student_details.enrollment_no JOIN student_details ON hostel_student_details.enrollment_no = student_details.enrollment_no WHERE fees.status = 'Unpaid' AND fees.hostel_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $hostelName);
$stmt->execute();
$result = $stmt->get_result(); 
if($result->num_rows > 0 ){ 

    $delimiter = ","; 
    $filename = "unpaid_fees_details_" . $hostelName ."_". date('Y-m-d') . ".csv"; 
     
    $f = fopen('php://memory', 'w'); 
     
    $fields = array('Room No', 'Enrollment No', 'First Name','Middle Name', 'Last Name', 'Branch', 'Semester', 'Course', 'Student Mobile No', 'Student Email'); 
    fputcsv($f, $fields, $delimiter); 
     
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['room_no'], $row['enrollment_no'], $row['first_name'], $row['middle_name'], $row['last_name'] , $row['branch'],
        $row['semester'], $row['course'], $row['student_mobile_no'], $row['student_email']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    fseek($f, 0); 
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 
} 
else{
    echo '<script>alert("No Data Available");
    window.location.href = "../Warden/report.php";</script>';
}
exit;
} catch (Exception $e) {
    echo $e->getMessage();
}