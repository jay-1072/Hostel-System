<?php

    require('../dbConn.php');

    $username = "warden123@gmail.com";
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($password!=$confirmPassword) {
    	echo "<script>alert('Both password should be the same');window.location.href = '../Warden/forgetPassword.php';</script>";
    }
    else {

    	$newPassword = password_hash($password, PASSWORD_DEFAULT);

    	$sql1 = "SELECT * FROM warden_login WHERE username = ('$username')";
		$result = $conn->query($sql1);
		$rows = $result->num_rows;

        if($rows>0) {

        	$sql2 = "UPDATE warden_login SET password=('$newPassword') WHERE username = ('$username')";
        	if ($conn->query($sql2) === TRUE) {
        		echo "<script>alert('Your password changed successfully');window.location.href = '../Warden/loginPage.php';</script>";
	    	} 
	    	else {
	        	echo "Error: " . $sql . "<br>" . $conn->error;
	    	}

        }
        elseif($rows==0) {

        	$sql3 = "INSERT INTO warden_login (username, password) VALUES ('$username', '$newPassword')";
        	if ($conn->query($sql3) === TRUE) {
        		echo "<script>alert('Your password changed successfully');window.location.href = '../Warden/loginPage.php';</script>";
	    	} 
	    	else {
	        	echo "Error: " . $sql . "<br>" . $conn->error;
	    	}
        }	
    	
    } 
      
    $conn->close();

?>