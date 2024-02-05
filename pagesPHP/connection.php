<?php

// Database credentials
$host = 'localhost'; // usually 'localhost' if the database is on the same server
$dbname = 'projectdb';
$username = 'root';
$password = '';

// PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // You can remove or modify this line based on your needs
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Now you can use the $pdo object for database operations

?>
