<?php

use Asfc\Sae\BddConnect;
use Asfc\Sae\MariaDBRepository;

require_once '../vendor/autoload.php';
$bdd = new BddConnect();
$pdo = $bdd->connexion();
$trousseau = new MariaDBRepository($pdo);
$enregistrerForm = $trousseau->getUserByReponses($_SESSION['id_users']);