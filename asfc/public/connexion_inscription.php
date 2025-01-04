<?php
require_once('../public/header.php');?>
<body>
<div class="container form-container">
    <h2 class="text-center">Bienvenue</h2>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#signin">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#signup">Inscription</a>
        </li>
    </ul>

    <div class="tab-content mt-4">
        <!-- Connexion -->
        <div id="signin" class="tab-pane fade show active">
            <form method="post" action="assets/php/connexion.php" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="signin-email" class="form-label">Adresse Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="signin-email" placeholder="Votre adresse email"
                               name="signin-email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="signin-pwd" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="signin-pwd" placeholder="Votre mot de passe"
                               name="signin-pwd" required>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Se connecter</button>
                    <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                </div>
            </form>
        </div>

        <!-- Inscription -->
        <div id="signup" class="tab-pane fade">
            <form method="post" action="assets/php/inscription.php" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="signup-last" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="signup-last" placeholder="Votre nom" name="signup-last"
                           required>
                </div>
                <div class="mb-3">
                    <label for="signup-first" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="signup-first" placeholder="Votre prénom"
                           name="signup-first" required>
                </div>
                <div class="mb-3">
                    <label for="signup-age" class="form-label">Âge</label>
                    <input type="number" class="form-control" id="signup-age" placeholder="Votre âge" name="signup-age"
                           required>
                </div>
                <div class="mb-3">
                    <label for="signup-region" class="form-label">Région</label>
                    <input type="text" class="form-control" id="signup-region" placeholder="Votre région"
                           name="signup-region" required>
                </div>
                <div class="mb-3">
                    <label for="signup-email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="signup-email" placeholder="Votre adresse email"
                           name="signup-email" required>
                </div>
                <div class="mb-3">
                    <label for="signup-pwd" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="signup-pwd" placeholder="Votre mot de passe"
                           name="signup-pwd" required>
                </div>
                <div class="mb-3">
                    <label for="signup-confirm" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="signup-confirm"
                           placeholder="Confirmez votre mot de passe" name="signup-confirm" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-danger" type="reset">Annuler</button>
                    <button class="btn btn-primary" type="submit">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script>
    // Bootstrap validation
    (function () {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
</body>
