<!DOCTYPE html>
<?php
// Set the include path to the directory containing connection.php
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/php/');

// Assuming you have a connection.php file with database connection details
include('C:\Users\Administrator\Downloads\xammp\htdocs\Aroma-Kitchen\php\connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert data into the database
    //$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $sql = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
	$stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Signup successful!";
    } else {
        echo "Error during signup: " . $stmt->errorInfo()[2];
    }
}
?>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="../assets/Logo.png" type="image/x-icon" />
		<link rel="stylesheet" href="../style/style.css" />
		<title>Aroma Kitchen</title>
	</head>
	<body>
		<div class="container">
			<!-- left-card -->
			<div class="left-card">
				<img class="logo" src="../assets/Logo.png" alt="" />
				<div class="login">
					<h1 class="title">Welcome!</h1>
					<p class="description">Signup to get started in Aroma Kitchen</p>

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

						<button class="login-button" type="submit">Sign up</button>
					</form>
					<p class="sign-up-link">
						Do you have an account? <a href="../index.html">Log in</a>
					</p>
				</div>
			</div>
			<!-- right-card -->
			<div class="right-card">
				<img class="right-img" src="../assets/sign-up-picture.png" alt="" />
			</div>
		</div>
	</body>
</html>
