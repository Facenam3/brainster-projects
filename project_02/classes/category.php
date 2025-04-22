<?php

require_once __DIR__ . "/database.php";

class Category extends DB
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createCategory($name)
    {
        $pdo = $this->instance;
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("name", $name);
        $pdo_statement->execute();

        $result = $pdo_statement->rowCount();

        return $result;
    }

    public function getAllCategory()
    {
        $pdo = $this->instance;

        $sql = "SELECT * FROM categories WHERE deleted_at is NULL";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->execute();
        $allCategory = $pdo_statement->fetchAll();

        return $allCategory;
    }

    public function getCategory($id)
    {
        $pdo = $this->instance;

        $sql = "SELECT * FROM categories WHERE id = :id";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("id", $id);
        $pdo_statement->execute();

        $oneCategory = $pdo_statement->fetch();

        return $oneCategory;
    }

    public function getCategoryId($category)
    {
        $pdo = $this->instance;

        $sql = "SELECT * FROM categories WHERE category = :category";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("category", $category);
        $pdo_statement->execute();

        $oneCategory = $pdo_statement->fetch();

        return $oneCategory;
    }

    public function deleteCategory($id)
    {
        $pdo = $this->instance;

        $sql = "UPDATE categories SET deleted_at = 1 WHERE id = :id";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("id", $id);
        $pdo_statement->execute();
    }

    public function updateCategory($id, $title)
    {
        $pdo = $this->instance;

        $sql = "UPDATE categories SET title = :title WHERE id = :id";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam("id", $id);
        $pdo_statement->bindParam("title", $title);

        $pdo_statement->execute();
    }
}
