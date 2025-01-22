<?php

namespace Asfc\Sae;

class MariaDBRepository implements IDBRepository {

  public function __construct(private \PDO $dbConnexion) { }

  public function saveUser(User $user) : bool {
    $stmt = $this->dbConnexion->prepare(
      "INSERT INTO Users (nom, prenom,age, email, password) VALUES (:nom, :prenom,:age, :email, :password)"
    );

    return $stmt->execute([
                            'nom' => $user->getNom(),
                            'prenom' => $user->getPrenom(),
                            'age' => $user->getAge(),
                            'email' => $user->getEmail(),
                            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
                          ]);
  }

  public function findUserByEmail(string $email) : ?User {
    $stmt = $this->dbConnexion->prepare(
      "SELECT * FROM Users WHERE email = :email"
    );
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    if($result) {
      return new User($result['nom'],$result['prenom'],$result['age'],$result['email'], $result['password'],$result['cotisation'],$result['role']);
    }
    return null;
  }

    public function findUserIDByEmail(string $email): int{
        $stmt = $this->dbConnexion->prepare(
            "SELECT id FROM Users WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['id'];
    }

    public function getUserRoleByEmail(string $email): string
    {
        $stmt = $this->dbConnexion->prepare(
            "SELECT role FROM Users WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($result) {
            return $result['role'];
        }
        return " ";

    }

    public function saveFormulaire(Formulaire $formulaire): bool
    {
        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO Reponses (region_id, housing_id,cdaph,  lifeSatisfaction_id ,activity_id ,lifeQuality_id,supportNeeded_id,id_user) 
                  VALUES (:region, :situationlogement,:orientationcdaph, :satisfactionlieudevie, :activite,:qualitedevie,:besoinsoutien,:id_user);");


        return $stmt->execute([
            'region' => $formulaire->getRegion(),
            'situationlogement' => $formulaire->getSituationlogement(),
            'orientationcdaph' => $formulaire->getOrientationcdaph(),
            'satisfactionlieudevie' => $formulaire->getSatisfactionlieudevie(),
            'activite' => $formulaire->getActivite(),
            'qualitedevie' => $formulaire->getQualitedevie(),
            'besoinsoutien' => $formulaire->getBesoinsoutien(),
            'id_user' => $formulaire->getIdUser()
        ]);
    }

    public function getUserByReponses(int $id_user): bool
    {
        $stmt = $this->dbConnexion->prepare(
            "SELECT id_user FROM Reponses WHERE id_user = :id_user"
        );
        $stmt->execute(['id_user' => $id_user]);
        return (bool) $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function updatecotisation(int $id, int $cotisation): bool
    {
        $stmt = $this->dbConnexion->prepare('UPDATE Users SET cotisation = :cotisation WHERE id = :id');
        return $stmt->execute([
            ':cotisation' => $cotisation,
            ':id' => $id,
        ]);

    }
    public function getUserbycotisation(int $cotisation): string{
        $stmt = $this->dbConnexion->prepare(
            "SELECT * FROM Users WHERE cotisation = :cotisation"
        );
        $stmt->execute(['cotisation' => $cotisation]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($result) {
            return $result['cotisation'];
        }
        return 0;
    }
}





