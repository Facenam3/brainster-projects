<?php
session_start();
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
            <form action="register-user.php" method="POST">
                <h4 class="text-center">Sign Up</h4>
                <p class="text-center"><?= isset($_SESSION['registerSuccess']) ? $_SESSION['registerSuccess'] : "Sign up to discover and enjoy books from our extensive collection, and connect with fellow book lovers!" ?></p>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <p class="text-danger"><?= !empty($_SESSION['registerErrors']['username']) ? $_SESSION['registerErrors']['username'] : 'Username requires minimum 4 characters.'; ?></p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <p class="text-danger"><?= !empty($_SESSION['registerErrors']['emailExist']) ? $_SESSION['registerErrors']['emailExist'] : 'Email should be unique and validate.'; ?></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <p class="text-danger"><?= !empty($_SESSION['registerErrors']['password']) ? $_SESSION['registerErrors']['password'] : 'Password requires one uppercase letter, one lowercase and one number.'; ?></p>
                </div>
                <button class="nav-button" type="submit">Register</button>
            </form>
        </div>


    </div>

    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>
</body>

</html>