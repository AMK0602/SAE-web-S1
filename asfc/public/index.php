<?php

require_once 'header.php';

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
                <?php
                if(!session_id())
                    session_start();


                if(isset($_SESSION['id_users'])&& isset($_SESSION['role']) && isset($_SESSION['cotisation']))
                {
                    require_once 'assets/php/cotisation_gestion.php';
                    require_once 'assets/php/formulaire_info.php';
                    
                    if($_SESSION['role'] === 'admin'){
                        echo <<<HTML
                            <form action="admin/stats.php" method="post">
                                <button id="btnformulaire" type="submit" >appuyer sur le bouton pour voir les stats</button>
                            </form>
                        HTML;
                        }elseif(isset($_SESSION['cotisation'])){
                        if($_SESSION['cotisation'] == 0){
                            echo <<<HTML

                        <form action="cotisation.php" method="post">
                                <button id="btnformulaire" type="submit" >appuyer sur le bouton pour cotiser</button>
                         </form>
                       HTML;
                        }elseif (!$enregistrerForm ){
                            echo <<<HTML
                            <form action="formulaire.php" method="post">
                                <button id="btnformulaire" type="submit" >appuyer sur le bouton pour passer le formulaire</button>
                            </form>

                        HTML;
                        }

                }}
                ?>
            </div>
        </div>
        </nav>
        </header>
        <?php
        require_once '../private/app/flash.php';

        messageFlash();
        ?>
        </div>
        </div>
    </section>

    <!-- ACTUALITÉS -->
    <section class="actualites py-5">
        <div class="container text-center">
            <h2 class="mb-5">Actualités :</h2>
            <div class="actu-carousel">
                <!--Généré par index.js-->
            </div>
            <button class="prev-btn p-2 mt-3" onclick="prevSlide()">&#10094;</button>
            <button class="next-btn p-2 mt-3" onclick="nextSlide()">&#10095;</button>
        </div>
    </section>

    <!-- INFO SECTION -->
    <section class="info-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img src="assets/images/actu-image.png" alt="Image Placeholder" class="img-fluid col-12">
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
                        <button class="card-title rounded-pill py-2" >Adhérer</button>
                    </div>
                </div>
                <div class="sep d-none d-lg-block"></div>
                <div class="card rounded">
                    <div class="cta-item">
                        <img src="assets/images/hands_heart.png" alt="Soutenir Icon" class="img-fluid">
                        <p class="card-text">Contribuez à améliorer la vie des personnes souffrant de fatigue chronique en faisant un don. Votre soutien est essentiel pour financer la recherche et l'accompagnement.</p>
                        <button class="card-title rounded-pill py-2">Faire un Don</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

require_once 'footer.php';

?>