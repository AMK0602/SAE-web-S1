<?php
    echo "<h1>Données soumises :</h1>";
    echo "<pre>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? null; // Nom
        $prenom = $_POST['prenom'] ?? null; // Prénom
        $age = $_POST['age'] ?? null; // Âge
        $region = $_POST['region'] ?? null; // Région de résidence
        $situation_logement = $_POST['situation_logement'] ?? null; // Situation actuelle en matière de logement
        $cdaph = $_POST['cdaph'] ?? null; // Orientation CDAPH
        $satisfaction = $_POST['satisfaction'] ?? null; // Satisfaction du lieu de vie
        $commentaire_satisfaction = $_POST['satisfaction_commentaire'] ?? null; // Commentaire de satisfaction
        echo "<p>Nom : $nom</p>";
        echo "<p>Prénom : $prenom</p>";
        echo "<p>Âge : $age</p>";
        echo "<p>Région : $region</p>";
        echo "<p>Situation actuelle en matière de logement : $situation_logement</p>";
        echo "<p>Lieu de vie correspondant à une orientation CDAPH : $cdaph</p>";
        echo "<p>Satisfaction du lieu de vie : $satisfaction</p>";
        echo "<p>Commentaire sur la satisfaction : $commentaire_satisfaction</p>";
    } else {
        echo "<h1>Accès non autorisé</h1>";
    }
?>