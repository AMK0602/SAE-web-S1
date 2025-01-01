<?php
require  "../src/view/header.php";
?>
    <!-- BANNER -->
    <section class="banner py-5">
        <div class="container mt-4">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-12 mb-3 px-0">
                    <h1 class="display-5 py-3 rounded">LA FATIGUE <br> C'EST <br> NATUREL,</h1>
                    <h1 class="display-5 py-3 rounded">PAS <br> L'ÉPUISEMENT <br> INTENSE !</h1>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="assets/images/tiredperson.png" alt="Personne fatiguée" class="img-fluid banner-img">
                </div>
                <div class="col-12 presentation rounded">
                    <p class="py-2 rounded">
                        Vous connaissez un épuisement qui dure, qui vous a contraint à réduire vos activités, qui s'accompagne d'autres symptômes (douleurs, sommeil non récupérateur, troubles cognitifs, intolérance à la station debout)... <br>Vous vous questionnez sur l'origine de ses troubles, êtes en recherche de diagnostic, de pistes de solutions : contactez-nous !
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ACTUALITÉS -->
    <section class="actualites py-5">
        <div class="container text-center">
            <h2 class="mb-5">Actualités :</h2>
            <div class="actu-carousel">
                <div class="slide">
                    <div class="card rounded">
                        <img src="assets/images/actu-image.png" class="card-img-top" alt="Actu Image">
                        <div class="card-body">
                            <h5 class="card-title">Design</h5>
                            <p class="card-text">Mohammed-Amine devenu le meilleur ingénieur en web design, remporté 3 prix aux élections du mandats du pays des Wa, fini avec un oasis</p>
                            <a href="#" class="link-underline-info link-opacity-75">Lire la suite →</a>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card rounded">
                        <img src="assets/images/actu-image.png" class="card-img-top" alt="Actu Image">
                        <div class="card-body">
                            <h5 class="card-title">CPGE</h5>
                            <p class="card-text">Amine qui wow!!!!! me passe tous ses cours, DMs, TPs, TDs, colles de prépa MP2I incroyable magnifique je vais tryhard les maths de prépa</p>
                            <a href="#" class="link-underline-info link-opacity-75">Lire la suite →</a>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card rounded">
                        <img src="assets/images/actu-image.png" class="card-img-top" alt="Actu Image">
                        <div class="card-body">
                            <h5 class="card-title">Sérieuse</h5>
                            <p class="card-text">D'après ce que m'a dit Amine, Jade Rosin est une élève studieuse, sérieuse, fini toujours ses SAEs à l'avance, a des bonnes notes, incroyable</p>
                            <a href="#" class="link-underline-info link-opacity-75">Lire la suite →</a>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card rounded">
                        <img src="assets/images/actu-image.png" class="card-img-top" alt="Actu Image">
                        <div class="card-body">
                            <h5 class="card-title">Design</h5>
                            <p class="card-text">Mohammed-Amine devenu le meilleur ingénieur en web design, remporté 3 prix aux élections du mandats du pays des Wa, fini avec un oasis</p>
                            <a href="#" class="link-underline-info link-opacity-75">Lire la suite →</a>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card rounded">
                        <img src="assets/images/actu-image.png" class="card-img-top" alt="Actu Image">
                        <div class="card-body">
                            <h5 class="card-title">CPGE</h5>
                            <p class="card-text">Amine qui wow!!! me passe tous ses cours, DMs, TPs, TDs, colles de prépa MP2I incroyable magnifique je vais tryhard les maths de prépa</p>
                            <a href="#" class="link-underline-info link-opacity-75">Lire la suite →</a>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card rounded">
                        <img src="assets/images/actu-image.png" class="card-img-top" alt="Actu Image">
                        <div class="card-body">
                            <h5 class="card-title">Sérieuse</h5>
                            <p class="card-text">D'après ce que m'a dit Amine, Jade Rosin est une élève studieuse, sérieuse, fini toujours ses SAEs à l'avance, a des bonnes notes, incroyable</p>
                            <a href="#" class="link-underline-info link-opacity-75">Lire la suite →</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="prev-btn p-2 mt-3" onclick="prevSlide('.actu-carousel')">&#10094;</button>
            <button class="next-btn p-2 mt-3" onclick="nextSlide('.actu-carousel')">&#10095;</button>
        </div>
    </section>

    <!-- INFO SECTION -->
    <section class="info-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img src="assets/images/actu-image.png" alt="Image Placeholder" class="img-fluid col-lg-10 col-12">
                </div>
                <div class="col-md-6 col-sm-12">
                    <h2>Association Française <br>du syndrome de fatigue chronique</h2>
                    <hr>
                    <p>L'Association Française du Syndrome de Fatigue Chronique est une association loi de 1901 à but non lucratif, créée en 1998 et agréée au niveau national par le Ministère de la solidarité et de la Santé, depuis 2010, pour représenter les usagers du système de santéElle est membre d' ALLIANCE MALADIES RARES (AMR), et de France Assos</p>                    
                    <button class="btn btn-primary btn-dark">Lire la suite</button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="row text-center">
                <div class="card rounded">
                    <div class="cta-item">
                        <img src="assets/images/hands.png" alt="Adhérer Icon" class="img-fluid">
                        <p class="card-text">Devenez membre de l'Association Française de la Fatigue Chronique et participez activement à nos actions. Ensemble, nous pouvons sensibiliser, soutenir la cause.</p>
                        <h4 class=" card-title rounded-pill py-2">Adhérer</h4>
                    </div>
                </div>
                <div class="sep d-none d-lg-block"></div>
                <div class="card rounded">
                    <div class="cta-item">
                        <img src="assets/images/hands_heart.png" alt="Soutenir Icon" class="img-fluid">
                        <p class="card-text">Contribuez à améliorer la vie des personnes souffrant de fatigue chronique en faisant un don. Votre soutien est essentiel pour financer la recherche et l'accompagnement.</p>
                        <h4 class="card-title rounded-pill py-2">Faire un Don</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once('../src/view/footer.php') ?>