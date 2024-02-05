<?php
// Start the session (if not already started)
session_start();

// Include your database connection file or create a PDO connection here
include(__DIR__ . '/pagesPHP/connection.php');

class Admin
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($email, $enteredPassword)
    {
        // Fetch admin data from the database
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the email exists
        if ($stmt->rowCount() > 0) {
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $admin['password'];

            // Verify the entered password
            if (password_verify($enteredPassword, $hashedPassword)) {
                // Password is correct, proceed with login
                $_SESSION['login_success'] = "Login successful!";
                header("Location: homepage_admin.php");
                exit();
            } else {
                // Password is incorrect
                $_SESSION['login_errors'][] = "Invalid password.";
            }
        } else {
            // Email does not exist
            $_SESSION['login_errors'][] = "Email not found.";
        }

        // Redirect to the same page to display errors
        header("Location: admin_login.php");
        exit();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $email = $_POST['email'];
    $enteredPassword = $_POST['password'];

    // Create a User instance and call the login method
    $admin = new Admin($pdo);
    $admin->login($email, $enteredPassword);
}
?>


<!DOCTYPE html>
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
                <h1 class="title">Hey Admin!</h1>
                <p class="description">Login to get started in Aroma Kitchen</p>

                <form action="" method="post">
                    <input type="text" name="email" class="username" placeholder="Your email" required /> <!-- Change from 'username' to 'email' -->
                    <input type="password" name="password" class="password" placeholder="Your password" required />
                    <button class="login-button" type="submit">Login</button>
                </form>

               
                <label class="dropdown">

  <div class="dd-button">
    Admin
  </div>

  <input type="checkbox" class="dd-input" id="test">

  <ul class="dd-menu">
    <li><a class="admin_link" href="index.php">User</a></li>
  </ul>
  
</label>
            </div>
        </div>
        <!-- right-card -->
        <div class="right-card">
            <img class="right-img" src="./assets/log-in-picture.png" alt="" />
        </div>
    </div>
</body>

</html>
