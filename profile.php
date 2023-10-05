<?php
$pdo = require_once('db.php');
@session_start();
if ($_SESSION['id']) {
    $idUser = $_SESSION['id'];
    $userStmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id = :id");
    $userStmt->bindValue(':id', $idUser);
    $userStmt->execute();
    $user = $userStmt->fetch();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];


    $target_dir = "uploads/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
    if (!empty($_FILES["fileToUpload"]["name"])) {

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            $error = "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }

        if ($imageFileType != "png") {
            $error = "Seuls les fichiers PNG sont autorisés.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            $newFileName = $idUser . ".png";
            $target_file = $target_dir . $newFileName;

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // echo "Le fichier " . basename($_FILES["fileToUpload"]["name"]) . " a été téléchargé avec succès.";
            } else {
                $error = "Une erreur s'est produite lors du téléchargement du fichier.";
            }
        }
    }


    if (!empty($_POST['nom'])) {
        $sql = "UPDATE utilisateur SET nom=:nom WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":id", $idUser);
        $stmt->execute();
    }


    header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('Components/_head.php'); ?>
    <title>ShopNet - Profil</title>
</head>

<body>
    <?php include('nav.php'); ?>

    <div class="container mt-5">
        <h1>Profil Utilisateur</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $user['nom'] ?>">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image de Profil</label>
                <input type="file" class="form-control" id="image" name="fileToUpload">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
        <img src="uploads/<?= $idUser ?>.png" alt="Image user">
    </div>
</body>

</html>