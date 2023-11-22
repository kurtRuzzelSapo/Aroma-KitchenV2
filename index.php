<!DOCTYPE html>

<?php
// Include your database connection file or create a PDO connection here
include('C:\Users\Administrator\Downloads\xammp\htdocs\Aroma-Kitchen\connection.php');
// $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Initialize variables
$registrationErrors = [];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Include the process.php file to handle form processing
    include('php\process.php');
}

// Check if the registration success session variable is set
if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
    $registrationSuccessMessage = $_SESSION['registration_success'];
    // Unset the session variable to avoid displaying the message again on page reload
    unset($_SESSION['registration_success']);
}

// Check if the registration error session variable is set
if (isset($_SESSION['registration_error']) && $_SESSION['registration_error']) {
    $registrationErrorMessage = $_SESSION['registration_error'];
    // Unset the session variable to avoid displaying the message again on page reload
    unset($_SESSION['registration_error']);
}

?>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="./assets/Logo.png" type="image/x-icon" />
		<link rel="stylesheet" href="./style/style.css" />
		<title>Aroma Kitchen</title>
	</head>
	<body>
		<div class="container">
			<!-- left-card -->
			<div class="left-card">
				<img class="logo" src="./assets/Logo.png" alt="" />
				<div class="login">
					<h1 class="title">Hey There!</h1>
					<p class="description">Login to get started in Aroma Kitchen</p>

					<form action="" method="post">
						<input
							type="text"
							name="username"
							class="username"
							placeholder="Your username"
							required />
						<input
							type="password"
							name="password"
							class="password"
							placeholder="Your password"
							required />

						<button class="login-button" type="submit">Login</button>
					</form>
					<!-- <p class="sign-up-link">
						Don't have an account? <a href="./pages/signup.html">Sign up</a>
					</p> -->
					<p class="sign-up-link">
						Don't have an account? <a href="./pages/homepage.html">Sign up</a>
					</p>
				</div>
			</div>
			<!-- right-card -->
			<div class="right-card">
				<img class="right-img" src="./assets/log-in-picture.png" alt="" />
			</div>
		</div>
	</body>
</html>
