<?php
session_start();
require_once __DIR__ . "/autoload.php";
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
            <h4 class="text-center">Add Author</h4>
            <p class="text-center text-success"><?= isset($_SESSION['authorsSuccess']['authorCreated']) ? $_SESSION['authorsSuccess']['authorCreated'] : "" ?></p>

            <form action="create-author.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First name:</label>
                    <input type="text" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name:</label>
                    <input type="text" name="last_name" id="last_name">
                </div>
                <div class="form-group">
                    <label for="bio">Bio:</label>
                    <textarea name="bio" id="bio"></textarea>
                </div>
                <p class="text-danger"><?= isset($_SESSION['authorsErrors']['fieldsRequired']) ? $_SESSION['authorsErrors']['fieldsRequired'] : "" ?></p>
                <button class="nav-button" type="submit">Add Author</button>
            </form>
        </div>
    </div>

    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>

</body>

</html>