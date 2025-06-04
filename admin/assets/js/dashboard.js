document.addEventListener("DOMContentLoaded", () => {
  console.log("Admin Dashboard Loaded");

  const cards = document.querySelectorAll(".card");
  cards.forEach(card => {
    card.addEventListener("click", () => {
      const title = card.querySelector("h2").textContent;
      alert(`You clicked on "${title}"`);
    });
  });
});
