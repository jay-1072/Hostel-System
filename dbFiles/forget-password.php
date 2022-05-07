<?php

    require('../dbConn.php');

    if(isset($_POST['newPass'])) {
        $username = trim($_POST["username"], " ");
        $to_email = trim($_POST["email"], " ");

        if($to_email=="" || $username=="") {
            echo "<script>alert('All feilds are required');window.location.href = '../Warden/forgotPassword.php';</script>";
        }
        else {
            $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string_shuffled = str_shuffle($string);
            $password = substr($string_shuffled, 1, 7);
            $subject = "Password Change";
            $body = 'New password : ' . $password;
            $headers = "From: jaykoshti43@gmail.com";

            $newPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE warden_login SET password=? WHERE username=?";
            $stmt= $conn->prepare($sql);
            $stmt->bind_param("ss", $newPassword, $username);
            $stmt->execute();

            if (mail($to_email, $subject, $body, $headers)) {
                echo "<script>alert('Your password changed successfully');window.location.href = '../Warden/loginPage.php';</script>";
            }
            else {
                echo "<script>alert('Password not sent try again');window.location.href = '../Warden/forgotPassword.php';</script>";
            }
            
        }
    }

   
    
    

    
  //   require('../dbConn.php');

  //   $username = trim($_POST["username"], " ");
  //   $password = trim($_POST['password'], " ");
  //   $confirmPassword = trim($_POST['confirmPassword'], " ");

  //   if($username=="" || $password=="" || $confirmPassword=="") {
  //       echo "<script>alert('All fieds are required');window.location.href = '../Warden/forgetPassword.php';</script>";
  //   }

  //   if($password!=$confirmPassword) {
  //   	echo "<script>alert('Both password should be the same');window.location.href = '../Warden/forgetPassword.php';</script>";
  //   }
  //   else {

  //   	$newPassword = password_hash($password, PASSWORD_DEFAULT);

  //   	$sql1 = "SELECT * FROM warden_login WHERE username=?";
  //   	$stmt = $conn->prepare($sql1);
  //       $stmt->bind_param("s", $username);
  //       $stmt->execute();
  //       $result = $stmt->get_result();
		// $rows = $result->num_rows;

  //       if($rows>0) {

  //       	$sql2 = "UPDATE warden_login SET password=? WHERE username=?";
  //       	$stmt= $conn->prepare($sql2);
  //       	$stmt->bind_param("ss", $newPassword, $username);
  //       	$stmt->execute();

  //       	echo "<script>alert('Your password changed successfully');window.location.href = '../Warden/loginPage.php';</script>";
  //       }
  //   } 
      
  //   $conn->close();
?>