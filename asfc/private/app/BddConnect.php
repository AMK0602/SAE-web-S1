<?php

namespace Asfc\Sae;

use PDO, PDOException;

class BddConnect {
  public \PDO $pdo;
  protected string $host;
  protected string $login;
  protected string $password;
  protected string $dbname;

  public function __construct() {
    $this->host = "127.0.0.1";
    $this->login = "root";
    $this->password = "root";
    $this->dbname = "asfc";
  }

  public function connexion() : PDO {
    try {

      $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
      $this->pdo = new PDO($dsn, $this->login, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch(PDOException $e) {
      die("Erreur de connexion BDD : " . $e->getMessage());
    }

    return $this->pdo;
  }

    public function chargerLesQuestions(PDO $pdo)
    {
        try {
            $questionsQuery = "SELECT * FROM question";

            $stmt = $pdo->prepare($questionsQuery);
            $stmt->execute();

            $questions = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $questionId = $row['id_question'];
                if (!isset($questions[$questionId])) {
                    $questions[$questionId] = [
                        'id_question' => $row['id_question'],
                        'libelle_question' => $row['libelle_question'],
                        'type_question' => $row['type_question'],
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
            $query = $pdo->prepare("SELECT * FROM `option` WHERE id_question = :id_question");
            $query->bindValue(':id_question', $idQuestion, PDO::PARAM_INT);
            $query->execute();
            $options = $query->fetchAll();
        } catch (PDOException $e) {
            echo("Error questions: " . $e->getMessage());
        }
        return $options;
    }

}