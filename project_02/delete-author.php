<?php

require_once __DIR__ . "/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $authors = new Authors();
        $deletedAuthor = $authors->deleteAuthor($id);

        if ($deletedAuthor) {
            return header("Location: dashboard.php?success=deleted");
        } else {
            return header("Location: dashboard.php?error=error");
        }
    }
}
