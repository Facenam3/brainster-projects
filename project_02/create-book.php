<?php
session_start();
require_once __DIR__ . "../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $errors = [];

    if (
        isset($_POST['title']) && !empty($_POST['title']) &&
        isset($_POST['author_id']) && !empty($_POST['author_id']) &&
        isset($_POST['cathegory_id']) && !empty($_POST['cathegory_id']) &&
        isset($_POST['publication_year']) && !empty($_POST['publication_year']) &&
        isset($_POST['pages_number']) && !empty($_POST['pages_number']) &&
        isset($_POST['image_url']) && !empty($_POST['image_url'])
    ) {
        $title = $_POST['title'];
        $author_id = $_POST['author_id'];
        $cathegory_id = $_POST['cathegory_id'];
        $publication_year = $_POST['publication_year'];
        $pages_number = $_POST['pages_number'];
        $image_url = $_POST['image_url'];

        $books = new Books();
        $newBook = $books->createBook($title, $author_id, $cathegory_id, $publication_year, $pages_number, $image_url);


        if ($newBook) {
            $errors['bookAdded'] = "Book successfully created.";
            if (!empty($errors)) {
                $_SESSION['bookSuccess'] = $errors;
            }

            return header("Location: add-book.php?success=addedbook");
        }
    } else {

        $errors['booksInputRequired'] = "Input is required";
        if (!empty($errors)) {
            $_SESSION['bookErrors'] = $errors;
        }
        return header("Location: add-book.php?error=inputrequired");
    }
}
