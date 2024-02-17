<?php
include(__DIR__ . '/pagesPHP/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./style/homepage.css" />
    <link rel="stylesheet" href="./style/new.css" />
    <script src="app.js"></script>
    <script src="hamburger.js"></script>

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
        <button class="button-3"><a href="#">Breakfast</a></button>
        <button class="button-3"><a href="#">Lunch</a></button>
        <button class="button-3"><a href="#">Dinner</a></button>


    </main>
    <section class="recipe-sec" id="recipeSection">

        <script src="ajax_script.js"></script>
    </section>



    <footer class="footer-sec">
        <img class="logo-footer" src="../assets/Logo.png" alt="" />
    </footer>



</body>

</html>
<?php
include(__DIR__ . '/pagesPHP/connection.php');

?>