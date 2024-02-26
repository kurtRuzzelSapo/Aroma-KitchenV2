<?php
session_start();
require_once(__DIR__ . '/pagesPHP/connection.php');

if (isset($_POST['delete_recipe'])) {
    $id = $_POST['delete_recipe'];
    try {
        $query = "DELETE FROM recipes WHERE id=:id ";
        $query_run = $pdo->prepare($query);

        $data = [
            ':id' => $id
        ];

        $query_execute = $query_run->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Delete Successfully";
            header('Location: homepage_admin.php');
            exit(0);
        } else {
            $_SESSION['message'] = " Process Unsuccessfully";
            header('Location: homepage_admin.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_userrecipe'])) {
    $id = $_POST['delete_userrecipe'];
    try {
        $query = "DELETE FROM recipes WHERE id=:id ";
        $query_run = $pdo->prepare($query);

        $data = [
            ':id' => $id
        ];

        $query_execute = $query_run->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Delete Successfully";
            header('Location: homepage.php');
            exit(0);
        } else {
            $_SESSION['message'] = " Process Unsuccessfully";
            header('Location: homepage.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// UPDATE RECIPE
if (isset($_POST['update_recipe'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $category = $_POST['type'];
    $description = $_POST['description'];
    $steps = $_POST['steps'];

    try {
        $query = "UPDATE recipes SET title=:title, category=:type, description=:description, steps=:steps WHERE id=:id ";
        $query_run = $pdo->prepare($query);

        $data = [
            ':title' => $title,
            ':type' => $category,
            ':description' => $description,
            ':steps' => $steps,
            ':id' => $id
        ];

        $query_execute = $query_run->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Update Successfully";
            header('Location: homepage.php');
            exit(0);
        } else {
            $_SESSION['message'] = " Process Unsuccessfully";
            header('Location: homepage.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//SAVE RECIPE
if (isset($_POST['save_recipe'])) {
    // Check if the user is logged in
    $user_id = $_POST['user_id'];
    $recipe_id = $_POST['recipe_id'];
    // Insert the record into the savedrecipe table
    $insertSQL = "INSERT INTO savedrecipe (user_id, recipe_id) VALUES (:user_id, :recipe_id)";
    $insertStmt = $pdo->prepare($insertSQL);
    $insertStmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $insertStmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $insertStmt->execute();
    $user = $insertStmt->fetch(PDO::FETCH_ASSOC);
    echo "Recipe saved!";

    header('Location: homepage.php');
    exit(0);
}

// REMOVE SAVED RECIPE
if (isset($_POST['remove_recipe'])) {
    $id = $_POST['remove_recipe'];
    try {
        $query = "DELETE FROM savedrecipe WHERE recipe_id=:id ";
        $query_run = $pdo->prepare($query);

        $data = [
            ':id' => $id
        ];

        $query_execute = $query_run->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Delete Successfully";
            header('Location: homepage.php');
            exit(0);
        } else {
            $_SESSION['message'] = " Process Unsuccessfully";
            header('Location: homepage.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
