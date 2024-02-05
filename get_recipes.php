<?php
// Include your database connection file or create a PDO connection here
include(__DIR__ . '/pagesPHP/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch recipes from the database
    $sql = "SELECT id, title FROM recipes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return recipes as JSON
    header('Content-Type: application/json');
    echo json_encode($recipes);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check for update or delete actions
    $action = $_POST['action'];
    $recipeId = $_POST['id'];

    if ($action === 'update') {
        // Handle update logic here
        $newTitle = $_POST['newTitle'];

        $sql = "UPDATE recipes SET title = :newTitle WHERE id = :recipeId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newTitle', $newTitle, PDO::PARAM_STR);
        $stmt->bindParam(':recipeId', $recipeId, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['success' => true, 'message' => 'Recipe updated successfully']);
    } elseif ($action === 'delete') {
        // Handle delete logic here
        $sql = "DELETE FROM recipes WHERE id = :recipeId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':recipeId', $recipeId, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['success' => true, 'message' => 'Recipe deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
}
?>