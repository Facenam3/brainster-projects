<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Delete Category</title>
</head>

<body>

    <a id="delete_button" href="">delete</a>
    <script>
        const deleteButton = document.getElementById("delete_button");

        deleteButton.addEventListener("click", function(e) {

            e.preventDefault();
            console.log("BUTTON IS CLICKED");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this category!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    window.location.href = deleteButton.getAttribute('href');
                } else {

                    swal("Category deletion canceled.", {
                        icon: "info",
                    });
                }
            });
        });
    </script>
</body>

</html>