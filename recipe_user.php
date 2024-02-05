

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/Logo.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="../style/homepage.css" />
    <script src="../js/app.js"></script>
    <script src="../js/hamburger.js"></script>
   
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
                    <a href="listrecipe.php">Recipes</a>
                </li>
                <li>
                    <a  href="listuser.php">Users</a>
                </li>
                <li>
                    <a href="createrecipe.php">Create recipes</a>
                </li>

                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#home">Change profile</a>
                        <a href="../index.php">Logout</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
    <section class="banner-sec">
        
        <a class="back-saved-recipe" href="homepage_admin.php">Back
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

// Fetch recipe details from the database based on the ID
$sql = "SELECT * FROM recipes WHERE id = :recipeId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
$stmt->execute();
$recipe = $stmt->fetch(PDO::FETCH_ASSOC);

// Display recipe details
if ($recipe) { 
    echo '<img src="' . $recipe['url_dish'] . '"></img>';
    echo '<h1>' . $recipe['title'] . '</h1>';
    echo '<p>' . $recipe['description'] . '</p>';
    echo '<p>' . $recipe['steps'] . '</p>';
    

    
} else {
    echo '<p>Recipe not found.</p>';
}
?>

    </section>
    <footer class="footer-sec">
        <img class="logo-footer" src="../assets/Logo.png" alt="" />
    </footer>
</body>

</html>


