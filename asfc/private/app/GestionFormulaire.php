<?php

namespace Asfc\Sae;

class GestionFormulaire
{
    public function __construct(private IDBRepository $repository) { }

    public function register(string $prenom,string $nom,int $age,string $region,string $email, string $password, string $repeat) : bool {

        return false;
    };
}