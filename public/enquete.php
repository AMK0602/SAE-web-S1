<?php
require "../src/configuration/database.php";

$totalQuestion = 10;
$questionsCourante = 1;
$db = new Database();
$pdo = $db->connecter();
$questions = $db->chargerLesQuestions($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon enquête</title>
    <link rel="stylesheet" href="assets/css/enquete.css">
</head>
<body>

<div class="container">
    <div class="header-form">
        <h1 class="stepbystep"><?= $questionsCourante ?> sur 7</h1>
        <div class="progress-bar">
                <div class="active"></div>
        </div>
    </div>

    <form class="form" method="POST" action="">
        <div id="questions-wrapper">
            <?php foreach ($questions as $index => $question): ?>
            <div class="question-slide <?= $index === 0 ? 'visible' : '' ?>" id="question-<?= $index ?>" >
                <p class="question-num">
                    Question <?= $index  ?>
                </p>
                <p class="question">
                    <?= htmlspecialchars($question['texte_question'])?>
                </p>

                <div class="div-reponse">
                    
                </div>
                <div>
            <?php endforeach; ?>
        </div>
    </form>
</body>
</html>