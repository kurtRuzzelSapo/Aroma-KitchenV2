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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                <li>
                    <a id="in-page" href="homepage_admin.php">Recipes</a>
                </li>
                <li>
                    <a href="listuser.php">Users</a>
                </li>
                <li>
                    <a href="createrecipe_admin.php">Create recipes</a>
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
    <section class="banner-sec">
        <h1 class="saved-recipe-title">Recipes</h1>

    </section>
    <section class="saved-recipe-data">
        <?php
        $query = "SELECT * FROM recipes";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
        ?>
        <div
            style=" background-color:#D9D9D9; margin-top: 20px;width:100%; display:flex; justify-content:space-between; align-items:center; margin-bottom: 10px">
            <div style="margin-left:5%;  display: flex; align-items:center;  ">
                <img style="margin-right:40px" class="responsive-image" src="uploads/<?= $row['url_dish']; ?>"
                    alt="Recipe Image">
                <h1 href="#" style="font-family: Outfit; font-size: 2.5rem; color:black"><?= $row['title'] ?></>
            </div>
            <form style="display:flex; align-items:center; width:20%; justify-content:space-around" action="code.php"
                method="POST">

                <a href="recipe-edit.php?id=<?= $row['id']; ?>"><i style="font-size: 50px; color:green"
                        class="large material-icons ">remove_red_eye</i></a>
                <button style=" margin-right:160px; background-color:transparent; border:none" type="submit"
                    value="<?= $row['id']; ?>" name="delete_recipe" class="btn btn-danger"><i
                        style="font-size: 50px; color:red" class="large material-icons ">tdelete_sweep</i></button>
            </form>
            <!-- Add any other details you want to display -->
        </div>
        <?php
            }
        } else {
            ?>
        <p>No records found</p>
        <?php
        }

        ?>
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