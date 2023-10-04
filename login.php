<?php
session_start();
if ($_SESSION['name']) {
    header('location: index.php');
}

$pdo = require_once 'db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);

    $username = $input['username'] ?? '';
    $email = $input['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$password || !$email) {
        $error = 'ERROR';
    } else {
        $statementUser = $pdo->prepare('SELECT * FROM utilisateur WHERE email=:email');
        $statementUser->bindValue(':email', $email);
        $statementUser->execute();
        $user = $statementUser->fetch();

        if (password_verify($password, $user['mdp'])) {
            $_SESSION['name'] = $user['nom'];

            header('Location: profile.php');
        } else {
            $error = 'Password faux';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('Components/_head.php'); ?>
    <title>ShopNet</title>
</head>

<body style="background-color: gray;">
    <?php include('nav.php'); ?>
    <div style="margin-top: 20px;"></div>
    <div class="mx-auto p-2" style="background-color: white;width: 25%; border-radius: 20px;">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>

</html>