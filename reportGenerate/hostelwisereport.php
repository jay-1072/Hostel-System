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
 
$sql = "SELECT * FROM `hostel-portal`.hostel_student_details JOIN `hostel-portal`.hostel_master 
ON `hostel-portal`.hostel_student_details.room_no = `hostel-portal`.hostel_master.room_no join `student-database`.student_details 
on `hostel-portal`.hostel_student_details.enrollment_no = `student-database`.student_details.enrollment_no 
AND `hostel-portal`.hostel_master.hostel_name = ? ORDER BY `hostel-portal`.hostel_master.room_no";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $hostelName);
$stmt->execute();
$result = $stmt->get_result(); 
if($result->num_rows > 0 ){ 
    $delimiter = ","; 
    $filename = "hostelwise_details_" . $hostelName ."_". date('Y-m-d') . ".csv"; 
     
    $f = fopen('php://memory', 'w'); 
     
    $fields = array('Room No', 'Enrollment No', 'Name', 'Branch','Semester','Course','Admission Date', 'Release Date'); 
    fputcsv($f, $fields, $delimiter); 
     
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['room_no'], $row['enrollment_no'], $row['first_name'], $row['branch'], 
        $row['semester'],$row['course'],$row['occupancy_date'],$row['release_date']); 
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