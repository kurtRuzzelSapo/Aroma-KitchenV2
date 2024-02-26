<?php
require_once(__DIR__ . '/pagesPHP/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/Logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/homepage.css" />
    <script src="hamburger.js"></script>
    <script src="get_recipes.js"></script>
    <script src="app.js"></script>

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
                <?php
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    // Create the link with the user ID as a query parameter
                    echo '<li><a href="createrecipe.php?id=' . $user_id . '">Create recipes</a></li>';
                    echo '<li><a href="yourrecipe.php?id=' . $user_id . '">Your recipes</a></li>';
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
        <h1 class="saved-recipe-title">Your Recipes</h1>
        <a class="back-saved-recipe" href="homepage.php">Back
            <svg class="back-arrow-saved" xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37"
                fill="none">
                <path d="M30.5312 18.5382L6.46887 18.4618" stroke="black" stroke-width="3" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M16.2812 28.3368L6.46879 18.4618L16.3437 8.64935" stroke="black" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>
    <section class="saved-recipe-data">
        <!-- Add your recipe list here -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit & Update Data

                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id'])) {

                                $recipe_id = $_GET['id'];

                                $query = "SELECT * FROM recipes WHERE id = :recipe_id LIMIT 1";
                                $stmt = $pdo->prepare($query);
                                $data = [
                                    ':recipe_id' => $recipe_id
                                ];

                                $stmt->execute($data);

                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <form action="code.php" method="POST">
                                <div class="mb">
                                    <input type="hidden" name="id" id="" class="form-control"
                                        value="<?= $result['id'] ?>">
                                    <label for="username">Title</label>
                                    <input type="text" name="title" id="" class="form-control"
                                        value="<?= $result['title'] ?>">
                                </div>
                                <label class="label-input added">Type of Dish:</label>
                                <select name="type" value="<?= $result['category'] ?>" class="title-dish" id="category"
                                    style="font-size: 20px; font-weight:bold; width:10rem; margin-bottom:30px">
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Dinner">Dinner</option>
                                </select>
                                <div class="mb">
                                    <label for="email">Description</label>
                                    <textarea id="description" name="description"
                                        value="<?= $result['description'] ?>"><?= $result['description'] ?></textarea>
                                </div>

                                <div class="mb">
                                    <label for="password">Steps</label>
                                    <textarea id="steps" name="steps"
                                        value="<?= $result['description'] ?>"><?= $result['steps'] ?></textarea>
                                </div>
                                <div class="mb-3 mt-3 float-end">
                                    <button type="submit" name="update_recipe" class="btn btn-primary">Update
                                        Student</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>

    </section>
    <footer class="footer-sec">
        <img class="logo-footer" src="./assets/Logo.png" alt="" />
    </footer>

    <!-- Modal for updating recipe -->
    <div id="updateModal" class="modal">
        <div class="modal-content">

        </div>
    </div>
</body>

</html>