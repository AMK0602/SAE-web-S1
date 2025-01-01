<?php

use src\Personnes\Personne;

require_once "../Configuration/database.php";

class GestionnairePers
{
    private $pdo;
    public function __construct(){
        $db = new database();
        $this->pdo = $db->connecter();
    }

    // je me connecte
    public function authentifier($email,$mdp)  {
        try {
            $sql = "SELECT * FROM Personne WHERE Email = :email";
            $req = $this->pdo->prepare($sql);
            $req->bindParam( ":email", $email);
            $req->execute();

            $user = $req->fetch(PDO::FETCH_ASSOC); //recup valeur requete
            //verif : user existe et  je verifie que mdp pour ce mail est correct
            if ($user && password_verify($mdp, $user['Mdp'])) {
                return $user;
            }
            return false;

        } catch (PDOException $e) {
            // Gérer les erreurs de connexion à la base de données
            echo $e->getMessage();
            return false;
        }
    }
    public function enregistrement(Personne $p): bool {
        try {
            $sql = "INSERT INTO PERSONNE (Nom, Prenom, Email, Mdp, Age, Region) VALUES (:nom, :prenom, :email, :mdp, :age, :region)";
            $req = $this->pdo->prepare($sql);

            // Hash du mot de passe
            $hashedPassword = password_hash($p->getMotdepasse(), PASSWORD_DEFAULT);

            // Liaison des paramètres
            $req->bindValue(":nom", $p->getNom(), PDO::PARAM_STR);
            $req->bindValue(":prenom", $p->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(":email", $p->getEmail(), PDO::PARAM_STR);
            $req->bindValue(":mdp", $hashedPassword, PDO::PARAM_STR);
            $req->bindValue(":age", $p->getAge(), PDO::PARAM_INT);
            $req->bindValue(":region", $p->getRegion(), PDO::PARAM_STR);

            // Exécution de la requête
            return $req->execute();
        } catch (PDOException $e) {
            // Affichage d'un message d'erreur plus précis (ne pas exposer cela en production)
            error_log("Erreur lors de l'enregistrement d'une personne : " . $e->getMessage());
            return false;
        }
    }

}