<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brainster Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    require_once __DIR__ . "/partials/navigation.php";
    ?>
    <div class="hero">
        <div class="forms">
            <h4 class="text-center">Add Category</h4>
            <p class="text-center text-success"><?= isset($_SESSION['categorySuccess']['categoryCreated']) ? $_SESSION['categorySuccess']['categoryCreated'] : " " ?></p>
            <form action="create-category.php" method="POST">
                <div class="form-group">
                    <label for="name">Category title:</label>
                    <input type="text" name="name" id="name">
                </div>
                <p class="text-danger"><?= !empty($_SESSION['categoryErrors']['inputRequired']) ? $_SESSION['categoryErrors']['inputRequired'] : ''; ?></p>
                <button class="nav-button" type="submit">Add Category</button>
            </form>
        </div>


    </div>
    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>

</body>

</html>