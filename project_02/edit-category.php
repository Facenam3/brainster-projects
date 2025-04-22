<?php
session_start();
require_once __DIR__ . "/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $categoryId = $_GET['id'];

        $category = new Category();
        $categoryObj = $category->getCategory($categoryId);
    }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['id']) && !empty($_POST['id'])
    ) {
        $name = $_POST['name'];
        $id = $_POST['id'];

        $error = [];

        $category = new Category();
        $result = $category->updateCategory($id, $name);

        if ($result) {
            return header("Location: dashboard.php?error=categoryupdatefailed");
        } else {
            return header("Location: dashboard.php?success=categoryupdated");
        }
    }
} else {
    return header("Location: edit-category.php?error=requiredfields");
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
            <h4 class="text-center">Add Category</h4>
            <p class="text-center"><?= isset($_SESSION['categorySuccess']['categoryCreated']) ? $_SESSION['categorySuccess']['categoryCreated'] : "" ?></p>
            <form action="edit-category.php" method="POST">
                <div class="form-group">
                    <label for="name">Category Title:</label>
                    <input type="hidden" name="id" value="<?php echo $categoryObj['id'] ?>">
                    <input type="text" name="name" id="name" value="<?php echo $categoryObj['name'] ?>">
                </div>
                <p class="text-danger"><?= !empty($_SESSION['categoryErrors']['inputRequired']) ? $_SESSION['categoryErrors']['inputRequired'] : ''; ?></p>
                <button class="nav-button" type="submit">Edit Category</button>
            </form>
        </div>


    </div>
    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>