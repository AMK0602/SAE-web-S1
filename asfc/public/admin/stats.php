<?php
/**
if ($_SESSION['role'] !== 'admin') {
    echo $_SESSION['id_users'];
    exit;
}
 * */
echo "Bienvenue sur la page des statistiques !";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association Fatigue Chronique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/stats.css">
</head>
<body>
<h1>Statistiques des Réponses</h1>
<div id="charts" class="chart">
</div>
<script src="https://d3js.org/d3.v7.min.js"></script>
<script src="../assets/js/stats.js"></script>
</body>
</html>