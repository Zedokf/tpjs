<?php
$pdo = require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('Components/_head.php'); ?>
    <title>Produits</title>
</head>

<body>
    <?php include('nav.php'); ?>
    <?php if ($_SESSION['id']) { ?>
        <a href="add-product.php">
            <button class="btn btn-primary">Ajouter un produit</button>
        </a>
    <?php } ?>
    <div class="d-flex justify-content-between">
        <?php
        $selectProduct = $pdo->query('SELECT * FROM produit');
        $products = $selectProduct->fetchAll();
        foreach ($products as $product) { ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $product['nom'] ?> - <span class="small"><?= $product['prix'] ?>€</span></h5>
                    <p class="card-text"><?= $product['description'] ?></p>
                    <?php if ($product['id_utilisateur'] === $_SESSION['id']) { ?>
                        <a href="add-product.php?idProduct=<?= $product['id'] ?>" class="btn btn-warning">Modifier</a>
                        <a href="delete-product.php?id=<?= $product['id'] ?>" class="btn btn-danger">Supprimer</a>
                    <?php }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>