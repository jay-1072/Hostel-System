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
 
$sql = "";
$stmt = $st_conn->prepare($sql);
$stmt->bind_param("s", $hostelName);
$stmt->execute();
$result = $stmt->get_result(); 
if($result->num_rows > 0 ){ 
    $delimiter = ","; 
    $filename = "student_details_" . $hostelName ."_". date('Y-m-d') . ".csv"; 
     
    $f = fopen('php://memory', 'w'); 
     
    $fields = array('Room No', 'Enrollment No', 'Admission Date', 'Release Date', 'Branch'); 
    fputcsv($f, $fields, $delimiter); 
     
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['room_no'], $row['enrollment_no'], $row['occupancy_date'],$row['release_date'], $row['branch']); 
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
