<?php
session_start();
require_once __DIR__ . "../autoload.php";

$allAuthors = $authors->getAllAuthors();
$allCategory = $category->getAllCategory();
$allBooks = $books->getAllBooks();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brainster Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require_once __DIR__ . "/partials/navigation.php";
    ?>

    <div class="hero-40">
        <div class="welcome">
            <h1 class="text-center text-white py-3">Welcome to Brainster Library</h1>
        </div>

    </div>
    <div class="book-filters">
        <div class="filters">
            <?php foreach ($allCategory as $category) : ?>
                <div class="filter-box filter">
                    <label for="<?= $category['name'] ?>"><?= $category['name'] ?></label>
                    <input type="checkbox" name="filter-<?= $category['name'] ?>" id="<?= $category['name'] ?>">
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="bookshelf">
        <div class="container d-flex">
            <div class="row">
                <?php foreach ($allBooks as $book) : ?>
                    <div class="col-3">
                        <div class="card <?= $book['name'] ?>">
                            <a href="single-book.php?id=<?= $book['id'] ?>">
                                <div class="card-image">
                                    <img class="card-image" src="<?= $book['image_url'] ?>" alt="">
                                </div>

                                <div class="card-body">
                                    <h4 class="card-title"><?= $book['title'] ?></h4>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><b>Author</b> - <span class="author-text"><?= $book['first_name'] . " " . $book['last_name'] ?></span></h6>
                                    <p class="card-text"><b>Category</b> - <?= $book['name'] ?></p>
                                </div>
                            </a>
                        </div>

                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>