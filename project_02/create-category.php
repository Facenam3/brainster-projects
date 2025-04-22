<?php
session_start();

require_once __DIR__ . "../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $errors = [];

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];

        $category = new Category();
        $newCategory = $category->createCategory($name);

        if ($newCategory) {
            $errors['categoryCreated'] = "Category created";
            if (!empty($errors)) {
                $_SESSION['categorySuccess'] = $errors;
            }
            return header("Location: add-category.php?success=addedCategory");
        }
    } else {

        $errors['inputRequired'] = "Input is required";
        if (!empty($errors)) {
            $_SESSION['categoryErrors'] = $errors;
        }
        return header("Location: add-category.php?error=inputrequired");
    }
}
