<?php

namespace Asfc\Sae;

class User {

  public function __construct(private string $prenom,private string $nom,private int $age,private string $region,private string $email, private string $password) { }

  public function getEmail() : string { return $this->email; }
  public function getPassword() : string { return $this->password; }
  public function getNom() : string { return $this->nom; }
    public function getPrenom() : string { return $this->prenom; }
    public function getAge() : int { return $this->age; }
    public function getRegion() : string { return $this->region; }


}