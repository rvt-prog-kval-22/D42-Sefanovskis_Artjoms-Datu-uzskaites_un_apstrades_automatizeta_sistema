/* /////////////////////////////// */
/* Kods atbildīgs par mobīlās navigācijas darbību
/* /////////////////////////////// */
const btnNavOpen = document.querySelector(".btn-mobile-nav-open");
const btnNavClose = document.querySelector(".btn-mobile-nav-close");
const navigation = document.querySelector(".main-nav-container");

btnNavOpen.addEventListener("click", function () {
  navigation.classList.toggle("nav-open");
});

btnNavClose.addEventListener("click", function () {
  navigation.classList.remove("nav-open");
});

/* /////////////////////////////// */
/* Kods atbildīgs par pašreizējā gada izvadi mājaslapas kājenē 
/* /////////////////////////////// */
const yearEl = document.querySelector(".year");
const currentYear = new Date().getFullYear();
yearEl.textContent = currentYear;
