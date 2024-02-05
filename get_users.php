<?php
include(__DIR__ . '/pagesPHP/connection.php');

$sql = "SELECT id, email FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return users as JSON
echo json_encode($users);
?>
