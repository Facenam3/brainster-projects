$(document).ready(function () {
  $("#save").click(function (e) {
    e.preventDefault();

    let userId = $("#user_id").val();
    let bookId = $("#book_id").val();
    let note_text = $("#note_text").val();
    $.ajax({
      url: "create-note.php",
      type: "POST",
      data: {
        user_id: userId,
        book_id: bookId,
        note_text: note_text,
      },
      success: function (data) {
        console.log("Note saved:", data);

        $("#notes-form")[0].reset();
      },
    });
  });

  $(document).on("click", "#delete_note", function (e) {
    e.preventDefault();
    let noteId = $(this).data("id");

    $.ajax({
      url: "delete-note.php",
      method: "POST",
      data: {
        note_id: noteId,
      },
      success: function (response) {
        if (response.success) {
          $('.single-note[data-id="' + noteId + '"]').remove();
        }
      },
    });
  });

  $(document).on("click", "#edit_note", function (e) {
    e.preventDefault();
    let noteId = $(this).data("value");
    let newText = $(this).closest(".single-note").find(".note-textarea").val();

    console.log(noteId);
    console.log(newText);

    $.ajax({
      url: "edit-note.php",
      method: "POST",
      data: {
        note_id: noteId,
        new_text: newText,
      },
      success: function (response) {
        if (response.success) {
          $(this).closest(".single-note").find(".note-textarea").val(newText);
        } else {
          console.log("Failed to update note.");
        }
      },
    });
  });
});
