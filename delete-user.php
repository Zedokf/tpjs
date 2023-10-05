<?php
$pdo = require_once 'db.php';

if (isset($_GET['id']) && $_GET['id']) {
    $userId = $_GET['id'];

    $deleteStmt = $pdo->prepare('DELETE FROM utilisateur WHERE id = :id');
    $deleteStmt->bindValue(':id', $userId);

    if ($deleteStmt->execute()) {
        header('location: admin.php');
    } else {
        echo 'Erreur lors de la suppression de l\'utilisateur.';
    }
} else {
    header('location: admin.php');
}
