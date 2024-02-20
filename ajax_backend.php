<?php
ini_set('memory_limit', '2048M');
require(__DIR__ . '/pagesPHP/connection.php');
// include('hp_backend.php');


class RecipeHandler
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function searchRecipes($searchQuery)
    {
        // $sql = "SELECT * FROM recipes WHERE title LIKE :searchQuery";
        $sql = "SELECT * FROM recipes WHERE title LIKE :searchQuery LIMIT 4";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBreakfastRecipe()
    {
        $sql = "SELECT * FROM recipes WHERE category = 'breakfast' LIMIT 4";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLunchRecipe()
    {
        $sql = "SELECT * FROM recipes WHERE category = 'lunch' LIMIT 4";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDinnerRecipe()
    {
        $sql = "SELECT * FROM recipes WHERE category = 'dinner' LIMIT 4";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRecipes()
    {
        // $sql = "SELECT * FROM recipes LIMIT 4";
        $sql = "SELECT * FROM recipes ORDER BY RAND() LIMIT 4";

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

    public function getBreakfast()
    {
        return $this->getBreakfastRecipe();
    }
    public function getLunch()
    {
        return $this->getLunchRecipe();
    }
    public function getDinner()
    {
        return $this->getDinner();
    }

    public function displayRecipes($searchQuery = '')
    {
        $recipes = $this->getRecipes($searchQuery);

        if (!empty($recipes)) {

            echo '<div  style="
            padding: 0, 200px;
            width: 1090px;
            height:10vh;
            display: flex;
            justify-content: space-between;
            font-size:23px;
            font-family: Outfit;
            font-weight:1000;
            align-items: center;">';
            echo '<h1 >Recommended Recipes</h1>';
            echo '<h3>See more </h3>';
            echo '</div>';
            echo '<div class="recipe-list">';
            foreach ($recipes as $recipe) {
                echo '<a href="recipe.php?id=' . $recipe['id'] . '"><div class="recipe-item">';
                echo '<div class="recipe-child">' . '<img class="responsive-image" src="uploads/' . $recipe['url_dish'] . '"></img>' . '</div>';
                echo '<h3 class="recipe-child">' . $recipe['title'] . '</h3>';
                echo '<pc class="recipe-child" style="color: grey;
                font-size: 15px;
                text-align:left;
                font-weight: 200;">' . $recipe['category'] . '</pc>';
                echo '<button>Save</button>';
                echo '</div></a>';
            }
            echo '</div>';
        } else {
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
            echo '<h1>Recomended Recipes</h1>';
            echo '</div>';
            echo '<p style="font-size:20px;
            font-family: Outfit;">No recipes found.</p>';
        }
    }

    public function displayBreakfastRecipe()
    {
        $categoryRecipes = $this->getBreakfast();

        if (!empty($categoryRecipes)) {
            echo '<div class="lol"  style="
            padding: 0, 200px;
            width: 1090px;
            height:10vh;
            display: flex;
            justify-content: space-between;
            font-size:23px;
            font-family: Outfit;
            font-weight:1000;
            align-items: center;">';
            echo '<h1>Breakfast Recipes</h1>';
            echo '<h3>See more </h3>';
            echo '</div>';
            echo '<div class="recipe-list">';
            foreach ($categoryRecipes as $categoryRecipe) {

                echo '<a href="recipe.php?id=' . $categoryRecipe['id'] . '"><div class="recipe-item">';
                echo '<div class="recipe-child">' . '<img class="responsive-image" src="uploads/' . $categoryRecipe['url_dish'] . '"></img>' . '</div>';
                echo '<h3 class="recipe-child">' . $categoryRecipe['title'] . '</h3>';
                echo '<pc class="recipe-child" style="color: grey;
                font-size: 15px;
                text-align:left;
                font-weight: 200;">' . $categoryRecipe['category'] . '</pc>';
                echo '<button>Save</button>';
                echo '</div></a>';
            }
            echo '</div>';
        } else {
            echo '<p>No recipes found.</p>';
        }
    }
    // public function displayDinnerRecipe()
    // {
    //     $categoryRecipes = $this->getDinner();

    //     if (!empty($categoryRecipes)) {
    //         echo '<div>';
    //         echo '<h1>Dinner Recipes</h1>';
    //         echo '</div>';
    //         echo '<div class="recipe-list">';
    //         foreach ($categoryRecipes as $categoryRecipe) {
    //             echo '<link rel="stylesheet" href="../style/homepage.css" />';
    //             echo '<a href="recipe.php?id=' . $categoryRecipe['id'] . '"><div class="recipe-item">';
    //             echo '<div class="recipe-child">' . '<img class="responsive-image" src="' . $categoryRecipe['url_dish'] . '"></img>' . '</div>';
    //             echo '<h3 class="recipe-child">' . $categoryRecipe['title'] . '</h3>';
    //             echo '<button>Save</button>';
    //             echo '</div></a>';
    //         }
    //         echo '</div>';
    //     } else {
    //         echo '<p>No recipes found.</p>';
    //     }
    // }
    public function displayLunchRecipe()
    {
        $categoryRecipes = $this->getLunch();

        if (!empty($categoryRecipes)) {
            echo '<div class="lol"  style="
            padding: 0, 200px;
            width: 1090px;
            height:10vh;
            display: flex;
            justify-content: space-between;
            font-size:23px;
            font-family: Outfit;
            font-weight:1000;
            align-items: center;">';
            echo '<h1>Lunch Recipes</h1>';
            echo '<h3>See more </h3>';
            echo '</div>';
            echo '<div class="recipe-list">';
            foreach ($categoryRecipes as $categoryRecipe) {
                echo '<a href="recipe.php?id=' . $categoryRecipe['id'] . '"><div class="recipe-item">';
                echo '<div class="recipe-child">' . '<img class="responsive-image" src="uploads/' . $categoryRecipe['url_dish'] . '"></img>' . '</div>';
                echo '<h3 class="recipe-child">' . $categoryRecipe['title'] . '</h3>';
                echo '<pc class="recipe-child" style="color: grey;
                font-size: 15px;
                text-align:left;
                font-weight: 200;">' . $categoryRecipe['category'] . '</pc>';
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
$recipeHandler->displayBreakfastRecipe();
$recipeHandler->displayLunchRecipe();
// $recipeHandler->displayDinnerRecipe();