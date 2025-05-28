  // Animated Counter
  document.querySelectorAll('.counter').forEach(counter => {
    const update = () => {
      const target = +counter.dataset.target;
      const current = +counter.innerText;
      const increment = target / 200;
      if (current < target) {
        counter.innerText = Math.ceil(current + increment);
        setTimeout(update, 10);
      } else {
        counter.innerText = target;
      }
    };
    update();
  });

  // Newsletter Email Validation
  document.getElementById('newsletter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const re = /\S+@\S+\.\S+/;
    if (re.test(email)) {
      alert('Thank you for subscribing!');
    } else {
      alert('Please enter a valid email address.');
    }
  });