<?php

namespace Asfc\Sae;

class Formulaire
{
    public function __construct(private int $region,private int $situationLogement,private int $orientationCdaph,private int $satisfactionLieuDeVie,private int $activite,private int $qualiteDeVie,private int $besoinSoutien,private int $idUser) { }


    public function getRegion(): string {return $this->region;}
    public function getSituationLogement(): string {return $this->situationLogement;}
    public function getOrientationCdaph(): bool {return $this->orientationCdaph;}
    public function getActivite(): string {return $this->activite;}
    public function getSatisfactionLieuDeVie(): bool {return $this->satisfactionLieuDeVie;}
    public function getQualiteDeVie(): string {return $this->qualiteDeVie;}

    public function getIdUser(): int {return $this->idUser;}
    public function getBesoinSoutien(): string {return $this->besoinSoutien;}

}