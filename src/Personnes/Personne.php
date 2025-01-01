<?php

namespace src\Personnes;

class Personne
{
    private string $nom;
    private string $prenom;
    private int $age;
    private string $Region;
    private $motdepasse;
    private $email;

    /**
     * @param string $nom
     * @param string $prenom
     * @param int $age
     * @param string $Region
     * @param $motdepasse
     * @param $email
     */

    public function __construct(string $nom, string $prenom, int $age, string $Region, $motdepasse, $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->Region = $Region;
        $this->motdepasse = $motdepasse;
        $this->email = $email;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function getRegion(): string
    {
        return $this->Region;
    }
}







