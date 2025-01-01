<?php



class database
{
    private $pdo;
    private string $lien = "E:\SAE-web-S\src\Configuration\Database.db";
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


