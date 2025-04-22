<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

$conn = mysqli_connect(
    hostname: $host,
    username: $username,
    password: $password,
    database: $dbname
);


if (mysqli_connect_errno()) {
    die("Connection failed" . mysqli_connect_error());
};
