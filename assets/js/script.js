document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  if (form) {
    form.addEventListener("submit", function (e) {
      alert("Message sent successfully!");
    });
  }
});