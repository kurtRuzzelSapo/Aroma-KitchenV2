<?php
// Start the session
session_start();

// Include your database connection file or create a PDO connection here
include(__DIR__ . '/pagesPHP/connection.php');

class RecipeManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getSavedRecipes($userID)
    {
        // Fetch saved recipes for the logged-in user
        $sql = "SELECT * FROM recipes WHERE user_id = :userID";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Check if $_SESSION['id'] is set
$userID = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Create a RecipeManager instance
$recipeManager = new RecipeManager($pdo);

if ($userID !== null) {
    // Fetch saved recipes for the logged-in user
    $savedRecipes = $recipeManager->getSavedRecipes($userID);
} else {
    // Handle the case when $_SESSION['id'] is not set
    $savedRecipes = [];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../style/homepage.css" />
    <script src="../js/app.js"></script>
    <script src="../js/hamburger.js"></script>
    <script src="ajax_script.js"></script>
    <title>Aroma Kitchen</title>
</head>

<body>
    <nav class="navbar">
        <img class="logo" src="../assets/Logo.png" alt="" />
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li>
                    <a id="in-page" href="savedrecipe.php">Saved recipes</a>
                </li>
                
                <li><a href="#">About us</a></li>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#home">Change profile</a>
                        <a href="index.php">Logout</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
    <section class="banner-sec">
        <h1 class="saved-recipe-title">Saved Recipes</h1>
        <a class="back-saved-recipe" href="homepage.php">Back
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                <path d="M30.5312 18.5382L6.46887 18.4618" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.2812 28.3368L6.46879 18.4618L16.3437 8.64935" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>
    <section class="saved-recipe-data">
        <?php
        // Check if there are saved recipes
        if (!empty($savedRecipes)) {
            echo '<ul class="recipe-list">';
            foreach ($savedRecipes as $recipe) {
                echo '<li class="recipe-item">';
                echo '<h3>' . $recipe['title'] . '</h3>';
                echo '<p>' . $recipe['picture_path'] . '</p>';
                echo '<p>' . $recipe['description'] . '</p>';
                echo '<p>' . $recipe['steps'] . '</p>';
                // You can display other information as needed
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No saved recipes found.</p>';
        }
        ?>
    </section>
    <footer class="footer-sec">
        <img class="logo-footer" src="../assets/Logo.png" alt="" />
    </footer>
</body>

</html>
