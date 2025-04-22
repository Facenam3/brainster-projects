<?php
session_start();
require_once __DIR__ . "/autoload.php";

$authors = new Authors();
$allAuthors = $authors->getAllAuthors();

$category = new Category();
$allCategory = $category->getAllCategory();

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
            <h4 class="text-center">Add Book</h4>
            <p class="text-center"><?= isset($_SESSION['bookSuccess']['bookAdded']) ? $_SESSION['bookSuccess']['bookAdded'] : "" ?></p>
            <form action="create-book.php" method="POST">
                <div class="form-group">
                    <label for="title">Book Title:</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="author_id">Please select an Author for the book.</label>
                    <select name="author_id" id="author_id" autocomplete="off">
                        <option value="" disabled selected>Select an Author</option>
                        <?php foreach ($allAuthors as $singleAuthor) :
                            $fullName = $singleAuthor['first_name'] . " " . $singleAuthor['last_name'] ?>
                            <option value="<?php echo $singleAuthor['id']; ?>"><?php echo $fullName; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cathegory_id">Please select a category for the book.</label>
                    <select name="cathegory_id" id="cathegory_id" autocomplete="off">
                        <option value="" disabled selected>Select a Category</option>
                        <?php foreach ($allCategory as $singleCategory) : ?>
                            <option value="<?php echo $singleCategory['id']; ?>"><?php echo $singleCategory['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="publication_year">Publication Year:</label>
                    <input type="number" name="publication_year" id="publication_year">
                </div>
                <div class="form-group">
                    <label for="pages_number">Pages Number:</label>
                    <input type="number" name="pages_number" id="pages_number">
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL for the Book.</label>
                    <input type="text" name="image_url" id="image_url">
                </div>
                <p class="text-danger"><?= !empty($_SESSION['bookErrors']['booksInputRequired']) ? $_SESSION['bookErrors']['booksInputRequired'] : ''; ?></p>
                <button class="nav-button" type="submit">Add Book</button>
            </form>
        </div>

    </div>
    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>