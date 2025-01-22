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

window.addEventListener('resize', showSlides);

showSlides();
slideInterval = setInterval(nextSlide, 3000);
document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.querySelector(".actu-carousel");
    const numSlides = 6;

    const commonTitle = "Wow!";
    const commonText = `Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque blandit eu dui nec porta. Nullam semper et nulla pulvinar mollis. Aenean feugiat sed elit sit amet pellentesque.`;

    for (let i = 0; i < numSlides; i++) {
        const slide = document.createElement("div");
        slide.classList.add("slide");

        slide.innerHTML = `
            <div class="card rounded">
                <img src="assets/images/actu-image.png" class="card-img-top" alt="Actu Image">
                <div class="card-body">
                    <h5 class="card-title">${commonTitle}</h5>
                    <p class="card-text">${commonText}</p>
                    <a href="#" class="link-underline-info link-opacity-75">Lire la suite →</a>
                </div>
            </div>
        `;

        carousel.appendChild(slide);
    }
});
