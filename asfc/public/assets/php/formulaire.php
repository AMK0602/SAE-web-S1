<?php
require_once('../public/header.php'); ?>
<section class="formulaire py-5">
    <div class="container mt-4">
        <h1 class="text-center">Formulaire d'enquête à l'intention de nos adhérants :</h1>
        <form action="process_form.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Âge :</label>
                <input type="number" id="age" name="age" class="form-control" min="0" required>
            </div>

            <div class="mb-3">
                <label for="region" class="form-label">Région de résidence :</label>
                <select id="region" name="region" class="form-select" required>
                    <option value="">Sélectionnez votre région</option>
                    <option value="auvergne-rhone-alpes">Auvergne-Rhône-Alpes</option>
                    <option value="bourgogne-franche-comte">Bourgogne-Franche-Comté</option>
                    <option value="bretagne">Bretagne</option>
                    <option value="centre-val-de-loire">Centre-Val de Loire</option>
                    <option value="corse">Corse</option>
                    <option value="grand-est">Grand Est</option>
                    <option value="hauts-de-france">Hauts-de-France</option>
                    <option value="ile-de-france">Île-de-France</option>
                    <option value="normandie">Normandie</option>
                    <option value="nouvelle-aquitaine">Nouvelle-Aquitaine</option>
                    <option value="occitanie">Occitanie</option>
                    <option value="pays-de-la-loire">Pays de la Loire</option>
                    <option value="provence-alpes-cote-d-azur">Provence-Alpes-Côte d'Azur</option>
                    <option value="guadeloupe">Guadeloupe</option>
                    <option value="guyane">Guyane</option>
                    <option value="martinique">Martinique</option>
                    <option value="mayotte">Mayotte</option>
                    <option value="reunion">La Réunion</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="situation_logement" class="form-label">Quelle est votre situation actuelle en matière de logement ?</label>
                <select id="situation_logement" name="situation_logement" class="form-select" required>
                    <option value="">Sélectionnez votre situation</option>
                    <option value="dans-la-famille-en-permanence">Dans la famille en permanence</option>
                    <option value="dans-la-famille-avec-accueil-ou-activites">Dans la famille avec une solution d'accueil ou des activités en journée</option>
                    <option value="dans-la-famille-avec-accueil-temporaire">Dans la famille principalement mais avec un accueil temporaire ou séquentiel en établissement</option>
                    <option value="logement-independant">Dans un logement indépendant</option>
                    <option value="habitat-inclusif">Dans un habitat inclusif</option>
                    <option value="foyer-accueil-medicalise">Dans un foyer d'accueil médicalisé (FAM)</option>
                    <option value="maison-accueil-specialise">Dans une maison d'accueil spécialisée (MAS)</option>
                    <option value="foyer-de-vie">Dans un foyer de vie ou foyer d'hébergement</option>
                    <option value="ime-internat">En IME avec internat</option>
                    <option value="hospitalisation-psychiatrie">Hospitalisation en psychiatrie</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Votre lieu de vie correspond-il à une orientation CDAPH ?</label>
                <div>
                    <input type="radio" id="cdaph_oui" name="cdaph" value="Oui" required>
                    <label for="cdaph_oui">Oui</label>
                </div>
                <div>
                    <input type="radio" id="cdaph_non" name="cdaph" value="Non" required>
                    <label for="cdaph_non">Non</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Êtes-vous satisfait de votre lieu de vie ?</label>
                <div>
                    <input type="radio" id="satisfaction_oui" name="satisfaction" value="Oui" required>
                    <label for="satisfaction_oui">Oui</label>
                </div>
                <div>
                    <input type="radio" id="satisfaction_non" name="satisfaction" value="Non" required>
                    <label for="satisfaction_non">Non</label>
                </div>
                <label for="satisfaction_commentaire" class="form-label">Précisez si vous le souhaitez :</label>
                <textarea id="satisfaction_commentaire" name="satisfaction_commentaire" class="form-control" rows="2"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</section>
<?php require_once('../public/footer.php'); ?>

