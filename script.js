// script.js
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

// Toggle the hamburger menu and nav links
hamburger.addEventListener('click', () => {
  navLinks.classList.toggle('active');
  hamburger.classList.toggle('active');
});


// partners slider
// partners slider
let currentSlide = 0;
const slides = document.querySelectorAll(".partner-slide");

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(${(i - index) * 200}px)`; /* Slide movement */
  });
}

function autoSlide() {
  currentSlide = (currentSlide + 1) % slides.length;  // Loop back to the first slide
  showSlide(currentSlide);
}

// Auto-slide every 3 seconds
setInterval(autoSlide, 3000);

// Initial display
showSlide(currentSlide);

//mouse 
// Create Cursor Elements
const cursor = document.createElement('div');
const follower = document.createElement('div');
cursor.classList.add('cursor');
follower.classList.add('follower');
document.body.append(cursor, follower);

// Track Mouse Movement
document.addEventListener('mousemove', (e) => {
  const { clientX: x, clientY: y } = e;

  // Move Cursor Instantly
  cursor.style.left = `${x}px`;
  cursor.style.top = `${y}px`;

  // Smooth Follower Trail
  setTimeout(() => {
    follower.style.left = `${x}px`;
    follower.style.top = `${y}px`;
  }, 50);
});

