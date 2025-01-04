<?php
require "E:\SAE-web-S\src\Configuration\database.php";

$db = new database();
$pdo = $db->connecter();

$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$password = $_POST['mdp'] ?? null;

if (empty($email) || empty($password)) {
    header("Location : /admin.php");
}

$sql = "SELECT * FROM admin WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();


if ($user  && password_verify($password, $user['mdp'])) {
    header("Location: ./dashboard.php");
    exit;
} else {
    header("Location: ./admin.php");
    exit;
}