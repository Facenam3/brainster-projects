<?php

require_once __DIR__ . "/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['note_id'], $_POST['new_text'])) {
        $noteId = $_POST['note_id'];
        $newText = $_POST['new_text'];

        $updatedNote = $notes->updateNoteText($noteId, $newText);
        if ($updatedNote) {
            echo json_encode(['success' => true]);
            return;
        }
    }
}
