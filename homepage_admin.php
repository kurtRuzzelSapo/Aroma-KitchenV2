<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/Logo.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="./style/homepage.css" />
    <script src="hamburger.js"></script>
    <script src="get_recipes.js"></script>
    <script src="app.js"></script>
    <style>
    /* Add your modal styles here */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
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
    </section>
    <footer class="footer-sec">
        <img class="logo-footer" src="../assets/Logo.png" alt="" />
    </footer>

    <!-- Modal for updating recipe -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Update Recipe</h2>
            <label for="updateTitle">Title:</label>
            <input type="text" id="updateTitle">
            <label for="updateDescription">Description:</label>
            <textarea id="updateDescription"></textarea>
            <label for="updateSteps">Steps:</label>
            <textarea id="updateSteps"></textarea>
            <button onclick="saveUpdate()">Save Update</button>
        </div>
    </div>
</body>

</html>