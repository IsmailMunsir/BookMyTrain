
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  if (form) {
    form.addEventListener("submit", function (e) {
      alert("Message sent successfully!");
    });
  }

  // Future: Smooth scroll or tab highlight logic can go here
});
