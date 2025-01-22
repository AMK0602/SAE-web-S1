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
// Données fictives pour les membres du conseil
const slidesData = [
    { name: "Alice Dupont", role: "Présidente"},
    { name: "Bob Martin", role: "Vice-président"},
    { name: "Caroline Lemaitre", role: "Secrétaire générale"},
    { name: "David Moreau", role: "Trésorier"},
    { name: "Emma Durand", role: "Responsable communication"},
    { name: "Félix Legrand", role: "Chargé des relations publiques"},
    { name: "Gabrielle Rousseau", role: "Coordinatrice des projets"}
];

// Conteneur pour le carousel
const carouselContainer = document.querySelector('.conseil-carousel');

// Création des slides dynamiquement
slidesData.forEach(data => {
    const slide = document.createElement('div');
    slide.classList.add('slide');

    slide.innerHTML = `
        <div class="image-placeholder">Image</div>
        <div class="card-info">
            <p><strong>${data.name}</strong></p>
            <p>${data.role}</p>
        </div>
    `;

    carouselContainer.appendChild(slide);
});
