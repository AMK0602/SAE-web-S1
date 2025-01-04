<?php
require "../Configuration/database.php";
$db = new Database();
$pdo = $db->connecter();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Reponses = $_POST["reponses"];

    foreach($Reponses as $index => $reponse){
        try{ $sql = "INSERT INTO REPONSES ( IdPers, Reponse, Id_Question) 
        VALUES ( :idpers, :reponse, :idquestion)";
            $stmt = $pdo->prepare($sql);
            $i = 1;
            $stmt->bindParam(':idpers', $i);
            $stmt->bindParam(':reponse', $reponse);
            $stmt->bindParam(':idquestion', $index);
            $stmt->execute();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

}
