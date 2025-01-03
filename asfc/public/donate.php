<?php
require_once('../public/header.php'); ?>

    <div class="donation-form">
        <div class="donation-options">  
            <h4>Votre don sécurisé</h4>
            <div class="don-type">
                <button class="active">Don unique</button>
                <button>Don mensuel</button>
            </div>
            <div class="amounts">
                <button>20 €</button>
                <button>40 €</button>
                <button>60 €</button>
                <button>80 €</button>
                <button>100 €</button>
                <button>120 €</button>
            </div>
            <div class="custom-amount d-flex">
                <input type="text" id="customAmount" placeholder="Montant libre">
                <label for="customAmount">€</label>
            </div>
            <button class="submit-donation">Je valide mon don</button>
        </div>
    
        <div class="donation-details">
            <h2>Mes coordonnées</h2>
            <form class="row">
                <p class="note">Les champs suivis d'un * sont obligatoires</p>
                <div class="personal-info col-6">
                    <h3>Mes informations personnelles</h3>
                    <label>Civilité *</label>
                    <div class="civilite-options">
                        <label><input type="radio" name="civilite"> Mme</label>
                        <label><input type="radio" name="civilite"> M.</label>
                        <label><input type="radio" name="civilite"> Société</label>
                    </div>
                    <input type="text" placeholder="Nom *">
                    <input type="text" placeholder="Prénom *">
                    <input type="text" placeholder="Nom *">
                    <input type="email" placeholder="Adresse e-mail *">
                    <input type="tel" placeholder="Téléphone">
                </div>
                <div class="address-info col-6">
                    <h3>Mon adresse postale</h3>
                    <input type="text" placeholder="Adresse, voie (rue, bd, etc.) *">
                    <input type="text" placeholder="Complément d'adresse">
                    <input type="text" placeholder="Résidence, Bâtiment">
                    <select>
                        <option>Pays</option>
                    </select>
                    <input type="text" placeholder="Code postal">
                    <input type="text" placeholder="Ville">
                </div>
                <button class="submit-donation">Je valide mon don</button>
                <p class="note"><input type="checkbox"> Je préfère donner par chèque</p>
            </form>
        </div>
    </div>

<?php require_once('../public/footer.php'); ?>