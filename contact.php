<?php $pdo = require_once 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('Components/_head.php'); ?>
    <title>Nous contacter</title>
</head>

<body>
    <?php include('nav.php'); ?>

    <div class="container mt-5">
        <h1>Formulaire de Contact</h1>
        <form>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="sujet" class="form-label">Sujet</label>
                <input type="text" class="form-control" id="sujet" name="sujet" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

</body>

</html>