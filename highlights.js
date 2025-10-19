// Banner text animation with reset
const bannerText = document.querySelector('.banner h1');
const observerBanner = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            bannerText.classList.add('visible');
        } else {
            bannerText.classList.remove('visible');
        }
    });
});
observerBanner.observe(bannerText);

// Image pop-up animation on scroll with reset
const observerImages = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        } else {
            entry.target.classList.remove('visible');
        }
    });
}, { threshold: 0.2 });

document.querySelectorAll('.horizontal-scroll img').forEach(img => {
    observerImages.observe(img);
});

// Arrows to scroll sections
function scrollLeft(containerId) {
    const container = document.getElementById(containerId);
    container.scrollLeft -= 300; //scroll distance
}

function scrollRight(containerId) {
    const container = document.getElementById(containerId);
    container.scrollLeft += 300; //scroll distance
}

// Add event listeners to arrow buttons
function addArrowListeners(leftArrowId, rightArrowId, containerId) {
    const leftArrow = document.getElementById(leftArrowId);
    const rightArrow = document.getElementById(rightArrowId);
    const container = document.getElementById(containerId);

    leftArrow.addEventListener('click', () => scrollLeft(containerId));
    rightArrow.addEventListener('click', () => scrollRight(containerId));
}

// Auto-scroll functionality
function autoScroll(containerId) {
    const container = document.getElementById(containerId);
    let isHovered = false;

    // Pause auto-scroll on hover
    container.addEventListener('mouseover', () => isHovered = true);
    container.addEventListener('mouseout', () => isHovered = false);

    // Auto-scroll logic
    setInterval(() => {
        if (!isHovered) {
            container.scrollLeft += 300; // Scroll to the right
            // Reset scroll to the start if at the end
            if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
                container.scrollLeft = 0;
            }
        }
    }, 3000);
}

function initializeScrolling() {
    // Initialize for comfort section
    addArrowListeners('leftArrowComfort', 'rightArrowComfort', 'comfortScroll');
    autoScroll('comfortScroll');

    // Initialize for highlights section
    addArrowListeners('leftArrowHighlights', 'rightArrowHighlights', 'highlightsScroll');
    autoScroll('highlightsScroll');
}

initializeScrolling();
