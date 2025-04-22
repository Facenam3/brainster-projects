<?php
session_start();

if ($_SESSION['username'] === "Admin") {
    require_once __DIR__ . "../autoload.php";

    $allAuthors = $authors->getAllAuthors();
    $allCategory = $category->getAllCategory();
    $allBooks = $books->getAllBooks();
    $allComments = $comments->getAllComments();
} else {
    return header("Location: index.php?invalidrequest");
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brainster Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require_once __DIR__ . "/partials/navigation.php";
    ?>
    <div class="hero dashboard">
        <div class="dashboard_forms mt-navbar  width-90 ">
            <h1 class="text-white text-center">Welcome Mr <?= $_SESSION['username'] ?> Sparrow.</h1>
            <div class="row">
                <div class="col">
                    <div class="dahsboard_form">
                        <h3>Authors Table</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allAuthors as $item) : ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['first_name'] ?></td>
                                        <td><?= $item['last_name'] ?></td>
                                        <td>
                                            <a id="delete_author" class="text-danger" href="delete-author.php?id=<?= $item['id'] ?>">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                            <a class="text-success" href="edit-author.php?id=<?= $item['id'] ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    <?php endforeach; ?>
                                    </tr>
                            </tbody>
                        </table>
                        <a class="nav-button" href="add-author.php">Add Author</a>
                    </div>
                </div>
                <div class="col">
                    <div class="dahsboard_form">
                        <h3>Category Table</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($allCategory as $item) : ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td>
                                            <a id="delete_button" class="text-danger" href="delete-category.php?id=<?= $item['id'] ?>">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                            <a class="text-success" href="edit-category.php?id=<?= $item['id'] ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    <?php endforeach; ?>


                                    </tr>
                            </tbody>
                        </table>
                        <a class="nav-button" href="add-category.php">Add Category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="books">
        <div class="col-100 ">
            <div class="dahsboard_form">
                <h3>Books Table</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Year of publishing</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($allBooks as $bookItem) : ?>
                            <tr>
                                <th scope="row"><?= $bookItem['id'] ?></th>
                                <td><?= $bookItem['title'] ?></td>
                                <td><?= $bookItem['first_name'] . " " . $bookItem['last_name'] ?></td>
                                <td><?= $bookItem['name'] ?></td>
                                <td><?= $bookItem['publication_year'] ?></td>
                                <td>
                                    <a id="delete_book" class="text-danger" href="delete-book.php?id=<?= $bookItem['id'] ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    <a class="text-success" href="edit-book.php?id=<?= $bookItem['id'] ?>">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>


                            <?php endforeach ?>
                            </tr>
                    </tbody>
                </table>
                <a class="nav-button" href="add-book.php">Add Book</a>
            </div>

        </div>
    </div>
    <div class="comments">
        <div class="col-100">
            <div class="dahsboard_form">
                <h3>Comments Table</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Book</th>
                            <th>Comment</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allComments as $comment) : ?><tr>
                                <td><?= $comment['username'] ?></td>
                                <td><?= $comment['book_title'] ?></td>
                                <td><?= $comment['comment_content'] ?></td>
                                <td><?= $comment['created_at'] ?></td>
                                <td>
                                    <a id="delete_button" class="text-danger" href="deny-comment.php?id=<?= $comment['comment_id'] ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    <a class="text-success" href="approve-comment.php?id=<?= $comment['comment_id'] ?>">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>

                            <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>