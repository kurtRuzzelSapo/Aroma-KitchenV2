    <?php
    include(__DIR__ . '/pagesPHP/connection.php');

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Add jQuery library -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="shortcut icon" href="./assets/Logo.png" type="image/x-icon" />
            <link rel="stylesheet" href="./style/homepage.css" />
            <link rel="stylesheet" href="./style/new.css" />
            <script src="app.js"></script>
            <script src="hamburger.js"></script>

            <title>Aroma Kitchen</title>
        </head>

        <body>
            <nav class="navbar">
                <img class="logo" src="./assets/Logo.png" alt="" />
                <a href="#" class="toggle-button">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </a>
                <div class="navbar-links">
                    <ul>
                        <li><a href="savedrecipe.php">Saved recipes</a></li>
                        <li><a href="#">About us</a></li>
                        <li>
                            <a href="createrecipe.php">Create recipes</a>
                        </li>
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

            <section class="search-sec">
                <h1 class="title-search">What Do You Want To Cook Today?</h1>
                <form action="" method="get">
                    <input type="search" name="search" class="search" id="search" placeholder="Find a recipe.." />
                    <button class="btn-search" type="submit">Search</button>
                </form>
            </section>
            <main class="cat-container">
                <?php
                $categories = array(
                    "B" => "Breakfast",
                    "L" => "Lunch",
                    "D" => "Dinner"
                );

                echo '<button class="button-3"><a href="homepage.php">Home</a></button>';

                foreach ($categories as $key => $categoryName) {
                    echo '<button class="button-3"><a href="category.php?cat=' . $categoryName . '">' . ucfirst($categoryName) . '</a></button>';
                }
                ?>


            </main>
            <section class="recipe-sec" id="recipeSection">
                <?php

                // Retrieve recipe ID from the URL
                $category = isset($_GET['cat']) ? $_GET['cat'] : null;

                // Fetch recipe details from the database based on the category
                $sql = "SELECT * FROM recipes WHERE category = :category";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':category', $category, PDO::PARAM_STR);
                $stmt->execute();
                $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);



                // Display recipe details
                // if ($recipes) {
                //     foreach ($recipes as $recipe) {
                //         echo '<link rel="stylesheet" href="../style/homepage.css" />';
                //         echo '<div class="rec-table">';
                //         echo '<h1 class="the-title" >' . $recipe['title'] . '</h1>';
                //         echo '<img src="uploads/' . $recipe['url_dish'] . '"></img>';
                //         echo '</div>';
                //         echo '<hr>';
                //         echo '<div class="rec-desc">';
                //         echo '<h1 class="t-desc">Description</h1>';
                //         echo '<p class="the-desc">' . $recipe['description'] . '</p>';
                //         echo '</div>';
                //         echo '<hr>';
                //         echo '<div class="rec-desc step">';
                //         echo '<h1 class="t-desc">Steps</h1>';
                //         echo '<p class="the-desc">' . $recipe['steps'] . '</p>';
                //         echo '<a href="#back"></a>';
                //         echo '</div>';
                //     }
                // } else {
                //     echo '<p>Recipe not found.</p>';
                // }
                if ($recipes) {
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
                    echo '<h1>' . $category . ' Recipes</h1>';
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
                    echo '<p>No recipes found.</p>';
                }
                ?>
            </section>



            <footer class="footer-sec">
                <img class="logo-footer" src="../assets/Logo.png" alt="" />
            </footer>



        </body>

        </html>
    </body>

    </html>