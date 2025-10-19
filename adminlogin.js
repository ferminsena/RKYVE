const slideshowContainer = document.querySelector('.slideshow-container');

const images = [
  'images/image1.jpg',
  'images/image2.jpg',
  'images/image3.jpg',
  'images/image4.jpg'
];

let currentIndex = 0;

function changeBackground() {
  slideshowContainer.style.backgroundImage = `url('${images[currentIndex]}')`;
  currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeBackground, 3500);

changeBackground();