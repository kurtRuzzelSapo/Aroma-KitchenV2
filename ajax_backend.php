<?php
require(__DIR__ . '/pagesPHP/connection.php');
include('hp_backend.php');

class RecipeHandler
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function searchRecipes($searchQuery)
    {
        $sql = "SELECT * FROM recipes WHERE title LIKE :searchQuery";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRecipes()
    {
        $sql = "SELECT * FROM recipes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add the missing getRecipes method
    public function getRecipes($searchQuery = '')
    {
        if (!empty($searchQuery)) {
            return $this->searchRecipes($searchQuery);
        } else {
            return $this->getAllRecipes();
        }
    }

    public function displayRecipes($searchQuery = '')
    {
        $recipes = $this->getRecipes($searchQuery);

        if (!empty($recipes)) {
            echo '<div class="recipe-list">';
            foreach ($recipes as $recipe) {
                echo '<link rel="stylesheet" href="../style/homepage.css" />';
                echo '<a href="recipe.php?id=' . $recipe['id'] . '"><div class="recipe-item">';
                echo '<div class="recipe-child">'.'<img class="responsive-image" src="' . $recipe['url_dish'] . '"></img>'.'</div>';
                echo '<h3 class="recipe-child">' . $recipe['title'] . '</h3>';
                echo '<button>Save</button>';
                echo '</div></a>';
            }
            echo '</div>';
        } else {
            echo '<p>No recipes found.</p>';
        }
    }

}

// Create a RecipeHandler instance
$recipeHandler = new RecipeHandler($pdo);

// Display recipes using HTML
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$recipeHandler->displayRecipes($searchQuery);
?>
