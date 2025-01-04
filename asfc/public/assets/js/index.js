let currentIndex = 0;
let slideInterval;

function slidesVisible() {
    return window.innerWidth < 768 ? 1 : 3;
}

function showSlides() {
    const slides = document.querySelectorAll('.actu-carousel .slide');
    const totalSlides = slides.length;
    const visibleSlides = slidesVisible();

    if (currentIndex > totalSlides - visibleSlides) {
        currentIndex = 0;
    } else if (currentIndex < 0) {
        currentIndex = totalSlides - visibleSlides;
    }

    const offset = -currentIndex * (100 / visibleSlides);
    document.querySelector('.actu-carousel').style.transform = `translateX(${offset}%)`;
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

document.getElementById("btn-don2").addEventListener("click", function() {
    window.location.href = "donate.php";
});
document.getElementById("btn-don1").addEventListener("click", function() {
    window.location.href = "connexion_inscription.php";
});
window.addEventListener('resize', showSlides);

showSlides();
slideInterval = setInterval(nextSlide, 3000);
