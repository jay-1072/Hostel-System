<?php

    require('../dbConn.php');
    require('../dbConn.php');

    if(isset($_POST['login'])) {
        $Eid = $_POST['username'];
		$Pass = $_POST["password"];

        $sql = "SELECT * FROM warden_login WHERE email='" . $Eid . "'";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$tmpEid = trim($row["email"], " ");
				$tmpPass = trim($row["password"], " ");
			}
			if($tmpEid==$Eid && $tmpPass==$Pass) {
				echo "<script>alert('Login successfully');window.location.href = '../Warden/index.php';</script>";
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