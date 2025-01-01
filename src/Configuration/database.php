<?php

class database
{
    private $pdo;
    private string $lien = "E:\SAE-web-S\src\Configuration\Database.db";
    public function connecter()
    {
        if ($this->pdo == null) {
            try {
                $this->pdo = new PDO('sqlite:' . $this->lien);
            } catch (PDOException $e) {
                echo "erreur : " . $e->getMessage();
            }

        }
        return $this->pdo;
    }

    public function chargerLesQuestions(PDO $pdo)
    {
        try {
            $questionsQuery = "SELECT * FROM Questions ";

            $stmt = $pdo->prepare($questionsQuery);
            $stmt->execute();

            $questions = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $questionId = $row['Id_Question'];
                if (!isset($questions[$questionId])) {
                    $questions[$questionId] = [
                        'id_question' => $row['Id_Question'],
                        'texte_question' => $row['Texte_Question'],
                        'type_question' => $row['Type_Question'],
                    ];
                }
            }

            return $questions;

        } catch (PDOException $e) {
            echo "Erreur lors du chargement des questions : " . $e->getMessage();
            return [];
        }
    }


}


