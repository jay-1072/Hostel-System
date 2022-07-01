<?php

require('../dbConn.php');
$error = "";
$success = "";

if (isset($_POST['submit'])) {

    if (isset($_GET['id'])) {

        try {
            $email = openssl_decrypt($_GET['id'], $encryptionAlgo, $encryptionKey, 0, $initVector);
            $sql = "select * from user_details where email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows() > 0) {
                    $sql = "UPDATE `user_details` set password=? where email=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $_POST['password'], $email);
                    if ($stmt->execute()) {
                        $success = "Password has been updated!";
                        header("location:/Hostel-system/Warden/");
                    } else {
                        $error = "Something went wrong...";
                    }
                } else {
                    $error = "Invalid Token...";
                }
            } else {
                $error = "Something went wrong...";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        $error = "Something went wrong...";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Portal</title>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div class="container mx-auto my-auto">
        <div class="card mx-auto shadow-sm" style="width: 18rem;">
            <div class="card-body ">
                <form method="POST" onsubmit="return verifyPass()">
                    <h5 class="card-title text-center">Update Password</h5>

                    <?php
                    if ($error) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $error . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
                    } else if ($success) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $success . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
                    }
                    ?>

                    <div class="textbox mx-2 my-2">
                        <input class="my-3 w-100 px-2 py-2 bg-white text-dark border border-1" type="password" id="pass" name="password" placeholder="Password" required>
                    </div>
                    <div class="textbox mx-2 my-2">
                        <input class="my-3 w-100 px-2 py-2 bg-white text-dark border border-1" type="text" id="repass" placeholder="Re-Password" required>
                    </div>
                    <div class="loginbutton mx-2 my-2">
                        <input type="submit" style="background-color: #70a7ff;" class="fw-bold w-100 my-3 rounded-pill border-0 py-2" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
    <script>
        const verifyPass = () => {
            const pass = document.getElementById('pass').value;
            const repass = document.getElementById('repass').value;

            if (pass !== repass) {
                alert("Password and re-password should be same...");
                return false;
            }
        }
    </script>
</body>

</html>