<?php

session_start();
require_once __DIR__ . "../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['comment_id']) && !empty($_GET['comment_id'])) {
        $commentId = $_GET['comment_id'];

        var_dump($_GET);

        $deleted = $comments->deleteUserComment($commentId);

        if ($deleted) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            echo "Failed to delete comment.";
        }
    } else {
        echo "Invalid comment ID.";
    }
} else {
    echo "Method not allowed.";
}
