<?php

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $company_name = $_POST['company_name'];
    $company_email = $_POST['company_email'];
    $company_number = $_POST['company_number'];
    $students = $_POST['students'];

    if (!empty($name) && !empty($company_name) && !empty($company_email) && !empty($company_number) && !empty($students)) {
        require_once("./conect.php");

        $sql = "INSERT INTO message (name, company_name, company_email, company_number, students)
                VALUES('$name', '$company_name', '$company_email', '$company_number', '$students');";

        if (mysqli_query($conn, $sql)) {
            header("Location: ./students.php");
        } else {
            echo "something went wrong";
        }
    } else {
        echo "Please provide all the informations.";
    }
}
