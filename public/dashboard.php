<?php
require "../src/Configuration/database.php";
$db = new Database();
$pdo = $db->connecter();
$reponsesAges = $db->chargerReponses($pdo, 1);
$OptionsAge = $db->chargerLesOptions($pdo,1);
function convertirEnJS($nomjs,$data) : void {
    echo 'const '. $nomjs . '= ' .  json_encode($data, JSON_UNESCAPED_UNICODE) . ';'.PHP_EOL;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/css/dashboard.css" />
    <script src="./assets/js/dashboard.js" defer> </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<script>
    <?php
//        convertirEnJS("dataAge" , $reponsesAges );
//        convertirEnJS("optionsAge" , $OptionsAge );
    ?>
</script>
<header>
    <h1 id="idk" >Résultats de l'enquête</h1>
</header>
<section>
    <canvas id="myChart"></canvas>
</section>
</body>
</html>

