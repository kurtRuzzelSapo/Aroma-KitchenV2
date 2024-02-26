<?php
require_once(__DIR__ . '/pagesPHP/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/homepage.css" />
    <title>Aroma Kitchen</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit & Update Data
                            <a href="homepage_admin.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {

                            $recipe_id = $_GET['id'];

                            $query = "SELECT * FROM recipes WHERE id = :recipe_id LIMIT 1";
                            $stmt = $pdo->prepare($query);
                            $data = [
                                ':recipe_id' => $recipe_id
                            ];

                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="code.php" method="POST">
                            <div class="mb">
                                <input type="hidden" name="id" id="" class="form-control" value="<?= $result['id'] ?>">
                                <label for="username">Title</label>
                                <input type="text" name="username" id="" class="form-control" value="<?= $result['title'] ?>">
                            </div>
                            <div class="mb">
                                <label for="email">Description</label>
                                <textarea id="description" name="description" value="<?= $result['description'] ?>"><?= $result['description'] ?></textarea>
                            </div>
                            <div class="mb">
                                <label for="password">Steps</label>
                                <textarea id="steps" name="steps" value="<?= $result['description'] ?>"><?= $result['steps'] ?></textarea>
                            </div>
                            <div class="mb-3 mt-3 float-end">
                                <form action="code.php" method="POST">
                                    <button type="submit" value="<?= $result['id']; ?>" name="delete_recipe" class="btn btn-danger">Delete Recipe</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>