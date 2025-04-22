<?php

require_once __DIR__ . "/classes/user.php";
require_once __DIR__ . "/classes/category.php";
require_once __DIR__ . "/classes/authors.php";
require_once __DIR__ . "/classes/books.php";
require_once __DIR__ . "/classes/comments.php";
require_once __DIR__ . "/classes/notes.php";



$userObj = new User();
$authors = new Authors();
$category = new Category();
$books = new Books();
$comments = new Comments();
$notes = new Notes();
