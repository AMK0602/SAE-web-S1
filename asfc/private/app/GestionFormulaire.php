<?php

namespace Asfc\Sae;

class GestionFormulaire
{
    public function __construct(private IDBRepository $repository)
    {
    }

    public function enregistrerReponse(
        int $region,
        int $situationLogement,
        int $orientationCdaph,
        int $satisfactionLieuDeVie,
        int $activite,
        int $qualiteDeVie,
        int $besoinSoutien,
        int $idUser
    ): bool {
        $formulaire = new Formulaire(
            $region,
            $situationLogement,
            $orientationCdaph,
            $satisfactionLieuDeVie,
            $activite,
            $qualiteDeVie,
            $besoinSoutien,
            $idUser
        );

        return $this->repository->saveFormulaire($formulaire);
    }


}