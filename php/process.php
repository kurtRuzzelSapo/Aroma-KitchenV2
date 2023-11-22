<?php
// Check if the session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include your database connection file or create a PDO connection here
include('connection.php');
// $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

// Create a class for Registration of a user and its functions
class UserRegistration
{
    // property
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Register user using the variables that were used in checking if there is a form submitted
    public function registerUser($username, $password,)
    {
        // Validate input (you can add more validation logic)
        $errors = $this->validateInput($username, $password,);

        if (count($errors) === 0) {
            try {
                // Hash the password before storing it in the database
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data into the database
                // prepared statements in pdo
                $stmt = $this->pdo->prepare("INSERT INTO user_tbl (fullname, email, password) VALUES (?, ?, ?)");
                $success = $stmt->execute([$username, $password,]);

                if ($success) {
                    // Set session variable for success
                    $_SESSION['registration_success'] = true;
                    // Return success for AJAX response
                    return ["success" => "Registration successful! You can now log in."];
                } else {
                    // Display database error
                    return ["database" => "Failed to insert data into the database."];
                }
            } catch (PDOException $e) {
                // Display database error
                return ["database" => "Database error: " . $e->getMessage()];
            }
        } else {
            // Return validation errors
            return $errors;
        }
    }

    private function validateInput($username, $password,)
    {
        $errors = [];

        // You can add more validation rules based on your requirements
        if (empty($fullname)) {
            $errors['fullname'] = "Full name is required.";
        }

        if (empty($password) || strlen($password) < 6) {
            $errors['password'] = "Password must be at least 6 characters long.";
        }

        return $errors;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create an instance of the UserRegistration class
    $userRegistration = new UserRegistration($pdo);

    // Get form data
    $fullname = isset($_POST['fullname']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Register the user
    $registrationErrors = $userRegistration->registerUser($username, $password,);

    // For success message
    header('Content-Type: application/json');
    echo json_encode($registrationErrors);
    exit();
} else {
    // Handle invalid request method
    header('HTTP/1.1 400 Bad Request');
    exit('Invalid request method');
}