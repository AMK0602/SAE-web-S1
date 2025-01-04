<?php

use Asfc\Sae\Authentification;
use Asfc\Sae\BddConnect;
use Asfc\Sae\MariaDBRepository;

if(!session_id())
    session_start();


require_once 'header.php';
require_once '../vendor/autoload.php';

$bdd = new BddConnect();

$pdo = $bdd->connexion();
$trousseau = new MariaDBRepository($pdo);
$auth = new Authentification($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $retour = $auth->authenticate($_POST['signin-email'], $_POST['signin-pwd']);
        $adherent= $trousseau->getUserRoleByEmail($_POST['signin-email'])==="adherent";
        $_SESSION['flash']["success"] = "Authentification réussie";
        if($adherent){
            header("Location: index.php");
            exit();

        } else {
            header("Location: donate.php");
            exit();
        }


    }
    catch(Exception $e) {
        $retour = false;
        $message = "Authentification impossible : " . $e->getMessage();
        $code = "warning";
    }


    $_SESSION['flash'][$code] = $message;

    header("Location: connexion_inscription.php");
}

require_once 'footer.php';