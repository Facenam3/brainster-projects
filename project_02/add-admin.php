<?php

require_once __DIR__ . "/autoload.php";

$username = "Admin";
$email = "Admin@example.com";
$password = "Admin123";
$role = "admin";
$hashedPass = hashedPassword($password);

$user = new User();

function hashedPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

$user->createUser($username, $email, $hashedPass, $role);
