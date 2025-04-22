<?php

require_once __DIR__ . "/database.php";

class User extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function emailValidation($email)
    {
        $pdo = $this->instance;

        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("email", $email);
        $pdo_statement->execute();

        $user = $pdo_statement->fetch();
        if (!empty($user)) {
            return true;
        }
        return false;
    }

    public function createUser($username, $email, $password, $role = "user")
    {
        $pdo = $this->instance;;
        $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("username", $username);
        $pdo_statement->bindParam("email", $email);
        $pdo_statement->bindParam("password", $password);
        $pdo_statement->bindParam("role", $role);
        $pdo_statement->execute();
        $result = $pdo_statement->rowCount();

        return $result;
    }

    public function authenticate($username, $password)
    {
        $pdo = $this->instance;
        $sql = "SELECT * FROM users WHERE username = :username";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("username", $username);
        $pdo_statement->execute();

        $user = $pdo_statement->fetch();

        if (!empty($user) && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }

    public function getUsersId($username)
    {
        $pdo = $this->instance;
        $sql = "SELECT * FROM users WHERE username = :username";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("username", $username);
        $pdo_statement->execute();

        $user = $pdo_statement->fetch();

        return $user;
    }
}
