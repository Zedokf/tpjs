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
        $hashPassword = password_hash($password, PASSWORD_ARGON2I);

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopNet - Inscription</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default" defer></script>
</head>

<body>
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