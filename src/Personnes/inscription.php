<?php


use src\Personnes\Personne;

require "GestionnairePers.php";
require "Personne.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new database();
    $gestionnaire = new GestionnairePers();
    $personne = new Personne(
        $_POST["signup-last"] ?? '',
        $_POST["signup-first"] ?? '',
        $_POST["signup-age"]?? '',
        $_POST["signup-Region"] ?? '',
        $_POST["signup-pwd"] ?? '', $_POST["signup-email"] ?? '');
    var_dump($personne);

//if ($_POST["signup-pwd"] !== $_POST["signup-confirm-pwd"]) {
//    header("Location: ../../public/connexion_inscription.php");
//}else{
    $gestionnaire->enregistrement($personne);
//}

}



/*array(7) {
  ["signup-last"]=>
  string(1) "j"
  ["signup-first"]=>
  string(3) "fff"
  ["signup-age"]=>
  string(1) "4"
  ["signup-Region"]=>
  string(4) "rrrr"
  ["signup-email"]=>
  string(13) "jjj@gmail.com"
  ["signup-pwd"]=>
  string(3) "ggg"
  ["signup-comfirm"]=>
  string(3) "ggg"
}*/












