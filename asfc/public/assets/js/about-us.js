let currentIndex = 0;
let slideInterval;

function slidesVisible() {
    return window.innerWidth < 768 ? 1 : 4;
}

function showSlides() {
    const slides = document.querySelectorAll('.conseil-carousel .slide');
    const totalSlides = slides.length;
    const visibleSlides = slidesVisible();

    if (currentIndex > totalSlides - visibleSlides) {
        currentIndex = 0;
    } else if (currentIndex < 0) {
        currentIndex = totalSlides - visibleSlides;
    }

    const offset = -currentIndex * (100 / visibleSlides);
    document.querySelector('.conseil-carousel').style.transform = `translateX(${offset}%)`;
}

function resetInterval() {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 3000);
}

function nextSlide() {
    currentIndex++;
    showSlides();
    resetInterval();
}

function prevSlide() {
    currentIndex--;
    showSlides();
    resetInterval();
}

window.addEventListener('resize', showSlides);

showSlides();
slideInterval = setInterval(nextSlide, 3000);
