<?php

require_once __DIR__ . "/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $categoryId = $_GET['id'];

        $category = new Category();
        $deletedCategory = $category->deleteCategory($categoryId);

        if ($deletedCategory) {
            return header("Location: dashboard.php?success=deleted");
        } else {
            return header("Location: dashboard.php?error=error");
        }
    }
}
