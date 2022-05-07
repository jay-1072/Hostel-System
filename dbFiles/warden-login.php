<?php

	// session_start();

    require('../dbConn.php');

    if(isset($_POST['login'])) {
        $username = trim($_POST["username"], " ");
		$password = trim($_POST["password"], " ");

        $sql = "SELECT * FROM warden_login WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$tmpUname = trim($row["username"], " ");
				$tmpPass = trim($row["password"], " ");
			}
			if($tmpUname==$username && password_verify($password, $tmpPass)) {

				// $_SESSION['user']=$username;

				echo "<script>alert('Login successfully');window.location.href = '../Warden/home.php';</script>";
			}
			else {
				echo "<script>alert('Please check your password');window.location.href = '../Warden/loginPage.php';</script>";
			}
		}
		else {
			echo "<script>alert('please check your username or password');window.location.href = '../Warden/loginPage.php';</script>";
		}

    }

?>