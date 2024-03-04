<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta `c`harset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/Logo.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="./style/homepage.css" />
    <script src="../js/app.js"></script>
    <script src="../js/hamburger.js"></script>

    <title>Aroma Kitchen</title>

    <style>
        .rec-desc.step ul {
            list-style-type: disc;
            padding-left: 20px;
            font-size: 20px;
            padding-top: 10px;
            /* Add some padding to adjust the position of the bullet points */
        }
    </style>
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
                <?php
                // if (isset($_SESSION['user_id'])) {
                //     $user_id = $_SESSION['user_id'];
                //     $recipeIdParam = isset($_GET['id']) ? $_GET['id'] : null;
                // Create the link with the user ID as a query parameter
                //     echo '<li><a href="createrecipe.php?id=' . $user_id . '"> UserID:' . $user_id . '</a></li>';
                //     echo '<li><a href="yourrecipe.php?id=' . $user_id . '">RecipeID:' . $recipeIdParam . '</a></li>';
                // }
                ?>
                <!-- <li><a href="savedrecipe.php">Saved recipes</a></li>
                <li><a href="#">About us</a></li> -->
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

        <a class="back-saved-recipe" id="back" href="homepage.php">Back
            <svg class="back-arrow-saved" xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                <path d="M30.5312 18.5382L6.46887 18.4618" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.2812 28.3368L6.46879 18.4618L16.3437 8.64935" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>
    <section class="saved-recipe-data">
        <?php
        require(__DIR__ . '/pagesPHP/connection.php');

        // Retrieve recipe ID from the URL
        $recipeId = isset($_GET['id']) ? $_GET['id'] : null;
        $user_id = $_SESSION['user_id'];
        // Fetch recipe details from the database based on the ID
        $sql = "SELECT * FROM recipes WHERE id = :recipeId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
        $stmt->execute();
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);


        // Display recipe details
        if ($recipe) {
            echo '<link rel="stylesheet" href="../style/homepage.css" />';
            echo '<div class="rec-table">';
            echo '<div style= ";width:50%; display:flex; justify-content:center; flex-direction:column; align-items:center; ">';
            echo '<h1 style="  margin-bottom:40px; font-size:5rem" class="the-title" >' . $recipe['title'] . '</h1>';
            echo '<div class="we" style="display:flex; width:50%; justify-content:space-between; align-items:start">';
            echo '<h1 style="font-size:35px" class="the-title" >by:' . $recipe['creator'] . '</h1>';
            echo '<form action="code.php" method=post>';
            echo "<input style='border-radius:5px; font-size:25px; background-color: #548235; text-align:center; border:none; width:165px;' onmouseover=\"this.style.color='#F1F1F1'\" onmouseout=\"this.style.color='black'\" type='hidden' name='recipe_id' value='" . $recipeId . "'>";
            echo "<input style='border-radius:5px; font-size:25px; background-color: #548235; text-align:center; border:none; width:165px;' onmouseover=\"this.style.color='#F1F1F1'\" onmouseout=\"this.style.color='black'\" type='hidden' name='user_id' value='" . $user_id . "'>";
            echo "<input style='border-radius:5px; font-size:25px; background-color: #548235; text-align:justify; border:none; width:160px;' onmouseover=\"this.style.color='#F1F1F1'\" onmouseout=\"this.style.color='black'\" type='submit' name='save_recipe' value='Save Recipe'>";
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '<img src="uploads/' . $recipe['url_dish'] . '"></img>';
            echo '</div>';
            echo '<hr  style="margin-bottom:30px;opacity: 20%; height:50px; background-color: black">';
            echo '<div class="rec-desc">';
            echo '<h1 class="t-desc">Description</h1>';
            echo '<p class="the-desc" style="font-size:20px">' . $recipe['description'] . '</p>';
            echo '</div>';
            echo '<hr  style="margin-bottom:30px;opacity: 20%; height:50px; background-color: black">';
            echo '<div style="height:60vh; width: 95%; margin-bottom:50px" class="rec-desc step">';
            echo '<h1 class="t-desc">Steps</h1>';
            echo '<ul style="list-style-type: disc;">';
            $steps = explode("\n", $recipe['steps']);
            foreach ($steps as $step) {
                echo '<li>' . $step . '</li>';
            }
            echo '</ul>';
            // echo '<a href="#back"></a>';
            echo '</div>';
            echo '<hr style="margin-bottom:30px;opacity: 20%; height:50px; background-color: black">';
        } else {
            echo '<p>Recipe not found.</p>';
        }
        ?>


        <?php

        include(__DIR__ . '/pagesPHP/connection.php');

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $recipe_id = $_POST['recipe_id'];
            $rating = $_POST['rating'];
            $comment = $_POST['comment'];

            // Insert the review into the database
            $query = "INSERT INTO reviews (user_id, recipe_id, rating, comment) VALUES (:user_id, :recipe_id, :rating, :comment)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':user_id' => $user_id,
                ':recipe_id' => $recipe_id,
                ':rating' => $rating,
                ':comment' => $comment,
            ]);

            header("Location:homepage.php");
            exit();
        }
        $recipe_id = isset($_GET['id']) ? $_GET['id'] : null;
        // Fetch and display reviews for the recipe
        $queryReviews = "SELECT reviews.*, users.email 
        FROM reviews 
        INNER JOIN users ON reviews.user_id = users.id 
        WHERE recipe_id = :recipe_id";
        $stmtReviews = $pdo->prepare($queryReviews);
        $stmtReviews->execute([':recipe_id' => $recipe_id]);
        $reviews = $stmtReviews->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <form style="display: flex; flex-direction:column; align-items:start " action="recipe.php" method="POST">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" min="1" max="5" required>
            <label for="comment">Comment:</label>
            <textarea name="comment" rows="4" required></textarea>
            <input type="hidden" name="recipe_id" value="<?= $recipeId; ?>">

            <button type="submit">Submit Review</button>
        </form>

        <!-- Display reviews -->
        <div id="reviews-section">
            <h2>Reviews:</h2>
            <?php
            if ($reviews) {
                foreach ($reviews as $review) {
                    echo "<p style='border-bottom: 1px solid black; font-size: 20px; margin-bottom: 15px;'>User: {$review['email']} | Rating: {$review['rating']} | Comment: {$review['comment']}</p>";
                }
            } else {
                echo "<p>No reviews yet.</p>";
            }
            ?>
        </div>
    </section>

    <footer class="footer-sec">
        <img class="logo-footer" src="../assets/Logo.png" alt="" />
    </footer>
</body>

</html>