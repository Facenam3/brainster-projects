<?php

session_start();
require_once __DIR__ . "/autoload.php";


if (strcasecmp($_SESSION['username'], "Admin") == 0) {

    return header("Location: dashboard.php?success=welcome" . $_SESSION['username']);
} else {

    return header("Location: bookshelf.php?success=welcome" . $_SESSION['username']);
}
