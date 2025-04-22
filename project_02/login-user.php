<?php
session_start();

require_once __DIR__ . "/autoload.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $loginErrors = [];

    if (
        isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password'])
    ) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $user = new User();

    $authenticate = $user->authenticate($username, $password);

    if (!empty($errors)) {
        $_SESSION['loginErrors'] = $loginErrors;
    }

    if ($authenticate) {
        $_SESSION['username'] = $username;
        return header("Location: authenticate.php");
    } else {
        return header("Location: login.php?loginError=0");
    }
} else {
    return header("Location: login.php?error=invalidrequest");
}
