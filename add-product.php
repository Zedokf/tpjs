<?php
@session_start();
$pdo = require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser = $_SESSION['id'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    if ($name && $desc && $price) {
        if (isset($_GET['idProduct'])) {
            $productId = $_GET['idProduct'];
            $editProduct = $pdo->prepare('UPDATE produit SET
                nom = :nom,
                prix = :prix,
                description = :description
                WHERE id = :id_produit AND id_utilisateur = :id_utilisateur');
            $editProduct->bindValue(':nom', $name);
            $editProduct->bindValue(':prix', $price);
            $editProduct->bindValue(':description', $desc);
            $editProduct->bindValue(':id_produit', $productId);
            $editProduct->bindValue(':id_utilisateur', $idUser);
            $editProduct->execute();
            header('location: produit.php');
        } else {
            $addProduct = $pdo->prepare('INSERT INTO produit VALUES (
                DEFAULT,
                :nom,
                :prix,
                :id_utilisateur,
                :description)');
            $addProduct->bindValue(':nom', $name);
            $addProduct->bindValue(':prix', $price);
            $addProduct->bindValue(':id_utilisateur', $idUser);
            $addProduct->bindValue(':description', $desc);
            $addProduct->execute();
            header('location: produit.php');
        }
    }
}

$editProductId = isset($_GET['idProduct']) ? $_GET['idProduct'] : null;
$productData = null;

if ($editProductId) {
    $getProductData = $pdo->prepare('SELECT * FROM produit WHERE id = :id');
    $getProductData->bindValue(':id', $editProductId);
    $getProductData->execute();
    $productData = $getProductData->fetch();
    if ($productData['id_utilisateur'] !== $_SESSION['id']) {
        header('location: produit.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('Components/_head.php'); ?>
    <title>Ajout/Édition de produit</title>
</head>

<body>
    <?php include('nav.php'); ?>
    <div class="container mt-5">
        <?php if ($editProductId) : ?>
            <h1>Éditer un produit</h1>
        <?php else : ?>
            <h1>Ajouter un produit</h1>
        <?php endif; ?>
        <form action="" method="POST">
            <!-- Utilisez les données du produit si vous êtes en mode d'édition -->
            <input type="hidden" name="idProduct" value="<?= $editProductId ?>">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="name" placeholder="Entrez le nom" value="<?= $productData ? $productData['nom'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Entrez la description"><?= $productData ? $productData['description'] : '' ?></textarea>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix :</label>
                <input type="number" class="form-control" id="prix" name="price" placeholder="Entrez le prix" value="<?= $productData ? $productData['prix'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary"><?= $editProductId ? 'Mettre à jour' : 'Ajouter' ?></button>
        </form>
    </div>

    <!-- Inclure les fichiers JavaScript de Bootstrap 5 (facultatif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>