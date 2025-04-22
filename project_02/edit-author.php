<?php
session_start();
require_once __DIR__ . "/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $authors = new Authors();
        $authorObj = $authors->getSingleAuthors($id);
    }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST['first_name']) && !empty($_POST['first_name']) &&
        isset($_POST['last_name']) && !empty($_POST['last_name']) &&
        isset($_POST['biography']) && !empty($_POST['biography']) &&
        isset($_POST['id']) && !empty($_POST['id'])
    ) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $biography = $_POST['biography'];
        $id = $_POST['id'];

        $authors = new Authors();
        $singleAuthor = $authors->updateAuthor($id, $first_name, $last_name, $biography);

        if ($singleAuthor) {
            return header("Location: dashboard.php?error=authorupdatefailed");
        } else {
            return header("Location: dashboard.php?success=authorupdated");
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require_once __DIR__ . "/partials/navigation.php";
    ?>
    <div class="hero">
        <div class="forms">
            <h4 class="text-center">Add Author</h4>
            <form action="edit-author.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $authorObj['id']; ?>">
                    <label for="first_name">First name:</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $authorObj['first_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name:</label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $authorObj['last_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="biography">Bio:</label>
                    <textarea name="biography" id="biography"><?php echo $authorObj['biography']; ?></textarea>
                </div>
                <button class="nav-button" type="submit">Edit Author</button>
            </form>
        </div>


    </div>

    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>