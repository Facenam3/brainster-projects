<?php

require_once __DIR__ . "/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['note_id']) && !empty($_POST['note_id'])) {
        $note_id = $_POST['note_id'];

        $deleteNote = $notes->deleteNote($note_id);

        if ($deleteNote) {
            echo json_encode(['success' => true]);
        }
    }
}
