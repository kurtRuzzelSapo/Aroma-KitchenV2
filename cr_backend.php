<?php
require(__DIR__ . '/pagesPHP/connection.php');
session_start(); 
class RecipeManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createRecipe($title, $urlDish, $type, $description, $steps)
    {
        // File upload
        
    
        // Prepare and execute the SQL query
        $sql = "INSERT INTO recipes (title, url_dish ,  type, description, steps) 
                VALUES (:title, :url_dish, :type, :description, :steps)";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':url_dish', $urlDish);
        $stmt->bindParam(':type', $type);
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
$type = $_POST['type-dish'];
$description = $_POST['description'];
$steps = $_POST['steps'];  // Updated variable name
$urlDish = $_POST['url-dish'];  // Capture the value of 'url-dish'

// Create a RecipeManager instance and call the createRecipe method
$recipeManager = new RecipeManager($pdo);
$recipeManager->createRecipe($title, $urlDish, $type, $description, $steps);
// Pass $urlDish as an argument

}

// Close the database connection
$pdo = null;
?>