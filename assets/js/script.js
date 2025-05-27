// Simple JS to show a message when a form is submitted
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  if (form) {
    form.addEventListener("submit", function (e) {
      alert("Your message has been sent. Thank you!");
    });
  }
});
