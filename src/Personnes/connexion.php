<?php

use src\src\Configuration\database;
use src\src\Personnes\GestionnairePers;

require "../Personnes/GestionnairePers.php";
require "../Personnes/Personne.php";

$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$password = $_POST['mdp'] ?? null;

$db = new database();
$gestionnaire = new GestionnairePers();
$user = $gestionnaire->authentifier($email , $password);

var_dump($user);


if ($user) {
    header("Location: https://chatgpt.com/");
}else{
    header("Location: https://www.google.fr/");

}
