<?php
require "../Personnes/GestionnairePers.php";
require "../Personnes/Personne.php";

$email = isset($_POST['signin-email']) ? trim($_POST['signin-email']) : null;
$password = $_POST['signin-pwd'] ?? null;
$db = new database();
$gestionnaire = new GestionnairePers();
$user = $gestionnaire->authentifier($email , $password);

if ($user) {
    header("Location: ../../public/index.php");
}else{
    header("Location: ../../public/connexion_inscription.php");
}
