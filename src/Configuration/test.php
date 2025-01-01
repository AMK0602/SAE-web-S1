<?php

require "database.php";

$db = new database();
$pdo = $db->connecter();


$rep = $db->chargerLesQuestions($pdo);

var_dump($rep);
