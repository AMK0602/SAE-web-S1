<?php

use Asfc\Sae\GestionFormulaire;
use Asfc\Sae\BddConnect;
use Asfc\Sae\MariaDBRepository;

if(!session_id())
    session_start();

require_once '../../../vendor/autoload.php';

$bdd = new BddConnect();

$pdo = $bdd->connexion();
$trousseau = new MariaDBRepository($pdo);
$form = new GestionFormulaire($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $_POST['reponses'][1];

    $retour = $form->enregistrerReponse(
        $_POST['reponses'][1], // Région
        $_POST['reponses'][2], // Situation logement
        $_POST['reponses'][3], // Orientation CDAPH
        $_POST['reponses'][4], // Satisfaction lieu de vie
        $_POST['reponses'][5], // Activité
        $_POST['reponses'][6], // Qualité de vie
        $_POST['reponses'][7], // Besoin soutien
        $_SESSION['id_users']);
    $message = "Votre réponse au formulaire a été enregistrée";
    $code = "success";
    $_SESSION['flash'][$code] = $message;
    header("Location: ../../index.php");
}
