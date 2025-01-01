<?php

namespace src\src\Configuration;
use src\Configuration\PDO;
use src\Configuration\PDOException;

class database
{
    private $pdo;
    private $lien = "../Configuration/Database.db";
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

}


