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
        <div class="welcome-text">
            <h1>Welcome to Brainster Library</h1>
            <p>At Brainster Library, we offer a diverse collection of books that inspire, educate, and entertain. From timeless classics to the latest releases, our shelves are filled with treasures waiting to be discovered.</p>
            <a class="nav-button" href="bookshelf.php">Head to Bookshelf</a>
        </div>
    </div>
    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>