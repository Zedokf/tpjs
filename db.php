<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=shopnet;charset=utf8', 'Braddy', 'coucou12', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

return $pdo;
