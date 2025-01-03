<?php

namespace Asfc\Sae;

class MariaDBRepository implements IDBRepository {

  public function __construct(private \PDO $dbConnexion) { }

  public function saveUser(User $user) : bool {
    $stmt = $this->dbConnexion->prepare(
      "INSERT INTO users (nom, prenom,age,region, email, password) VALUES (:nom, :prenom,:age,:region, :email, :password)"
    );

    return $stmt->execute([
                            'nom' => $user->getNom(),
                            'prenom' => $user->getPrenom(),
                            'age' => $user->getAge(),
                            'region' => $user->getRegion(),
                            'email' => $user->getEmail(),
                            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
                          ]);
  }

  public function findUserByEmail(string $email) : ?User {
    $stmt = $this->dbConnexion->prepare(
      "SELECT * FROM users WHERE email = :email"
    );
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    if($result) {
      return new User($result['nom'],$result['prenom'],$result['age'],$result['region'],$result['email'], $result['password']);
    }
    return null;
  }

    public function getUserRoleByEmail(string $email): string
    {
        // TODO: Implement getUserRoleByEmail() method.
        $stmt = $this->dbConnexion->prepare(
            "SELECT role FROM users WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($result) {
            return $result['role'];
        }
        return " ";

    }
}





