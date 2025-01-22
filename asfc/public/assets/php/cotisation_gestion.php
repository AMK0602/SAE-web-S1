<?php
use Asfc\Sae\GestionFormulaire;
use Asfc\Sae\BddConnect;
use Asfc\Sae\MariaDBRepository;
if(!session_id())
    session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../../../vendor/autoload.php';

    $bdd = new BddConnect();

    $pdo = $bdd->connexion();
    $trousseau = new MariaDBRepository($pdo);
    $form = new GestionFormulaire($trousseau);

    $cotisation = intval($_POST['cotisation'] ?? 0);

    if ($cotisation > 0) {
        try {
            // Mettre à jour la cotisation de l'utilisateur connecté
            $cotisation= $_POST['cotisation'];
            $id=$_SESSION['id_users'];
            $retour=$trousseau->updateCotisation($id,$cotisation);
            if($retour){
                $_SESSION['cotisation']=$cotisation;
            }
            $message = "Votre cotisation a ete enregistre";
            $code = "success";


            $_SESSION['flash'][$code] = $message;
            header("Location: ../../index.php");
        } catch(Exception $e) {
            $retour = false;
            $message = "Authentification impossible : " . $e->getMessage();
            $code = "warning";
        }
    } else {
        header('Location: cotisation_gestion.php?error=Choisissez une cotisation');
        exit();
    }
}
