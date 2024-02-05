<?php
include('connection.php');

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function signUp($email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            // Redirect to login page after successful signup
            header("Location: ../index.php");
            exit();
        } else {
            // Log the error for debugging
            error_log("Error during signup: " . implode(" ", $stmt->errorInfo()));
            echo "An error occurred during signup. Please try again later.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User($pdo);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->signUp($email, $password);
}
?>

<!DOCTYPE html>
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
                        name="email"
                        class="username" 
                        placeholder="Your email"
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
                    Do you have an account? <a href="../index.php">Log in</a>
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
