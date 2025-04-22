<?php
session_start();
require_once __DIR__ . "/autoload.php";



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    if (
        isset($_POST['first_name']) && !empty($_POST['first_name']) &&
        isset($_POST['last_name']) && !empty($_POST['last_name']) &&
        isset($_POST['bio']) && !empty($_POST['bio'])
    ) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $biography = $_POST['bio'];

        $authors = new Authors();
        $newAuthor = $authors->createAuthor($first_name, $last_name, $biography);

        if ($newAuthor) {
            $errors["authorCreated"] = "Author created.";
            if (!empty($errors)) {
                $_SESSION['authorsSuccess'] = $errors;
            }
            return header("Location: add-author.php?success=addedAuthor");
        } else {
            $errors['invalidRequest'] = "Author not added";
            return header("Location: add-author.php?errors=authornotadded");
        }
    } else {
        $errors['fieldsRequired'] = "All fields are required";
        if (!empty($errors)) {
            $_SESSION['authorsErrors'] = $errors;
        }

        return header("Location: add-author.php");
    }
}
