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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <section class="banner-sec">
        <h1 class="saved-recipe-title">Recipes</h1>

    </section>
    <section class="saved-recipe-data">
        <!-- Add your recipe list here -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">


                    <?php if (isset($_SESSION['message'])) : ?>
                        <h5 class="alert alert-success">
                            <?= $_SESSION['message']; ?>
                        </h5>
                    <?php
                        unset($_SESSION['message']);
                    endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $query = "SELECT * FROM recipes";
                                        $stmt = $pdo->prepare($query);
                                        $stmt->execute();
                                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        if ($result) {
                                            foreach ($result as $row) {
                                    ?>
                                                <tr>
                                                    <?php echo ' <td><img class="responsive-image"
                                                src="uploads/' . $row['url_dish'] . '" ></img></td>' ?>
                                                    <td><?= $row['title'] ?></td>
                                                    <td>
                                                        <a href="recipe-edit.php?id=<?= $row['id']; ?>" class="btn btn-primary">View</a>
                                                    </td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" value="<?= $row['id']; ?>" name="delete_recipe" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
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
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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