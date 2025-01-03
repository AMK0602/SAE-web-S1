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
    public function chargerLesOptions(PDO $pdo , $idQuestion)
    {
        try {
            $query = $pdo->prepare("SELECT * FROM Options WHERE id_question = :id_question");
            $query->bindValue(':id_question', $idQuestion, PDO::PARAM_INT);
            $query->execute();
            $options = $query->fetchAll();
        } catch (PDOException $e) {
            echo("Error questions: " . $e->getMessage());
        }
        return $options;
    }
    public function nbQuestion(PDO $pdo){
        try {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM Questions");
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Erreur lors du chargement du nombre questions : " . $e->getMessage();
        }
    }
}


