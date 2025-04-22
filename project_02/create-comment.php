<?php
session_start();
require_once __DIR__ . "/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (
        isset($_POST['user_id']) && !empty($_POST['user_id']) &&
        isset($_POST['book_id']) && !empty($_POST['book_id']) &&
        isset($_POST['comment_content']) && !empty($_POST['comment_content'])
    ) {
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];
        $comment_content = $_POST['comment_content'];

        $errors = [];

        $commentsObj = $comments->createComment($user_id, $book_id, $comment_content);

        if ($commentsObj) {
            $errors["commentCreated"] = "Comment created.";
            if (!empty($errors)) {
                $_SESSION['commentsSuccess'] = $errors;
            }
            return header("Location: single-book.php?id=$book_id");
        } else {
            $errors['invalidRequest'] = "Comment not added";
            return header("Location: single-book.php?id=$book_id");
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $book_id = $_GET['book_id'];
    return header("Location: single-book.php?id=$book_id");
}
