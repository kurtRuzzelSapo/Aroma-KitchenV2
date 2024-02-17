<?php
require(__DIR__ . '/pagesPHP/connection.php');
session_start(); 

class Recipe
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function searchRecipes($searchQuery)
    {
        // Fetch recipes based on the search query
        $sql = "SELECT * FROM recipes WHERE title LIKE :searchQuery";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRecipes()
    {
        // Fetch all recipes
        $sql = "SELECT * FROM recipes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryRecipe(){
        $sql = "SELECT * FROM recipes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function displayCategoryRecipe(){
        $categoryRecipes = $this -> getCategoryRecipe();

        if (!empty($categoryRecipes)) {
            echo '<div class="category" style="
            padding: 0, 200px;
            width: 1090px;
            height:10vh;
            display: flex;
            justify-content: start;
            font-size:23px;
            font-family: Outfit;
            font-weight:1000;
            align-items: center;">';         
            echo'<h1>Breakfast Recipes</h1>';
            echo '</div>';
            echo '<div class="recipe-list">';
            foreach ($categoryRecipes as $categoryRecipe) {
                echo '<link rel="stylesheet" href="../style/homepage.css" />';
                echo '<a href="recipe.php?id=' . $categoryRecipe['id'] . '"><div class="recipe-item">';
                echo '<div class="recipe-child">'.'<img class="responsive-image" src="' . $categoryRecipe['url_dish'] . '"></img>'.'</div>';
                echo '<h3 class="recipe-child">' . $categoryRecipe['title'] . '</h3>';
                echo '<button>Save</button>';
                echo '</div></a>';
            }
            echo '</div>';
        } else {
            echo '<p>No recipes found.</p>';
        }

    }


    public function displayRecipe($recipes)
{
    // Check if there are recipes to display
    if (!empty($recipes)) {
     
        echo '<ul class="recipe-list">';

        // homepage.php

// Change the link for each recipe to point to recipe.php with the recipe ID
foreach ($recipes as $recipe) {
    echo '<li class="recipe-item">';
    echo '<h3><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['title'] . '</a></h3>';
    echo '<img src="data:image;base64,' . base64_encode($recipe['picture_path']) . '" alt="' . $recipe['title'] . '">';
    echo '<p>' . $recipe['description'] . '</p>';
    // You can display other information as needed
    echo '</li>';
}

        echo '</ul>';
    } else {
        echo '<p>No recipes found.</p>';
    }
}



    
}

// Create a Recipe instance
$recipeHandler = new Recipe($pdo);

// Handle search
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
if (!empty($searchQuery)) {
    // Fetch recipes based on the search query
    $recipes = $recipeHandler->searchRecipes($searchQuery);
  

} else {
    // Fetch all recipes if no search query
    $recipes = $recipeHandler->getAllRecipes();
}
?>