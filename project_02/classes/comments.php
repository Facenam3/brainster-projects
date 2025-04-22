<?php

class Comments extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createComment($user_id, $book_id, $comment_content, $created_at = null, $pending = 1)
    {
        $pdo = $this->instance;

        $check_sql = "SELECT COUNT(*) FROM books WHERE id = :book_id";
        $check_statement = $pdo->prepare($check_sql);
        $check_statement->bindParam(":book_id", $book_id);
        $check_statement->execute();
        $book_exist = $check_statement->fetchColumn();

        if ($book_exist) {
            if ($created_at === null) {
                $created_at = date("Y-m-d H:i:s");
            }

            $sql = "INSERT INTO comments (user_id, book_id, comment_content, created_at, pending) VALUES (:user_id, :book_id, :comment_content, :created_at, :pending)";

            $pdo_statement = $pdo->prepare($sql);
            $pdo_statement->bindParam(":user_id", $user_id);
            $pdo_statement->bindParam(":book_id", $book_id);
            $pdo_statement->bindParam(":comment_content", $comment_content);
            $pdo_statement->bindParam(":created_at", $created_at);
            $pdo_statement->bindParam(":pending", $pending);

            $pdo_statement->execute();
            return true;
        } else {
            return false;
        }
    }

    public function getAllComments()
    {
        $pdo = $this->instance;
        $sql = "SELECT b.id AS book_id, b.title AS book_title, u.id AS user_id, u.username, c.comment_content, c.created_at, c.id AS comment_id FROM comments c JOIN books b ON c.book_id = b.id JOIN users u ON c.user_id = u.id WHERE c.denied = 1 ";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->execute();

        $allComments = $pdo_statement->fetchAll();

        return $allComments;
    }

    public function deleteComment($id)
    {
        $pdo = $this->instance;
        $sql = "UPDATE comments SET denied = 1 , pending = 0 WHERE id = :id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();
    }

    public function approveComment($id)
    {
        $pdo = $this->instance;
        $sql = "UPDATE comments set approved = 1, pending = 0 WHERE id = :id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();
    }

    public function getAllBookComments($book_id)
    {
        $pdo = $this->instance;
        $sql = "SELECT b.id AS book_id, u.id AS user_id, u.username, c.comment_content, c.created_at FROM comments c JOIN books b ON c.book_id = b.id JOIN users u ON c.user_id = u.id WHERE c.book_id = :book_id AND c.approved = 1;";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":book_id", $book_id);
        $pdo_statement->execute();

        $allComments = $pdo_statement->fetchAll();

        return $allComments;
    }

    public function deleteUserComment($user_id)
    {
        $pdo = $this->instance;
        $sql = "DELETE FROM comments WHERE user_id = :user_id";
        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":user_id", $book_id);
        $pdo_statement->execute();

        $allComments = $pdo_statement->fetchAll();

        return $allComments;
    }
}
