<!DOCTYPE html>
<html lang="en">

<?php
// Include your database connection file
include('pagesPHP\connection.php');
// include('cr_backend.php');



?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./style/homepage.css" />
    <script src="./js/app.js"></script>
    <script src="./js/hamburger.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
" rel="stylesheet">
    <title>Aroma Kitchen</title>
</head>

<body>
    <?php
    include('cr_backend.php');
    ?>
    <nav class="navbar">
        <img class="logo" src="./assets/Logo.png" alt="" />
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>

                <?php
                if (isset($_GET['id'])) {
                    // Get the user ID from the URL
                    $user_id = $_GET['id'];

                    echo "<li> $user_id</li>";
                }
                ?>
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
        <h1 class="saved-recipe-title">Create Recipe</h1>
        <a class="back-saved-recipe" href="homepage.php">Back
            <svg class="back-arrow-saved" xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                <path d="M30.5312 18.5382L6.46887 18.4618" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.2812 28.3368L6.46879 18.4618L16.3437 8.64935" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>
    <section style="width: 50%;" class="create-recipe-sec">
        <form id="recipeForm" action="createrecipe.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="selected-type" id="selected-type" value="" />
            <?php
            if (isset($_GET['id'])) {
                // Get the user ID from the URL
                $user_id = $_GET['id'];


                echo '<input type="hidden" name="user-id" value="' . $user_id . '" />';
            }
            ?>
            <div class="title-input-section">
                <label class="label-input">Creator:</label>
                <input style="width: 20.5rem;
	height: 2.625rem;" type="text" maxlength="11" name="creator" class="title-dish" minlength="" maxlength="" size="" id="title-dish" required placeholder="Your name" />
            </div>
            <div class="title-input-section">
                <label class="label-input">Title of Dish:</label>
                <input style="width: 20.5rem;
	height: 2.625rem;" type="text" name="title-dish" class="title-dish" minlength="" maxlength="" size="" id="title-dish" required />
            </div>
            <div class="title-input-section">
                <label class="label-input">Image of Dish:</label>
                <input type="file" name="url-dish" id="title-dish" required />
            </div>
            <!-- <div class="title-input-section">
                <label class="label-input">URL image of Dish:</label>
                <input type="text" name="url-dish" class="title-dish" id="title-dish" required />
            </div> -->
            <!-- TYPE DISH -->
            <label class="label-input added">Type of Dish:</label>
            <select name="type-dish" class="title-dish" id="category" style="width:10rem; height: 2.625rem;font-size: 20px; font-weight:bold; margin-bottom:30px">
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
            </select>
            <!-- <div class="type-input-section">
                <input type="radio" name="type-dish" id="type-dish1" onchange="handleRadioChange(this)" required />
                <label for="type-dish1">Breakfast</label>

                <input type="radio" name="type-dish" id="type-dish2" onchange="handleRadioChange(this)" required />
                <label for="type-dish2">Lunch</label>

                <input type="radio" name="type-dish" id="type-dish3" onchange="handleRadioChange(this)" required />
                <label for="type-dish3">Dinner</label>

                <input type="radio" name="type-dish" id="type-dish4" onchange="handleRadioChange(this)" required />
                <label for="type-dish4">Vegan</label>
            </div> -->
            <div class="description-input-section">
                <label for="description">Description</label>
                <textarea id="description" name="description" required> </textarea>
            </div>
            <div class="steps-input-section">
                <label for="steps">Steps</label>
                <textarea id="steps" name="steps" required> </textarea>
            </div>
            <div class="submit-cancel">
                <button type="reset">Cancel</button>
                <button type="submit">Submit</button>
            </div>
        </form>
    </section>
    <footer class="footer-sec">
        <img class="logo-footer" src="./assets/Logo.png" alt="" />
    </footer>


</body>

</html>