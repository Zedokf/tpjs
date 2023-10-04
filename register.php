<?php
$pdo = require_once 'db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);

    $username = $input['name'] ?? '';
    $email = $input['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$username || !$password || !$email) {
        $error = 'ERROR';
    } else {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $statement = $pdo->prepare('INSERT INTO utilisateur VALUES(
            DEFAULT,
            :email,
            :nom,
            :mdp
        )');

        $statement->bindValue(':email', $email);
        $statement->bindValue(':nom', $username);
        $statement->bindValue(':mdp', $hashPassword);
        $statement->execute();

        header('Location: login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('Components/_head.php'); ?>
    <title>ShopNet - Register</title>
</head>

<body>
    <?php include('nav.php'); ?>
    <div style="margin-top: 20px;"></div>

    <form action="register.php" method="POST">
        <div class="container">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" autofocus placeholder="John">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="john.doe@example.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">S'inscrire</button>
        </div>
    </form>
</body>

</html>