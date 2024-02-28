<?php
session_start();
include(__DIR__ . '/pagesPHP/connection.php');

?>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
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


                <?php
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $email = $_SESSION['user_email'];
                ?>
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: 'success',
                            title: "You're signed as  <?php echo $email; ?>"
                        });
                    </script>
                <?php
                    // Create the link with the user ID as a query parameter
                    echo '<li><a href="savedrecipe.php?id=' . $user_id . '">Saved recipes</a></li>';
                    echo '<li><a href="createrecipe.php?id=' . $user_id . '">Create recipes</a></li>';
                    echo '<li><a href="yourrecipe.php?id=' . $user_id . '">Your recipes</a></li>';
                }
                ?>
                <li><a href="#">About us</a></li>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content">
                        <?php
                        if (isset($_SESSION['user_email'])) {
                            $user_email = $_SESSION['user_email'];
                            // Create the link with the user ID as a query parameter
                            echo '<a style="color: green; text-decoration: none; transition: background-color 0.3s; background-color: transparent;" href="#" onmouseover="this.style.backgroundColor=\'#F1F1F1\'" onmouseout="this.style.backgroundColor=\'transparent\'">' . $user_email . '</a>';
                        }
                        ?>
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

        <script src="ajax_script.js"></script>
    </section>



    <footer class="footer-sec">
        <img class="logo-footer" src="../assets/Logo.png" alt="" />
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js
    "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
    " rel="stylesheet">
    <script src="sweetalert.js"></script>
</body>

</html>
<?php
include(__DIR__ . '/pagesPHP/connection.php');

?>