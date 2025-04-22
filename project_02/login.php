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

    <div class="brainster_nav">
        <nav class="width-90 ">
            <a class="text-white fs-4" href=" index.php">
                <img class="logo" src="./images/Logo.png" alt="">
                Brainster Library
            </a>
            <ul>
                <li>
                    <a class="nav-button" href="register.php">Sign Up</a>
                </li>
                <li>
                    <a class="nav-button" href="login.php">Login</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="hero">
        <div class="forms">
            <form action="login-user.php" method="POST">
                <h4 class="text-center">Log In</h4>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <p class="text-center text-danger"><?= (isset($_GET['loginError'])) ? 'Username or password is incorrect. Try again.' : ''; ?></p>
                <button class="nav-button" type="submit">Log In</button>
            </form>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/8c0d052db3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>