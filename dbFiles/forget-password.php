<?php

require('../dbConn.php');

$username = "warden123@gmail.com";
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if ($password != $confirmPassword) {
    echo "<script>alert('Both password should be the same');window.location.href = '../Warden/forgetPassword.php';</script>";
} else {

    $newPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql1 = "SELECT * FROM warden_login WHERE username=?";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->num_rows;

    if ($rows > 0) {

        $sql2 = "UPDATE warden_login SET password=? WHERE username=?";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param("ss", $newPassword, $username);
        $stmt->execute();

        echo "<script>alert('Your password changed successfully');window.location.href = '../Warden/loginPage.php';</script>";
    } elseif ($rows == 0) {

        $sql3 = "INSERT INTO warden_login (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql3);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        echo "<script>alert('Your password changed successfully');window.location.href = '../Warden/loginPage.php';</script>";
    }
}

$conn->close();
?>