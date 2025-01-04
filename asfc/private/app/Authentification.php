<?php

namespace Asfc\Sae;

class Authentification {

  public function __construct(private IDBRepository $repository) { }

  /**
   * @throws \Exception
   */
  public function register(string $prenom,string $nom,int $age,string $region,string $email, string $password, string $repeat) : bool {
    if($password !== $repeat) {
      throw new \Exception("Mots de passe différents");
    }
    if($this->invalideEmail($email)) {
      throw new \Exception("Email invalide");
    }
    if($this->repository->findUserByEmail($email)) {
      throw new \Exception("Utilisateur déjà enregistré");
    }

    $user = new User($prenom,$nom,$age,$region,$email,$password);

    return $this->repository->saveUser($user);
  }

  /**
   * @throws \Exception
   */
  public function authenticate(string $email, string $password) : true {
    $user = $this->repository->findUserByEmail($email);
    if(!$user || !password_verify($password, $user->getPassword())) {
      throw new \Exception("Mot de pass ou email invalide");
    }
    return true;
  }

  private function invalideEmail(string $email) : bool {
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
  }

}