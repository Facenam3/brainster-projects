<?php
session_start();
require_once __DIR__ . "/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $singleBook = $books->getSingleBook($id);

        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $user = $userObj->getUsersId($username);

            $allBookComments = $comments->getAllBookComments($id);
            $allNotes = $notes->getAllNotes($username, $id);
        }
    }
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require_once __DIR__ . "/partials/navigation.php";
    ?>
    <div class="hero">
        <div class="book">
            <div class="width-90 d-flex">
                <div class="col">
                    <img src="<?= $singleBook['image_url'] ?>" alt="book-image">
                </div>
                <div class="col">
                    <div class="text-header">
                        <h3><?= $singleBook['title'] ?></h3>
                        <p>Author: <b><?= $singleBook['first_name'] . " " . $singleBook['last_name'] ?></b></p>
                        <p>Category: <b><?= $singleBook['name'] ?></b></p>
                        <p>Published year: <b><?= $singleBook['publication_year'] ?></b></p>
                        <p>Number of pages: <b><?= $singleBook['pages_number'] ?></b></p>
                    </div>
                    <div class="text-body">
                        <h4 class=" text-white">About the author:</h4>
                        <p class=" text-white"><?= $singleBook['biography'] ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) { ?>
        <div class="single-book-form ">
            <div class="width-90">
                <div class="notes-form">
                    <div id="notes-section">
                        <?php
                        if (isset($allNotes) && !empty($allNotes)) {
                            foreach ($allNotes as $note) :
                        ?>
                                <div class="single-note">
                                    <div class="d-flex">
                                        <textarea class="note-textarea" name="<?= $note['note_text'] ?>" id=""><?= $note['note_text'] ?></textarea>
                                        <div class="note-action d-flex flex-direction-row">
                                            <a id="delete_note" class="text-danger" href="" data-id="<?= $note['id'] ?>">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                            <a id="edit_note" class="text-success" href="" data-value="<?= $note['id'] ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        } ?>
                    </div>
                    <form action="single-book.php" id="notes-form" method="POST">
                        <div class="input-group">
                            <input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>">
                            <input type="hidden" name="book_id" id="book_id" value="<?= $singleBook['book_id'] ?>">
                            <label for="note_text">Leave a note:</label>
                            <textarea name="note_text" id="note_text" placeholder="Leave a note..."></textarea>
                        </div>
                        <input class='nav-button' type="submit" id="save" value="Save">
                    </form>
                </div>
                <div class="comments-form">
                    <form action="create-comment.php?book_id=<?= $singleBook['book_id'] ?>" method="POST">
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                        <input type="hidden" name="book_id" value="<?= $singleBook['book_id'] ?>">
                        <div class="input-group">
                            <label for="comment_content">Leave a Comment:</label>
                            <textarea name="comment_content" id="comment_content" placeholder="Leave a comment..."></textarea>
                        </div>
                        <p>The comment needs to be approved by the administrator.</p>
                        <input class='nav-button' type="submit" value="Save comment">
                        <a class="nav-button" href="delete-comment.php?id=<?= $singleBook['book_id'] ?>">Delete Comment</a>
                    </form>
                </div>
                <div class="comments-section">
                    <?php foreach ($allBookComments as $bookComment) : ?>
                        <div class="single-comment">
                            <div class="d-flex">
                                <h5><?= $bookComment['username'] ?></h5>
                                <p><i><?= " - " .  $bookComment['created_at'] ?></i></p>
                            </div>
                            <div class="comment-msg">
                                <textarea name="" id=""><?= $bookComment['comment_content'] ?></textarea>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php } else {
        echo " ";
    } ?>

    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>