<?php

    require('../dbConn.php');

    if(isset($_POST['login'])) {
        $username = trim($_POST["username"], " ");
		$password = trim($_POST["password"], " ");

        $sql = "SELECT * FROM warden_login WHERE username='" . $username . "'";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$tmpUname = trim($row["username"], " ");
				$tmpPass = trim($row["password"], " ");
			}
			if($tmpUname==$username && password_verify($password, $tmpPass)) {
				echo "<script>alert('Login successfully');window.location.href = '../Warden/test.php';</script>";
			}
			else {
				echo "<script>alert('Please check your credentials');window.location.href = '../Warden/loginPage.php';</script>";
			}
		}
		else {
			echo "<script>alert('Warden not found');</script>";
		}

    }

?>