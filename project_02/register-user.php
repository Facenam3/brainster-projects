<?php

require_once __DIR__ . "/autoload.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    } else if (strlen($username) < 4) {
        $errors['username'] = "Username is requires at least 4 letters.";
    } else {
        $errors['username'] = "Username is required.";
        header("Location: register.php?error=usernameRequired");
        return;
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email is not valid.";
        header("Location: register.php?error=emailIsNotValid");
    } else {
        $errors['email'] = "Email is required.";
        header("Location: register.php?error=emailRequired");
        return;
    }

    function isPassValid($password)
    {
        $pattern = '\S*((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$)';
        return preg_match($pattern, $password) === 1;
    }
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors['password'] = "Password is required.";
        header("Location: register.php?error=passwordRequired");
        return;
    }

    if (!empty($errors)) {
        $_SESSION['registerErrors'] = $erros;
    }

    function hashedPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    $user = new User();

    $hashedPass = hashedPassword($password);
    $userExist = $user->emailValidation($email);
    if ($userExist) {
        $errors['emailExist'] = "Email already exist.";
        header("Location: register.php?error=emailExist");
        return;
    } else {
        $user->createUser($username, $email, $hashedPass);
        header("Location: register.php");
        return;
    }
} else {
    header("Location: register.php?error=invalidRequest");
    die();
}
