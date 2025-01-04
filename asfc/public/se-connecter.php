<?php
require_once('../public/header.php'); ?>

    <!--Se connecter-->
    <div class="se-connecter">
        <div class="container">
            <div class="header">
                <button class="active">S'inscrire</button>
                <button class="inactive">Se connecter</button>
            </div>
        
            <h3>S'inscrire</h3>
        
            <div class="social-btn">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_(2019).svg" alt="Facebook" width="40">
                <span>S'inscrire avec Facebook</span>
            </div>
            <div class="social-btn">
                <img src="assets/images/google-icon.png" alt="Google" width="40">
                <span>S'inscrire avec Google</span>
            </div>
        
            <div class="divider">
                <hr>
                <span>OU</span>
                <hr>
            </div>
        
            <div class="input-group">
                <input type="text" placeholder="Nom">
                <input type="text" placeholder="Prénom">
            </div>
            <input type="email" placeholder="Adresse mail" value="azerty.qwerty@gmail.com">
        
            <div class="password-wrapper">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" placeholder="Entrez votre mot de passe">
            </div>
        
            <button id="submit-btn">S'inscrire</button>
        </div>
    </div>



<?php require_once('footer.php') ?>