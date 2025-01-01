<?php

namespace src\src\Personnes;

use PDO;
use PDOException;
use src\src\Configuration\database;

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
    public function enregistrement($nom, $prenom, $email, $mdp ) {
        try {
            $sql = "INSERT INTO PERSONNE (Nom, Prenom, Email, Mdp) VALUES(:nom, :prenom, :email, :mdp);";
            $req = $this->pdo->prepare($sql);
            $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
            $req->bindParam(":nom", $nom);
            $req->bindParam(":prenom", $prenom);
            $req->bindParam(":email", $email);
            $req->bindParam(":mdp", $hashedPassword);

            if ($req->execute()){
                return true;
            }
            return false;
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
}