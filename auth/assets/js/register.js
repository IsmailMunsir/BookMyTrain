document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registerForm");
  form.addEventListener("submit", (e) => {
    const pass = form.password.value;
    const confirm = form.confirm_password.value;
    if (pass !== confirm) {
      e.preventDefault();
      alert("Passwords do not match!");
    }
  });
});
