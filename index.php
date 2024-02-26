<?php
// Start the session (if not already started)
session_start();

// Include your database connection file or create a PDO connection here
include(__DIR__ . '/pagesPHP/connection.php');

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($email, $enteredPassword)
    {
        // Fetch user data from the database
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the email exists
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $user['password'];

            // Verify the entered password
            if (password_verify($enteredPassword, $hashedPassword)) {
                // Password is correct, proceed with login
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['login_success'] = "Login successful!";
                header("Location: homepage.php");
                exit();
            } else {
                // Password is incorrect
                $_SESSION['login_errors'][] = "Invalid password.";

                // header("Location: index.php");
            }
        } else {
            // Email does not exist
            $_SESSION['login_errors'][] = "Email not found.";
        }

        // Redirect to the same page to display errors
        header("Location: index.php");
        exit();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $email = $_POST['email'];
    $enteredPassword = $_POST['password'];

    // Create a User instance and call the login method
    $user = new User($pdo);
    $user->login($email, $enteredPassword);
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
                <h1 class="title">Hey There!</h1>
                <p class="description">Login to get started in Aroma Kitchen</p>

                <form action="index.php" method="POST">
                    <input type="email" name="email" class="username" placeholder="Your email" required />
                    <!-- Change from 'username' to 'email' -->
                    <input type="password" name="password" class="password" placeholder="Your password" required />
                    <button class="login-button" type="submit">Login</button>
                </form>

                <p class="sign-up-link">
                    Don't have an account? <a href="./pagesPHP/signup.php">Sign up</a>
                </p>
                <label class="dropdown">

                    <div class="dd-button">
                        User
                    </div>

                    <input type="checkbox" class="dd-input" id="test">

                    <ul class="dd-menu">
                        <li><a class="admin_link" href="admin_login.php">Admin</a></li>
                    </ul>

                </label>
            </div>
        </div>
        <!-- right-card -->
        <div class="right-card">
            <img class="right-img" src="./assets/log-in-picture.png" alt="" />
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
" rel="stylesheet">


    <?php
    // Check if there are login errors
    if (isset($_SESSION['login_errors']) && !empty($_SESSION['login_errors'])) {
        echo '<script>';
        foreach ($_SESSION['login_errors'] as $error) {
            echo 'Swal.fire({
                title: "Invalid Input",
                text: "' . $error . '",
                icon: "error"
              });';
        }
        echo '</script>';
        // Clear the login errors
        unset($_SESSION['login_errors']);
    }
    ?>
</body>

</html>