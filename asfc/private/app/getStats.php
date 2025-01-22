<?php

use Asfc\Sae\BddConnect;

require_once 'BddConnect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

$db = new BddConnect();
$pdo = $db->connexion();

if (!$pdo) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed."]);
    exit;
}

try {
    $query = $pdo->query("
        SELECT 
            region_id, 
            housing_id,
            cdaph, 
            lifesatisfaction_id, 
            activity_id, 
            lifequality_id,
            supportneeded_id
        FROM Reponses
    ");

    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!$data) {
        http_response_code(500);
        echo json_encode(["error" => "No data retrieved from the database."]);
        exit;
    }

    echo json_encode($data);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
?>