let allCards = document.querySelectorAll(".card");
let allFilters = document.querySelectorAll(".filter input[type='checkbox']");

allFilters.forEach(function (filter) {
  filter.addEventListener("change", function () {
    let filterId = filter.id;
    hideAllCards();
    if (filter.checked) {
      showCards(filterId);
    } else {
      showAllCards();
    }
  });
});

function showCards(categoryId) {
  allCards.forEach(function (card) {
    let categoryCard = card.getAttribute("class");
    let cardCategory = categoryCard.split(" ")[1];
    if (categoryId === cardCategory) {
      card.style.display = "block";
    }
  });
}

function hideAllCards() {
  allCards.forEach(function (card) {
    card.style.display = "none";
  });
}
function showAllCards() {
  allCards.forEach(function (card) {
    card.style.display = "flex";
  });
}
showAllCards();
