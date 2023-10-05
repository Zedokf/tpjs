<?php
session_start();
ob_start();
$pdo = require_once('db.php');
if (isset($_GET['id'])) {

    $idProduct = $_GET['id'];
    $selectProduct = $pdo->prepare('SELECT * FROM produit WHERE id = :id');
    $selectProduct->bindValue(':id', $idProduct);
    $selectProduct->execute();
    $userProduct = $selectProduct->fetch();
    if ($userProduct['id_utilisateur'] === $_SESSION['id']) {
        $deleteProduct = $pdo->prepare('DELETE FROM produit WHERE id = :id');
        $deleteProduct->bindValue(':id', $idProduct);
        $deleteProduct->execute();
        header('location: produit.php');
    } else {
        header('location: produit.php');
    }
}
ob_end_flush();
