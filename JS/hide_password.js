/* /////////////////////////////// */
/* Kods atbildīgs par paroles slēpšanu un rādīšanu profila sadaļā
/* /////////////////////////////// */
const passwordBtn = document.querySelector(".btn--password-vision");
const passwordOpen = document.querySelector(".password-open");
const passwordClose = document.querySelector(".password-hidden");
const passwordContent = document.querySelector(".password-output");

passwordBtn.addEventListener("click", function () {
  passwordContent.classList.toggle("hidden");
  passwordOpen.classList.toggle("hidden");
  passwordClose.classList.toggle("hidden");
});
