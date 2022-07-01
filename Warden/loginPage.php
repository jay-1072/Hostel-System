<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header("location:Dashboard.php");
}

$error = "";

if (isset($_POST['login'])) {
	require('../dbConn.php');
	$username = trim($conn->real_escape_string($_POST['username']));
	$password = trim($conn->real_escape_string($_POST['password']));

	try {
		$sql = "SELECT * FROM user_details WHERE username=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['password'] == $password) {
					$_SESSION['username'] = $username;
					$_SESSION['loggedin'] = true;
					header("location: ./Dashboard.php");
				} else {
					$error = "Wrong password";
				}
			}
		} else {
			$error = "Username doesn't exist";
		}
	} catch (Exception $e) {
		echo $e->getMessage();
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
</head>

<body>
	<?php
	include("header.php");
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item mx-2">
						<a class="nav-link text-black" aria-current="page" href="./index.php">Home</a>
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
					<h5 class="card-title text-center">Sign In</h5>

					<?php
					if ($error) {
						echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $error . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
					}
					?>

					<div class="textbox mx-2 my-2">
						<input class="my-3 w-100 px-2 py-2 bg-white text-dark border border-1" type="text" name="username" placeholder="Username" required>
						<input class="my-3 w-100 px-2 py-2 bg-white text-dark border border-1" type="password" name="password" placeholder="Password" required>
					</div>
					<div class="loginbutton mx-2 my-2">
						<input type="submit" style="background-color: #70a7ff;" class="fw-bold w-100 my-3 rounded-pill border-0 py-2" name="login" value="Login" class="button">
					</div>
					<div class="forgotPass mx-2 my-2 text-end">
						<a class="border-0 text-decoration-none " href="forgotPassword.php" id="forgot-link">Forgot Password?</a>
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