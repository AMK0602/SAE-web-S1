<?php



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="laurent.giustignano">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
    <h2>Mes onglets</h2>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#signin">Authentification</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#signup" >Enregistrement</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="signin" class="container tab-pane active"><br>
            <form method="post" action="../src/Personnes/connexion.php" class="row g-3 needs-validation">
                <div class="col-md-4 ">
                    <label for="signin-email" class="form-label">email</label>
                    <input type="text" class="form-control" id="signin-email" placeholder="Votre adresse email..."
                           name = "signin-email" required>
                </div>
                <div class="col-md-4">
                    <label for="signin-pwd"  class="form-label">Mot de passe</label>
                    <input type="password" name="signin-pwd" class="form-control" id="signin-pwd" placeholder="Votre mot de passe"
                           required>
                </div>
                <div class="row g-3">
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                    </div>
                    <div class="col-md-4">
                        <a class="text-primary" type="submit">Vous avez oublié votre mot de passe ?</a>
                    </div>
                </div>
            </form>
        </div>
        <div id="signup" class="container tab-pane fade"><br>
            <h4>Formulaire d'inscription</h4>
            <form class="row g-3 needs-validation" method="post" action="../src/Personnes/inscription.php" >
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="signup-last" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="signup-last" placeholder="Votre nom..." name = "signup-last" required>
                    </div>
                    <div class="col-md-6">
                        <label for="signup-first" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="signup-first" placeholder="Votre prénom..." name = "signup-first" required>
                    </div>
                    <div class="col-md-6">
                        <label for="signup-age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="signup-age" placeholder="Votre âge..." name = "signup-age" required>
                    </div>
                    <div class="col-md-6">
                        <label for="signup-region" class="form-label">Région</label>
                        <input type="text" class="form-control" id="signup-region" placeholder="Votre région..." name = "signup-Region" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="signup-email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="signup-email" placeholder="Votre adresse email..."
                               name="signup-email" required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="signup-pwd" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="signup-pwd" placeholder="Votre mot de passe..."  name="signup-pwd" required>
                    </div>
                    <div class="col-md-8">
                        <label for="signup-comfirm" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="signup-comfirm" placeholder="Votre mot de passe..."  name="signup-comfirm" required>
                    </div>

                </div>

                <div class="row g-3">
                    <button class="btn btn-outline-danger col-md-3 mr-3" type="reset">Annuler</button>
                    <button class="btn btn-primary col-md-3 ml-3" type="submit">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
