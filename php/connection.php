<?php
// Create variable names for easy use.
$host = 'localhost';
$dbname = 'projectdb';
$user = 'root';
$pass = '';

try {
    // Create a PDO connection. This is the default syntax.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check the connection status is ok
     if ($pdo) {
         echo "Connected successfully";
     } else {
         echo "Connection failed";
     }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}