const deleteCategory = document.querySelectorAll("#delete_button");
const deleteAuthor = document.querySelectorAll("#delete_author");
const deleteBook = document.querySelectorAll("delete_book");

deleteCategory.forEach(function (button) {
  button.addEventListener("click", function (e) {
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
        window.location.href = button.getAttribute("href");
      } else {
        swal("Category deletion canceled.", {
          icon: "info",
        });
      }
    });
  });
});

deleteAuthor.forEach(function (button) {
  button.addEventListener("click", function (e) {
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
        window.location.href = button.getAttribute("href");
      } else {
        swal("Category deletion canceled.", {
          icon: "info",
        });
      }
    });
  });
});

deleteBook.forEach(function (button) {
  button.addEventListener("click", function (e) {
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
        window.location.href = button.getAttribute("href");
      } else {
        swal("Category deletion canceled.", {
          icon: "info",
        });
      }
    });
  });
});
