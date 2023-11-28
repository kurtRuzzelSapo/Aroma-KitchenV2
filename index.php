<!DOCTYPE html>
<html lang="en">

<?php
// Start the session (if not already started)
session_start();

// Include your database connection file or create a PDO connection here
include(__DIR__ . '/pagesPHP/connection.php');

// Initialize variables
$registrationErrors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert data into the database
    $sql = "INSERT INTO login_users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $_SESSION['registration_success'] = "Signup successful!";
        header("Location: homepage.php"); // Redirect to the same page to avoid form resubmission
        exit();
    } else {
        $_SESSION['registration_error'] = "Error during signup: " . $stmt->errorInfo()[2];
        header("Location: index.php"); // Redirect to the same page to display the error message
        exit();
    }
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

// Define database connection details or use them directly in the PDO connection
$host = 'localhost'; // usually 'localhost' if the database is on the same server
$dbname = 'login_users';
$username = 'root';
$password = '';

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

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
                    <input type="text" name="username" class="username" placeholder="Your username" required />
                    <input type="password" name="password" class="password" placeholder="Your password" required />

                    <button class="login-button" type="submit">Login</button>
                </form>

                <p class="sign-up-link">
                    Don't have an account? <a href="./pagesPHP/signup.php">Sign up</a>
                </p>
            </div>
        </div>
        <!-- right-card -->
        <div class="right-card">
            <img class="right-img" src="./assets/log-in-picture.png" alt="" />
        </div>
    </div>
</body>
