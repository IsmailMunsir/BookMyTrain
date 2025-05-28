// Smooth Scrolling
document.querySelectorAll('.terms-sidebar nav ul li a').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// Scrollspy
window.addEventListener('scroll', () => {
  const sections = document.querySelectorAll('.terms-content article');
  const scrollPos = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;

  sections.forEach(section => {
    if (section.offsetTop <= scrollPos + 100 && (section.offsetTop + section.offsetHeight) > scrollPos + 100) {
      document.querySelectorAll('.terms-sidebar nav ul li a').forEach(a => {
        a.classList.remove('active');
        if (a.getAttribute('href') === `#${section.id}`) {
          a.classList.add('active');
        }
      });
    }
  });
});

// Dark Mode Toggle
const themeToggle = document.getElementById('theme-toggle');
themeToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
});
