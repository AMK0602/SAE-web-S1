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
<!--    <link rel="stylesheet" href="assets/css/enquete.css">-->
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
            <div class="question-slide <?= $index === 1 ? 'visible' : '' ?>" id="question-<?= $index ?>" >
                <p class="question-num">Question <?= $index  ?></p>
                <p class="question"><?= htmlspecialchars($question['texte_question'])?></p>
                <div class="div-reponse">
                    <?php if ($question['type_question'] === 'button'): ?>
                        <?php
                        $options = $db->chargerLesOptions($pdo , $question['id_question']);
                        ?>
                        <?php foreach ($options as $option): ?>
                            <button class="btn-select" type="button"
                                    onclick="selectOption(this)"
                                    data-target="input-<?= $question['id_question'] ?>"
                                    value="<?= $option['option_text'] ?>">

                                <?= htmlspecialchars($option['option_text']) ?>
                            </button>
                        <?php endforeach; ?>
                        <input type="hidden"
                               id="input-<?= $question['id_question'] ?>"
                               name="reponses[<?= $question['id_question'] ?>]"
                               value="" readonly required>

                    <?php elseif ($question['type_question'] === 'input'): ?>
                        <input  name="reponses[<?= $question['id_question'] ?>]" required>
                    
                    <?php elseif ($question['type_question'] === 'textarea'): ?>
                        <textarea placeholder="champs libre" name="reponses[<?= $question['id_question'] ?>]" required></textarea>

                    <?php elseif ($question['type_question'] === 'select'): ?>
                        <?php $options = $db->chargerLesOptions($pdo , $question['id_question']);
                        ?>
                        <select name="reponses[<?= $question['id_question'] ?>]" required>
                            <?php foreach ($options as $option): ?>
                                <option  value="<?= htmlspecialchars($option['option_text']) ?>"><?= htmlspecialchars($option['option_text']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
            <div>
            <?php endforeach; ?>
        </div>
                <div class="navigation">
                    <button id="prev-btn" type="button" class="btn">Retour</button>
                    <button id="next-btn" type="button" class="btn">Suivant</button>
                </div>
    </form>
    
    
    
</body>
</html>