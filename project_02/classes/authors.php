<?php

class Authors extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createAuthor($first_name, $last_name, $biography)
    {
        $pdo = $this->instance;

        $sql = "INSERT INTO authors (first_name, last_name, biography) VALUES (:first_name, :last_name, :biography)";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":first_name", $first_name);
        $pdo_statement->bindParam(":last_name", $last_name);
        $pdo_statement->bindParam(":biography", $biography);
        $pdo_statement->execute();

        $result = $pdo_statement->rowCount();

        return $result;
    }

    public function getAllAuthors()
    {

        $pdo = $this->instance;
        $sql = "SELECT * FROM authors WHERE deleted_at IS NULL";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->execute();

        $allAuthors = $pdo_statement->fetchAll();

        return $allAuthors;
    }

    public function getSingleAuthors($id)
    {
        $pdo = $this->instance;
        $sql = "SELECT * FROM authors WHERE id=:id AND deleted_at IS NULL";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();

        $singleAuthor = $pdo_statement->fetch();

        return $singleAuthor;
    }

    public function deleteAuthor($id)
    {
        $pdo = $this->instance;

        $sql = "UPDATE authors SET deleted_at = 1 WHERE id = :id";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();
    }

    public function updateAuthor($id, $first_name, $last_name, $biography)
    {
        $pdo = $this->instance;
        $sql = "UPDATE authors SET first_name = :first_name, last_name = :last_name, biography = :biography WHERE id = :id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->bindParam(":first_name", $first_name);
        $pdo_statement->bindParam(":last_name", $last_name);
        $pdo_statement->bindParam(":biography", $biography);

        $pdo_statement->execute();
    }
}
