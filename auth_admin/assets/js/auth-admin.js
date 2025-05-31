document.addEventListener("DOMContentLoaded", () => {
  const inputs = document.querySelectorAll(".auth-form input");

  inputs.forEach((input) => {
    input.addEventListener("focus", () => {
      input.style.boxShadow = "0 0 5px rgba(126, 58, 242, 0.4)";
    });
    input.addEventListener("blur", () => {
      input.style.boxShadow = "none";
    });
  });
});
