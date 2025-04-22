const menu_btn = document.querySelector(".hamburger");
const mobile_menu = document.querySelector(".mobile-nav");

const marketing = document.querySelector("#filter-marketing");
const coding = document.querySelector("#filter-coding");
const design = document.querySelector("#filter-design");
let cards = document.querySelectorAll(".card");

marketing.addEventListener("change", filterMarketing);
coding.addEventListener("change", filterCoding);
design.addEventListener("change", filterDesign);

menu_btn.addEventListener("click", () => {
  menu_btn.classList.toggle("active");
  mobile_menu.classList.toggle("active");
});

function filterMarketing() {
  hideAllCards();

  if (marketing.checked) {
    let marketingCards = document.querySelectorAll(".marketing");
    marketingCards.forEach((marketingCard) => {
      marketingCard.style.display = "inline-block";
    });
    coding.checked = false;
    design.checked = false;
  } else {
    showAllCards();
  }
}

function filterCoding() {
  hideAllCards();

  if (coding.checked) {
    let codingCards = document.querySelectorAll(".coding");
    codingCards.forEach((codingCard) => {
      codingCard.style.display = "inline-block";
    });
    design.checked = false;
    marketing.checked = false;
  } else {
    showAllCards();
  }
}

function filterDesign() {
  hideAllCards();

  if (document.querySelector("#filter-design").checked) {
    let designCards = document.querySelectorAll(".design");
    designCards.forEach((designCard) => {
      designCard.style.display = "inline-block";
    });

    coding.checked = false;
    marketing.checked = false;
  } else {
    showAllCards();
  }
}

function hideAllCards() {
  cards.forEach((card) => {
    card.style.display = "none";
  });
}

function showAllCards() {
  cards.forEach((card) => {
    card.style.display = "inline-block";
  });
}

document.querySelectorAll("input[type=checkbox]").forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    document
      .querySelectorAll("input[type=checkbox]")
      .forEach((otherCheckbox) => {
        otherCheckbox.parentElement.style.backgroundColor = "";
        otherCheckbox.parentElement.style.color = "";
      });

    this.parentElement.style.backgroundColor = this.checked ? "#e23f41" : "";
    this.parentElement.style.color = this.checked ? "#34323a" : "";
  });
});
