<?php

use Asfc\Sae\Authentification;
use Asfc\Sae\BddConnect;
use Asfc\Sae\MariaDBRepository;

if(!session_id())
    session_start();

require_once '../../../vendor/autoload.php';

$bdd = new BddConnect();

$pdo = $bdd->connexion();
$trousseau = new MariaDBRepository($pdo);
$auth = new Authentification($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $email = $_POST['signin-email'];
        $password = $_POST['signin-pwd'];
        $retour = $auth->authenticate($email, $password);
        $user = $trousseau->findUserByEmail($email);
        $_SESSION['flash']["success"] = "Authentification réussie";
        $_SESSION['id_users'] = $trousseau->findUserIDByEmail($email);
        $_SESSION['role'] = $user->getRole();
        $_SESSION['cotisation'] = $user->getCotisation();
            header("Location: ../../index.php");
            exit();



    }
    catch(Exception $e) {
        $retour = false;
        $message = "Authentification impossible : " . $e->getMessage();
        $code = "warning";
    }


    $_SESSION['flash'][$code] = $message;

    header("Location: ../../connexion_inscription.php");
}