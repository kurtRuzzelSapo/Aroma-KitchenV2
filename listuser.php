<?php
session_start();
require_once(__DIR__ . '/pagesPHP/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/Logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/homepage.css" />
    <script src="../js/app.js"></script>
    <script src="../js/hamburger.js"></script>
    <script src="get_users.js"></script>
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
                    <a href="homepage_admin.php">Recipes</a>
                </li>
                <li>
                    <a id="in-page" href="listuser.php">Users</a>
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
        <h1 class="saved-recipe-title">Users</h1>
        <a class="back-saved-recipe" href="homepage_admin.php">Back
            <svg class="back-arrow-saved" xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                <path d="M30.5312 18.5382L6.46887 18.4618" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.2812 28.3368L6.46879 18.4618L16.3437 8.64935" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>
    <section>
        <?php
        $query = "SELECT * FROM users";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
        ?>
                <div style=" background-color:#D9D9D9; margin-top: 20px;width:100%; display:flex; justify-content:space-between; align-items:center; margin-bottom: 10px">
                    <div style="margin-left:5%;  display: flex; align-items:center;  ">
                        <h1 style="margin-right:40px"><?= $row['id'] ?></h1>
                        <h1 style="font-family: Outfit; font-size: 2.5rem; color:black"><?= $row['email'] ?></h1>

                    </div>

                    <form action="code.php" method="POST">
                        <button style=" margin-right:160px; background-color:transparent; border:none" type="submit" value="<?= $row['id']; ?>" name="delete_user" class="btn btn-danger"><i style="font-size: 50px; color:red" class="large material-icons ">delete</i></button>
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
        <img class="logo-footer" src="../assets/Logo.png" alt="" />
    </footer>
</body>

</html>