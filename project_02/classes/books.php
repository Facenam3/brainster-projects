<?php

class Books extends DB
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createBook($title,  $author_id, $cathegory_id, $publication_year, $pages_number, $image_url)
    {
        $pdo = $this->instance;
        $sql = "INSERT INTO books (title, author_id, cathegory_id, publication_year, pages_number, image_url) VALUES (:title, :author_id, :cathegory_id, :publication_year, :pages_number, :image_url)";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":title", $title);
        $pdo_statement->bindParam(":author_id", $author_id);
        $pdo_statement->bindParam(":cathegory_id", $cathegory_id);
        $pdo_statement->bindParam(":publication_year", $publication_year);
        $pdo_statement->bindParam(":pages_number", $pages_number);
        $pdo_statement->bindParam(":image_url", $image_url);
        $pdo_statement->execute();

        $result = $pdo_statement->rowCount();
        return $result;
    }

    public function getAllBooks()
    {
        $pdo = $this->instance;
        $sql = "SELECT b.id ,b.title, b.publication_year, b.pages_number, b.image_url , a.first_name, a.last_name, c.name FROM books b JOIN authors a ON b.author_id =a.id JOIN categories c ON b.cathegory_id = c.id WHERE b.deleted_at IS NULL AND a.deleted_at IS NULL AND c.deleted_at IS NULL";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->execute();

        $allBooks = $pdo_statement->fetchAll();

        return $allBooks;
    }

    public function deleteBook($id)
    {
        $pdo = $this->instance;
        $sql = "UPDATE books SET deleted_at = 1 WHERE id = :id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();
    }

    public function getSingleBook($id)
    {
        $pdo = $this->instance;
        $sql = "SELECT b.id AS book_id, b.title, b.publication_year, b.pages_number, b.image_url, a.first_name, a.last_name, a.biography, a.id AS author_id, c.name, c.id as category_id FROM books b JOIN authors a ON b.author_id = a.id JOIN categories c ON b.cathegory_id = c.id WHERE b.id = :id AND b.deleted_at IS NULL AND a.deleted_at IS NULL AND c.deleted_at IS NULL ";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();

        $singleBook = $pdo_statement->fetch();

        return $singleBook;
    }

    public function updateBook($id, $title, $author_id, $cathegory_id, $publication_year, $pages_number, $image_url)
    {
        $pdo = $this->instance;
        $sql = "UPDATE books SET title = :title, author_id = :author_id, cathegory_id = :cathegory_id, publication_year = :publication_year, pages_number = :pages_number, image_url = :image_url WHERE id = :id";
        $pdo_statement = $pdo->prepare($sql);

        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->bindParam(":title", $title);
        $pdo_statement->bindParam(":author_id", $author_id);
        $pdo_statement->bindParam(":cathegory_id", $cathegory_id);
        $pdo_statement->bindParam(":publication_year", $publication_year);
        $pdo_statement->bindParam(":pages_number", $pages_number);
        $pdo_statement->bindParam(":image_url", $image_url);
        $pdo_statement->execute();
    }
}
