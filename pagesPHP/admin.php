<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="../assets/Logo.png" type="image/x-icon" />
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
						<a id="in-page" href="admin.php">Recipes</a>
					</li>
					<li>
						<a href="listuser.php">Users</a>
					</li>
					<li>
						<li><a href="createrecipe.php">Create recipes</a></li>
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
			<h1 class="saved-recipe-title">Recipes</h1>
		</section>
		<section class="saved-recipe-data"></section>
		<footer class="footer-sec">
			<img class="logo-footer" src="../assets/Logo.png" alt="" />
		</footer>
	</body>
</html>
