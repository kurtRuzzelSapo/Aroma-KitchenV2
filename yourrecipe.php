<?php
require_once(__DIR__ . '/pagesPHP/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/Logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/homepage.css" />
    <script src="hamburger.js"></script>
    <script src="get_recipes.js"></script>
    <script src="app.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
                <!-- <li><a href="savedrecipe.php">Saved recipes</a></li>
                <li><a href="#">About us</a></li> -->
                <?php
                // if (isset($_SESSION['user_id'])) {
                //     $user_id = $_SESSION['user_id'];
                //     // Create the link with the user ID as a query parameter
                //     echo '<li><a href="createrecipe.php?id=' . $user_id . '">Create recipes</a></li>';
                //     echo '<li><a href="yourrecipe.php?id=' . $user_id . '">Your recipes</a></li>';
                // }
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
            <svg class="back-arrow-saved" xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                <path d="M30.5312 18.5382L6.46887 18.4618" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.2812 28.3368L6.46879 18.4618L16.3437 8.64935" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>
    <section class="saved-recipe-data">
        <!-- Add your recipe list here -->
        <!-- <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4"> -->


        <?php if (isset($_SESSION['message'])) : ?>
            <h5 class="alert alert-success">
                <?= $_SESSION['message']; ?>
            </h5>
        <?php
            unset($_SESSION['message']);
        endif; ?>

        <!-- <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody> -->
        <?php
        try {
            $user_id = $_GET['id'];
            $query = "SELECT * FROM recipes WHERE user_id = :user_id ";
            $stmt = $pdo->prepare($query);
            $data = [
                ":user_id" => $user_id
            ];
            $stmt->execute($data);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                foreach ($result as $row) {
        ?>
                    <div style=" background-color:#D9D9D9; margin-top: 20px;width:100%; display:flex; justify-content:space-between; align-items:center; margin-bottom: 10px">
                        <div style="margin-left:5%;  display: flex; align-items:center;  ">
                            <img style="margin-right:40px" class="responsive-image" src="uploads/<?= $row['url_dish']; ?>" alt="Recipe Image">
                            <h1 style="	font-family: Outfit;
	font-size: 2.5rem;"><?= $row['title']; ?></h1>
                        </div>
                        <div style="display: flex; width:20%; justify-content:space-between; align-items:center">
                            <a href="yourrecipe_edit.php?id=<?= $row['id']; ?>"><i style="font-size: 50px; color:#548235" class="large material-icons ">create</i></a>
                            <form action="code.php" method="POST">
                                <button style=" margin-right:160px; background-color:transparent; border:none" type="submit" value="<?= $row['id']; ?>" name="delete_userrecipe" class="btn btn-danger"><i style="font-size: 50px; color:red" class="large material-icons ">delete</i></button>
                            </form>
                        </div>
                        <!-- Add any other details you want to display -->
                    </div>


                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">No records found</td>
                </tr>
        <?php
            };
        } catch (PDOException $e) {
            $e->getMessage();
        }
        ?>
        <!-- <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div> -->
        <!-- </div>
            </div>
        </div>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script> -->
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