<?php

class Notes extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createComment($user_id, $book_id, $note_text, $created_at = null)
    {
        if ($created_at === null) {
            $created_at = date("Y-m-d H:i:s");
        }

        $pdo = $this->instance;
        $sql = "INSERT INTO private_notes (user_id, book_id,note_text, created_at) VALUES (:user_id, :book_id, :note_text, :created_at)";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":user_id", $user_id);
        $pdo_statement->bindParam(":book_id", $book_id);
        $pdo_statement->bindParam(":note_text", $note_text);
        $pdo_statement->bindParam(":created_at", $created_at);

        $result = $pdo_statement->execute();

        return $result;
    }

    public function getAllNotes($username, $book_id)
    {
        $pdo = $this->instance;
        $sql = "SELECT pn.* FROM private_notes pn JOIN users u ON pn.user_id = u.id WHERE u.username = :username AND pn.book_id = :book_id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":username", $username);
        $pdo_statement->bindParam(":book_id", $book_id);
        $pdo_statement->execute();

        $allNotes = $pdo_statement->fetchAll();

        return $allNotes;
    }

    public function getSingleNote($id)
    {
        $pdo = $this->instance;
        $sql = "SELECT * FROM private_notes WHERE id = :id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();

        $note = $pdo_statement->fetch();

        return $note;
    }

    public function deleteNote($id)
    {
        $pdo = $this->instance;
        $sql = "DELETE FROM private_notes WHERE id = :id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $id);
        $pdo_statement->execute();
    }

    public function updateNoteText($note_id, $note_text)
    {
        $pdo = $this->instance;
        $sql = "UPDATE private_notes SET note_text = :note_text WHERE id = :id";

        $pdo_statement = $pdo->prepare($sql);
        $pdo_statement->bindParam(":id", $note_id);
        $pdo_statement->bindParam(":note_text", $note_text);
        $pdo_statement->execute();
    }
}
