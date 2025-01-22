<?php require_once('../public/header.php');
require_once('../private/app/BddConnect.php');
$db = new \Asfc\Sae\BddConnect();
$pdo = $db->connexion();
$questions = $db->chargerLesQuestions($pdo);
?>

<section class="formulaire py-5">
    <div class="form-panel">
        <h1 class="form-title">Formulaire d'enquête à l'intention de nos adhérents :</h1>
        <form action="assets/php/formulaire_enregistrement.php" method="post" class="form-content">
            <?php foreach ($questions as $index => $question): ?>
            <div class="form-group <?= $index === 1 ? 'visible' : '' ?>" id="question-<?= $index ?>" >

                <label class="question"><?= htmlspecialchars($question['libelle_question'])?></label>
                <div class="div-reponse">
                    <?php if ($question['type_question'] === 'button'): ?>
                    <?php
                    $options = $db->chargerLesOptions($pdo , $question['id_question']);
                    ?>
                    <?php foreach ($options as $option): ?>
                    <button class="btn-select" type="button"
                            onclick="selectOption(this)"
                            data-target="input-<?= $question['id_question'] ?>"
                            value="<?= $option['id_option'] ?> ">

                        <?= htmlspecialchars($option['libelle_option']) ?>
                    </button>
                    <?php endforeach; ?>
                    <input type="text"
                           id="input-<?= $question['id_question'] ?>"
                           name="reponses[<?= $question['id_question'] ?>]"
                           value="" readonly required>

                        <label for="input-<?= $question['id_question'] ?>">


                    <?php elseif ($question['type_question'] === 'select'): ?>
                        <?php $options = $db->chargerLesOptions($pdo , $question['id_question']);
                        ?>
                        <select name="reponses[<?= $question['id_question'] ?>]" required>
                            <?php foreach ($options as $option): ?>
                                <option value="<?= htmlspecialchars($option['id_option']) ?>"><?= htmlspecialchars($option['libelle_option']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div>
                    <?php endforeach; ?>

                    <button type="submit" class="btn-submit">Envoyer</button>
        </form>
        <script src="./assets/js/formulaire.js"></script>
    </div>
</section>
<?php require_once('../public/footer.php'); ?>
