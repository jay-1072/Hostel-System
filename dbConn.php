<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "hostel-portal";
	$st_database = "student-database";

	$conn = new mysqli($servername, $username, $password, $database);
	$st_conn = new mysqli($servername, $username, $password, $st_database);

	if ($conn->connect_error || $st_conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$encryptionKey = "Hostel-VGEC";
	$initVector = "1234567891011121";
	$encryptionAlgo = "AES-128-CTR";

?>