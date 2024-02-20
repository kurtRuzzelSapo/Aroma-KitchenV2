<?php
require_once(__DIR__ . '/pagesPHP/connection.php');
session_start();
class RecipeManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createRecipe($title, $new_image_name, $category, $description, $steps)
    {
        // File upload


        // Prepare and execute the SQL query
        $sql = "INSERT INTO recipes (title, url_dish ,  category, description, steps) 
                VALUES (:title, :url_dish, :category, :description, :steps)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':url_dish', $new_image_name);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':steps', $steps);

        if ($stmt->execute()) {
            echo "Recipe created successfully!";
        } else {
            error_log("Error during recipe creation: " . implode(" ", $stmt->errorInfo()));
            echo "An error occurred during recipe creation. Please try again later.";
        }

        // Close the statement
        $stmt->closeCursor();
    }
    public function getSavedRecipesJSON($userID)
    {
        // Fetch saved recipes for the logged-in user
        $sql = "SELECT * FROM recipes WHERE user_id = :userID";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Collect form data
    // Collect form data
    $title = $_POST['title-dish'];
    $category = $_POST['type-dish'];
    $description = $_POST['description'];
    $steps = $_POST['steps'];  // Updated variable name
    // $urlDish = $_FILES['url-dish']; 
    // Capture the value of 'url-dish'
    $img_name = $_FILES['url-dish']['name'];  // Capture the value of 'url-dish'
    $img_size = $_FILES['url-dish']['size'];  // Capture the value of 'url-dish'
    $tmp_name = $_FILES['url-dish']['tmp_name'];  // Capture the value of 'url-dish'
    $error = $_FILES['url-dish']['error'];  // Capture the value of 'url-dish'

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");
    $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = 'uploads/' . $new_image_name;
    move_uploaded_file($tmp_name, $img_upload_path);



    // Create a RecipeManager instance and call the createRecipe method
    $recipeManager = new RecipeManager($pdo);
    $recipeManager->createRecipe($title, $new_image_name, $category, $description, $steps);
    // Pass $urlDish as an argument

}

// Close the database connection
$pdo = null;
