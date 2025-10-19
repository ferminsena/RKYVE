// Toggle the hamburger menu and navbar links when clicked
const hamburger = document.querySelector('.hamburger');
const navbar = document.querySelector('nav');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active'); // Toggle the X state
  navbar.classList.toggle('show');      // Show the navbar links
});