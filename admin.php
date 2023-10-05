<?php
$pdo = require_once 'db.php';
session_start();
if (!$_SESSION['id']) {
    header('location: index.php');
}
$userStmt = $pdo->prepare('SELECT * FROM utilisateur WHERE id = :id');
$userStmt->bindValue(':id', $_SESSION['id']);
$userStmt->execute();
$user = $userStmt->fetch();
if ($user['admin'] !== 'admin') {
    header('location: index.php');
}

$usersStmt = $pdo->prepare('SELECT * FROM utilisateur');
$usersStmt->execute();
$users = $usersStmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('Components/_head.php'); ?>
    <title>ShopNet - Register</title>
</head>


<body>
    <?php include('nav.php'); ?>
    <div class="container mt-5">
        <h2>Liste des utilisateurs</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user2) : ?>
                    <tr>
                        <td><?php echo $user2['nom']; ?></td>
                        <td>
                            <a href="delete-user.php?id=<?= $user2['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>