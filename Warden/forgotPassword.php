<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	echo "<script>history.go(-1)</script>";
}

$error = "";
$success = "";

if (isset($_POST['submit'])) {
	require('../dbConn.php');
	$username = trim($conn->real_escape_string($_POST['username']));

	$sql = "SELECT * FROM user_details WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$headers = "From: ssiphostel2425@gmail.com\r\n";

		$encryptedEmail = openssl_encrypt($row['email'], $encryptionAlgo, $encryptionKey, 0, $initVector);

		$message = "
			<html>
				<head>
					<title>HTML email</title>
				</head>
				<body>
					<h1>Hello," . $row['name'] . "</h1><br>
					<p><a href='localhost/Hostel-System/Warden/dbFiles/forget-password.php?id='$encryptedEmail'>Click here</a> to update your password</p>
				</body>
			</html>
		";

		$res = mail($row['email'], "Update password", $message, $headers);

		if ($res) {
			$success = "Email has been sent on your mail id!";
		} else {
			$error = "Oops! Something went wrong!!!";
		}
	} else {
		$error = "Username doesn't exist";
	}
}
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
		<div class="container-fluid">
			<!--<a class="navbar-brand" href="#">Navbar</a>-->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item mx-2">
						<a class="nav-link text-black" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link active" href="#">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mx-auto my-auto">
		<div class="card mx-auto shadow-sm" style="width: 18rem;">
			<div class="card-body ">
				<form method="POST" action=<?php echo $_SERVER['PHP_SELF']; ?>>
					<h5 class="card-title text-center">Forget Password</h5>

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
						<input class="my-3 w-100 px-2 py-2 bg-white text-dark border border-1" type="text" name="username" placeholder="Username" required>
					</div>
					<div class="loginbutton mx-2 my-2">
						<input type="submit" style="background-color: #70a7ff;" class="fw-bold w-100 my-3 rounded-pill border-0 py-2" name="submit" value="Submit" class="button">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	include("footer.php");
	?>
</body>

</html>