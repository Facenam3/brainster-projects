function fetchQuote() {
  $.ajax({
    url: "https://api.quotable.io/random",
    method: "GET",
    success: function (data) {
      $("#random-quote").text(`"${data.content}"`);
      $("#author").text(`- ${data.author}`);
    },
    error: function (error) {
      console.error("Error fetching quote:", error);
    },
  });
}

$(document).ready(fetchQuote);
