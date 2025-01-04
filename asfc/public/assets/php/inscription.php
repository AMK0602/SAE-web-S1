<?php

use Asfc\Sae\Authentification;
use Asfc\Sae\BddConnect;
use Asfc\Sae\MariaDBRepository;

if(!session_id())
    session_start();

require_once '../vendor/autoload.php';

$bdd = new BddConnect();

$pdo = $bdd->connexion();
$trousseau = new MariaDBRepository($pdo);
$auth = new Authentification($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        // TODO autres attribue
        $retour = $auth->register($_POST['signup-last'],$_POST['signup-first'],$_POST['signup-age'],$_POST['signup-region'],$_POST['signup-email'], $_POST['signup-pwd'], $_POST['signup-confirm']);
        $message = "Vous êtes enregistré. Vous pouvez vous authentifier";
        $code = "success";
    }
    catch(Exception $e) {
        $retour = false;
        $message = "Enregistrement impossible : " . $e->getMessage();
        $code = "warning";
    }


    $_SESSION['flash'][$code] = $message;
    header("Location: connexion_inscription.php");
}

