<?php
session_start();

require_once('../public/header.php'); // Inclure le header si nécessaire
?>

<body>
<div class="container">
    <h2 class="text-center mt-4">Choisissez votre cotisation</h2>
    <form method="post" action="assets/php/cotisation_gestion.php" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Montant de la cotisation</label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cotisation" id="cotisation10" value="10" required>
                    <label class="form-check-label" for="cotisation10">10 €</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cotisation" id="cotisation20" value="20" required>
                    <label class="form-check-label" for="cotisation20">20 €</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cotisation" id="cotisation25" value="25" required>
                    <label class="form-check-label" for="cotisation25">25 €</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cotisation" id="cotisation30" value="30" required>
                    <label class="form-check-label" for="cotisation30">30 €</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cotisation" id="cotisation35" value="35" required>
                    <label class="form-check-label" for="cotisation35">35 €</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>
</div>
</body>