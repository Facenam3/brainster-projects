<?php

require_once __DIR__ . "../autoload.php";

if (
    isset($_POST['user_id']) && !empty($_POST['user_id']) &&
    isset($_POST['book_id']) && !empty($_POST['book_id']) &&
    isset($_POST['note_text']) && !empty($_POST['note_text'])
) {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $note_text = $_POST['note_text'];

    $noteObj = $notes->createComment($user_id, $book_id, $note_text);

    if ($noteObj) {
        echo "Data saved";
    }
}
