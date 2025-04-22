<?php

require_once __DIR__ . "/autoload.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $approvedComment = $comments->approveComment($id);
        if (!$approvedComment) {
            return header("Location: dashboard.php?success=approved");
        } else {
            return header("Location: dashboard.php?error=invalidrequest");
        }
    }
}
